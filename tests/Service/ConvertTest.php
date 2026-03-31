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

		$this->assertSame($expected, Convert::hexToRgb('#000000'));
		$this->assertSame($expected, Convert::hexToRgb(Color::Black->getHex()));
	}

	public function testHex2RgbWhite(): void
	{
		$expected = 'rgb(255, 255, 255)';

		$this->assertSame($expected, Convert::hexToRgb('#FFFFFF'));
		$this->assertSame($expected, Convert::hexToRgb(Color::White->getHex()));
	}

	public function testHex2RgbRed500(): void
	{
		$expected = 'rgb(239, 68, 68)';

		$this->assertSame($expected, Convert::hexToRgb('#ef4444'));
		$this->assertSame($expected, Convert::hexToRgb(Color::Red500->getHex()));
	}

	public function testHex2RgbaBlack(): void
	{
		$expected = 'rgba(0, 0, 0, 1)';

		$this->assertSame($expected, Convert::hexToRgba('#000000'));
		$this->assertSame($expected, Convert::hexToRgba(Color::Black->getHex()));
	}

	public function testHex2RgbaWhite(): void
	{
		$expected = 'rgba(255, 255, 255, 1)';

		$this->assertSame($expected, Convert::hexToRgba('#FFFFFF'));
		$this->assertSame($expected, Convert::hexToRgba(Color::White->getHex()));
	}

	public function testHex2RgbaRed500(): void
	{
		$expected = 'rgba(239, 68, 68, 1)';

		$this->assertSame($expected, Convert::hexToRgba('#ef4444'));
		$this->assertSame($expected, Convert::hexToRgba(Color::Red500->getHex()));
	}

	public function testHex2HslBlack(): void
	{
		$expected = 'hsl(0, 0%, 0%)';

		$this->assertSame($expected, Convert::hexToHsl('#000000'));
		$this->assertSame($expected, Convert::hexToHsl(Color::Black->getHex()));
	}

	public function testHex2HslWhite(): void
	{
		$expected = 'hsl(0, 0%, 100%)';

		$this->assertSame($expected, Convert::hexToHsl('#FFFFFF'));
		$this->assertSame($expected, Convert::hexToHsl(Color::White->getHex()));
	}

	public function testHex2HslRed500(): void
	{
		$expected = 'hsl(0, 84.24%, 60.2%)';

		$this->assertSame($expected, Convert::hexToHsl('#ef4444'));
		$this->assertSame($expected, Convert::hexToHsl(Color::Red500->getHex()));
	}

	public function testHex2OklchBlack(): void
	{
		$expected = 'oklch(0%, 0%, 0)';

		$this->assertSame($expected, Convert::hexToOklch('#000000'));
		$this->assertSame($expected, Convert::hexToOklch(Color::Black->getHex()));
	}

	public function testHex2OklchWhite(): void
	{
		$expected = 'oklch(100%, 0%, 0)';

		$this->assertSame($expected, Convert::hexToOklch('#FFFFFF'));
		$this->assertSame($expected, Convert::hexToOklch(Color::White->getHex()));
	}

	public function testHex2OklchRed500(): void
	{
		$expected = 'oklch(63.68%, 20.78%, 25.33132777693)';

		$this->assertSame($expected, Convert::hexToOklch('#ef4444'));
		$this->assertSame($expected, Convert::hexToOklch(Color::Red500->getHex()));
	}

	public function testHex2CmykBlack(): void
	{
		$expected = 'cmyk(0%, 0%, 0%, 100%)';

		$this->assertSame($expected, Convert::hexToCmyk('#000000'));
		$this->assertSame($expected, Convert::hexToCmyk(Color::Black->getHex()));
	}

	public function testHex2CmykWhite(): void
	{
		$expected = 'cmyk(0%, 0%, 0%, 0%)';

		$this->assertSame($expected, Convert::hexToCmyk('#FFFFFF'));
		$this->assertSame($expected, Convert::hexToCmyk(Color::White->getHex()));
	}

	public function testHex2CmykRed500(): void
	{
		$expected = 'cmyk(0%, 71.55%, 71.55%, 6.27%)';

		$this->assertSame($expected, Convert::hexToCmyk('#ef4444'));
		$this->assertSame($expected, Convert::hexToCmyk(Color::Red500->getHex()));
	}
}