<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un ouvrage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <?php
        //include("../../include/header.php");
        ?>
    </header>
    <main class="bg-center bg-cover" style="background-image: url('../../../resources/biblioFond.jpg');">
        <h1 class="text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">AJOUTER UN OUVRAGE</h1>

        <!-- Div prenant toute la place de la page sauf le titre -->
        <div class="grid place-items-center">
            <!-- FORMULAIRE -->
            <form class="bg-white w-[95%] sm:w-[95%] md:w-[85%] lg:w-[70%] xl:w-[70%]" action="#" method="POST">

                <div class="md:flex lg:flex xl:flex">
                    <!-- NOM DE L'OUVRAGE -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] mt-[20px] mb-[-20px]" for="bookName">Nom de l'ouvrage</label>
                        <br>
                        <input class="bg-[#e6e6e6] border-solid border-2 border-black h-[50px] w-[300px] text-[15px] sm:text-[20px] sm:h-[60px] sm:w-[350px] sm:rounded-[5px] md:text-[20px] md:h-[40px] md:w-[270px] md:rounded-[10px] lg:text-[20px] lg:h-[60px] lg:w-[340px] lg:rounded-[15px] xl:text-[25px] xl:h-[80px] xl:w-[450px] xl:rounded-[20px]" type="text" name="bookName" id="bookName" placeholder="Entrez le nom de l'ouvrage">
                    </p>

                    <!-- AJOUT D'UNE IMAGE -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="mt-[20px] md:mb-[-20px] lg:mb-[-20px] xl:mb-[-20px] " for="image">Inserer une image de couverture</label>
                        <input type="file" id="image" name="image">
                    </p>
                </div>

                <div class="md:flex lg:flex xl:flex">
                    <!-- CATEGRORIE -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] mt-[20px] mb-[-20px]" for="category">Catégorie</label>
                        <br>
                        <select class="bg-[#e6e6e6] border-solid border-2 border-black h-[50px] w-[300px] text-[15px] sm:text-[20px] sm:h-[60px] sm:w-[350px] sm:rounded-[5px] md:text-[20px] md:h-[40px] md:w-[270px] md:rounded-[10px] lg:text-[20px] lg:h-[60px] lg:w-[340px] lg:rounded-[15px] xl:text-[25px] xl:h-[80px] xl:w-[450px] xl:rounded-[20px]" name="category" id="category" placeholder="Entrez la catégorie de l'ouvrage">
                            <option value="manga">Manga</option>
                            <option value="roman">Roman</option>
                            <option value="livre">Livre</option>
                        </select>
                    </p>

                    <!-- PAGES -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] mt-[20px] md:mb-[-20px] lg:mb-[-20px] xl:mb-[-20px]" for="pages">Pages</label>
                        <br>
                        <input class="text-center bg-[#e6e6e6] border-solid border-2 border-black h-[45px] w-[100px] sm:text-[20px] sm:h-[50px] sm:w-[125px] sm:rounded-[5px] md:text-[18px] md:h-[40px] md:w-[100px] md:rounded-[10px] lg:text-[20px] lg:h-[50px] lg:w-[150px] lg:rounded-[15px] xl:text-[25px] xl:h-[50px] xl:w-[150px] xl:rounded-[20px]" type="number" id="pages" name="pages" value="00">
                    </p>
                </div>
                <div class="md:flex lg:flex xl:flex">
                    <!-- EDITEUR -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] mt-[20px] mb-[-20px]" for="editor">Editeur</label>
                        <br>
                        <input class="bg-[#e6e6e6] border-solid border-2 border-black h-[50px] w-[300px] text-[15px] sm:text-[20px] sm:h-[60px] sm:w-[350px] sm:rounded-[5px] md:text-[20px] md:h-[40px] md:w-[270px] md:rounded-[10px] lg:text-[20px] lg:h-[60px] lg:w-[340px] lg:rounded-[15px] xl:text-[25px] xl:h-[80px] xl:w-[450px] xl:rounded-[20px]" type="text" name="editor" id="editor" placeholder="Entrez le nom de l'éditeur">
                    </p>

                    <!-- ANNEE D'EDITION -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] mt-[20px] md:mb-[-20px] lg:mb-[-20px] xl:mb-[-20px]" for="edition">Année d'édition</label>
                        <br>
                        <input class="text-center bg-[#e6e6e6] border-solid border-2 border-black h-[45px] w-[100px] sm:text-[20px] sm:h-[50px] sm:w-[125px] sm:rounded-[5px] md:text-[18px] md:h-[40px] md:w-[100px] md:rounded-[10px] lg:text-[20px] lg:h-[50px] lg:w-[150px] lg:rounded-[15px] xl:text-[25px] xl:h-[50px] xl:w-[150px] xl:rounded-[20px]" type="number" id="edition" name="edition" value="1900">
                    </p>
                </div>

                <div class="md:flex lg:flex xl:flex">
                    <!-- ECRIVAIN -->
                    <p class="sm:w-[100%] md:w-[50%] lg:w-[50%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] xl:text-[30px] mt-[20px] mb-[-20px]" for="author">Ecrivain</label>
                        <br>
                        <input class="bg-[#e6e6e6] border-solid border-2 border-black h-[50px] w-[300px] text-[15px] sm:text-[20px] sm:h-[60px] sm:w-[350px] sm:rounded-[5px] md:text-[20px] md:h-[40px] md:w-[270px] md:rounded-[10px] lg:text-[20px] lg:h-[60px] lg:w-[340px] lg:rounded-[15px] xl:text-[25px] xl:h-[80px] xl:w-[450px] xl:rounded-[20px]" type="text" name="author" id="author" placeholder="Entrez le nom de l'écrivain">
                    </p>

                    <div class="w-[50%]"></div>
                </div>

                <!-- SEPARATION -->
                <hr class="mx-[100px] mt-[35px] border-solid border-1 border-black">
                
                <div class="xl:flex">
                    <!-- RESUME -->
                    <p class="w-[100%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] sm:text-[25px] md:text-[23px] lg:text-[25px] mt-[20px] mb-[-20px]" for="resume">Résumé</label>
                        <br>
                        <textarea class="text-[18px] bg-[#e6e6e6] border-solid border-2 border-black rounded-[10px] h-[250px] w-[425px]" name="resume" id="resume" cols="30" rows="10" placeholder="Entrez un résumé de l'ouvrage"></textarea>
                    </p>
                    <!-- EXTRAIT -->
                    <p class="w-[100%] xl:w-[50%] grid place-items-center">
                        <label class="text-[25px] mt-[20px] mb-[-20px]" for="extract">Extrait</label>
                        <br>
                        <textarea class="text-[18px] bg-[#e6e6e6] border-solid border-2 border-black rounded-[10px] h-[250px] w-[425px]" name="extract" id="extract" cols="30" rows="10" placeholder="Entrez un extrait de l'ouvrage"></textarea>
                    </p>
                </div>

                <!-- bOUTON D'ENVOI -->
                <div class="grid place-items-center my-[50px]">
                    <input class="text-4xl text-white bg-[#3B4568] rounded-[20px] border-solid border-2 border-black px-[60px] py-[30px] cursor-pointer hover:bg-[#262C42]" type="button" value="Ajouter l'ouvrage">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php
        //include("../../include/footer.php");
        ?>
    </footer>
</body>
</html>