<?php
$query = "SELECT * from mapel";
$result = $conn->query($query);

// Check if user is authenticated
$isAuthenticated = isset($_SESSION['authenticated']);
?>

<div class="container-xxl py-5" id="courses">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <!-- LINK TO PAGE DETAIL COURSE -->
        <div class="d-flex flex-wrap">
            <?php
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                if ($counter >= 3) {
                    break; // Exit loop after 3 items
                }
                $counter++;
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp mb-4 mx-auto px-2" data-wow-delay="0.1s">
                    <a href="<?php echo $isAuthenticated ? 'root.php?page=components/detailcourse&id_mapel=' . $row['id_mapel'] : 'pages/login.php'; ?>"
                        class="text-decoration-none"
                        onclick="return checkLogin(<?php echo $isAuthenticated ? 'true' : 'false'; ?>)">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="assets/img/<?php echo $row['image_mapel'] ?>" alt=""
                                    style="width: 100%; height: 150px; object-fit: cover;">
                            </div>
                            <div class="text-center p-2 pb-2">
                                <h5 class="mb-2"><?php echo $row['nama_mapel'] ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="w-100 d-flex justify-content-center mb-4">
            <a href="root.php?page=components/listCourse"
                class="flex-shrink-0 btn btn-sm btn-primary px-4 py-2 border-end" style="border-radius: 15px;">Read
                More</a>
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