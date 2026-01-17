<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_penjualan2");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>