<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

use ArrayObject;

use Pyreweb\Chroma\Service\Convert;

class ConvertHex extends ArrayObject
{
	public function __construct(private string $hex, private float $alpha = 1.0)
	{
		parent::__construct([
			'rgb' => Convert::hexToRgb($hex),
			'rgba' => Convert::hexToRgba($hex, $alpha),
			'hsl' => Convert::hexToHsl($hex),
			'oklch' => Convert::hexToOklch($hex),
			'cmyk' => Convert::hexToCmyk($hex),
		]);
	}

	public function toRgb(): string {
		return Convert::hexToRgb($this->hex);
	}

	public function toRgba(float $alpha = 1.0): string {
		return Convert::hexToRgba($this->hex, $alpha);
	}

	public function toHsl(): string {
		return Convert::hexToHsl($this->hex);
	}

	public function toOklch(): string {
		return Convert::hexToOklch($this->hex);
	}
	
	public function toCmyk(): string {
		return Convert::hexToCmyk($this->hex);
	}
}