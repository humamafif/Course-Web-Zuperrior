<?php
$query = "SELECT * from mapel";
$result = $conn->query($query);
$isAuthenticated = isset($_SESSION['authenticated']);

?>

<div class="container-xxl py-5" id="courses">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Courses</h1>
        </div>
        <!-- LINK TO PAGE DETAIL COURSE -->
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp mb-4" data-wow-delay="0.1s">
                    <a href="<?php echo $isAuthenticated ? 'root.php?page=components/detailcourse&id_mapel=' . $row['id_mapel'] : 'pages/login.php'; ?>"
                        class="text-decoration-none"
                        onclick="return checkLogin(<?php echo $isAuthenticated ? 'true' : 'false'; ?>)">
                        <div class="course-item bg-light rounded shadow-sm">
                            <div class="position-relative overflow-hidden rounded-top">
                                <!-- Make the image dynamic based on the course -->
                                <img class="img-fluid" src="assets/img/<?php echo $row['image_mapel'] ?>"
                                    alt="<?php echo $row['nama_mapel']; ?>"
                                    style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-2"><?php echo $row['nama_mapel']; ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function checkLogin(isAuthenticated) {
        if (!isAuthenticated) {
            alert("Please login first to access this course.");
            return false;
        }
        return true;
    }
</script>