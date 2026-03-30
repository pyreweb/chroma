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
	public function testFrom(): void
	{
		foreach (Color::cases() as $color) {
			$this->assertSame($color, Color::from($color->getId()));
		}
	}

	// public function testFromId(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromId($color->getId()));
	// 	}
	// }

	// public function testFromName(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromName($color->getName()));
	// 	}
	// }

	// public function testFromTitle(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromTitle($color->getTitle()));
	// 	}
	// }

	// public function testFromHex(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromHex($color->getHex()));
	// 	}
	// }

	// public function testFromRgb(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromRgb($color->getRgb()));
	// 	}
	// }

	// public function testFromRgba(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromRgba($color->getRgba()));
	// 	}
	// }

	// public function testFromHsl(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromHsl($color->getHsl()));
	// 	}
	// }

	// public function testFromOklch(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::fromOklch($color->getOklch()));
	// 	}
	// }

	// public function testTryFrom(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFrom($color->getId()));
	// 	}
	// }

	// public function testTryFromId(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromId($color->getId()));
	// 	}
	// }

	// public function testTryFromName(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromName($color->getName()));
	// 	}
	// }

	// public function testTryFromTitle(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromTitle($color->getTitle()));
	// 	}
	// }

	// public function testTryFromHex(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromHex($color->getHex()));
	// 	}
	// }

	// public function testTryFromRgb(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromRgb($color->getRgb()));
	// 	}
	// }

	// public function testTryFromRgba(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromRgba($color->getRgba()));
	// 	}
	// }

	// public function testTryFromHsl(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromHsl($color->getHsl()));
	// 	}
	// }

	// public function testTryFromOklch(): void
	// {
	// 	foreach (Color::cases() as $color) {
	// 		$this->assertSame($color, Color::tryFromOklch($color->getOklch()));
	// 	}
	// }
}