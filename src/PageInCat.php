<?php
/**
 * Extension to add parserfunction {{#incat:foo|yes|no}}
 *
 * @author Brian Wolff <bawolff+ext _at_ gmail _dot_ com>
 *
 * Copyright © Brian Wolff 2011.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

use MediaWiki\MediaWikiServices;
use MediaWiki\Parser\ParserOutputFlags;

class PageInCat {

	/**
	 * Really hacky array for categories of page
	 * that we are previewing. See onEditPageGetPreviewContent
	 * method. Each key is an md5sum of page text, and each key
	 * is an array of categories.
	 *
	 * @var array
	 */
	public static $categoriesForPreview = [];

	/**
	 * Register the parser hook.
	 *
	 * @param Parser $parser
	 * @return true
	 */
	public static function register( Parser $parser ) {
		$parser->setFunctionHook( 'pageincat', 'PageInCat::render', Parser::SFH_OBJECT_ARGS );
		return true;
	}

	/**
	 * Check if in category.
	 * Based on #if from ParserFunctions extension.
	 *
	 * @param Parser $parser
	 * @param PPFrame $frame
	 * @param array $args
	 * @return string
	 */
	public static function render( $parser, $frame, $args ) {
		$catText = isset( $args[0] ) ? trim( $frame->expand( $args[0] ) ) : '';

		// Must specify that content varies with what gets inserted in db on save.
		// FIXME May or may not work after 1846e2dc15e957c55
		$parser->getOutput()->setOutputFlag( ParserOutputFlags::VARY_REVISION );

		if ( self::inCat( $parser->getTitle(), $catText, $parser ) ) {
			return isset( $args[1] ) ? trim( $frame->expand( $args[1] ) ) : '';
		} else {
			return isset( $args[2] ) ? trim( $frame->expand( $args[2] ) ) : '';
		}
	}

	/**
	 * Check if $page belongs to $category.
	 *
	 * @param Title $page current page
	 * @param string $category category to check (not a title object!)
	 * @param Parser $parser
	 * @return bool If $page is a member of $category
	 */
	private static function inCat( Title $page, $category, Parser $parser ) {
		if ( $category === '' ) {
			return false;
		}
		$catTitle = Title::makeTitleSafe(
			NS_CATEGORY,
			$category
		);
		if ( !$catTitle ) {
			return false;
		}
		$catDBkey = $catTitle->getDBkey();

		if ( !isset( $parser->pageInCat_cache ) ) {
			$parser->pageInCat_cache = [];
		} else {
			if ( isset( $parser->pageInCat_cache[$catDBkey] ) ) {
				# been there done that, return cached value
				return $parser->pageInCat_cache[$catDBkey];
			} elseif ( isset( $parser->pageInCat_onlyCache ) && $parser->pageInCat_onlyCache ) {
				# All categories have been preloaded into cache, so
				# we must have hit a cat not in page.
				# Mark it so can be checked for correctness later.
				$parser->PageInCat_cache[$catDBkey] = false;
				return false;
			}
		}

		$pageId = $page->getArticleID();
		if ( !$pageId ) {
			// page hasn't yet been saved (preview)
			// add to the cache list so the other hook
			// will warn about incorrect value.
			// Important to do this after checking cache
			// in case categories were pre-loaded during preview.
			$parser->pageInCat_cache[$catDBkey] = false;
			return false;
		}

		if ( !$parser->incrementExpensiveFunctionCount() ) {
			# expensive function limit reached.
			return false;
		}

		if ( self::inCatCheckDb( $pageId, $catDBkey ) ) {
			$parser->pageInCat_cache[$catDBkey] = true;
			return true;
		}
		/* else if false */

		$parser->pageInCat_cache[$catDBkey] = false;
		return false;
	}

	/**
	 * Actually check it in DB.
	 *
	 * @param int $pageId page_id of current page (Already verified to not be 0)
	 * @param string $catDBkey the db key of category we're checking.
	 * @return bool if the current page belongs to the category.
	 */
	private static function inCatCheckDb( $pageId, $catDBkey ) {
		$dbr = MediaWikiServices::getInstance()->getConnectionProvider()->getReplicaDatabase();
		// This will be false if page not in cat
		// Since 0 rows returned in that case.
		$res = $dbr->selectField(
			'categorylinks',
			'cl_from',
			[
				'cl_to' => $catDBkey,
				'cl_from' => $pageId,
			],
			__METHOD__
		);
		return $res !== false;
	}

	/**
	 * ClearState hook, so we don't carry cached entries into
	 * different parses.
	 *
	 * Originally I had this all stored in a static member
	 * variable of this class (aka self::$catCache[$pageId][$catDBkey] )
	 * but changed to approach based on how ParserFunctions extension
	 * does some things, because I was concerned that it might be possible
	 * for MW to parse something, save the result, then parse the same thing
	 * again in same run (doesn't happen currently, but doesn't seem unimaginable
	 * that it could).
	 *
	 * @param Parser $parser
	 * @return true
	 */
	public static function onClearState( Parser $parser ) {
		$parser->pageInCat_cache = [];
		$parser->pageInCat_onlyCache = false;
		return true;
	}

	/**
	 * ParserAfterTidy hook to check for category/#incat mismatches.
	 *
	 * Used to check if the actual categories match the expected categories
	 * and display a warning if they don't. Using ParserAfterTidy since it
	 * runs so late in parse process.
	 *
	 * @param Parser $parser
	 * @param string $text the resultant html (unused)
	 * @return bool true
	 */
	public static function onParserAfterTidy( Parser $parser, $text ) {
		if (
			!isset( $parser->pageInCat_cache ) ||
			!$parser->getOptions()->getIsPreview()
		) {
			# page in cat extension not even used
			# or this is not a preview.
			return true;
		}

		$actualCategories = array_flip( $parser->getOutput()->getCategoryNames() );
		$wrongCategories = [];

		foreach ( $parser->pageInCat_cache as $catName => $catIncluded ) {
			# A little hacky, but I want the cat names italicized.
			$catNameDisplay = "''" . str_replace( '_', ' ', $catName ) . "''";
			if ( $catIncluded ) {
				if ( isset( $actualCategories[$catName] ) ) {
					# Cat is included, and actually should be
					# So do nothing and continue
				} else {
					$wrongCategories[$catNameDisplay] = true;
				}
			} else {
				# Should not be included
				if ( isset( $actualCategories[$catName] ) ) {
					$wrongCategories[$catNameDisplay] = true;
				} else {
					# not included, like it should be.
				}
			}
		}

		# Since this is only on preview, user lang is ok.
		$catList = array_keys( $wrongCategories );
		if ( count( $catList ) !== 0 ) {
			# We have at least 1 category that was treated
			# incorrectly by {{#incat:
			if ( isset( $parser->pageInCat_onlyCache ) && $parser->pageInCat_onlyCache ) {
				# categories already preloaded, so not a preview thing
				# yes, creativity in message name is apparently not my strong suit.
				$msgName = 'pageincat-very-wrong-warn';
			} else {
				# Categories were not pre-loaded, so used last saved revision
				# which is most likely source of errors.
				# Generally triggered by $wgPageInCatUseAccuratePreview = false;
				# but can also be triggered if the pre-loading mechanism fails
				# (extensions hooking into ParserBeforeStrip for example)
				$msgName = 'pageincat-wrong-warn';
			}

			$parser->getOutput()->addWarningMsg(
				$msgName,
				Message::listParam( $catList, 'comma' ),
				Message::numParam( count( $catList ) )
			);
		}

		return true;
	}

	/**
	 * Hook called just before rendering preview. Used to determine current categories
	 *
	 * This is hacky... Basically double parse the page, so we can determine categories.
	 * Store the retrieved categories in a static member of this class because I can't
	 * figure out a better way to get the data where it needs to be.
	 * See $categoriesForPreview member variable.
	 *
	 * Have I mentioned this is ugly, icky and hacky?
	 *
	 * @todo Find a non-ugly way of doing this (is that possible?)
	 *
	 * @param EditPage $editPage
	 * @param Content $content wikitext to be parsed
	 * @return bool true
	 */
	public static function onEditPageGetPreviewContent( EditPage $editPage, $content ) {
		global $wgPageInCatUseAccuratePreview;
		if ( !$wgPageInCatUseAccuratePreview ) {
			// disable this hacky mess ;)
			return true;
		}

		// we are not parsing anything yet, so should be safe.
		$parser = MediaWikiServices::getInstance()->getParser();
		// aka $wgUser in disguise
		$curUser = RequestContext::getMain()->getUser();

		# This is copied from EditPage.php
		# Most of these options don't matter, but thought I'd make it as close to
		# EditPage.php as possible
		$parserOptions = $editPage->getArticle()->getPage()->makeParserOptions( $editPage->getContext() );
		# Don't set as preview so other hook isn't triggered (Talk about being hacky!)
		# $parserOptions->setIsPreview( true );
		# $parserOptions->setIsSectionPreview( !is_null($editPage->section) && $editPage->section !== '' );
		$parserOptions->enableLimitReport();

		$contentText = $content instanceof TextContent ? $content->getText() : '';
		$toparse = $parser->preSaveTransform(
			$contentText, $editPage->getTitle(), $curUser, $parserOptions );
		$hash = md5( $toparse, true );
		$parserOutput = $parser->parse( $toparse, $editPage->getTitle(), $parserOptions );

		if ( count( self::$categoriesForPreview ) > 10 ) {
			# Really this should never have more than 1 element
			# since we should do a preview directly after this
			# and delete the sole element. But good to be paranoid,
			# especially given how fragile this solution is.
			wfDebug( __METHOD__ . ' self::$categoriesForPreview grew too big.' );
			self::$categoriesForPreview = [];
		}
		self::$categoriesForPreview[$hash] = $parserOutput->getCategoryNames();
		return true;
	}

	/**
	 * Insert categories from previous pre-preview parse into parser.
	 *
	 * See onEditPageGetPreviewContent. This is rather fragile/scary.
	 * If anyone has a suggestion for how to do this better, please let me know.
	 *
	 * @param Parser $parser
	 * @param string $pstText text to parse, all pst'd. In theory untouched but
	 *    various hooks could have touched it, which would make this all fail.
	 * @param StripState $stripState I really don't need this
	 * @return bool true
	 */
	public static function onParserBeforeInternalParse( Parser $parser, $pstText, $stripState ) {
		global $wgPageInCatUseAccuratePreview;
		if ( !$wgPageInCatUseAccuratePreview ) {
			// Disabled
			return true;
		}

		if ( !$parser->getOptions()->getIsPreview() ) {
			// We only do stuff on preview
			return true;
		}

		$hash = md5( $pstText, true );

		if ( !isset( self::$categoriesForPreview[$hash] ) ) {
			# This probably shouldn't happen
			wfDebug( __METHOD__ . ' Could not find relevant cat list.' );
			return true;
		}

		if ( !isset( $parser->pageInCat_cache ) ) {
			$parser->pageInCat_cache = [];
		} elseif ( count( $parser->pageInCat_cache ) !== 0 ) {
			# being paranoid
			wfDebug( __METHOD__ . ' $parser->pageInCat_cache not empty!' );
			$parser->pageInCat_cache = [];
		}

		foreach ( self::$categoriesForPreview[$hash] as $catName ) {
			$parser->pageInCat_cache[$catName] = true;
		}
		// Assume anything not in the cache is false.
		$parser->pageInCat_onlyCache = true;
		unset( self::$categoriesForPreview[$hash] );

		return true;
	}

}
