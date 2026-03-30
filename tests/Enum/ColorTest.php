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
}