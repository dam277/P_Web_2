<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Accueil</title>
</head>
<body>
    <header>
        <?php
            //include("../../include/header.php");
        ?>
    </header>
    <main>
        <!-- DEBUT ==================== TITRE ==================== -->
        <div class="py-[369px] sm:py-[357px] md:py-[313px] lg:py-[269px] bg-[url('../../../resources/HomeTitle.jpg')] text-center">
            <h1 class="text-[40px] sm:text-[50px] md:text-[75px] lg:text-[100px] text-black font-semibold">
                ACCUEIL
            </h1>
            <a href="https://www.google.ch/">
                <input class="cursor-pointer bg-opacity-[35%] border-solid border-2 border-black bg-[#C4C4C4] hover:bg-opacity-100 text-black rounded-[30px] text-[20px] h-[40px] w-[200px] sm:text-[25px] sm:h-[50px] sm:w-[250px] md:text-[35px] md:h-[100px] md:w-[350px] lg:text-[50px] lg:h-[150px] lg:w-[500px]" type="button" value="VOIR LES OUVRAGES">
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

                <!-- BOUTON TOURNER A GAUCHE -->
                <input type="button" value="">

                <!-- LIVRE 1-->
                <img class="w-[33%]" src="../../../resources/book1.jpg" alt="">
                <!-- LIVRE 1-->

                <!-- DETAILS DU LIVRE 2-->
                <div class="relative bg-[#C4C4C4] w-[33%]">
                    <!-- IMAGE DU LIVRE -->
                    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('../../../resources/book2.jpg')"></div>
                    
                    <!-- INFORMATIONS QUI S'AFFICHENT LORS DU PASSAGE DE LA SOURIS -->
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex flex-col justify-center items-center text-black font-semibold text-[11px] sm:text-[15px] md:text-[18px] lg:text-[25px]">
                        <ul class="z-20">
                            <li>Nom : $artName</li>
                            <li>Auteur : $author</li>
                        </ul>
                        <div class="absolute h-full w-full bg-[#C4C4C4] opacity-70 z-10"></div>
                        <input type="button" class="mt-[90%] cursor-pointer hover:bg-opacity-[100%] rounded-full absolute z-30 bg-[#656565] bg-opacity-[35%] border-solid border-2 border-black text-[10px] h-[25px] w-[50px] sm:text-[10px] sm:h-[25px] sm:w-[50px] md:text-[20px] md:h-[50px] md:w-[100px] lg:text-[30px] lg:h-[75px] lg:w-[150px]" value="DETAILS">
                    </div>
                </div>
                <!-- DETAILS DU LIVRE 2-->
                
                <!-- LIVRE 3-->
                <img class="w-[33%]" src="../../../resources/book3.jpg" alt="">
                <!-- LIVRE 3-->

                 <!-- BOUTON TOURNER A DROITE -->
                <input type="button" value="">
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
        </div>
        <!-- FIN ==================== SITE PRESENTATION ==================== -->

    </main>
    <footer>
        <?php
            //include("../../include/footer.php");
        ?>
    </footer>
</body>
</html>
<!-- absolute text-black bg-blue-500 hover:bg-blue-700 w-[200px] h-[50px] -->