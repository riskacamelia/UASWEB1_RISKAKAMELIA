<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
$id_barang = $_POST['id_barang'];
$total_barang = $_POST['total_barang'];
$total_harga = $total_barang * mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id_barang='$id_barang'"))['harga'];
mysqli_query($conn, "
INSERT INTO transaksi
(id_barang, total_barang, total_harga)
VALUES
('$id_barang', '$total_barang', '$total_harga')
");
header("Location: dashboard.php?page=transaksi");
}

$listBarang = mysqli_query($conn, "SELECT * FROM barang");

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
<h3>Tambah transaksi</h3>
<form method="post">
<div class="form-group">
<label>Nama Barang</label>
<select name="id_barang" id="id_barang">
    <option selected hidden>pilih barang</option>
    <?php while ($row = mysqli_fetch_assoc($listBarang)) { ?>
        <option value="<?= $row['id_barang']; ?>"><?= $row['nama_barang']; ?></option>
    <?php } ?>
</select>
</div>
<div class="form-group">
    <label>Total Barang</label>
<input type="number" name="total_barang" min="1" placeholder="" required>
</div>
<!-- <div class="form-group">
<label>Total Harga Barang</label>
<input type="text" name="negara" placeholder="" required>
</div> -->
<!-- <div class="form-group">
<label>Email</label>
<input type="text" name="email" placeholder="" required>
</div> -->
<button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
<a href="dashboard.php?page=transaksi" class="btn btn-hapus">Batal</a>
</form>
</div>