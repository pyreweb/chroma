<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Service\DynamicColor;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class DynamicColorTest extends TestCase
{
	private const COLOR1_HEX = '#77FC92';
	private const COLOR1_RGB = 'rgb(119, 252, 146)';
	private const COLOR1_RGBA = 'rgba(119, 252, 146, 1)';
	private const COLOR1_HSL = 'hsl(132.18, 95.68%, 72.75%)';
	private const COLOR1_OKLCH = 'oklch(89.1%, 18.63%, 148.2013302483)';
	private const COLOR1_CMYK = 'cmyk(52.78%, 0%, 42.06%, 1.18%)';
	private const COLOR1_PARSED_HEX = [119, 252, 146];
	private const COLOR1_PARSED_RGB = [119, 252, 146];
	private const COLOR1_PARSED_RGBA = [119, 252, 146, 1.0];
	private const COLOR1_STRING = '#77FC92 (#77FC92)';

	private const COLOR2_HEX = '#FF5733';
	private const COLOR2_ID = 9865;
	private const COLOR2_RGB = 'rgb(255, 87, 51)';
	private const COLOR2_RGBA = 'rgba(255, 87, 51, 1)';
	private const COLOR2_HSL = 'hsl(10.59, 100%, 60%)';
	private const COLOR2_OKLCH = 'oklch(68.04%, 21%, 33.69163741551)';
	private const COLOR2_CMYK = 'cmyk(0%, 65.88%, 80%, 0%)';
	private const COLOR2_PARSED_HEX = [255, 87, 51];
	private const COLOR2_PARSED_RGB = [255, 87, 51];
	private const COLOR2_PARSED_RGBA = [255, 87, 51, 1.0];
	private const COLOR2_STRING = '#FF5733 (#FF5733)';

	private const COLOR3_HEX = '#123456';
	private const COLOR3_ID = 18253;
	private const COLOR3_NAME = 'Test Color';
	private const COLOR3_RGB = 'rgb(18, 52, 86)';
	private const COLOR3_RGBA = 'rgba(18, 52, 86, 1)';
	private const COLOR3_HSL = 'hsl(210, 65.38%, 20.39%)';
	private const COLOR3_OKLCH = 'oklch(31.92%, 7.25%, 251.16844905341)';
	private const COLOR3_CMYK = 'cmyk(79.07%, 39.53%, 0%, 66.27%)';
	private const COLOR3_PARSED_HEX = [18, 52, 86];
	private const COLOR3_PARSED_RGB = [18, 52, 86];
	private const COLOR3_PARSED_RGBA = [18, 52, 86, 1.0];
	private const COLOR3_STRING = 'Test Color (#123456)';

	private const COLOR4_HEX = '#ABCDEF';
	private const COLOR4_ID = 65984;
	private const COLOR4_NAME = 'Another Test Color';
	private const COLOR4_CODE = 500;
	private const COLOR4_RGB = 'rgb(171, 205, 239)';
	private const COLOR4_RGBA = 'rgba(171, 205, 239, 1)';
	private const COLOR4_HSL = 'hsl(210, 68%, 80.39%)';
	private const COLOR4_OKLCH = 'oklch(83.5%, 6.02%, 248.55037975692)';
	private const COLOR4_CMYK = 'cmyk(28.45%, 14.23%, 0%, 6.27%)';
	private const COLOR4_PARSED_HEX = [171, 205, 239];
	private const COLOR4_PARSED_RGB = [171, 205, 239];
	private const COLOR4_PARSED_RGBA = [171, 205, 239, 1.0];
	private const COLOR4_STRING = 'Another Test Color (#ABCDEF)';

	private const COLOR5_HEX = '#5B120F';
	private const COLOR5_ID = 98562;
	private const COLOR5_NAME = 'Yet Another Test Color';
	private const COLOR5_CODE = 500;
	private const COLOR5_TITLE = 'Test Title';
	private const COLOR5_RGB = 'rgb(91, 18, 15)';
	private const COLOR5_RGBA = 'rgba(91, 18, 15, 1)';
	private const COLOR5_HSL = 'hsl(2.37, 71.7%, 20.78%)';
	private const COLOR5_OKLCH = 'oklch(31.23%, 10.56%, 27.586543889398)';
	private const COLOR5_CMYK = 'cmyk(0%, 80.22%, 83.52%, 64.31%)';
	private const COLOR5_PARSED_HEX = [91, 18, 15];
	private const COLOR5_PARSED_RGB = [91, 18, 15];
	private const COLOR5_PARSED_RGBA = [91, 18, 15, 1.0];
	private const COLOR5_STRING = self::COLOR5_TITLE . ' (' . self::COLOR5_HEX . ')';

	public function testDynamicColor(): void
	{
		$color1 = DynamicColor::from(self::COLOR1_HEX);

		$this->assertNull($color1->getId());
		$this->assertNull($color1->getName());
		$this->assertNull($color1->getCode());
		$this->assertNull($color1->getTitle());

		$this->assertSame(self::COLOR1_HEX, $color1->getHex());
		$this->assertSame(self::COLOR1_RGB, $color1->getRgb());
		$this->assertSame(self::COLOR1_RGBA, $color1->getRgba());
		$this->assertSame(self::COLOR1_HSL, $color1->getHsl());
		$this->assertSame(self::COLOR1_OKLCH, $color1->getOklch());
		$this->assertSame(self::COLOR1_CMYK, $color1->getCmyk());
		$this->assertSame(self::COLOR1_PARSED_HEX, $color1->getParsedHex());
		$this->assertSame(self::COLOR1_PARSED_RGB, $color1->getParsedRgb());
		$this->assertSame(self::COLOR1_PARSED_RGBA, $color1->getParsedRgba());
		$this->assertSame(self::COLOR1_STRING, $color1->toString());

		$color2 = DynamicColor::from(self::COLOR2_HEX, self::COLOR2_ID);

		$this->assertNull($color2->getName());
		$this->assertNull($color2->getCode());
		$this->assertNull($color2->getTitle());

		$this->assertSame(self::COLOR2_ID, $color2->getId());
		$this->assertSame(self::COLOR2_HEX, $color2->getHex());
		$this->assertSame(self::COLOR2_RGB, $color2->getRgb());
		$this->assertSame(self::COLOR2_RGBA, $color2->getRgba());
		$this->assertSame(self::COLOR2_HSL, $color2->getHsl());
		$this->assertSame(self::COLOR2_OKLCH, $color2->getOklch());
		$this->assertSame(self::COLOR2_CMYK, $color2->getCmyk());
		$this->assertSame(self::COLOR2_PARSED_HEX, $color2->getParsedHex());
		$this->assertSame(self::COLOR2_PARSED_RGB, $color2->getParsedRgb());
		$this->assertSame(self::COLOR2_PARSED_RGBA, $color2->getParsedRgba());
		$this->assertSame(self::COLOR2_STRING, $color2->toString());

		$color3 = DynamicColor::from(
			self::COLOR3_HEX,
			self::COLOR3_ID,
			self::COLOR3_NAME
		);

		$this->assertNull($color3->getCode());
		$this->assertNull($color3->getTitle());

		$this->assertSame(self::COLOR3_ID, $color3->getId());
		$this->assertSame(self::COLOR3_NAME, $color3->getName());
		$this->assertSame(self::COLOR3_HEX, $color3->getHex());
		$this->assertSame(self::COLOR3_RGB, $color3->getRgb());
		$this->assertSame(self::COLOR3_RGBA, $color3->getRgba());
		$this->assertSame(self::COLOR3_HSL, $color3->getHsl());
		$this->assertSame(self::COLOR3_OKLCH, $color3->getOklch());
		$this->assertSame(self::COLOR3_CMYK, $color3->getCmyk());
		$this->assertSame(self::COLOR3_PARSED_HEX, $color3->getParsedHex());
		$this->assertSame(self::COLOR3_PARSED_RGB, $color3->getParsedRgb());
		$this->assertSame(self::COLOR3_PARSED_RGBA, $color3->getParsedRgba());
		$this->assertSame(self::COLOR3_STRING, $color3->toString());

		$color4 = DynamicColor::from(
			self::COLOR4_HEX,
			self::COLOR4_ID,
			self::COLOR4_NAME,
			self::COLOR4_CODE
		);

		$this->assertNull($color4->getTitle());

		$this->assertSame(self::COLOR4_ID, $color4->getId());
		$this->assertSame(self::COLOR4_NAME, $color4->getName());
		$this->assertSame(self::COLOR4_CODE, $color4->getCode());
		$this->assertSame(self::COLOR4_HEX, $color4->getHex());
		$this->assertSame(self::COLOR4_RGB, $color4->getRgb());
		$this->assertSame(self::COLOR4_RGBA, $color4->getRgba());
		$this->assertSame(self::COLOR4_HSL, $color4->getHsl());
		$this->assertSame(self::COLOR4_OKLCH, $color4->getOklch());
		$this->assertSame(self::COLOR4_CMYK, $color4->getCmyk());
		$this->assertSame(self::COLOR4_PARSED_HEX, $color4->getParsedHex());
		$this->assertSame(self::COLOR4_PARSED_RGB, $color4->getParsedRgb());
		$this->assertSame(self::COLOR4_PARSED_RGBA, $color4->getParsedRgba());
		$this->assertSame(self::COLOR4_STRING, $color4->toString());

		$color5 = DynamicColor::from(
			self::COLOR5_HEX,
			self::COLOR5_ID,
			self::COLOR5_NAME,
			self::COLOR5_CODE,
			self::COLOR5_TITLE
		);

		$this->assertSame(self::COLOR5_ID, $color5->getId());
		$this->assertSame(self::COLOR5_NAME, $color5->getName());
		$this->assertSame(self::COLOR5_CODE, $color5->getCode());
		$this->assertSame(self::COLOR5_TITLE, $color5->getTitle());
		$this->assertSame(self::COLOR5_HEX, $color5->getHex());
		$this->assertSame(self::COLOR5_RGB, $color5->getRgb());
		$this->assertSame(self::COLOR5_RGBA, $color5->getRgba());
		$this->assertSame(self::COLOR5_HSL, $color5->getHsl());
		$this->assertSame(self::COLOR5_OKLCH, $color5->getOklch());
		$this->assertSame(self::COLOR5_CMYK, $color5->getCmyk());
		$this->assertSame(self::COLOR5_PARSED_HEX, $color5->getParsedHex());
		$this->assertSame(self::COLOR5_PARSED_RGB, $color5->getParsedRgb());
		$this->assertSame(self::COLOR5_PARSED_RGBA, $color5->getParsedRgba());
		$this->assertSame(self::COLOR5_STRING, $color5->toString());
	}
}