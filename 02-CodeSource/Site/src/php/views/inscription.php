<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="duration-[0.5s] dark:bg-gray-700 dark:text-gray-400 bg-[url('../../../resources/background.png')] dark:bg-[url('../../../resources/backgroundDark.png')]">
    <header>
        <?php
        include("../../include/header.php");
        ?>
    </header>
    <main class="grid place-items-center">
        <!-- TITRE -->
        <h1 class="text-4xl md:text-6xl lg:text-8xl xl:text-8xl text-white text-center bg-[#0A183C] w-full py-[200px]">INSCRIPTION</h1>
        <!-- INSCRIPTION -->
        <div class="sm:w-[350px] md:w-[400px] lg:w-[450px] xl:w-[500px] h-[650px] mt-[100px] bg-gradient-to-b from-[#05687E] to-[#C1E0E7] rounded-[25px] text-center text-black">
            <!-- titre -->
            <p class="sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl">S'inscrire</p>
            <div class="flex mt-[10px]">
                <div class="w-[25%] sm:w-[33%]"></div>
                <div class="w-[50%] sm:w-[33%] border-b-[1px] border-black"></div>
                <div class="w-[25%] sm:w-[33%]"></div>
            </div>
            <form action="" method="POST" class="">
                <!-- pseudo -->
                <div class="mt-[100px] flex">
                    <div class="sm:w-[15%] md:w-[20%] lg:w-[25%]"></div>
                    <img src="../../../resources/userimg.png" alt="icon user" class="border-b-[1px] border-black">
                    <label for="useNickname" class="border-b-[1px] border-black">Nom :<input type="text" name="useNickname" class="bg-[transparent] ml-[10px]"></label>
                </div>
                <!-- password -->
                <div class="mt-[100px] flex">
                    <div class="sm:w-[15%] md:w-[20%] lg:w-[25%]"></div>
                    <img src="../../../resources/lock.png" alt="icon user" class="border-b-[1px] border-black">
                    <label for="usePasswordHash" class="border-b-[1px] border-black">MDP :<input type="text" name="usePasswordHash" class="bg-[transparent] ml-[10px]"></label>
                </div>
                <!-- check password -->
                <div class="mt-[100px] flex">
                    <div class="sm:w-[3%] md:w-[10%] lg:w-[15%]"></div>
                    <img src="../../../resources/lock.png" alt="icon user" class="border-b-[1px] border-black">
                    <label for="verifiePassword" class="border-b-[1px] border-black">Confimrer MDP :<input type="text" name="verifiePassword" class="bg-[transparent] ml-[10px]"></label>
                </div>
                <!-- submit -->
                <div class="grid place-items-center mt-[100px]">
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