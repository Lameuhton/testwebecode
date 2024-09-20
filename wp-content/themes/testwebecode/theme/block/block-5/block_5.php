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
    <h2 class="h2 text-primary prose"><?php echo $title ?></h2>

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


    <div id="cards">
        <?php 
        if( $cards_repeater ):
            for( $i = 0; $i < count($cards_repeater); $i++ ):
                $card = $cards_repeater[$i];
                $card_title = $card['title'];
                $card_subtitle = $card['subtitle'];
                $card_description = $card['description'];
                
                // Déterminer si c'est la dernière carte et si l'option est activée
                $is_last_card = ($i === count($cards_repeater) - 1 && $last_card_option);
                $card_bg_class = $is_last_card ? 'bg-primary' : 'bg-white';
                $text_class = $is_last_card ? 'text-white' : 'text-primary';
                $card_id = "card-" . ($i + 1); // Générer un ID unique
                ?>
                <div id="<?php echo $card_id; ?>" class="card">
                    <div class="card-body flex flex-col justify-between border-[3px] border-primary rounded-3xl px-14 py-16 <?php echo $card_bg_class; ?>">
                        <div class="flex flex-col gap-3 w-[75%]">
                            <h3 class="h3 mb-2 <?php echo $text_class; ?>"><?php echo $card_title ; ?></h3>
                            <p class="font-text text-lg <?php echo $text_class; ?>"><?php echo $card_subtitle ; ?></p>
                            <div class="paragraph prose <?php echo $is_last_card ? 'prose-invert' : ''; ?>">
                                <?php echo $card_description; ?> 
                            </div>
                        </div>
                        <p class="font-text text-[64px] <?php echo $text_class; ?>">0<?php echo $i+1; ?></p>
                    </div>
                </div>
                <?php
            endfor;
        endif;
        ?>
    </div> 

    

</section>
