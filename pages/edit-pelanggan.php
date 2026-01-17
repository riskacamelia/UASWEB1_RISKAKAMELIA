<?php
include 'koneksi.php';
$id = $_GET['id'];
/* PROSES UPDATE */
if (isset($_POST['update'])) {
mysqli_query($conn, "
UPDATE pelanggan SET
nama='$_POST[nama]',
alamat='$_POST[alamat]',
negara='$_POST[negara]',
email='$_POST[email]'
WHERE id='$id'
");
header("Location: dashboard.php?page=pelanggan");
}
/* AMBIL DATA */
$data = mysqli_fetch_assoc(
mysqli_query($conn, "SELECT * FROM pelanggan WHERE id='$id'")
);
?>
<style>
.card {
background: #fff;
padding: 30px;
border-radius: 10px;
max-width: 720px;
box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}
.form-group {
margin-bottom: 16px;
}
label {
font-weight: bold;
display: block;
margin-bottom: 6px;
}
input {
width: 100%;
padding: 10px;
}
.btn-edit {
background: #2980b9;
color: #fff;
padding: 8px 16px;
}
.btn-hapus {
background: #c0392b;
color: #fff;
padding: 8px 16px;
}
</style>
<div class="card">

<h3>Edit Pelanggan</h3>
<form method="post">

<div class="form-group">
<label>nama</label>
<input type="text" name="nama" value="<?= $data['nama']; ?>"
required>
</div>
<div class="form-group">
<label>alamat</label>
<input type="text" name="alamat" value="<?= $data['alamat']; ?>"
required>
</div>
<div class="form-group">
<label>negara</label>
<input type="text" name="negara" value="<?= $data['negara']; ?>"
required>
</div>
<div class="form-group">
<label>email</label>
<input type="text" name="email" value="<?= $data['email']; ?>"
required>
</div>


</div>
<button type="submit" name="update" class="btn-edit">Update</button>
<a href="dashboard.php?page=listProducts" class="btn-hapus">Batal</a>
</form>
</div>