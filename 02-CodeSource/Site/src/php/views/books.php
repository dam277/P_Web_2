<?php
session_start();
require_once(__DIR__."/../models/Book.php");
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
$books = $_SESSION["books"];
?>

<!-- <pre>
    <?=var_dump($_SESSION)?>
</pre> -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ouvrages</title>
</head>

<body class="dark:bg-gray-700 dark:text-gray-400 duration-[0.5s]">
    <header>
        <?php
        include("../../include/header.php");
        ?>
    </header>
    <main>
<!-- #region Titre + Formulaire -->
        <h1 class="text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">OUVRAGES</h1>

        <!-- FORMULAIRE COMPRENANT TOUTE LA PAGE -->
        <form method="POST" action="../../../../../index.php?action=bookList" class=" md:flex lg:flex xl:flex">
<!-- #region Filtres -->
            <!-- FILTRES -->
            <aside class="w-[100%] md:w-[20%] lg:w-[20%] xl:w-[20%]">
                <div class="grid place-items-center">
                    <h2 class="text-[40px]">FILTRES</h2>
                    <div class="w-[25%] dark:border-gray-400 border-black border-2 border-solid"></div>
                </div>

                <!-- MOYENNE -->
                <input type="button" value="Moyenne [+]" class="text-center mt-[10px] filter bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s] duration-[0.5s] dark:bg-slate-600 dark:text-gray-400">
                <div class="bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px ">
                    <ul>
                        <!-- NOTE 1 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note1" id="note1">
                            <label for="note1">1</label>
                        </li>
                        <!-- NOTE 1.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note1-5" id="note1-5">
                            <label for="note1-5">1.5</label>
                        </li>
                        <!-- NOTE 2 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note2" id="note2">
                            <label for="note2">2</label>
                        </li>
                        <!-- NOTE 2.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note2-5" id="note2-5">
                            <label for="note2-5">2.5</label>
                        </li>
                        <!-- NOTE 3 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note3" id="note3">
                            <label for="note3">3</label>
                        </li>
                        <!-- NOTE 3.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note3-5" id="note3-5">
                            <label for="note3-5">3.5</label>
                        </li>
                        <!-- NOTE 4 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note4" id="note4">
                            <label for="note4">4</label>
                        </li>
                        <!-- NOTE 4.5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note4-5" id="note4-5">
                            <label for="note4-5">4.5</label>
                        </li>
                        <!-- NOTE 5 -->
                        <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-b-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="note ml-[10px]" type="checkbox" name="note5" id="note5">
                            <label for="note5">5</label>
                        </li>
                        <!-- BOUTON POUR DECOCHER -->
                        <li>
                            <input onclick="deleteRdoButtons('note')" class="deleteButton hover:cursor-pointer hover:bg-[#e0e0e0] hover:dark:bg-slate-500 text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]" type="button" value="Décocher les notes">
                        </li>
                    </ul>
                </div>

                <!-- CATEGORIES -->
                <input type="button" value="Catégorie [+]" class="text-center mt-[10px] filter bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s] dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                <div class="bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <ul>
                        <?php
                        foreach ($_SESSION["allCategories"] as $actualCategory) {
                        ?>
                            <!-- CATEGORIE -->
                            <li class="text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                            <input class="ml-[10px] category" type="radio" value="<?=$actualCategory["idCategory"]?>" name="category[]" id="<?=$actualCategory["catName"]?>">
                            <label for="<?=$actualCategory["catName"]?>"><?=$actualCategory["catName"]?></label>
                            </li>
                        <?php
                        }
                        ?>
                            <!-- BOUTON POUR DECOCHER -->
                            <li>
                            <input onclick="deleteRdoButtons('category')" class="deleteButton hover:cursor-pointer hover:bg-[#e0e0e0] hover:dark:bg-slate-500 text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-t-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]" type="button" value="Décocher les catégories">
                            </li>
                    </ul>
                </div>

                <!-- PAGES -->
                <input type="button" value="Pages [+]" class="text-center mt-[10px] filter bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s] dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                <div class="bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <div class="grid place-items-center text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                        <!-- MIN -->
                        <label for="minPages">Min</label>
                        <input class="mt-[10px] w-[70px] border-2 border-solid border-black rounded-[5px]" type="number" name="pages[]" id="minPages" value="">
                        <!-- MAX -->
                        <label for="maxPages">Max</label>
                        <input class="mt-[10px] w-[70px] border-2 border-solid border-black rounded-[5px]" type="number" name="pages[]" id="maxPages" value="">
                    </div>
                </div>

                <!-- EDITION -->
                <input type="button" value="Edition [+]" class="text-center mt-[10px] filter bg-[#eee] text-[#444] cursor-pointer p-[18px] w-[100%] text-left text-[15px] transition-[0.4s] dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                <div class="mb-[10px] bg-black max-h-0 overflow-hidden transition-[0.2s] h-600px">
                    <div class="grid place-items-center  text-[#008891] w-[100%] py-[5px] bg-[#eee] relative z-0 text-[18px] border-black border-[1px] border-solid dark:bg-slate-600 dark:text-gray-400 duration-[0.5s]">
                        <!-- ANNEE D'EDITION -->
                        <label for="edition" class="underline">Année d'édition</label>
                        <input class="mt-[10px] w-[70px] border-2 border-solid border-black rounded-[5px]" type="number" name="edition" id="edition" value="">
                    </div>
                </div>
            </aside>
<!-- #region Recherche -->
            <!-- RECHERCHE DE LIVRES -->
            <div class="w-[100%] border-2 md:w-[80%] lg:w-[80%] xl:w-[80%] md:border-l-2 lg:border-l-2 xl:border-l-2 border-solid border-black border-t-0 dark:border-gray-400">
                <div class="grid place-items-center">
                    <label for="searchBar">Rechercher par nom d'ouvrage, éditeur ou auteur</label>
                    <!-- BARRE DE RECHERCHE -->
                    <div class="relative w-[80%] h-[35px]">
                        <input class="absolute h-full w-full border-solid border-2 border-black" type="text" name="searchBar" id="searchBar">
                        <input class="absolute ml-[100%] w-[35px] h-[35px] border-solid border-2 border-l-0 border-black bg-cover bg-center cursor-pointer hover:bg-[#cdcdcd]" style="background-image: url('../../../resources/search.jpg');" id="submit" type="submit" value="">
                    </div>
                    <p>Resultat de la recherche :</p>
                    <p><?= count($books) ?> ouvrages trouvés</p>
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
                    if (!isset($books[$i]))
                    {
                        # Arret de l'affichage
                    }
                    else
                    {
                ?>
                        <!-- 1 LIVRE -->
                        <div class="outline outline-[2px] outline-offset-[0px] flex ">
<!-- #region Image -->
                            <!-- IMAGE DE COUVERTURE -->
                            <div class="w-[40%] md:w-[30%] lg:w-[30%] xl:w-[30%] mx-[20px] py-[10px] pr-[10px] dark:border-gray-400 border-r-2 border-black border-solid xl:w-[15%] min-h-[300px]">
                                <p class="grid place-items-center block md:hidden lg:hidden xl:hidden">
                                    <?= $books[$i]["title"] ?>
                                    <br>
                                    Auteur : <?= $books[$i]["authorName"] ?>
                                    <hr class="mb-[5px] block md:hidden lg:hidden xl:hidden">
                                </p>
                                <!-- <img src="<?= $books[$i]["image"] ?>" alt=""> -->
                                Ajouter l'image !! 
                            </div>
<!-- #region Infos -->
                            <!-- INFORMATIONS SUR L'OUVRAGE -->
                            <div class="w-[30%] hidden md:block lg:block xl:block">
                                <p class="grid place-items-center"><?= $books[$i]["title"] ?></p>
                                <ul class="grid place-items-left bg-slate-300 dark:bg-slate-600 border-solid border-2 border-black h-[82%] mr-[20px] duration-[0.5s]">
                                    <li class="ml-[10px]">Auteur : <?= $books[$i]["authorName"] ?></li>
                                    <li class="ml-[10px]">
                                        <?php
                                        if(count($books[$i]["bookCategory"]) == 1)
                                        {
                                            echo "Catégorie : "; 
                                            echo $books[$i]["bookCategory"][0];
                                        }
                                        else
                                        {
                                            echo "Catégories : "; 
                                            foreach ($books[$i]["bookCategory"] as $category) 
                                            {
                                                echo $category;
                                                if($category != $books[$i]["bookCategory"][count($books[$i]["bookCategory"]) - 1])
                                                {
                                                    echo ", ";
                                                }
                                            }
                                        } 
                                        ?>
                                    </li>
                                    <li class="ml-[10px]">Pages : <?= $books[$i]["pageNumber"] ?></li>
                                    <li class="ml-[10px]">Editeur : <?= $books[$i]["editorName"] ?></li>
                                    <li class="ml-[10px]">Date d'édition : <?= $books[$i]["editorYear"] ?></li>
                                </ul>
                            </div>
<!-- #region Moyenne + Post + Details -->
                            <!-- MOYENNE + DETAILS + POST -->
                            <div class="w-[50%] grid place-items-center">
                                <P>Moyenne</P>
                                <div class="flex">
                                    <?php

                                    //Defini le nombre d'étoiles à afficher
                                    if ($books[$i]["averageEvalutation"] < 1.25)
                                    {
                                        $goldStars = 1;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 1.75)
                                    {
                                        $goldStars = 1.5;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 2.25)
                                    {
                                        $goldStars = 2;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 2.75)
                                    {
                                        $goldStars = 2.5;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 3.25)
                                    {
                                        $goldStars = 3;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 3.75)
                                    {
                                        $goldStars = 3.5;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 4.25)
                                    {
                                        $goldStars = 4;
                                    }
                                    elseif ($books[$i]["averageEvalutation"] < 4.75)
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

                                <a class="grid place-items-center w-[60%] h-[75px] rounded-[20px] bg-[#3B4568] text-white lg:text-[20px] xl:text-[30px] hover:bg-[#262C42] cursor-pointer border-black border-solid border-2" href="../../../../../index.php?action=bookDetail&bookId=<?= $books[$i]['id']?>">
                                    <input class="cursor-pointer" type="button" value="Details">
                                </a>
                                <aside>Posté par : <?= $books[$i]["user"][1] ?></aside>
                            </div>
<!-- #region Pages -->  
                        </div>
                <?php
                    }
                }
                ?>
                <!-- NAVIGATION DES PAGES -->
                <div class="grid place-items-center">
                    <nav class="flex mt-[30px] mb-[30px]">
                        <?php
                        //Defini si c'est la première page trouvable
                        //Si oui, affiche un bouton non cliquable
                        if($_GET["page"] == 1)
                        {
                        ?>
                            <!-- Bouton de retour => ALler une page en arrière non actif -->
                            <input style="background-image: url('../../../resources/left.jpg');" class="hidden sm:block md:block lg:block xl:block mr-[20px] text-right bg-left bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pr-[10px] border-2 rounded-[15px] w-[150px] h-[45px] opacity-50 cursor-not-allowed" type="button" value="Retour">
                        <?php
                        }
                        //Sinon, affiche un bouton cliquable
                        else
                        {
                        ?>
                            <!-- Bouton de retour => ALler une page en arrière actif -->
                            <a href="books.php?page=<?= $_GET["page"] - 1 ?>">
                                <input style="background-image: url('../../../resources/left.jpg');" class="hidden sm:block md:block lg:block xl:block mr-[20px] text-right bg-left bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pr-[10px] border-2 rounded-[15px] w-[150px] h-[45px] hover:bg-[#3C466A] cursor-pointer" type="button" value="Retour">
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
                                <input class="h-[35px] w-[35px] sm:h-[35px] sm:w-[35px] md:h-[35px] md:w-[35px] lg:h-[45px] lg:w-[45px] xl:h-[45px] xl:w-[45px] mr-[1px] text-white bg-[#4B5987] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer" type="button" value="<?= 1 ?>">
                            </a>
                            <?php
                        }

                        $x = 0;                      //Début de la boucle
                        $lastPage = ceil(count($books) /*100*/ / 5);    //Dernière page en fonction de la liste de livres
                        //Boucle permettant d'afficher le nombre de boutons adéquat
                        while ($x < count($books) /*100*/ / 5 && $x < $_GET["page"] + 2)
                        {
                            //category pour savoir si x est plus petit que le numéro de page - 3
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
                                        <input class="text-white bg-[#4B5987] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[35px] w-[35px] sm:h-[35px] sm:w-[35px] md:h-[35px] md:w-[35px] lg:h-[45px] lg:w-[45px] xl:h-[45px] xl:w-[45px]" type="button" value="<?= $x ?>">
                                    </a>
                                <?php
                                }
                                //Sinon affiche un bouton avec une couleur plus foncée
                                else
                                {
                                ?>
                                    <!-- Bouton de page active -->
                                    <a href="books.php?page=<?= $x ?>">
                                        <input class="text-white bg-[#677ABA] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[35px] w-[35px] sm:h-[35px] sm:w-[35px] md:h-[35px] md:w-[35px] lg:h-[45px] lg:w-[45px] xl:h-[45px] xl:w-[45px]" type="button" value="<?= $x ?>">
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
                                <input class="ml-[1px] text-white bg-[#4B5987] border-solid border-black border-[1px] hover:bg-[#3C466A] cursor-pointer h-[35px] w-[35px] sm:h-[35px] sm:w-[35px] md:h-[35px] md:w-[35px] lg:h-[45px] lg:w-[45px] xl:h-[45px] xl:w-[45px]" type="button" value="<?= $lastPage ?>">
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
                                <input style="background-image: url('../../../resources/right.jpg');" class="hidden sm:block md:block lg:block xl:block ml-[20px] text-left bg-right bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pl-[10px] border-2 rounded-[15px] w-[150px] h-[45px] hover:bg-[#3C466A] cursor-pointer" type="button" value="Suivant">
                            </a>
                        <?php
                        }
                        //Sinon, affiche un bouton non cliquable
                        else
                        {
                        ?>
                            <!-- Bouton de page suivante => ALler une page en avant non actif -->
                            <input style="background-image: url('../../../resources/right.jpg');" class="hidden sm:block md:block lg:block xl:block ml-[20px] text-left bg-right bg-no-repeat text-white text-[25px] bg-[#4B5987] border-solid border-black pl-[10px] border-2 rounded-[15px] w-[150px] h-[45px] opacity-50 cursor-not-allowed" type="button" value="Suivant">
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
        include("../../include/footer.php");
        ?>
    </footer>
</body>
</html>

<script>
// Get the filter buttons
let acc = document.getElementsByClassName("filter");

// Set them an EventListenenr on click
for (let i = 0; i < acc.length; i++) 
{
    acc[i].addEventListener("click", function() 
    {
        let panel = this.nextElementSibling;    
        let value = this.value;                 //Value = Text on the filter button

        // Change style (height) : OPEN / CLOSE
        if (panel.style.maxHeight) 
        {
            value = value.replace("-", "+");
            panel.style.maxHeight = null;
        } 
        else 
        {
            value = value.replace("+", "-");
            panel.style.maxHeight = panel.scrollHeight + "px";
        } 
        this.value = value;
    });
}
</script>

<script>
    /// ---- FUNCTION = deleteRdoButtons = ----
    /// Removes the check on every radio button of
    /// the list by click on the button "deleteButton" (onclick())
    /// ---
    /// filter => filter wanted to delete check
    /// ---
    function deleteRdoButtons(filter) 
    {
        // Get the radio buttons of the list
        let rdoButton = document.getElementsByClassName(filter);

        // Set the radio buttons to false
        for (let i = 0; i < rdoButton.length; i++) 
        {
            rdoButton[i].checked = false;
        }
    }
</script>