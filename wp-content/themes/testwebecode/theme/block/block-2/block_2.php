<?php

$title = get_field('title'); // Titre: champ "texte", nom "title"
$description = get_field('description'); // Description: champ "Éditeur WYSIWYG", nom "description"
$link = get_field('link'); // Lien: champ "lien", nom "link"
$cards = get_field('repeater_cards'); // Répéteur de cards (6 max): champ "répéteur", nom "repeater_cards"
    // Sous-champs:
    // - Titre: champ "Éditeur WYSIWYG", nom "card_title"
    // - Icone: champ "image", nom "card_image"

?>

<section class="w-full sides-page-margin flex flex-col">
    <div class="flex flex-col gap-3">
        <h2 class="h2 text-primary prose"><?php echo $title ?></h2>
        <div class="paragraph flex flex-col gap-7 prose prose-p:m-0 text-primary">
            <?php echo $description; ?>
        </div>

        <?php 
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="font-text text-primary font-bold hover:underline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </div>
    

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-12">
        <?php 
        if( $cards ):
            for( $i = 0; $i < min(6, count($cards)); $i++ ):
                $card = $cards[$i];
                $card_title = $card['card_title'];
                $card_image = $card['card_image'];
                ?>
                <div class="card px-8 py-10 rounded-3xl grid grid-rows-2"> <!-- Classe "card" pour l'animation de hover -->
                    <?php if( $card_image ): ?>
                        <img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" class="mb-2 w-auto h-auto self-end">
                    <?php endif; ?>
                    <h3 class="h3 mb-2 prose self-center"><?php echo $card_title; ?></h3>
                </div>
                <?php
            endfor;
        endif;
        ?>
    </div>
</section>
