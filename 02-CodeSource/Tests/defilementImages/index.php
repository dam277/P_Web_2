<?php
$bookList = array (
    "book1" => "book1.jpg",
    "book2" => "book2.jpg",
    "book3" => "book3.jpg",
    "book4" => "book4.jpg",
    "book5" => "book5.jpg",
)
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="defilement.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>TEST - Défilement images</title>
</head>
<body onload="onLoad('<?=$bookList['book1']?>', '<?=$bookList['book2']?>', '<?=$bookList['book3']?>', '<?=$bookList['book4']?>', '<?=$bookList['book5']?>')">
    <input type="button" id="left" onclick="moveLeft()" value="Gauche"></input>

    <ul>
        <li>
            <img style="height: 250px; width: 250px" src="<?= $bookList['book1'] ?>" id="book1">
        </li>
        <li>
            <img style="height: 250px; width: 250px" src="<?= $bookList['book2'] ?>" id="book2">
        </li>
        <li>
            <img style="height: 250px; width: 250px" src="<?= $bookList['book3'] ?>" id="book3">
        </li>
    </ul>

    <input type="button" id="right" onclick="moveRight()" value="Droite"></input>

</body>
</html>

<script src="defilement.js"></script>