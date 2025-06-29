<?php
$koneksi = mysqli_connect("localhost", "root", "", "warung_xyz");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>