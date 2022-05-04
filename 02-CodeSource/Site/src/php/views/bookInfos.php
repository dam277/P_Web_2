<?php
$book = array(
    "image" => "../../../resources/bookTitle.jpg",
    "name" => "Titre du livre",
    "category" => "manga",
    "author" => "jean-marc dupont",
    "editor" => "oui",
    "pages" => "678",
    "edition" => "2012",
    "average" => 4
);

$author = explode(" ", $book["author"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php
        //include("../../include/header.php");
        ?>
    </header>
    <main>
        <h1 class="text-4xl md:text-6xl lg:text-8xl xl:text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">INFORMATIONS DE L'OUVRAGE</h1>

        <div class="grid place-items-center">
            <h2 class="text-[20px] lg:text-[20px] md:text-[25px] lg:text-[30px] xl:text-[30px] font-bold my-[15px]">Détails : <?=$book["name"]?></h2>
            <img class="h-[350px] md:h-[450px] lg:h-[500px] xl:h-[600px]" src="<?=$book["image"]?>" alt="">

            <div class="flex w-full text-[15px] lg:text-[20px] md:text-[25px] lg:text-[28px] xl:text-[28px]">
                <ul class="text-right w-[33%]">
                    <li class="font-bold">Auteur</li>
                    <li>Prénom : <?=$author[0]?></li>
                    <li>Nom : <?=$author[1]?></li>
                </ul>
                <ul class="grid place-items-center w-[33%] ml-[10px]">
                    <li>Pages : <?=$book["pages"]?></li>
                    <li class="mt-[100px] font-bold">Catégories</li>
                    <li><?=$book["category"] . ", " . $book["category"]?></li>
                    <li class="font-bold">Appréciations</li>
                </ul>
                <ul class="w-[33%]">
                    <li class="font-bold">Edition</li>
                    <li>Editeur :  <?=$book["editor"]?></li>
                    <li>Année d'édition :  <?=$book["edition"]?></li>
                </ul>
            </div>
            <p class="mt-[75px] mb-[30px]">Posté par : Personne</p>
            <?php
            //Defini le nombre d'étoiles à afficher
            if ($book["average"] < 1.25) 
            {
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
            else 
            {
                $goldStars = 5;
            }

            
            ?> 
            </div>

        <div class="flex">
                <aside class="bg-[#D3E0E3] w-[50%]">
                    <p>
                        Texte
                    </p>
                </aside>
                <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
            </div>
            <div class="flex">
                <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
                <aside class="w-[50%] bg-[#D3E0E3]">
                    <p>
                        Texte
                    </p>
                </aside>
            </div>
            <div class="flex">
                <aside class="w-[50%] bg-[#D3E0E3]">
                    <p>
                        Texte
                    </p>
                </aside>
                <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
            </div>
    </main>
    <footer>
        <?php
        //include("../../include/footer.php");
        ?>
    </footer>
</body>
</html>