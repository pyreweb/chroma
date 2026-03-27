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

	// fromId / tryFromId

	public function testFromIdReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Black, Color::fromId(1));
		$this->assertSame(Color::Red500, Color::fromId(105));
	}

	public function testFromIdThrowsOnUnknownId(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromId(99999);
	}

	public function testTryFromIdReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Black, Color::tryFromId(1));
		$this->assertSame(Color::Red500, Color::tryFromId(105));
	}

	public function testTryFromIdReturnsNullOnUnknownId(): void
	{
		$this->assertNull(Color::tryFromId(99999));
	}

	// fromName / tryFromName

	public function testFromNameReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Black, Color::fromName('Black'));
		$this->assertSame(Color::Red500, Color::fromName('Red500'));
	}

	public function testFromNameThrowsOnUnknownName(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromName('UnknownColor');
	}

	public function testTryFromNameReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Black, Color::tryFromName('Black'));
		$this->assertSame(Color::Red500, Color::tryFromName('Red500'));
	}

	public function testTryFromNameReturnsNullOnUnknownName(): void
	{
		$this->assertNull(Color::tryFromName('UnknownColor'));
	}

	// fromCode / tryFromCode

	public function testFromCodeReturnsFirstMatchForAmbiguousCode(): void
	{
		$result = Color::fromCode(500);
		$this->assertSame(500, $result->getCode());
		$this->assertSame(Color::Red500, $result);
	}

	public function testFromCodeThrowsOnZero(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromCode(0);
	}

	public function testFromCodeThrowsOnNegative(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromCode(-1);
	}

	public function testFromCodeThrowsOnUnknownCode(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromCode(9999);
	}

	public function testTryFromCodeReturnsColorOnMatch(): void
	{
		$result = Color::tryFromCode(500);
		$this->assertNotNull($result);
		$this->assertSame(500, $result->getCode());
	}

	public function testTryFromCodeReturnsNullOnUnknownCode(): void
	{
		$this->assertNull(Color::tryFromCode(9999));
	}

	public function testTryFromCodeReturnsNullOnInvalidCode(): void
	{
		$this->assertNull(Color::tryFromCode(0));
		$this->assertNull(Color::tryFromCode(-1));
	}

	// fromTitle / tryFromTitle

	public function testFromTitleReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Black, Color::fromTitle('Noir absolu'));
		$this->assertSame(Color::Red500, Color::fromTitle('Rouge passion'));
	}

	public function testFromTitleThrowsOnUnknownTitle(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromTitle('Couleur inexistante');
	}

	public function testTryFromTitleReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Black, Color::tryFromTitle('Noir absolu'));
		$this->assertSame(Color::Red500, Color::tryFromTitle('Rouge passion'));
	}

	public function testTryFromTitleReturnsNullOnUnknownTitle(): void
	{
		$this->assertNull(Color::tryFromTitle('Couleur inexistante'));
	}

	// fromHex / tryFromHex

	public function testFromHexReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Red500, Color::fromHex('#ef4444'));
		$this->assertSame(Color::Black, Color::fromHex('#000000'));
	}

	public function testFromHexIsCaseInsensitive(): void
	{
		$this->assertSame(Color::Red500, Color::fromHex('#EF4444'));
		$this->assertSame(Color::Red500, Color::fromHex('#Ef4444'));
	}

	public function testFromHexThrowsOnUnknownHex(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromHex('#123456');
	}

	public function testFromHexThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::fromHex('invalid');
	}

	public function testTryFromHexReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Red500, Color::tryFromHex('#ef4444'));
		$this->assertSame(Color::Red500, Color::tryFromHex('#EF4444'));
	}

	public function testTryFromHexReturnsNullOnUnknownHex(): void
	{
		$this->assertNull(Color::tryFromHex('#123456'));
	}

	public function testTryFromHexThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::tryFromHex('invalid');
	}

	// fromRgb / tryFromRgb

	public function testFromRgbReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Red500, Color::fromRgb('rgb(239, 68, 68)'));
		$this->assertSame(Color::Black, Color::fromRgb('rgb(0, 0, 0)'));
	}

	public function testFromRgbThrowsOnUnknownRgb(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromRgb('rgb(1, 2, 3)');
	}

	public function testFromRgbThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::fromRgb('not-rgb');
	}

	public function testTryFromRgbReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Red500, Color::tryFromRgb('rgb(239, 68, 68)'));
		$this->assertSame(Color::Black, Color::tryFromRgb('rgb(0, 0, 0)'));
	}

	public function testTryFromRgbReturnsNullOnUnknownRgb(): void
	{
		$this->assertNull(Color::tryFromRgb('rgb(1, 2, 3)'));
	}

	public function testTryFromRgbThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::tryFromRgb('not-rgb');
	}

	// fromRgba / tryFromRgba

	public function testFromRgbaReturnsCorrectColorIgnoringAlpha(): void
	{
		$this->assertSame(Color::Red500, Color::fromRgba('rgba(239, 68, 68, 1)'));
		$this->assertSame(Color::Red500, Color::fromRgba('rgba(239, 68, 68, 0.5)'));
		$this->assertSame(Color::Red500, Color::fromRgba('rgba(239, 68, 68, 0)'));
	}

	public function testFromRgbaThrowsOnUnknownRgba(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromRgba('rgba(1, 2, 3, 0.5)');
	}

	public function testFromRgbaThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::fromRgba('invalid');
	}

	public function testTryFromRgbaReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Red500, Color::tryFromRgba('rgba(239, 68, 68, 0.5)'));
	}

	public function testTryFromRgbaReturnsNullOnUnknownRgba(): void
	{
		$this->assertNull(Color::tryFromRgba('rgba(1, 2, 3, 0.5)'));
	}

	public function testTryFromRgbaThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::tryFromRgba('invalid');
	}

	// fromHsl / tryFromHsl

	public function testFromHslReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Black, Color::fromHsl('hsl(0, 0%, 0%)'));
		$this->assertSame(Color::White, Color::fromHsl('hsl(0, 0%, 100%)'));
	}

	public function testFromHslThrowsOnUnknownHsl(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromHsl('hsl(123, 45%, 67%)');
	}

	public function testFromHslThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::fromHsl('invalid');
	}

	public function testTryFromHslReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Black, Color::tryFromHsl('hsl(0, 0%, 0%)'));
		$this->assertSame(Color::White, Color::tryFromHsl('hsl(0, 0%, 100%)'));
	}

	public function testTryFromHslReturnsNullOnUnknownHsl(): void
	{
		$this->assertNull(Color::tryFromHsl('hsl(123, 45%, 67%)'));
	}

	public function testTryFromHslThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::tryFromHsl('invalid');
	}

	// fromOklch / tryFromOklch

	public function testFromOklchReturnsCorrectColor(): void
	{
		$this->assertSame(Color::Black, Color::fromOklch('oklch(0 0 0)'));
	}

	public function testFromOklchThrowsOnUnknownOklch(): void
	{
		$this->expectException(\ValueError::class);
		Color::fromOklch('oklch(0.5 0.1 180)');
	}

	public function testFromOklchThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::fromOklch('invalid');
	}

	public function testTryFromOklchReturnsColorOnMatch(): void
	{
		$this->assertSame(Color::Black, Color::tryFromOklch('oklch(0 0 0)'));
	}

	public function testTryFromOklchReturnsNullOnUnknownOklch(): void
	{
		$this->assertNull(Color::tryFromOklch('oklch(0.5 0.1 180)'));
	}

	public function testTryFromOklchThrowsOnInvalidFormat(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Color::tryFromOklch('invalid');
	}
}
