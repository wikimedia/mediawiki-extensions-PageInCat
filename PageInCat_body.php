<?php
class PageInCat {

	/** 
	 * Register the parser hook.
	 * @param $parser Parser
	 */
	public static function register( Parser $parser ) {
		$parser->setFunctionHook( 'pageincat', 'PageInCat::render', Parser::SFH_OBJECT_ARGS );
		return true;
	}

	/**
	 * Check if in category.
	 * Based on #if from ParserFunctions extension.
	 */
	public static function render( $parser, $frame, $args ) {
		$catText = isset( $args[0] ) ? trim( $frame->expand( $args[0] ) ) : '';

		// Must specify that content varries with what gets inserted in db on save.
		$parser->getOutput()->setFlag( 'vary-revision' );

		if ( self::inCat( $parser->getTitle(), $catText, $parser ) ) {
			return isset( $args[1] ) ? trim( $frame->expand( $args[1] ) ) : '';
		} else {
			return isset( $args[2] ) ? trim( $frame->expand( $args[2] ) ) : '';
		}
	}

	/**
	 * check if $page belongs to $category
	 * @param $page Title current page
	 * @param $category String category to check (not a title object!)
	 * @param $parser Parser
	 * @return boolean If $page is a member of $category
	 */
	private static function inCat( Title $page, $category, Parser $parser ) {
		if ( $category === '' ) return false;
		$catTitle = Title::makeTitleSafe(
			NS_CATEGORY,
			$category
		);
		if ( !$catTitle ) return false;
		$catDBkey = $catTitle->getDBkey();

		$pageId = $page->getArticleId();
		if ( !$pageId ) {
			// page hasn't yet been saved (preview)
			// add to the cache list so the other hook
			// will warn about incorrect value.
			$parser->pageInCat_cache[$catDBkey] = false;
			return false;
		}

		if ( !isset( $parser->pageInCat_cache ) ) {
			$parser->pageInCat_cache = array();
		} else {
			if ( isset( $parser->pageInCat_cache[$catDBkey] ) ) {
				# been there done that, return cached value
				return $parser->pageInCat_cache[$catDBkey];
			}
		}

		if ( !$parser->incrementExpensiveFunctionCount() ) {
			# expensive function limit reached.
			return false;
		}

		if ( self::inCatCheckDb( $pageId, $catDBkey ) ) {
			$parser->pageInCat_cache[$catDBkey] = true;
			return true;
		} /* else if false */

		$parser->pageInCat_cache[$catDBkey] = false;
		return false;
	}

	/**
	 * Actually chech it in DB.
	 * @param $pageId int page_id of current page (Already verified to not be 0)
	 * @param $catDBkey String the db key of category we're checking.
	 * @return boolean if the current page belongs to the category.
	 */
	private static function inCatCheckDb( $pageId, $catDBkey ) {
		$dbr = wfGetDB( DB_SLAVE );
		// This will be false if page not in cat
		// Since 0 rows returned in that case.
		$res = $dbr->selectField(
			'categorylinks',
			'cl_from',
			array(
				'cl_to' => $catDBkey,
				'cl_from' => $pageId,
			),
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
	 * @param $parser Parser
	 */
	public static function onClearState( Parser $parser ) {
		$parser->pageInCat_cache = array();
		return true;
	}

	/**
	 * ParserAfterTidy hook to check for category/#incat mismatches.
	 *
	 * Used to check if the actual categories match the expected categories
	 * and display a warning if they don't. Using ParserAfterTidy since it
	 * runs so late in parse process.
	 *
	 * @param $parser Parser
	 * @param $text String the resultant html (unused)
	 * @return boolean true
	 */
	public static function onParserAfterTidy( Parser $parser, $text ) {
		global $wgLang;
		if ( !isset( $parser->pageInCat_cache )
			|| !$parser->getOptions()->getIsPreview()
		) {
			# page in cat extension not even used
			# or this is not a preview.
			return true;
		}

		$actualCategories = $parser->getOutput()->getCategories();
		$wrongCategories = array();

		foreach( $parser->pageInCat_cache as $catName => $catIncluded ) {
			# A little hacky, but I want the cat names italicized.
			$catNameDisplay = "''" . str_replace( '_', ' ', $catName ) . "''";
			if ( $catIncluded ) {
				if ( isset( $actualCategories[$catName] ) ) {
					# Cat is included, and actually should be
					# So do nothing and continue
				} else {
					$wrongCategories[$catNameDisplay] = true;	
				}
			} else { # Should not be included
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
			$msg = wfMessage( 'pageincat-wrong-warn' )
				->params( $wgLang->listToText( $catList ) )
				->numParams( count( $catList ) )
				->text();

			$parser->getOutput()->addWarning( $msg );
		}

		return true;
	}

}
