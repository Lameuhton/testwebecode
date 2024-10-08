<?php 
// Bloc avec titre, description, bouton à gauche et image à droite

$title = get_field('title'); // Titre: champ "texte", nom "title"
$description = get_field('description'); // Description: champ "Zone de texte", nom "description"
$image = get_field('image'); // Image: champ "image", nom "image"
$link = get_field('button'); // Boutton: champ "lien", nom "button"
?>


<section class="w-full relative my-44">
    <!-- Rectangle bleu en arrière-plan -->
    <div class="absolute bottom-0 right-0 w-[30%] h-[900px] bg-primary z-0 hidden md:block"></div>

    <div class="sides-page-margin flex flex-col gap-5 md:gap-0 md:grid md:grid-cols-12 items-center relative z-10">
        <div class="flex flex-col col-start-1 col-end-6 order-2 md:order-none">
            <h1 class="h1 mb-3"><?php echo esc_html($title) ?></h1>
            <div class="font-text text-[20px] leading-[24px] flex flex-col gap-7 prose prose-p:m-0">
                <?php echo $description; ?>
            </div>

            <?php 
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="mt-8 button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>

        <div class="order-1 md:order-none col-start-7 col-end-13 relative z-10">
            <?php
            if ($image) :
                ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full" />
            <?php endif; ?>
        </div>
    </div>
</section>
