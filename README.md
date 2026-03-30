# pyreweb/chroma

Bibliothèque PHP d'énumérations et de conversion de couleurs, supportant les formats HEX, RGB, RGBA, HSL, OKLCH et CMYK.

## Prérequis

- PHP 8.1 ou supérieur

## Installation

```bash
composer require pyreweb/chroma
```

## Utilisation

### Récupération des valeurs

```php
use Pyreweb\Chroma\Enum\Color;

$color = Color::Red500;

$color->getId();
$color->getName();
$color->getCode();
$color->getTitle();
$color->getHex();
$color->getRgb();
$color->getRgba();
$color->getRgba(0.5);
$color->getHsl();
$color->getOklch();
$color->getCmyk();
$color->toArray();
```

### Itérer sur toutes les couleurs

```php
use Pyreweb\Chroma\Enum\Color;

foreach (Color::cases() as $color) {
	echo $color->getTitle() . ' : ' . $color->getHex() . PHP_EOL;
}
```

### Recherche de couleurs

```php
use Pyreweb\Chroma\Enum\Color;

Color::from(105);
Color::from(Color::Red500->getId());

Color::fromId(105);
Color::fromId(Color::Red500->getId());

Color::fromName('Red500');
Color::fromName(Color::Red500->getName());

Color::fromCode(500);
Color::fromCode(Color::Red500->getCode());

Color::fromTitle('Rouge passion');
Color::fromTitle(Color::Red500->getTitle());

Color::fromHex('#ef4444');
Color::fromHex(Color::Red500->getHex());

Color::fromRgb(Color::Red500->getRgb());
Color::fromRgba(Color::Red500->getRgba());
Color::fromHsl(Color::Red500->getHsl());
Color::fromOklch(Color::Red500->getOklch());

Color::tryFrom(Color::Red500->getId());
Color::tryFromId(Color::Red500->getId());
Color::tryFromName(Color::Red500->getName());
Color::tryFromCode(Color::Red500->getCode());
Color::tryFromTitle(Color::Red500->getTitle());
Color::tryFromHex(Color::Red500->getHex());
Color::tryFromRgb(Color::Red500->getRgb());
Color::tryFromRgba(Color::Red500->getRgba());
Color::tryFromHsl(Color::Red500->getHsl());
Color::tryFromOklch(Color::Red500->getOklch());
```

### Convertir une couleur manuellement

```php
use Pyreweb\Chroma\Service\Convert;

Convert::hex2rgb(Color::Red500->getHex());
Convert::hex2rgba(Color::Red500->getHex());
Convert::hex2rgba(Color::Red500->getHex(), 0.5);
Convert::hex2hsl(Color::Red500->getHex());
Convert::hex2oklch(Color::Red500->getHex());
Convert::hex2cmyk(Color::Red500->getHex());
```

## Palettes disponibles

| Palette      | Cases disponibles                          |
|--------------|--------------------------------------------|
| Basiques     | `Black`, `White`                           |
| Red          | `Red50` → `Red950`                         |
| Orange       | `Orange50` → `Orange950`                   |
| Amber        | `Amber50` → `Amber950`                     |
| Yellow       | `Yellow50` → `Yellow950`                   |
| Lime         | `Lime50` → `Lime950`                       |
| Green        | `Green50` → `Green950`                     |
| Emerald      | `Emerald50` → `Emerald950`                 |
| Teal         | `Teal50` → `Teal950`                       |
| Cyan         | `Cyan50` → `Cyan950`                       |
| Sky          | `Sky50` → `Sky950`                         |
| Blue         | `Blue50` → `Blue950`                       |
| Indigo       | `Indigo50` → `Indigo950`                   |
| Violet       | `Violet50` → `Violet950`                   |
| Purple       | `Purple50` → `Purple950`                   |
| Fuchsia      | `Fuchsia50` → `Fuchsia950`                 |
| Pink         | `Pink50` → `Pink950`                       |
| Rose         | `Rose50` → `Rose950`                       |
| Slate        | `Slate50` → `Slate950`                     |
| Gray         | `Gray50` → `Gray950`                       |
| Zinc         | `Zinc50` → `Zinc950`                       |
| Neutral      | `Neutral50` → `Neutral950`                 |
| Stone        | `Stone50` → `Stone950`                     |
| Taupe        | `Taupe50` → `Taupe950`                     |
| Mauve        | `Mauve50` → `Mauve950`                     |
| Mist         | `Mist50` → `Mist950`                       |
| Olive        | `Olive50` → `Olive950`                     |
| Terracotta   | `Terracotta50` → `Terracotta950`           |
| Peach        | `Peach50` → `Peach950`                     |
| Sand         | `Sand50` → `Sand950`                       |
| Coral        | `Coral50` → `Coral950`                     |
| Sage         | `Sage50` → `Sage950`                       |
| Lagoon       | `Lagoon50` → `Lagoon950`                   |

## Licence

Ce projet est sous licence [MIT](LICENSE).
