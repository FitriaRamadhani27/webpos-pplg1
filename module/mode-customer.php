<?php
// Cek jika user level 3, redirect ke error page
if (userLogin() !== null && userLogin()['level'] == 3) {
  header("location:" . $main_url . "error-page.php");
  exit();
}

// Fungsi untuk menambahkan customer
function insert($customer)
{
  global $koneksi;

  // Ambil dan amankan data input
  $nama   = mysqli_real_escape_string($koneksi, $customer['nama']);
  $telpon = mysqli_real_escape_string($koneksi, $customer['telpon']);
  $alamat = mysqli_real_escape_string($koneksi, $customer['alamat']);

  // Query insert (line 20 yang kamu maksud)
  $sqlcustomer = "INSERT INTO tbl_customer (nama, telp, alamat) VALUES ('$nama', '$telpon', '$alamat')";

  // Kembalikan hasil
  return mysqli_affected_rows($koneksi);
}

// Fungsi untuk menghapus customer
function delete($id)
{
  global $koneksi;

  $sqlDelete = "DELETE FROM tbl_customer WHERE id_customer = $id";
  mysqli_query($koneksi, $sqlDelete);

  return mysqli_affected_rows($koneksi);
}

// Fungsi untuk mengupdate customer
function update($data)
{
  global $koneksi;

  $id     = mysqli_real_escape_string($koneksi, $data['id']);
  $nama   = mysqli_real_escape_string($koneksi, $data['nama']);
  $telpon = mysqli_real_escape_string($koneksi, $data['telpon']);
  //$ketr   = mysqli_real_escape_string($koneksi, $data['ketr']); // Optional: jika kamu pakai kolom ini
  $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);

  $sqlcustomer = "UPDATE tbl_customer SET nama = '$nama', telp = '$telpon', alamat = '$alamat' WHERE id_customer = '$id'";
  mysqli_query($koneksi, $sqlcustomer);

  return mysqli_affected_rows($koneksi);
}
