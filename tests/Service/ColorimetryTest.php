<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Service\Colorimetry;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ColorimetryTest extends TestCase
{
	public function testLinearizeNone(): void
	{
		$this->assertSame(0.0, Colorimetry::linearize(0.0));
	}

	public function testLinearizeFull(): void
	{
		$this->assertSame(1.0, Colorimetry::linearize(1.0));
	}

	public function testCbrtNone(): void
	{
		$this->assertSame(0.0, Colorimetry::cbrt(0.0));
	}

	public function testCbrtPositive(): void
	{
		$this->assertSame(2.0, Colorimetry::cbrt(8.0));
	}

	public function testCbrtNegative(): void
	{
		$this->assertSame(-2.0, Colorimetry::cbrt(-8.0));
	}
}