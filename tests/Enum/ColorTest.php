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
}