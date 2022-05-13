<?php
$bookToShow = $GLOBALS["bookToShow"];


$book = array(
    "id" => "../../../resources/bookTitle.jpg",
    "title" => "Titre du livre",
    "pageNumber" => "678",
    "summary" => "résumé",
    "authorName" => "truc bidule",
    "editorName" => "jean-marc dupont",
    "editionYear" => "2012",
    "userId" => "user",
    "categories" => ["Manga", "Romance"],
    "average" => 4.3,
    "nbAverage" => ["2", "1"]
);

$author = explode(" ", $book["authorName"]);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Informations de l'ouvrage</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'checked': "url('../../../resources/rateStarChecked.jpg')",
                        'notChecked': "url('../../../resources/rateStarNotChecked.jpg')",
                        'notCheckedLeft': "url('../../../resources/rateStarNotCheckedLeft.jpg')",
                        'notCheckedRight': "url('../../../resources/rateStarNotCheckedRight.jpg')",
                        'checkedLeft': "url('../../../resources/rateStarCheckedLeft.jpg')",
                        'checkedRight': "url('../../../resources/rateStarCheckedRight.jpg')",
                    }
                }
            }
        }
    </script>
</head>

<body class="duration-[0.5s] dark:bg-gray-700 dark:text-gray-400">
    <header>
        <?php
        include("../../include/header.php");
        ?>
    </header>
    <main>
        <!-- TITRE -->
        <h1 class="text-4xl md:text-6xl lg:text-8xl xl:text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">INFORMATIONS DE L'OUVRAGE</h1>

        <!-- Details du livre -->
        <div class="grid place-items-center">
            <h2 class="text-[20px] lg:text-[20px] md:text-[25px] lg:text-[30px] xl:text-[30px] font-bold my-[15px]">Détails : <?= $book["title"] ?></h2>
            <!-- Image du livre -->
            <img class="h-[350px] md:h-[450px] lg:h-[500px] xl:h-[600px]" src="<?= $book["id"] ?>" alt="">

            <!-- informations -->
            <div class="flex w-full text-[15px] lg:text-[20px] md:text-[25px] lg:text-[28px] xl:text-[28px]">
                <!-- Auteur -->
                <ul class="text-right w-[33%]">
                    <li class="font-bold">Auteur</li>
                    <li>Prénom : <?= $author[0] ?></li>
                    <li>Nom : <?= $author[1] ?></li>
                </ul>
                <!-- Pages + Catégories + Appréciations -->
                <ul class="grid place-items-center w-[33%] ml-[10px]">
                    <li>Pages : <?= $book["pageNumber"] ?></li>
                    <li class="mt-[100px] font-bold">Catégories</li>
                    <li><?= $book["categories"][0] . ", " . $book["categories"][1] ?></li>
                    <li class="font-bold">Appréciations</li>
                    <li>Cet ouvrage à reçu <?= count($book["nbAverage"]) ?> appréciations</li>
                </ul>
                <!-- Editeur -->
                <ul class="w-[33%]">
                    <li class="font-bold">Edition</li>
                    <li>Editeur : <?= $book["editorName"] ?></li>
                    <li>Année d'édition : <?= $book["editionYear"] ?></li>
                </ul>
            </div>
            <!-- Personne qui poste l'article -->
            <p class="mt-[25px]">Posté par : Personne</p>
            <?php
            //Defini le nombre d'étoiles à afficher
            if ($book["average"] < 1.25) {
                $goldStars = 1;
            } 
            elseif ($book["average"] < 1.75) 
            {
                $goldStars = 1.5;
            } 
            elseif ($book["average"] < 2.25) 
            {
                $goldStars = 2;
            } 
            elseif ($book["average"] < 2.75) 
            {
                $goldStars = 2.5;
            } 
            elseif ($book["average"] < 3.25) 
            {
                $goldStars = 3;
            } 
            elseif ($book["average"] < 3.75) 
            {
                $goldStars = 3.5;
            } 
            elseif ($book["average"] < 4.25) 
            {
                $goldStars = 4;
            } 
            elseif ($book["average"] < 4.75) 
            {
                $goldStars = 4.5;
            } 
            else {
                $goldStars = 5;
            }
            ?>
            <div class="flex">
                <?php
                //Affichage des étoiles
                for ($y = 0; $y < 5; $y++) 
                {
                    if ($y < $goldStars) 
                    {
                        if ($y + 0.5 == $goldStars) 
                        {
                ?>
                            <img class=" w-[30px] h-[30px]" src="../../../resources/rateStarSemiChecked.jpg" alt="Note">
                        <?php
                        } 
                        else 
                        {
                        ?>
                            <img class="w-[30px] h-[30px]" src="../../../resources/rateStarChecked.jpg" alt="Note">
                        <?php
                        }
                        ?>

                    <?php
                    } 
                    else 
                    {
                    ?>
                        <img class="w-[30px] h-[30px]" src="../../../resources/rateStarNotChecked.jpg" alt="Note">
                <?php
                    }
                }

                ?>
            </div>
        </div>

        <!-- RESUME -->
        <div class="flex mt-[30px]">
            <!-- Texte -->
            <aside class="bg-slate-300 w-[50%] dark:bg-slate-600 duration-[0.5s]">
                <h2 class="underline md:text-2xl lg:text-4xl xl:text-6xl text-center font-bold">Résumé</h2>
                <p class="text-[12px] md:text-[20px]">
                    Texte
                </p>
            </aside>
            <!-- Image de livre -->
            <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
        </div>
        <!-- EXTRAIT -->
        <div class="flex">
            <!-- Image de livre -->
            <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
            <!-- Texte -->
            <aside class="w-[50%] bg-slate-300 dark:bg-slate-600 duration-[0.5s]">
                <h2 class="underline md:text-2xl lg:text-4xl xl:text-6xl text-center font-bold">Extrait</h2>
                <p>
                    Texte
                </p>
            </aside>
        </div>

        <div class="grid place-items-center mt-[20px]">
            <p class="font-bold text-[15px] lg:text-[20px] md:text-[25px] lg:text-[28px] xl:text-[28px]">Donnez une note à cet ouvrage</p>
            <!-- FORMULAIRE D'AVIS SUR UN ARTICLE -->
            <form method="POST" action="checkNote.php">
                <div class="flex rotate-180">
                    <?php
                    const MARGINLEFT = 10;                //Variable Créant la marge automatique entre les étoiles
                    //Affichage des étoiles
                    for ($i = 5; $i > 0; $i -= 0.5) 
                    {
                        //Si 0.5 rien ne se passe
                        if($i == 0.5)
                        {
                        }
                        //Si 1, Une étoiles complète s'affiche
                        else if($i == 1)
                        {
                        ?>
                            <input class="peer invisible" type="radio" id="star<?=$i?>" name="rate" value="star<?=$i?>">
                            <label onclick="" class="mr-[-13px] bg-[url('../../../resources/rateStarNotChecked.jpg')] peer-checked:bg-[url('../../../resources/rateStarChecked.jpg')] hover:bg-[url('../../../resources/rateStarChecked.jpg')] w-[50px] h-[50px] cursor-pointer ml-[<?=MARGINLEFT*$i?>]" for="star<?=$i?>"></label>
                        <?php
                        }
                        //Si Ce n'est pas un nombre à virgule la demi étoile gauche s'affiche
                        else if(!strpos($i, "."))
                        {
                        ?>
                            <input class="peer invisible" type="radio" id="star<?=$i?>" name="rate" value="star<?=$i?>">
                            <label onclick="" class="mr-[-13px] bg-[url('../../../resources/rateStarNotCheckedLeft.jpg')] peer-checked:bg-[url('../../../resources/rateStarCheckedLeft.jpg')] hover:bg-[url('../../../resources/rateStarCheckedLeft.jpg')] w-[25px] h-[50px] cursor-pointer ml-[<?=MARGINLEFT*$i?>]" for="star<?=$i?>"></label>
                        <?php
                        }
                        //Sinon la demi étoile droite s'affiche
                        else
                        {
                        ?>
                            <input class="peer invisible" type="radio" id="star<?=$i?>" name="rate" value="star<?=$i?>">
                            <label onclick="" class="bg-[url('../../../resources/rateStarNotCheckedRight.jpg')] peer-checked:bg-[url('../../../resources/rateStarCheckedRight.jpg')] hover:bg-[url('../../../resources/rateStarCheckedRight.jpg')] w-[25px] h-[50px] cursor-pointer ml-[<?=MARGINLEFT*$i?>]" for="star<?=$i?>"></label>
                        <?php
                        }
                    }
                    ?>
                </div>
                <!-- BOUTON D'ENVOI -->
                <div class="grid place-items-center my-[50px]">
                    <input class="mt-[-30px] text-white bg-[#3B4568] rounded-[20px] border-solid border-2 border-black px-[35px] py-[13px] md:px-[55px] md:py-[15px] md:text-2xl lg:px-[60px] lg:py-[20px] lg:text-4xl xl:px-[60px] xl:py-[20px] xl:text-4xl cursor-pointer hover:bg-[#262C42]" type="submit" value="Valider">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php
        include("../../include/footer.php");
        ?>
    </footer>
</body>

</html>