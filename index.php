<?php require_once "data.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar / Header -->
    <header>
        <div class="container navbar">
            <div class="logo">Cia Store</div>
            <nav>
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
            </nav>
        </div>
    </header>

    <main class="container">

        <!-- Hero -->
        <section class="hero" id="home">
            <small>CIA STORE</small>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a href="#products" class="btn-hero">Lihat Produk</a>
        </section>

        <!-- Informasi jumlah produk -->
        <section id="products">
            <div class="catalog-head">
                <div>
                    <small>OUR PRODUCTS</small>
                    <h2>Katalog Produk</h2>
                </div>
                <div class="badge-total">Total Produk: <strong><?= $totalProduk; ?></strong></div>
            </div>

            <!-- Katalog produk (perulangan PHP) -->
            <div class="grid">
                <?php foreach ($produk as $item): ?>
                    <?php
                        $dapatDiskon = $item["harga"] >= BATAS_DISKON;
                        if ($dapatDiskon) {
                            $hargaAkhir = hitungHargaDiskon($item["harga"], PERSEN_DISKON);
                        }
                        $tersedia = $item["stok"] > 0;
                    ?>
                    <article class="card">
                        <div>
                            <span class="kategori"><?= htmlspecialchars($item["kategori"]); ?></span>
                            <?php if ($dapatDiskon): ?>
                                <span class="diskon-label">DISKON <?= PERSEN_DISKON; ?>%</span>
                            <?php endif; ?>
                        </div>
                        <h3><?= htmlspecialchars($item["nama"]); ?></h3>

                        <?php if ($dapatDiskon): ?>
                            <div class="harga-coret"><?= formatRupiah($item["harga"]); ?></div>
                            <div class="harga"><?= formatRupiah($hargaAkhir); ?></div>
                        <?php else: ?>
                            <div class="harga"><?= formatRupiah($item["harga"]); ?></div>
                        <?php endif; ?>

                        <div class="card-footer">
                            <span>Stok: <?= $item["stok"]; ?></span>
                            <?php if ($tersedia): ?>
                                <span class="status tersedia">Tersedia</span>
                            <?php else: ?>
                                <span class="status habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($tersedia): ?>
                            <button class="btn-beli">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-beli" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="about">
        <div class="container">
            &copy; <?= date("Y"); ?> Cia Store. Simple Tech Store.
        </div>
    </footer>

</body>
</html>