<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Validate
{
	public static function hex(string $hex): string
	{
		if (!preg_match('/^#?[0-9a-fA-F]{6}$/', $hex)) {
			throw new \InvalidArgumentException('La couleur hexadécimale doit être au format #RRGGBB ou RRGGBB.');
		}

		return $hex;
	}

	public static function rgb(string $rgb): string
	{
		if (!preg_match('/^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/', $rgb, $matches)) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		if ((int)$matches[1] > 255 || (int)$matches[2] > 255 || (int)$matches[3] > 255) {
			throw new \InvalidArgumentException('La couleur RGB doit être au format rgb(R, G, B) avec R, G et B entre 0 et 255.');
		}

		return $rgb;
	}

	public static function rgba(string $rgba): string
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

		return $rgba;
	}

	public static function alpha(float $alpha): float
	{
		if ($alpha < 0.0 || $alpha > 1.0) {
			throw new \InvalidArgumentException('Le niveau de transparence doit être compris entre 0 et 1.');
		}

		return $alpha;
	}

	public static function hsl(string $hsl): string
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

		return $hsl;
	}

	public static function oklch(string $oklch): string
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

		return $oklch;
	}
}
