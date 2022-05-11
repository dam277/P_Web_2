<?php
$user = array(
    "idUser" => "1",
    "useNickName" => "Dyleinsh",
    "useEntryDate" => "04.05.2022",
    "usePermLevel" => "2",
    "usePasswordHash" => "mot de passe",
);

$nbBook = 1000;
$nbAppreciation = 0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="duration-[0.5s] dark:bg-gray-700 dark:text-gray-400">
    <header>
        <?php
        include("../../include/header.php");
        ?>
    </header>
    <h1 class="text-4xl md:text-6xl lg:text-8xl xl:text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">INFORMATIONS DU COMPTE</h1>
    <div class="">
        <div class="flex w-full mt-[50px] text-[15px] lg:text-[20px] md:text-[25px] lg:text-[28px] xl:text-[28px]">
            <ul class="grid w-[33%] mt-[15%] text-center">
                <li class="font-bold">Détails : <?= $user["useNickName"] ?></li>
                <li class="">Rôle : <?= $user["usePermLevel"] == 1 ? "Admin" : "Membre" ?></li>
            </ul>
            <img src="../../../resources/userLogo.png" class="w-[33%]">
            <ul class="grid w-[33%] text-center mt-[5%]">
                <li class="">Date d'inscription : <?= $user["useEntryDate"] ?></li>
                <li class="">Nombre d'appreciation<?= $nbAppreciation <= 1 ? "" : "s"?> : <?= $nbAppreciation ?></li>
                <li class="">Nombre d'ouvrage<?= $nbBook <= 1 ? "" : "s"?> posté<?= $nbBook <= 1 ? "" : "s"?> : <?= $nbBook ?></li>
            </ul>
        </div>
    </div>
    <footer>
        <?php
        include("../../include/footer.php");
        ?>
    </footer>
</body>

</html>
