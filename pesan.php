<?php
$id = $_GET['id'];
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
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h5>Form Pemesanan</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Laki-laki">
                            <label class="form-check-label" for="laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Perempuan">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="identitas" class="form-label">Nomor Identitas</label>
                        <input type="text" class="form-control" name="identitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipeKamar" class="form-label">Tipe Kamar</label>
                        <select class="form-select" name="tipeKamar" required>
                            <?php foreach ($rooms as $room): ?>
                                <option value="<?= $room[0] ?>" <?= $room[0] === $rooms[$id][0] ? 'selected' : '' ?>>
                                    <?= $room[0] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" value="<?= $rooms[$id][1] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi Menginap</label>
                        <input type="number" class="form-control" name="durasi" value="3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Termasuk Breakfast</label><br>
                        <input class="form-check-input" type="checkbox" name="breakfast" checked>
                        <label class="form-check-label" for="breakfast">Ya</label>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="text" class="form-control" id="total" value="" readonly>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="button" class="btn btn-secondary">Hitung Total Bayar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>