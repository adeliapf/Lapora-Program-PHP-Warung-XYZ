<?php
include 'db/koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu=$id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];

  if ($_FILES['gambar']['name']) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "img/$gambar");

    mysqli_query($koneksi, "UPDATE menu SET nama_menu='$nama', harga=$harga, id_kategori=$kategori, gambar='$gambar' WHERE id_menu=$id");
  } else {
    mysqli_query($koneksi, "UPDATE menu SET nama_menu='$nama', harga=$harga, id_kategori=$kategori WHERE id_menu=$id");
  }

  echo "Produk berhasil diupdate. <a href='produk_admin.php'>Kembali</a>";
  exit;
}
?>

<h2>Edit Produk</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="nama" value="<?= $data['nama_menu'] ?>" required><br>
  <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>
  <select name="kategori">
    <option value="1" <?= $data['id_kategori'] == 1 ? 'selected' : '' ?>>Makanan</option>
    <option value="2" <?= $data['id_kategori'] == 2 ? 'selected' : '' ?>>Minuman</option>
    <option value="3" <?= $data['id_kategori'] == 3 ? 'selected' : '' ?>>Cemilan</option>
  </select><br>
  <label>Ganti Gambar (opsional):</label>
  <input type="file" name="gambar"><br><br>
  <button type="submit">Simpan Perubahan</button>
</form>