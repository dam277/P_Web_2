<?php
$bookList = $_POST;
var_dump($bookList);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Accueil</title>
</head>
<body onload="onLoad('<?=$bookList['book1']?>', '<?=$bookList['book2']?>', '<?=$bookList['book3']?>', '<?=$bookList['book4']?>', '<?=$bookList['book5']?>')" class="duration-[0.5s] dark:text-gray-400 dark:bg-gray-700">
    <header>
        <?php
            include("../../include/header.php");
        ?>
    </header>
    <main>
        <!-- DEBUT ==================== TITRE ==================== -->
        <div class="py-[369px] sm:py-[357px] md:py-[313px] lg:py-[269px] bg-[url('../../../resources/HomeTitle.png')] text-center object-fill">
            <h1 class="text-[40px] sm:text-[50px] md:text-[75px] lg:text-[100px] text-black font-semibold">
                ACCUEIL
            </h1>
            <a href="books.php">
                <input onclick="moveLeft()" class="cursor-pointer bg-opacity-[35%] border-solid border-2 border-black bg-[#C4C4C4] hover:bg-opacity-100 text-black rounded-[30px] text-[20px] h-[40px] w-[200px] sm:text-[25px] sm:h-[50px] sm:w-[250px] md:text-[35px] md:h-[100px] md:w-[350px] lg:text-[50px] lg:h-[150px] lg:w-[500px]" type="button" value="VOIR LES OUVRAGES">
            </a>
        </div>
        <!-- FIN ==================== TITRE ==================== -->

        <!-- DEBUT ==================== DERNIERS OUVRAGES AJOUTES ==================== -->
        <div class="mt-[75px]">
            <h2 class="font-bold text-[30px] sm:text-[40px] md:text-[50px] lg:text-[65px] text-center">
                DERNIERS OUVRAGES AJOUTES
            </h2>

            <!-- LIGNE EN DESSOUS DU TITRE -->
            <div class="flex mt-[50px] mb-[50px]">
                <div class=" w-[35%]"></div>
                <div class= "w-[29%] border-5 border-solid border-2 border-black"></div>
                <div class=" w-[35%]"></div>
            </div>
            <br>

            <!-- LISTE DES DERNIERS OUVRAGES AJOUTES -->
            <div class="ml-[20%] mr-[20%] border-solid border-2 border-black flex justify-center">

                <!-- LIVRE 1-->
                <div class="relative bg-[#C4C4C4] w-[33%]">
                    <!-- IMAGE DU LIVRE -->
                    <img id="book1" class="max-h-[490px] w-full h-full" src="<?= $bookList['book1'] ?>" alt="livre 1">
                    
                    <!-- INFORMATIONS QUI S'AFFICHENT LORS DU PASSAGE DE LA SOURIS -->
                    <div class="absolute inset-0">
                        <input onclick="moveLeft()" type="button" class="mt-[50%] cursor-pointer hover:bg-opacity-[100%] rounded-full absolute bg-[#656565] bg-opacity-[40%] border-solid border-2 border-black h-[25px] w-[25px] sm:h-[35px] sm:w-[35px] md:h-[55px] md:w-[55px] lg:h-[80px] lg:w-[80px] bg-cover" style="background-image: url('../../../resources/left.jpg')" value="">
                    </div>
                </div>
                <!-- LIVRE 1-->

                <!-- DETAILS DU LIVRE 2-->
                <div class="relative bg-[#C4C4C4] w-[33%]">
                    <!-- IMAGE DU LIVRE -->
                    <img id="book2" class="absolute max-h-[490px] w-full h-full inset-0 bg-cover bg-center z-0" src="<?= $bookList['book2'] ?>"  alt="livre 2" >
                    
                    <!-- INFORMATIONS QUI S'AFFICHENT LORS DU PASSAGE DE LA SOURIS -->
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex flex-col justify-center items-center text-black font-semibold text-[11px] sm:text-[15px] md:text-[18px] lg:text-[25px]">
                        <ul class="z-20">
                            <li>Nom : $artName</li>
                            <li>Auteur : $author</li>
                        </ul>
                        <div class="absolute h-full w-full bg-[#C4C4C4] opacity-70 z-10"></div>
                        <a href="">
                            <input type="button" class="mt-[55%] cursor-pointer hover:bg-opacity-[100%] rounded-full relative z-30 bg-[#656565] bg-opacity-[35%] border-solid border-2 border-black text-[10px] h-[25px] w-[50px] sm:text-[10px] sm:h-[25px] sm:w-[50px] md:text-[20px] md:h-[50px] md:w-[100px] lg:text-[30px] lg:h-[75px] lg:w-[150px]" value="DETAILS">
                        </a>
                    </div>
                </div>
                <!-- DETAILS DU LIVRE 2-->
                
                <!-- LIVRE 3-->
                <div class="relative bg-[#C4C4C4] w-[33%] text-right">
                    <!-- IMAGE DU LIVRE -->
                    <img id="book3" class="w-full max-h-[490px] h-full" src="<?= $bookList['book3'] ?>" alt="livre 3">
                    
                    <!-- INFORMATIONS QUI S'AFFICHENT LORS DU PASSAGE DE LA SOURIS -->
                    <div class="absolute inset-0">
                        <!-- BOUTON TOURNER A DROITE -->
                        <input onclick="moveRight()" type="button" class="mt-[50%] cursor-pointer hover:bg-opacity-[100%] rounded-full absolute bg-[#656565] bg-opacity-[40%] border-solid border-2 border-black ml-[-25px] h-[25px] w-[25px] sm:ml-[-35px] sm:h-[35px] sm:w-[35px] md:ml-[-55px] md:h-[55px] md:w-[55px] lg:ml-[-80px] lg:h-[80px] lg:w-[80px] bg-cover" style="background-image: url('../../../resources/right.jpg')" value="">
                    </div>
                </div>
                <!-- LIVRE 3-->
            </div>
        </div>
        <!-- FIN ==================== DERNIERS OUVRAGES AJOUTES ==================== -->

        <!-- DEBUT ==================== SITE PRESENTATION ==================== -->
        <div>
            <h2 class="text-[30px] sm:text-[40px] md:text-[50px] lg:text-[65px] text-center">
                LE SITE
            </h2>
            <div class="flex mt-[10px] mb-[25px]">
                <div class=" w-[47%]"></div>
                <div class= "w-[6%] border-5 border-solid border-2 border-black"></div>
                <div class=" w-[47%]"></div>
            </div>
            <div class="flex">
                <aside class="bg-slate-300 w-[50%] dark:bg-slate-600 duration-[0.5s]">
                    <p>
                        Texte
                    </p>
                </aside>
                <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
            </div>
            <div class="flex">
                <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
                <aside class="w-[50%] bg-slate-300 dark:bg-slate-600 duration-[0.5s]">
                    <p>
                        Texte
                    </p>
                </aside>
            </div>
            <div class="flex">
                <aside class="w-[50%] bg-slate-300 dark:bg-slate-600 duration-[0.5s]">
                    <p>
                        Texte
                    </p>
                </aside>
                <img class="w-[50%]" src="../../../resources/livre.jpg" alt="Image livre">
            </div>
        </div>
        <!-- FIN ==================== SITE PRESENTATION ==================== -->

    </main>
    <footer>
        <?php
            include("../../include/footer.php");
        ?>
    </footer>
</body>
</html>

<script src="../../js/imageScrolling.js"></script>