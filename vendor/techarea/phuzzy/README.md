# Phuzzy

Phuzzy adalah sebuah library PHP untuk algoritma fuzzy

## Installation

```bash
composer require techarea/phuzzy
```

## Contoh penggunaan

- Buatlah object baru

```php
$phuzzy = new Techarea\Phuzzy\Phuzzy;
```

- Masukkan nama variabel input (huruf kecil semua dan tanpa spasi)

```php
$phuzzy->setInputNames(['var1', 'var2']);
```

- Masukkan nama variabel output (huruf kecil semua dan tanpa spasi)

```php
$phuzzy->setOutputNames(['var1', 'var2']);
```

- Tambahkan membership variabel

> tipe himpunan: 'LEFT_INFINITY', 'TRIANGLE', 'TRAPEZOID', 'RIGHT_INFINITY'

> semua titik berupa integer/float kecuali titik tengah bisa array jika tipe 'TRAPEZOID'

```php
$phuzzy->addMember('variabel', 'himpunan',  'titik_awal', 'titik_tengah', 'titik_akhir', 'tipe_himpunan');
```

- Menambahkan rules

```php
$phuzzy->addRule('IF variabel.himpunan AND variabel.himpunan THEN variabel.himpunan');
```

- Memasukkan nilai variabel

```php
$phuzzy->setRealInput('variabel', 'nilai');
```

- Menjalankan proses fuzzy

```php
$result = $phuzzy->Execute();
```
