<?php
session_start();
if($_SESSION["isConnected"] == false)
{
    header("location: errors/error403.php");
}

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
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
    <!-- TITRE -->
    <h1 class="text-4xl md:text-6xl lg:text-8xl xl:text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">INFORMATIONS DU COMPTE</h1>
    <!-- INFORMATION -->
    <div class="flex w-full mt-[50px] text-[15px] lg:text-[20px] md:text-[25px] lg:text-[28px] xl:text-[28px]">
        <ul class="grid w-[33%] mt-[15%] text-center">
            <li class="font-bold">Détails : <?= $_SESSION["userInfos"]["nickname"] ?></li>
            <li class="">Rôle : <?= $_SESSION["userInfos"]["permLevel"] == 1 ? "Membre" : "Admin" ?></li>
        </ul>
        <img src="../../../resources/userLogo.png" class="w-[33%]">
        <ul class="grid w-[33%] text-center mt-[15%]">
            <li class="">Date d'inscription : <?= $_SESSION["userInfos"]["entryDate"] ?></li>
            <li class="">Nombre d'ouvrage<?= $_SESSION["userInfos"]["books"] <= 1 ? "" : "s" ?> posté<?= $_SESSION["userInfos"]["books"] <= 1 ? "" : "s" ?> : <?= $_SESSION["userInfos"]["books"] ?></li>
        </ul>
    </div>
    <footer>
        <?php
        include("../../include/footer.php");
        ?>
    </footer>
</body>

</html>