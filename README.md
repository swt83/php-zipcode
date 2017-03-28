# Zipcode

A PHP class for US zipcode objects.

## Install

Normall install via Composer.

## Usage

```php
use Travis\Zipcode;

$zip = Zipcode::make('6831-2525');
echo $zip->five; // 06831
echo $zip->four; // 2525
echo $zip->full; // 06831-2525

$zip = Zipcode::make('6831');
echo $zip->five; // 06831
echo $zip->four; // null
echo $zip->full; // 06831
```