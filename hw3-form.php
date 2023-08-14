<?php
function sayiyiKontrolEt($number) {
    $userInput = $_POST['number'];
    if($userInput % 3 == 0) {
        echo $userInput." sayısı 3'e bölünebilir.";
    }
    else {
        $enYakini = $userInput;
        $enYakini++;
        while ($enYakini % 3 !== 0) {
            $enYakini++;
        }
        echo $userInput." sayısı 3'e tam bölünemez. Bölünebilecek en yakın sayı: ".$enYakini;
    }
}
if(isset($_POST['number'])) {
    sayiyiKontrolEt($_POST['number']);
}
