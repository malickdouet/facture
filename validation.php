<?php
session_start();

if (count($_SESSION['bills']) < 3) {
    $_SESSION['bills'] = [
        '0' => [
            'reference' =>  'ref001',
            'designation' => 'Produit 1',
            'price' => '15',
            'quantity' => '2'
        ],
        '1' => [
            'reference' =>  'ref002',
            'designation' => 'Produit 2',
            'price' => '30',
            'quantity' => '4'
        ],
        '2' => [
            'reference' =>  'ref003',
            'designation' => 'Produit 3',
            'price' => '40',
            'quantity' => '5'
        ]
    ];
}

if (!empty($_POST)) {
    $data['reference'] = mt_rand(1, 200000);
    $data['designation'] = $_POST['designation'];
    $data['price'] = $_POST['price'];
    $data['quantity'] = $_POST['quantity'];
    $_SESSION['bills'][] = $data;
}


header('Location: ./index.php');
exit();