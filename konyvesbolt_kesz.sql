-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Júl 18. 19:44
-- Kiszolgáló verziója: 10.1.21-MariaDB
-- PHP verzió: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `konyvesbolt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `emberek`
--

CREATE TABLE `emberek` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `jelszo` varchar(45) NOT NULL,
  `email` varchar(90) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `cim` varchar(45) NOT NULL,
  `szulido` date NOT NULL,
  `jog` enum('admin','felhasznalo') NOT NULL DEFAULT 'felhasznalo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `emberek`
--

INSERT INTO `emberek` (`id`, `nev`, `jelszo`, `email`, `tel`, `cim`, `szulido`, `jog`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@bookstory.local', '05123456789', 'Szeged', '1996-04-14', 'admin'),
(2, 'proba', 'probapw', 'prba@vipamadnj.ak', '123', 'Szeged', '1996-04-12', 'admin'),
(5, 'István', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'adwe@fhs.le', '321', 'Szeged', '1996-04-14', 'felhasznalo'),
(6, 'Desh', '2a6571da26602a67be14ea8c5ab82349', 'Das@gasd.dsa', '05602458785', 'Szentes', '1245-12-25', 'felhasznalo'),
(7, 'júli egy három', 'efc847fa5a386a38fcc9d0573bb87272', 'juli@gmail.com', '12012345678', 'Pécs', '1978-11-12', 'felhasznalo'),
(8, 'júli egy öt', '8df707a948fac1b4a0f97aa554886ec8', '715@gmail.com', '06715', 'Budapest', '1985-11-10', 'felhasznalo');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `emberek_has_konyv`
--

CREATE TABLE `emberek_has_konyv` (
  `emberek_id` int(11) NOT NULL,
  `konyv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `iro`
--

CREATE TABLE `iro` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `iro`
--

INSERT INTO `iro` (`id`, `nev`) VALUES
(7, 'éva'),
(6, 'géza'),
(1, 'J. K. Rowling'),
(3, 'J. R. R. Tolkien'),
(2, 'Stephen King'),
(4, 'Suzanne Collins');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `id` int(11) NOT NULL,
  `nev` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`id`, `nev`) VALUES
(1, 'Állattörténet'),
(2, 'Családregény'),
(3, 'Dokumentumregény'),
(4, 'Dráma'),
(5, 'Fantasy'),
(6, 'Gyermekirodalom'),
(7, 'Horror'),
(8, 'Ifjúsági novellák'),
(9, 'Ifjúsági regény'),
(10, 'Igaz történet'),
(11, 'Irodalom'),
(12, 'Ismeretterjesztő'),
(13, 'Képregény'),
(14, 'Krimi'),
(15, 'Lányregény'),
(16, 'Memoár'),
(17, 'Mese'),
(18, 'Meseregény'),
(19, 'Naplóregény'),
(20, 'Regény'),
(21, 'Sci-fi'),
(22, 'Szórakoztató irodalom'),
(23, 'Thriller');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak_has_konyv`
--

CREATE TABLE `kategoriak_has_konyv` (
  `konyv_id` int(11) NOT NULL,
  `kategoriak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kategoriak_has_konyv`
--

INSERT INTO `kategoriak_has_konyv` (`konyv_id`, `kategoriak_id`) VALUES
(26, 1),
(27, 1),
(26, 2),
(28, 2),
(15, 3),
(28, 3),
(23, 4),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(29, 5),
(7, 7),
(8, 7),
(9, 7),
(23, 7),
(5, 9),
(6, 9),
(11, 9),
(12, 9),
(13, 9),
(28, 12),
(27, 17),
(5, 18),
(6, 18),
(10, 18),
(7, 20),
(8, 20),
(9, 20),
(10, 20),
(11, 20),
(12, 20),
(13, 20),
(11, 21),
(12, 21),
(13, 21),
(7, 23),
(8, 23),
(9, 23);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kiado`
--

CREATE TABLE `kiado` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kiado`
--

INSERT INTO `kiado` (`id`, `nev`) VALUES
(4, 'Allen & Unwin'),
(2, 'Bloomsbury Publishing plc'),
(1, 'Donald M. Grant, Publisher, Inc'),
(7, 'Gárdonyi Könyvmágus'),
(8, 'Haza Második Legnagyobb Könyvkiadó'),
(5, 'Hazai Nagykönyv'),
(3, 'Scholastic Corporation');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konyv`
--

CREATE TABLE `konyv` (
  `id` int(11) NOT NULL,
  `nev` varchar(45) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `oldalak` int(11) NOT NULL,
  `megjelenes` date NOT NULL,
  `nyelv` varchar(45) NOT NULL,
  `ismerteto` longtext,
  `iro_idiro` int(11) DEFAULT NULL,
  `kiado_id` int(11) DEFAULT NULL,
  `statusz` tinyint(1) DEFAULT NULL,
  `darab` int(11) DEFAULT NULL,
  `ar` int(11) NOT NULL,
  `rendeles_id` int(11) DEFAULT NULL,
  `molylink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `konyv`
--

INSERT INTO `konyv` (`id`, `nev`, `isbn`, `oldalak`, `megjelenes`, `nyelv`, `ismerteto`, `iro_idiro`, `kiado_id`, `statusz`, `darab`, `ar`, `rendeles_id`, `molylink`) VALUES
(5, 'Harry ​Potter és a bölcsek köve', '9789633244548', 336, '1997-06-26', 'Magyar', 'A Harry Potterről szóló, hétkötetesre tervezett regényfolyam első része. A könyvben megismerkedhetünk többek között a Roxfort varázslóiskolával, Harryvel, a varázslópalántával, és tanúi lehetünk csodálatosan izgalmas kalandjainak. \"Harry Potter kisfiú, történetünk kezdetén 11 éves, valamint varázsló is, talán a leghatalmasabb varázsló, a kiválasztott, aki meg tud küzdeni a gonosz erőivel, erről azonban fogalma sincs. (..) Harry aztán egy napon levelet kap, pontosabban néhány tízezer levelet, a biztonság kedvéért, mivel a nagybácsi elkobzós kedve magasra hág, amelyből megtudja, hogy a következő szemesztert Roxfortban kezdheti, a világ legnevesebb bentlakásos varázslóiskolájában, amely nem kis mértékben hasonlít a brit iskolarendszer hírhedett public schooljaira, talán attól eltekintve, hogy koedukált. Harry, a kifosztott árva ekkor belép abba a világba, amelyhez szülei is tartoztak, hogy megküzdjön azzal a Ki-Ne-Mondd-A-Nevét sötét erővel, amely árvává tette. Harry kiválasztott, homlokán a jegy, de egyben közönséges nebuló is, akinek minden kiválasztottsága ellenére fel kell mutatnia valamit, esetünkben kiemelkedő sportteljesítményt és kellő csapatszellemet, hogy elnyerje az egyszerű diáktársat megillető tiszteletet, és megússza valahogy a vizsgáit. A Gonosz Erőt nem könnyű legyőzni, de egy elitiskola hierarchiájában kiküzdeni valami helyet, főként, ha az alsóbbrendű muglik között nevelkedett az ember, és mit sem tud a magasabb bűbájról, az még nehezebb. Több tucatnyi sajtótermék próbált már magyarázatot találni Harry Potter sikerére. Kezdjük talán azzal, hogy a könyv jó, szellemes, technikás, sodorja az olvasót, és ez elmondható a magyar kiadásról is, amely eltalálta a helyes középutat a máris nemzetközi kultusz tárgyát alkotó invenciók (Muggle: a tökfej normális világ, Quidditsch: a nagy nemzeti varázsló sport) túlzott magyarítása és elvtelen átvétele között.\" Babarczi Eszter, MagyarNarancs, 2000\r\n', 1, 2, 1, 5, 1990, NULL, 'https://moly.hu/konyvek/j-k-rowling-harry-potter-es-a-bolcsek-kove'),
(6, 'Harry Potter és a Titkok Kamrája', '9789633244814', 318, '1998-07-02', 'Magyar', 'Könyvünk címszereplőjével, a varázslónak tanuló kiskamasszal már megismerkedhettünk a \"Harry Potter és a bölcsek köve\" című meseregényben. A mű és szerzője gyorsan világhírnévre tett szert. Harry varázslónak született. Második tanéve a Roxfort Boszorkány - és Varázslóképző Szakiskolában éppen olyan eseménydúsnak bizonyult, mint amilyen az első volt. Lekési a különvonatot, így barátai repülő autóján érkezik tanulmányai színhelyére. S a java csak ezután következik...', 1, 2, 1, 3, 2590, NULL, 'https://moly.hu/konyvek/j-k-rowling-harry-potter-es-a-titkok-kamraja'),
(7, 'A Setét Torony 1. - A harcos', '9789630796590', 296, '1982-06-10', 'Magyar', 'Stephen King, a thriller koronázatlan királya ezúttal a fantasy birodalmában kalandozik. E regényfolyam egyes darabjai önállóan is megállják helyüket, ám természetesen a kötetek együtt alkotnak kerek egészt. A harcos főhőse Roland vitéz, ez az eleinte múlt és jövő nélküli férfi, saját világának-civilizációjának utolsó képviselője. Végtelen sivatagokon, lepusztult településeken át, elkorcsosult emberekkel, mutánsokkal megküzdve követi-üldözi ellenségét, a feketébe öltözött embert. Útjukat vér és pusztulás jelzi. Miért ez a megszállottság, hogy eljusson a Setét Toronyba? Talán ott megleli minden rejtélyek kulcsát? És ki a feketébe öltözött ember, ez a titkok ismerője, alakját váltogató varázsló? Netán maga a Sátán? E kérdésekre választ talál, Kedves Olvasó, ha végigizgulja Roland megpróbáltatásait, szerelmeit, kalandjait az összes köteten át, hogy végül a Setét Toronyban fény derüljön minden rejtélyre, s tán a Jó és a Gonosz örök párharca is eldől.', 2, 1, 1, 13, 2790, NULL, 'https://moly.hu/konyvek/stephen-king-a-setet-torony-a-harcos'),
(8, 'A Setét Torony 2 - A hármak elhívatása', '9789630796743', 536, '1987-05-01', 'Magyar', 'A harcos-ban megismert Roland sebesülten, betegen, ám rendíthetetlenül halad célja, a titokzatos Setét Torony felé. Kietlen, veszélyekkel terhes vidéken visz az útja, ahol váratlanul egy ajtóba ütközik, amely az 1980-as évek New Yorkjába nyílik. A harcosnak át kell mennie ebbe a másik világba, hogy elhívja magával segítőtársait, akiket a feketébe öltözött ember cigánykártyán megjósolt neki. Így fonódik össze Roland, a harcos, Eddie Dean, a drogcsempész, Odetta Holmes, a gyönyörű, okos, ám egy balesetben megnyomorodott fekete lány, valamint Jack Mort, a gyilkos hajlamú könyvelő sorsa. A hármak elhívatása lélegzetelállító kalandokban bővelkedő, az - elmozdult világokban - játszódó könyv, amely, bár nem zárul le benne a főhősök sorsa, mégis élvezetes olvasmány.', 2, 1, 1, 2, 2990, NULL, 'https://moly.hu/konyvek/stephen-king-a-setet-torony-a-harmak-elhivatasa'),
(9, 'A Setét Torony 3. - Puszta Földek', '9789630797023', 695, '1991-08-01', 'Magyar', 'Roland és barátai, Eddie és Susannah Dean elszántan haladnak úti céljuk, a titokzatos Setét Torony felé. A homárszörnyekkel sikeresen megküzdöttek ugyan, ám megpróbáltatásaiknak koránt sincs vége. Új ellenséggel találják szemközt magukat, a félig gép, félig állat ősöreg óriási medvével. Elhívják Jake-et, azt a kisfiút, akit a harcos annak idején kénytelen volt feláldozni. Lud, az egykor szupercivilizált-technicizált város (talán a valahai New York?) - amelyet feltehetőleg szörnyűséges nukleáris katasztrófa pusztított el - romjai között élethalálharcot vívnak a testileg-lelkileg eltorzult, vérszomjas túlélőkkel. Kimerült, ám tántoríthatatlan hőseink folytatják útjukat. Sikerül-e elérniük a Setét Tornyot, s ott vajon mi vár rájuk?', 2, 1, 1, 7, 3590, NULL, 'https://moly.hu/konyvek/stephen-king-a-setet-torony-puszta-foldek'),
(10, 'A Gyűrűk Ura - A Gyűrű Szövetsége', '9635393350', 432, '1954-07-29', 'Magyar', 'A ​Gyűrűk Ura tündérmese. Mégpedig – legalábbis terjedelmét tekintve – alighanem minden idők legnagyobb tündérmeséje. Tolkien képzelete szabadon, ráérősen kalandozik a könyv három vaskos kötetében – vagyis abban a képzelt időben, mikor a világ sorát még nem az ember szabta meg, hanem a jót és szépet, a gonoszat és álnokot egyaránt ember előtti lények, ősi erők képviselték. Abban az időben, mikor a mi időszámításunk előtt ki tudja, hány ezer, tízezer esztendővel a Jó kisebbségbe szorult erői szövetségre léptek, hogy a Rossz erőit legyőzzék: tündérek, féltündék, az ősi Nyugat-földe erényeit őrző emberek, törpök és félszerzetek, erdő öregjei fogtak össze, hogy a jó varázslat eszközével, s a nagy mágus, Gandalf vezetésével végül győzelmet arassanak, de épp e győzelem következtében elenyésszen az ő idejük, s az árnyak birodalmába áthajózva átadják a földet új urának, az emberfajnak.', 3, 4, 0, 0, 2990, NULL, 'https://moly.hu/konyvek/j-r-r-tolkien-a-gyuruk-ura'),
(11, 'Az Éhezők Viadala', '9786155049675', 390, '2008-09-14', 'Angol', 'Életben tudsz maradni egy olyan vadonban, ahol mindenki az életedre tör? Észak-Amerika romjain ma Panem országa, a ragyogó Kapitólium és a tizenkét távoli körzet fekszik. A Kapitólium kegyetlenül bánik Panem lakóival: minden évben, minden körzetből kisorsolnak egy-egy tizenkét és tizennyolc év közötti fiút és lányt, akiknek részt kell venniük Az Éhezők Viadalán. Az életre-halálra zajló küzdelmet élőben közvetíti a tévé. A tizenhat éves Katniss Everdeen egyedül él a húgával és az anyjával a Tizenkettedik Körzetben. Amikor a húgát kisorsolják, Katniss önként jelentkezik helyette a Viadalra, ez pedig felér egy halálos ítélettel. De Katniss már nem először néz farkasszemet a halállal - számára a túlélés a mindennapok része. Ha győzni akar, olyan döntéseket kell hoznia, ahol az életösztön szembe kerül az emberséggel, az élet pedig a szerelemmel.\r\n\r\nSuzanne Collins trilógiája az utóbbi évek legnagyobb nemzetközi könyvsikere, amely hónapokon át vezette az eladási listákat a világ számos országában. 2012 márciusában pedig a mozikba kerül Az Éhezők Viadala filmváltozata, Jennifer Lawrence-szel a főszerepben.', 4, 3, 1, 2, 2590, NULL, 'https://moly.hu/konyvek/suzanne-collins-az-ehezok-viadala'),
(12, 'Futótűz', '9786155049729', 403, '2009-09-01', 'Angol', 'Katniss és Peeta megnyerték az Éhezők Viadalát, így ők és a családjaik megmenekültek az éhezéstől, de a fiatalok nem ülhetnek nyugodtan a babérjaikon. Vár rájuk a hosszú Győzelmi Körút, ismét csak a tévénézők árgus szeme előtt. A kötelező udvariaskodás unalmát azonban döbbenet és félelem váltja fel, amikor hírét veszik, hogy lázadás készül a Kapitólium ellen. Snow elnök sosem habozott lesújtani az engedetlenekre, és most is ott csap le, ahol senki sem várja. Emberek halnak meg, családok lesznek földönfutók, Katniss és Peeta pedig újabb küzdelemre kényszerülnek, ahol a tétek még nagyobbak, mint korábban. Suzanne Collins Az éhezők viadala című trilógiája az utóbbi évek legnagyobb szenzációja az ifjúsági regények műfajában. Az immáron világszerte több mint tízmillió példányban értékesített sorozatról azt mondják, hogy méltó folytatása a Harry Potter- és Twilight-könyveknek, tovább népszerűsítve, illetve megszerettetve az olvasást a fiatalokkal. Az éhezők viadalának nemrég elkészült a filmváltozata, amit március 22-étől, a hivatalos nemzetközi premierrel egyidőben fognak vetíteni Magyarországon is. A szereposztás meglehetősen impozáns: a főszereplő Katnisst az a Jennifer Lawrence fogja alakítani, akit a Winter\'s Bone A hallgatás törvénye c. filmben nyújtott alakításáért Oscar-díjra és Golden Globe-díjra jelöltek, de játszott az X-Men: Az elsők című filmben is. Mellette a legnagyobb szerepekben Woody Harrelsont, a rocksztár Lenny Kravitzet, Stanley Tuccit, Elizabeth Bankset, Donald Sutherlandet és Toby Jonest láthatjuk majd.', 4, 3, 1, 4, 2390, NULL, 'https://moly.hu/konyvek/suzanne-collins-futotuz'),
(13, 'A kiválasztott', '9786155049712', 432, '2010-08-24', 'Angol', 'Bár minden ellene szólt, Katniss Everdeennek kétszer is sikerült élve kikerülnie az Éhezők Viadalából. Túlélt minden megpróbáltatást, de még mindig nincs biztonságban. Mert a Kapitólium bűnbakot keres a lázadás miatt. Snow elnök pedig egyértelművé tette: Kapitólium haragja elől senki sem menekülhet. Sem Katniss családja, sem a barátai, sem pedig a 12. Körzet lakói. De közeledik a végső forradalom ideje. Amikor a nép végre szembeszáll a Kapitólium zsarnokságával. És ebben a forradalomban Katnissnak döntő szerepe lesz. Az ő bátorságától, kitartásától és eltökéltségétől függ Panem jövője. Mert ő a kiválasztott. De maradt-e elég ereje hozzá, hogy megvívja az utolsó, mindent eldöntő harcot? Suzanne Collins Az éhezők viadala című trilógiája az utóbbi évek legnagyobb szenzációja az ifjúsági regények műfajában. Az immáron világszerte több mint tízmillió példányban értékesített sorozatról azt mondják, hogy méltó folytatása a Harry Potter- és Twilight-könyveknek, tovább népszerűsítve, illetve megszerettetve az olvasást a fiatalokkal. Az éhezők viadalának nemrég elkészült a filmváltozata, amit március 22-étől, a hivatalos nemzetközi premierrel egyidőben fognak vetíteni Magyarországon is. A szereposztás meglehetősen impozáns: a főszereplő Katnisst az a Jennifer Lawrence fogja alakítani, akit a Winter\'s Bone A hallgatás törvénye c. filmben nyújtott alakításáért Oscar-díjra és Golden Globe-díjra jelöltek, de játszott az X-Men: Az elsők című filmben is. Mellette a legnagyobb szerepekben Woody Harrelsont, a rocksztár Lenny Kravitzet, Stanley Tuccit, Elizabeth Bankset, Donald Sutherlandet és Toby Jonest láthatjuk majd.', 4, 3, 1, 2, 3990, NULL, 'https://moly.hu/konyvek/suzanne-collins-a-kivalasztott'),
(14, 'Nagy könyv', '123123', 123, '0000-00-00', 'Magyar', 'qweqweqeqwe', 2, 5, 0, 0, 1234, NULL, 'http://asd.com'),
(15, 'uploadproba1', '123123123', 12, '1996-01-04', 'Angol', 'dawdawd', 1, 1, 0, 1, 6723, NULL, 'http://asd.com'),
(16, 'uploadproba2', '121444', 123, '1987-03-12', 'Magyar', '1231231234122dfwed', 1, 1, 0, 0, 6723, NULL, 'http://asd.com'),
(20, 'uploadproba5', '123129', 123, '1987-03-12', 'Magyar', 'dawdadsawdwdq31d', 6, 5, 0, 0, 6723, NULL, 'http://as12d.com'),
(21, 'uploadproba6', '123199', 123, '1987-03-12', 'Magyar', 'dqwdwdwdqwdwr23', 6, 5, 0, 0, 2134, NULL, 'http://as12d.com'),
(22, 'uploadproba7', '123999', 12, '1987-03-12', 'Magyar', 'deferjvhnirui f34huithf', 6, 5, 0, 0, 6723, NULL, 'http://as12d.com'),
(23, 'kepproba4', '9876543210', 213, '1996-01-04', 'Magyar', '1rt54zh67ui78', 6, 5, 0, 0, 213, NULL, 'http://asd.com'),
(24, 'statuszproba1', '123689', 1223, '1987-03-12', 'Angol', 'detgh67ui789o', 7, 7, 0, 0, 6723, NULL, 'http://as12d.com'),
(25, 'katproba1', '12314', 1234, '1987-03-12', 'Magyar', 'tghtzjhntzjt', 6, 5, 1, 5, 6723, NULL, 'http://as12d.com'),
(26, 'katproba2', '1234110', 123, '1987-03-12', 'Magyar', 'ntgntzntzn', 6, 5, 1, 2, 6723, NULL, 'http://as12d.com'),
(27, 'katproba3', '7891256', 543, '1996-01-04', 'Magyar', 'edgrtzjuzhkiopéopőüö', 6, 5, 1, 5, 6723, NULL, 'http://asd.com'),
(28, 'képpróba', '1686', 123, '1987-03-12', 'Magyar', 'wefghrhtjziku89', 6, 5, 1, 23, 6723, NULL, 'wefgtrh4z'),
(29, 'header1', '15634', 123, '1987-03-12', 'Magyar', 'rthzrjht', 7, 8, 1, 123, 6723, NULL, 'http://asd.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `id` int(11) NOT NULL,
  `idopont` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rendelsstatusz` enum('felvetel','kikuldve') NOT NULL,
  `emberek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rendeles`
--

INSERT INTO `rendeles` (`id`, `idopont`, `rendelsstatusz`, `emberek_id`) VALUES
(15, '2017-07-16 07:07:47', 'felvetel', 1),
(16, '2017-07-16 07:07:47', 'felvetel', 1),
(17, '2017-07-16 07:07:10', 'felvetel', 1),
(18, '2017-07-16 07:07:13', 'felvetel', 1),
(19, '2017-07-16 07:07:49', 'felvetel', 1),
(20, '2017-07-16 07:07:17', 'felvetel', 1),
(21, '2017-07-16 07:07:33', 'felvetel', 1),
(22, '2017-07-16 07:07:32', 'felvetel', 1),
(23, '2017-07-16 07:07:17', 'felvetel', 1),
(24, '2017-07-16 07:07:43', 'felvetel', 1),
(25, '2017-07-16 07:07:59', 'felvetel', 1),
(26, '2017-07-17 16:07:15', 'felvetel', 1),
(27, '2017-07-17 16:07:36', 'felvetel', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles_has_konyv`
--

CREATE TABLE `rendeles_has_konyv` (
  `rendeles_id` int(11) NOT NULL,
  `konyv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rendeles_has_konyv`
--

INSERT INTO `rendeles_has_konyv` (`rendeles_id`, `konyv_id`) VALUES
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(17, 7),
(17, 8),
(18, 7),
(18, 8),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `emberek`
--
ALTER TABLE `emberek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idemberek_UNIQUE` (`id`),
  ADD UNIQUE KEY `nev_UNIQUE` (`nev`);

--
-- A tábla indexei `emberek_has_konyv`
--
ALTER TABLE `emberek_has_konyv`
  ADD PRIMARY KEY (`emberek_id`,`konyv_id`),
  ADD KEY `fk_emberek_has_konyv_konyv1_idx` (`konyv_id`),
  ADD KEY `fk_emberek_has_konyv_emberek1_idx` (`emberek_id`);

--
-- A tábla indexei `iro`
--
ALTER TABLE `iro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idiro_UNIQUE` (`id`),
  ADD UNIQUE KEY `nev_UNIQUE` (`nev`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idkategoriak_UNIQUE` (`id`);

--
-- A tábla indexei `kategoriak_has_konyv`
--
ALTER TABLE `kategoriak_has_konyv`
  ADD PRIMARY KEY (`kategoriak_id`,`konyv_id`),
  ADD KEY `fk_kategoriak_has_konyv_konyv1_idx` (`konyv_id`),
  ADD KEY `fk_kategoriak_has_konyv_kategoriak1_idx` (`kategoriak_id`);

--
-- A tábla indexei `kiado`
--
ALTER TABLE `kiado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nev_UNIQUE` (`nev`);

--
-- A tábla indexei `konyv`
--
ALTER TABLE `konyv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idkonyv_UNIQUE` (`id`),
  ADD UNIQUE KEY `nev_UNIQUE` (`nev`),
  ADD UNIQUE KEY `isbn_UNIQUE` (`isbn`),
  ADD KEY `fk_konyv_iro1_idx` (`iro_idiro`),
  ADD KEY `fk_konyv_kiado1_idx` (`kiado_id`),
  ADD KEY `fk_konyv_rendeles1_idx` (`rendeles_id`);

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_rendeles_emberek1_idx` (`emberek_id`);

--
-- A tábla indexei `rendeles_has_konyv`
--
ALTER TABLE `rendeles_has_konyv`
  ADD PRIMARY KEY (`rendeles_id`,`konyv_id`),
  ADD KEY `fk_rendeles_has_konyv_konyv1_idx` (`konyv_id`),
  ADD KEY `fk_rendeles_has_konyv_rendeles_idx` (`rendeles_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `emberek`
--
ALTER TABLE `emberek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT a táblához `iro`
--
ALTER TABLE `iro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT a táblához `kiado`
--
ALTER TABLE `kiado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT a táblához `konyv`
--
ALTER TABLE `konyv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `emberek_has_konyv`
--
ALTER TABLE `emberek_has_konyv`
  ADD CONSTRAINT `fk_emberek_has_konyv_emberek1` FOREIGN KEY (`emberek_id`) REFERENCES `emberek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_emberek_has_konyv_konyv1` FOREIGN KEY (`konyv_id`) REFERENCES `konyv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `kategoriak_has_konyv`
--
ALTER TABLE `kategoriak_has_konyv`
  ADD CONSTRAINT `fk_kategoriak_has_konyv_kategoriak1` FOREIGN KEY (`kategoriak_id`) REFERENCES `kategoriak` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategoriak_has_konyv_konyv1` FOREIGN KEY (`konyv_id`) REFERENCES `konyv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `konyv`
--
ALTER TABLE `konyv`
  ADD CONSTRAINT `fk_konyv_iro1` FOREIGN KEY (`iro_idiro`) REFERENCES `iro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_konyv_kiado1` FOREIGN KEY (`kiado_id`) REFERENCES `kiado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `fk_rendeles_emberek1` FOREIGN KEY (`emberek_id`) REFERENCES `emberek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `rendeles_has_konyv`
--
ALTER TABLE `rendeles_has_konyv`
  ADD CONSTRAINT `fk_rendeles_has_konyv_konyv1` FOREIGN KEY (`konyv_id`) REFERENCES `konyv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rendeles_has_konyv_rendeles` FOREIGN KEY (`rendeles_id`) REFERENCES `rendeles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
