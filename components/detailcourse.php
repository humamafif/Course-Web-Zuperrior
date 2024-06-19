<?php
// session_start();
$iduser = $_SESSION['id_user'];

if (isset($_GET['id_mapel'])) {
    $id_mapel = $_GET['id_mapel'];
    $query = "SELECT m.*, s.* from mapel m INNER JOIN silabus s on m.id_mapel = s.id_mapel where m.id_mapel = $id_mapel";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
} else {
    echo "id_mapel not provided.";
    exit();
}



function getYouTubeEmbedUrl($url)
{
    $parsedUrl = parse_url($url);
    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $queryParams);
        return 'https://www.youtube.com/embed/' . $queryParams['v'];
    }
    return $url;
}
$reviewQuery = "SELECT r.*, u.*
                FROM review r 
                 JOIN user u ON r.iduser = u.id_user 
                WHERE r.idmapel = $id_mapel";
$reviewResult = $conn->query($reviewQuery);
if (!$reviewResult) {
    echo "Error";
}
?>

<!-- DETAIL COURSE Start -->
<div class="container-xxl my-4 py-2" id="about">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <iframe class="img-fluid position-absolute w-100 h-100" style="object-fit: cover;"
                        src="<?php echo getYouTubeEmbedUrl($row['video']); ?>" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-4"><?php echo $row['nama_mapel']; ?></h1>
                <!-- INI DESKRIPSI COURSE NYA -->
                <p class="mb-4"><?php echo $row['keterangan']; ?></p>

                <!-- BUTTON UNTUK MENDAPATKAN MODULE -->
                <?php
                if ($row['file'] != null) {
                    echo "<a href='./assets/data/" . $row['file'] . "' class='btn btn-primary'>Download Modul</a>";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- DETAIL COURSE End -->

<!-- ULASAN FORM Start -->
<div class="container-xxl my-4 py-2">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="mb-4">Review</h2>
                <form action="controllers/submitreview.php" method="post">
                    <input type="hidden" value="<?php echo $iduser; ?>" name="iduser">
                    <input type="hidden" value="<?php echo $row['id_mapel']; ?>" name="idmapel">
                    <div class="form-group mb-3">
                        <textarea class="form-control" id="review" name="review" rows="4" required></textarea>
                    </div>
                    <input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>">
                    <button type="submit" class="btn btn-success" name="submitreview">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ULASAN FORM End -->

<!-- ULASAN LIST Start -->
<div class="container-xxl my-4 py-2">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="mb-4">Ulasan</h2>
                <?php if ($reviewResult->num_rows > 0) { ?>
                    <?php while ($review = $reviewResult->fetch_assoc()) { ?>
                        <div class="border rounded p-3 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <!-- <img src="path/to/default/profile/pic.png" alt="Profile Picture"
                                        class="rounded-circle shadow" style="width: 55px;"> -->
                                </div>
                                <div>
                                    <h4><?php echo htmlspecialchars($review['username']); ?></h4>
                                </div>
                            </div>
                            <p class="mt-3"><?php echo htmlspecialchars($review['review']); ?></p>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p>Belum ada ulasan untuk kursus ini.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- ULASAN LIST End -->