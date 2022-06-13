<?php
if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['type'])) {
    return header('Location: index', true);
}
require 'functions.php';
// header("Location: /");


if (isset($_POST['submit'])) {
    $PATH = explode("?", $_SERVER['REQUEST_URI'])[0];

    // Jika panjang password kurang dari 8
    if (strlen($_POST['password']) < 8) {
        return header("Location: $PATH?messageType=error&message=Panjang+Password+Minimal+Adalah+8");
    }

    // Panjang maximal adalah 50
    if (strlen($_POST['password']) > 50) {
        return header("Location: $PATH?messageType=error&message=Panjang+Password+Maximal+Adalah+50");
    }

    // Jika panjang username kurang dari 8
    if (strlen($_POST['username']) < 5) {
        return header("Location: $PATH?messageType=error&message=Panjang+Username+Minimal+Adalah+5");
    }

    // Jika panjang username Lebih dari 20
    if (strlen($_POST['username']) > 20) {
        return header("Location: $PATH?messageType=error&message=Panjang+Username+Maximal+Adalah+20");
    }

    // Jika email sudah terdaftar
    if (count(detailData('tb_user', 'username', $_POST['username'])) > 0) {
        return header("Location: $PATH?messageType=error&message=Email+Telah+terdaftar");
    }


    $passwordHASH = hash("sha256", $_POST['password']);
    $query = "INSERT INTO tb_user VALUES ('" . $_POST['username'] . "', '$passwordHASH', 'USER')";
    
    if (mysqli_query($conn, $query)) {
        return header("Location: $PATH?messageType=success&message=Berhasil+Mendaftar");
    } else {
        return header("Location: $PATH?messageType=error&message=Gagal+Menambahkan+Data");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
    <div class="container-fluid bg-dark min-vh-100">
        <div class="row align-items-center justify-content-center pt-5">
            <div class="col-xl-5">
                <div class="card bg-white p-2">
                    <form action="" method="POST">
                        <div class="card-header">
                            <h1 class="h5">Create a new account to use this service</h1>
                        </div>
                        <div class="card-body">

                            <?php
                            if (isset($_GET['message']) && isset($_GET['messageType'])) :
                            ?>
                                <div class="alert alert-<?= ($_GET['messageType'] == "error") ? "danger" : "success"  ?>" role="alert">
                                    <?= $_GET['message']; ?>
                                    <?php 
                                        if ($_GET['messageType'] == "success") :
                                    ?>
                                        <a href="login">Klik disini untuk pergi ke halaman login</a>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                            <div class="form-group">
                                <label for="InputEmail1">Username</label>
                                <input name="username" required type="text" class="form-control" id="Inputusername1" aria-describedby="usernameHelp">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input name="password" required type="password" class="form-control" id="InputPassword1">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Register</button>
                            <p class="my-3">sudah mempunyai akun ? <a href="login">klik disini</a> untuk login</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>

</html>