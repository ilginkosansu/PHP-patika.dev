<?php
session_start();
function getDegeri($get) {
    if($_GET[$get]){
        return trim($_GET[$get]);
    }else {
        return false;
    }
}
function postDegeri($post) {
    if($_POST[$post]){
        return trim($_POST[$post]);
    }else {
        return false;
    }
}
function sessionDegeri($session) {
    if($_SESSION[$session]){
        return trim($_SESSION[$session]);
    }else {
        return false;
    }
}
function cookieDegeri($cookie) {
    if($_COOKIE[$cookie]){
        return trim($_COOKIE[$cookie]);
    }else {
        return false;
    }
}