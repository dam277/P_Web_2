<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors:{
                        'colorTrans': '#117964'
                    },
                    content: {
                    }
                }
            }
        }
    </script>
</head>

<body class="">
    <header>
        <?php
        include("../../include/header.php");
        ?>
    </header>
    <main>
        <div class="p-48 bg-green-400 dark:bg-red-400"></div>
        <div class="p-48 bg-green-500 dark:bg-red-500"></div>
        <div class="p-48 bg-green-600 dark:bg-red-600"></div>
        <div class="p-48 bg-green-700 dark:bg-red-700"></div>
        <div class="p-48 bg-green-800 dark:bg-red-800"></div>
        <div class="p-48 bg-green-900 dark:bg-red-900"></div>
    </main>
    <footer>

    </footer>
</body>

</html>