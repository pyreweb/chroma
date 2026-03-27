<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ColorService
{
	public const DEFAULT_ALPHA = 1.0;

	private const HEX_PREFIX = '#';

	private const HEX_RED_OFFSET = 0;
	private const HEX_GREEN_OFFSET = 2;
	private const HEX_BLUE_OFFSET = 4;
	private const HEX_COMPONENT_LENGTH = 2;

	private const MIN_COMPONENT_VALUE = 0.0;
	private const UNIT_VALUE = 1.0;

	private const RGB_CHANNEL_MAX = 255;
	private const PERCENTAGE_FACTOR = 100;

	private const DOUBLE_MULTIPLIER = 2;
	private const SQUARE_EXPONENT = 2;
	private const CUBE_ROOT_EXPONENT = 1 / 3;

	private const HSL_LIGHTNESS_DIVISOR = 2;
	private const HUE_SECTOR_DEGREES = 60;
	private const FULL_CIRCLE_DEGREES = 360.0;
	private const MIN_HUE_DEGREES = 0.0;

	private const HUE_RED_MODULO = 6;
	private const HUE_GREEN_OFFSET = 2;
	private const HUE_BLUE_OFFSET = 4;

	private const HSL_HUE_PRECISION = 0;
	private const HSL_PERCENT_PRECISION = 0;

	private const OKLCH_LIGHTNESS_PRECISION = 4;
	private const OKLCH_CHROMA_PRECISION = 4;
	private const OKLCH_HUE_PRECISION = 2;

	private const SRGB_LINEARIZE_THRESHOLD = 0.04045;
	private const SRGB_LINEARIZE_LOW_DIVISOR = 12.92;
	private const SRGB_LINEARIZE_OFFSET = 0.055;
	private const SRGB_LINEARIZE_DIVISOR = 1.055;
	private const SRGB_LINEARIZE_GAMMA = 2.4;

	private const SRGB_TO_XYZ_RX = 0.4124564;
	private const SRGB_TO_XYZ_RY = 0.2126729;
	private const SRGB_TO_XYZ_RZ = 0.0193339;
	private const SRGB_TO_XYZ_GX = 0.3575761;
	private const SRGB_TO_XYZ_GY = 0.7151522;
	private const SRGB_TO_XYZ_GZ = 0.1191920;
	private const SRGB_TO_XYZ_BX = 0.1804375;
	private const SRGB_TO_XYZ_BY = 0.0721750;
	private const SRGB_TO_XYZ_BZ = 0.9503041;

	private const XYZ_TO_LMS_LX = 0.8189330101;
	private const XYZ_TO_LMS_LY = 0.3618667424;
	private const XYZ_TO_LMS_LZ = -0.1288597137;
	private const XYZ_TO_LMS_MX = 0.0329845436;
	private const XYZ_TO_LMS_MY = 0.9293118715;
	private const XYZ_TO_LMS_MZ = 0.0361456387;
	private const XYZ_TO_LMS_SX = 0.0482003018;
	private const XYZ_TO_LMS_SY = 0.2643662691;
	private const XYZ_TO_LMS_SZ = 0.6338517070;

	private const LMS_TO_OKLAB_LL = 0.2104542553;
	private const LMS_TO_OKLAB_LM = 0.7936177850;
	private const LMS_TO_OKLAB_LS = -0.0040720468;
	private const LMS_TO_OKLAB_AL = 1.9779984951;
	private const LMS_TO_OKLAB_AM = -2.4285922050;
	private const LMS_TO_OKLAB_AS = 0.4505937099;
	private const LMS_TO_OKLAB_BL = 0.0259040371;
	private const LMS_TO_OKLAB_BM = 0.7827717662;
	private const LMS_TO_OKLAB_BS = -0.8086757660;

	public static function hex2rgb(string $hex): string
	{
		self::validateHex($hex);

		$hex = ltrim($hex, self::HEX_PREFIX);
		$r = hexdec(substr($hex, self::HEX_RED_OFFSET, self::HEX_COMPONENT_LENGTH));
		$g = hexdec(substr($hex, self::HEX_GREEN_OFFSET, self::HEX_COMPONENT_LENGTH));
		$b = hexdec(substr($hex, self::HEX_BLUE_OFFSET, self::HEX_COMPONENT_LENGTH));

		return "rgb({$r}, {$g}, {$b})";
	}

	public static function hex2rgba(string $hex, float $alpha = self::DEFAULT_ALPHA): string
	{
		return self::rgb2rgba(self::hex2rgb($hex), $alpha);
	}

	public static function hex2hsl(string $hex): string
	{
		return self::rgb2hsl(self::hex2rgb($hex));
	}

	public static function hex2oklch(string $hex): string
	{
		return self::rgb2oklch(self::hex2rgb($hex));
	}

	public static function rgb2rgba(string $rgb, float $alpha = self::DEFAULT_ALPHA): string
	{
		if ($alpha < 0.0 || $alpha > 1.0) {
			throw new \InvalidArgumentException('Le niveau de transparence doit être compris entre 0 et 1.');
		}

		$rgb = self::parseRgb($rgb);
		[$r, $g, $b] = $rgb;

		return "rgba({$r}, {$g}, {$b}, {$alpha})";
	}

	public static function rgb2hsl(string $rgb): string
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

	public static function rgb2oklch(string $rgb): string
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

	public static function validateHex(string $hex): void
	{
		if (!preg_match('/^#?[0-9a-fA-F]{6}$/', $hex)) {
			throw new \InvalidArgumentException('La couleur hexadécimale doit être au format #RRGGBB ou RRGGBB.');
		}
	}

	public static function validateRgb(string $rgb): array
	{
		if (!preg_match('/^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/', $rgb, $matches)) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		if ((int)$matches[1] > 255 || (int)$matches[2] > 255 || (int)$matches[3] > 255) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		return $matches;
	}

	public static function validateRgba(string $rgba): void
	{
		if (!preg_match('/^rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(0|1|0?\.\d+)\s*\)$/', $rgba, $matches)) {
			throw new \InvalidArgumentException(
				'La couleur RGBA doit être au format rgba(R, G, B, A) avec R, G et B entre 0 et 255 et A entre 0 et 1.'
			);
		}

		if ((int)$matches[1] > 255 || (int)$matches[2] > 255 || (int)$matches[3] > 255) {
			throw new \InvalidArgumentException(
				'La couleur RGBA doit être au format rgba(R, G, B, A) avec R, G et B entre 0 et 255 et A entre 0 et 1.'
			);
		}

		if ((float)$matches[4] < 0.0 || (float)$matches[4] > 1.0) {
			throw new \InvalidArgumentException(
				'La couleur RGBA doit être au format rgba(R, G, B, A) avec R, G et B entre 0 et 255 et A entre 0 et 1.'
			);
		}
	}

	public static function validateHsl(string $hsl): void
	{
		if (!preg_match('/^hsl\(\s*(\d{1,3})\s*,\s*(\d{1,3})%\s*,\s*(\d{1,3})%\s*\)$/', $hsl, $matches)) {
			throw new \InvalidArgumentException(
				'La couleur HSL doit être au format hsl(H, S%, L%) avec H entre 0 et 360, S et L entre 0 et 100.'
			);
		}

		if ((int)$matches[1] < 0 || (int)$matches[1] > 360) {
			throw new \InvalidArgumentException(
				'La couleur HSL doit être au format hsl(H, S%, L%) avec H entre 0 et 360, S et L entre 0 et 100.'
			);
		}

		if ((int)$matches[2] < 0 || (int)$matches[2] > 100 || (int)$matches[3] < 0 || (int)$matches[3] > 100) {
			throw new \InvalidArgumentException(
				'La couleur HSL doit être au format hsl(H, S%, L%) avec H entre 0 et 360, S et L entre 0 et 100.'
			);
		}
	}

	public static function validateOklch(string $oklch): void
	{
		if (!preg_match('/^oklch\(\s*(\d*\.?\d+)\s+(\d*\.?\d+)\s+(\d*\.?\d+)\s*\)$/', $oklch, $matches)) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}

		if ((float)$matches[1] < 0.0 || (float)$matches[1] > 1.0) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}

		if ((float)$matches[2] < 0.0) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}

		if ((float)$matches[3] < 0.0 || (float)$matches[3] > 360.0) {
			throw new \InvalidArgumentException(
				'La couleur OKLCH doit être au format oklch(L C H) avec L entre 0 et 1, C positif et H entre 0 et 360.'
			);
		}
	}

	public static function parseRgb(string $rgb): array
	{
		$matches = self::validateRgb($rgb);

		$r = (int) $matches[1];
		$g = (int) $matches[2];
		$b = (int) $matches[3];

		if ($r > 255 || $g > 255 || $b > 255) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		return [$r, $g, $b];
	}
}
