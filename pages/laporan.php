<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM laporan");
?>
<style>
.card {
    background: white;
    padding: 20px;
    border-radius: 6px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}
.btn {
padding: 8px 12px;
text-decoration: none;
border-radius: 4px;
color: white;
font-size: 14px;
}
.btn-tambah {
background: #27ae60;
}
.btn-edit {
background: #2980b9;
}
.btn-hapus {
background: #c0392b;
}
table {
width: 100%;
border-collapse: collapse;
}
th, td {
padding: 10px;
border-bottom: 1px solid #ddd;
text-align: center;
}
th {
background: #f8f8f8;
}
</style>
<div class="card">
<div class="card-header">
<h3>List laporan</h3>
<a href="dashboard.php?page=tambah-laporan" class="btn btn-tambah">+ Tambah laporan</a>
</div>
<table>
<tr>

<th>id transaksi</th>
<th>tanggal laporan</th>
<th>id pelanggan</th>
<th>total pembayaran</th>
<th>metode pembayaran</th>
<th>Aksi</th>
</tr>
<?php
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {
?>
<tr>

<td><?= $row['id_transaksi']; ?></td>
<td><?= $row['tanggal_laporan']; ?></td>
<td><?= $row['id_pelanggan']; ?></td>
<td><?= $row['total_pembayaran']; ?></td>
<td><?= $row['metode_pembayaran']; ?></td>
<td>
<a href="dashboard.php?page=edit-laporan&id=<?= $row['id']; ?>" class="
btn btn-edit">Edit</a>
<a href="dashboard.php?page=hapus-laporan&id=<?= $row['id']; ?>"
class="btn btn-hapus"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>
</td>
</tr>
<?php } ?>
</table>
</div>