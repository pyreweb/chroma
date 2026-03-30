<?php

namespace Pyreweb\Chroma\Service;

use Pyreweb\Chroma\Enum\Color;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Convert
{
	private const HEX_SHORT_LENGTH = 3;
	private const HEX_FULL_LENGTH = 6;
	private const CHANNEL_MAX = 255;
	private const PERCENT_MAX = 100;

	private const SRGB_LINEARIZE_THRESHOLD = 0.04045;
	private const SRGB_LINEARIZE_DIVISOR = 12.92;
	private const SRGB_LINEARIZE_OFFSET = 0.055;
	private const SRGB_LINEARIZE_DIVISOR2 = 1.055;
	private const SRGB_LINEARIZE_GAMMA = 2.4;

	private const OKLMS_R_L = 0.4122214708;
	private const OKLMS_R_M = 0.2119034982;
	private const OKLMS_R_S = 0.0883024619;
	private const OKLMS_G_L = 0.5363325363;
	private const OKLMS_G_M = 0.6806995451;
	private const OKLMS_G_S = 0.2817188376;
	private const OKLMS_B_L = 0.0514459929;
	private const OKLMS_B_M = 0.1073969566;
	private const OKLMS_B_S = 0.6299787005;

	private const OKLAB_L_L = 0.2104542553;
	private const OKLAB_L_M = 0.7936177850;
	private const OKLAB_L_S = -0.0040720468;
	private const OKLAB_A_L = 1.9779984951;
	private const OKLAB_A_M = -2.4285922050;
	private const OKLAB_A_S = 0.4505937099;
	private const OKLAB_B_L = 0.0259040371;
	private const OKLAB_B_M = 0.7827717662;
	private const OKLAB_B_S = -0.8086757660;

	private const CBRT_EXPONENT = 1.0 / 3.0;

	public static function hex2rgb(string $hex): string
	{
		[$r, $g, $b] = self::parseHex($hex);

		return "rgb($r, $g, $b)";
	}

	public static function hex2rgba(string $hex, float $alpha = 1.0): string
	{
		[$r, $g, $b] = self::parseHex($hex);

		return "rgba($r, $g, $b, $alpha)";
	}

	public static function hex2hsl(string $hex): string
	{
		[$r, $g, $b] = self::parseHex($hex);

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
		[$r, $g, $b] = self::parseHex($hex);

		$r = self::linearize($r / self::CHANNEL_MAX);
		$g = self::linearize($g / self::CHANNEL_MAX);
		$b = self::linearize($b / self::CHANNEL_MAX);

		$lms_l = self::OKLMS_R_L * $r + self::OKLMS_G_L * $g + self::OKLMS_B_L * $b;
		$lms_m = self::OKLMS_R_M * $r + self::OKLMS_G_M * $g + self::OKLMS_B_M * $b;
		$lms_s = self::OKLMS_R_S * $r + self::OKLMS_G_S * $g + self::OKLMS_B_S * $b;

		$lms_l = self::cbrt($lms_l);
		$lms_m = self::cbrt($lms_m);
		$lms_s = self::cbrt($lms_s);

		$L = self::OKLAB_L_L * $lms_l + self::OKLAB_L_M * $lms_m + self::OKLAB_L_S * $lms_s;
		$a = self::OKLAB_A_L * $lms_l + self::OKLAB_A_M * $lms_m + self::OKLAB_A_S * $lms_s;
		$bVal = self::OKLAB_B_L * $lms_l + self::OKLAB_B_M * $lms_m + self::OKLAB_B_S * $lms_s;

		$C = sqrt($a ** 2 + $bVal ** 2);
		$H = fmod(rad2deg(atan2($bVal, $a)) + 360, 360);

		return "oklch(" . round($L * self::PERCENT_MAX, 2) . "%, " . round($C * self::PERCENT_MAX, 2) . "%, $H)";
	}

	public static function hex2cmyk(string $hex): string
	{
		[$r, $g, $b] = self::parseHex($hex);

		$r /= self::CHANNEL_MAX;
		$g /= self::CHANNEL_MAX;
		$b /= self::CHANNEL_MAX;

		$k = 1 - max($r, $g, $b);

		if ($k === 1.0) {
			return "cmyk(0%, 0%, 0%, " . round($k * self::PERCENT_MAX, 2) . "%)";
		}

		$c = (1 - $r - $k) / (1 - $k);
		$m = (1 - $g - $k) / (1 - $k);
		$y = (1 - $b - $k) / (1 - $k);

		return "cmyk(" . round($c * self::PERCENT_MAX, 2) . "%, " . round($m * self::PERCENT_MAX, 2) . "%, " . round($y * self::PERCENT_MAX, 2) . "%, " . round($k * self::PERCENT_MAX, 2) . "%)";
	}

	private static function parseHex(string $hex): array
	{
		$hex = ltrim($hex, '#');

		if (strlen($hex) === self::HEX_SHORT_LENGTH) {
			$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
		}

		return [
			hexdec(substr($hex, 0, 2)),
			hexdec(substr($hex, 2, 2)),
			hexdec(substr($hex, 4, 2)),
		];
	}

	private static function linearize(float $value): float
	{
		return $value <= self::SRGB_LINEARIZE_THRESHOLD
			? $value / self::SRGB_LINEARIZE_DIVISOR
			: (($value + self::SRGB_LINEARIZE_OFFSET) / self::SRGB_LINEARIZE_DIVISOR2) ** self::SRGB_LINEARIZE_GAMMA;
	}

	private static function cbrt(float $value): float
	{
		if ($value === 0.0) {
			return 0.0;
		}

		return $value < 0
			? -((-$value) ** self::CBRT_EXPONENT)
			: $value ** self::CBRT_EXPONENT;
	}
}