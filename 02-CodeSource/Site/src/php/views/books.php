<?php
$page;  //Page actuelle 

//Regarde quelle page on est
if ($_GET["page"]) 
{
    $page = $_GET["page"];
} 
else 
{
    header("location: books.php?page=1");
}

$bookList = array
(
    "book1" => array
    (
        "image" => "../../../resources/book1.jpg",
        "name" => "livre1",
        "category" => "manga",
        "author" => "jean-marc",
        "editor" => "oui",
        "pages" => "678",
        "edition" => "2012",
        "average" => 4
    ),
    "book2" => array
    (
        "image" => "../../../resources/book2.jpg",
        "name" => "livre2",
        "category" => "roman",
        "author" => "Romain",
        "editor" => "oui",
        "pages" => "1987",
        "edition" => "2017",
        "average" => 4.3
    ),
    "book3" => array
    (
        "image" => "../../../resources/book3.jpg",
        "name" => "livre3",
        "category" => "manga",
        "author" => "Marie",
        "editor" => "non",
        "pages" => "611",
        "edition" => "2013",
        "average" => 4.8
    ),
    "book4" => array
    (
        "image" => "../../../resources/book4.jpg",
        "name" => "livre4",
        "category" => "manga",
        "author" => "jean-marc dutron",
        "editor" => "peut-être",
        "pages" => "678",
        "edition" => "2012",
        "average" => 2.6
    ),
    "book5" => array
    (
        "image" => "../../../resources/book5.jpg",
        "name" => "livre5",
        "category" => "roman",
        "author" => "patrick",
        "editor" => "sûrement",
        "pages" => "1000",
        "edition" => "1999",
        "average" => 1.2
    ),
    "book6" => array
    (
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

        <!-- FORMULAIRE COMPRENANT TOUTE LA PAGE -->
        <form method="POST" action="test.php" class=" md:flex lg:flex xl:flex">
            <!-- FILTRES -->
            <aside class="w-[100%] md:w-[20%] lg:w-[20%] xl:w-[20%]">
                <div class="grid place-items-center">
                    <h2 class="text-[40px]">FILTRES</h2>
                    <div class="w-[25%] border-black border-2 border-solid"></div>
                </div>

                <!-- MOYENNE -->
                <input type="button" value="Moyenne [+]" class="text-center mt-[10px] test bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s]">
                <div class="bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <ul>
                        <!-- NOTE 1 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note1" id="note1">
                            <label for="note1">1</label>
                        </li>
                        <!-- NOTE 1.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note1-5" id="note1-5">
                            <label for="note1-5">1.5</label>
                        </li>
                        <!-- NOTE 2 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note2" id="note2">
                            <label for="note2">2</label>
                        </li>
                        <!-- NOTE 2.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note2-5" id="note2-5">
                            <label for="note2-5">2.5</label>
                        </li>
                        <!-- NOTE 3 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note3" id="note3">
                            <label for="note3">3</label>
                        </li>
                        <!-- NOTE 3.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note3-5" id="note3-5">
                            <label for="note3-5">3.5</label>
                        </li>
                        <!-- NOTE 4 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note4" id="note4">
                            <label for="note4">4</label>
                        </li>
                        <!-- NOTE 4.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note4-5" id="note4-5">
                            <label for="note4-5">4.5</label>
                        </li>
                        <!-- NOTE 5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-b-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="note5" id="note5">
                            <label for="note5">5</label>
                        </li>
                    </ul>
                </div>

                <!-- CATEGORIES -->
                <input type="button" value="Catégorie [+]" class="text-center mt-[10px] test bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s]">
                <div class="bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <ul>
                        <!-- MANGA -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px]  border-solid">
                            <input class="ml-[10px]" type="checkbox" name="manga" id="manga">
                            <label for="manga">Manga</label>
                        </li>
                        <!-- BANDE DESSINEE -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px]  border-solid">
                            <input class="ml-[10px]" type="checkbox" name="BD" id="BD">
                            <label for="BD">Bande dessinée</label>
                        </li>
                        <!-- ROMAN -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px]  border-solid">
                            <input class="ml-[10px]" type="checkbox" name="roman" id="roman">
                            <label for="roman">Roman</label>
                        </li>
                        <!-- LIVRE -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-b-[1px] border-solid">
                            <input class="ml-[10px]" type="checkbox" name="book" id="book">
                            <label for="book">Livre</label>
                        </li>
                    </ul>
                </div>

                <!-- PAGES -->
                <input type="button" value="Pages [+]" class="text-center mt-[10px] test bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s]">
                <div class="bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <div class="grid place-items-center text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-[1px] border-solid">
                        <!-- MIN -->
                        <label for="minPages">Min</label>
                        <input class="mt-[10px] w-[70px] border-2 border-solid border-black rounded-[5px]" type="number" name="minPages" id="minPages" value="">
                        <!-- MAX -->
                        <label for="maxPages">Max</label>
                        <input class="mt-[10px] w-[70px] border-2 border-solid border-black rounded-[5px]" type="number" name="maxPages" id="maxPages" value="">
                    </div>
                </div>

                <!-- EDITION -->
                <input type="button" value="Edition [+]" class="text-center mt-[10px] test bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s]">
                <div class="mb-[10px] bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <div class="grid place-items-center  text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-[1px] border-solid">
                        <!-- ANNEE D'EDITION -->
                        <label for="edition" class="underline">Année d'édition</label>
                        <input class="mt-[10px] w-[70px] border-2 border-solid border-black rounded-[5px]" type="number" name="edition" id="edition" value="">
                    </div>
                </div>
            </aside>

            <!-- RECHERCHE DE LIVRES -->
            <div class="w-[100%] border-2 md:w-[80%] lg:w-[80%] xl:w-[80%] md:border-l-2 lg:border-l-2 xl:border-l-2 border-solid border-black">
                <div class="grid place-items-center">
                    <label for="searchBar">Rechercher par nom d'ouvrage, éditeur ou auteur</label>
                    <!-- BARRE DE RECHERCHE -->
                    <div class="relative w-[80%] h-[35px]">
                        <input class="absolute h-full w-full border-solid border-2 border-black" type="text" name="searchBar" id="searchBar">
                        <input class="absolute ml-[100%] w-[35px] h-[35px] border-solid border-2 border-black bg-cover bg-center cursor-pointer hover:bg-[#cdcdcd]" style="background-image: url('../../../resources/search.jpg');" id="submit" type="submit" value="">
                    </div>
                    <p>Resultat de la recherche :</p>
                    <p><?= count($bookList) ?> ouvrages trouvés</p>
                    <p>Filtres :</p>
                </div>

                <!-- LIVRES -->
                <?php
                //Defini le début de I (FOR) I = startI
                $startI = $page * 5 - 5;
                //Defini la fin de I (FOR) I < endI
                $endI = $page * 5;

                //Affiche les ouvrages
                for ($i = $startI; $i < $endI; $i++) 
                {
                    if (!isset($bookList[$i])) 
                    {
                        # Arret de l'affichage
                    } 
                    else 
                    {
                ?>
                        <!-- 1 LIVRE -->
                        <div class="outline outline-[2px] outline-offset-[0px] flex ">
                            <!-- IMAGE DE COUVERTURE -->
                            <div class="w-[40%] md:w-[30%] lg:w-[30%] xl:w-[30%] mx-[20px] py-[10px] pr-[10px] border-r-2 border-black border-solid xl:w-[15%] min-h-[300px]">
                                <p class="grid place-items-center block md:hidden lg:hidden xl:hidden">
                                    <?= $bookList[$i]["name"] ?>
                                    <br>
                                    Auteur : <?= $bookList[$i]["author"] ?>
                                    <hr class="mb-[5px] block md:hidden lg:hidden xl:hidden">
                                </p>
                                <img src="<?= $bookList[$i]["image"] ?>" alt="">
                            </div>

                            <!-- INFORMATIONS SUR L'OUVRAGE -->
                            <div class="w-[30%] hidden md:block lg:block xl:block">
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
                            <div class="w-[50%] grid place-items-center">
                                <P>Moyenne</P>
                                <div class="flex">
                                    <?php

                                    //Defini le nombre d'étoiles à afficher
                                    if ($bookList[$i]["average"] < 1.25) 
                                    {
                                        $goldStars = 1;
                                    } 
                                    elseif ($bookList[$i]["average"] < 1.75) 
                                    {
                                        $goldStars = 1.5;
                                    } 
                                    elseif ($bookList[$i]["average"] < 2.25) 
                                    {
                                        $goldStars = 2;
                                    } 
                                    elseif ($bookList[$i]["average"] < 2.75) 
                                    {
                                        $goldStars = 2.5;
                                    } 
                                    elseif ($bookList[$i]["average"] < 3.25) 
                                    {
                                        $goldStars = 3;
                                    } 
                                    elseif ($bookList[$i]["average"] < 3.75) 
                                    {
                                        $goldStars = 3.5;
                                    } 
                                    elseif ($bookList[$i]["average"] < 4.25) 
                                    {
                                        $goldStars = 4;
                                    } 
                                    elseif ($bookList[$i]["average"] < 4.75) 
                                    {
                                        $goldStars = 4.5;
                                    } 
                                    else 
                                    {
                                        $goldStars = 5;
                                    }

                                    //Affichage des étoiles
                                    for ($y = 0; $y < 5; $y++) 
                                    {
                                        if ($y < $goldStars) 
                                        {
                                            if ($y + 0.5 == $goldStars) 
                                            {
                                    ?>
                                                <img class="mt-[-40px] w-[30px] h-[30px]" src="../../../resources/rateStarSemiChecked.jpg" alt="Note">
                                            <?php
                                            } 
                                            else 
                                            {
                                            ?>
                                                <img class="mt-[-40px] w-[30px] h-[30px]" src="../../../resources/rateStarChecked.jpg" alt="Note">
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        } 
                                        else 
                                        {
                                        ?>
                                            <img class="mt-[-40px] w-[30px] h-[30px]" src="../../../resources/rateStarNotChecked.jpg" alt="Note">
                                    <?php
                                        }
                                    }

                                    ?>
                                </div>
                                <a class="grid place-items-center w-[60%] h-[75px] rounded-[20px] bg-[#3B4568] text-white lg:text-[20px] xl:text-[30px] hover:bg-[#262C42] cursor-pointer border-black border-solid border-2" href="">
                                    <input class="cursor-pointer" type="button" value="Details">
                                </a>
                                <aside>Posté par :</aside>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="grid place-items-center">
                    <!-- NAVIGATION DES PAGES -->
                    <nav class="flex mt-[30px] mb-[30px]">
                        <?php
                        //Defini si c'est la première page trouvable 
                        //Si oui, affiche un bouton non cliquable
                        if($_GET["page"] == 1)
                        {
                        ?>
                            <!-- Bouton de retour => ALler une page en arrière non actif -->
                            <input style="background-image: url('../../../resources/left.jpg');" class="mr-[20px] text-right bg-left bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pr-[10px] border-2 rounded-[15px] w-[150px] h-[45px] opacity-50 cursor-not-allowed" type="button" value="Retour">
                        <?php
                        }
                        //Sinon, affiche un bouton cliquable
                        else
                        {
                        ?>
                            <!-- Bouton de retour => ALler une page en arrière actif -->
                            <a href="books.php?page=<?= $_GET["page"] - 1 ?>">
                                <input style="background-image: url('../../../resources/left.jpg');" class="mr-[20px] text-right bg-left bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pr-[10px] border-2 rounded-[15px] w-[150px] h-[45px] hover:bg-[#3C466A] cursor-pointer" type="button" value="Retour">
                            </a>
                        <?php
                        }
                        ?>
                        

                        <?php
                        //Defini si le "deuxième" bouton [1] devrait s'afficher
                        if ($_GET["page"] < 4) 
                        {

                        } 
                        else 
                        {
                        ?>
                            <!-- Bouton de page détérminée -->
                            <a href="books.php?page=<?= 1 ?>">
                                <input class="mr-[1px] text-white bg-[#4B5987] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[45px] w-[45px]" type="button" value="<?= 1 ?>">
                            </a>
                            <?php
                        }

                        $x = 0;                      //Début de la boucle
                        $lastPage = ceil(count($bookList) /*100*/ / 5);    //Dernière page en fonction de la liste de livres
                        //Boucle permettant d'afficher le nombre de boutons adéquat 
                        while ($x < count($bookList) /*100*/ / 5 && $x < $_GET["page"] + 2) 
                        {
                            //Test pour savoir si x est plus petit que le numéro de page - 3
                            //Si oui, augmente juste le nombre, afin de n'afficher que 2 nombres en dessus et en dessous de la page actuelle
                            if ($x < $_GET["page"] - 3)
                            {
                                $x++;
                            }
                            //Sinon, affiche les boutons autour de la page actuelle
                            else 
                            {
                                $x++;   //Augmentation de x

                                //Defini si x est egal au numéro de page
                                //Si oui, affiche le même bouton, mais avec une couleur plus claire
                                if ($x != $_GET["page"]) 
                                {
                            ?>
                                    <!-- Bouton de page détérminée -->
                                    <a href="books.php?page=<?= $x ?>">
                                        <input class="text-white bg-[#4B5987] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[45px] w-[45px]" type="button" value="<?= $x ?>">
                                    </a>
                                <?php
                                }
                                //Sinon affiche un bouton avec une couleur plus foncée
                                else 
                                {
                                ?>
                                    <!-- Bouton de page active -->
                                    <a href="books.php?page=<?= $x ?>">
                                        <input class="text-white bg-[#677ABA] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[45px] w-[45px]" type="button" value="<?= $x ?>">
                                    </a>
                            <?php
                                }
                            }
                        }

                        //Defini si le "deuxième" bouton ["dernière page"] devrait s'afficher
                        if ($x > $lastPage - 1) 
                        {

                        } 
                        else 
                        {
                            ?>
                            <!-- Bouton de dernière page détérminée -->
                            <a href="books.php?page=<?= $lastPage ?>">
                                <input class="ml-[1px] text-white bg-[#4B5987] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[45px] w-[45px]" type="button" value="<?= $lastPage ?>">
                            </a>
                        <?php
                        }
                        //Defini si c'est la dernière page trouvable 
                        //Si non, affiche un bouton cliquable
                        if ($_GET["page"] < $x) 
                        {
                        ?>
                            <!-- Bouton de page suivante => ALler une page en avant actif-->
                            <a href="books.php?page=<?= $_GET["page"] + 1 ?>">
                                <input style="background-image: url('../../../resources/right.jpg');" class="ml-[20px] text-left bg-right bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pl-[10px] border-2 rounded-[15px] w-[150px] h-[45px] hover:bg-[#3C466A] cursor-pointer" type="button" value="Suivant">
                            </a>
                        <?php
                        }
                        //Sinon, affiche un bouton non cliquable
                        else 
                        {
                        ?>
                            <!-- Bouton de page suivante => ALler une page en avant non actif -->
                            <input style="background-image: url('../../../resources/right.jpg');" class="ml-[20px] text-left bg-right bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pl-[10px] border-2 rounded-[15px] w-[150px] h-[45px] opacity-50 cursor-not-allowed" type="button" value="Suivant">
                        <?php
                        }
                        ?>
                    </nav>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <?php
        //include("../../include/footer.php");
        ?>
    </footer>
</body>

</html>

<script src="../../js/filterMenus.js"></script>