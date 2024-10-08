<?php 
// Bloc avec titre, description, bouton à gauche et image à droite

$image = get_field('image'); // Image: champ "image", nom "image"
$title = get_field('title'); // Titre: champ "texte", nom "title"
$subtitle_1 = get_field('subtitle_1'); // Sous-titre 1: champ "texte", nom "subtitle_1"
$description_subtitle_1 = get_field('description_subtitle_1'); // Description sous-titre 1: champ "zone de texte", nom "description_subtitle_1"
$button_1 = get_field('button_1'); // Bouton 1: champ "lien", nom "button_1"
$subtitle_2 = get_field('subtitle_2'); // Sous-titre 2: champ "texte", nom "subtitle_2"
$description_subtitle_2 = get_field('description_subtitle_2'); // Description sous-titre 2: champ "zone de texte", nom "description_subtitle_2"
$button_2 = get_field('button_2'); // Bouton 2: champ "lien", nom "button_2"
$subtitle_3 = get_field('subtitle_3'); // Sous-titre 3: champ "texte", nom "subtitle_3"
$description_subtitle_3 = get_field('description_subtitle_3'); // Description sous-titre 3: champ "zone de texte", nom "description_subtitle_3"
$button_3 = get_field('button_3'); // Bouton 3: champ "lien", nom "button_3"
?>


<section class="sides-page-margin grid grid-cols-12 grid-row-2 items-center w-full my-44 gap-x-5">
    <div class="col-start-1 col-end-6 row-start-1 row-end-3">
        <?php
        if ($image) :
            ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full" />
        <?php endif; ?>
    </div>

    <div class="flex flex-col col-start-7 col-end-13 row-start-1 row-end-2">
        <h2 class="h2"><?php echo esc_html($title) ?></h2>
    </div>

    <div class="col-start-2 col-end-13 row-start-2 row-end-3 bg-white grid grid-cols-3 gap-x-10 px-12 py-9">
        <div class="flex flex-col gap-1 px-3">
            <h3 class="h3"><?php echo esc_html($subtitle_1) ?></h3>
            <p class="paragraph"><?php echo $description_subtitle_1; ?></p>
            <?php 
            if( $button_1 ): 
                $link_url = $button_1['url'];
                $link_title = $button_1['title'];
                $link_target = $button_1['target'] ? $button_1['target'] : '_self';
                ?>
                <a class="font-text flex gap-3 items-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <p><?php echo esc_html( $link_title ); ?></p>
                    <p class="text-[24px]">&#8594;</p>
                </a>
            <?php endif; ?>
        </div>
        <div class="flex flex-col gap-1 px-3">
            <h3 class="h3"><?php echo esc_html($subtitle_2) ?></h3>
            <p class="paragraph"><?php echo $description_subtitle_2; ?></p>
            <?php 
            if( $button_2 ): 
                $link_url = $button_2['url'];
                $link_title = $button_2['title'];
                $link_target = $button_2['target'] ? $button_2['target'] : '_self';
                ?>
                <a class="font-text flex gap-3 items-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <p><?php echo esc_html( $link_title ); ?></p>
                    <p class="text-[24px]">&#8594;</p>
                </a>
            <?php endif; ?>
        </div>
        <div class="flex flex-col gap-1 px-3">
            <h3 class="h3"><?php echo esc_html($subtitle_3) ?></h3>
            <p class="paragraph"><?php echo $description_subtitle_3; ?></p>
            <?php 
            if( $button_3 ): 
                $link_url = $button_3['url'];
                $link_title = $button_3['title'];
                $link_target = $button_3['target'] ? $button_3['target'] : '_self';
                ?>
                <a class="font-text flex gap-3 items-center" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <p><?php echo esc_html( $link_title ); ?></p>
                    <p class="text-[24px]">&#8594;</p>
                </a>
            <?php endif; ?>
        </div>
    </div>
 
</section>
