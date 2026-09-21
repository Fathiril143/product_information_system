<?php

function hitungTotalNilaiStok($katalog)
{
    $total = 0;

    foreach ($katalog as $produk) {
        $total += $produk["harga"] * $produk["stok"];
    }

    return $total;
}

function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

function statusStok($stok)
{
    if ($stok < 3) {
        return "Stok Kritis";
    }

    return "Stok Aman";
}
