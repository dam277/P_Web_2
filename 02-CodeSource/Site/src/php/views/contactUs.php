<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="duration-[0.5s] dark:bg-gray-700 dark:text-gray-400">
    <header>
        <?php
        include("../../include/header.php");
        ?>
    </header>
    <main class="grid place-items-center">
        <!-- TITRE -->
        <h1 class="text-4xl md:text-6xl lg:text-8xl xl:text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">CONTACT</h1>
        <form action="" method="POST" class="text-center">
            <!-- type du message -->
            <p class="text-2xl">Quel type de message voulez-vous envoyer</p>
            <input type="radio" name="TypeContact" id="help" value="Aide">
            <label for="help" id>Aide</label>
            <input type="radio" name="TypeContact" id="return" value="Retour">
            <label for="return">Retour</label>
            <input type="radio" name="TypeContact" id="problem" value="Probleme">
            <label for="problem">Problème</label>
            <input type="radio" name="TypeContact" id="question" value="Question">
            <label for="question">Question</label>
            <div class="flex mt-[50px]">
                <div class="w-[25%] sm:w-[33%]"></div>
                <div class="w-[50%] sm:w-[33%] border-b-[1px] border-black"></div>
                <div class="w-[25%] sm:w-[33%]"></div>
            </div>
            <!-- pseudo -->
            <label for="nickname" class="text-2xl">Pseudo</label><br>
            <input type="text" id="nickname" placeholder="Entrez votre pseudo" class="border-2 border-black w-[65%] bg-gray-300 rounded px-[10px]">
            <div class="text-left border-2 border-black mt-[10px] p-[15px]">
                <!-- Email -->
                <label for="email" class="text-2xl">Email</label><br>
                <input type="text" id="email" placeholder="Entrez votre email pour vous envoyer une réponse" class="border-2 border-black w-[65%] bg-gray-300 rounded w-[100%] rounded-xl h-[40px] p-[10px]">
                <!-- sujet du message -->
                <label for="subject" class="text-2xl mt-[20px]">Sujet</label><br>
                <input type="text" id="subject" placeholder="Entrez le sujet de votre message" class="border-2 border-black w-[65%] bg-gray-300 rounded w-[100%] rounded-xl h-[40px] p-[10px]">
                <!-- message -->
                <label for="message" class="text-2xl mt-[20px]">Message</label><br>
                <textarea type="text" id="message" placeholder="Entrez votre message" class="border-2 border-black w-[65%] bg-gray-300 rounded w-[100%] rounded-xl h-[200px] p-[10px]"></textarea>
            </div>
            <!-- submit -->
            <div class="grid place-items-center mt-[50px]">
                <input class="mt-[-30px] text-white bg-[#3B4568] rounded-[20px] border-solid border-2 border-black px-[35px] py-[13px] md:px-[55px] md:py-[15px] md:text-2xl lg:px-[60px] lg:py-[20px] lg:text-4xl xl:px-[60px] xl:py-[20px] xl:text-4xl cursor-pointer hover:bg-[#262C42]" type="submit" value="Valider">
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