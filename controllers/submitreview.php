<?php
include 'connect.glob.php'; // Include your database connection

if (isset($_POST['submitreview'])) {
    $id_mapel = $_POST['idmapel'];
    $iduser = $_POST['iduser'];
    $review = $_POST['review'];

    // Insert review into database
    $query = "INSERT INTO review (idmapel, iduser, review) VALUES ('$id_mapel', '$iduser', '$review')";
    $result = $conn->query($query);

    if ($result) {
        echo "Ulasan berhasil ditambahkan!";
        header("location: ../root.php?page=components/detailcourse&id_mapel=$id_mapel");
    } else {
        echo "Gagal menambahkan ulasan: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>