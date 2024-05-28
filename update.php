<?php
include('connection.php');

$newLat = $_POST['latitude'];
$newLng = $_POST['longitude'];
$lng = $_POST['initialLongitude'];
$lat = $_POST['initialLatitude'];
$newNama = $_POST['nama'];
$newDeskripsi = $_POST['deskripsi'];
$newKategori = $_POST['kategori'];
$newRating = $_POST['rating'];
$newAlamat = $_POST['alamat'];
$newKontak = $_POST['kontak'];
$newJam = $_POST['jam'];

$sql = "UPDATE poi SET latitude = :newLat, longitude = :newLng";

if (!empty($newNama)) {
    $sql .= ", nama = :nama";
}
if (!empty($newDeskripsi)) {
    $sql .= ", deskripsi = :deskripsi";
}
if (!empty($newKategori)) {
    $sql .= ", kategori = :kategori";
}
if (!empty($newRating)) {
    $sql .= ", rating = :rating";
}
if (!empty($newAlamat)) {
    $sql .= ", alamat = :alamat";
}
if (!empty($newKontak)) {
    $sql .= ", kontak = :kontak";
}
if (!empty($newJam)) {
    $sql .= ", jam = :jam";
}

$sql .= " WHERE latitude = :lat AND longitude = :lng";

$stmt = $db->prepare($sql);
$stmt->bindParam(':lat', $lat);
$stmt->bindParam(':lng', $lng);
$stmt->bindParam(':newLng', $newLng);
$stmt->bindParam(':newLat', $newLat);
if (!empty($newNama)) {
    $stmt->bindParam(':nama', $newNama);
}
if (!empty($newDeskripsi)) {
    $stmt->bindParam(':deskripsi', $newDeskripsi);
}
if (!empty($newKategori)) {
    $stmt->bindParam(':kategori', $newKategori);
}
if (!empty($newRating)) {
    $stmt->bindParam(':rating', $newRating);
}
if (!empty($newAlamat)) {
    $stmt->bindParam(':alamat', $newAlamat);
}
if (!empty($newKontak)) {
    $stmt->bindParam(':kontak', $newKontak);
}
if (!empty($newJam)) {
    $stmt->bindParam(':jam', $newJam);
}

$response = array();
if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Data berhasil diperbarui';
    $response['data'] = $_POST;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Gagal memperbarui data';
}

header('Content-Type: application/json');
echo json_encode($response);