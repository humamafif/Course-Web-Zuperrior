<?php
function displayErrorMessage($error)
{
    switch ($error) {
        case 'InvalidCredentials':
            echo '<div class="alert alert-danger" role="alert">Username or password is incorrect.</div>';
            break;
        case 'UserNotFound':
            echo '<div class="alert alert-danger" role="alert">User not found.</div>';
            break;
        default:
            break;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Zuperrior</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <style>
        * {
            scrollbar-width: none;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center " style="min-height: 100vh;">
        <div class="container w-50 border rounded-3 border-2 p-4 border-primary">
            <h1 class="text-center mb-4 text-primary">Form Login</h1>
            <!-- Display error message if any -->
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                displayErrorMessage($error);
            }
            ?>
            <form method="GET" action="../controllers/action.user.php">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                                required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="register.php">Don't have an account?</a>
                    </div>
                    <input class="btn btn-primary w-100 py-3" type="submit" name="buttonlogin" value="Login">
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

</body>

</html>