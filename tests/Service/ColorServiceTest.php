<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use InvalidArgumentException;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\ColorService;

class ColorServiceTest extends TestCase
{
	public function testHex2RgbReturnsExpectedValue(): void
	{
		$this->assertSame('rgb(0, 0, 0)', ColorService::hex2rgb('#000000'));
		$this->assertSame('rgb(255, 255, 255)', ColorService::hex2rgb('#FFFFFF'));
		$this->assertSame('rgb(239, 68, 68)', ColorService::hex2rgb('#ef4444'));
	}

	public function testHex2RgbAcceptsWithoutPrefix(): void
	{
		$this->assertSame('rgb(239, 68, 68)', ColorService::hex2rgb('ef4444'));
	}

	public function testHex2RgbAcceptsMixedCase(): void
	{
		$this->assertSame('rgb(239, 68, 68)', ColorService::hex2rgb('#EF4444'));
		$this->assertSame('rgb(239, 68, 68)', ColorService::hex2rgb('#Ef4444'));
	}

	public function testHex2RgbThrowsOnInvalidFormat(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::hex2rgb('#ZZZ000');
	}

	public function testHex2RgbThrowsOnShortFormat(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::hex2rgb('#FFF');
	}

	public function testHex2RgbThrowsOnEmptyString(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::hex2rgb('');
	}

	public function testHex2RgbaUsesDefaultAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', ColorService::hex2rgba(Color::Black->getHex()));
	}

	public function testHex2RgbaUsesCustomAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 0.5)', ColorService::hex2rgba(Color::Black->getHex(), 0.5));
		$this->assertSame('rgba(0, 0, 0, 0)', ColorService::hex2rgba(Color::Black->getHex(), 0.0));
		$this->assertSame('rgba(0, 0, 0, 1)', ColorService::hex2rgba(Color::Black->getHex(), 1.0));
	}

	public function testHex2RgbaReturnsExpectedValue(): void
	{
		$this->assertSame('rgba(239, 68, 68, 1)', ColorService::hex2rgba(Color::Red500->getHex()));
	}

	public function testHex2RgbaThrowsOnAlphaOutOfRange(): void
	{
		$this->expectException(\InvalidArgumentException::class);

		ColorService::hex2rgba(Color::Black->getHex(), -0.5);
	}

	public function testHex2RgbaThrowsOnAlphaAboveOne(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ColorService::hex2rgba(Color::Black->getHex(), 1.5);
	}

	public function testHex2RgbaThrowsOnInvalidHex(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::rgb2rgba('#GKMVNB');
	}

	public function testHex2RgbaThrowsOnMalformedString(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::hex2rgba('not-a-color');
	}

	public function testRgb2RgbaUsesDefaultAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', ColorService::rgb2rgba('rgb(0, 0, 0)'));
	}

	public function testRgb2RgbaUsesCustomAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 0.5)', ColorService::rgb2rgba('rgb(0, 0, 0)', 0.5));
		$this->assertSame('rgba(0, 0, 0, 0)', ColorService::rgb2rgba('rgb(0, 0, 0)', 0.0));
		$this->assertSame('rgba(0, 0, 0, 1)', ColorService::rgb2rgba('rgb(0, 0, 0)', 1.0));
	}

	public function testRgb2RgbaReturnsExpectedValue(): void
	{
		$this->assertSame('rgba(239, 68, 68, 1)', ColorService::rgb2rgba('rgb(239, 68, 68)'));
	}

	public function testRgb2RgbaThrowsOnAlphaOutOfRange(): void
	{
		$this->expectException(\InvalidArgumentException::class);

		ColorService::rgb2rgba('rgb(0, 0, 0)', -0.5);
	}

	public function testRgb2RgbaThrowsOnAlphaAboveOne(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		
		ColorService::rgb2rgba('rgb(0, 0, 0)', 1.5);
	}

	public function testRgb2RgbaThrowsOnInvalidRgb(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::rgb2rgba('rgb(999, 0, 0)');
	}

	public function testRgb2RgbaThrowsOnMalformedString(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::rgb2rgba('not-a-color');
	}

	public function testRgb2HslReturnsExpectedValue(): void
	{
		$this->assertSame('hsl(0, 0%, 0%)', ColorService::rgb2hsl('rgb(0, 0, 0)'));
		$this->assertSame('hsl(0, 0%, 100%)', ColorService::rgb2hsl('rgb(255, 255, 255)'));
		$this->assertSame('hsl(0, 100%, 50%)', ColorService::rgb2hsl('rgb(255, 0, 0)'));
		$this->assertSame('hsl(120, 100%, 50%)', ColorService::rgb2hsl('rgb(0, 255, 0)'));
		$this->assertSame('hsl(240, 100%, 50%)', ColorService::rgb2hsl('rgb(0, 0, 255)'));
	}

	public function testRgb2HslReturnsValidFormat(): void
	{
		$hsl = ColorService::rgb2hsl('rgb(239, 68, 68)');

		$this->assertMatchesRegularExpression('/^hsl\(\d+, \d+%, \d+%\)$/', $hsl);
	}

	public function testRgb2HslHueIsInRange(): void
	{
		$colors = [
			'rgb(255, 0, 0)',
			'rgb(0, 255, 0)',
			'rgb(0, 0, 255)',
			'rgb(128, 64, 32)',
		];

		foreach ($colors as $rgb) {
			preg_match('/^hsl\((\d+),/', ColorService::rgb2hsl($rgb), $matches);
			$hue = (int) $matches[1];

			$this->assertGreaterThanOrEqual(0, $hue, "La teinte de {$rgb} est inférieure à 0.");
			$this->assertLessThanOrEqual(360, $hue, "La teinte de {$rgb} est supérieure à 360.");
		}
	}

	public function testRgb2HslThrowsOnInvalidRgb(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::rgb2hsl('not-a-color');
	}

	public function testRgb2OklchReturnsExpectedValue(): void
	{
		$this->assertSame('oklch(0 0 0)', ColorService::rgb2oklch('rgb(0, 0, 0)'));

		$oklch = ColorService::rgb2oklch('rgb(255, 255, 255)');
		$this->assertStringStartsWith('oklch(1 ', $oklch);
	}

	public function testRgb2OklchReturnsValidFormat(): void
	{
		$oklch = ColorService::rgb2oklch('rgb(239, 68, 68)');

		$this->assertMatchesRegularExpression('/^oklch\([0-9.]+ [0-9.]+ [0-9.]+\)$/', $oklch);
	}

	public function testRgb2OklchLightnessIsInRange(): void
	{
		$colors = [
			'rgb(0, 0, 0)',
			'rgb(255, 255, 255)',
			'rgb(239, 68, 68)',
			'rgb(59, 130, 246)',
		];

		foreach ($colors as $rgb) {
			preg_match('/^oklch\(([0-9.]+)/', ColorService::rgb2oklch($rgb), $matches);
			$lightness = (float) $matches[1];

			$this->assertGreaterThanOrEqual(0.0, $lightness, "La luminosité OKLCH de {$rgb} est inférieure à 0.");
			$this->assertLessThanOrEqual(1.0, $lightness, "La luminosité OKLCH de {$rgb} est supérieure à 1.");
		}
	}

	public function testRgb2OklchHueIsInRange(): void
	{
		$colors = [
			'rgb(255, 0, 0)',
			'rgb(0, 255, 0)',
			'rgb(0, 0, 255)',
		];

		foreach ($colors as $rgb) {
			preg_match('/^oklch\([0-9.]+ [0-9.]+ ([0-9.]+)\)$/', ColorService::rgb2oklch($rgb), $matches);
			$hue = (float) $matches[1];

			$this->assertGreaterThanOrEqual(0.0, $hue, "La teinte OKLCH de {$rgb} est inférieure à 0.");
			$this->assertLessThanOrEqual(360.0, $hue, "La teinte OKLCH de {$rgb} est supérieure à 360.");
		}
	}

	public function testRgb2OklchThrowsOnInvalidRgb(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::rgb2oklch('not-a-color');
	}

	public function testValidateHexAcceptsValidFormats(): void
	{
		$this->expectNotToPerformAssertions();

		ColorService::validateHex('#000000');
		ColorService::validateHex('#FFFFFF');
		ColorService::validateHex('ef4444');
	}

	public function testValidateHexThrowsOnInvalidFormat(): void
	{
		$invalids = ['#GGG000', '#12345', '', '#1234567', 'red'];

		foreach ($invalids as $invalid) {
			try {
				ColorService::validateHex($invalid);
				$this->fail("Une exception aurait dû être levée pour : {$invalid}");
			} catch (InvalidArgumentException) {
				$this->addToAssertionCount(1);
			}
		}
	}

	public function testValidateRgbAcceptsValidFormats(): void
	{
		$this->expectNotToPerformAssertions();

		ColorService::validateRgb('rgb(0, 0, 0)');
		ColorService::validateRgb('rgb(255, 255, 255)');
		ColorService::validateRgb('rgb(128, 64, 32)');
	}

	public function testValidateRgbThrowsOnInvalidFormat(): void
	{
		$invalids = ['rgb(256, 0, 0)', 'rgba(0, 0, 0, 1)', '', 'red'];

		foreach ($invalids as $invalid) {
			try {
				ColorService::validateRgb($invalid);
				$this->fail("Une exception aurait dû être levée pour : {$invalid}");
			} catch (InvalidArgumentException) {
				$this->addToAssertionCount(1);
			}
		}
	}

	public function testConversionChainIsConsistent(): void
	{
		$hex = '#ef4444';

		$rgb  = ColorService::hex2rgb($hex);
		$rgba = ColorService::rgb2rgba($rgb);
		$hsl  = ColorService::rgb2hsl($rgb);
		$oklch = ColorService::rgb2oklch($rgb);

		$this->assertStringStartsWith('rgb(', $rgb);
		$this->assertStringStartsWith('rgba(', $rgba);
		$this->assertStringStartsWith('hsl(', $hsl);
		$this->assertStringStartsWith('oklch(', $oklch);
	}
}