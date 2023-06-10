-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: db
-- Čas generovania: So 10.Jún 2023, 15:19
-- Verzia serveru: 8.0.32
-- Verzia PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `myDatabase`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `grammar`
--

CREATE TABLE `grammar` (
  `id` int UNSIGNED NOT NULL,
  `grammar_title` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `grammar_description` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `grammar`
--

INSERT INTO `grammar` (`id`, `grammar_title`, `grammar_description`) VALUES
(1, 'Vyjadrenie ukončenia aktivity', 'Slovné spojenie -te shimau na konci vety popisuje aktivitu ktorá už skončila.'),
(2, 'Vyjadrenie frekvencie opakovania', 'Slovne spojenie \"X ni Y\" popisuje koľko krát(Y) sa opakuje do nejakej časovej doby (X).'),
(3, 'Vyjadrenie vďaky niekomu', 'Slovné spojenie \"X no okage de\" vyjadruje komu/čomu(X) ďakujeme za niečo.'),
(4, 'Otázka lepšieho z možností', 'Slovné spojenie \"X to Y wa dochira no hou ga Z desu ka\" popisuje otázku ktorá z X a Y je lepšie v Z.'),
(5, 'Výber lepšieho z možností', 'Slovné spojenie \"X no hou ga Y yori\" alebo \"X wa Y yori Z desu\" vyjadruje výber toho lepšieho z možností v niečom (Z).'),
(6, 'Otázka najlepšie z možností', 'Slovné spojenie \"X to Y to W no naka de nani ga ichiban Z desu ka\" vyjadruje ktoré z možností je najlepšie v niečom (Z).'),
(7, 'Výber najlepšieho z možností', 'Spojenie \"X to Y to W no naka de X/Y/W ga ichiban Z desu\" vyjadruje ktoré z možností je najlepšie v niečom (Z).'),
(8, 'Priebehový čas', 'Slovné spojenie -te iru na konci vety popisuje aktivitu ktorá momentálne prebieha.'),
(9, 'Stať sa', 'Slovné spojenie \"ni naru\" na konci vety popisuje čím/kým sa niekto/niečo stal.'),
(10, 'Nestať sa', 'Slovné spojenie \"ni narimasen\" na konci vety popisuje čím/kým sa niekto/niečo nestal.'),
(11, 'Niekto niečo povedal', 'Slovné spojenie \"to itte imasu\" vyjadruje že niekto niečo povedal.'),
(12, 'Niečo si myslím', 'Slovným spojením \"to omotte imasu\" vyjadríme že si niečo myslíme.'),
(13, 'Niekedy vykonaná aktivita', 'Slovné spojenie \"ta koto ga arimasu\" vyjadríme to že sa nejaká aktivita už niekedy stala.'),
(14, 'Nikdy nevykonaná aktivita', 'Spojením \"ta koto ga arimasen\" vyjadríme že sa nejaká aktivita ešte nikdy nestala'),
(15, 'Príliš veľa vykonávania', 'Slovné spojenie \"základ slovesa sugiru\" vyjadríme že nejakú aktivitu vykonávame príliš často.'),
(16, 'Radšej niečo urobiť', 'Keď spojíme na \"ta hou ga ii desu yo\" tak vyjadríme že sa malo radšej niečo urobiť napr. nejaká rada do života.'),
(17, 'Netreba niečo urobiť', 'Spojením \"nakute mo ii desu\" alebo \"hitsuyou ga arimasen\" vyjadríme že nejakú aktivitu nie je nutné vykonať.'),
(18, 'Treba niečo vykonať', 'Spojením \"kute mo ii desu\" alebo \"hitsuyou ga arimasu\" vyjadríme že nejakú aktivitu je potrebné vykonať.'),
(19, 'Neúplný zoznam aktivít/okjektov', 'Použitím \"ya\" medzi nejakými objektmi vymenúvavame zoznam objektov a použitím \"tari\" zoznam aktivít. '),
(20, 'Môcť/Dokázať', 'Spojením \"e masu\" alebo \"koto ga dekimasu\"vyjadríme že môžeme vykonať nejakú aktivitu.'),
(21, 'Nemôcť/Nedokázať', 'Spojením \"e masen\" alebo \"koto ga dekimasen\" vyjadríme že nemôžeme vykonať nejakú aktivitu.'),
(22, 'Zdá sa/Vyzerá', 'Spojením \"sou desu\" vyjadríme že niečo vyzerá byť nejako alebo tiež hlásenie že niečo sa stalo.'),
(23, 'Skúsiť nejakú aktivitu', 'Spojením \"te mimasu\" vyjadríme že chceme skúsiť danú aktivitu.'),
(24, 'Vtedy a len vtedy', ' Použitím \"A nara\" zväčša pred podstatným menom vyjadríme že niečo platí len pre A.'),
(25, 'Rada/Odporúčanie', 'Použitím \"tara dou desu ka\" vyjadríme nejakú radu alebo odporúčanie niekomu.'),
(26, 'Vopred vykonaná aktivita', 'Ak použijeme \"te oku\" vyjadríme tým že sme niečo spravili vopred.'),
(27, 'Žiadosť', 'Spojenie \"te kurenai/kuremasen/itadakemasen ka\" vyjadruje žiadosť o niečo.'),
(28, 'Dufanie pre seba', 'Spojením \"to ii n desu ga\" alebo \"to ii n dakedo\" vyjadrujeme že dúfame v niečo pre seba.'),
(29, 'Dúfanie pre iného', 'Spojením \"to ii desu ne\" alebo \"to ii ne\" vyjadríme že dúfame v niečo pre niekoho iného.'),
(30, 'Podľa niekoho tvrdenia', 'Spojením \"ni yoruto\" sa odvolávame na niekoho tvrdenie.'),
(31, 'Vyzerá byť (looks like)', 'Spojením \"mitai desu\" vyjadríme že niečo/niekto vyzerá byť nejak.'),
(32, 'Vykonať pred niečím', 'Spojením \"A mae ni B\" pred nejakou vetou vyjadríme že pred vetou A je nutné vykonať vetu B.'),
(34, 'Vykonávanie aktivít súčasne', 'Spojením \"A nagara B\" vravíme o aktivitách (A B) ktoré vykonávame súčasne.'),
(35, 'Ľútosť o nespravení aktivity', 'Slovným spojením \"ba yokkata desu\" vyjadríme ľútosť nad tým že sme nevykonali aktivitu ktorú sme mali.'),
(36, 'Ľútosť o spravení aktivity', 'Slovným spojením \"nakereba yokkata desu\" vyjadríme ľútosť nad tým že sme vykonali aktivitu ktorú sme nemali.'),
(37, 'Radosť o spravení aktivity', 'Slovným spojením \"te yokkata desu\" vyjadríme radosť nad tým že sme vykonali nejakú aktivitu.'),
(38, 'Radosť o nespravení aktivity', 'Slovným spojením \"nakute yokkata desu\" vyjadríme radosť nad tým že sme nevykonali aktivitu.'),
(39, 'Vyjadrenie aktivity namiesto inej', 'Slovným spojením \"nai de\" vyjadríme aktivitu ktorú sme neurobili ale namiesto toho sme urobili niečo iné.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `grammar_sentences`
--

CREATE TABLE `grammar_sentences` (
  `id` int UNSIGNED NOT NULL,
  `grammar_id` int UNSIGNED NOT NULL,
  `jap_sentence` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `svk_sentence` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `grammar_sentences`
--

INSERT INTO `grammar_sentences` (`id`, `grammar_id`, `jap_sentence`, `svk_sentence`) VALUES
(3, 1, 'Hon o yonde shimaimashita.', 'Už som dočítal knihu.'),
(4, 2, 'ichichi ni ichijikan', '1 hodinu denne'),
(5, 2, 'isshuukan ni ikkai', '1x za týždeň'),
(6, 2, 'ikkagetsu ni nikai', '2x za mesiac'),
(7, 3, 'Watashi wa anata no okage de benkyou shimashita.', 'Vďaka tebe som sa učil.'),
(8, 4, 'Tokyo to Bratislava to dochira no hou ga ookii desu ka', 'Čo je väčšie Tokyo alebo Bratislava ?'),
(9, 5, 'Konpyuta wa Tokei yori takai desu', 'Počítač je drahší ako Hodinky.'),
(10, 5, 'Tokyou no hou ga Bratislava yori ookii desu', 'Tokyo je väčšie ako Bratislava.'),
(11, 6, 'Kuruma to naifu to kusuri no naka de nani ga ichiban takai desu ka', 'Ktoré z možností auto'),
(12, 7, 'Gyunyuu to wain to biiru no naka de gyunyuu ga ichiban oishii desu.', 'Z možností mlieko,víno a pivo je mlieko najchutnejšie.'),
(13, 8, 'Fuku o erabete iru.', 'Vyberá si šaty.'),
(14, 10, 'Natsu ni mada narimasen.', 'Leto ešte neprišlo.'),
(15, 9, 'Watashi wa segatakai ni narimasu.', 'Stal som sa vysoký/Som vysoký.'),
(16, 11, 'Kanojo wa eiga o mitai to itte imasu.', 'Ona vraví že chce vidieť film.'),
(17, 12, 'Kingudamu wa totemo subarashii anime desu to omotte imasu.', 'Ja si myslím že Kingdom je veľmi super anime.'),
(18, 13, 'Watashi wa kono eiga o mita koto ga arimasu.', 'Tento film som už niekedy videl.'),
(19, 15, 'Watashi wa kinou terebi o mi sugimashita.', 'Včera som príliš veľa pozeral telku.'),
(20, 16, 'Anata wa biyoin ni itta hou ga ii desu yo.', 'Mal si radšej ísť do nemocnice.'),
(21, 17, 'Watashi wa ashita shukudai o shinakute mo ii desu.', 'Zajtra nemusím robiť domácu úlohu.'),
(22, 14, 'Watashi wa Chuugoku ni itta koto ga arimasen.', 'Ešte nikdy som nebol v Číne.'),
(23, 20, 'Watashi wa ima Hangarii ni ikemasu.', 'Ja môžem ísť teraz do Maďarska.'),
(24, 21, 'Watashi wa Doitsugo ga hanasemasen.', 'Ja nemôžem/nedokážem rozprávať po Nemecky.'),
(25, 22, 'Kono keeki ga oishi sou desu.', 'Tento koláč vyzerá chutne.'),
(26, 23, 'Watashi mo ano karate no sensei ni oshiete mimasu.', 'Tiež sa skúsim spýtať toho učiteľa karate.'),
(27, 24, 'Watashi no shumi nara nanimo dekimasu.', 'Ak sa jedná o moje koníčký zvládnem hocičo.'),
(28, 25, 'Motoo benkyou shitara dou desu ka?', 'Čo keby si sa viac učil?'),
(29, 27, 'Okane o kashite kurenai ka?', 'Požičal by si mi peniaze?'),
(30, 28, 'Rainen Chuugoku ni ikemasu to ii n desu ga.', 'Dúfam že budem môcť ísť do Číny ďalší rok.'),
(31, 29, 'Tomodachi wa ashita matsuri ni ikimasu.Ame ga futte inai to ii desu ne.', 'Kamarát ide zajtra na fesitval.Dúfam že nebude pršať.'),
(32, 30, 'Watashi no okaa san no tomodachi tachi ni yoruto ie de tsumaranai sou desu.', 'Podľa kamarátiek mojej mami je doma nuda.'),
(33, 18, 'Paatii ni tabemono o motte kute mo ii desu.', 'Na párty je potrebné doniesť si jedlo.'),
(34, 31, 'Anata wa watashi no okaa san mitai desu.', 'Vyzeráš ako moja mama.'),
(35, 32, 'Nihonjin wa tabemono o tabe hajimeru mae ni itadakimasu to iwanakya.', 'Japonci pred začatím jedla musia povedať itadakimasu.'),
(37, 34, 'Terebi o mi nagara shukudai o shimashita.', 'Počas sledovania telky som si spravil domácu úlohu.'),
(38, 35, 'Tomodachi ni denwa o sureba yokatta desu.', 'Mal som kamarátovi zavolať.'),
(39, 36, 'Kamera o kawanakereba yokatta desu.', 'Nemal som kupovať tú kameru.'),
(40, 37, 'Kingudamu no anime o mite yokatta desu.', 'Som rád že som videl anime Kingdom.'),
(41, 38, 'Densha ni nori o kure nakute yokatta desu.', 'Som rád že som nezmeškal vlak.'),
(42, 39, 'Kinou no yoru wanenai de benkyou shimashita.', 'Včera v noci som sa učil namiesto toho aby som sa vyspal.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kana`
--

CREATE TABLE `kana` (
  `id` int UNSIGNED NOT NULL,
  `hiragana` varchar(16) CHARACTER SET eucjpms COLLATE eucjpms_japanese_ci NOT NULL,
  `katakana` varchar(16) CHARACTER SET eucjpms COLLATE eucjpms_japanese_ci NOT NULL,
  `romaji` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `kana`
--

INSERT INTO `kana` (`id`, `hiragana`, `katakana`, `romaji`) VALUES
(1, 'あ', 'ア', 'a'),
(3, 'か　が', 'カ　ガ', 'ka ga'),
(4, 'さ　ざ', 'サ　ザ', 'sa za'),
(5, 'た　だ', 'タ　ダ', 'ta da'),
(6, 'ま', 'マ', 'ma'),
(7, 'な', 'ナ', 'na'),
(8, 'は　ば　ぱ', 'ハ　バ　パ', 'ha ba pa'),
(9, 'ら', 'ラ', 'ra'),
(10, 'や', 'ヤ', 'ya'),
(11, 'わ', 'ワ', 'wa'),
(12, 'え', 'エ', 'e'),
(13, 'け　げ', 'ケ　ゲ', 'ke ge'),
(14, 'せ　ぜ', 'セ　ゼ', 'se ze'),
(15, 'て　で', 'テ　デ', 'te de'),
(16, 'め', 'メ', 'me'),
(17, 'ね', 'ネ', 'ne'),
(18, 'へ　べ　ぺ', 'ヘ　ベ　ペ', 'he be pe'),
(19, 'れ', 'レ', 're'),
(20, 'い', 'イ', 'i'),
(21, 'き　ぎ', 'キ　ギ', 'ki gi'),
(22, 'し　じ', 'シ　ジ', 'shi ji'),
(23, 'ち', 'チ', 'chi'),
(24, 'み', 'ミ', 'mi'),
(25, 'に', 'ニ', 'ni'),
(26, 'ひ　び　ぴ', 'ヒ　ビ　ピ', 'hi bi pi'),
(27, 'り', 'リ', 'ri'),
(28, 'お', 'オ', 'o'),
(29, 'こ　ご', 'コ　ゴ', 'ko go'),
(30, 'そ ぞ', 'ソ　ゾ', 'so zo'),
(31, 'と　ど', 'ト　ド', 'to do'),
(32, 'も', 'モ', 'mo'),
(33, 'の', 'ノ', 'no'),
(34, 'ほ　ぼ　ぽ', 'ホ　ボ　ポ', 'ho bo po'),
(35, 'ろ', 'ロ', 'ro'),
(36, 'よ', 'ヨ', 'yo'),
(37, 'を', 'ヲ', 'wo'),
(38, 'う', 'ウ', 'u'),
(39, 'く　ぐ', 'ク　グ', 'ku gu'),
(40, 'す　ず', 'ス　ズ', 'su zu'),
(41, 'つ', 'ツ', 'tsu'),
(42, 'む', 'ム', 'mu'),
(43, 'ぬ', 'ヌ', 'nu'),
(44, 'ふ　ぶ　ぷ', 'フ　ブ　プ', 'hu bu pu'),
(45, 'る', 'ル', 'ru'),
(46, 'ゆ', 'ユ', 'yu');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kanji`
--

CREATE TABLE `kanji` (
  `id` int UNSIGNED NOT NULL,
  `kanji_char` varchar(16) CHARACTER SET eucjpms COLLATE eucjpms_japanese_ci NOT NULL,
  `kunyoumi` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `onyoumi` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `slovak` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `kanji`
--

INSERT INTO `kanji` (`id`, `kanji_char`, `kunyoumi`, `onyoumi`, `slovak`) VALUES
(1, '一', 'hito(つ)', 'ichi', 'jeden'),
(2, '二', 'futa(つ)', 'ni', 'dva'),
(3, '三', 'mi(つ)', 'san', 'tri'),
(4, '四', 'yon/yo(つ)', 'shi', 'štyri'),
(5, '五', 'itsu(つ)', 'go', 'päť'),
(6, '六', 'mu(つ)', 'roku', 'šesť'),
(7, '七', 'nana(つ)', 'shichi', 'sedem'),
(8, '八', 'ya(つ)/you', 'hachi', 'osem'),
(9, '九', 'kokono(つ)', 'kyuu', 'deväť'),
(10, '十', 'too/to/so', 'juu/jutsu/jitsu', 'desať'),
(11, '百', 'momo', 'hyaku/byaku', 'sto'),
(12, '千', 'chi', 'sen', 'tisíc'),
(13, '万', 'yorozu', 'man/ban', 'desať tisíc'),
(14, '人', 'hito/-ri/-to', 'jin/nin', 'človek/osoba'),
(15, '入(る)  入(口)', 'hai(ru)/iri(guchi)', 'jyu/nyu', 'vstúpiť vchod'),
(16, '出(口)  出(す)', 'de(guchi) da(su)', 'shutsu/sui', 'východ vybrať/zverejniť'),
(17, '大(き)', 'oo(ki)', 'tai/dai', 'veľký'),
(18, '天', 'ame/ama-/amatsu', 'ten', 'obloha/nebo'),
(19, '午', 'uma', 'go', 'poludnie'),
(20, '半', 'naka(ば)', 'han', 'polovica/pol'),
(21, '手', 'te/ta/-te/te-', 'shu/zu', 'ruka'),
(22, '足', 'ashi/ta', 'soku', 'chodidlo'),
(23, '火', 'hi/-bi/ho-', 'ka', 'oheň'),
(24, '上  上(手)', 'ue/nobo/a', 'shou/shan/jou(zu)', 'hore zručný'),
(25, '下  下(手)', 'shimo/shita/kuda/o', 'ka/ge/he(ta)', 'dole/zlý v niečom'),
(26, '中', 'naka/uchi/ata', 'chyu', 'vnútri'),
(27, '今', 'ima', 'kon/kin', 'teraz'),
(28, '口', 'kuchi', 'ku/koo', 'ústa'),
(29, '白', 'shiro/shira-', 'haku/byaku', 'biela farba'),
(30, '日', 'hi/-bi/-ka', 'nichi/jitsu', 'deň/slnko'),
(31, '月', 'tsuki', 'getsu/gatsu', 'mesiac'),
(32, '目', 'me/ma-', 'moku/boku', 'oko'),
(33, '女', 'onna/me', 'jyo/nyo/nyou', 'žena'),
(34, '川', 'kawa', 'sen', 'rieka'),
(35, '小(さい)', 'chii(sai)/ko-/o-/sa-', 'shyou', 'malý'),
(36, '少(し)  少(ない)', 'suko(shi) suku(nai)', 'shyou', 'trochu málo'),
(37, '土', 'tsuchi', 'to/do', 'zem'),
(38, '古(い)', 'furu(i)/furu-', 'ko', 'starý'),
(39, '木', 'ki/ko', 'moku/boku', 'drevo/strom'),
(40, '本', 'moto', 'hon', 'kniha'),
(41, '休(む)  休(み)', 'yasu(mu) yasu(mi)', 'kyuu', 'voľno chýbať/dovolenka'),
(42, '水', 'mizu', 'sui', 'voda'),
(43, '父', 'chichi', 'fu', 'otec'),
(44, '母', 'haha/mo', 'bo', 'mama'),
(45, '山', 'yama', 'san/sen', 'hora'),
(46, '円', 'maru/mado/maru', 'en', 'yen/kruh'),
(47, '肉', 'shishi', 'niku', 'mäso');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `nounTypes`
--

CREATE TABLE `nounTypes` (
  `id` int UNSIGNED NOT NULL,
  `type_name` varchar(16) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `image_name` varchar(16) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `nounTypes`
--

INSERT INTO `nounTypes` (`id`, `type_name`, `image_name`) VALUES
(1, 'budovy', 'budovy.jpg'),
(2, 'cestovanie', 'cestovanie.jpg'),
(3, 'čísla', 'cisla.jpg'),
(4, 'dni', 'dni.png'),
(5, 'domov', 'domov.jpg'),
(6, 'hotel', 'hotel.jpg'),
(7, 'jedlo', 'jedlo.jpg'),
(8, 'krajiny', 'krajiny.jpg'),
(9, 'medicína', 'medicina.jpg'),
(10, 'oblečenie', 'oblecenie.png'),
(11, 'osoby', 'osoby.png'),
(12, 'ostatné', 'ostatne.jpg'),
(13, 'pitie', 'pitie.jpg'),
(14, 'počasie', 'pocasie.jpg'),
(15, 'šport', 'sport.jpg'),
(16, 'zvieratá', 'zvierata.jpg'),
(17, 'ludske_telo', 'ludske_telo.jpg');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `words`
--

CREATE TABLE `words` (
  `id` int UNSIGNED NOT NULL,
  `jap_word` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `svk_word` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_type` enum('pridavne meno','podstatne meno','sloveso','ostatne') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_subtype_id` int UNSIGNED DEFAULT NULL,
  `day_of_addition` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `words`
--

INSERT INTO `words` (`id`, `jap_word`, `svk_word`, `word_type`, `word_subtype_id`, `day_of_addition`) VALUES
(1, 'Chotto', 'Trochu', 'pridavne meno', NULL, '2023-05-10'),
(2, 'Heta', 'Neskúsený', 'pridavne meno', NULL, '2023-05-10'),
(3, 'Jouzu', 'Zručný', 'pridavne meno', NULL, '2023-05-10'),
(4, 'Kakkoi', 'Pekný/cool', 'pridavne meno', NULL, '2023-05-10'),
(5, 'Hitsuyou', 'Potrebné', 'pridavne meno', NULL, '2023-05-10'),
(6, 'Wakai', 'Mladý', 'pridavne meno', NULL, '2023-05-10'),
(7, 'Furui', 'Starý', 'pridavne meno', NULL, '2023-05-10'),
(8, 'Omoshiroi', 'Zaujímavý', 'pridavne meno', NULL, '2023-05-10'),
(9, 'Tsumaranai', 'Nudný', 'pridavne meno', NULL, '2023-05-10'),
(10, 'Ijiwarui', 'Zlý/krutý', 'pridavne meno', NULL, '2023-05-10'),
(11, 'Segatakai', 'Vysoký', 'pridavne meno', NULL, '2023-05-10'),
(12, 'Nagai', 'Dlhý', 'pridavne meno', NULL, '2023-05-10'),
(13, 'Mijikai', 'Krátky', 'pridavne meno', NULL, '2023-05-10'),
(14, 'Byoki', 'Chorý', 'pridavne meno', NULL, '2023-05-10'),
(15, 'Ninki/Yuumei', 'Populárny/Slávny', 'pridavne meno', NULL, '2023-05-10'),
(16, 'Ureshii', 'Šťastný', 'pridavne meno', NULL, '2023-05-10'),
(17, 'Kanashii', 'Smutný', 'pridavne meno', NULL, '2023-05-10'),
(18, 'Ookii', 'Veľký', 'pridavne meno', NULL, '2023-05-10'),
(19, 'Chiisai', 'Malý', 'pridavne meno', NULL, '2023-05-10'),
(20, 'Atama ga ii', 'Múdry', 'pridavne meno', NULL, '2023-05-10'),
(21, 'Atama ga warui', 'Hlúpy', 'pridavne meno', NULL, '2023-05-10'),
(22, 'Isogashii', 'Zaneprázdnený', 'pridavne meno', NULL, '2023-05-10'),
(23, 'Hima', 'Mat voľný čas', 'pridavne meno', NULL, '2023-05-10'),
(24, 'Hayai', 'Rýchly', 'pridavne meno', NULL, '2023-05-10'),
(25, 'Osoi', 'Pomalý', 'pridavne meno', NULL, '2023-05-10'),
(26, 'Nemui', 'Zaspatý', 'pridavne meno', NULL, '2023-05-10'),
(27, 'Tsukareru', 'Unavený/vyčerpaný', 'pridavne meno', NULL, '2023-05-10'),
(28, 'Age', 'Vyprážaný', 'pridavne meno', NULL, '2023-05-10'),
(29, 'Okiniiri', 'Obľúbený', 'pridavne meno', NULL, '2023-05-10'),
(30, 'Kirei', 'Pekné/čisté', 'pridavne meno', NULL, '2023-05-10'),
(31, 'Kitanai', 'Špinavý (alebo napr. bordel v izbe)', 'pridavne meno', NULL, '2023-05-10'),
(32, 'Kibishii', 'Prísny', 'pridavne meno', NULL, '2023-05-10'),
(33, 'Chikai', 'Blízko', 'pridavne meno', NULL, '2023-05-10'),
(34, 'Iroiro(na)', 'Rôzny/viacdruhov', 'pridavne meno', NULL, '2023-05-10'),
(35, 'Kechi(na)', 'Lakomý', 'pridavne meno', NULL, '2023-05-10'),
(36, 'Karai', 'Pikantné', 'pridavne meno', NULL, '2023-05-10'),
(37, 'Dame', 'Nedobré', 'pridavne meno', NULL, '2023-05-10'),
(38, 'Yukkuri/Motto yukkuri', 'Pomalšie/Trochu pomalšie', 'pridavne meno', NULL, '2023-05-10'),
(39, 'Saitei', 'Najhorší', 'pridavne meno', NULL, '2023-05-10'),
(40, 'Abunai/Kiken', 'Nebezpečný', 'pridavne meno', NULL, '2023-05-10'),
(41, 'Sukunai', 'Málo', 'pridavne meno', NULL, '2023-05-10'),
(42, 'Tsuyoi', 'Silný', 'pridavne meno', NULL, '2023-05-10'),
(43, 'Nomu', 'Piť', 'sloveso', NULL, '2023-05-10'),
(44, 'Taberu', 'Jesť', 'sloveso', NULL, '2023-05-10'),
(45, 'Kotaeru', 'Odpovedať', 'sloveso', NULL, '2023-05-10'),
(46, 'Youkoso', 'Vitajte', 'sloveso', NULL, '2023-05-10'),
(47, 'Tatsu', 'Vstať', 'sloveso', NULL, '2023-05-10'),
(48, 'Tateru', 'Stavať (budovu)', 'sloveso', NULL, '2023-05-10'),
(49, 'Ukeru', 'Prijať', 'sloveso', NULL, '2023-05-10'),
(50, 'Futte', 'Padá (napr. dážď)', 'sloveso', NULL, '2023-05-10'),
(51, 'Akeru', 'Otvoriť', 'sloveso', NULL, '2023-05-10'),
(52, 'Suwaru', 'Sadnúť si', 'sloveso', NULL, '2023-05-10'),
(53, 'Yomu', 'Čítať', 'sloveso', NULL, '2023-05-10'),
(54, 'Oboeru', 'Pamätať si', 'sloveso', NULL, '2023-05-10'),
(55, 'Ageru', 'Darovať/dať', 'sloveso', NULL, '2023-05-10'),
(56, 'Morau', 'Obdržať/prijať', 'sloveso', NULL, '2023-05-10'),
(57, 'Odoru', 'Tančiť', 'sloveso', NULL, '2023-05-10'),
(58, 'Oyogu', 'Plávať', 'sloveso', NULL, '2023-05-10'),
(59, 'Asobu', 'Hrať niečo/sa', 'sloveso', NULL, '2023-05-10'),
(60, 'Kiru', 'Rezať/sekať', 'sloveso', NULL, '2023-05-10'),
(61, 'Kiru', 'Obliecť/mať oblečené (oblečenie)', 'sloveso', NULL, '2023-05-10'),
(62, 'Yaru', 'Urobiť', 'sloveso', NULL, '2023-05-10'),
(63, 'Suru', 'Todo', 'sloveso', NULL, '2023-05-10'),
(64, 'Harau', 'Zaplatiť', 'sloveso', NULL, '2023-05-10'),
(65, 'Kimeru', 'Rozhodnúť sa', 'sloveso', NULL, '2023-05-10'),
(66, 'Narau', 'Naučiť sa', 'sloveso', NULL, '2023-05-10'),
(67, 'Kau(kawanai/kaimasu)', 'Kúpiť', 'sloveso', NULL, '2023-05-10'),
(68, 'Ryokou suru', 'Cestovať', 'sloveso', NULL, '2023-05-10'),
(69, 'Noru', 'Nasadnút(do vlaku)/jazdiť (na bicykli)', 'sloveso', NULL, '2023-05-10'),
(70, 'Noboru', 'Vyliezť (napr. na horu)', 'sloveso', NULL, '2023-05-10'),
(71, 'Hairu', 'Vojsť niekam (napr. do miestnosti)', 'sloveso', NULL, '2023-05-10'),
(72, 'Saboru', 'Flákať (napr. školu)', 'sloveso', NULL, '2023-05-10'),
(73, 'Nakusu', 'Stratiť niečo', 'sloveso', NULL, '2023-05-10'),
(74, 'Neru', 'Spať', 'sloveso', NULL, '2023-05-10'),
(75, 'Uso o tsuku', 'Klamať', 'sloveso', NULL, '2023-05-10'),
(76, 'Hanareru', 'Opustiť (niekoho)', 'sloveso', NULL, '2023-05-10'),
(77, 'Kasu', 'Požičať', 'sloveso', NULL, '2023-05-10'),
(78, 'Kariru', 'Požičať si', 'sloveso', NULL, '2023-05-10'),
(79, 'Ganbaru', 'Snažiť sa', 'sloveso', NULL, '2023-05-10'),
(80, 'Naku', 'Plakať', 'sloveso', NULL, '2023-05-10'),
(81, 'Yakusoku o mamoru', 'Držať slovo', 'sloveso', NULL, '2023-05-10'),
(82, 'Matsu', 'Čakať', 'sloveso', NULL, '2023-05-10'),
(83, 'Yameru', 'Prestať', 'sloveso', NULL, '2023-05-10'),
(84, 'Mottekuru', 'Priniesť', 'sloveso', NULL, '2023-05-10'),
(85, 'Utau', 'Spievať', 'sloveso', NULL, '2023-05-10'),
(86, 'Tsukuru', 'Vyrobiť', 'sloveso', NULL, '2023-05-10'),
(87, 'Kiku', 'Počúvať/Počuť', 'sloveso', NULL, '2023-05-10'),
(88, 'Kuru', 'Prísť', 'sloveso', NULL, '2023-05-10'),
(89, 'Kaesu', 'Vrátiť', 'sloveso', NULL, '2023-05-10'),
(90, 'Kaeru', 'Vrátiť sa', 'sloveso', NULL, '2023-05-10'),
(91, 'Dekiru', 'Dokázať/môcť', 'sloveso', NULL, '2023-05-10'),
(92, 'Dekake', 'Ísť von (z domu napr.)', 'sloveso', NULL, '2023-05-10'),
(93, 'Yobu', 'Volať (na niekoho)', 'sloveso', NULL, '2023-05-10'),
(94, 'Denwa suru', 'Volať (mobilom niekomu)', 'sloveso', NULL, '2023-05-10'),
(95, 'ha o migaku/migaiteimasu', 'Čistiť si zuby', 'sloveso', NULL, '2023-05-10'),
(96, 'Karada no undou shimasu', 'Cvičiť (telo)', 'sloveso', NULL, '2023-05-10'),
(97, 'Hiku', 'Hrať na strunový nástroj', 'sloveso', NULL, '2023-05-10'),
(98, 'Kyomi ga nai', 'Nemáť záujem o niekoho/niečo', 'sloveso', NULL, '2023-05-10'),
(99, 'Hitsuyou desu', 'Potrebujem', 'sloveso', NULL, '2023-05-10'),
(100, 'Tsukau', 'Použiť', 'sloveso', NULL, '2023-05-10'),
(101, 'Yasumu', 'Oddychovať', 'sloveso', NULL, '2023-05-10'),
(102, 'Yaseru', 'Schudnúť', 'sloveso', NULL, '2023-05-10'),
(103, 'Yasete imasu', 'Byť chudý', 'sloveso', NULL, '2023-05-10'),
(104, 'Suteru', 'Opustiť', 'sloveso', NULL, '2023-05-10'),
(105, 'Tsukiau', 'Robiť spoločnosť/ísť s niekým', 'sloveso', NULL, '2023-05-10'),
(106, 'Tsureru (tsurete iru)', 'Zobrať niekoho niekam', 'sloveso', NULL, '2023-05-10'),
(107, 'Hoshii', 'Chcieť', 'sloveso', NULL, '2023-05-10'),
(108, 'Akirameru', 'Vzdať sa', 'sloveso', NULL, '2023-05-10'),
(109, 'Uru', 'Predať', 'sloveso', NULL, '2023-05-10'),
(110, 'Sagasu', 'Hľadať', 'sloveso', NULL, '2023-05-10'),
(111, 'Sasou', 'Pozvať', 'sloveso', NULL, '2023-05-10'),
(112, 'Kiotsukete', 'Dávať si pozor', 'sloveso', NULL, '2023-05-10'),
(113, 'Shiraberu', 'Pozrieť sa na niečo (napr. na dokumenty)', 'sloveso', NULL, '2023-05-10'),
(114, 'Yoyakusuru', 'Rezervovať', 'sloveso', NULL, '2023-05-10'),
(116, 'Orosu', 'Vybrať (peniaze - okane o orosu)', 'sloveso', NULL, '2023-05-10'),
(117, 'Tomaru', 'Zastaviť', 'sloveso', NULL, '2023-05-10'),
(118, 'Chuushi suru', 'Zrušiť', 'sloveso', NULL, '2023-05-10'),
(119, 'Kureru', 'Dať (ten čo hovorí to nedaroval)', 'sloveso', NULL, '2023-05-10'),
(120, 'Sotsugyou suru', 'Absolvovoať (školu)', 'sloveso', NULL, '2023-05-10'),
(121, 'Junbi suru', 'Pripraviť sa/niečo', 'sloveso', NULL, '2023-05-10'),
(122, 'Okosu', 'Zobudiť', 'sloveso', NULL, '2023-05-10'),
(123, 'Tsureteiku', 'Zobrať niekoho zosebou', 'sloveso', NULL, '2023-05-10'),
(124, 'Naosu', 'Opraviť', 'sloveso', NULL, '2023-05-10'),
(125, 'Mayou', 'Stratiť sa/niečo', 'sloveso', NULL, '2023-05-10'),
(126, 'Mitsukeru', 'Nájsť niečo', 'sloveso', NULL, '2023-05-10'),
(127, 'Mukaeniiku', 'Vyzdvihnúť niečo/niekoho', 'sloveso', NULL, '2023-05-10'),
(128, 'Yakusu', 'Preložiť', 'sloveso', NULL, '2023-05-10'),
(129, 'Oshieru', 'Učiť', 'sloveso', NULL, '2023-05-10'),
(130, 'Warau', 'Smiať sa', 'sloveso', NULL, '2023-05-10'),
(131, 'Atsumeru', 'Zbierať', 'sloveso', NULL, '2023-05-10'),
(132, 'Nori o kureru', 'Zmeškať (vlak/ bus...)', 'sloveso', NULL, '2023-05-10'),
(133, 'Miseru', 'Ukázať niečo', 'sloveso', NULL, '2023-05-10'),
(134, 'Annaisuru', 'Ukázať vám to tu (napr. pracovisko/školu)', 'sloveso', NULL, '2023-05-10'),
(135, 'Setsumeisuru', 'Vysvetliť', 'sloveso', NULL, '2023-05-10'),
(136, 'Asanebou suru', 'Zaspať', 'sloveso', NULL, '2023-05-10'),
(137, 'Ogoru', 'Dopriať niekomu 7', 'sloveso', NULL, '2023-05-10'),
(138, 'Ochikomu', 'Byť depresívny', 'sloveso', NULL, '2023-05-10'),
(139, 'Dasu', 'Dať niečo von', 'sloveso', NULL, '2023-05-10'),
(140, 'Nai (nakute)', 'Zápor', 'sloveso', NULL, '2023-05-10'),
(141, 'Erabu', 'Vybrať', 'sloveso', NULL, '2023-05-10'),
(142, 'Oyu o wakasu', 'Variť vodu', 'sloveso', NULL, '2023-05-10'),
(143, 'Negu', 'Vyzlieť (oblečenie)', 'sloveso', NULL, '2023-05-10'),
(144, 'Hige o suru', 'Oholiť sa', 'sloveso', NULL, '2023-05-10'),
(145, 'Umareru', 'Narodiť sa', 'sloveso', NULL, '2023-05-10'),
(146, 'Kagi o kakeru', 'Zamknúť', 'sloveso', NULL, '2023-05-10'),
(147, 'Nareru', 'Zvyknúť si', 'sloveso', NULL, '2023-05-10'),
(148, 'Oinori suru', 'Modliť sa', 'sloveso', NULL, '2023-05-10'),
(149, 'Shuushoku suru', 'Dostať prácu na plný úväzok', 'sloveso', NULL, '2023-05-10'),
(150, 'Kekkon suru', 'Oženiť sa', 'sloveso', NULL, '2023-05-10'),
(151, 'Rikon suru', 'Rozviesť sa', 'sloveso', NULL, '2023-05-10'),
(152, 'Omedetou gozaimasu', 'Gratulujem', 'sloveso', NULL, '2023-05-10'),
(153, 'Sodachi', 'Vychovať', 'sloveso', NULL, '2023-05-10'),
(154, 'Konzatsu suru', 'Byť preplnený (napr. kino bolo plné ľudí - eigakan wa konzatsu shimashita)', 'sloveso', NULL, '2023-05-10'),
(155, 'Saraarai/Shokki o suru', 'Umyť riad', 'sloveso', NULL, '2023-05-10'),
(156, 'Kouen', 'Park', 'podstatne meno', 1, '2023-05-10'),
(157, 'Shizen', 'Príroda', 'podstatne meno', 1, '2023-05-10'),
(158, 'Byouin', 'Nemocnica', 'podstatne meno', 1, '2023-05-10'),
(159, 'Sakaba', 'Bar/ putyka', 'podstatne meno', 1, '2023-05-10'),
(160, 'Mise', 'Obchod', 'podstatne meno', 1, '2023-05-10'),
(161, 'Shoppingumooru', 'Obchodné centrum', 'podstatne meno', 1, '2023-05-10'),
(162, 'Doubutsuen', 'Zoo', 'podstatne meno', 1, '2023-05-10'),
(163, 'Hikouki', 'Lietadlo', 'podstatne meno', 2, '2023-05-10'),
(164, 'Tabi', 'Cesta', 'podstatne meno', 2, '2023-05-10'),
(165, 'Sanpo', 'Prechádzka', 'podstatne meno', 2, '2023-05-10'),
(166, 'Chizu', 'Mapa', 'podstatne meno', 2, '2023-05-10'),
(167, 'Basu', 'Autobus', 'podstatne meno', 2, '2023-05-10'),
(168, 'Basutei', 'Autobusová zastávka', 'podstatne meno', 2, '2023-05-10'),
(169, 'Densha', 'Vlak', 'podstatne meno', 2, '2023-05-10'),
(170, 'Kankou', 'Turizmus/prehliadka pamiatok', 'podstatne meno', 2, '2023-05-10'),
(171, 'Eki', 'Stanica', 'podstatne meno', 2, '2023-05-10'),
(172, 'Jitensha', 'Bicykel', 'podstatne meno', 2, '2023-05-10'),
(173, 'Kuruma', 'Auto', 'podstatne meno', 2, '2023-05-10'),
(174, 'Gaikoku', 'Cudzia krajina', 'podstatne meno', 2, '2023-05-10'),
(175, 'Nimotsu', 'Batožina', 'podstatne meno', 2, '2023-05-10'),
(176, 'Ekiin', 'Obsluha stanice', 'podstatne meno', 2, '2023-05-10'),
(177, 'Michi', 'Smer/Cesta', 'podstatne meno', 2, '2023-05-10'),
(178, 'Ryokou gaisha', 'Cestovka', 'podstatne meno', 2, '2023-05-10'),
(179, 'Maru/Zero', '0', 'podstatne meno', 3, '2023-05-10'),
(180, 'Ichi', '1', 'podstatne meno', 3, '2023-05-10'),
(181, 'Ni', '2', 'podstatne meno', 3, '2023-05-10'),
(182, 'San', '3', 'podstatne meno', 3, '2023-05-10'),
(183, 'Yon/Shi', '4', 'podstatne meno', 3, '2023-05-10'),
(184, 'Go', '5', 'podstatne meno', 3, '2023-05-10'),
(185, 'Roku', '6', 'podstatne meno', 3, '2023-05-10'),
(186, 'Nana/Shichi', '7', 'podstatne meno', 3, '2023-05-10'),
(187, 'Hachi', '8', 'podstatne meno', 3, '2023-05-10'),
(188, 'Kyuu', '9', 'podstatne meno', 3, '2023-05-10'),
(189, 'Juu', '10', 'podstatne meno', 3, '2023-05-10'),
(190, 'Juuichi', '11', 'podstatne meno', 3, '2023-05-10'),
(191, 'Nijuu', '20', 'podstatne meno', 3, '2023-05-10'),
(192, 'Nijuuichi', '21', 'podstatne meno', 3, '2023-05-10'),
(193, 'Hyaku', '100', 'podstatne meno', 3, '2023-05-10'),
(194, 'Nihyaku', '200', 'podstatne meno', 3, '2023-05-10'),
(195, 'Sen', '1000', 'podstatne meno', 3, '2023-05-10'),
(196, 'Nisen', '2000', 'podstatne meno', 3, '2023-05-10'),
(197, 'Man', '10000', 'podstatne meno', 3, '2023-05-10'),
(198, 'Niman', '20000', 'podstatne meno', 3, '2023-05-10'),
(199, 'Getsuyoubi', 'Pondelok', 'podstatne meno', 4, '2023-05-10'),
(200, 'Kayoubi', 'Utorok', 'podstatne meno', 4, '2023-05-10'),
(201, 'Suiyoubi', 'Streda', 'podstatne meno', 4, '2023-05-10'),
(202, 'Mokuyoubi', 'Štvrtok', 'podstatne meno', 4, '2023-05-10'),
(203, 'Kinyoubi', 'Piatok', 'podstatne meno', 4, '2023-05-10'),
(204, 'Doyoubi', 'Sobota', 'podstatne meno', 4, '2023-05-10'),
(205, 'Nichiyoubi', 'Nedeľa ', 'podstatne meno', 4, '2023-05-10'),
(206, 'Ichigatsu', 'Január (mesiace v roku= číslo+gatsu)', 'podstatne meno', 4, '2023-05-10'),
(207, 'Shigatsu', 'Apríl', 'podstatne meno', 4, '2023-05-10'),
(208, 'Shichigatsu', 'Júl', 'podstatne meno', 4, '2023-05-10'),
(209, 'Kugatsu', 'September', 'podstatne meno', 4, '2023-05-10'),
(210, 'Kono shuumatsu', 'Tento víkend', 'podstatne meno', 4, '2023-05-10'),
(211, 'Senshuumatsu', 'Minulý víkend', 'podstatne meno', 4, '2023-05-10'),
(212, 'Raishuumatsu', 'Budúci víkend', 'podstatne meno', 4, '2023-05-10'),
(213, 'Konshuu', 'Tento týždeň', 'podstatne meno', 4, '2023-05-10'),
(214, 'Senshuu', 'Minulý týždeň', 'podstatne meno', 4, '2023-05-10'),
(215, 'Raishuu', 'Budúci týždeň', 'podstatne meno', 4, '2023-05-10'),
(216, 'Asa', 'Ráno', 'podstatne meno', 4, '2023-05-10'),
(217, 'Yoru/ban', 'noc/večer (ban je v slovných spojeniach napr. bangohan)', 'podstatne meno', 4, '2023-05-10'),
(218, 'Kyou', 'Dnes', 'podstatne meno', 4, '2023-05-10'),
(219, 'Kinou', 'Včera', 'podstatne meno', 4, '2023-05-10'),
(220, 'Ashita', 'Zajtra', 'podstatne meno', 4, '2023-05-10'),
(221, 'Heya', 'Izba', 'podstatne meno', 5, '2023-05-10'),
(222, 'Ima', 'Obývačka', 'podstatne meno', 5, '2023-05-10'),
(223, 'Shinshitsu', 'Spálňa', 'podstatne meno', 5, '2023-05-10'),
(224, 'Daidokoro', 'Kuchyňa', 'podstatne meno', 5, '2023-05-10'),
(225, 'Otearai', 'Kúpeľňa', 'podstatne meno', 5, '2023-05-10'),
(226, 'Daininguruumu', 'Jedáleň', 'podstatne meno', 5, '2023-05-10'),
(227, 'Rouka', 'Hala/Chodba', 'podstatne meno', 5, '2023-05-10'),
(228, 'Barukoni', 'Balkón', 'podstatne meno', 5, '2023-05-10'),
(229, 'Ofuro', 'Kúpeľ', 'podstatne meno', 5, '2023-05-10'),
(230, 'Shawaa', 'Sprcha', 'podstatne meno', 5, '2023-05-10'),
(231, 'Sofaa', 'Gauč', 'podstatne meno', 5, '2023-05-10'),
(232, 'Isu', 'Stolička', 'podstatne meno', 5, '2023-05-10'),
(233, 'Beddo', 'Posteľ', 'podstatne meno', 5, '2023-05-10'),
(234, 'Ranpu', 'Lampa', 'podstatne meno', 5, '2023-05-10'),
(235, 'Mattoresu', 'Matrac', 'podstatne meno', 5, '2023-05-10'),
(236, 'Terebi', 'Televízia', 'podstatne meno', 5, '2023-05-10'),
(237, 'Teburu', 'Stôl', 'podstatne meno', 5, '2023-05-10'),
(238, 'Sentakuki', 'Práčka', 'podstatne meno', 5, '2023-05-10'),
(239, 'Gomibako', 'Kôš', 'podstatne meno', 5, '2023-05-10'),
(240, 'Makura', 'Vankúš', 'podstatne meno', 5, '2023-05-10'),
(241, 'Shitsu', 'Plachta', 'podstatne meno', 5, '2023-05-10'),
(242, 'Toire', 'WC', 'podstatne meno', 5, '2023-05-10'),
(243, 'Kagami', 'Zrkadlo', 'podstatne meno', 5, '2023-05-10'),
(244, 'Toirettopeepaa', 'Toaleťák', 'podstatne meno', 5, '2023-05-10'),
(245, 'Reizooko', 'Chla4čka', 'podstatne meno', 5, '2023-05-10'),
(246, 'Oobun', 'Rúra', 'podstatne meno', 5, '2023-05-10'),
(247, 'Fuka nabe', 'Hrniec', 'podstatne meno', 5, '2023-05-10'),
(248, 'Furaipan', 'Panvica', 'podstatne meno', 5, '2023-05-10'),
(249, 'Supuun', 'Lyžica', 'podstatne meno', 5, '2023-05-10'),
(250, 'Naifu', 'Nôž', 'podstatne meno', 5, '2023-05-10'),
(251, 'Fooku', 'Vidlička', 'podstatne meno', 5, '2023-05-10'),
(252, 'Koppu', 'Pohár', 'podstatne meno', 5, '2023-05-10'),
(253, 'Sara', 'Tanier', 'podstatne meno', 5, '2023-05-10'),
(254, 'Chawan', 'Miska', 'podstatne meno', 5, '2023-05-10'),
(255, 'Beddo', 'Posteľ', 'podstatne meno', 5, '2023-05-10'),
(256, 'Beddo', 'Posteľ', 'podstatne meno', 5, '2023-05-10'),
(257, 'Niwa', 'Záhrada', 'podstatne meno', 5, '2023-05-10'),
(258, 'Taoru', 'Uterák', 'podstatne meno', 5, '2023-05-10'),
(259, 'Kagi', 'Kľúče', 'podstatne meno', 5, '2023-05-10'),
(260, 'Mado', 'Okno', 'podstatne meno', 5, '2023-05-10'),
(261, 'Sekken', 'Mydlo', 'podstatne meno', 5, '2023-05-10'),
(262, 'Haburashi', 'Zubná kefka', 'podstatne meno', 5, '2023-05-10'),
(263, 'Hamigakiko', 'Zubná pasta', 'podstatne meno', 5, '2023-05-10'),
(264, 'Konsento', 'Elektrická zásuvka', 'podstatne meno', 5, '2023-05-10'),
(265, 'Ragu', 'Koberec', 'podstatne meno', 5, '2023-05-10'),
(266, 'Yuka', 'Podlaha', 'podstatne meno', 5, '2023-05-10'),
(267, 'Tenjou', 'Strop', 'podstatne meno', 5, '2023-05-10'),
(268, 'Saraarai/Shokki', 'Riad', 'podstatne meno', 5, '2023-05-10'),
(269, 'Hoteru', '6', 'podstatne meno', 6, '2023-05-10'),
(270, 'Paku/Nanpaku/Sanpaku', 'Počet nocí/koľko nocí/3 noci', 'podstatne meno', 6, '2023-05-10'),
(271, '-tsuki', 'S niečím', 'podstatne meno', 6, '2023-05-10'),
(272, 'Shokuji tsuki', 'S 7m', 'podstatne meno', 6, '2023-05-10'),
(273, 'Ippaku ni shokuji tsuki', 'Jedna noc s dvoma jedlami', 'podstatne meno', 6, '2023-05-10'),
(274, 'Chekkuin', 'Ubytovať sa (Check in)', 'podstatne meno', 6, '2023-05-10'),
(275, 'Chekkuauto', 'Odubytovanie (Check out)', 'podstatne meno', 6, '2023-05-10'),
(276, 'Shinguru', 'Jednoposteľová', 'podstatne meno', 6, '2023-05-10'),
(277, 'Daburu', 'Dvojposteľová', 'podstatne meno', 6, '2023-05-10'),
(278, '-mei/nan mei/san mei', 'Počet osôb/koľko osôb/3 11', 'podstatne meno', 6, '2023-05-10'),
(279, 'Furonto', 'Recepčná', 'podstatne meno', 6, '2023-05-10'),
(280, 'Okyakusan', 'Zákazník/klient/hosť', 'podstatne meno', 6, '2023-05-10'),
(281, 'Kuredito kaado de haraemasu ka ?', 'Môžem platiť kreditnou kartou ?', 'podstatne meno', 6, '2023-05-10'),
(282, 'Niji made nimotsu o azukatte kuremasen ka ?', 'Môžem si tu u vás nechať batožinu do 2. hodiny?', 'podstatne meno', 6, '2023-05-10'),
(283, 'Ippaku wa ikura desu ka', 'Koľko stojí 1 noc?', 'podstatne meno', 6, '2023-05-10'),
(284, 'Ippaku wa ikura desu ka', 'Koľko stojí 1 noc?', 'podstatne meno', 6, '2023-05-10'),
(285, 'Okashi', 'Sladkosť', 'podstatne meno', 7, '2023-05-10'),
(286, 'Chiizu', 'Syr', 'podstatne meno', 7, '2023-05-10'),
(287, 'Niku', 'Mäso', 'podstatne meno', 7, '2023-05-10'),
(288, 'Butaniku', 'Bravčové mäso', 'podstatne meno', 7, '2023-05-10'),
(289, 'Sakana', 'Ryba', 'podstatne meno', 7, '2023-05-10'),
(290, 'Sooseeji', 'Párky', 'podstatne meno', 7, '2023-05-10'),
(291, 'Tamago', 'Vajcia', 'podstatne meno', 7, '2023-05-10'),
(292, 'Jagaimono', 'Zemiaky', 'podstatne meno', 7, '2023-05-10'),
(293, 'Gohan/Raisu', 'Ryža', 'podstatne meno', 7, '2023-05-10'),
(294, 'Pan', 'Chlieb', 'podstatne meno', 7, '2023-05-10'),
(295, 'Kechappu', 'Kečup', 'podstatne meno', 7, '2023-05-10'),
(296, 'Mayoneezu', 'Majonéza', 'podstatne meno', 7, '2023-05-10'),
(297, 'Tarutaru soosu', 'Tatarská omáčka', 'podstatne meno', 7, '2023-05-10'),
(298, 'Masutaado', 'Horčica', 'podstatne meno', 7, '2023-05-10'),
(299, 'Yasai', 'Zelenina', 'podstatne meno', 7, '2023-05-10'),
(300, 'Kudamono', 'Ovocie', 'podstatne meno', 7, '2023-05-10'),
(301, 'Tomato', 'Paradajka', 'podstatne meno', 7, '2023-05-10'),
(302, 'Keeki', 'Zákusok', 'podstatne meno', 7, '2023-05-10'),
(303, 'Tatsu', 'Vstať', 'podstatne meno', 7, '2023-05-10'),
(304, 'Raňajky', 'Asagohan', 'podstatne meno', 7, '2023-05-10'),
(305, 'Obed', 'Hirugohan', 'podstatne meno', 7, '2023-05-10'),
(306, 'Večera', 'Bangohan', 'podstatne meno', 7, '2023-05-10'),
(307, 'Satou', 'Cukor', 'podstatne meno', 7, '2023-05-10'),
(308, 'Shio', 'Soľ', 'podstatne meno', 7, '2023-05-10'),
(309, 'Surobakia', 'Slovensko', 'podstatne meno', 8, '2023-05-10'),
(310, 'Nihon', 'Japonsko', 'podstatne meno', 8, '2023-05-10'),
(311, 'Cheko', 'Česko', 'podstatne meno', 8, '2023-05-10'),
(312, 'Burugaria', 'Bulharsko', 'podstatne meno', 8, '2023-05-10'),
(313, 'Hangarii', 'Maďarsko', 'podstatne meno', 8, '2023-05-10'),
(314, 'Amerika', 'Amerika', 'podstatne meno', 8, '2023-05-10'),
(315, 'Chuugoku', 'Čína', 'podstatne meno', 8, '2023-05-10'),
(316, 'Furansu', 'Francúzsko', 'podstatne meno', 8, '2023-05-10'),
(317, 'Doitsu', 'Nemecko', 'podstatne meno', 8, '2023-05-10'),
(318, 'Byouin', 'Nemocnica', 'podstatne meno', 9, '2023-05-10'),
(319, 'Hoken', 'Poistenie', 'podstatne meno', 9, '2023-05-10'),
(320, 'Kyappu', 'Čiapka', 'podstatne meno', 10, '2023-05-10'),
(321, 'Boushi', 'Klobúk', 'podstatne meno', 10, '2023-05-10'),
(322, 'Shatsu', 'Košela', 'podstatne meno', 10, '2023-05-10'),
(323, 'Ti-shatsu', 'Tričko', 'podstatne meno', 10, '2023-05-10'),
(324, 'Jaketto', 'Bunda', 'podstatne meno', 10, '2023-05-10'),
(325, 'Kooto', 'Kabát', 'podstatne meno', 10, '2023-05-10'),
(326, 'Seetaa', 'Sveter', 'podstatne meno', 10, '2023-05-10'),
(327, 'Suutsu', 'Oblek', 'podstatne meno', 10, '2023-05-10'),
(328, 'Doresu', 'Šaty', 'podstatne meno', 10, '2023-05-10'),
(329, 'Reinkooto', 'Pršiplášť', 'podstatne meno', 10, '2023-05-10'),
(330, 'Tebukuro', 'Rukavice', 'podstatne meno', 10, '2023-05-10'),
(331, 'Pajama', 'Pyžamo', 'podstatne meno', 10, '2023-05-10'),
(332, 'Roobu', 'Župan', 'podstatne meno', 10, '2023-05-10'),
(333, 'Burajaa', 'Podprsenka', 'podstatne meno', 10, '2023-05-10'),
(334, 'Pantsu', 'Nohavice', 'podstatne meno', 10, '2023-05-10'),
(335, 'Jiinzu', 'Rifle', 'podstatne meno', 10, '2023-05-10'),
(336, 'Sukaato', 'Sukňa', 'podstatne meno', 10, '2023-05-10'),
(337, 'Shitagi', 'Spodná bielizeň', 'podstatne meno', 10, '2023-05-10'),
(338, 'Kutsushita/Sokkusu', 'Ponožky', 'podstatne meno', 10, '2023-05-10'),
(339, 'Sutokkingu', 'Pančuchy/stockings', 'podstatne meno', 10, '2023-05-10'),
(340, 'Pansuto', 'Pančucháče/pantyhose', 'podstatne meno', 10, '2023-05-10'),
(341, 'Kutsu/Buutsu', 'Topánky', 'podstatne meno', 10, '2023-05-10'),
(342, 'Sandaru', 'Sandále', 'podstatne meno', 10, '2023-05-10'),
(343, 'Surippa', 'Papuče', 'podstatne meno', 10, '2023-05-10'),
(344, 'Kashu', 'Spevák', 'podstatne meno', 11, '2023-05-10'),
(345, 'Keisatsu/Keisatsukan', 'Polícia/Policajt', 'podstatne meno', 11, '2023-05-10'),
(346, 'Haiyuu', 'Herec', 'podstatne meno', 11, '2023-05-10'),
(347, 'Joyuu', 'Herečka', 'podstatne meno', 11, '2023-05-10'),
(348, 'Shinseki', 'Príbuzní', 'podstatne meno', 11, '2023-05-10'),
(349, 'Soto', 'Vonku', 'podstatne meno', 12, '2023-05-10'),
(350, 'Katachi', 'Tvar(niečoho)', 'podstatne meno', 12, '2023-05-10'),
(351, 'Mokuteki', 'Cieľ', 'podstatne meno', 12, '2023-05-10'),
(352, 'Shitsumon', 'Otázka', 'podstatne meno', 12, '2023-05-10'),
(353, 'Sumi', 'Roh(napr. stola)', 'podstatne meno', 12, '2023-05-10'),
(354, 'Shiken', 'Skúška', 'podstatne meno', 12, '2023-05-10'),
(355, 'Seiseki', 'Známky (v škole)', 'podstatne meno', 12, '2023-05-10'),
(356, 'Omocha', 'Hračka', 'podstatne meno', 12, '2023-05-10'),
(357, 'Denki', 'Elektrina', 'podstatne meno', 12, '2023-05-10'),
(358, 'Kaisha', 'Spoločnosť(korporácia)', 'podstatne meno', 12, '2023-05-10'),
(359, 'Gakki/Kongakki', 'Semester/Tento semester', 'podstatne meno', 12, '2023-05-10'),
(360, 'Shourai', 'Budúcnosť', 'podstatne meno', 12, '2023-05-10'),
(361, 'Yama', 'Hora', 'podstatne meno', 12, '2023-05-10'),
(362, 'Yasumi', 'Práz4ny', 'podstatne meno', 12, '2023-05-10'),
(363, 'Shigoto', 'Práca', 'podstatne meno', 12, '2023-05-10'),
(364, 'Uso', 'Klamstvo', 'podstatne meno', 12, '2023-05-10'),
(365, 'Kyuujitsu', 'Voľný deň/dovolenka', 'podstatne meno', 12, '2023-05-10'),
(366, 'Basho/Tokoro', 'Miesto (konkrétne/všeobecné)', 'podstatne meno', 12, '2023-05-10'),
(367, 'Gaikokugo', 'Cudzí jazyk', 'podstatne meno', 12, '2023-05-10'),
(368, 'Gakki', 'Hudobný nástroj', 'podstatne meno', 12, '2023-05-10'),
(369, 'Yakusoku', 'Sľub', 'podstatne meno', 12, '2023-05-10'),
(370, 'Yubiwa', 'Prsteň', 'podstatne meno', 12, '2023-05-10'),
(371, 'Fantajii', 'Fantasy', 'podstatne meno', 12, '2023-05-10'),
(372, 'Okane', 'Peniaze', 'podstatne meno', 12, '2023-05-10'),
(373, 'Yoyaku', 'Rezervácia', 'podstatne meno', 12, '2023-05-10'),
(374, 'Gaikoku-go/jin', 'Cudzinec/cudzí jazyk', 'podstatne meno', 12, '2023-05-10'),
(375, 'Koukoku', 'Reklama', 'podstatne meno', 12, '2023-05-10'),
(376, 'Keiken', 'Skúsenosť', 'podstatne meno', 12, '2023-05-10'),
(377, 'Denchi', 'Baterky', 'podstatne meno', 12, '2023-05-10'),
(378, 'Yotei', 'Plán', 'podstatne meno', 12, '2023-05-10'),
(379, 'Ookisa', 'Veľkosť', 'podstatne meno', 12, '2023-05-10'),
(380, 'Kenkyuu', 'Výskum', 'podstatne meno', 12, '2023-05-10'),
(381, 'Gomi', 'Odpadky/Odpad', 'podstatne meno', 12, '2023-05-10'),
(382, 'Fuairu', 'Súbor/portfólio', 'podstatne meno', 12, '2023-05-10'),
(383, 'Mezamashidokei', 'Budík', 'podstatne meno', 12, '2023-05-10'),
(384, 'Choukaku', 'Sluch', 'podstatne meno', 12, '2023-05-10'),
(385, 'Kyuukaku', 'Čuch', 'podstatne meno', 12, '2023-05-10'),
(386, 'Mikaku', 'Chuť', 'podstatne meno', 12, '2023-05-10'),
(387, 'Shikaku', 'Zrak', 'podstatne meno', 12, '2023-05-10'),
(388, 'Shokkaku', 'Hmat', 'podstatne meno', 12, '2023-05-10'),
(389, 'Shougakkou', 'Základná škola', 'podstatne meno', 12, '2023-05-10'),
(390, 'Koukou', 'Stredná škola', 'podstatne meno', 12, '2023-05-10'),
(391, 'Daigakkou', 'Vysoká škola', 'podstatne meno', 12, '2023-05-10'),
(392, 'Shougakkin', 'Štipendium', 'podstatne meno', 12, '2023-05-10'),
(393, 'Okurimono', 'Darček', 'podstatne meno', 12, '2023-05-10'),
(394, 'Oyu', 'Horúca voda', 'podstatne meno', 12, '2023-05-10'),
(395, 'Himitsu', 'Tajomtsvo', 'podstatne meno', 12, '2023-05-10'),
(396, 'Hige', 'Brada', 'podstatne meno', 12, '2023-05-10'),
(397, 'Gyuunyuu/Miruku', 'Mlieko', 'podstatne meno', 13, '2023-05-10'),
(398, 'Sake/Arukoru', 'Alkohol', 'podstatne meno', 13, '2023-05-10'),
(399, 'Biiru', 'Pivo', 'podstatne meno', 13, '2023-05-10'),
(400, 'Tenki', 'Počasie', 'podstatne meno', 14, '2023-05-10'),
(401, 'Kuuki', 'Vzduch', 'podstatne meno', 14, '2023-05-10'),
(402, 'Kaze', 'Vietor', 'podstatne meno', 14, '2023-05-10'),
(403, 'Kisetsu', 'Ročné obdobie', 'podstatne meno', 14, '2023-05-10'),
(404, 'Haru', 'Jar', 'podstatne meno', 14, '2023-05-10'),
(405, 'Natsu', 'Leto', 'podstatne meno', 14, '2023-05-10'),
(406, 'Aki', 'Jeseň', 'podstatne meno', 14, '2023-05-10'),
(407, 'Fuyu', 'Zima', 'podstatne meno', 14, '2023-05-10'),
(408, 'Kion', 'Teplota', 'podstatne meno', 14, '2023-05-10'),
(409, 'Do', 'Stupne (napr. godo 5 stupňov celzia)', 'podstatne meno', 14, '2023-05-10'),
(410, 'Yuki', 'Sneh', 'podstatne meno', 14, '2023-05-10'),
(411, 'Ame', 'Dážď', 'podstatne meno', 14, '2023-05-10'),
(412, 'Hare', 'Slnečno', 'podstatne meno', 14, '2023-05-10'),
(413, 'Kumori', 'Zamračené', 'podstatne meno', 14, '2023-05-10'),
(414, 'Atsui', 'Horúco', 'podstatne meno', 14, '2023-05-10'),
(415, 'Samui', 'Zima (teplotou)', 'podstatne meno', 14, '2023-05-10'),
(416, 'Sora', 'Obloha', 'podstatne meno', 14, '2023-05-10'),
(417, 'Tenki wa dou desu ka', 'Ake je počasie ?', 'podstatne meno', 14, '2023-05-10'),
(418, 'Kion wa nan do desu ka', 'Aká je teplota ?', 'podstatne meno', 14, '2023-05-10'),
(419, 'Jishin', 'Zemetrasenie', 'podstatne meno', 14, '2023-05-10'),
(420, 'Taifuu', 'Tajfún', 'podstatne meno', 14, '2023-05-10'),
(421, 'Renshuu', 'Cvičenie', 'podstatne meno', 15, '2023-05-10'),
(422, 'Puuru', 'Bazén', 'podstatne meno', 15, '2023-05-10'),
(423, 'Tora', 'Tiger', 'podstatne meno', 16, '2023-05-10'),
(424, 'Saru', 'Opica', 'podstatne meno', 16, '2023-05-10'),
(425, 'Kuma', 'Medveď', 'podstatne meno', 16, '2023-05-10'),
(426, 'Zou', 'Slon', 'podstatne meno', 16, '2023-05-10'),
(427, 'Tori', 'Vták', 'podstatne meno', 16, '2023-05-10'),
(428, 'Iruka', 'Delfín', 'podstatne meno', 16, '2023-05-10'),
(429, 'Same', 'Žralok', 'podstatne meno', 16, '2023-05-10'),
(430, 'Kame', 'Korytnačka', 'podstatne meno', 16, '2023-05-10'),
(431, 'Raion', 'Lev', 'podstatne meno', 16, '2023-05-10'),
(432, 'Koumori', 'Netopier', 'podstatne meno', 16, '2023-05-10'),
(433, 'Hebi', 'Had', 'podstatne meno', 16, '2023-05-10'),
(434, 'Ookami', 'Vlk', 'podstatne meno', 16, '2023-05-10'),
(435, 'Kitsune', 'Líška', 'podstatne meno', 16, '2023-05-10'),
(436, 'Usagi', 'Zajac', 'podstatne meno', 16, '2023-05-10'),
(437, 'Uma', 'Kôň', 'podstatne meno', 16, '2023-05-10'),
(438, 'Buta', 'Prasa', 'podstatne meno', 16, '2023-05-10'),
(439, 'Ushi', 'Krava', 'podstatne meno', 16, '2023-05-10'),
(440, 'Neko', 'Mačka', 'podstatne meno', 16, '2023-05-10'),
(441, 'Inu', 'Pes', 'podstatne meno', 16, '2023-05-10'),
(442, 'Kara', 'Od/lebo', 'ostatne', NULL, '2023-05-10'),
(443, 'Made', 'Do', 'ostatne', NULL, '2023-05-10'),
(444, 'Aida', 'Medzi', 'ostatne', NULL, '2023-05-10'),
(445, 'Mada', 'Ešte', 'ostatne', NULL, '2023-05-10'),
(446, 'Mou', 'Už', 'ostatne', NULL, '2023-05-10'),
(447, 'Tokorode', 'Inak/btw', 'ostatne', NULL, '2023-05-10'),
(448, 'Dore/Dochi/Dochira', 'Ktorý/Ktoré', 'ostatne', NULL, '2023-05-10'),
(449, 'Dare', 'Kto', 'ostatne', NULL, '2023-05-10'),
(450, 'Doko', 'Kde', 'ostatne', NULL, '2023-05-10'),
(451, 'Dono gurai', 'Ako dlho', 'ostatne', NULL, '2023-05-10'),
(452, 'Ikura', 'Koľko', 'ostatne', NULL, '2023-05-10'),
(453, 'Itsu', 'Kedy', 'ostatne', NULL, '2023-05-10'),
(454, 'Doushite/Nande', 'Prečo', 'ostatne', NULL, '2023-05-10'),
(455, 'Donna', 'Aký/Aké', 'ostatne', NULL, '2023-05-10'),
(456, 'Nani', 'Čo', 'ostatne', NULL, '2023-05-10'),
(457, 'Kore/Sore/Are', 'Toto/Tento/Tamto', 'ostatne', NULL, '2023-05-10'),
(458, 'Koko/Soko', 'Tu/Tam', 'ostatne', NULL, '2023-05-10'),
(459, 'Gurai', 'Približne/okolo', 'ostatne', NULL, '2023-05-10'),
(460, 'Gozen', 'AM - dopolu4a', 'ostatne', NULL, '2023-05-10'),
(461, 'Gogo', 'PM - popoludní', 'ostatne', NULL, '2023-05-10'),
(462, 'Tsugi', 'Ďalší (napr. ďalšie práz4ny = tsugi no yasumi)', 'ostatne', NULL, '2023-05-10'),
(463, 'Nazenara', 'Pretože', 'ostatne', NULL, '2023-05-10'),
(464, 'Douzo', 'Nech sa páči', 'ostatne', NULL, '2023-05-10'),
(465, 'Doumo', 'Ďakujem', 'ostatne', NULL, '2023-05-10'),
(466, 'Dou itashimashite', 'Nie je zač', 'ostatne', NULL, '2023-05-10'),
(467, 'Zenbu', 'Všetko', 'ostatne', NULL, '2023-05-10'),
(468, 'Mae', 'Pred (napr. pred 10 rokmi - juu nen mae)', 'ostatne', NULL, '2023-05-10'),
(469, 'Ato de', 'Neskôr', 'ostatne', NULL, '2023-05-10'),
(470, 'Saikin', 'Nedávno/v poslednej dobe', 'ostatne', NULL, '2023-05-10'),
(471, 'Akemashite omedetou gozaimasu', 'Štastný nový rok ti prajem', 'ostatne', NULL, '2023-05-10'),
(472, 'X kai', 'X krát/poschodie (napr. 5 krát - go kai)', 'ostatne', NULL, '2023-05-10'),
(473, 'X dake', 'Robil som len X (hral len hry - geiumu dake o shimashita)', 'ostatne', NULL, '2023-05-10'),
(475, 'Korekara', 'odteraz', 'ostatne', NULL, '2023-05-10'),
(476, 'Jibunde', '(niečo spraviť) sám', 'ostatne', NULL, '2023-05-10'),
(477, 'Tatoeba', 'Napríklad', 'ostatne', NULL, '2023-05-10'),
(478, 'Yappari', 'Nakoniec/predsalen', 'ostatne', NULL, '2023-05-10'),
(479, 'Hokano', 'Ostatne', 'ostatne', NULL, '2023-05-10'),
(480, 'Kondokoso', 'Tentokrát', 'ostatne', NULL, '2023-05-10'),
(483, 'Te o arau(araimasu)', 'Umyť si ruky', 'sloveso', NULL, '2023-05-24'),
(484, 'Iwanakya', 'Musieť niečo povedať', 'sloveso', NULL, '2023-05-24'),
(485, 'Kyuryou', 'Plat', 'podstatne meno', 12, '2023-05-24'),
(486, 'Shanpuu', 'Šampón', 'podstatne meno', 12, '2023-05-24'),
(487, 'Shouyuu', 'Sójová omáčka', 'podstatne meno', 7, '2023-05-24'),
(488, 'Suupu', 'Polievka', 'podstatne meno', 7, '2023-05-24'),
(489, 'Banana', 'Banán', 'podstatne meno', 7, '2023-05-24'),
(490, 'Mushi', 'Hmyz', 'podstatne meno', 16, '2023-05-24'),
(491, 'Reizouko', 'Chladnička', 'podstatne meno', 5, '2023-05-24'),
(492, 'Kibun ga warui', 'Cítiť sa chorý', 'podstatne meno', 9, '2023-05-24'),
(493, 'Aku', 'Otvoriť', 'podstatne meno', 12, '2023-05-24'),
(494, 'Ayamaru', 'Ospravedlniť sa (niekomu)', 'ostatne', NULL, '2023-05-24'),
(495, 'Otosu', 'Upustiť (niečo)', 'sloveso', NULL, '2023-05-24'),
(496, 'Korobu', 'Spadnúť', 'sloveso', NULL, '2023-05-24'),
(497, 'Kowasu', 'Rozbiť (niečo)', 'sloveso', NULL, '2023-05-24'),
(498, 'Tasukaru', 'Byť zachránený/dostať pomoc', 'sloveso', NULL, '2023-05-24'),
(499, 'Tanomu', 'Opýtať sa/mať prosbu (na niekoho)', 'sloveso', NULL, '2023-05-24'),
(500, 'Chuumon suru', 'Objednať si (napr. v reštaurácii)', 'sloveso', NULL, '2023-05-24'),
(502, 'Dou shiyou', ' Čo by sme mali urobiť', 'ostatne', NULL, '2023-05-24'),
(503, 'Mazu', 'Najprv', 'ostatne', NULL, '2023-05-24'),
(504, 'Kedo', 'Ale(medzi 2 vetami)', 'ostatne', NULL, '2023-05-24'),
(505, 'Shokuryouhin mise', 'Obchod s potravinami', 'podstatne meno', 1, '2023-05-31'),
(506, 'Shoutai suru', 'Pozvať', 'sloveso', NULL, '2023-05-31'),
(507, 'Orei', 'Vyjadrenie vďačnosti', 'ostatne', NULL, '2023-05-31'),
(508, 'Nakaga ii', 'Uzmieriť sa', 'sloveso', NULL, '2023-05-31'),
(509, 'Majime', 'Seriózny', 'pridavne meno', NULL, '2023-05-31'),
(510, 'Okuru', 'Odviesť autom/Poslať (niekoho)', 'sloveso', NULL, '2023-05-31'),
(511, 'Okoru', 'Nahnevať sa', 'sloveso', NULL, '2023-05-31'),
(512, 'Kimaru', 'Rozhodnúť sa', 'sloveso', NULL, '2023-05-31'),
(513, 'Okureru', 'Meškať', 'sloveso', NULL, '2023-05-31'),
(514, 'Hareru', 'Je slnečno', 'sloveso', NULL, '2023-05-31'),
(515, 'Gochisou suru', 'Pozvať/zaplatiť niekomu za jedlo', 'sloveso', NULL, '2023-05-31'),
(516, 'Chuui suru', 'Varovanie - dávať si pozor', 'sloveso', NULL, '2023-05-31'),
(517, 'Touchaku suru', 'Prísť (niekam)', 'sloveso', NULL, '2023-05-31'),
(518, 'Kantan', 'Jednoduché/ľahké', 'pridavne meno', NULL, '2023-05-31'),
(519, 'Nonbiri', 'Pohodový (napr. človek)', 'pridavne meno', NULL, '2023-05-31'),
(520, 'Makeru', 'Prehrať (napr. zápas)', 'sloveso', NULL, '2023-05-31'),
(521, 'Goro', 'Cca/približne (len pre čas napr. cca o 8 večer)', 'ostatne', NULL, '2023-05-31'),
(524, 'Kochira', 'Tadiaľto', 'ostatne', NULL, '2023-06-04'),
(525, 'Uchuujin', 'Mimozemštan', 'podstatne meno', 11, '2023-06-04'),
(526, 'Onigiri', 'Ryžové gule', 'podstatne meno', 7, '2023-06-04'),
(527, 'Kakari no mono', 'Zodpovedná osoba(za niečo)', 'podstatne meno', 11, '2023-06-04'),
(528, 'Kuukou', 'Letisko', 'podstatne meno', 2, '2023-06-04'),
(529, '-ya(honya)', 'Obchod(kníhkupectvo)', 'podstatne meno', 1, '2023-06-04'),
(530, 'Omoi', 'Ťažké', 'pridavne meno', NULL, '2023-06-04'),
(531, 'Karui', 'Ľahké', 'pridavne meno', NULL, '2023-06-04'),
(532, 'Itadaku', 'Skromný výraz pre jesť/piť/získať', 'sloveso', NULL, '2023-06-04'),
(533, 'Modoru', 'Vrátiť sa', 'sloveso', NULL, '2023-06-04'),
(534, 'Tsutaeru', 'Informovať', 'sloveso', NULL, '2023-06-04'),
(535, 'Koukan suru (X to Y o)', 'Vymeniť', 'sloveso', NULL, '2023-06-04'),
(536, 'Seikatsu suru', 'Viesť život', 'sloveso', NULL, '2023-06-04'),
(537, 'Saa', 'Nie som si istý', 'ostatne', NULL, '2023-06-04'),
(538, 'Shoushou omachi kudasai', 'Počkajte chvíľu prosím (formálne)', 'ostatne', NULL, '2023-06-04'),
(539, 'Chotto matte', 'Čakaj chvíľu (neformálne)', 'ostatne', NULL, '2023-06-04'),
(540, 'Sore dewa', 'Ak je to tak/Tak teda', 'ostatne', NULL, '2023-06-04'),
(541, 'Dekireba', 'Ak je to možné', 'ostatne', NULL, '2023-06-04'),
(542, 'Mata', 'Znova', 'ostatne', NULL, '2023-06-04'),
(543, 'Ka dou ka', 'Či', 'ostatne', NULL, '2023-06-04'),
(544, 'Kakaru', 'To zaberie (napr. ako dlho to zaberie dostať sa na letisko)', 'ostatne', NULL, '2023-06-04'),
(545, 'Wain', 'Víno', 'podstatne meno', 13, '2023-06-04'),
(548, 'Nanika shimashita ka', 'Robil si niečo?', 'ostatne', NULL, '2023-06-04'),
(549, 'O ikutsu desu ka', 'Koľko máš rokov?', 'ostatne', NULL, '2023-06-04'),
(550, 'X to iimasu', 'Volám sa X', 'ostatne', NULL, '2023-06-04');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `grammar`
--
ALTER TABLE `grammar`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `grammar_sentences`
--
ALTER TABLE `grammar_sentences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grammar_id` (`grammar_id`);

--
-- Indexy pre tabuľku `kana`
--
ALTER TABLE `kana`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `kanji`
--
ALTER TABLE `kanji`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `nounTypes`
--
ALTER TABLE `nounTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `word_subtype_id` (`word_subtype_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `grammar`
--
ALTER TABLE `grammar`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pre tabuľku `grammar_sentences`
--
ALTER TABLE `grammar_sentences`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pre tabuľku `kana`
--
ALTER TABLE `kana`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pre tabuľku `kanji`
--
ALTER TABLE `kanji`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pre tabuľku `nounTypes`
--
ALTER TABLE `nounTypes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pre tabuľku `words`
--
ALTER TABLE `words`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `grammar_sentences`
--
ALTER TABLE `grammar_sentences`
  ADD CONSTRAINT `grammar_sentences_ibfk_1` FOREIGN KEY (`grammar_id`) REFERENCES `grammar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`word_subtype_id`) REFERENCES `nounTypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
