<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ColorService
{
	public const HEX_PREFIX = '#';

	public const HEX_RED_OFFSET = 0;
	public const HEX_GREEN_OFFSET = 2;
	public const HEX_BLUE_OFFSET = 4;
	public const HEX_COMPONENT_LENGTH = 2;

	public const MIN_COMPONENT_VALUE = 0.0;
	public const UNIT_VALUE = 1.0;
	public const DEFAULT_ALPHA = 1.0;

	public const RGB_CHANNEL_MAX = 255;
	public const PERCENTAGE_FACTOR = 100;

	public const DOUBLE_MULTIPLIER = 2;
	public const SQUARE_EXPONENT = 2;
	public const CUBE_ROOT_EXPONENT = 1 / 3;

	public const HSL_LIGHTNESS_DIVISOR = 2;
	public const HUE_SECTOR_DEGREES = 60;
	public const FULL_CIRCLE_DEGREES = 360.0;
	public const MIN_HUE_DEGREES = 0.0;

	public const HUE_RED_MODULO = 6;
	public const HUE_GREEN_OFFSET = 2;
	public const HUE_BLUE_OFFSET = 4;

	public const HSL_HUE_PRECISION = 0;
	public const HSL_PERCENT_PRECISION = 0;

	public const OKLCH_LIGHTNESS_PRECISION = 4;
	public const OKLCH_CHROMA_PRECISION = 4;
	public const OKLCH_HUE_PRECISION = 2;

	public const SRGB_LINEARIZE_THRESHOLD = 0.04045;
	public const SRGB_LINEARIZE_LOW_DIVISOR = 12.92;
	public const SRGB_LINEARIZE_OFFSET = 0.055;
	public const SRGB_LINEARIZE_DIVISOR = 1.055;
	public const SRGB_LINEARIZE_GAMMA = 2.4;

	public const SRGB_TO_XYZ_RX = 0.4124564;
	public const SRGB_TO_XYZ_RY = 0.2126729;
	public const SRGB_TO_XYZ_RZ = 0.0193339;
	public const SRGB_TO_XYZ_GX = 0.3575761;
	public const SRGB_TO_XYZ_GY = 0.7151522;
	public const SRGB_TO_XYZ_GZ = 0.1191920;
	public const SRGB_TO_XYZ_BX = 0.1804375;
	public const SRGB_TO_XYZ_BY = 0.0721750;
	public const SRGB_TO_XYZ_BZ = 0.9503041;

	public const XYZ_TO_LMS_LX = 0.8189330101;
	public const XYZ_TO_LMS_LY = 0.3618667424;
	public const XYZ_TO_LMS_LZ = -0.1288597137;
	public const XYZ_TO_LMS_MX = 0.0329845436;
	public const XYZ_TO_LMS_MY = 0.9293118715;
	public const XYZ_TO_LMS_MZ = 0.0361456387;
	public const XYZ_TO_LMS_SX = 0.0482003018;
	public const XYZ_TO_LMS_SY = 0.2643662691;
	public const XYZ_TO_LMS_SZ = 0.6338517070;

	public const LMS_TO_OKLAB_LL = 0.2104542553;
	public const LMS_TO_OKLAB_LM = 0.7936177850;
	public const LMS_TO_OKLAB_LS = -0.0040720468;
	public const LMS_TO_OKLAB_AL = 1.9779984951;
	public const LMS_TO_OKLAB_AM = -2.4285922050;
	public const LMS_TO_OKLAB_AS = 0.4505937099;
	public const LMS_TO_OKLAB_BL = 0.0259040371;
	public const LMS_TO_OKLAB_BM = 0.7827717662;
	public const LMS_TO_OKLAB_BS = -0.8086757660;

	public static function convertHexadecimalToRgb(string $hex): string
	{
		self::validateHexadecimal($hex);

		$hex = ltrim($hex, self::HEX_PREFIX);
		$r = hexdec(substr($hex, self::HEX_RED_OFFSET, self::HEX_COMPONENT_LENGTH));
		$g = hexdec(substr($hex, self::HEX_GREEN_OFFSET, self::HEX_COMPONENT_LENGTH));
		$b = hexdec(substr($hex, self::HEX_BLUE_OFFSET, self::HEX_COMPONENT_LENGTH));

		return "rgb({$r}, {$g}, {$b})";
	}

	public static function convertRgbToRgba(string $rgb, float $alpha = self::DEFAULT_ALPHA): string
	{
		$rgb = self::parseRgb($rgb);

		[$r, $g, $b] = $rgb;

		return "rgba({$r}, {$g}, {$b}, {$alpha})";
	}

	public static function convertRgbToHsl(string $rgb): string
	{
		$rgb = self::parseRgb($rgb);

		[$r, $g, $b] = $rgb;

		$r /= self::RGB_CHANNEL_MAX;
		$g /= self::RGB_CHANNEL_MAX;
		$b /= self::RGB_CHANNEL_MAX;

		$max = max($r, $g, $b);
		$min = min($r, $g, $b);
		$delta = $max - $min;
		$l = ($max + $min) / self::HSL_LIGHTNESS_DIVISOR;

		if ($delta == self::MIN_COMPONENT_VALUE) {
			$h = self::MIN_HUE_DEGREES;
			$s = self::MIN_COMPONENT_VALUE;
		} else {
			$s = $delta / (self::UNIT_VALUE - abs(self::DOUBLE_MULTIPLIER * $l - self::UNIT_VALUE));

			$h = match ($max) {
				$r => self::HUE_SECTOR_DEGREES * fmod(($g - $b) / $delta, self::HUE_RED_MODULO),
				$g => self::HUE_SECTOR_DEGREES * (($b - $r) / $delta + self::HUE_GREEN_OFFSET),
				$b => self::HUE_SECTOR_DEGREES * (($r - $g) / $delta + self::HUE_BLUE_OFFSET),
			};

			if ($h < self::MIN_HUE_DEGREES) {
				$h += self::FULL_CIRCLE_DEGREES;
			}
		}

		$h = round($h, self::HSL_HUE_PRECISION);
		$s = round($s * self::PERCENTAGE_FACTOR, self::HSL_PERCENT_PRECISION);
		$l = round($l * self::PERCENTAGE_FACTOR, self::HSL_PERCENT_PRECISION);

		return "hsl({$h}, {$s}%, {$l}%)";
	}

	public static function convertRgbToOklch(string $rgb): string
	{
		$rgb = self::parseRgb($rgb);

		[$r, $g, $b] = $rgb;

		$r /= self::RGB_CHANNEL_MAX;
		$g /= self::RGB_CHANNEL_MAX;
		$b /= self::RGB_CHANNEL_MAX;

		$linearize = fn(float $c): float => $c <= self::SRGB_LINEARIZE_THRESHOLD
			? $c / self::SRGB_LINEARIZE_LOW_DIVISOR
			: (($c + self::SRGB_LINEARIZE_OFFSET) / self::SRGB_LINEARIZE_DIVISOR) ** self::SRGB_LINEARIZE_GAMMA;

		$r = $linearize($r);
		$g = $linearize($g);
		$b = $linearize($b);

		$x = $r * self::SRGB_TO_XYZ_RX + $g * self::SRGB_TO_XYZ_GX + $b * self::SRGB_TO_XYZ_BX;
		$y = $r * self::SRGB_TO_XYZ_RY + $g * self::SRGB_TO_XYZ_GY + $b * self::SRGB_TO_XYZ_BY;
		$z = $r * self::SRGB_TO_XYZ_RZ + $g * self::SRGB_TO_XYZ_GZ + $b * self::SRGB_TO_XYZ_BZ;

		$l = $x * self::XYZ_TO_LMS_LX + $y * self::XYZ_TO_LMS_LY + $z * self::XYZ_TO_LMS_LZ;
		$m = $x * self::XYZ_TO_LMS_MX + $y * self::XYZ_TO_LMS_MY + $z * self::XYZ_TO_LMS_MZ;
		$s = $x * self::XYZ_TO_LMS_SX + $y * self::XYZ_TO_LMS_SY + $z * self::XYZ_TO_LMS_SZ;

		$cbrt = fn(float $v): float => $v >= self::MIN_COMPONENT_VALUE
			? $v ** self::CUBE_ROOT_EXPONENT
			: -((-$v) ** self::CUBE_ROOT_EXPONENT);

		$l = $cbrt($l);
		$m = $cbrt($m);
		$s = $cbrt($s);

		$L = $l * self::LMS_TO_OKLAB_LL + $m * self::LMS_TO_OKLAB_LM + $s * self::LMS_TO_OKLAB_LS;
		$a = $l * self::LMS_TO_OKLAB_AL + $m * self::LMS_TO_OKLAB_AM + $s * self::LMS_TO_OKLAB_AS;
		$b = $l * self::LMS_TO_OKLAB_BL + $m * self::LMS_TO_OKLAB_BM + $s * self::LMS_TO_OKLAB_BS;

		$C = sqrt($a ** self::SQUARE_EXPONENT + $b ** self::SQUARE_EXPONENT);
		$h = rad2deg(atan2($b, $a));

		if ($h < self::MIN_HUE_DEGREES) {
			$h += self::FULL_CIRCLE_DEGREES;
		}

		$L = round($L, self::OKLCH_LIGHTNESS_PRECISION);
		$C = round($C, self::OKLCH_CHROMA_PRECISION);
		$h = round($h, self::OKLCH_HUE_PRECISION);

		return "oklch({$L} {$C} {$h})";
	}

	public static function validateHexadecimal(string $hex): void
	{
		if (!preg_match('/^#?[0-9a-fA-F]{6}$/', $hex)) {
			throw new \InvalidArgumentException('La couleur hexadécimale doit être au format #RRGGBB ou RRGGBB.');
		}
	}

	public static function validateRgb(string $rgb): void
	{
		if (!preg_match('/^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/', $rgb, $matches)) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		if ((int)$matches[1] > 255 || (int)$matches[2] > 255 || (int)$matches[3] > 255) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}
	}

	private static function parseRgb(string $rgb): array
	{
		self::validateRgb($rgb);
	
		$parsedComponents = sscanf($rgb, 'rgb(%d, %d, %d)', $r, $g, $b);

		if ($parsedComponents !== 3) {
			throw new \InvalidArgumentException('La couleur RGB ne peut pas être mal formatée.');
		}

		return [$r, $g, $b];
	}
}
