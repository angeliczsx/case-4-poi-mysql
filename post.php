<?php
include('connection.php');

$data = $_POST;
$nama = $data['nama'];
$deskripsi = $data['deskripsi'];
$kategori = $data['kategori'];
$latitude = $data['latitude'];
$longitude = $data['longitude'];
$kategori = $data['kategori'];
$rating = $data['rating'];
$alamat = $data['alamat'];
$kontak = $data['kontak'];
$jam = $data['jam'];

$sql = "INSERT INTO poi (nama, deskripsi,latitude,longitude, kategori, rating, alamat, kontak, jam) VALUES (:nama, :deskripsi,:latitude,:longitude, :kategori, :rating, :alamat, :kontak, :jam)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':nama', $nama);
$stmt->bindParam(':deskripsi', $deskripsi);
$stmt->bindParam(':kategori', $kategori);
$stmt->bindParam(':rating', $rating);
$stmt->bindParam(':latitude', $latitude);
$stmt->bindParam(':longitude', $longitude);
$stmt->bindParam(':alamat', $alamat);
$stmt->bindParam(':kontak', $kontak);
$stmt->bindParam(':jam', $jam);
$stmt->execute();