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
		if ( !$pageId ) return false; // page hasn't yet been saved (preview)

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
	public static function clearState( Parser $parser ) {
		$parser->pageInCat_cache = array();
		return true;
	}
}
