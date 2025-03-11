<?php
$id = $_GET['id'];
$rooms = [
    ["Standar", 500000],
    ["Deluxe", 600000],
    ["Executive", 700000]
];

$selected_room = $_POST['tipeKamar'] ?? $rooms[$id][0];
$selected_price = array_column($rooms, 1, 0)[$selected_room];
$breakfast = isset($_POST['breakfast']);
$durasi = $_POST['durasi'] ?? 1;
$total_bayar = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $breakfast_cost = $breakfast ? 80000 * $durasi : 0;
    $total_room_price = $selected_price * $durasi;
    $discount = ($durasi >= 3) ? 0.1 * $total_room_price : 0;
    $total_bayar = ($total_room_price - $discount) + $breakfast_cost;
}
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
            <div class="card-header bg-primary text-white text-center"><h5>Form Pemesanan</h5></div>
            <div class="card-body">
                <form method="POST">
                    <!-- Input Nama -->
                    <input type="text" class="form-control mb-3" name="nama" placeholder="Nama Pemesan" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" required>
                    
                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>
                        <input class="form-check-input" type="radio" name="gender" value="Laki-laki" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Laki-laki') ? 'checked' : '' ?>> Laki-laki
                        <input class="form-check-input ms-3" type="radio" name="gender" value="Perempuan" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Perempuan') ? 'checked' : '' ?>> Perempuan
                    </div>

                    <!-- Nomor Identitas -->
                    <input type="text" class="form-control mb-3" name="identitas" placeholder="Nomor Identitas" value="<?= htmlspecialchars($_POST['identitas'] ?? '') ?>" required>

                    <!-- Tipe Kamar -->
                    <select class="form-select mb-3" name="tipeKamar" onchange="this.form.submit()">
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= $room[0] ?>" <?= ($room[0] === $selected_room) ? 'selected' : '' ?>>
                                <?= $room[0] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Harga Kamar -->
                    <input type="text" class="form-control mb-3" name="harga" value="<?= $selected_price ?>" readonly>

                    <!-- Tanggal Pemesanan -->
                    <input type="date" class="form-control mb-3" name="tanggal" value="<?= $_POST['tanggal'] ?? '' ?>" required>

                    <!-- Durasi Menginap -->
                    <input type="number" class="form-control mb-3" name="durasi" placeholder="Durasi Menginap" value="<?= htmlspecialchars($durasi) ?>" required>

                    <!-- Checkbox Breakfast -->
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" name="breakfast" <?= $breakfast ? 'checked' : '' ?>> Termasuk Breakfast
                    </div>

                    <!-- Total Bayar -->
                    <input type="text" class="form-control mb-3" id="total" value="<?= $total_bayar ? number_format($total_bayar, 0, ',', '.') : '' ?>" placeholder="Total Bayar" readonly>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Hitung Total</button>
                    <button type="submit" formaction="hasil.php" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
