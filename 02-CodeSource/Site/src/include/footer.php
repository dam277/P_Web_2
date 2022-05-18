<!--
    ETML
    Auteur : Noa Chouriberry
    Date : 04.05.22
    Description : Bas de page de notre site web
-->

<!-- Footer du site web -->
<footer class="selection:bg-neutral-200 selection:text-gray-600 bottom-0 left-0  h-5/6 bg-zinc-800 text-center text-white">
  <!-- Conteneur des éléments du footer -->
  <div class="container p-4 mx-auto">
    <!-- Nombre de colonnes dans le footer et marge en hauteur -->
    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 mt-5">
      <!-- Bloc pour les premières lignes (contributeurs)-->
      <div>
        <!-- Titre de la section (Contributeurs) -->
        <h5>Contributeurs</h5>
        <!-- Ligne en dessous du texte "contributeurs": texte en gris foncé, quand l'on passe le curseur dessus il ne se passe rien -->
        <p class="text-gray-500 -mt-3 hover:cursor-default select-none">_______</p>
        <!-- Liste à puce pour la liste d'éléments du bloc - Noms et prénoms des contributeurs -->
        <ul class="list-none mt-3 mb-3 space-y-2 ">
          <!-- Premier contributeur -->
          <li>
            <p class="hover:text-cyan-400"><a href="mailto:damien.loup@eduvaud.ch">Damien Loup</a></p>
          </li>
          <!-- Deuxième contributeur -->
          <li>
          <p class="hover:text-cyan-400"><a href="mailto:thomas.rey@eduvaud.ch">Thomas Rey</a></p>
          </li>
          <li>
          <!-- Bouton pour revenir en haut de la page -->
           <div onclick="goUp()" class="hover:bg-zinc-500 hover:transition-all hover:cursor-pointer self-center rotate-180 ml-11 -mt-10 bg-neutral-600 dark:bg-slate-800 p-2 w-10 h-10 ring-1 ring-slate-900/5 dark:ring-slate-200/20 shadow-lg rounded-full flex items-center justify-center border-1 border-black">
              <!-- Paramètres de la flèche (couleur etc..) -->
               <svg class="w-6 h-6 text-stone-300 " fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"> -->
                <!-- Création de la flèche du bouton (mise en forme) -->
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
              </svg>
           </div>
            <!-- Troisième contributeur -->
            <p class="hover:text-cyan-400"><a href="mailto:aurelien.devaud@eduvaud.ch">Aurélien Dévaud</a></p>
          </li>
          <!-- Quatrième contributeur -->
          <li>
          <p class="hover:text-cyan-400"><a href="mailto:noa.chouriberry@eduvaud.ch">Noa Chouriberry</a></p>
          </li>
        </ul>
      </div>
      <!-- Deuxième bloc de contenu du footer (Pages)-->
      <div class="mb-6">
      <!-- Titre de la section (Pages)-->
        <h5>Pages</h5>
        <!-- Soulignement du titre -->
        <p class="text-gray-500 -mt-3 hover:cursor-default select-none">___</p>
        <!-- Liste à puce qui contient les pages accessibles -->
        <ul class="list-none mt-3 space-y-2">
          <!-- Page d'accueil -->
          <li>
            <a href="../../../../../index.php?action=goHome" class="hover:text-gray-300 select-none">Accueil</a>
          </li>
          <!-- Page des ouvrages -->
          <li>
            <a href="../../../../../index.php?action=bookList" class="hover:text-gray-300 select-none">Ouvrages</a>
          </li>
          <!-- Page pour ajouter un livre -->
          <li>
            <a href="../../../../../index.php?action=addBook" class="hover:text-gray-300 select-none">Ajouter un livre</a>
          </li>
        </ul>
      </div>
      <!-- Troisième bloc de contenu du footer (A propos)-->
      <div class="mb-6"> 
      <!-- Titre de la section (A propos du projet) -->
        <h5>A propos du projet</h5>
        <!-- Soulignement du titre -->
        <p class="text-gray-500 -mt-3 hover:cursor-default select-none">__________</p>
        <!-- Liste à puce qui contient des informations à propos du projet (lieu, description) -->
        <ul class="list-none mt-3 space-y-2">
        <!-- Lieu de déroulement du projet -->
          <li>
            <p>Projet ETML - Suisse</p>
          </li>
          <!-- Description du projet -->
          <li>
            <p>Créer un site web dynamique ayant pour but de stocker des ouvrages dans une base de données et gérer
            le site avec les différents droits admis.</p>
          </li>
        </ul>
      </div>
      <!-- Quatrième bloc de contenu du footer (Contact)-->
      <div class="mb-6">
        <!-- Titre de la section (Nous envoyer un message) -->
        <h5>Nous envoyer un message</h5>
        <!-- Soulignement du titre -->
        <p class="text-gray-500 -mt-3 hover:cursor-default select-none">_____________</p>
        <!-- Liste qui contient le bouton "Accéder à la page" pour accéder à la page contact (dans une liste pour la mise en page) -->
        <ul class="list-none mt-3 space-y-2">
          <li>
            <!-- Bouton "Accéder à la page" -->
            <a href="../../../../../index.php?action=contactUs"><button class="mt-6 bg-transparent text-gray-300 hover:text-gray-200 py-2 px-5 border-2 border-gray-400 hover:border-white rounded">Accéder à la page</button></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Bas du footer (année, école, projet et initiales des contributeurs) -->
  <div class="text-center p-4 -mt-2 mt-2hover:cursor-default text-xl">
    <!-- Texte -->
    <hr class="text-gray-400 -mt-4 mb-4">
    © 2022 ETML - P_Web_2 - DL TR AD NC
  </div>
</footer>
<!-- Utilisation de JavaScript -->
<script>
/* Fonction JS pour aller en haut de la page en cliquant sur le bouton flèche ^ */
  function goUp() {
    /* Aller tout en haut de la page (animation) */
    window.scrollTo({top: 0, behavior: 'smooth'});
  }
</script>