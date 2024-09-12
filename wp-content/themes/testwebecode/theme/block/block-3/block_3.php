<?php

$title = get_field('title'); // Titre: champ "texte", nom "title"
$description = get_field('description'); // Description: champ "Éditeur WYSIWYG", nom "description"
$link = get_field('link'); // Lien: champ "lien", nom "link"
$services = get_field('repeater_services'); // Répéteur pour services (3 premières max): champ "répéteur", nom "repeater_services"
    // Sous-champs:
    // - Icone: champ "image", nom "icon"
    // - Titre: champ "texte", nom "title"
    // - Description: champ "zone de texte", nom "description"

?>

<section class="w-full sides-page-margin flex flex-col">
    <div class="flex flex-col gap-3">
        <h2 class="h2 text-primary prose"><?php echo $title ?></h2>
        <div class="paragraph flex flex-col gap-7 prose prose-p:m-0 text-primary lg:w-[75%]">
            <?php echo wp_kses_post($description); ?>
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
    

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 my-12 lg:my-20">
        <?php 
        if( $services ):
            for( $i = 0; $i < min(4, count($services)); $i++ ):
                $service = $services[$i];
                $service_icon = $service['icon'];
                $service_title = $service['title'];
                $service_description = $service['description'];
                ?>
                <div class="flex flex-col items-center">
                    <?php if( $service_icon ): ?>
                        <img src="<?php echo esc_url($service_icon['url']); ?>" alt="<?php echo esc_attr($service_icon['alt']); ?>" class="mb-2 w-auto h-auto">
                    <?php endif; ?>
                    <h3 class="h3 mb-2"><?php echo $service_title; ?></h3>
                    <p class="paragraph text-center"><?php echo $service_description; ?></p>
                </div>
                <?php
            endfor;
        endif;
        ?>
    </div>
</section>
