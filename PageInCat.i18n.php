<?php
/**
 * Internationalisation file for extension PageInCat
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'pageincat-desc' => 'Adds a parser function <code><nowiki>{{#incat:...}}</nowiki></code> to determine if the current page is in a specified category',
	'pageincat-wrong-warn' => '\'\'\'Warning:\'\'\' The {{PLURAL:$2|category $1 was|categories $1 were}} detected incorrectly by <code><nowiki>{{#incat:...}}</nowiki></code>, and as a result this preview may be incorrect. The saved version of this page should be displayed in the correct manner.',
);

/** Message documentation (Message documentation) */
$messages['qqq'] = array(
	'pageincat-wrong-warn' => 'Warning displayed during preview when editing a page if #incat parser function acted incorrectly (Acting incorrectly means acting as if page was not in category, but page actually is) . This can happen during preview, since the categories from the last saved revision are used instead of the categories specified in the page text. Once page is saved, the correct categories should be used. This error can also be caused by conditional category inclusion (<code><nowiki>{{#ifpageincat:Foo||[[category:Foo]]}}</nowiki></code>

*$1 is the list of categories (in a localized comma seperated list with the last two items separated by {{msg-mw|and}}. The individual category names will be italicized).
*$2 is how many categories',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'pageincat-desc' => 'Ergänzt die Parserfunktion <code>#incat:</code> mit der ermittelt werden kann, ob sich die aktuelle Seite in einer angegebenen Kategorie befindet',
	'pageincat-wrong-warn' => "'''Achtung:''' Die {{PLURAL:$2|Kategorie $1 wurde|Kategorien $1 wurden}} durch <code><nowiki>{{#incat:…}}</nowiki></code> falsch erkannt. Dadurch ist die Vorschau falsch. Die gespeicherte Version dieser Seite sollte korrekt angezeigt werden.",
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'pageincat-desc' => 'Pśidawa parserowu funkciju <code><nowiki>{{#incat:...}}</nowiki></code>, aby zwěsćiło, lěc aktualny bok jo w pódanej kategoriji',
	'pageincat-wrong-warn' => "'''Warnowanje:''' {{PLURAL:$2|Kategorija $1 je|Kategoriji $1 stej|Kategorije $1 su|Kategorije $1 su}} se pśez <code><nowiki>{{#incat:...}}</nowiki></code> wopak {{PLURAL:$2|spóznała|spóznałej|spóznali|spóznali}}, a togodla mógał pśeglěd wopak byś. Składowana wersija boka by měła se korektnje zwobrazniś.",
);

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'pageincat-desc' => "Ajoute une fonction de l'analyseur <code><nowiki>{{#incat:...}}</nowiki></code> pour déterminer si la page courante est dans une catégorie spécifiée",
	'pageincat-wrong-warn' => "'''Attention:''' {{PLURAL:$2|La catégorie $1a mal été détectée|Les catégories $1 ont mal été détectées}} par <code><nowiki>{{#incat:...}}</nowiki></code>, et par conséquent, cet aperçu peut être incorrect. La version enregistrée de cette page devrait être affichée correctement.",
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'pageincat-desc' => 'Engade unha función analítica, <code><nowiki>{{#incat:...}}</nowiki></code>, para determinar se a páxina actual está presente nunha categoría especificada',
	'pageincat-wrong-warn' => "'''Atención:''' <code><nowiki>{{#incat:...}}</nowiki></code> detectou incorrectamente {{PLURAL:$2|a categoría $1|as categorías $1}}. Debido a isto, esta vista previa pode non ser correcta. A versión gardada da páxina debería mostrarse correctamente.",
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'pageincat-desc' => 'Přidawa parserowu funkciju <code><nowiki>{{#incat...}}</nowiki></code>, zo by zwěsćiło, hač aktualna strona je w podatej kategoriji',
	'pageincat-wrong-warn' => "'''Warnowanje:''' {{PLURAL:$2|Kategorija $1 je|Kategoriji $1 stej|Kategorije $1 su|Kategorije $1 su}} so přez <code><nowiki>{{#incat:...}}</nowiki></code> wopak {{PLURAL:$2|spóznała|spóznałoj|spóznali|spóznali}}, a tohodla móhł přehlad wopak być. Składowana wersija strony měła so korektnje zwobraznić.",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'pageincat-desc' => 'Setzt eng Parserfonctioun  <code><nowiki>{{#incat:...}}</nowiki></code> derbäi fir festzestellen ob déi aktuell Säit an enger spezifescher Kategorie dran ass',
	'pageincat-wrong-warn' => "'''Opgepasst:''' D'{{PLURAL:$2|Kategorie $1 gouf|Kategorien $1 goufen}} net korrekt duerch <code><nowiki>{{#incat:...}}</nowiki></code> erkannt, an doduerch kann dës net-gespäichert Versioun vun der Säit net korrekt sinn. Déi gespäichert Versioun vun dëser Säit misst richteg gewise ginn.",
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'pageincat-desc' => 'Додава парсерска функција <code><nowiki>{{#incat:...}}</nowiki></code> за да се утврди дали тековната страница стои во назначена категорија',
	'pageincat-wrong-warn' => "'''ПРЕДУПРЕДУВАЊЕ:''' {{PLURAL:$2|Категоријата $1 е погрешно утврдена|Категориите $1 се погрешно утврдени}} од страна на <code><nowiki>{{#incat:...}}</nowiki></code>. Ппоради тоа, овој преглед може да е неисправен. Зачуваната верзија на страницава треба да се прикажува на правилен начин.",
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'pageincat-desc' => 'Voegt de parserfunctie <code><nowiki>{{#incat:...}}</nowiki></code> toe om te bepalen of de huidige pagina in een bepaalde categorie valt',
);

