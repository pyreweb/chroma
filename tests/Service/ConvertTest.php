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
	public function testHex2HslBlack(): void
	{
		$this->assertSame('hsl(0, 0%, 0%)', Convert::hex2hsl('#000000'));
	}

	public function testHex2HslWhite(): void
	{
		$this->assertSame('hsl(0, 0%, 100%)', Convert::hex2hsl('#FFFFFF'));
	}

	public function testHex2OklchBlack(): void
	{
		$this->assertSame('oklch(0%, 0%, 0)', Convert::hex2oklch('#000000'));
	}

	public function testHex2OklchWhite(): void
	{
		$this->assertSame('oklch(100%, 0%, 0)', Convert::hex2oklch('#FFFFFF'));
	}

	public function testHex2RgbaBlack(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', Convert::hex2rgba('#000000'));
	}

	public function testHex2RgbaWhite(): void
	{
		$this->assertSame('rgba(255, 255, 255, 1)', Convert::hex2rgba('#FFFFFF'));
	}

	public function testHex2RgbBlack(): void
	{
		$this->assertSame('rgb(0, 0, 0)', Convert::hex2rgb('#000000'));
	}

	public function testHex2RgbWhite(): void
	{
		$this->assertSame('rgb(255, 255, 255)', Convert::hex2rgb('#FFFFFF'));
	}
}