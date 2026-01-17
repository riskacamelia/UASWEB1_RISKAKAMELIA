<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $idTransaksi = $_POST['id_transaksi'];
    $idPelanggan = $_POST['id_pelanggan'];
    $totalPembayaran = $_POST['total_pembayaran'];
    $metodePembayaran = $_POST['metode_pembayaran'];    
mysqli_query($conn, "
INSERT INTO laporan
(id_transaksi, id_pelanggan, total_pembayaran, metode_pembayaran)
VALUES
('$idTransaksi', '$idPelanggan', '$totalPembayaran', '$metodePembayaran')
");
header("Location: dashboard.php?page=laporan");
}

$idTransaksi = mysqli_query($conn, "SELECT id FROM transaksi");
$idPelanggan = mysqli_query($conn, "SELECT id FROM pelanggan");

?>
<style>
/* Card */
.card {
background: #ffffff;
padding: 30px;
border-radius: 10px;
max-width: 720px;
/* INI KUNCINYA */
margin-right: auto;
margin-left: 0;
box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}
/* Judul */
.card h3 {
margin-bottom: 20px;
border-bottom: 1px solid #ddd;
padding-bottom: 10px;
}
/* Form */
.form-group {
margin-bottom: 15px;
}
label {
    display: block;
font-weight: bold;
margin-bottom: 6px;
}
select,input {
width: 100%;
background-color: white;
padding: 10px;
border-radius: 5px;
border: 1px solid #ccc;
}
input:focus {
outline: none;
border-color: #3498db;
}
/* Tombol */
.btn {
padding: 10px 16px;
border-radius: 5px;
text-decoration: none;
color: white;
border: none;
cursor: pointer;
font-size: 14px;
}
.btn-tambah {
background: #27ae60;
}
.btn-tambah:hover {
background: #219150;
}
.btn-hapus {
background: #c0392b;
}
.btn-hapus:hover {
background: #a93226;
}
</style>
<div class="card">
<h3>Tambaah Laporan</h3>
<form method="post">
<div class="form-group">
<label>id transaksi</label>
    <select name="id_transaksi" required>
        <?php while ($row_transaksi = mysqli_fetch_assoc($idTransaksi)) { ?>
            <option value="<?= $row_transaksi['id']; ?>"><?= $row_transaksi['id']; ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
<label>id pelanggan</label>
    <select name="id_pelanggan" required>
        <?php while ($row_pelanggan = mysqli_fetch_assoc($idPelanggan)) { ?>
            <option value="<?= $row_pelanggan['id']; ?>"><?= $row_pelanggan['id']; ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
    <label for="">Total Pembayaran</label>
    <input type="number" name="total_pembayaran" required>
</div>
<div class="form-group">
<label>Metode Pembayaran</label>
    <select name="metode_pembayaran" required>
        <option value="tunai">Tunai</option>
        <option value="transfer">Transfer</option>
    </select>
</div>
<button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
<a href="dashboard.php?page=pelanggan" class="btn btn-hapus">Batal</a>
</form>
</div>