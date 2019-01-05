<?php
session_start();

if (!empty($_POST)) {
    $_SESSION['data']['designation'] = $_POST['designation'];
    $_SESSION['data']['price'] = is_numeric($_POST['price']) ? (float)$_POST['price'] : $_POST['price']; // "23.4" ou  23.4 => 23.4
    $_SESSION['data']['quantity'] = is_numeric($_POST['quantity']) ? (int)$_POST['quantity'] : $_POST['quantity']; // "23" ou  23 => 23
    
    $_SESSION['errors'] = [];

    if (empty($_SESSION['data']['designation'])) {
        $_SESSION['errors']['designation'] = 'Veuillez saisir une désignation';
    }
    
    if (!is_int($_SESSION['data']['quantity'])) {
        $_SESSION['errors']['quantity'] = 'Veuillez vérifier la quantité SVP';
    }
    
    if (!is_float($_SESSION['data']['price'])) {
        $_SESSION['errors']['price'] = 'Veuillez vérifier le prix SVP';
    } 
    
    if (empty($_SESSION['errors'])) {
        $_SESSION['data']['reference'] = mt_rand(1, 200000);
        $_SESSION['bills'][] = $_SESSION['data'];
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    }
}

header('Location: ./index.php');
exit();