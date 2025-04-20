<?php
session_start();
include "connection.php";

// Eğer admin zaten giriş yapmışsa, admin sayfasına yönlendir
if (isset($_SESSION["adminLogin"])) {
    header("Location: admin.php");
    exit();
}

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $login = $db->prepare("SELECT * FROM admins WHERE username = :username");
    $login->bindParam(":username", $username, PDO::PARAM_STR);
    $login->execute();

    if ($login->rowCount() > 0) {
        $admin = $login->fetch(PDO::FETCH_ASSOC);

        if ($password == $admin['password']) {
            $_SESSION["adminLogin"] = true;
            header("Location: admin.php");
            exit();
        }
    }
    $errorMessage = "Hatalı Giris!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Kitapça</title>
</head>
<body>
    <?php include 'oto/navbar.php'; ?>

    <main style="height: calc(100vh - 100px); display: flex; justify-content: center; align-items: center;">
        <div class="kitapDiv1" style="height: calc(32rem + 40px); width: 28rem;">
            <div class="kitapDiv2" style="height: 32rem; width: 28rem;">
                <h1 style="margin: 0;">Admin Girisi</h1>
                <form action="" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="kitaplarOptions">Kullanıcı Adı : <input type="text" name="username" required></div>
                    <div class="kitaplarOptions">Parola : <input type="password" name="password" required></div>
                    <input type="submit" value="Giris Yap" name="login" style="margin-top: 1rem;">
                </form>
                <?php
                if (isset($errorMessage)) {
                    echo "<h3 style='color: red; margin-top: 1rem;'>$errorMessage</h1>";
                }
                ?>
            </div>
            <div style="background-color: #00b3b3; height: 40px; width: 24px;"></div>
        </div>
    </main>
</body>
</html>
