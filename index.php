<?php

require_once "products.php";
require_once "functions.php";

$totalNilaiStok = hitungTotalNilaiStok($katalog);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        h1 {
            margin-bottom: 8px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .summary {
            background: white;
            padding: 18px;
            margin: 20px 0;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #eee;
        }

        .critical {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Product Information System</h1>
    <p>Daftar informasi produk dan kondisi stok.</p>

    <div class="summary">
        <strong>Total Nilai Stok:</strong>
        <?= formatRupiah($totalNilaiStok); ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Deskripsi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($katalog as $produk): ?>
                <tr>
                    <td><?= $produk["id"]; ?></td>
                    <td><?= htmlspecialchars($produk["nama"]); ?></td>
                    <td><?= htmlspecialchars($produk["kategori"]); ?></td>
                    <td><?= formatRupiah($produk["harga"]); ?></td>
                    <td><?= $produk["stok"]; ?></td>
                    <td class="<?= $produk["stok"] < 3 ? "critical" : ""; ?>">
                        <?= statusStok($produk["stok"]); ?>
                    </td>
                    <td><?= htmlspecialchars($produk["deskripsi"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</body>
</html>
