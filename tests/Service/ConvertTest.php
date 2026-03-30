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
	public function testHex2Hsl(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color->getHsl(), Convert::hex2hsl($color->getHex()));
		}
	}

	public function testHex2Oklch(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color->getOklch(), Convert::hex2oklch($color->getHex()));
		}
	}

	public function testHex2Rgba(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color->getRgba(), Convert::hex2rgba($color->getHex()));
		}
	}

	public function testHex2Rgb(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color->getRgb(), Convert::hex2rgb($color->getHex()));
		}
	}
}