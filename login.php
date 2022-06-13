<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['type'])) {
    return header('Location: index', true);
}
require 'functions.php';

if (isset($_POST['submit'])) {
    $PATH = explode("?", $_SERVER['REQUEST_URI'])[0];
    $passwordHASH = hash("sha256", $_POST['password']);

    $query = "SELECT * FROM tb_user WHERE username='" . $_POST['username'] . "' AND password = '" . $passwordHASH . "'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

    // Jika tidak ditemukan
    if ($result == null) {
        return header("Location: $PATH?messageType=error&message=Account+Tidak+Ditemukan");
    }


    // Jika ditemukan 
    session_start();
    $_SESSION['username'] = $result['username'];
    $_SESSION['password'] = $result['password'];
    $_SESSION['type'] = $result['type'];

    return header("Location: $PATH?messageType=success&message=Berhasil+Login");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <form action="" method="post">
                        <div class="card-header">
                            <h1 class="h5">Login to your account</h1>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['message']) && isset($_GET['messageType'])) :
                            ?>
                                <div class="alert alert-<?= ($_GET['messageType'] == "error") ? "danger" : "success"  ?>" role="alert">
                                    <?= $_GET['message']; ?>.
                                    <?php
                                    if ($_GET['messageType'] == "success") :
                                    ?>
                                        Akan berpindah kehalaman dashboard dalam <span id="messageDetik">3</span> detik
                                        <script>
                                            let idx = 2;
                                            const updateStatus = setInterval((detik) => {
                                                document.getElementById('messageDetik').textContent = idx--;
                                            }, 1000, 2);
                                            setTimeout(() => {
                                                clearInterval(updateStatus);
                                                window.location = 'index.php';
                                            }, 3000)
                                        </script>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                            <div class="form-group">
                                <label for="InputUsername1">Username</label>
                                <input name="username" required type="text" class="form-control" id="InputUsername1" aria-describedby="UsernameHelp">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input name="password" required type="password" class="form-control" id="InputPassword1">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Login</button>
                            <p class="my-3">belum mempunyai akun ? <a href="register">klik disini</a> untuk daftar</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>

</html>