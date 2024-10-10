<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test_webecode
 */

// Déterminer la page actuelle
$is_contact_page = is_page('Contactez-nous');
$is_home_page = is_page('Exemple accueil');

// Définir la classe du <ul> en fonction de la page
$ul_class = 'menu flex flex-col md:flex-row items-center md:justify-start justify-end gap-8';
if ($is_contact_page) {
    $ul_class .= ' text-white'; // Ajoute "text-white" si on est sur la page Contact
}

// Changer le lien du logo en fonction de la page
$logo_link = $is_contact_page ? 'http://template-main.test/wp-content/uploads/2024/10/logo-webecode@3x-1-1.png' : 'http://template-main.test/wp-content/uploads/2024/10/logo-webecode@3x-1.png';
$bg_class = $is_contact_page ? 'bg-primary' : '';
?>

<header class="sides-page-margin w-full gap-14 flex items-baseline relative z-40 md:pt-12 md:pb-20 py-12<?php echo $bg_class ?>">
    <!-- Logo -->
    <div class="flex items-center">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo $logo_link ?>" alt="Logo" class="w-full">
        </a>
    </div>

    <!-- Bouton du menu burger pour mobile -->
    <div class="ml-auto md:hidden">
        <button id="burger-button" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav id="mobile-menu" class="fixed right-0 top-0 w-3/4 h-full bg-white transform translate-x-full transition-transform duration-300 ease-in-out z-50 md:relative md:transform-none md:translate-x-0 md:w-full md:bg-transparent md:h-auto md:flex justify-between font-text text-black">
        <div class="flex justify-end items-center px-5 pt-24 mb-5 md:hidden">
            <button id="close-button" class="text-black flex justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <?php
        // Capture la sortie du menu
        $menu = wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container'      => false, // Pas de div parent supplémentaire autour du menu
            'menu_class'     => $ul_class, // Classe CSS pour le menu
            'fallback_cb'    => false,
            'echo'           => false // Capture le HTML généré dans une variable
        ));

        // Diviser le contenu de la balise <ul> en éléments <li>
        preg_match('/<ul(.*?)>(.*?)<\/ul>/s', $menu, $matches); // Capture le contenu du <ul>
        $ul_content = $matches[2]; // Le contenu du <ul> (les <li>)

        // Séparer les éléments <li> du dernier élément
        $menu_items = explode("\n", trim($ul_content)); // Divise les <li> en un tableau
        $last_item = array_pop($menu_items); // Récupère et retire le dernier élément <li>

        // Affiche le <ul> avec tous les <li> sauf le dernier
        echo '<ul' . $matches[1] . '>';
        echo implode("\n", $menu_items); // Affiche les <li> sauf le dernier
        echo '</ul>';

        // Transformer le dernier <li> en div et l'afficher
        $last_item = preg_replace('/^<li(.*?)>(.*)<\/li>$/', '<div class="last-menu-item font-text text-primary md:text-white border md:border-white text-centerborder-primary px-3 md:px-10 py-3 mt-5 md:mt-0"$1>$2</div>', $last_item);
        echo $last_item; // Affiche le dernier élément en tant que div
        ?>
    </nav>
</header>

<!-- JavaScript pour contrôler l'ouverture/fermeture du menu mobile -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const burgerButton = document.getElementById('burger-button');
        const closeButton = document.getElementById('close-button');
        const mobileMenu = document.getElementById('mobile-menu');

        // Ouvrir le menu mobile
        burgerButton.addEventListener('click', function () {
            mobileMenu.classList.remove('translate-x-full');
        });

        // Fermer le menu mobile
        closeButton.addEventListener('click', function () {
            mobileMenu.classList.add('translate-x-full');
        });
    });
</script>
