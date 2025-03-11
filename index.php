<?php
$rooms = [
    ["Standar", 500000, "standar.jpg"],
    ["Deluxe", 600000, "deluxe.jpg"],
    ["Executive", 700000, "executive.jpg"]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .carousel-item img {
            height: 450px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Hotel Kami</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Kamar (Carousel) -->
    <div id="bannerKamar" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($rooms as $index => $room) : ?>
                <button type="button" data-bs-target="#bannerKamar" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($rooms as $index => $room) : ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="img/<?= $room[2] ?>" class="d-block w-100" alt="<?= $room[0] ?>">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                        <h3><?= $room[0] ?></h3>
                        <p>Harga mulai dari Rp <?= number_format($room[1], 0, ',', '.') ?> per malam.</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerKamar" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerKamar" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <section id="produk">
            <h2 class="text-center">Jenis Kamar</h2>
            <div class="row">
                <?php foreach ($rooms as $room => $tampil) { ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="img/<?= $tampil[2] ?>" alt="<?= $tampil[0] ?>">
                        <h5 class="mt-2"><?= $tampil[0] ?></h5>
                        <h5 class="mt-2">Rp <?= number_format($tampil[1], 0, ',', '.') ?></h5>
                        <a href="pesan.php?id=<?= $room ?>" class="btn btn-primary mt-2">Pesan</a>                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>

    <footer id="tentang" class="bg-dark text-white text-center py-3 mt-5">
        <h2 class="text-center">Tentang Kami</h2>
        <p class="text-center">Hotel Kami adalah tempat terbaik untuk menginap dengan layanan berkualitas dan fasilitas modern. 
        Lokasi kami berada di Jl. Raya No. 456, Jakarta. 
        Hubungi kami di <strong>0812-9876-5432</strong> atau email ke <strong>info@hotelkami.com</strong>.</p>
        <p>&copy; 2025 Hotel Kami. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
