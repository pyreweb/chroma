# pyreweb/chroma

Bibliothèque PHP d'énumérations et de conversion de couleurs, supportant les formats HEX, RGB, RGBA, HSL et OKLCH.

## Prérequis

- PHP 8.1 ou supérieur

## Installation

```bash
composer require pyreweb/chroma
```

## Utilisation

### Récupérer une couleur

```php
use Pyreweb\Chroma\Enum\Color;

$color = Color::Red500;

$color->getId();          // 105
$color->getName();        // "Red500"
$color->getCode();        // 500
$color->getTitle();       // "Rouge passion"
$color->getHexadecimal(); // "#ef4444"
$color->getRgb();         // "rgb(239, 68, 68)"
$color->getRgba();        // "rgba(239, 68, 68, 1)"
$color->getRgba(0.5);     // "rgba(239, 68, 68, 0.5)"
$color->getHsl();         // "hsl(0, 91%, 60%)"
$color->getOklch();       // "oklch(0.6274 0.2007 22.15)"
$color->toArray();        // [...tous les formats]
```

### Convertir une couleur manuellement

```php
use Pyreweb\Chroma\Service\ColorService;

ColorService::convertHexadecimalToRgb('#ef4444');        // "rgb(239, 68, 68)"
ColorService::convertRgbToRgba('rgb(239, 68, 68)');      // "rgba(239, 68, 68, 1)"
ColorService::convertRgbToRgba('rgb(239, 68, 68)', 0.5); // "rgba(239, 68, 68, 0.5)"
ColorService::convertRgbToHsl('rgb(239, 68, 68)');       // "hsl(0, 91%, 60%)"
ColorService::convertRgbToOklch('rgb(239, 68, 68)');     // "oklch(0.6274 0.2007 22.15)"

// Ou aussi...

use Pyreweb\Chroma\Enum\Color;
use Pyreweb\Chroma\Service\ColorService;

ColorService::convertHexadecimalToRgb(Color::Red500->getHexadecimal()); // "rgb(239, 68, 68)"
ColorService::convertRgbToRgba(Color::Red500->getRgb());                // "rgba(239, 68, 68, 1)"
ColorService::convertRgbToRgba(Color::Red500->getRgb(), 0.5);           // "rgba(239, 68, 68, 0.5)"
ColorService::convertRgbToHsl(Color::Red500->getRgb());                 // "hsl(0, 91%, 60%)"
ColorService::convertRgbToOklch(Color::Red500->getRgb());               // "oklch(0.6274 0.2007 22.15)"
```

### Itérer sur toutes les couleurs

```php
use Pyreweb\Chroma\Enum\Color;

foreach (Color::cases() as $color) {
    echo $color->getTitle() . ' : ' . $color->getHexadecimal() . PHP_EOL;
}
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

## Tests

```bash
composer require --dev phpunit/phpunit
vendor/bin/phpunit
```

## Licence

Ce projet est sous licence [MIT](LICENSE).
