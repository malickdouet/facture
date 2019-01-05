<?php


$tableaux = [
    '0' => [
        'reference' =>  'ref001',
        'libelle' => 'Produit 1',
        'prix' => '15',
        'quantite' => '2'
    ],
    '1' => [
        'reference' =>  'ref002',
        'libelle' => 'Produit 2',
        'prix' => '30',
        'quantite' => '4'
    ],
    '2' => [
        'reference' =>  'ref003',
        'libelle' => 'Produit 3',
        'prix' => '40',
        'quantite' => '5'
    ]
];

$total_global = 0;

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
        background-color: #4CAF50;
        color: white;
        }

        div {
        border: 1px solid gray;
        padding: 8px;
        }

        h1 {
        text-align: center;
        text-transform: uppercase;
        color: #4CAF50;
        }


        a {
        text-decoration: none;
        color: #008CBA;
        }

        h3 {

        text-transform: uppercase;
        color: #4CAF50;

        }

        p {
        text-indent: 50px;
        text-align: center;
        letter-spacing: 3px;
        }

        a {
        text-decoration: none;
        color: #008CBA;
        }
    </style>
</head>
<body>
<h1><strong>Hyper </strong></h1>
<p>50 avenue jean jaures 94230 Cachan</p>
<p>0761154105</p>
<p>Date: 12/04/2019 </p>
<P>NUMERO DE FACTURE: vl22121212Z3</p>
<h4> CLIENT : GUINEE GAMES <h4>

    <table style="width:100%">
        <tr>
            <th>PRODUIT</th>
            <th>DESCRIPTION</th> 
            <th>QUANTITÉ</th>
            <th>PRIX UNITAIRE</th>
            <th>TOTAL</th>
        </tr>

        <?php foreach($tableaux as $produit => $details): ?>

        <?php
            $total = $details['quantite'] * $details['prix'];
            $total_global = $total_global + $total;

            // 0 + 30
            // 30 + 120
            // 150
        ?>
        <tr>
            <td><?php echo $details['reference']; ?></td>
            <td><?php echo $details['libelle']; ?></td> 
            <td><?php echo $details['prix'] . '€'; ?></td>
            <td><?php echo $details['quantite']; ?></td>
            <td><?php echo $total . '€' ?></td>
        </tr>
        <?php endforeach; ?>

    </table>
    <h3> TOTAL A PAYER: <?= $total_global; ?>€</h3>
</body>
</html>