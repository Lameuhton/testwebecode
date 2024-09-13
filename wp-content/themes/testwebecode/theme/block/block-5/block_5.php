<?php 

$title = get_field('title'); // Titre: champ "Éditeur WYSIWYG", nom "title"
$description = get_field('description'); // Description: champ "Éditeur WYSIWYG", nom "description"
$button = get_field('button'); // Lien: champ "lien", nom "button"
$cards_repeater = get_field('cards_repeater'); // Répéteur de cards: champ "répéteur", nom "cards_repeater"
    // Sous-champs:
    // - Titre: champ "texte", nom "title"
    // - Sous-titre: champ "texte", nom "subtitle"
    // - Description: champ "Éditeur WYSIWYG", nom "description"
$last_card_option = get_field('last_card_option'); // Option couleur de fond dernière card: champ "True/False", nom "last_card_option"
?>

<section class="sides-page-margin flex flex-col gap-10">
    <h2 class="h2 text-primary mb-5 prose"><?php echo $title ?></h2>

    <div class="paragraph flex flex-col gap-7 prose prose-p:m-0 text-primary">
        <?php echo $description; ?>
    </div>
    
    <?php 
    if( $button ): 
        $button_url = $button['url'];
        $button_title = $button['title'];
        $button_target = $button['target'] ? $button['target'] : '_self';
        ?>
        <a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
    <?php endif; ?>

    <div class="flex flex-col gap-5">
        <?php 
        if( $cards_repeater ):
            for( $i = 0; $i < min(5, count($cards_repeater)); $i++ ):
                $card = $cards_repeater[$i];
                $card_title = $card['title'];
                $card_subtitle = $card['subtitle'];
                $card_description = $card['description'];
                ?>
                <div class="border-[3px] border-primary rounded-3xl px-10 py-7 min-h-[550px]">
                    <div class="flex flex-col gap-3">
                        <h3 class="h3 mb-2"><?php echo $card_title ; ?></h3>
                        <p class="font-text"><?php echo $card_subtitle ; ?></p>
                        <div class="paragraph prose">
                            <?php echo $card_description; ?> 
                        </div>
                    </div>
                </div>
                <?php
            endfor;
        endif;
        ?>
    </div>

</section>