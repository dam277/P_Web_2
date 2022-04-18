<?php
$bookList = array(
    "book1" => array(
        "image" => "../../../resources/book1.jpg",
        "name" => "livre1",
        "category" => "manga",
        "author" => "jean-marc",
        "editor" => "oui",
        "pages" => "678",
        "edition" => "2012",
        "average" => 4
    ),
    "book2" => array(
        "image" => "../../../resources/book2.jpg",
        "name" => "livre2",
        "category" => "roman",
        "author" => "Romain",
        "editor" => "oui",
        "pages" => "1987",
        "edition" => "2017",
        "average" => 4.3
    ),
    "book3" => array(
        "image" => "../../../resources/book3.jpg",
        "name" => "livre3",
        "category" => "manga",
        "author" => "Marie",
        "editor" => "non",
        "pages" => "611",
        "edition" => "2013",
        "average" => 4.5
    ),
    "book4" => array(
        "image" => "../../../resources/book4.jpg",
        "name" => "livre4",
        "category" => "manga",
        "author" => "jean-marc dutron",
        "editor" => "peut-être",
        "pages" => "678",
        "edition" => "2012",
        "average" => 2.6
    ),
    "book5" => array(
        "image" => "../../../resources/book5.jpg",
        "name" => "livre5",
        "category" => "roman",
        "author" => "patrick",
        "editor" => "sûrement",
        "pages" => "1000",
        "edition" => "1999",
        "average" => 1.2
    ),
    "book6" => array(
        "image" => "../../../resources/book6.jpg",
        "name" => "livre6",
        "category" => "livre",
        "author" => "jean-marc",
        "editor" => "oui",
        "pages" => "10",
        "edition" => "2012",
        "average" => 2.8
    )
);

$bookList = array_values($bookList);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ouvrages</title>
</head>

<body>
    <header>
        <?php
        //include("../../include/header.php");
        ?>
    </header>
    <main>
        <h1 class="text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">OUVRAGES</h1>

        <div class="flex">
            <!-- FILTRES -->
            <aside class="w-[20%]">
                filtres
            </aside>

            <!-- RECHERCHE DE LIVRES -->
            <div class="w-[80%] border-l-2 border-solid border-black">
                <div class="grid place-items-center">
                    <p>Rechercher par nom d'ouvrage, éditeur ou auteur</p>
                    <!-- BARRE DE RECHERCHE -->
                    <div class="relative w-[80%] h-[35px]">
                        <input class="absolute h-full w-full border-solid border-2 border-black" type="text" name="search" id="search">
                        <input class="absolute ml-[100%] w-[35px] h-[35px] border-solid border-2 border-black bg-cover bg-center cursor-pointer hover:bg-[#cdcdcd]" style="background-image: url('../../../resources/search.jpg');" type="button" value="">
                    </div>
                    <p>Resultat de la recherche :</p>
                    <p>X ouvrages trouvés</p>
                    <p>Filtres :</p>
                </div>

                <!-- LIVRES -->
                <?php
                $page;  //Page actuelle 

                //Regarde quelle page on est
                if ($_GET["page"]) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }

                //Defini le début de I (FOR) I = startI
                $startI = $page * 5 - 5;
                //Defini la fin de I (FOR) I < endI
                $endI = $page * 5;

                //Affiche les ouvrages
                for ($i = $startI; $i < $endI; $i++) {
                ?>

                    <!-- 1 LIVRE -->
                    <div class="outline outline-[2px] outline-offset-[0px] flex ">
                        <!-- IMAGE DE COUVERTURE -->
                        <img class="mx-[20px] py-[10px] pr-[10px] border-r-2 border-black border-solid w-[20%] xl:w-[15%] min-h-[300px]" src="<?= $bookList[$i]["image"] ?>" alt="">

                        <!-- INFORMATIONS SUR L'OUVRAGE -->
                        <div class="w-[40%]">
                            <p class="grid place-items-center"><?= $bookList[$i]["name"] ?></p>
                            <ul class="grid place-items-left bg-[#D3E0E3] border-solid border-2 border-black h-[82%] mr-[20px]">
                                <li class="ml-[10px]">Auteur : <?= $bookList[$i]["author"] ?></li>
                                <li class="ml-[10px]">Catégorie : <?= $bookList[$i]["category"] ?></li>
                                <li class="ml-[10px]">Pages : <?= $bookList[$i]["pages"] ?></li>
                                <li class="ml-[10px]">Editeur : <?= $bookList[$i]["editor"] ?></li>
                                <li class="ml-[10px]">Date d'édition : <?= $bookList[$i]["edition"] ?></li>
                            </ul>
                        </div>

                        <!-- MOYENNE + DETAILS + POST -->
                        <div class="w-[40%] grid place-items-center">
                            <P>Moyenne</P>
                            <div class="flex">
                                <?php

                                if ($bookList[$i]["average"] < 1.5) 
                                {
                                    $goldStars = 1;
                                } 
                                elseif ($bookList[$i]["average"] < 2.5) 
                                {
                                    $goldStars = 2;
                                } 
                                elseif ($bookList[$i]["average"] < 3.5) 
                                {
                                    $goldStars = 3;
                                } 
                                elseif ($bookList[$i]["average"] < 4.5) 
                                {
                                    $goldStars = 4;
                                } 
                                else 
                                {
                                    $goldStars = 5;
                                }
                                
                                //Affichage des images
                                for ($y = 0; $y < 5; $y++) 
                                {
                                    if ($y < $goldStars) 
                                    {
                                ?>
                                        <img class="mt-[-50px] w-[30px] h-[30px]" src="../../../resources/rateStarChecked.jpg" alt="Note">
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <img class="mt-[-50px] w-[30px] h-[30px]" src="../../../resources/rateStarNotChecked.jpg" alt="Note">
                                <?php
                                    }
                                }

                                ?>
                            </div>
                            <a class="grid place-items-center w-[60%] h-[75%] rounded-[20px] bg-[#3B4568] text-white lg:text-[20px] xl:text-[30px] hover:bg-[#262C42] cursor-pointer border-black border-solid border-2" href="">
                                <input class="cursor-pointer" type="button" value="Details">
                            </a>
                            <aside>Posté par :</aside>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </main>
    <footer>
        <?php
        //include("../../include/footer.php");
        ?>
    </footer>
</body>

</html>