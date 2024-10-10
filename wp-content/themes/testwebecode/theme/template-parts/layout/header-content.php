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
$ul_class = 'menu flex space-x-8 items-center justify-start gap-8';
if ($is_contact_page) {
    $ul_class .= ' text-white'; // Ajoute "text-white" si on est sur la page Contact
}

// Changer le lien du logo en fonction de la page
$logo_link = $is_contact_page ? 'http://template-main.test/wp-content/uploads/2024/10/logo-webecode@3x-1-1.png' : 'http://template-main.test/wp-content/uploads/2024/10/logo-webecode@3x-1.png';
$bg_class = $is_contact_page ? 'bg-primary' : '';
?>

<header class="hidden sides-page-margin w-full gap-14 flex items-baseline relative z-40 pt-12 pb-20 <?php echo $bg_class ?>">
    <!-- Logo -->
    <div class="flex items-center">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo $logo_link ?>" alt="Logo" class="w-full">
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex justify-between space-x-8 text-black w-full font-text">
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
        $last_item = preg_replace('/^<li(.*?)>(.*)<\/li>$/', '<div class="last-menu-item font-text text-white border border-white px-10 py-3"$1>$2</div>', $last_item);
        echo $last_item; // Affiche le dernier élément en tant que div
        ?>
    </nav>
</header>




<!-- #masthead -->
