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
	'pageincat-very-wrong-warn' => '\'\'\'Warning:\'\'\' The {{PLURAL:$2|category $1 was|categories $1 were}} detected incorrectly by <code><nowiki>{{#incat:...}}</nowiki></code>, and as a result this preview may be incorrect. This can be caused by including categories inside of <code><nowiki>{{#incat:...}}</nowiki></code> statements, and may result in inconsistent display.',
);

/** Message documentation (Message documentation)
 * @author Beta16
 * @author Shirayuki
 */
$messages['qqq'] = array(
	'pageincat-desc' => '{{desc|name=Page In Cat|url=http://www.mediawiki.org/wiki/Extension:PageInCat}}',
	'pageincat-wrong-warn' => 'Warning displayed during preview when editing a page if #incat parser function acted incorrectly (Acting incorrectly means acting as if page was not in category, but page actually is). This can happen during preview, since the categories from the last saved revision are used instead of the categories specified in the page text. Once page is saved, the correct categories should be used. This error can also be caused by conditional category inclusion (<code><nowiki>{{#ifpageincat:Foo||[[category:Foo]]}}</nowiki></code>. See also {{msg-mw|pageincat-very-wrong-warn}}.

*$1 is the list of categories (in a localized comma separated list with the last two items separated by {{msg-mw|and}}. The individual category names will be italicized).
*$2 is how many categories',
	'pageincat-very-wrong-warn' => "Warning displayed during preview when editing a page if #incat parser function acted incorrectly (Acting incorrectly means acting as if page was not in category, but page actually is) . This can happen if someone does something like ''put this page in category foo only if its not in category foo'' or more generally when people include category links inside <code>#incat</code> functions. Compare this to {{msg-mw|pageincat-wrong-warn}}. Generally this error message can happen when support for checking actual categories in the preview is enabled (but the category functions still behave incorrectly), the other error message will be triggered when such support is disabled.

*$1 is the list of categories (in a localized comma separated list with the last two items separated by {{msg-mw|and}}. The individual category names will be italicized).
*$2 is how many categories",
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'pageincat-desc' => 'Дадае функцыю парсэра <code><nowiki>{{#incat:...}}</nowiki></code> для вызначэньня прыналежнасьці бягучай старонкі да пэўнай катэгорыі',
	'pageincat-wrong-warn' => "'''Увага:''' функцыяй <code><nowiki>{{#incat:...}}</nowiki> {{PLURAL:$2|катэгорыя «$1» была вызначаная|катэгорыі $1 былі вызначаныя}} некарэктна, таму папярэдні прагляд можа быць няправільным. Захаваная вэрсія старонкі мусіць адлюстроўвацца правільна.",
	'pageincat-very-wrong-warn' => "'''Увага:''' функцыяй <code><nowiki>{{#incat:...}}</nowiki> {{PLURAL:$2|катэгорыя «$1» была вызначаная|катэгорыі $1 былі вызначаныя}} некарэктна, таму папярэдні прагляд можа быць няправільным. Гэта магло быць выклікана ўключэньнем катэгорыяў унутры <code><nowiki>{{#incat:...}}</nowiki></code>, што магло выліцца ў няправільнае адлюстраваньне.",
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'pageincat-desc' => 'Ergänzt die Funktion <code>#incat:</code> mit der ermittelt werden kann, ob sich die aktuelle Seite in einer angegebenen Kategorie befindet',
	'pageincat-wrong-warn' => "'''Achtung:''' Die {{PLURAL:$2|Kategorie $1 wurde|Kategorien $1 wurden}} durch <code>#incat:</code> falsch erkannt. Deswegen könnte die Vorschau fehlerhaft sein. Die gespeicherte Version dieser Seite sollte korrekt angezeigt werden.",
	'pageincat-very-wrong-warn' => "'''Achtung:''' Die {{PLURAL:$2|Kategorie $1 wurde|Kategorien $1 wurden}} durch <code>#incat:</code> falsch erkannt. Deswegen könnte die Vorschau fehlerhaft sein. Dies kann durch die Angabe von Kategorien innerhalb der Funktionsangabe <code><nowiki>{{#incat:…}}</nowiki></code> verursacht werden und könnte daher zu einer inkonsistenten Anzeige führen.",
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'pageincat-desc' => 'Pśidawa parserowu funkciju <code><nowiki>{{#incat:...}}</nowiki></code>, aby zwěsćiło, lěc aktualny bok jo w pódanej kategoriji',
	'pageincat-wrong-warn' => "'''Warnowanje:''' {{PLURAL:$2|Kategorija $1 je|Kategoriji $1 stej|Kategorije $1 su|Kategorije $1 su}} se pśez <code><nowiki>{{#incat:...}}</nowiki></code> wopak {{PLURAL:$2|spóznała|spóznałej|spóznali|spóznali}}, a togodla mógał pśeglěd wopak byś. Składowana wersija boka by měła se korektnje zwobrazniś.",
	'pageincat-very-wrong-warn' => "'''Warnowanje:''' {{PLURAL:$2|Kategorija $1 jo|Kategoriji $1 stej|Kategorije $1 su|Kategorije $1 su}} se pśez <code><nowiki>{{#incat:...}}</nowiki></code> wopak {{PLURAL:$2|spóznała|spóznałej|spóznali|spóznali}}, a togodla mógał pśeglěd wopak byś. Pśicyna mógła byś, až su se kategorije do wurazow <code><nowiki>{{#incat:...}}</nowiki></code> zapśimjeli, což mógło k inkonsistentnemu zwobraznjenjeju wjasć.",
);

/** Spanish (español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'pageincat-desc' => 'Añade una función del analizador (parser), <code><nowiki>{{#incat:...}}</nowiki></code>, para determinar si la página actual está presente en una categoría especificada',
	'pageincat-wrong-warn' => "'''Atención:''' <code><nowiki>{{#incat:...}}</nowiki></code> detectó incorrectamente {{PLURAL:$2|la categoría $1|las categorías $1}}. Debido a esto, esta vista previa puede ser incorrecta. La versión guardada de esta página debería mostrarse correctamente.",
	'pageincat-very-wrong-warn' => "'''Atención:''' <code><nowiki>{{#incat:...}}</nowiki></code> detectó incorrectamente {{PLURAL:$2|la categoría $1|las categorías $1}}. Debido a esto, esta vista previa puede ser incorrecta. Esto pudo ser causado por incluir categorías dentro de sentencias <code><nowiki>{{#incat:...}}</nowiki></code>, y puede dar como resultado que no se muestre correctamente.",
);

/** Finnish (suomi)
 * @author VezonThunder
 */
$messages['fi'] = array(
	'pageincat-desc' => 'Lisää parserifunktion <code><nowiki>{{#incat:...}}</nowiki></code>, jolla voi määrittää, onko nykyinen sivu tietyssä luokassa',
	'pageincat-wrong-warn' => "'''Varoitus:''' <code><nowiki>{{#incat:...}}</nowiki></code> tunnisti {{PLURAL:$2|luokan $1|luokat $1}} virheellisesti ja siten tämä esikatselu voi olla virheellinen. Tämän sivun tallennettu versio näytettäneen oikein.",
	'pageincat-very-wrong-warn' => "'''Varoitus:''' <code><nowiki>{{#incat:...}}</nowiki></code> tunnisti {{PLURAL:$2|luokan $1|luokat $1}} virheellisesti ja siten tämä esikatselu voi olla virheellinen. Syynä voi olla luokkien sisällyttäminen <code><nowiki>{{#incat:...}}</nowiki></code>-lauseiden sisälle, mikä saattaa johtaa sivun esittämiseen epäyhtenäisesti.",
);

/** French (français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'pageincat-desc' => "Ajoute une fonction de l'analyseur <code><nowiki>{{#incat:...}}</nowiki></code> pour déterminer si la page courante est dans une catégorie spécifiée",
	'pageincat-wrong-warn' => "'''Attention:''' {{PLURAL:$2|La catégorie $1a mal été détectée|Les catégories $1 ont mal été détectées}} par <code><nowiki>{{#incat:...}}</nowiki></code>, et par conséquent, cet aperçu peut être incorrect. La version enregistrée de cette page devrait être affichée correctement.",
	'pageincat-very-wrong-warn' => "'''Attention:''' {{PLURAL:$2|La catégorie $1a été mal détectée|Les catégories $1ont été mal détectées}} par <code><nowiki>{{#incat:...}}</nowiki></code>, et par conséquent cet aperçu peut être incorrect. Cela peut être causé par des catégories incluses à l'intérieur des déclarations <code><nowiki>{{#incat:...}}</nowiki></code>, et peut provoquer un affichage incohérent.",
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'pageincat-desc' => 'Engade unha función analítica, <code><nowiki>{{#incat:...}}</nowiki></code>, para determinar se a páxina actual está presente nunha categoría especificada',
	'pageincat-wrong-warn' => "'''Atención:''' <code><nowiki>{{#incat:...}}</nowiki></code> detectou incorrectamente {{PLURAL:$2|a categoría $1|as categorías $1}}. Debido a isto, esta vista previa pode non ser correcta. A versión gardada da páxina debería mostrarse correctamente.",
	'pageincat-very-wrong-warn' => "'''Atención:''' <code><nowiki>{{#incat:...}}</nowiki></code> detectou incorrectamente {{PLURAL:$2|a categoría $1|as categorías $1}}. Debido a isto, esta vista previa pode non ser correcta. Poida que incluíse categorías dentro de declaracións <code><nowiki>{{#incat:...}}</nowiki></code>, o que pode provocar que non se mostre correctamente.",
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'pageincat-desc' => 'הוספת פונקציית מפענח <code dir="ltr"><nowiki>{{#incat:...}}</nowiki></code> שמחליטה אם הדף הנוכחי שייך לקטגוריה הנתונה',
	'pageincat-wrong-warn' => "'''אזהרה:''' {{PLURAL:\$2|הקטגוריה|הקטגוריות}} \$1 זוהו לא נכון על־ידי <code dir=\"ltr\"><nowiki>{{#incat:...}}</nowiki></code>, וכתוצאה מזה התצגוה המקדימה עשויה להיות שגויה. הגרסה השמורה של הדף הזה אמורה להיות מוצגת נכון.",
	'pageincat-very-wrong-warn' => '\'\'\'אזהרה:\'\'\' {{PLURAL:$2|הקטגוריה|הקטגוריות}} $1 זוהו לא נכון על־ידי <code dir="ltr"><nowiki>{{#incat:...}}</nowiki></code>, וכתוצאה מזה התצגוה המקדימה עשויה להיות שגויה. ייתכן שזה קרה בגלל הכללת קטגוריות בתוך הצהרות <code dir="ltr"><nowiki>{{#incat:...}}</nowiki></code>, וזה יכול לגרום לתצוגה בלתי־עקיבה.',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'pageincat-desc' => 'Přidawa parserowu funkciju <code><nowiki>{{#incat...}}</nowiki></code>, zo by zwěsćiło, hač aktualna strona je w podatej kategoriji',
	'pageincat-wrong-warn' => "'''Warnowanje:''' {{PLURAL:$2|Kategorija $1 je|Kategoriji $1 stej|Kategorije $1 su|Kategorije $1 su}} so přez <code><nowiki>{{#incat:...}}</nowiki></code> wopak {{PLURAL:$2|spóznała|spóznałoj|spóznali|spóznali}}, a tohodla móhł přehlad wopak być. Składowana wersija strony měła so korektnje zwobraznić.",
	'pageincat-very-wrong-warn' => "'''Warnowanje:''' {{PLURAL:$2|Kategorija $1 je|Kategoriji $1 stej|Kategorije $1 su|Kategorije $1 su}} so přez <code><nowiki>{{#incat:...}}</nowiki></code> wopak {{PLURAL:$2|spóznała|spóznałoj|spóznali|spóznali}}, a tohodla móhł přehlad wopak być. Přičina móhła być, zo su so kategorije do wurazow <code><nowiki>{{#incat:...}}</nowiki></code> zapřijeli, štož móhło k inkonsistentnemu zwobraznjenju wjesć.",
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'pageincat-desc' => 'Adde al analysator syntactic un function <code><nowiki>{{#incat:...}}</nowiki></code> pro determinar si le pagina actual es in un categoria specificate',
	'pageincat-wrong-warn' => "'''Attention:''' Le {{PLURAL:$2|categoria|categorias}} $1 esseva detegite incorrectemente per <code><nowiki>{{#incat:...}}</nowiki></code>, e como resultato, iste previsualisation pote esser incorrecte. Le version salveguardate de iste pagina deberea esser presentate in le maniera correcte.",
	'pageincat-very-wrong-warn' => "'''Attention:''' Le {{PLURAL:$2|categoria|categorias}} $1 esseva detegite incorrectemente per <code><nowiki>{{#incat:...}}</nowiki></code>, e como resultato, iste previsualisation pote esser incorrecte. Isto pote esser causate per includer categorias intra commandos <code><nowiki>{{#incat:...}}</nowiki></code>, e pote resultar in un presentation inconsistente.",
);

/** Italian (italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'pageincat-desc' => 'Aggiunge la funzione parser <code><nowiki>{{#incat:...}}</nowiki></code> per determinare se la pagina corrente è in una determinata categoria',
	'pageincat-wrong-warn' => "'''Attenzione:''' {{PLURAL:$2|la categoria $1 è stata rilevata|le categorie $1 sono state rilevate}} non correttamente da <code><nowiki>{{#incat:...}}</nowiki></code>, e questa anteprima potrebbe risultare errata. La versione salvata di questa pagina dovrebbe essere mostrata in maniera corretta.",
	'pageincat-very-wrong-warn' => "'''Attenzione:''' {{PLURAL:$2|la categoria $1 è stata rilevata|le categorie $1 sono state rilevate}} non correttamente da <code><nowiki>{{#incat:...}}</nowiki></code>, e questa anteprima potrebbe risultare errata. Può essere causato dall'inclusione di categorie all'interno del codice <code><nowiki>{{#incat:...}}</nowiki></code>, e può produrre una visualizzazione inconsistente.",
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'pageincat-desc' => '現在のページが指定したカテゴリに属するか判定する、パーサー関数 <code><nowiki>{{#incat:...}}</nowiki></code> を追加する',
	'pageincat-wrong-warn' => "'''警告:''' {{PLURAL:$2|カテゴリ「$1」}}に関する <code><nowiki>{{#incat:...}}</nowiki></code> の判定は間違っており、そのためこのプレビューも間違っているおそれがあります。このページを保存した版は正しく表示されるはずです。",
	'pageincat-very-wrong-warn' => "'''警告:''' {{PLURAL:$2|カテゴリ「$1」}}に関する <code><nowiki>{{#incat:...}}</nowiki></code> の判定は間違っており、そのためこのプレビューも間違っているおそれがあります。これはカテゴリを <code><nowiki>{{#incat:...}}</nowiki></code> 文の中に含めると起こることがあり、表示が食い違ってしまうことがあります。",
);

/** Korean (한국어)
 * @author 아라
 */
$messages['ko'] = array(
	'pageincat-desc' => '현재 문서가 특정 분류에 있는지 확인하는 <code><nowiki>{{#incat:...}}</nowiki></code> 파서 함수 추가',
	'pageincat-wrong-warn' => "'''경고:''' {{PLURAL:$2|$1 분류|$1 분류}}는 <code><nowiki>{{#incat:...}}</nowiki></code>로 잘못 감지했고 결과 미리 보기가 잘못되었을 수 있습니다. 이 문서의 저장한 버전은 올바른 방식으로 보여야 합니다.",
	'pageincat-very-wrong-warn' => "'''경고:''' {{PLURAL:$2|$1 분류|$1 분류}}는 <code><nowiki>{{#incat:...}}</nowiki></code>로 잘못 감지했고 결과 미리 보기가 잘못되었을 수 있습니다. 문장 안쪽에 분류를 포함하여 발생될 수 있으며, 일관성이 없이 보여질 수 있습니다.",
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'pageincat-desc' => 'Brängk de Funxjuhn <code lang="en"><nowiki>{{#incat:…}}</nowiki></code> en et Wiki, di eruß fenge kann, of en Sigg en ene beschtemmpte Saachjrobb_es.',
	'pageincat-wrong-warn' => "'''Opjepaß:''' De {{PLURAL:$2|Saachjropp $1 wood|Saachjroppe $1 woodte|-}} nit reeschtesch äkannt vun <code><nowiki>{{#incat:...}}</nowiki></code>, un dröm es heh di Vörschau velleisch verkiehrt. Eets ens afjescheischert sullt di Sigg ävver reeschtesch aanjezeisch wääde.",
	'pageincat-very-wrong-warn' => "'''Opjepaß:''' De {{PLURAL:$2|Saachjropp $1 wood|Saachjroppe $1 woodte|-}} nit reeschtesch äkannt vun <code><nowiki>{{#incat:...}}</nowiki></code>, un dröm es heh di Vörschau velleisch verkiehrt. Dat künnt dervon kumme, dat Saachjroppe en <code><nowiki>{{#incat:...}}</nowiki></code> enjeschloße sin un määt, dat di Sigg nit einheitlesch aanjezeisch wääde künnt.",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'pageincat-desc' => 'Setzt eng Parserfonctioun  <code><nowiki>{{#incat:...}}</nowiki></code> derbäi fir festzestellen ob déi aktuell Säit an enger spezifescher Kategorie dran ass',
	'pageincat-wrong-warn' => "'''Opgepasst:''' D'{{PLURAL:$2|Kategorie $1 gouf|Kategorien $1 goufen}} net korrekt duerch <code><nowiki>{{#incat:...}}</nowiki></code> erkannt, an doduerch kann dës net-gespäichert Versioun vun der Säit net korrekt sinn. Déi gespäichert Versioun vun dëser Säit misst richteg gewise ginn.",
	'pageincat-very-wrong-warn' => "'''Opgepasst:''' D'{{PLURAL:$2|Kategorie $1 gouf|Kategorie(n) $1 goufen}} duerch <code>#incat:</code> falsch erkannt. Dofir kann dat wat hei drënner gewise gëtt falsch sinn. Dat kann doduer kommen datt Kategorien an d'Funktion <code><nowiki>{{#incat:...}}</nowiki></code> dragesat goufen an dat kann dozou féieren datt dat wat gewise gëtt net koherent ass.",
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'pageincat-desc' => 'Додава парсерска функција <code><nowiki>{{#incat:...}}</nowiki></code> за да се утврди дали тековната страница стои во назначена категорија',
	'pageincat-wrong-warn' => "'''ПРЕДУПРЕДУВАЊЕ:''' {{PLURAL:$2|Категоријата $1 е погрешно утврдена|Категориите $1 се погрешно утврдени}} од страна на <code><nowiki>{{#incat:...}}</nowiki></code>. Поради тоа, овој преглед може да е неисправен. Зачуваната верзија на страницава треба да се прикажува на правилен начин.",
	'pageincat-very-wrong-warn' => "'''Предупредување:''' {{PLURAL:$2|Категоријата $1 е погрешно утврдена|Категориите $1 се погрешно утврдени}} од страна на <code><nowiki>{{#incat:...}}</nowiki></code>. Поради тоа, овој преглед може да е неисправен. Една можна причина е ако има категории ставени во искази со <code><nowiki>{{#incat:...}}</nowiki></code>. Проблемот може да произлегува и од недоследен приказ.",
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'pageincat-desc' => 'Voegt de parserfunctie <code><nowiki>{{#incat:...}}</nowiki></code> toe om te bepalen of de huidige pagina in een bepaalde categorie valt',
	'pageincat-wrong-warn' => "'''Waarschuwing:''' De {{PLURAL:$2|categorie $1 is|categorieën $1 zijn}} onjuist gedetecteerd door <code><nowiki>{{#incat:...}}</nowiki></code>, en als gevolg daarvan kan deze voorvertoning onjuist zijn. De opgeslagen versie van deze pagina zou op de juiste manier weergegeven moeten worden.",
	'pageincat-very-wrong-warn' => "'''Waarschuwing:''' De {{PLURAL:$2|categorie $1 is|categorieën $1 zijn}} onjuist gedetecteerd door <code><nowiki>{{#incat:...}}</nowiki></code>, en als gevolg daarvan kan deze voorvertoning onjuist zijn. Dit kan veroorzaakt worden door categorieën toe te voegen binnen <code><nowiki>{{#incat:...}}</nowiki></code> , en kan leiden tot inconsistente weergave.",
);

/** Polish (polski)
 * @author BeginaFelicysym
 */
$messages['pl'] = array(
	'pageincat-desc' => 'Dodaje funkcję analizatora <code><nowiki>{{#incat:...}}</nowiki></code> ustalającą, czy bieżąca strona jest w określonej kategorii',
	'pageincat-wrong-warn' => "'''Ostrzeżenie:'''  {{PLURAL:$2| kategoria $1 została nieprawidłowo wykryta|kategorie $1 zostały nieprawidłowo wykryte}} przez <code><nowiki>{{#incat:...}}</nowiki></code>, w wyniku czego podgląd może być niepoprawny. Zapisana wersja tej strony powinna być wyświetlona w odpowiedni sposób.",
	'pageincat-very-wrong-warn' => "'''Ostrzeżenie:'''  {{PLURAL:$2| kategoria $1 została  nieprawidłowo wykryta|kategorie $1 zostały nieprawidłowo wykryte}} przez <code><nowiki>{{#incat:...}}</nowiki></code>, w wyniku czego podgląd może być niepoprawny. Może to być spowodowane przez dołączenie kategorii wewnątrz deklaracji <code><nowiki>{{#incat:...}}</nowiki></code> i może powodować niespójne wyświetlanie.",
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'pageincat-desc' => "A gionta na funsion ëd l'analisator <code><nowiki>{{#incat:...}}</nowiki></code> për determiné se la pàgina corenta a l'é ant na categorìa spessificà",
	'pageincat-wrong-warn' => "'''Avis:''' {{PLURAL:$2|La categorìa $1 a l'é nen ëstàita|Le categorìe $1 a j'ero nen ëstàite}} andividuà për da bin da <code><nowiki>{{#incat:...}}</nowiki></code>, e com arzultà sta preuva a podrìa esse cioca. La version salvà ëd costa pàgina a dovrìa esse visualisà ant la manera giusta.",
	'pageincat-very-wrong-warn' => "'''Avis:''' {{PLURAL:$2|La categorìa $1 a l'é ne ëstàita|Le categorìe $1 a son nen ëstàite}} andividuà për da bin da <code><nowiki>{{#incat:...}}</nowiki></code>, e com arzultà costa previsualisassion a podrìa esse cioca. Sòn a peul esse causà da l'anclusion ëd le categorìe andrinta a l'istrussion <code><nowiki>{{#incat:...}}</nowiki></code>, e a peul arzulté an na visualisassion incoerenta.",
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'pageincat-desc' => "Aggiunge 'na funzione analizzatrice <code><nowiki>{{#incat:...}}</nowiki></code> pe deteminà ce 'a pàgene de mò stè jndr'à 'na categorije specifiche",
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'pageincat-desc' => 'Nagdaragdag ng isang tungkuling pambanghay na <code><nowiki>{{#incat:...}}</nowiki></code> upang malaman kung ang pangkasalukuyang pahina ay nasa loob ng isang tinukoy na kategorya',
	'pageincat-wrong-warn' => "'''Babala:''' Ang {{PLURAL:$2|kategoryang $1 ay|mga kategoryang $1 ay}} na may kamaliang napansin ng <code><nowiki>{{#incat:...}}</nowiki></code>, at bilang isang resulta ang paunang tingin ay maaaring hindi tama. Ang nasagip na rebisyon ng pahinang ito ay dapat na maipakitang nasa tamang pamamaraan.",
	'pageincat-very-wrong-warn' => "'''Babala:''' Hindi tama ang pagpansin ng <code><nowiki>{{#incat:...}}</nowiki></code> sa {{PLURAL:$2|kategoryang $1|mga kategoryang $1}}, at bilang isang resulta ang paunang tingin ay maaaring hindi tama. Maaari itong naidulot ng pagsasama ng mga kategorya sa loob ng mga pagpapahayag ng <code><nowiki>{{#incat:...}}</nowiki></code>, at maaaring magresulta sa pagbabagu-bago ng ipinapakita.",
);

/** Ukrainian (українська)
 * @author Base
 */
$messages['uk'] = array(
	'pageincat-desc' => 'Додає функцію парсера <code><nowiki>{{#incat:...}}</nowiki></code> для визначення приналежності поточної сторінки до певної категорії',
	'pageincat-wrong-warn' => "'''Увага:''' функцією <code><nowiki>{{#incat:...}}</nowiki></code> {{PLURAL:$2|категорію $1|категорії $1 were}} було визначено некоректно, тому результат у попередньому перегляді може бути неправильним. Збережена версія повинна відображати все коректно.",
	'pageincat-very-wrong-warn' => "'''Увага:''' функцією <code><nowiki>{{#incat:...}}</nowiki></code> {{PLURAL:$2|категорію $1|категорії $1 were}} було визначено некоректно, тому результат у попередньому перегляді може бути неправильним. Це могло бути викликаним через включення категорій усередині виразу <code><nowiki>{{#incat:...}}</nowiki></code>, що могло викликати неправильне відображення.",
);

/** Simplified Chinese (中文（简体）‎)
 * @author Yfdyh000
 */
$messages['zh-hans'] = array(
	'pageincat-desc' => '添加一个解析器函数<code><nowiki>{{#incat:...}}</nowiki></code>确定当前页面是否在指定的分类里',
);
