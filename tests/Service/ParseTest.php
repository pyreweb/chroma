<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\Parse;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class ParseTest extends TestCase
{
	public function testHex(): void
	{
		$this->assertSame([0, 0, 0], Parse::hex(Color::Black->getHex()));
		$this->assertSame([255, 255, 255], Parse::hex(Color::White->getHex()));
	}
}