<?php
// Array PHP: seluruh data produk (min. 6 produk)
$produk = [
    ["nama" => "Monitor 24 Inch",     "kategori" => "Monitor",   "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop Productivity", "kategori" => "Laptop",    "harga" => 8500000, "stok" => 3],
    ["nama" => "Mechanical Keyboard", "kategori" => "Aksesoris", "harga" => 750000,  "stok" => 12],
    ["nama" => "Wireless Mouse",      "kategori" => "Aksesoris", "harga" => 250000,  "stok" => 0],
    ["nama" => "Headset Gaming",      "kategori" => "Audio",     "harga" => 950000,  "stok" => 7],
    ["nama" => "Webcam Full HD",      "kategori" => "Kamera",    "harga" => 1200000, "stok" => 0],
    ["nama" => "SSD 1TB NVMe",        "kategori" => "Storage",   "harga" => 1100000, "stok" => 15],
];

// Jumlah seluruh produk (otomatis)
$totalProduk = count($produk);

// Konfigurasi diskon (challenge)
const BATAS_DISKON  = 1000000;
const PERSEN_DISKON = 10;

// Format mata uang Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// Hitung harga setelah diskon
function hitungHargaDiskon($harga, $persen) {
    return $harga - ($harga * $persen / 100);
}