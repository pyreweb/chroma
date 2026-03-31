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
	private const LINEARIZE_NONE = 0.0;
	private const LINEARIZE_FULL = 1.0;

	private const CBRT_NONE = 0.0;
	private const CBRT_TWO = 2.0;
	private const CBRT_EIGHT = 8.0;

	public function testLinearizeNone(): void
	{
		$this->assertSame(self::LINEARIZE_NONE, Colorimetry::linearize(self::LINEARIZE_NONE));
	}

	public function testLinearizeFull(): void
	{
		$this->assertSame(self::LINEARIZE_FULL, Colorimetry::linearize(self::LINEARIZE_FULL));
	}

	public function testCbrtNone(): void
	{
		$this->assertSame(self::CBRT_NONE, Colorimetry::cbrt(self::CBRT_NONE));
	}

	public function testCbrtPositive(): void
	{
		$this->assertSame(self::CBRT_TWO, Colorimetry::cbrt(self::CBRT_EIGHT));
	}

	public function testCbrtNegative(): void
	{
		$this->assertSame(-self::CBRT_TWO, Colorimetry::cbrt(-self::CBRT_EIGHT));
	}
}