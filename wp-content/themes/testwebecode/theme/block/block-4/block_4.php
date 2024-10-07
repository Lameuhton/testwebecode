<?php 
// Bloc accordéon avec menus cliquables déroulants

$title = get_field('title'); // Titre: champ "texte", nom "title"
$text = get_field('text'); // Texte: champ "zone de texte", nom "text"
$button = get_field('button'); // Lien: champ "lien", nom "button"
$options_repeater = get_field('options_repeater'); // Répéteur d'options (5 max): champ "répéteur", nom "options_repeater"
    // Sous-champs:
    // - Icone: champ "image", nom "icon"
    // - Titre: champ "texte", nom "title"
    // - Description: champ "Éditeur WYSIWYG", nom "description"
?>

<section class="sides-page-margin flex flex-col gap-10">
    <h2 class="h2 text-primary mb-5"><?php echo $title ?></h2>

    <div class="flex flex-col gap-5">
        <?php 
        if( $options_repeater ):
            for( $i = 0; $i < min(5, count($options_repeater)); $i++ ):
                $option = $options_repeater[$i];
                $option_title = $option['title'];
                $option_icon = $option['icon'];
                $option_description = $option['description'];
                ?>
                <div class="accordion-item border-b-2 border-primary">
                    <div class="flex gap-5 cursor-pointer accordion-header" onclick="toggleAccordion(this)">
                        <?php if( $option_icon ): ?>
                            <img src="<?php echo esc_url($option_icon['url']); ?>" alt="<?php echo esc_attr($option_icon['alt']); ?>" class="mb-2 w-auto h-auto self-end">
                        <?php endif; ?>
                        <h3 class="h3 mb-2 self-center"><?php echo $option_title ; ?></h3>
                        <span class="ml-auto self-center icon">+</span>
                    </div>
                    <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300 paragraph prose">
                        <?php echo $option_description; ?> 
                    </div>
                </div>
                <?php
            endfor;
        endif;
        ?>
    </div>

    <p class="font-text text-xl"><?php echo $text ?></p>

    <?php 
    if( $button ): 
        $button_url = $button['url'];
        $button_title = $button['title'];
        $button_target = $button['target'] ? $button['target'] : '_self';
        ?>
        <a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
    <?php endif; ?>

</section>