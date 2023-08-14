<?php
include 'fonksiyon/helper.php';
error_reporting(0);
   //session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Giriş Yap</title>
    <style>
        body.bg-dark{
            background: #181818!important;
        }
    </style>
</head>
<body class="<?= cookieDegeri('color') ? cookieDegeri('color') : 'bg-dark'; ?>">
<div class="d-flex align-items-center justify-content-center p-4"><img height="" src="kodl.png" alt=""></div>
<div  class="container d-flex align-items-center justify-content-center">
    <div class="card <?= cookieDegeri('color') ? cookieDegeri('color') : 'bg-dark'; ?>" style="width: 18rem;">
        <div class="card-header bg-primary">
            Giriş Yap
        </div>
        <div class="card-body">
            <?php if(sessionDegeri('error')): ?>
            <div class="alert alert-danger"><?= sessionDegeri('error')?></div> <!--session fonk gelen deger varsa hatayı yazdır yoksa null -->
            <?php endif; ?>
            <form action="islem.php?islem=giris" method="post"> <!--form değerinden işlemi gönderirken aldığı parametre islem=giris-->
                <label for="username" class="text-success">Kullanıcı Adınız</label>
                <input type="text" name="username" value="<?= sessionDegeri('username') ?>" class="form-control">
                <label for="password" class="text-success">Şifreniz</label>
                <input type="text" name="password" value="<?= sessionDegeri('password') ?>" class="form-control mb-4">
                <button class="btn btn-success mb-4 w-100">Giriş Yap</button>
            </form>
        </div>
        <div class="card-footer bg-info d-flex align-items-center justify-content-between">
            <a href="islem.php?islem=renk&color=bg-light" class="btn btn-sm btn-light">Light Mod</a>
            <a href="islem.php?islem=renk&color=bg-dark" class="btn btn-sm btn-dark">Dark Mod</a>
        </div>
    </div>
</div>
</body>
</html>
<?php
    $_SESSION['error'] = null; //aynı hata mesajının ekranda kalmaması için session değeri null
    $_SESSION['username'] = null; //sayfa yenilendiğinde girilen bilgiler de gitmiş olsun
    $_SESSION['password'] = null;  //null olmazsa her yenilendiğinde girilen bilgiler de gelir

?>
