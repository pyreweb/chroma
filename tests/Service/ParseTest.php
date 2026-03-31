<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\Convert;
use Pyreweb\Chroma\Service\Parse;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ParseTest extends TestCase
{
	private const BLACK_HEX = '#000000';
	private const BLACK_RGB = 'rgb(0, 0, 0)';
	private const BLACK_RGB_PARSED = [0, 0, 0];
	private const BLACK_RGBA = 'rgba(0, 0, 0, 1.0)';
	private const BLACK_RGBA_PARSED = [0, 0, 0, 1.0];

	private const WHITE_HEX = '#FFFFFF';
	private const WHITE_RGB = 'rgb(255, 255, 255)';
	private const WHITE_RGB_PARSED = [255, 255, 255];
	private const WHITE_RGBA = 'rgba(255, 255, 255, 1.0)';
	private const WHITE_RGBA_PARSED = [255, 255, 255, 1.0];

	public function testHexBlack(): void
	{
		$expected = self::BLACK_RGB_PARSED;

		$this->assertSame($expected, Parse::hex(self::BLACK_HEX));
		$this->assertSame($expected, Parse::hex(Color::Black->getHex()));
	}

	public function testHexWhite(): void
	{
		$expected = self::WHITE_RGB_PARSED;

		$this->assertSame($expected, Parse::hex(self::WHITE_HEX));
		$this->assertSame($expected, Parse::hex(Color::White->getHex()));
	}

	public function testRgbBlack(): void
	{
		$expected = self::BLACK_RGB_PARSED;

		$this->assertSame($expected, Parse::rgb(self::BLACK_RGB));
		$this->assertSame($expected, Parse::rgb(Color::Black->getRgb()));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb(self::BLACK_HEX)));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb(Color::Black->getHex())));
	}

	public function testRgbWhite(): void
	{
		$expected = self::WHITE_RGB_PARSED;

		$this->assertSame($expected, Parse::rgb(self::WHITE_RGB));
		$this->assertSame($expected, Parse::rgb(Color::White->getRgb()));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb(self::WHITE_HEX)));
		$this->assertSame($expected, Parse::rgb(Convert::hexToRgb(Color::White->getHex())));
	}

	public function testRgbaBlack(): void
	{
		$expected = self::BLACK_RGBA_PARSED;

		$this->assertSame($expected, Parse::rgba(self::BLACK_RGBA));
		$this->assertSame($expected, Parse::rgba(Color::Black->getRgba()));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba(self::BLACK_HEX)));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba(Color::Black->getHex())));
	}

	public function testRgbaWhite(): void
	{
		$expected = self::WHITE_RGBA_PARSED;

		$this->assertSame($expected, Parse::rgba(self::WHITE_RGBA));
		$this->assertSame($expected, Parse::rgba(Color::White->getRgba()));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba(self::WHITE_HEX)));
		$this->assertSame($expected, Parse::rgba(Convert::hexToRgba(Color::White->getHex())));
	}
}