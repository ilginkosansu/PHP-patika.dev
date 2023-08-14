<?php
/*function removeEmptyValue($array) {
    return array_filter($array, function ($x) {   //boş değerleri silen fonksiyon
        return $x !== '' && $x !== NULL;  //x değeri için boş olmayan değerleri döndüren fonksiyon
    });
}
$planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "", "", NULL];
echo removeEmptyValue($planets);*/

function removeEmptyValue($array,$count) {
    // Boş elemanları temizle
    $filteredArray = array_filter($array, function ($value) {
        return $value !== '' && $value !== null;
    });

    // Eğer $count, dizinin eleman sayısından büyükse, $count'u dizinin eleman sayısına ayarla
    $count = min($count, count($filteredArray));

    // Rastgele anahtarları seç
    $randomKeys = array_rand($filteredArray, $count);

    // Seçilen anahtarları kullanarak yeni bir dizi oluştur
    $randomValues = array_map(function ($key) use ($filteredArray) {
        return $filteredArray[$key];
    }, $randomKeys);

    return $randomValues;
}

$planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "", "", NULL];

echo "<pre>";
// Fonksiyonu çağırarak çıktıları alalım:
print_r(removeEmptyValue($planets, 2));
print_r(removeEmptyValue($planets, 3));
print_r(removeEmptyValue($planets, 2));
print_r(removeEmptyValue($planets, 4));
print_r(removeEmptyValue($planets, 5));
