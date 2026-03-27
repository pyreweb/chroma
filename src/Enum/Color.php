<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Enum;

use Pyreweb\Chroma\Service\ColorService;

/**
 * Énumération des couleurs
 * 
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
enum Color: int
{
	// Couleurs de base, de 1 à 99

	case Black = 1;
	case White = 2;

	// Rouge, de 100 à 199

	case Red50 = 100;
	case Red100 = 101;
	case Red200 = 102;
	case Red300 = 103;
	case Red400 = 104;
	case Red500 = 105;
	case Red600 = 106;
	case Red700 = 107;
	case Red800 = 108;
	case Red900 = 109;
	case Red950 = 110;

	// Orange, de 200 à 299

	case Orange50 = 200;
	case Orange100 = 201;
	case Orange200 = 202;
	case Orange300 = 203;
	case Orange400 = 204;
	case Orange500 = 205;
	case Orange600 = 206;
	case Orange700 = 207;
	case Orange800 = 208;
	case Orange900 = 209;
	case Orange950 = 210;

	// Ambre, de 300 à 399

	case Amber50 = 300;
	case Amber100 = 301;
	case Amber200 = 302;
	case Amber300 = 303;
	case Amber400 = 304;
	case Amber500 = 305;
	case Amber600 = 306;
	case Amber700 = 307;
	case Amber800 = 308;
	case Amber900 = 309;
	case Amber950 = 310;

	// Jaune, de 400 à 499

	case Yellow50 = 400;
	case Yellow100 = 401;
	case Yellow200 = 402;
	case Yellow300 = 403;
	case Yellow400 = 404;
	case Yellow500 = 405;
	case Yellow600 = 406;
	case Yellow700 = 407;
	case Yellow800 = 408;
	case Yellow900 = 409;
	case Yellow950 = 410;

	// Lime, de 500 à 599

	case Lime50 = 500;
	case Lime100 = 501;
	case Lime200 = 502;
	case Lime300 = 503;
	case Lime400 = 504;
	case Lime500 = 505;
	case Lime600 = 506;
	case Lime700 = 507;
	case Lime800 = 508;
	case Lime900 = 509;
	case Lime950 = 510;

	// Vert, de 600 à 699

	case Green50 = 600;
	case Green100 = 601;
	case Green200 = 602;
	case Green300 = 603;
	case Green400 = 604;
	case Green500 = 605;
	case Green600 = 606;
	case Green700 = 607;
	case Green800 = 608;
	case Green900 = 609;
	case Green950 = 610;

	// Émeraude, de 700 à 799

	case Emerald50 = 700;
	case Emerald100 = 701;
	case Emerald200 = 702;
	case Emerald300 = 703;
	case Emerald400 = 704;
	case Emerald500 = 705;
	case Emerald600 = 706;
	case Emerald700 = 707;
	case Emerald800 = 708;
	case Emerald900 = 709;
	case Emerald950 = 710;

	// Sarcelle, de 800 à 899

	case Teal50 = 800;
	case Teal100 = 801;
	case Teal200 = 802;
	case Teal300 = 803;
	case Teal400 = 804;
	case Teal500 = 805;
	case Teal600 = 806;
	case Teal700 = 807;
	case Teal800 = 808;
	case Teal900 = 809;
	case Teal950 = 810;

	// Cyan, de 900 à 999

	case Cyan50 = 900;
	case Cyan100 = 901;
	case Cyan200 = 902;
	case Cyan300 = 903;
	case Cyan400 = 904;
	case Cyan500 = 905;
	case Cyan600 = 906;
	case Cyan700 = 907;
	case Cyan800 = 908;
	case Cyan900 = 909;
	case Cyan950 = 910;

	// Ciel, de 1000 à 1099

	case Sky50 = 1000;
	case Sky100 = 1001;
	case Sky200 = 1002;
	case Sky300 = 1003;
	case Sky400 = 1004;
	case Sky500 = 1005;
	case Sky600 = 1006;
	case Sky700 = 1007;
	case Sky800 = 1008;
	case Sky900 = 1009;
	case Sky950 = 1010;

	// Bleu, de 1100 à 1199

	case Blue50 = 1100;
	case Blue100 = 1101;
	case Blue200 = 1102;
	case Blue300 = 1103;
	case Blue400 = 1104;
	case Blue500 = 1105;
	case Blue600 = 1106;
	case Blue700 = 1107;
	case Blue800 = 1108;
	case Blue900 = 1109;
	case Blue950 = 1110;

	// Indigo, de 1200 à 1299

	case Indigo50 = 1200;
	case Indigo100 = 1201;
	case Indigo200 = 1202;
	case Indigo300 = 1203;
	case Indigo400 = 1204;
	case Indigo500 = 1205;
	case Indigo600 = 1206;
	case Indigo700 = 1207;
	case Indigo800 = 1208;
	case Indigo900 = 1209;
	case Indigo950 = 1210;

	// Violet, de 1300 à 1399

	case Violet50 = 1300;
	case Violet100 = 1301;
	case Violet200 = 1302;
	case Violet300 = 1303;
	case Violet400 = 1304;
	case Violet500 = 1305;
	case Violet600 = 1306;
	case Violet700 = 1307;
	case Violet800 = 1308;
	case Violet900 = 1309;
	case Violet950 = 1310;

	// Pourpre, de 1400 à 1499

	case Purple50 = 1400;
	case Purple100 = 1401;
	case Purple200 = 1402;
	case Purple300 = 1403;
	case Purple400 = 1404;
	case Purple500 = 1405;
	case Purple600 = 1406;
	case Purple700 = 1407;
	case Purple800 = 1408;
	case Purple900 = 1409;
	case Purple950 = 1410;

	// Fuchsia, de 1500 à 1599

	case Fuchsia50 = 1500;
	case Fuchsia100 = 1501;
	case Fuchsia200 = 1502;
	case Fuchsia300 = 1503;
	case Fuchsia400 = 1504;
	case Fuchsia500 = 1505;
	case Fuchsia600 = 1506;
	case Fuchsia700 = 1507;
	case Fuchsia800 = 1508;
	case Fuchsia900 = 1509;
	case Fuchsia950 = 1510;

	// Rose, de 1600 à 1699

	case Pink50 = 1600;
	case Pink100 = 1601;
	case Pink200 = 1602;
	case Pink300 = 1603;
	case Pink400 = 1604;
	case Pink500 = 1605;
	case Pink600 = 1606;
	case Pink700 = 1607;
	case Pink800 = 1608;
	case Pink900 = 1609;
	case Pink950 = 1610;

	// Rose, de 1700 à 1799

	case Rose50 = 1700;
	case Rose100 = 1701;
	case Rose200 = 1702;
	case Rose300 = 1703;
	case Rose400 = 1704;
	case Rose500 = 1705;
	case Rose600 = 1706;
	case Rose700 = 1707;
	case Rose800 = 1708;
	case Rose900 = 1709;
	case Rose950 = 1710;

	// Ardoise, de 1800 à 1899

	case Slate50 = 1800;
	case Slate100 = 1801;
	case Slate200 = 1802;
	case Slate300 = 1803;
	case Slate400 = 1804;
	case Slate500 = 1805;
	case Slate600 = 1806;
	case Slate700 = 1807;
	case Slate800 = 1808;
	case Slate900 = 1809;
	case Slate950 = 1810;

	// Gris, de 1900 à 1999

	case Gray50 = 1900;
	case Gray100 = 1901;
	case Gray200 = 1902;
	case Gray300 = 1903;
	case Gray400 = 1904;
	case Gray500 = 1905;
	case Gray600 = 1906;
	case Gray700 = 1907;
	case Gray800 = 1908;
	case Gray900 = 1909;
	case Gray950 = 1910;

	// Zinc, de 2000 à 2099

	case Zinc50 = 2000;
	case Zinc100 = 2001;
	case Zinc200 = 2002;
	case Zinc300 = 2003;
	case Zinc400 = 2004;
	case Zinc500 = 2005;
	case Zinc600 = 2006;
	case Zinc700 = 2007;
	case Zinc800 = 2008;
	case Zinc900 = 2009;
	case Zinc950 = 2010;

	// Neutre, de 2100 à 2199

	case Neutral50 = 2100;
	case Neutral100 = 2101;
	case Neutral200 = 2102;
	case Neutral300 = 2103;
	case Neutral400 = 2104;
	case Neutral500 = 2105;
	case Neutral600 = 2106;
	case Neutral700 = 2107;
	case Neutral800 = 2108;
	case Neutral900 = 2109;
	case Neutral950 = 2110;

	// Pierre, de 2200 à 2299

	case Stone50 = 2200;
	case Stone100 = 2201;
	case Stone200 = 2202;
	case Stone300 = 2203;
	case Stone400 = 2204;
	case Stone500 = 2205;
	case Stone600 = 2206;
	case Stone700 = 2207;
	case Stone800 = 2208;
	case Stone900 = 2209;
	case Stone950 = 2210;

	// Taupe, de 2300 à 2399

	case Taupe50 = 2300;
	case Taupe100 = 2301;
	case Taupe200 = 2302;
	case Taupe300 = 2303;
	case Taupe400 = 2304;
	case Taupe500 = 2305;
	case Taupe600 = 2306;
	case Taupe700 = 2307;
	case Taupe800 = 2308;
	case Taupe900 = 2309;
	case Taupe950 = 2310;

	// Mauve, de 2400 à 2499

	case Mauve50 = 2400;
	case Mauve100 = 2401;
	case Mauve200 = 2402;
	case Mauve300 = 2403;
	case Mauve400 = 2404;
	case Mauve500 = 2405;
	case Mauve600 = 2406;
	case Mauve700 = 2407;
	case Mauve800 = 2408;
	case Mauve900 = 2409;
	case Mauve950 = 2410;

	// Brume, de 2500 à 2599

	case Mist50 = 2500;
	case Mist100 = 2501;
	case Mist200 = 2502;
	case Mist300 = 2503;
	case Mist400 = 2504;
	case Mist500 = 2505;
	case Mist600 = 2506;
	case Mist700 = 2507;
	case Mist800 = 2508;
	case Mist900 = 2509;
	case Mist950 = 2510;

	// Olive, de 2600 à 2699

	case Olive50 = 2600;
	case Olive100 = 2601;
	case Olive200 = 2602;
	case Olive300 = 2603;
	case Olive400 = 2604;
	case Olive500 = 2605;
	case Olive600 = 2606;
	case Olive700 = 2607;
	case Olive800 = 2608;
	case Olive900 = 2609;
	case Olive950 = 2610;

	// Terre cuite, de 2700 à 2799

	case Terracotta50 = 2700;
	case Terracotta100 = 2701;
	case Terracotta200 = 2702;
	case Terracotta300 = 2703;
	case Terracotta400 = 2704;
	case Terracotta500 = 2705;
	case Terracotta600 = 2706;
	case Terracotta700 = 2707;
	case Terracotta800 = 2708;
	case Terracotta900 = 2709;
	case Terracotta950 = 2710;

	// Pêche, de 2800 à 2899

	case Peach50 = 2800;
	case Peach100 = 2801;
	case Peach200 = 2802;
	case Peach300 = 2803;
	case Peach400 = 2804;
	case Peach500 = 2805;
	case Peach600 = 2806;
	case Peach700 = 2807;
	case Peach800 = 2808;
	case Peach900 = 2809;
	case Peach950 = 2810;

	// Sable, de 2900 à 2999

	case Sand50 = 2900;
	case Sand100 = 2901;
	case Sand200 = 2902;
	case Sand300 = 2903;
	case Sand400 = 2904;
	case Sand500 = 2905;
	case Sand600 = 2906;
	case Sand700 = 2907;
	case Sand800 = 2908;
	case Sand900 = 2909;
	case Sand950 = 2910;

	// Corail, de 3000 à 3099

	case Coral50 = 3000;
	case Coral100 = 3001;
	case Coral200 = 3002;
	case Coral300 = 3003;
	case Coral400 = 3004;
	case Coral500 = 3005;
	case Coral600 = 3006;
	case Coral700 = 3007;
	case Coral800 = 3008;
	case Coral900 = 3009;
	case Coral950 = 3010;

	// Sage, de 3100 à 3199

	case Sage50 = 3100;
	case Sage100 = 3101;
	case Sage200 = 3102;
	case Sage300 = 3103;
	case Sage400 = 3104;
	case Sage500 = 3105;
	case Sage600 = 3106;
	case Sage700 = 3107;
	case Sage800 = 3108;
	case Sage900 = 3109;
	case Sage950 = 3110;

	// Lagoon, de 3200 à 3299

	case Lagoon50 = 3200;
	case Lagoon100 = 3201;
	case Lagoon200 = 3202;
	case Lagoon300 = 3203;
	case Lagoon400 = 3204;
	case Lagoon500 = 3205;
	case Lagoon600 = 3206;
	case Lagoon700 = 3207;
	case Lagoon800 = 3208;
	case Lagoon900 = 3209;
	case Lagoon950 = 3210;

	/**
	 * Trouver une couleur par son identifiant
	 *
	 * Équivalent à Color::from($id). Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param int $id L'identifiant de la couleur
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \ValueError Si aucune couleur ne correspond à l'identifiant donné
	 */
	public static function fromId(int $id): self
	{
		return self::from($id);
	}

	/**
	 * Trouver une couleur par son nom de case
	 *
	 * Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $name Le nom de la case de l'énumération (ex. 'Red500')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \ValueError Si aucune couleur ne correspond au nom donné
	 */
	public static function fromName(string $name): self
	{
		foreach (self::cases() as $case) {
			if ($case->getName() === $name) {
				return $case;
			}
		}
		
		throw new \ValueError("Aucune couleur trouvée avec le nom '{$name}'.");
	}

	/**
	 * Trouver une couleur par son code numérique
	 *
	 * Retourne la première couleur correspondante, car plusieurs palettes peuvent
	 * partager le même code numérique (ex. 500 pour Red500, Orange500, etc.).
	 * Lance une ValueError si le code est inférieur ou égal à zéro, ou si aucune couleur ne correspond.
	 *
	 * @param int $code Le code numérique de la couleur (ex. 500), doit être un entier positif
	 *
	 * @return self La première couleur correspondante
	 *
	 * @throws \ValueError Si le code est inférieur ou égal à zéro, ou si aucune couleur ne correspond au code donné
	 */
	public static function fromCode(int $code): self
	{
		if ($code <= 0) {
			throw new \ValueError("Le code de couleur doit être un entier positif. Valeur fournie : '{$code}'.");
		}

		foreach (self::cases() as $case) {
			$caseCode = $case->getCode();
			if ($caseCode > 0 && $caseCode === $code) {
				return $case;
			}
		}
		
		throw new \ValueError("Aucune couleur trouvée avec le code '{$code}'.");
	}

	/**
	 * Trouver une couleur par son titre
	 *
	 * Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $title Le titre de la couleur (ex. 'Rouge passion')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \ValueError Si aucune couleur ne correspond au titre donné
	 */
	public static function fromTitle(string $title): self
	{
		foreach (self::cases() as $case) {
			if ($case->getTitle() === $title) {
				return $case;
			}
		}
		
		throw new \ValueError("Aucune couleur trouvée avec le titre '{$title}'.");
	}

	/**
	 * Trouver une couleur par son code hexadécimal
	 *
	 * La comparaison est insensible à la casse (ex. '#EF4444' correspond à '#ef4444').
	 * Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $hex Le code hexadécimal de la couleur (ex. '#ef4444' ou 'ef4444')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \InvalidArgumentException Si le format hexadécimal est invalide
	 * @throws \ValueError Si aucune couleur ne correspond au code hexadécimal donné
	 */
	public static function fromHex(string $hex): self
	{
		ColorService::validateHex($hex);

		$hex = '#' . strtolower(ltrim($hex, '#'));

		foreach (self::cases() as $case) {
			if ($case->getHex() === $hex) {
				return $case;
			}
		}

		throw new \ValueError("Aucune couleur trouvée avec le code hexadécimal '{$hex}'.");
	}

	/**
	 * Trouver une couleur par son code RGB
	 *
	 * Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $rgb Le code RGB de la couleur (ex. 'rgb(239, 68, 68)')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \InvalidArgumentException Si le format RGB est invalide
	 * @throws \ValueError Si aucune couleur ne correspond au code RGB donné
	 */
	public static function fromRgb(string $rgb): self
	{
		if (!preg_match('/^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/', $rgb, $matches)) {
			throw new \InvalidArgumentException("Format RGB invalide : '{$rgb}'.");
		}

		$r = (int) $matches[1];
		$g = (int) $matches[2];
		$b = (int) $matches[3];

		foreach ([$r, $g, $b] as $component) {
			if ($component < 0 || $component > 255) {
				throw new \InvalidArgumentException("Les composantes RGB doivent être comprises entre 0 et 255 : '{$rgb}'.");
			}
		}

		$normalized = "rgb({$r}, {$g}, {$b})";

		foreach (self::cases() as $case) {
			if ($case->getRgb() === $normalized) {
				return $case;
			}
		}

		throw new \ValueError("Aucune couleur trouvée avec le code RGB '{$rgb}'.");
	}

	/**
	 * Trouver une couleur par son code RGBA
	 *
	 * Le canal alpha est ignoré lors de la recherche : seules les composantes RGB
	 * sont utilisées pour identifier la couleur correspondante.
	 * Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $rgba Le code RGBA de la couleur (ex. 'rgba(239, 68, 68, 0.5)')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \InvalidArgumentException Si le format RGBA est invalide
	 * @throws \ValueError Si aucune couleur ne correspond aux composantes RGB extraites
	 */
	public static function fromRgba(string $rgba): self
	{
		if (!preg_match('/^rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d+(?:\.\d+)?)\s*\)$/', $rgba, $matches)) {
			throw new \InvalidArgumentException("Format RGBA invalide : '{$rgba}'.");
		}

		$r = (int) $matches[1];
		$g = (int) $matches[2];
		$b = (int) $matches[3];
		$alpha = (float) $matches[4];

		if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
			throw new \InvalidArgumentException(
				"Composantes RGB invalides dans le code RGBA '{$rgba}'. Les valeurs doivent être comprises entre 0 et 255."
			);
		}

		if ($alpha < 0.0 || $alpha > 1.0) {
			throw new \InvalidArgumentException("Valeur alpha invalide (doit être comprise entre 0 et 1) dans '{$rgba}'.");
		}

		return self::fromRgb("rgb({$r}, {$g}, {$b})");
	}

	/**
	 * Trouver une couleur par son code HSL
	 *
	 * La valeur fournie doit correspondre au format produit par
	 * {@see ColorService::rgb2hsl()} (ex. 'hsl(0, 91%, 60%)') : les composantes
	 * H (0–360), S (0–100) et L (0–100) sont des entiers sans décimales.
	 * La chaîne est normalisée avant comparaison, ce qui tolère des espaces
	 * différents autour des virgules.
	 * Lance une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $hsl Le code HSL de la couleur (ex. 'hsl(0, 91%, 60%)')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \InvalidArgumentException Si le format HSL est invalide ou si les composantes sont hors limites
	 * @throws \ValueError Si aucune couleur ne correspond au code HSL donné
	 */
	public static function fromHsl(string $hsl): self
	{
		if (!preg_match('/^hsl\(\s*(\d{1,3})\s*,\s*(\d{1,3})%\s*,\s*(\d{1,3})%\s*\)$/', $hsl, $matches)) {
			throw new \InvalidArgumentException("Format HSL invalide : '{$hsl}'.");
		}

		$h = (int) $matches[1];
		$s = (int) $matches[2];
		$l = (int) $matches[3];

		if ($h > 360) {
			throw new \InvalidArgumentException("La teinte (H) doit être comprise entre 0 et 360 dans '{$hsl}'.");
		}

		if ($s > 100) {
			throw new \InvalidArgumentException("La saturation (S) doit être comprise entre 0 et 100 dans '{$hsl}'.");
		}

		if ($l > 100) {
			throw new \InvalidArgumentException("La luminosité (L) doit être comprise entre 0 et 100 dans '{$hsl}'.");
		}

		$normalized = "hsl({$h}, {$s}%, {$l}%)";

		foreach (self::cases() as $case) {
			if ($case->getHsl() === $normalized) {
				return $case;
			}
		}

		throw new \ValueError("Aucune couleur trouvée avec le code HSL '{$hsl}'.");
	}

	/**
	 * Trouver une couleur par son code OKLCH
	 *
	 * La valeur fournie doit correspondre exactement au format produit par
	 * {@see ColorService::rgb2oklch()} (ex. 'oklch(0.6274 0.2007 22.15)').
	 * Lance une InvalidArgumentException si le format est invalide,
	 * ou une ValueError si aucune couleur ne correspond.
	 *
	 * @param string $oklch Le code OKLCH de la couleur (ex. 'oklch(0.6274 0.2007 22.15)')
	 *
	 * @return self La couleur correspondante
	 *
	 * @throws \InvalidArgumentException Si le format OKLCH est invalide
	 * @throws \ValueError Si aucune couleur ne correspond au code OKLCH donné
	 */
	public static function fromOklch(string $oklch): self
	{
		if (!preg_match('/^oklch\(\d+(?:\.\d+)? \d+(?:\.\d+)? \d+(?:\.\d+)?\)$/', $oklch)) {
			throw new \InvalidArgumentException("Format OKLCH invalide : '{$oklch}'.");
		}

		foreach (self::cases() as $case) {
			if ($case->getOklch() === $oklch) {
				return $case;
			}
		}

		throw new \ValueError("Aucune couleur trouvée avec le code OKLCH '{$oklch}'.");
	}

	/**
	 * Obtenir l'identifiant de la couleur
	 * 
	 * @return int L'identifiant de la couleur
	 */
	public function getId(): int
	{
		return $this->value;
	}

	/**
	 * Obtenir le nom de la couleur
	 * 
	 * @return string Le nom de la couleur
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Obtenir le code de la couleur
	 * 
	 * Le code est la partie numérique du nom de la couleur
	 * 
	 * @return int Le code de la couleur
	 */
	public function getCode(): int
	{
		if (preg_match('/\d+$/', $this->getName(), $matches)) {
			return (int) $matches[0];
		}

		return 0;
	}

	/**
	 * Obtenir le titre de la couleur
	 * 
	 * @return string Le titre de la couleur
	 */
	public function getTitle(): string
	{
		return match($this) {
			self::Black => 'Noir absolu',
			self::White => 'Blanc pur',

			self::Red50 => 'Rouge rosée',
			self::Red100 => 'Rouge nacré',
			self::Red200 => 'Rouge pétale',
			self::Red300 => 'Rouge tendre',
			self::Red400 => 'Rouge éclat',
			self::Red500 => 'Rouge passion',
			self::Red600 => 'Rouge braise',
			self::Red700 => 'Rouge carmin',
			self::Red800 => 'Rouge grenat',
			self::Red900 => 'Rouge impérial',
			self::Red950 => 'Rouge abyssal',

			self::Orange50 => 'Orange brume',
			self::Orange100 => 'Orange pastel',
			self::Orange200 => 'Orange abricot',
			self::Orange300 => 'Orange mangue',
			self::Orange400 => 'Orange solaire',
			self::Orange500 => 'Orange vitalité',
			self::Orange600 => 'Orange épicé',
			self::Orange700 => 'Orange cuivre',
			self::Orange800 => 'Orange terre cuite',
			self::Orange900 => 'Orange brûlé',
			self::Orange950 => 'Orange volcan',

			self::Amber50 => 'Ambre léger',
			self::Amber100 => 'Ambre doré',
			self::Amber200 => 'Ambre pollen',
			self::Amber300 => 'Ambre miel',
			self::Amber400 => 'Ambre lumineux',
			self::Amber500 => 'Ambre royal',
			self::Amber600 => 'Ambre intense',
			self::Amber700 => 'Ambre précieux',
			self::Amber800 => 'Ambre ancien',
			self::Amber900 => 'Ambre profond',
			self::Amber950 => 'Ambre fossilisé',

			self::Yellow50 => 'Jaune perle',
			self::Yellow100 => 'Jaune aube',
			self::Yellow200 => 'Jaune bouton d’or',
			self::Yellow300 => 'Jaune lumière',
			self::Yellow400 => 'Jaune éclatant',
			self::Yellow500 => 'Jaune solaire',
			self::Yellow600 => 'Jaune safran',
			self::Yellow700 => 'Jaune moisson',
			self::Yellow800 => 'Jaune antique',
			self::Yellow900 => 'Jaune fauve',
			self::Yellow950 => 'Jaune crépuscule',

			self::Lime50 => 'Citron vert rosée',
			self::Lime100 => 'Citron vert frais',
			self::Lime200 => 'Citron vert zeste',
			self::Lime300 => 'Citron vert tonic',
			self::Lime400 => 'Citron vert vif',
			self::Lime500 => 'Citron vert énergie',
			self::Lime600 => 'Citron vert intense',
			self::Lime700 => 'Citron vert jungle',
			self::Lime800 => 'Citron vert forêt',
			self::Lime900 => 'Citron vert mousse',
			self::Lime950 => 'Citron vert nocturne',

			self::Green50 => 'Vert rosée',
			self::Green100 => 'Vert tendre',
			self::Green200 => 'Vert feuille',
			self::Green300 => 'Vert prairie',
			self::Green400 => 'Vert nature',
			self::Green500 => 'Vert équilibre',
			self::Green600 => 'Vert émeraude',
			self::Green700 => 'Vert forêt',
			self::Green800 => 'Vert cèdre',
			self::Green900 => 'Vert sapin',
			self::Green950 => 'Vert minuit',

			self::Emerald50 => 'Émeraude brume',
			self::Emerald100 => 'Émeraude claire',
			self::Emerald200 => 'Émeraude douce',
			self::Emerald300 => 'Émeraude lagon',
			self::Emerald400 => 'Émeraude fraîche',
			self::Emerald500 => 'Émeraude précieuse',
			self::Emerald600 => 'Émeraude intense',
			self::Emerald700 => 'Émeraude noble',
			self::Emerald800 => 'Émeraude profonde',
			self::Emerald900 => 'Émeraude royale',
			self::Emerald950 => 'Émeraude abyssale',

			self::Teal50 => 'Sarcelle brume',
			self::Teal100 => 'Sarcelle claire',
			self::Teal200 => 'Sarcelle douce',
			self::Teal300 => 'Sarcelle marine',
			self::Teal400 => 'Sarcelle pure',
			self::Teal500 => 'Sarcelle signature',
			self::Teal600 => 'Sarcelle intense',
			self::Teal700 => 'Sarcelle océan',
			self::Teal800 => 'Sarcelle profonde',
			self::Teal900 => 'Sarcelle mystique',
			self::Teal950 => 'Sarcelle abyssale',

			self::Cyan50 => 'Cyan givre',
			self::Cyan100 => 'Cyan limpide',
			self::Cyan200 => 'Cyan glacier',
			self::Cyan300 => 'Cyan lagune',
			self::Cyan400 => 'Cyan azur',
			self::Cyan500 => 'Cyan éclat',
			self::Cyan600 => 'Cyan vif',
			self::Cyan700 => 'Cyan profond',
			self::Cyan800 => 'Cyan océan',
			self::Cyan900 => 'Cyan polaire',
			self::Cyan950 => 'Cyan abyssal',

			self::Sky50 => 'Ciel brume',
			self::Sky100 => 'Ciel clair',
			self::Sky200 => 'Ciel matinal',
			self::Sky300 => 'Ciel d’été',
			self::Sky400 => 'Ciel vivant',
			self::Sky500 => 'Ciel azur',
			self::Sky600 => 'Ciel intense',
			self::Sky700 => 'Ciel horizon',
			self::Sky800 => 'Ciel orage',
			self::Sky900 => 'Ciel nocturne',
			self::Sky950 => 'Ciel infini',

			self::Blue50 => 'Bleu brume',
			self::Blue100 => 'Bleu givré',
			self::Blue200 => 'Bleu clair',
			self::Blue300 => 'Bleu aérien',
			self::Blue400 => 'Bleu vibrant',
			self::Blue500 => 'Bleu signature',
			self::Blue600 => 'Bleu intense',
			self::Blue700 => 'Bleu cobalt',
			self::Blue800 => 'Bleu marine',
			self::Blue900 => 'Bleu impérial',
			self::Blue950 => 'Bleu abyssal',

			self::Indigo50 => 'Indigo brume',
			self::Indigo100 => 'Indigo soyeux',
			self::Indigo200 => 'Indigo tendre',
			self::Indigo300 => 'Indigo velours',
			self::Indigo400 => 'Indigo vibrant',
			self::Indigo500 => 'Indigo royal',
			self::Indigo600 => 'Indigo intense',
			self::Indigo700 => 'Indigo nocturne',
			self::Indigo800 => 'Indigo profond',
			self::Indigo900 => 'Indigo souverain',
			self::Indigo950 => 'Indigo infini',

			self::Violet50 => 'Violet brume',
			self::Violet100 => 'Violet iris',
			self::Violet200 => 'Violet tendre',
			self::Violet300 => 'Violet lavande',
			self::Violet400 => 'Violet éclat',
			self::Violet500 => 'Violet aura',
			self::Violet600 => 'Violet intense',
			self::Violet700 => 'Violet mystique',
			self::Violet800 => 'Violet profond',
			self::Violet900 => 'Violet impérial',
			self::Violet950 => 'Violet cosmique',

			self::Purple50 => 'Pourpre brume',
			self::Purple100 => 'Pourpre doux',
			self::Purple200 => 'Pourpre poudré',
			self::Purple300 => 'Pourpre velours',
			self::Purple400 => 'Pourpre noble',
			self::Purple500 => 'Pourpre majesté',
			self::Purple600 => 'Pourpre intense',
			self::Purple700 => 'Pourpre royal',
			self::Purple800 => 'Pourpre profond',
			self::Purple900 => 'Pourpre impérial',
			self::Purple950 => 'Pourpre abyssal',

			self::Fuchsia50 => 'Fuchsia rosée',
			self::Fuchsia100 => 'Fuchsia soie',
			self::Fuchsia200 => 'Fuchsia pétale',
			self::Fuchsia300 => 'Fuchsia orchidée',
			self::Fuchsia400 => 'Fuchsia éclat',
			self::Fuchsia500 => 'Fuchsia iconique',
			self::Fuchsia600 => 'Fuchsia intense',
			self::Fuchsia700 => 'Fuchsia velours',
			self::Fuchsia800 => 'Fuchsia profond',
			self::Fuchsia900 => 'Fuchsia impérial',
			self::Fuchsia950 => 'Fuchsia électrique',

			self::Pink50 => 'Rose poudrée',
			self::Pink100 => 'Rose tendre',
			self::Pink200 => 'Rose dragée',
			self::Pink300 => 'Rose satin',
			self::Pink400 => 'Rose charme',
			self::Pink500 => 'Rose éclat',
			self::Pink600 => 'Rose intense',
			self::Pink700 => 'Rose framboise',
			self::Pink800 => 'Rose velours',
			self::Pink900 => 'Rose passion',
			self::Pink950 => 'Rose envoûtante',

			self::Rose50 => 'Rose perle',
			self::Rose100 => 'Rose fraîche',
			self::Rose200 => 'Rose pétale',
			self::Rose300 => 'Rose lumineuse',
			self::Rose400 => 'Rose vive',
			self::Rose500 => 'Rose signature',
			self::Rose600 => 'Rose carmin',
			self::Rose700 => 'Rose intense',
			self::Rose800 => 'Rose profonde',
			self::Rose900 => 'Rose royale',
			self::Rose950 => 'Rose nocturne',

			self::Slate50 => 'Ardoise brume',
			self::Slate100 => 'Ardoise claire',
			self::Slate200 => 'Ardoise douce',
			self::Slate300 => 'Ardoise satinée',
			self::Slate400 => 'Ardoise minérale',
			self::Slate500 => 'Ardoise équilibrée',
			self::Slate600 => 'Ardoise intense',
			self::Slate700 => 'Ardoise roche',
			self::Slate800 => 'Ardoise profonde',
			self::Slate900 => 'Ardoise orage',
			self::Slate950 => 'Ardoise minuit',

			self::Gray50 => 'Gris perle',
			self::Gray100 => 'Gris brume',
			self::Gray200 => 'Gris argent',
			self::Gray300 => 'Gris doux',
			self::Gray400 => 'Gris nuage',
			self::Gray500 => 'Gris urbain',
			self::Gray600 => 'Gris acier',
			self::Gray700 => 'Gris graphite',
			self::Gray800 => 'Gris anthracite',
			self::Gray900 => 'Gris carbone',
			self::Gray950 => 'Gris obsidienne',

			self::Zinc50 => 'Zinc brume',
			self::Zinc100 => 'Zinc pâle',
			self::Zinc200 => 'Zinc soyeux',
			self::Zinc300 => 'Zinc minéral',
			self::Zinc400 => 'Zinc poli',
			self::Zinc500 => 'Zinc brut',
			self::Zinc600 => 'Zinc dense',
			self::Zinc700 => 'Zinc fumé',
			self::Zinc800 => 'Zinc graphite',
			self::Zinc900 => 'Zinc industriel',
			self::Zinc950 => 'Zinc profond',

			self::Neutral50 => 'Neutre soie',
			self::Neutral100 => 'Neutre clair',
			self::Neutral200 => 'Neutre doux',
			self::Neutral300 => 'Neutre coton',
			self::Neutral400 => 'Neutre sable',
			self::Neutral500 => 'Neutre naturel',
			self::Neutral600 => 'Neutre dense',
			self::Neutral700 => 'Neutre sobre',
			self::Neutral800 => 'Neutre profond',
			self::Neutral900 => 'Neutre fusain',
			self::Neutral950 => 'Neutre absolu',

			self::Stone50 => 'Pierre claire',
			self::Stone100 => 'Pierre douce',
			self::Stone200 => 'Pierre poudrée',
			self::Stone300 => 'Pierre naturelle',
			self::Stone400 => 'Pierre sable',
			self::Stone500 => 'Pierre brute',
			self::Stone600 => 'Pierre minérale',
			self::Stone700 => 'Pierre taillée',
			self::Stone800 => 'Pierre sombre',
			self::Stone900 => 'Pierre volcanique',
			self::Stone950 => 'Pierre nocturne',

			self::Taupe50 => 'Taupe perle',
			self::Taupe100 => 'Taupe douce',
			self::Taupe200 => 'Taupe lin',
			self::Taupe300 => 'Taupe sable',
			self::Taupe400 => 'Taupe velours',
			self::Taupe500 => 'Taupe naturel',
			self::Taupe600 => 'Taupe profond',
			self::Taupe700 => 'Taupe noisette',
			self::Taupe800 => 'Taupe cacao',
			self::Taupe900 => 'Taupe terre',
			self::Taupe950 => 'Taupe ébène',

			self::Mauve50 => 'Mauve brume',
			self::Mauve100 => 'Mauve poudre',
			self::Mauve200 => 'Mauve satin',
			self::Mauve300 => 'Mauve douce',
			self::Mauve400 => 'Mauve velours',
			self::Mauve500 => 'Mauve signature',
			self::Mauve600 => 'Mauve intense',
			self::Mauve700 => 'Mauve prune',
			self::Mauve800 => 'Mauve profonde',
			self::Mauve900 => 'Mauve impériale',
			self::Mauve950 => 'Mauve obscure',

			self::Mist50 => 'Brume légère',
			self::Mist100 => 'Brume claire',
			self::Mist200 => 'Brume douce',
			self::Mist300 => 'Brume fraîche',
			self::Mist400 => 'Brume minérale',
			self::Mist500 => 'Brume argentée',
			self::Mist600 => 'Brume dense',
			self::Mist700 => 'Brume orageuse',
			self::Mist800 => 'Brume profonde',
			self::Mist900 => 'Brume froide',
			self::Mist950 => 'Brume nocturne',

			self::Olive50 => 'Olive claire',
			self::Olive100 => 'Olive tendre',
			self::Olive200 => 'Olive sauge',
			self::Olive300 => 'Olive naturelle',
			self::Olive400 => 'Olive feuillage',
			self::Olive500 => 'Olive signature',
			self::Olive600 => 'Olive intense',
			self::Olive700 => 'Olive botanique',
			self::Olive800 => 'Olive profonde',
			self::Olive900 => 'Olive antique',
			self::Olive950 => 'Olive nocturne',

			self::Terracotta50 => 'Terre cuite aurore',
			self::Terracotta100 => 'Terre cuite nacré',
			self::Terracotta200 => 'Terre cuite pêche',
			self::Terracotta300 => 'Terre cuite saumon',
			self::Terracotta400 => 'Terre cuite vivant',
			self::Terracotta500 => 'Terre cuite signature',
			self::Terracotta600 => 'Terre cuite braise',
			self::Terracotta700 => 'Terre cuite cuivre',
			self::Terracotta800 => 'Terre cuite argile',
			self::Terracotta900 => 'Terre cuite brique',
			self::Terracotta950 => 'Terre cuite nocturne',

			self::Peach50 => 'Pêche aurore',
			self::Peach100 => 'Pêche nacré',
			self::Peach200 => 'Pêche doux',
			self::Peach300 => 'Pêche fleur',
			self::Peach400 => 'Pêche soleil',
			self::Peach500 => 'Pêche signature',
			self::Peach600 => 'Pêche intense',
			self::Peach700 => 'Pêche brûlé',
			self::Peach800 => 'Pêche profond',
			self::Peach900 => 'Pêche boisé',
			self::Peach950 => 'Pêche nocturne',

			self::Sand50 => 'Sable nacré',
			self::Sand100 => 'Sable ivoire',
			self::Sand200 => 'Sable doux',
			self::Sand300 => 'Sable chaud',
			self::Sand400 => 'Sable doré',
			self::Sand500 => 'Sable signature',
			self::Sand600 => 'Sable intense',
			self::Sand700 => 'Sable brûlé',
			self::Sand800 => 'Sable profond',
			self::Sand900 => 'Sable antique',
			self::Sand950 => 'Sable nocturne',

			self::Coral50 => 'Corail aurore',
			self::Coral100 => 'Corail nacré',
			self::Coral200 => 'Corail doux',
			self::Coral300 => 'Corail rosé',
			self::Coral400 => 'Corail vif',
			self::Coral500 => 'Corail signature',
			self::Coral600 => 'Corail intense',
			self::Coral700 => 'Corail profond',
			self::Coral800 => 'Corail braise',
			self::Coral900 => 'Corail grenat',
			self::Coral950 => 'Corail nocturne',

			self::Sage50 => 'Sauge brume',
			self::Sage100 => 'Sauge claire',
			self::Sage200 => 'Sauge douce',
			self::Sage300 => 'Sauge naturelle',
			self::Sage400 => 'Sauge fraîche',
			self::Sage500 => 'Sauge signature',
			self::Sage600 => 'Sauge intense',
			self::Sage700 => 'Sauge herbe',
			self::Sage800 => 'Sauge profonde',
			self::Sage900 => 'Sauge forêt',
			self::Sage950 => 'Sauge nocturne',

			self::Lagoon50 => 'Lagon brume',
			self::Lagoon100 => 'Lagon clair',
			self::Lagoon200 => 'Lagon doux',
			self::Lagoon300 => 'Lagon turquoise',
			self::Lagoon400 => 'Lagon vif',
			self::Lagoon500 => 'Lagon signature',
			self::Lagoon600 => 'Lagon intense',
			self::Lagoon700 => 'Lagon tropical',
			self::Lagoon800 => 'Lagon profond',
			self::Lagoon900 => 'Lagon mystique',
			self::Lagoon950 => 'Lagon abyssal',

			default => 'Couleur sans titre',
		};
	}

	/**
	 * Obtenir le code hexadécimal de la couleur
	 * 
	 * @return string Le code hexadécimal de la couleur
	 */
	public function getHex(): string
	{
		return match($this) {
			self::Black => '#000000',
			self::White => '#ffffff',

			self::Red50 => '#fef2f2',
			self::Red100 => '#fee2e2',
			self::Red200 => '#fecaca',
			self::Red300 => '#fca5a5',
			self::Red400 => '#f87171',
			self::Red500 => '#ef4444',
			self::Red600 => '#dc2626',
			self::Red700 => '#b91c1c',
			self::Red800 => '#991b1b',
			self::Red900 => '#7f1d1d',
			self::Red950 => '#450a0a',

			self::Orange50 => '#fff7ed',
			self::Orange100 => '#ffedd5',
			self::Orange200 => '#fed7aa',
			self::Orange300 => '#fdba74',
			self::Orange400 => '#fb923c',
			self::Orange500 => '#f97316',
			self::Orange600 => '#ea580c',
			self::Orange700 => '#c2410c',
			self::Orange800 => '#9a3412',
			self::Orange900 => '#7c2d12',
			self::Orange950 => '#431407',

			self::Amber50 => '#fffbeb',
			self::Amber100 => '#fef3c7',
			self::Amber200 => '#fde68a',
			self::Amber300 => '#fcd34d',
			self::Amber400 => '#fbbf24',
			self::Amber500 => '#f59e0b',
			self::Amber600 => '#d97706',
			self::Amber700 => '#b45309',
			self::Amber800 => '#92400e',
			self::Amber900 => '#78350f',
			self::Amber950 => '#451a03',

			self::Yellow50 => '#fefce8',
			self::Yellow100 => '#fef9c3',
			self::Yellow200 => '#fef08a',
			self::Yellow300 => '#fde047',
			self::Yellow400 => '#facc15',
			self::Yellow500 => '#eab308',
			self::Yellow600 => '#ca8a04',
			self::Yellow700 => '#a16207',
			self::Yellow800 => '#854d0e',
			self::Yellow900 => '#713f12',
			self::Yellow950 => '#422006',

			self::Lime50 => '#f7fee7',
			self::Lime100 => '#ecfccb',
			self::Lime200 => '#d9f99d',
			self::Lime300 => '#bef264',
			self::Lime400 => '#a3e635',
			self::Lime500 => '#84cc16',
			self::Lime600 => '#65a30d',
			self::Lime700 => '#4d7c0f',
			self::Lime800 => '#3f6212',
			self::Lime900 => '#365314',
			self::Lime950 => '#1a2e05',

			self::Green50 => '#f0fdf4',
			self::Green100 => '#dcfce7',
			self::Green200 => '#bbf7d0',
			self::Green300 => '#86efac',
			self::Green400 => '#4ade80',
			self::Green500 => '#22c55e',
			self::Green600 => '#16a34a',
			self::Green700 => '#15803d',
			self::Green800 => '#166534',
			self::Green900 => '#14532d',
			self::Green950 => '#052e16',

			self::Emerald50 => '#ecfdf5',
			self::Emerald100 => '#d1fae5',
			self::Emerald200 => '#a7f3d0',
			self::Emerald300 => '#6ee7b7',
			self::Emerald400 => '#34d399',
			self::Emerald500 => '#10b981',
			self::Emerald600 => '#059669',
			self::Emerald700 => '#047857',
			self::Emerald800 => '#065f46',
			self::Emerald900 => '#064e3b',
			self::Emerald950 => '#022c22',

			self::Teal50 => '#f0fdfa',
			self::Teal100 => '#ccfbf1',
			self::Teal200 => '#99f6e4',
			self::Teal300 => '#5eead4',
			self::Teal400 => '#2dd4bf',
			self::Teal500 => '#14b8a6',
			self::Teal600 => '#0d9488',
			self::Teal700 => '#0f766e',
			self::Teal800 => '#115e59',
			self::Teal900 => '#134e4a',
			self::Teal950 => '#042f2e',

			self::Cyan50 => '#ecfeff',
			self::Cyan100 => '#cffafe',
			self::Cyan200 => '#a5f3fc',
			self::Cyan300 => '#67e8f9',
			self::Cyan400 => '#22d3ee',
			self::Cyan500 => '#06b6d4',
			self::Cyan600 => '#0891b2',
			self::Cyan700 => '#0e7490',
			self::Cyan800 => '#155e75',
			self::Cyan900 => '#164e63',
			self::Cyan950 => '#083344',

			self::Sky50 => '#f0f9ff',
			self::Sky100 => '#e0f2fe',
			self::Sky200 => '#bae6fd',
			self::Sky300 => '#7dd3fc',
			self::Sky400 => '#38bdf8',
			self::Sky500 => '#0ea5e9',
			self::Sky600 => '#0284c7',
			self::Sky700 => '#0369a1',
			self::Sky800 => '#075985',
			self::Sky900 => '#0c4a6e',
			self::Sky950 => '#082f49',

			self::Blue50 => '#eff6ff',
			self::Blue100 => '#dbeafe',
			self::Blue200 => '#bfdbfe',
			self::Blue300 => '#93c5fd',
			self::Blue400 => '#60a5fa',
			self::Blue500 => '#3b82f6',
			self::Blue600 => '#2563eb',
			self::Blue700 => '#1d4ed8',
			self::Blue800 => '#1e40af',
			self::Blue900 => '#1e3a8a',
			self::Blue950 => '#172554',

			self::Indigo50 => '#eef2ff',
			self::Indigo100 => '#e0e7ff',
			self::Indigo200 => '#c7d2fe',
			self::Indigo300 => '#a5b4fc',
			self::Indigo400 => '#818cf8',
			self::Indigo500 => '#6366f1',
			self::Indigo600 => '#4f46e5',
			self::Indigo700 => '#4338ca',
			self::Indigo800 => '#3730a3',
			self::Indigo900 => '#312e81',
			self::Indigo950 => '#1e1b4b',

			self::Violet50 => '#f5f3ff',
			self::Violet100 => '#ede9fe',
			self::Violet200 => '#ddd6fe',
			self::Violet300 => '#c4b5fd',
			self::Violet400 => '#a78bfa',
			self::Violet500 => '#8b5cf6',
			self::Violet600 => '#7c3aed',
			self::Violet700 => '#6d28d9',
			self::Violet800 => '#5b21b6',
			self::Violet900 => '#4c1d95',
			self::Violet950 => '#2e1065',

			self::Purple50 => '#faf5ff',
			self::Purple100 => '#f3e8ff',
			self::Purple200 => '#e9d5ff',
			self::Purple300 => '#d8b4fe',
			self::Purple400 => '#c084fc',
			self::Purple500 => '#a855f7',
			self::Purple600 => '#9333ea',
			self::Purple700 => '#7e22ce',
			self::Purple800 => '#6b21a8',
			self::Purple900 => '#581c87',
			self::Purple950 => '#3b0764',

			self::Fuchsia50 => '#fdf4ff',
			self::Fuchsia100 => '#fae8ff',
			self::Fuchsia200 => '#f5d0fe',
			self::Fuchsia300 => '#f0abfc',
			self::Fuchsia400 => '#e879f9',
			self::Fuchsia500 => '#d946ef',
			self::Fuchsia600 => '#c026d3',
			self::Fuchsia700 => '#a21caf',
			self::Fuchsia800 => '#86198f',
			self::Fuchsia900 => '#701a75',
			self::Fuchsia950 => '#4a044e',

			self::Pink50 => '#fdf2f8',
			self::Pink100 => '#fce7f3',
			self::Pink200 => '#fbcfe8',
			self::Pink300 => '#f9a8d4',
			self::Pink400 => '#f472b6',
			self::Pink500 => '#ec4899',
			self::Pink600 => '#db2777',
			self::Pink700 => '#be185d',
			self::Pink800 => '#9d174d',
			self::Pink900 => '#831843',
			self::Pink950 => '#500724',

			self::Rose50 => '#fff1f2',
			self::Rose100 => '#ffe4e6',
			self::Rose200 => '#fecdd3',
			self::Rose300 => '#fda4af',
			self::Rose400 => '#fb7185',
			self::Rose500 => '#f43f5e',
			self::Rose600 => '#e11d48',
			self::Rose700 => '#be123c',
			self::Rose800 => '#9f1239',
			self::Rose900 => '#881337',
			self::Rose950 => '#4c0519',

			self::Slate50 => '#f8fafc',
			self::Slate100 => '#f1f5f9',
			self::Slate200 => '#e2e8f0',
			self::Slate300 => '#cbd5e1',
			self::Slate400 => '#94a3b8',
			self::Slate500 => '#64748b',
			self::Slate600 => '#475569',
			self::Slate700 => '#334155',
			self::Slate800 => '#1e293b',
			self::Slate900 => '#0f172a',
			self::Slate950 => '#020617',

			self::Gray50 => '#f9fafb',
			self::Gray100 => '#f3f4f6',
			self::Gray200 => '#e5e7eb',
			self::Gray300 => '#d1d5db',
			self::Gray400 => '#9ca3af',
			self::Gray500 => '#6b7280',
			self::Gray600 => '#4b5563',
			self::Gray700 => '#374151',
			self::Gray800 => '#1f2937',
			self::Gray900 => '#111827',
			self::Gray950 => '#030712',

			self::Zinc50 => '#fafafa',
			self::Zinc100 => '#f4f4f5',
			self::Zinc200 => '#e4e4e7',
			self::Zinc300 => '#d4d4d8',
			self::Zinc400 => '#a1a1aa',
			self::Zinc500 => '#71717a',
			self::Zinc600 => '#52525b',
			self::Zinc700 => '#3f3f46',
			self::Zinc800 => '#27272a',
			self::Zinc900 => '#18181b',
			self::Zinc950 => '#09090b',

			self::Neutral50 => '#fafafa',
			self::Neutral100 => '#f5f5f5',
			self::Neutral200 => '#e5e5e5',
			self::Neutral300 => '#d4d4d4',
			self::Neutral400 => '#a3a3a3',
			self::Neutral500 => '#737373',
			self::Neutral600 => '#525252',
			self::Neutral700 => '#404040',
			self::Neutral800 => '#262626',
			self::Neutral900 => '#171717',
			self::Neutral950 => '#0a0a0a',

			self::Stone50 => '#fafaf9',
			self::Stone100 => '#f5f5f4',
			self::Stone200 => '#e7e5e4',
			self::Stone300 => '#d6d3d1',
			self::Stone400 => '#a8a29e',
			self::Stone500 => '#78716c',
			self::Stone600 => '#57534e',
			self::Stone700 => '#44403c',
			self::Stone800 => '#292524',
			self::Stone900 => '#1c1917',
			self::Stone950 => '#0c0a09',

			self::Taupe50 => '#fbfaf9',
			self::Taupe100 => '#f3f1f1',
			self::Taupe200 => '#e8e4e3',
			self::Taupe300 => '#d8d2d0',
			self::Taupe400 => '#aba09c',
			self::Taupe500 => '#7c6d67',
			self::Taupe600 => '#5b4f4b',
			self::Taupe700 => '#473c39',
			self::Taupe800 => '#2b2422',
			self::Taupe900 => '#1d1816',
			self::Taupe950 => '#0c0a09',

			self::Mauve50 => '#fafafa',
			self::Mauve100 => '#f3f1f3',
			self::Mauve200 => '#e7e4e7',
			self::Mauve300 => '#d7d0d7',
			self::Mauve400 => '#a89ea9',
			self::Mauve500 => '#79697b',
			self::Mauve600 => '#594c5b',
			self::Mauve700 => '#463947',
			self::Mauve800 => '#2a212c',
			self::Mauve900 => '#1d161e',
			self::Mauve950 => '#0c090c',

			self::Mist50 => '#f9fbfb',
			self::Mist100 => '#f1f3f3',
			self::Mist200 => '#e3e7e8',
			self::Mist300 => '#d0d6d8',
			self::Mist400 => '#9ca8ab',
			self::Mist500 => '#67787c',
			self::Mist600 => '#4b585b',
			self::Mist700 => '#394447',
			self::Mist800 => '#22292b',
			self::Mist900 => '#161b1d',
			self::Mist950 => '#090b0c',

			self::Olive50 => '#fbfbf9',
			self::Olive100 => '#f4f4f0',
			self::Olive200 => '#e8e8e3',
			self::Olive300 => '#d8d8d0',
			self::Olive400 => '#abab9c',
			self::Olive500 => '#7c7c67',
			self::Olive600 => '#5b5b4b',
			self::Olive700 => '#474739',
			self::Olive800 => '#2b2b22',
			self::Olive900 => '#1d1d16',
			self::Olive950 => '#0c0c09',

			self::Terracotta50 => '#fdf3ef',
			self::Terracotta100 => '#fae3d9',
			self::Terracotta200 => '#f5c4ae',
			self::Terracotta300 => '#eda07e',
			self::Terracotta400 => '#e27a52',
			self::Terracotta500 => '#c8552a',
			self::Terracotta600 => '#a84424',
			self::Terracotta700 => '#87341c',
			self::Terracotta800 => '#642818',
			self::Terracotta900 => '#4a1e13',
			self::Terracotta950 => '#280e09',

			self::Peach50 => '#fff6f2',
			self::Peach100 => '#ffe9df',
			self::Peach200 => '#ffd0bc',
			self::Peach300 => '#ffb096',
			self::Peach400 => '#ff8c6b',
			self::Peach500 => '#f96b42',
			self::Peach600 => '#e04e28',
			self::Peach700 => '#b83a1a',
			self::Peach800 => '#8a2c14',
			self::Peach900 => '#652010',
			self::Peach950 => '#360f06',

			self::Sand50 => '#fdfcf8',
			self::Sand100 => '#f8f4ec',
			self::Sand200 => '#f0e9d8',
			self::Sand300 => '#e4d8bc',
			self::Sand400 => '#ccb98a',
			self::Sand500 => '#b09660',
			self::Sand600 => '#8e7544',
			self::Sand700 => '#6e5a32',
			self::Sand800 => '#504025',
			self::Sand900 => '#3a2e1b',
			self::Sand950 => '#1e1709',

			self::Coral50 => '#fff4f2',
			self::Coral100 => '#ffe4df',
			self::Coral200 => '#ffc9bf',
			self::Coral300 => '#ffa394',
			self::Coral400 => '#ff7d6a',
			self::Coral500 => '#ff5a42',
			self::Coral600 => '#e83520',
			self::Coral700 => '#c02516',
			self::Coral800 => '#8f1d12',
			self::Coral900 => '#6b160e',
			self::Coral950 => '#390a06',

			self::Sage50 => '#f4f7f4',
			self::Sage100 => '#e5ede5',
			self::Sage200 => '#ccdacc',
			self::Sage300 => '#aac2aa',
			self::Sage400 => '#82a382',
			self::Sage500 => '#5f845f',
			self::Sage600 => '#476647',
			self::Sage700 => '#385138',
			self::Sage800 => '#2a3d2a',
			self::Sage900 => '#1e2c1e',
			self::Sage950 => '#0f170f',

			self::Lagoon50 => '#edfcfb',
			self::Lagoon100 => '#d1f7f5',
			self::Lagoon200 => '#a3eeeb',
			self::Lagoon300 => '#63e0db',
			self::Lagoon400 => '#29c9c3',
			self::Lagoon500 => '#00b5ad',
			self::Lagoon600 => '#008f89',
			self::Lagoon700 => '#00706b',
			self::Lagoon800 => '#005551',
			self::Lagoon900 => '#003d3a',
			self::Lagoon950 => '#001f1d',

			default => self::Black->getHex(),
		};
	}

	/**
	 * Obtenir le code RGB de la couleur
	 * 
	 * @return string|null Le code RGB de la couleur
	 */
	public function getRgb(): ?string
	{
		return ColorService::hex2rgb($this->getHex());
	}

	/**
	 * Obtenir le code RGBA de la couleur
	 * 
	 * @param float $alpha Le niveau de transparence (0 à 1)
	 * 
	 * @return string|null Le code RGBA de la couleur
	 */
	public function getRgba(float $alpha = ColorService::DEFAULT_ALPHA): ?string
	{
		return ColorService::hex2rgba($this->getHex(), $alpha);
	}

	/**
	 * Obtenir le code HSL de la couleur
	 * 
	 * @return string|null Le code HSL de la couleur
	 */
	public function getHsl(): ?string
	{
		return ColorService::hex2hsl($this->getHex());
	}

	/**
	 * Obtenir le code OKLCH de la couleur
	 * 
	 * @return string|null Le code OKLCH de la couleur
	 */
	public function getOklch(): ?string
	{
		return ColorService::hex2oklch($this->getHex());
	}

	/**
	 * Convertir la couleur en tableau
	 * 
	 * @param float $alpha Le niveau de transparence (0 à 1)
	 * 
	 * @return array La couleur sous forme de tableau
	 */
	public function toArray(float $alpha = ColorService::DEFAULT_ALPHA): array
	{
		return [
			'id' => $this->getId(),
			'name' => $this->getName(),
			'code' => $this->getCode(),
			'title' => $this->getTitle(),
			'hex' => $this->getHex(),
			'rgb' => $this->getRgb(),
			'rgba' => $this->getRgba($alpha),
			'hsl' => $this->getHsl(),
			'oklch' => $this->getOklch(),
		];
	}
}
