<?php
/**
 * Extension to add parserfunction {{#incat:foo|yes|no}}
 * Note, this might give wrong results on preview, but should work once page is saved.
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
 *
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}


$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'PageInCat',
	'descriptionmsg' => 'pageincat-desc',
	'version' => 1.1,
	'url' => 'https://mediawiki.org/wiki/Extension:PageInCat',
	'author' => '[https://mediawiki.org/wiki/User:Bawolff Brian Wolff]',
);

$dir = dirname(__FILE__) . '/';

$wgExtensionMessagesFiles['PageInCat'] = $dir . 'PageInCat.i18n.php';
$wgExtensionMessagesFiles['PageInCatMagic'] = $dir . 'PageInCat.i18n.magic.php';

$wgAutoloadClasses['PageInCat'] = $dir . 'PageInCat_body.php';

$wgHooks['ParserFirstCallInit'][] = 'PageInCat::register';
$wgHooks['ParserClearState'][] = 'PageInCat::onClearState';
$wgHooks['ParserAfterTidy'][] = 'PageInCat::onParserAfterTidy';
