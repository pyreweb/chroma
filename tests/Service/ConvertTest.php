<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\Convert;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ConvertTest extends TestCase
{
	public function testHex2CmykBlack(): void
	{
		$this->assertSame('cmyk(0%, 0%, 0%, 100%)', Convert::hex2cmyk('#000000'));

		$this->assertSame(Color::Black->getCmyk(), Convert::hex2cmyk('#000000'));

		$this->assertSame('cmyk(0%, 0%, 0%, 100%)', Convert::hex2cmyk(Color::Black->getHex()));

		$this->assertSame(Color::Black->getCmyk(), Convert::hex2cmyk(Color::Black->getHex()));
	}

	public function testHex2CmykWhite(): void
	{
		$this->assertSame('cmyk(0%, 0%, 0%, 0%)', Convert::hex2cmyk('#FFFFFF'));

		$this->assertSame(Color::White->getCmyk(), Convert::hex2cmyk('#FFFFFF'));

		$this->assertSame('cmyk(0%, 0%, 0%, 0%)', Convert::hex2cmyk(Color::White->getHex()));

		$this->assertSame(Color::White->getCmyk(), Convert::hex2cmyk(Color::White->getHex()));
	}

	public function testHex2HslBlack(): void
	{
		$this->assertSame('hsl(0, 0%, 0%)', Convert::hex2hsl('#000000'));

		$this->assertSame(Color::Black->getHsl(), Convert::hex2hsl('#000000'));

		$this->assertSame('hsl(0, 0%, 0%)', Convert::hex2hsl(Color::Black->getHex()));

		$this->assertSame(Color::Black->getHsl(), Convert::hex2hsl(Color::Black->getHex()));
	}

	public function testHex2HslWhite(): void
	{
		$this->assertSame('hsl(0, 0%, 100%)', Convert::hex2hsl('#FFFFFF'));

		$this->assertSame(Color::White->getHsl(), Convert::hex2hsl('#FFFFFF'));

		$this->assertSame('hsl(0, 0%, 100%)', Convert::hex2hsl(Color::White->getHex()));

		$this->assertSame(Color::White->getHsl(), Convert::hex2hsl(Color::White->getHex()));
	}

	public function testHex2OklchBlack(): void
	{
		$this->assertSame('oklch(0%, 0%, 0)', Convert::hex2oklch('#000000'));

		$this->assertSame(Color::Black->getOklch(), Convert::hex2oklch('#000000'));

		$this->assertSame('oklch(0%, 0%, 0)', Convert::hex2oklch(Color::Black->getHex()));

		$this->assertSame(Color::Black->getOklch(), Convert::hex2oklch(Color::Black->getHex()));
	}

	public function testHex2OklchWhite(): void
	{
		$this->assertSame('oklch(100%, 0%, 0)', Convert::hex2oklch('#FFFFFF'));

		$this->assertSame(Color::White->getOklch(), Convert::hex2oklch('#FFFFFF'));

		$this->assertSame('oklch(100%, 0%, 0)', Convert::hex2oklch(Color::White->getHex()));

		$this->assertSame(Color::White->getOklch(), Convert::hex2oklch(Color::White->getHex()));
	}

	public function testHex2RgbaBlack(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', Convert::hex2rgba('#000000'));

		$this->assertSame(Color::Black->getRgba(), Convert::hex2rgba('#000000'));

		$this->assertSame('rgba(0, 0, 0, 1)', Convert::hex2rgba(Color::Black->getHex()));

		$this->assertSame(Color::Black->getRgba(), Convert::hex2rgba(Color::Black->getHex()));
	}

	public function testHex2RgbaWhite(): void
	{
		$this->assertSame('rgba(255, 255, 255, 1)', Convert::hex2rgba('#FFFFFF'));

		$this->assertSame(Color::White->getRgba(), Convert::hex2rgba('#FFFFFF'));

		$this->assertSame('rgba(255, 255, 255, 1)', Convert::hex2rgba(Color::White->getHex()));

		$this->assertSame(Color::White->getRgba(), Convert::hex2rgba(Color::White->getHex()));
	}

	public function testHex2RgbBlack(): void
	{
		$this->assertSame('rgb(0, 0, 0)', Convert::hex2rgb('#000000'));

		$this->assertSame(Color::Black->getRgb(), Convert::hex2rgb('#000000'));

		$this->assertSame('rgb(0, 0, 0)', Convert::hex2rgb(Color::Black->getHex()));

		$this->assertSame(Color::Black->getRgb(), Convert::hex2rgb(Color::Black->getHex()));
	}

	public function testHex2RgbWhite(): void
	{
		$this->assertSame('rgb(255, 255, 255)', Convert::hex2rgb('#FFFFFF'));

		$this->assertSame(Color::White->getRgb(), Convert::hex2rgb('#FFFFFF'));

		$this->assertSame('rgb(255, 255, 255)', Convert::hex2rgb(Color::White->getHex()));

		$this->assertSame(Color::White->getRgb(), Convert::hex2rgb(Color::White->getHex()));
	}
}