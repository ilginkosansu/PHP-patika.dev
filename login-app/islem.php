<?php
error_reporting(0);
session_start();
include 'fonksiyon/helper.php';  //helper.php dosyasını dahil etme
$user = [
    'ilginkosansu' => [
        'password' => '190804',
        'eposta' => 'ilgin.kosansu@gmail.com',
        'name' => 'Ilgın',
        'surname' => 'Koşansu',
    ],
    'nazmiyekosansu' => [
        'password' => '654321',
        'eposta' => 'kosansunk@gmail.com',
        'name' => 'Nazmiye',
        'surname' => 'Koşansu',
    ],
    'olgunkosansu' => [
        'password' => '123456',
        'eposta' => 'olgun80kosansu@gmail.com',
        'name' => 'Olgun',
        'surname' => 'Koşansu',
    ],
];
if(getDegeri('islem') == 'giris') {  //get ile gelen deger giris degerine esitse
    $_SESSION['username'] = postDegeri('username'); //sayfa yenilense de kullanıcı adını session değerinde tutar
    $_SESSION['password'] = postDegeri('password');  //girilen bilgileri tekrar tekrar girmek durumunda kalmamak için

    if(!postDegeri('username')) { //post ile alınan deger username boş ise / false ise
        $_SESSION['error'] = "Lütfen kullanıcı adınızı girin";
        header('Location:login.php');
        exit();
    } elseif(!postDegeri('password')) { //islem hatasını session error mesajına atarız
        $_SESSION['error'] = "Lütfen kullanıcı şifrenizi girin";
        header('Location:login.php'); //islem1.php sayfasını boş açmaması için login ekranında kalman lazım
        exit();
    }else {
        //array için bizim yolladığımız username ait bir key var mı diye kontrol ediyoruz
        //post değerinden gelen username i user dizisinde arar
        if(array_key_exists(postDegeri('username'), $user)) { //username --> key degeri, array_key_exists de parametre olarak dizi alır
            //kayıtlı kullanıcı varsa şifresini kontrol edebiliriz
            if($user[postDegeri('username')]['password'] == postDegeri('password')) { //user dizisindeki posttan gelen username degeri ile posttan gelen password eşit mi
                $_SESSION['login'] = true; //oturum true
                $_SESSION['kullanici_adi'] = $user[postDegeri('username')]['name']." ".$user[postDegeri('username')]['surname'];//kullanici_adi adlı ssession bilgisi tutarız, post ile aldığımız username bilgisini ait ad soyad bilgileri
                $_SESSION['eposta'] = $user[postDegeri('username')]['eposta']; //posta bilgisini session ile tutarız, post ile aldığımız username e ait eposta bilgisi karşılık gelir
                header('Location:index.php');
                exit();
            }else {
                $_SESSION['error'] = "Kayıtlı kullanıcı bulunamadı";
                header('Location:login.php'); //islem1.php sayfasını boş açmaması için login ekranında kalman lazım
                exit();
            }
        }else {
            $_SESSION['error'] = "Kayıtlı kullanıcı bulunamadı";
            header('Location:login.php'); //islem1.php sayfasını boş açmaması için login ekranında kalman lazım
            exit();
        }
    }
}
if(getDegeri('islem') == 'hakkimda') { //get ile gelen deger hakkimda karsiligini aliyosa
    $hakkimda = postDegeri('hakkimda');
    $sonuc = file_put_contents('db/'.sessionDegeri('username').'.txt',htmlspecialchars($hakkimda));

    //file_put_contents ile o kullanıcı adında bir dosya oluşturursun ve içine eklenecek içeriği belirlersin

    if($sonuc) {
        header('Location:index.php?islem=true');
    }
    else {
        header('Location:index.php?islem=false');
    }
}

if(getDegeri('islem') == 'cikis') {
    session_destroy(); //yukarda zaten başlatmıştık -- session_start()
    session_start();
    $_SESSION['error'] = "Oturum sonlandırıldı!";
    header('Location:login.php');
}

//mod için kullanıcının seçimlerini hatırlayacak class yapısı oluşturmamız gerekiyor
if(getDegeri('islem') == 'renk') {
    setcookie('color' , getDegeri('color') , time() + (86400 * 360));
    //kullanıcı butona nereden tıkladıysa yine oraya yönlendirmesi gerekiyor
    header('Location:'.$_SERVER['HTTP_REFERER'] ?? 'index.php');
}

























