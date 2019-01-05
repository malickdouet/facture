<?php
session_start();

if (empty($_SESSION['bills'])) {
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

$bills = $_SESSION['bills'];
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

        .error {
            color: red;
            font-size: 20px;
            font-weight: bold;
        }
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
    <?php if (!empty($bills)): ?>
        <h1><strong>Hyper </strong></h1>
        <p>50 avenue jean jaures 94230 Cachan</p>
        <p>0761154105</p>
        <p>Date: <?= date('d/m/Y') ?> </p>
        <P>NUMERO DE FACTURE: v<?= mt_rand(10000000, 300000000000000)?></p>
        <h4> CLIENT : GUINEE GAMES <h4>
        <table style="width:100%">
            <tr>
                <th>PRODUIT</th>
                <th>DESCRIPTION</th> 
                <th>QUANTITÉ</th>
                <th>PRIX UNITAIRE</th>
                <th>TOTAL</th>
            </tr>

            <?php foreach($bills as $produit => $details): ?>

            <?php
                $total = $details['quantity'] * $details['price'];
                $total_global = $total_global + $total;

                // 0 + 30
                // 30 + 120
                // 150
            ?>
            <tr>
                <td><?php echo $details['reference']; ?></td>
                <td><?php echo $details['designation']; ?></td>
                <td><?php echo $details['quantity']; ?></td>
                <td><?php echo $details['price'] . '€'; ?></td>
                <td><?php echo $total . '€' ?></td>
            </tr>
            <?php endforeach; ?>

        </table>
        <h3> TOTAL A PAYER: <?= $total_global; ?>€</h3>

    <?php else: ?>
    <p>Désolé mais aucun produit n'a encore été saisi</p>
    <?php endif; ?>



    <h2><strong>Saisie d'un nouveau produit</strong></h2>

    <?php if(!empty($_SESSION['errors'])): ?>
    <span class="error"><?= implode('<br>', $_SESSION['errors']); ?></span>
    <?php endif; ?>
    <form method="POST" action="./validation.php">
        <label>
            <span>Libelle</span>
            <input type="text" name="designation" value="<?php echo (!empty($_SESSION['data']['designation'])) ? $_SESSION['data']['designation'] : ''; ?>">
        </label>

        <label>
            <span>Quantité</span>
            <input type="text" name="quantity" value="<?php echo (!empty($_SESSION['data']['quantity'])) ? $_SESSION['data']['quantity'] : ''; ?>">
        </label>

        <label>
            <span>Price</span>
            <input type="text" name="price" value="<?php echo (!empty($_SESSION['data']['price'])) ? $_SESSION['data']['price'] : ''; ?>">
        </label>

        <input type="submit" name="Valider">
    </form>
</body>
</html>