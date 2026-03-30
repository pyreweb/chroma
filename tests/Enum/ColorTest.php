<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Enum;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ColorTest extends TestCase
{
	public function testFromBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::from(1));
		$this->assertSame($expected, Color::from(Color::Black->value));
		$this->assertSame($expected, Color::from(Color::Black->getId()));
	}

	public function testFromWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::from(2));
		$this->assertSame($expected, Color::from(Color::White->value));
		$this->assertSame($expected, Color::from(Color::White->getId()));
	}

	public function testFromRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::from(105));
		$this->assertSame($expected, Color::from(Color::Red500->value));
		$this->assertSame($expected, Color::from(Color::Red500->getId()));
	}

	public function testFromInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::from(999999);
	}

	public function testFromIdBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromId(1));
		$this->assertSame($expected, Color::fromId(Color::Black->value));
		$this->assertSame($expected, Color::fromId(Color::Black->getId()));
	}

	public function testFromIdWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromId(2));
		$this->assertSame($expected, Color::fromId(Color::White->value));
		$this->assertSame($expected, Color::fromId(Color::White->getId()));
	}

	public function testFromIdRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromId(105));
		$this->assertSame($expected, Color::fromId(Color::Red500->value));
		$this->assertSame($expected, Color::fromId(Color::Red500->getId()));
	}

	public function testFromIdInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromId(999999);
	}

	public function testFromNameBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromName('Black'));
		$this->assertSame($expected, Color::fromName(Color::Black->name));
		$this->assertSame($expected, Color::fromName(Color::Black->getName()));
	}

	public function testFromNameWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromName('White'));
		$this->assertSame($expected, Color::fromName(Color::White->name));
		$this->assertSame($expected, Color::fromName(Color::White->getName()));
	}

	public function testFromNameRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromName('Red500'));
		$this->assertSame($expected, Color::fromName(Color::Red500->name));
		$this->assertSame($expected, Color::fromName(Color::Red500->getName()));
	}

	public function testFromNameInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromName('InvalidColor');
	}

	public function testFromTitleBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromTitle('Noir'));
		$this->assertSame($expected, Color::fromTitle(Color::Black->getTitle()));
	}

	public function testFromTitleWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromTitle('Blanc'));
		$this->assertSame($expected, Color::fromTitle(Color::White->getTitle()));
	}

	public function testFromTitleRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromTitle('Rouge passion'));
		$this->assertSame($expected, Color::fromTitle(Color::Red500->getTitle()));
	}

	public function testFromTitleInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromTitle('Invalid Color');
	}

	public function testFromHexBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromHex('#000000'));
		$this->assertSame($expected, Color::fromHex(Color::Black->getHex()));
	}

	public function testFromHexWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromHex('#ffffff'));
		$this->assertSame($expected, Color::fromHex(Color::White->getHex()));
	}

	public function testFromHexRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromHex('#ef4444'));
		$this->assertSame($expected, Color::fromHex(Color::Red500->getHex()));
	}

	public function testFromHexInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromHex('#gggggg');
	}

	public function testFromRgbBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromRgb('rgb(0, 0, 0)'));
		$this->assertSame($expected, Color::fromRgb(Color::Black->getRgb()));
	}

	public function testFromRgbWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromRgb('rgb(255, 255, 255)'));
		$this->assertSame($expected, Color::fromRgb(Color::White->getRgb()));
	}

	public function testFromRgbRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromRgb('rgb(239, 68, 68)'));
		$this->assertSame($expected, Color::fromRgb(Color::Red500->getRgb()));
	}

	public function testFromRgbInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromRgb('rgb(256, 256, 256)');
	}

	public function testFromRgbaBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromRgba('rgba(0, 0, 0, 1)'));
		$this->assertSame($expected, Color::fromRgba(Color::Black->getRgba()));
	}

	public function testFromRgbaWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromRgba('rgba(255, 255, 255, 1)'));
		$this->assertSame($expected, Color::fromRgba(Color::White->getRgba()));
	}

	public function testFromRgbaRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromRgba('rgba(239, 68, 68, 1)'));
		$this->assertSame($expected, Color::fromRgba(Color::Red500->getRgba()));
	}

	public function testFromRgbaInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromRgba('rgba(256, 256, 256, 1)');
	}

	public function testFromHslBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromHsl('hsl(0, 0%, 0%)'));
		$this->assertSame($expected, Color::fromHsl(Color::Black->getHsl()));
	}

	public function testFromHslWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromHsl('hsl(0, 0%, 100%)'));
		$this->assertSame($expected, Color::fromHsl(Color::White->getHsl()));
	}

	public function testFromHslRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromHsl('hsl(0, 84.24%, 60.2%)'));
		$this->assertSame($expected, Color::fromHsl(Color::Red500->getHsl()));
	}

	public function testFromHslInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromHsl('hsl(0, 0%, 101%)');
	}

	public function testFromOklchBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::fromOklch('oklch(0%, 0%, 0)'));
		$this->assertSame($expected, Color::fromOklch(Color::Black->getOklch()));
	}

	public function testFromOklchWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::fromOklch('oklch(100%, 0%, 0)'));
		$this->assertSame($expected, Color::fromOklch(Color::White->getOklch()));
	}

	public function testFromOklchRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::fromOklch('oklch(63.68%, 20.78%, 25.33132777693)'));
		$this->assertSame($expected, Color::fromOklch(Color::Red500->getOklch()));
	}

	public function testFromOklchInvalid(): void
	{
		$this->expectException(\ValueError::class);

		Color::fromOklch('oklch(101%, 0.217, 0)');
	}

	public function testTryFromBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFrom(1));
		$this->assertSame($expected, Color::tryFrom(Color::Black->value));
		$this->assertSame($expected, Color::tryFrom(Color::Black->getId()));
	}

	public function testTryFromWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFrom(2));
		$this->assertSame($expected, Color::tryFrom(Color::White->value));
		$this->assertSame($expected, Color::tryFrom(Color::White->getId()));
	}

	public function testTryFromRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFrom(105));
		$this->assertSame($expected, Color::tryFrom(Color::Red500->value));
		$this->assertSame($expected, Color::tryFrom(Color::Red500->getId()));
	}

	public function testTryFromInvalid(): void
	{
		$this->assertNull(Color::tryFrom(999999));
	}

	public function testTryFromIdBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromId(1));
		$this->assertSame($expected, Color::tryFromId(Color::Black->value));
		$this->assertSame($expected, Color::tryFromId(Color::Black->getId()));
	}

	public function testTryFromIdWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromId(2));
		$this->assertSame($expected, Color::tryFromId(Color::White->value));
		$this->assertSame($expected, Color::tryFromId(Color::White->getId()));
	}

	public function testTryFromIdRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromId(105));
		$this->assertSame($expected, Color::tryFromId(Color::Red500->value));
		$this->assertSame($expected, Color::tryFromId(Color::Red500->getId()));
	}

	public function testTryFromIdInvalid(): void
	{
		$this->assertNull(Color::tryFromId(999999));
	}

	public function testTryFromNameBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromName('Black'));
		$this->assertSame($expected, Color::tryFromName(Color::Black->name));
		$this->assertSame($expected, Color::tryFromName(Color::Black->getName()));
	}

	public function testTryFromNameWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromName('White'));
		$this->assertSame($expected, Color::tryFromName(Color::White->name));
		$this->assertSame($expected, Color::tryFromName(Color::White->getName()));
	}

	public function testTryFromNameRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromName('Red500'));
		$this->assertSame($expected, Color::tryFromName(Color::Red500->name));
		$this->assertSame($expected, Color::tryFromName(Color::Red500->getName()));
	}

	public function testTryFromNameInvalid(): void
	{
		$this->assertNull(Color::tryFromName('InvalidColor'));
	}

	public function testTryFromTitleBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromTitle('Noir'));
		$this->assertSame($expected, Color::tryFromTitle(Color::Black->getTitle()));
	}

	public function testTryFromTitleWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromTitle('Blanc'));
		$this->assertSame($expected, Color::tryFromTitle(Color::White->getTitle()));
	}

	public function testTryFromTitleRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromTitle('Rouge passion'));
		$this->assertSame($expected, Color::tryFromTitle(Color::Red500->getTitle()));
	}

	public function testTryFromTitleInvalid(): void
	{
		$this->assertNull(Color::tryFromTitle('Invalid Color'));
	}

	public function testTryFromHexBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromHex('#000000'));
		$this->assertSame($expected, Color::tryFromHex(Color::Black->getHex()));
	}

	public function testTryFromHexWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromHex('#ffffff'));
		$this->assertSame($expected, Color::tryFromHex(Color::White->getHex()));
	}

	public function testTryFromHexRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromHex('#ef4444'));
		$this->assertSame($expected, Color::tryFromHex(Color::Red500->getHex()));
	}

	public function testTryFromHexInvalid(): void
	{
		$this->assertNull(Color::tryFromHex('#gggggg'));
	}

	public function testTryFromRgbBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromRgb('rgb(0, 0, 0)'));
		$this->assertSame($expected, Color::tryFromRgb(Color::Black->getRgb()));
	}

	public function testTryFromRgbWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromRgb('rgb(255, 255, 255)'));
		$this->assertSame($expected, Color::tryFromRgb(Color::White->getRgb()));
	}

	public function testTryFromRgbRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromRgb('rgb(239, 68, 68)'));
		$this->assertSame($expected, Color::tryFromRgb(Color::Red500->getRgb()));
	}

	public function testTryFromRgbInvalid(): void
	{
		$this->assertNull(Color::tryFromRgb('rgb(256, 256, 256)'));
	}

	public function testTryFromRgbaBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromRgba('rgba(0, 0, 0, 1)'));
		$this->assertSame($expected, Color::tryFromRgba(Color::Black->getRgba()));
	}

	public function testTryFromRgbaWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromRgba('rgba(255, 255, 255, 1)'));
		$this->assertSame($expected, Color::tryFromRgba(Color::White->getRgba()));
	}

	public function testTryFromRgbaRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromRgba('rgba(239, 68, 68, 1)'));
		$this->assertSame($expected, Color::tryFromRgba(Color::Red500->getRgba()));
	}

	public function testTryFromRgbaInvalid(): void
	{
		$this->assertNull(Color::tryFromRgba('rgba(256, 256, 256, 1)'));
	}

	public function testTryFromHslBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromHsl('hsl(0, 0%, 0%)'));
		$this->assertSame($expected, Color::tryFromHsl(Color::Black->getHsl()));
	}

	public function testTryFromHslWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromHsl('hsl(0, 0%, 100%)'));
		$this->assertSame($expected, Color::tryFromHsl(Color::White->getHsl()));
	}

	public function testTryFromHslRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromHsl('hsl(0, 84.24%, 60.2%)'));
		$this->assertSame($expected, Color::tryFromHsl(Color::Red500->getHsl()));
	}

	public function testTryFromHslInvalid(): void
	{
		$this->assertNull(Color::tryFromHsl('hsl(0, 0%, 101%)'));
	}

	public function testTryFromOklchBlack(): void
	{
		$expected = Color::Black;

		$this->assertSame($expected, Color::tryFromOklch('oklch(0%, 0%, 0)'));
		$this->assertSame($expected, Color::tryFromOklch(Color::Black->getOklch()));
	}

	public function testTryFromOklchWhite(): void
	{
		$expected = Color::White;

		$this->assertSame($expected, Color::tryFromOklch('oklch(100%, 0%, 0)'));
		$this->assertSame($expected, Color::tryFromOklch(Color::White->getOklch()));
	}

	public function testTryFromOklchRed500(): void
	{
		$expected = Color::Red500;

		$this->assertSame($expected, Color::tryFromOklch('oklch(63.68%, 20.78%, 25.33132777693)'));
		$this->assertSame($expected, Color::tryFromOklch(Color::Red500->getOklch()));
	}

	public function testTryFromOklchInvalid(): void
	{
		$this->assertNull(Color::tryFromOklch('oklch(101%, 0.217, 0)'));
	}

	public function testGetIdBlack(): void
	{
		$this->assertSame(1, Color::Black->getId());
	}

	public function testGetIdWhite(): void
	{
		$this->assertSame(2, Color::White->getId());
	}

	public function testGetIdRed500(): void
	{
		$this->assertSame(105, Color::Red500->getId());
	}

	public function testGetNameBlack(): void
	{
		$this->assertSame('Black', Color::Black->getName());
	}

	public function testGetNameWhite(): void
	{
		$this->assertSame('White', Color::White->getName());
	}

	public function testGetNameRed500(): void
	{
		$this->assertSame('Red500', Color::Red500->getName());
	}

	public function testGetCodeBlack(): void
	{
		$this->assertSame(0, Color::Black->getCode());
	}

	public function testGetCodeWhite(): void
	{
		$this->assertSame(0, Color::White->getCode());
	}

	public function testGetCodeRed300(): void
	{
		$this->assertSame(300, Color::Red300->getCode());
	}

	public function testGetCodeRed500(): void
	{
		$this->assertSame(500, Color::Red500->getCode());
	}

	public function testGetCodeRed700(): void
	{
		$this->assertSame(700, Color::Red700->getCode());
	}

	public function testGetTitleBlack(): void
	{
		$this->assertSame('Noir', Color::Black->getTitle());
	}

	public function testGetTitleWhite(): void
	{
		$this->assertSame('Blanc', Color::White->getTitle());
	}

	public function testGetTitleRed500(): void
	{
		$this->assertSame('Rouge passion', Color::Red500->getTitle());
	}

	public function testGetHexBlack(): void
	{
		$this->assertSame('#000000', Color::Black->getHex());
	}

	public function testGetHexWhite(): void
	{
		$this->assertSame('#ffffff', Color::White->getHex());
	}

	public function testGetHexRed500(): void
	{
		$this->assertSame('#ef4444', Color::Red500->getHex());
	}

	public function testGetRgbBlack(): void
	{
		$this->assertSame('rgb(0, 0, 0)', Color::Black->getRgb());
	}

	public function testGetRgbWhite(): void
	{
		$this->assertSame('rgb(255, 255, 255)', Color::White->getRgb());
	}

	public function testGetRgbRed500(): void
	{
		$this->assertSame('rgb(239, 68, 68)', Color::Red500->getRgb());
	}

	public function testGetRgbaBlack(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', Color::Black->getRgba());
	}

	public function testGetRgbaWhite(): void
	{
		$this->assertSame('rgba(255, 255, 255, 1)', Color::White->getRgba());
	}

	public function testGetRgbaRed500(): void
	{
		$this->assertSame('rgba(239, 68, 68, 1)', Color::Red500->getRgba());
	}
}