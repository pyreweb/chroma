<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Enum;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;

class ColorTest extends TestCase
{
	public function testGetIdReturnsCorrectValue(): void
	{
		$this->assertSame(1, Color::Black->getId());
		$this->assertSame(105, Color::Red500->getId());
	}

	public function testGetNameReturnsEnumCaseName(): void
	{
		$this->assertSame('Black', Color::Black->getName());
		$this->assertSame('Red500', Color::Red500->getName());
	}

	public function testGetCodeReturnsNumericSuffix(): void
	{
		$this->assertSame(500, Color::Red500->getCode());
		$this->assertSame(950, Color::Blue950->getCode());
	}

	public function testGetCodeForColorsWithoutNumericSuffix(): void
	{
		$this->assertSame(0, Color::Black->getCode());
		$this->assertSame(0, Color::White->getCode());
	}

	public function testGetTitleReturnsNonEmptyString(): void
	{
		$this->assertNotEmpty(Color::Black->getTitle());
		$this->assertNotEmpty(Color::Red500->getTitle());
	}

	public function testGetTitleReturnsExpectedValue(): void
	{
		$this->assertSame('Noir absolu', Color::Black->getTitle());
		$this->assertSame('Rouge passion', Color::Red500->getTitle());
	}

	public function testGetHexReturnsValidFormat(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertMatchesRegularExpression(
				'/^#[0-9a-fA-F]{6}$/',
				$color->getHex(),
				"La couleur {$color->name} n'a pas un format hexadécimal valide."
			);
		}
	}

	public function testGetHexReturnsExpectedValue(): void
	{
		$this->assertSame('#000000', Color::Black->getHex());
		$this->assertSame('#ef4444', Color::Red500->getHex());
	}

	public function testGetRgbReturnsValidFormat(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertMatchesRegularExpression(
				'/^rgb\(\d{1,3}, \d{1,3}, \d{1,3}\)$/',
				$color->getRgb(),
				"La couleur {$color->name} n'a pas un format RGB valide."
			);
		}
	}

	public function testGetRgbReturnsExpectedValue(): void
	{
		$this->assertSame('rgb(0, 0, 0)', Color::Black->getRgb());
		$this->assertSame('rgb(239, 68, 68)', Color::Red500->getRgb());
	}

	public function testGetRgbaReturnsValidFormat(): void
	{
		$this->assertMatchesRegularExpression(
			'/^rgba\(\d{1,3}, \d{1,3}, \d{1,3}, [0-9.]+\)$/',
			Color::Red500->getRgba()
		);
	}

	public function testGetRgbaUsesDefaultAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', Color::Black->getRgba());
	}

	public function testGetRgbaUsesCustomAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 0.5)', Color::Black->getRgba(0.5));
	}

	public function testGetHslReturnsValidFormat(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertMatchesRegularExpression(
				'/^hsl\(\d+, \d+%, \d+%\)$/',
				$color->getHsl(),
				"La couleur {$color->name} n'a pas un format HSL valide."
			);
		}
	}

	public function testGetHslReturnsExpectedValue(): void
	{
		$this->assertSame('hsl(0, 0%, 0%)', Color::Black->getHsl());
		$this->assertSame('hsl(0, 0%, 100%)', Color::White->getHsl());
	}

	public function testGetOklchReturnsValidFormat(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertMatchesRegularExpression(
				'/^oklch\([0-9.]+ [0-9.]+ [0-9.]+\)$/',
				$color->getOklch(),
				"La couleur {$color->name} n'a pas un format OKLCH valide."
			);
		}
	}

	public function testGetOklchReturnsExpectedValue(): void
	{
		$this->assertSame('oklch(0 0 0)', Color::Black->getOklch());

		$this->assertStringStartsWith('oklch(1 ', Color::White->getOklch());
	}

	public function testToArrayContainsAllKeys(): void
	{
		$array = Color::Black->toArray();

		$this->assertArrayHasKey('id', $array);
		$this->assertArrayHasKey('name', $array);
		$this->assertArrayHasKey('code', $array);
		$this->assertArrayHasKey('title', $array);
		$this->assertArrayHasKey('hex', $array);
		$this->assertArrayHasKey('rgb', $array);
		$this->assertArrayHasKey('rgba', $array);
		$this->assertArrayHasKey('hsl', $array);
		$this->assertArrayHasKey('oklch', $array);
	}

	public function testToArrayValuesAreConsistent(): void
	{
		$color = Color::Red500;
		$array = $color->toArray();

		$this->assertSame($color->getId(), $array['id']);
		$this->assertSame($color->getName(), $array['name']);
		$this->assertSame($color->getHex(), $array['hex']);
		$this->assertSame($color->getRgb(), $array['rgb']);
		$this->assertSame($color->getHsl(), $array['hsl']);
		$this->assertSame($color->getOklch(), $array['oklch']);
	}

	public function testAllCasesHaveUniqueId(): void
	{
		$ids = array_map(fn(Color $c) => $c->getId(), Color::cases());

		$this->assertSame(count($ids), count(array_unique($ids)), 'Deux couleurs partagent le même ID.');
	}

	public function testAllCasesHaveNonEmptyTitle(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertNotSame(
				'Couleur sans titre',
				$color->getTitle(),
				"La couleur {$color->name} n'a pas de titre défini."
			);
		}
	}

	public function testAllCasesHaveDefinedHex(): void
	{
		$excluded = [Color::Black];

		foreach (Color::cases() as $color) {
			if (in_array($color, $excluded, true)) {
				continue;
			}

			$this->assertNotSame(
				'#000000',
				$color->getHex(),
				"La couleur {$color->name} utilise le fallback hexadécimal (#000000)."
			);
		}
	}
}
