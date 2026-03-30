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
	public function testHex2RgbBlack(): void
	{
		$expected = 'rgb(0, 0, 0)';

		$this->assertSame($expected, Convert::hex2rgb('#000000'));
		$this->assertSame($expected, Convert::hex2rgb(Color::Black->getHex()));
	}

	public function testHex2RgbWhite(): void
	{
		$expected = 'rgb(255, 255, 255)';

		$this->assertSame($expected, Convert::hex2rgb('#FFFFFF'));
		$this->assertSame($expected, Convert::hex2rgb(Color::White->getHex()));
	}

	public function testHex2RgbRed500(): void
	{
		$expected = 'rgb(239, 68, 68)';

		$this->assertSame($expected, Convert::hex2rgb('#ef4444'));
		$this->assertSame($expected, Convert::hex2rgb(Color::Red500->getHex()));
	}

	public function testHex2RgbaBlack(): void
	{
		$expected = 'rgba(0, 0, 0, 1)';

		$this->assertSame($expected, Convert::hex2rgba('#000000'));
		$this->assertSame($expected, Convert::hex2rgba(Color::Black->getHex()));
	}

	public function testHex2RgbaWhite(): void
	{
		$expected = 'rgba(255, 255, 255, 1)';

		$this->assertSame($expected, Convert::hex2rgba('#FFFFFF'));
		$this->assertSame($expected, Convert::hex2rgba(Color::White->getHex()));
	}

	public function testHex2RgbaRed500(): void
	{
		$expected = 'rgba(239, 68, 68, 1)';

		$this->assertSame($expected, Convert::hex2rgba('#ef4444'));
		$this->assertSame($expected, Convert::hex2rgba(Color::Red500->getHex()));
	}

	public function testHex2HslBlack(): void
	{
		$expected = 'hsl(0, 0%, 0%)';

		$this->assertSame($expected, Convert::hex2hsl('#000000'));
		$this->assertSame($expected, Convert::hex2hsl(Color::Black->getHex()));
	}

	public function testHex2HslWhite(): void
	{
		$expected = 'hsl(0, 0%, 100%)';

		$this->assertSame($expected, Convert::hex2hsl('#FFFFFF'));
		$this->assertSame($expected, Convert::hex2hsl(Color::White->getHex()));
	}

	public function testHex2HslRed500(): void
	{
		$expected = 'hsl(0, 84.24%, 60.2%)';

		$this->assertSame($expected, Convert::hex2hsl('#ef4444'));
		$this->assertSame($expected, Convert::hex2hsl(Color::Red500->getHex()));
	}

	public function testHex2OklchBlack(): void
	{
		$expected = 'oklch(0%, 0%, 0)';

		$this->assertSame($expected, Convert::hex2oklch('#000000'));
		$this->assertSame($expected, Convert::hex2oklch(Color::Black->getHex()));
	}

	public function testHex2OklchWhite(): void
	{
		$expected = 'oklch(100%, 0%, 0)';

		$this->assertSame($expected, Convert::hex2oklch('#FFFFFF'));
		$this->assertSame($expected, Convert::hex2oklch(Color::White->getHex()));
	}

	public function testHex2CmykBlack(): void
	{
		$expected = 'cmyk(0%, 0%, 0%, 100%)';

		$this->assertSame($expected, Convert::hex2cmyk('#000000'));
		$this->assertSame($expected, Convert::hex2cmyk(Color::Black->getHex()));
	}

	public function testHex2CmykWhite(): void
	{
		$expected = 'cmyk(0%, 0%, 0%, 0%)';

		$this->assertSame($expected, Convert::hex2cmyk('#FFFFFF'));
		$this->assertSame($expected, Convert::hex2cmyk(Color::White->getHex()));
	}
}