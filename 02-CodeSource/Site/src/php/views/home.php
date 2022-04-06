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
        <!-- TITLE -->
        <div class="text-center bg-[url('../../../resources/HomeTitle.jpg')] h-[838px]">
            <!-- <img class="w-[100%]" src="../../../resources/HomeTitle.jpg" alt="Image de bibliothèque"> -->
            <h1 class="text-6xl text-black font-semibold ">
                ACCUEIL
            </h1>
            <input class="cursor-pointer bg-opacity-50 border-solid border-2 border-black bg-[#C4C4C4] hover:bg-opacity-100 text-black font-bold py-2 px-4 rounded" type="button" value="VOIR LES OUVRAGES">
        </div>

        <!-- LAST BOOKS -->
        <div>
            <h2 class="text-5xl text-center">
                DERNIERS OUVRAGES AJOUTES
            </h2>
            <div class="ml-[10%] mr-[10%] border-solid border-2 border-black flex justify-center">
                <input type="button" value="">
                <img class=" w-[25%]" src="../../../resources/book1.jpg" alt="">
                <img class=" w-[25%]" src="../../../resources/book2.jpg" alt="">
                <img class=" w-[25%]" src="../../../resources/book3.jpg" alt="">
                <input type="button" value="">
            </div>
        </div>

        <!-- SITE PRESENTATION -->
        <div>
            <h2 class="text-5xl text-center">
                LE SITE
            </h2>
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
    </main>
    <footer>
        <?php
            //include("../../include/footer.php");
        ?>
    </footer>
</body>
</html>
<!-- absolute text-black bg-blue-500 hover:bg-blue-700 w-[200px] h-[50px] -->