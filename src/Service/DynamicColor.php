<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

use Pyreweb\Chroma\Interface\ColorInterface;
use Pyreweb\Chroma\Service\Convert;
use Pyreweb\Chroma\Service\Parse;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class DynamicColor implements ColorInterface
{
	public function __construct(
		private string $hex,
		private ?int $id = null,
		private ?string $name = null,
		private ?int $code = null,
		private ?string $title = null,
	) {}

	public static function from(
		string $hex,
		?int $id = null,
		?string $name = null,
		?int $code = null,
		?string $title = null,
	): self {
		return new self($hex, $id, $name, $code, $title);
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function getCode(): ?int
	{
		return $this->code;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function getHex(): string
	{
		return $this->hex;
	}

	public function getRgb(): string
	{
		return Convert::hexToRgb($this->hex);
	}

	public function getRgba(float $alpha = 1.0): string
	{
		return Convert::hexToRgba($this->hex, $alpha);
	}

	public function getHsl(): string
	{
		return Convert::hexToHsl($this->hex);
	}

	public function getOklch(): string
	{
		return Convert::hexToOklch($this->hex);
	}

	public function getCmyk(): string
	{
		return Convert::hexToCmyk($this->hex);
	}

	public function getParsedHex(): array
	{
		return Parse::hex($this->hex);
	}

	public function getParsedRgb(): array
	{
		return Parse::rgb($this->getRgb());
	}

	public function getParsedRgba(float $alpha = 1.0): array
	{
		return Parse::rgba($this->getRgba($alpha));
	}

	public function toString(): string
	{
		$label = $this->title ?? $this->name ?? $this->hex;

		return $label . ' (' . $this->hex . ')';
	}

	public function toArray(float $alpha = 1.0): array
	{
		return [
			'id' => $this->getId(),
			'name' => $this->getName(),
			'code' => $this->getCode(),
			'title' => $this->getTitle(),
			'hex' => [
				'raw' => $this->getHex(),
				'parsed' => $this->getParsedHex(),
			],
			'rgb' => [
				'raw' => $this->getRgb(),
				'parsed' => $this->getParsedRgb(),
			],
			'rgba' => [
				'raw' => $this->getRgba($alpha),
				'parsed' => $this->getParsedRgba($alpha),
			],
			'hsl' => $this->getHsl(),
			'oklch' => $this->getOklch(),
			'cmyk' => $this->getCmyk(),
		];
	}

	public function toJson(float $alpha = 1.0): string
	{
		return json_encode($this->toArray($alpha), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	}
}