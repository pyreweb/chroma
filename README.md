# pyreweb/chroma

Bibliothèque PHP d'énumérations et de conversion de couleurs. Fournit un enum typé `Color` couvrant plusieurs centaines de teintes réparties sur de nombreuses palettes chromatiques, des tons neutres aux couleurs vives. Supporte les formats HEX, RGB, RGBA, HSL, OKLCH et CMYK, avec des utilitaires de conversion et de parsing intégrés.

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
$color->getRgba($alpha);
$color->getHsl();
$color->getOklch();
$color->getCmyk();
$color->toString($alpha);
$color->toArray($alpha);
$color->toJson($alpha);
```

### Itérer sur toutes les couleurs

```php
use Pyreweb\Chroma\Enum\Color;

/**
 * Renvoi la liste suivante :
 * Noir (#000000)
 * Blanc (#ffffff)
 * ...
 */
foreach (Color::cases() as $color) {
	echo $color->toString();
}
```

### Recherche de couleurs

```php
use Pyreweb\Chroma\Enum\Color;

Color::from(1);                     // Color:Black
Color::from(2);                     // Color::White
Color::from(105);                   // Color::Red500

Color::fromId(1);                   // Color:Black
Color::fromId(2);                   // Color::White
Color::fromId(105);                 // Color::Red500

Color::fromName('Black');           // Color:Black
Color::fromName('White');           // Color::White
Color::fromName('Red500');          // Color::Red500

Color::fromTitle('Noir');           // Color:Black
Color::fromTitle('Blanc');          // Color::White
Color::fromTitle('Rouge passion');  // Color::Red500

Color::fromHex('#000000');          // Color:Black
Color::fromHex('#ffffff');          // Color::White
Color::fromHex('#ef4444');          // Color::Red500
```

### Convertir une couleur manuellement

```php
use Pyreweb\Chroma\Service\Convert;

// Alpha du RGBA
$alpha = 0.5;

/**
 * Hexadécimal vers autres
 */

// Hexadécimal vers tous les autres
Convert::hex('#ef4444', $alpha);
Convert::hex(Color::Red500->getHex(), $alpha);

// Hexadécimal vers RGB
Convert::hex('#ef4444')->toRgb();
Convert::hex(Color::Red500->getHex())->toRgb();
Convert::hexToRgb('#ef4444');
Convert::hexToRgb(Color::Red500->getHex());

// Hexadécimal vers RGBA
Convert::hex('#ef4444')->toRgba($alpha);
Convert::hex(Color::Red500->getHex())->toRgba($alpha);
Convert::hexToRgba('#ef4444', $alpha);
Convert::hexToRgba(Color::Red500->getHex(), $alpha);

// Hexadécimal vers HSL
Convert::hex('#ef4444')->toHsl();
Convert::hex(Color::Red500->getHex())->toHsl();
Convert::hexToHsl('#ef4444');
Convert::hexToHsl(Color::Red500->getHex());

// Hexadécimal vers OKLCH
Convert::hex('#ef4444')->toOklch();
Convert::hex(Color::Red500->getHex())->toOklch();
Convert::hexToOklch('#ef4444');
Convert::hexToOklch(Color::Red500->getHex());

// Hexadécimal vers CMYK
Convert::hex('#ef4444')->toCmyk();
Convert::hex(Color::Red500->getHex())->toCmyk();
Convert::hexToCmyk('#ef4444');
Convert::hexToCmyk(Color::Red500->getHex());
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
| Gold         | `Gold50` → `Gold950`                       |
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
