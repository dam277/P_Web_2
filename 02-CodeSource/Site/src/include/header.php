<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'colorTrans': '#117964'
                },
                content: {}
            }
        },
        darkMode: 'class'
    }
</script>

<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>

<?php 
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";

?>

<nav class="duration-[0.5s] dark:text-gray-400 dark:bg-gray-700 z-[12] mb-[40px] text-[25.6px] w-full fixed bg-white bg-opacity-[0.95] h-[50px] text-black text-center border-b-2 border-black">
    <div class="block absolute left-[20px] h-4 w-[300px] m-auto">
        <input class="block absolute h-[35px] w-[35px] top-[10px] z-[5] opacity-0 peer" type="checkbox">
        <div class="block h-[4px] w-[35px] absolute z-[2] top-[17px] rounded-[10px] bg-black origin-[0%_0%] duration-[0.4s] peer-checked:rotate-[35deg] dark:bg-gray-400"></div>
        <div class="block h-[4px] w-[35px] absolute z-[2] top-[26.5px] rounded-[10px] bg-black duration-[0.2s] peer-checked:scale-y-0 dark:bg-gray-400"></div>
        <div class="block h-[4px] w-[35px] absolute z-[2] top-[36px] rounded-[10px] bg-black origin-[0%_100%] duration-[0.4s] peer-checked:rotate-[-35deg] dark:bg-gray-400"></div>
        <ul class="pt-[100px] bg-white h-[100vh] w-[300px] right-[300px] translate-x-[-150%] ml-[0px] pl-[50px] duration-[0.5s] shadow-2xl peer-checked:translate-x-[-55px] dark:bg-gray-700">
            <li class="mb-[1.5rem] text-[1.3rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=goHome">Accueil</a></li>
            <li class="mb-[1.5rem] text-[1.3rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans">Ouvrages</a>
                <ul>
                <?php
                    if ($_SESSION["isConnected"] == true) 
                    {
                    ?>
                    <li class="mb-[1rem] text-[0.8rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=addBook">Ajouter un ouvrage</a></li>
                    <?php
                    }
                    ?>
                    <li class="mb-[1rem] text-[0.8rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=bookList">Tous les ouvrages</a></li>
                </ul>
            </li>
            <li class="mb-[1.5rem] text-[1.3rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=contactUs">Nous contacter</a></li>
            <hr class="border-gray-400">
            <li class="mb-[1.5rem] text-[1.3rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans">Compte</a>
                <ul>
                    <?php
                    if ($_SESSION["isConnected"] == false) 
                    {
                    ?>
                    <li class="mb-[1rem] text-[0.8rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=logIn">Se connecter</a></li>
                    <li class="mb-[1rem] text-[0.8rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=signUp">S'inscrire</a></li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="mb-[1rem] text-[0.8rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=logOut">Se d??connecter</a></li>
                    <li class="mb-[1rem] text-[0.8rem]"><a class="dark:text-gray-400 text-black font-medium duration-[0.3s] hover:text-colorTrans" href="../../../../../index.php?action=userDetail&userId=<?=$_SESSION['user']['id']?>">Voir mon compte</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
    <div class="w-[0%] h-0"></div>
    <button id="theme-toggle" type="button" class="absolute left-[15%] top-[4px] text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
    </button>
    Passion lecture
    <div class="absolute right-[5%] h-4 w-[300px] top-[0%]">
        <input class="absolute h-[35px] w-[35px] top-[10px] z-[5] opacity-0 peer" type="checkbox">
        <img src="../../../resources/user.png" alt="Icon user" class="absolute top-[10px] h-[35px] w-[35px] left-[150px]">
        <ul class="rounded-b-xl relative left-[20px] top-[-5px] bg-white duration-[0.5s] invisible shadow-2xl opacity-0 peer-checked:visible peer-checked:translate-y-[50px] peer-checked:opacity-100 dark:text-gray-400 dark:bg-gray-700">
            <?php
            if ($_SESSION["isConnected"] == false) 
            {
            ?>
            <li class="text-[20.8px] font-medium"><button onclick="window.location.href = '../../../../../index.php?action=logIn';">Se connecter</button></a></li>
            <li class="text-[20.8px] font-medium"><button onclick="window.location.href = '../../../../../index.php?action=signUp';">S'inscrire</button></a></li>
            <?php
            }
            else
            {
            ?>
            <li class="text-[20.8px] font-medium underline"><?=$_SESSION["user"]["nickname"]?></li>
            <li class="text-[20.8px] font-medium"><button onclick="window.location.href = '../../../../../index.php?action=logOut';">Se d??connecter</button></a></li>
            <li class="text-[20.8px] font-medium"><button onclick="window.location.href = '../../../../../index.php?action=userDetail&userId=<?=$_SESSION['user']['id']?>';">Voir mon compte</button></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <h1 class="order-1 text-[36.8px] mb-[8px] mr-[20px] float-right">PL</h1>
</nav>

<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
</script>