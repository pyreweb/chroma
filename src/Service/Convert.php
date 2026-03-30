<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

use Pyreweb\Chroma\Service\Colorimetry;
use Pyreweb\Chroma\Service\Parse;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Convert
{
	public const CHANNEL_MAX = 255;
	public const PERCENT_MAX = 100;

	public const OKLMS_R_L = 0.4122214708;
	public const OKLMS_R_M = 0.2119034982;
	public const OKLMS_R_S = 0.0883024619;
	public const OKLMS_G_L = 0.5363325363;
	public const OKLMS_G_M = 0.6806995451;
	public const OKLMS_G_S = 0.2817188376;
	public const OKLMS_B_L = 0.0514459929;
	public const OKLMS_B_M = 0.1073969566;
	public const OKLMS_B_S = 0.6299787005;

	public const OKLAB_L_L = 0.2104542553;
	public const OKLAB_L_M = 0.7936177850;
	public const OKLAB_L_S = -0.0040720468;
	public const OKLAB_A_L = 1.9779984951;
	public const OKLAB_A_M = -2.4285922050;
	public const OKLAB_A_S = 0.4505937099;
	public const OKLAB_B_L = 0.0259040371;
	public const OKLAB_B_M = 0.7827717662;
	public const OKLAB_B_S = -0.8086757660;

	public static function hex2rgb(string $hex): string
	{
		[$r, $g, $b] = Parse::hex($hex);

		return "rgb($r, $g, $b)";
	}

	public static function hex2rgba(string $hex, float $alpha = 1.0): string
	{
		[$r, $g, $b] = Parse::hex($hex);

		return "rgba($r, $g, $b, $alpha)";
	}

	public static function hex2hsl(string $hex): string
	{
		[$r, $g, $b] = Parse::hex($hex);

		$r /= self::CHANNEL_MAX;
		$g /= self::CHANNEL_MAX;
		$b /= self::CHANNEL_MAX;

		$max = max($r, $g, $b);
		$min = min($r, $g, $b);
		$delta = $max - $min;

		$l = ($max + $min) / 2;

		if ($delta < 1e-10) {
			return "hsl(0, 0%, " . round($l * self::PERCENT_MAX, 2) . "%)";
		}

		$s = $delta / (1 - abs(2 * $l - 1));

		if (abs($max - $r) < 1e-10) {
			$h = fmod((($g - $b) / $delta), 6);
		} elseif (abs($max - $g) < 1e-10) {
			$h = (($b - $r) / $delta) + 2;
		} else {
			$h = (($r - $g) / $delta) + 4;
		}

		$h = round(fmod(($h * 60 + 360), 360), 2);

		return "hsl($h, " . round($s * self::PERCENT_MAX, 2) . "%, " . round($l * self::PERCENT_MAX, 2) . "%)";
	}

	public static function hex2oklch(string $hex): string
	{
		[$r, $g, $b] = Parse::hex($hex);

		$r = Colorimetry::linearize($r / self::CHANNEL_MAX);
		$g = Colorimetry::linearize($g / self::CHANNEL_MAX);
		$b = Colorimetry::linearize($b / self::CHANNEL_MAX);

		$lms_l = self::OKLMS_R_L * $r + self::OKLMS_G_L * $g + self::OKLMS_B_L * $b;
		$lms_m = self::OKLMS_R_M * $r + self::OKLMS_G_M * $g + self::OKLMS_B_M * $b;
		$lms_s = self::OKLMS_R_S * $r + self::OKLMS_G_S * $g + self::OKLMS_B_S * $b;

		$lms_l = Colorimetry::cbrt($lms_l);
		$lms_m = Colorimetry::cbrt($lms_m);
		$lms_s = Colorimetry::cbrt($lms_s);

		$L = self::OKLAB_L_L * $lms_l + self::OKLAB_L_M * $lms_m + self::OKLAB_L_S * $lms_s;
		$a = self::OKLAB_A_L * $lms_l + self::OKLAB_A_M * $lms_m + self::OKLAB_A_S * $lms_s;
		$bVal = self::OKLAB_B_L * $lms_l + self::OKLAB_B_M * $lms_m + self::OKLAB_B_S * $lms_s;

		$C = sqrt($a ** 2 + $bVal ** 2);
		$H = $C < 1e-6 ? 0.0 : fmod(rad2deg(atan2($bVal, $a)) + 360, 360);

		return "oklch(" . round($L * self::PERCENT_MAX, 2) . "%, " . round($C * self::PERCENT_MAX, 2) . "%, $H)";
	}

	public static function hex2cmyk(string $hex): string
	{
		[$r, $g, $b] = Parse::hex($hex);

		$r /= self::CHANNEL_MAX;
		$g /= self::CHANNEL_MAX;
		$b /= self::CHANNEL_MAX;

		$k = 1 - max($r, $g, $b);

		if ($k >= 1.0) {
			return "cmyk(0%, 0%, 0%, " . round($k * self::PERCENT_MAX, 2) . "%)";
		}

		$c = (1 - $r - $k) / (1 - $k);
		$m = (1 - $g - $k) / (1 - $k);
		$y = (1 - $b - $k) / (1 - $k);

		return "cmyk(" . round($c * self::PERCENT_MAX, 2) . "%, " . round($m * self::PERCENT_MAX, 2) . "%, " . round($y * self::PERCENT_MAX, 2) . "%, " . round($k * self::PERCENT_MAX, 2) . "%)";
	}
}