<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

use Pyreweb\Chroma\Service\Validate;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Parse
{
	private const HEX_PREFIX = '#';

	private const HEX_RED_OFFSET = 0;
	private const HEX_GREEN_OFFSET = 2;
	private const HEX_BLUE_OFFSET = 4;
	private const HEX_COMPONENT_LENGTH = 2;

	public static function hex(string $hex): array
	{
		Validate::hex($hex);

		$hex = ltrim($hex, self::HEX_PREFIX);

		return [
			(int)substr($hex, self::HEX_RED_OFFSET, self::HEX_COMPONENT_LENGTH),
			(int)substr($hex, self::HEX_GREEN_OFFSET, self::HEX_COMPONENT_LENGTH),
			(int)substr($hex, self::HEX_BLUE_OFFSET, self::HEX_COMPONENT_LENGTH),
		];
	}

	public static function rgb(string $rgb): array
	{
		preg_match('/^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/', $rgb, $matches);

		return [(int)$matches[1], (int)$matches[2], (int)$matches[3]];
	}

	public static function rgba(string $rgba): array
	{
		preg_match('/^rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(0|1|0?\.\d+)\s*\)$/', $rgba, $matches);

		return [(int)$matches[1], (int)$matches[2], (int)$matches[3], (float)$matches[4]];
	}

	public static function hsl(string $hsl): array
	{
		preg_match('/^hsl\(\s*(\d{1,3})\s*,\s*(\d{1,3})%\s*,\s*(\d{1,3})%\s*\)$/', $hsl, $matches);

		return [(int)$matches[1], (int)$matches[2], (int)$matches[3]];
	}

	public static function oklch(string $oklch): array
	{
		preg_match('/^oklch\(\s*(\d{1,3}(?:\.\d+)?)\s+(\d{1,3}(?:\.\d+)?)\s+(\d{1,3}(?:\.\d+)?)\s*\)$/', $oklch, $matches);

		return [(float)$matches[1], (float)$matches[2], (float)$matches[3]];
	}
}
