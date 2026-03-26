<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Tests\Service;

use InvalidArgumentException;

use PHPUnit\Framework\TestCase;

use Pyreweb\Chroma\Service\ColorService;

class ColorServiceTest extends TestCase
{
	public function testConvertHexadecimalToRgbReturnsExpectedValue(): void
	{
		$this->assertSame('rgb(0, 0, 0)', ColorService::convertHexadecimalToRgb('#000000'));
		$this->assertSame('rgb(255, 255, 255)', ColorService::convertHexadecimalToRgb('#FFFFFF'));
		$this->assertSame('rgb(239, 68, 68)', ColorService::convertHexadecimalToRgb('#ef4444'));
	}

	public function testConvertHexadecimalToRgbAcceptsWithoutPrefix(): void
	{
		$this->assertSame('rgb(239, 68, 68)', ColorService::convertHexadecimalToRgb('ef4444'));
	}

	public function testConvertHexadecimalToRgbAcceptsMixedCase(): void
	{
		$this->assertSame('rgb(239, 68, 68)', ColorService::convertHexadecimalToRgb('#EF4444'));
		$this->assertSame('rgb(239, 68, 68)', ColorService::convertHexadecimalToRgb('#Ef4444'));
	}

	public function testConvertHexadecimalToRgbThrowsOnInvalidFormat(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertHexadecimalToRgb('#ZZZ000');
	}

	public function testConvertHexadecimalToRgbThrowsOnShortFormat(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertHexadecimalToRgb('#FFF');
	}

	public function testConvertHexadecimalToRgbThrowsOnEmptyString(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertHexadecimalToRgb('');
	}

	public function testConvertRgbToRgbaUsesDefaultAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 1)', ColorService::convertRgbToRgba('rgb(0, 0, 0)'));
	}

	public function testConvertRgbToRgbaUsesCustomAlpha(): void
	{
		$this->assertSame('rgba(0, 0, 0, 0.5)', ColorService::convertRgbToRgba('rgb(0, 0, 0)', 0.5));
		$this->assertSame('rgba(0, 0, 0, 0)', ColorService::convertRgbToRgba('rgb(0, 0, 0)', 0.0));
		$this->assertSame('rgba(0, 0, 0, 1)', ColorService::convertRgbToRgba('rgb(0, 0, 0)', 1.0));
	}

	public function testConvertRgbToRgbaReturnsExpectedValue(): void
	{
		$this->assertSame('rgba(239, 68, 68, 1)', ColorService::convertRgbToRgba('rgb(239, 68, 68)'));
	}

	public function testConvertRgbToRgbaThrowsOnInvalidRgb(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertRgbToRgba('rgb(999, 0, 0)');
	}

	public function testConvertRgbToRgbaThrowsOnMalformedString(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertRgbToRgba('not-a-color');
	}

	public function testConvertRgbToHslReturnsExpectedValue(): void
	{
		$this->assertSame('hsl(0, 0%, 0%)', ColorService::convertRgbToHsl('rgb(0, 0, 0)'));
		$this->assertSame('hsl(0, 0%, 100%)', ColorService::convertRgbToHsl('rgb(255, 255, 255)'));
		$this->assertSame('hsl(0, 100%, 50%)', ColorService::convertRgbToHsl('rgb(255, 0, 0)'));
		$this->assertSame('hsl(120, 100%, 50%)', ColorService::convertRgbToHsl('rgb(0, 255, 0)'));
		$this->assertSame('hsl(240, 100%, 50%)', ColorService::convertRgbToHsl('rgb(0, 0, 255)'));
	}

	public function testConvertRgbToHslReturnsValidFormat(): void
	{
		$hsl = ColorService::convertRgbToHsl('rgb(239, 68, 68)');

		$this->assertMatchesRegularExpression('/^hsl\(\d+, \d+%, \d+%\)$/', $hsl);
	}

	public function testConvertRgbToHslHueIsInRange(): void
	{
		$colors = [
			'rgb(255, 0, 0)',
			'rgb(0, 255, 0)',
			'rgb(0, 0, 255)',
			'rgb(128, 64, 32)',
		];

		foreach ($colors as $rgb) {
			preg_match('/^hsl\((\d+),/', ColorService::convertRgbToHsl($rgb), $matches);
			$hue = (int) $matches[1];

			$this->assertGreaterThanOrEqual(0, $hue, "La teinte de {$rgb} est inférieure à 0.");
			$this->assertLessThanOrEqual(360, $hue, "La teinte de {$rgb} est supérieure à 360.");
		}
	}

	public function testConvertRgbToHslThrowsOnInvalidRgb(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertRgbToHsl('not-a-color');
	}

	public function testConvertRgbToOklchReturnsExpectedValue(): void
	{
		$this->assertSame('oklch(0 0 0)', ColorService::convertRgbToOklch('rgb(0, 0, 0)'));

		$oklch = ColorService::convertRgbToOklch('rgb(255, 255, 255)');
		$this->assertStringStartsWith('oklch(1 ', $oklch);
	}

	public function testConvertRgbToOklchReturnsValidFormat(): void
	{
		$oklch = ColorService::convertRgbToOklch('rgb(239, 68, 68)');

		$this->assertMatchesRegularExpression('/^oklch\([0-9.]+ [0-9.]+ [0-9.]+\)$/', $oklch);
	}

	public function testConvertRgbToOklchLightnessIsInRange(): void
	{
		$colors = [
			'rgb(0, 0, 0)',
			'rgb(255, 255, 255)',
			'rgb(239, 68, 68)',
			'rgb(59, 130, 246)',
		];

		foreach ($colors as $rgb) {
			preg_match('/^oklch\(([0-9.]+)/', ColorService::convertRgbToOklch($rgb), $matches);
			$lightness = (float) $matches[1];

			$this->assertGreaterThanOrEqual(0.0, $lightness, "La luminosité OKLCH de {$rgb} est inférieure à 0.");
			$this->assertLessThanOrEqual(1.0, $lightness, "La luminosité OKLCH de {$rgb} est supérieure à 1.");
		}
	}

	public function testConvertRgbToOklchHueIsInRange(): void
	{
		$colors = [
			'rgb(255, 0, 0)',
			'rgb(0, 255, 0)',
			'rgb(0, 0, 255)',
		];

		foreach ($colors as $rgb) {
			preg_match('/^oklch\([0-9.]+ [0-9.]+ ([0-9.]+)\)$/', ColorService::convertRgbToOklch($rgb), $matches);
			$hue = (float) $matches[1];

			$this->assertGreaterThanOrEqual(0.0, $hue, "La teinte OKLCH de {$rgb} est inférieure à 0.");
			$this->assertLessThanOrEqual(360.0, $hue, "La teinte OKLCH de {$rgb} est supérieure à 360.");
		}
	}

	public function testConvertRgbToOklchThrowsOnInvalidRgb(): void
	{
		$this->expectException(InvalidArgumentException::class);

		ColorService::convertRgbToOklch('not-a-color');
	}

	public function testValidateHexadecimalAcceptsValidFormats(): void
	{
		$this->expectNotToPerformAssertions();

		ColorService::validateHexadecimal('#000000');
		ColorService::validateHexadecimal('#FFFFFF');
		ColorService::validateHexadecimal('ef4444');
	}

	public function testValidateHexadecimalThrowsOnInvalidFormat(): void
	{
		$invalids = ['#GGG000', '#12345', '', '#1234567', 'red'];

		foreach ($invalids as $invalid) {
			try {
				ColorService::validateHexadecimal($invalid);
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
		$invalids = ['rgb(256, 0, 0)', 'rgba(0, 0, 0, 1)', 'rgb(0,0,0)', '', 'red'];

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

		$rgb  = ColorService::convertHexadecimalToRgb($hex);
		$rgba = ColorService::convertRgbToRgba($rgb);
		$hsl  = ColorService::convertRgbToHsl($rgb);
		$oklch = ColorService::convertRgbToOklch($rgb);

		$this->assertStringStartsWith('rgb(', $rgb);
		$this->assertStringStartsWith('rgba(', $rgba);
		$this->assertStringStartsWith('hsl(', $hsl);
		$this->assertStringStartsWith('oklch(', $oklch);
	}
}