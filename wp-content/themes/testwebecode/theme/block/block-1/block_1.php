<?php 

$title = get_field('title'); // Titre: champ "texte", nom "title"
$description = get_field('description'); // Description: champ "Éditeur WYSIWYG", nom "description"
$image = get_field('image'); // Image: champ "image", nom "image"
$link = get_field('button'); // Boutton: champ "lien", nom "button"
$use_custom_color = get_field('background_color'); // Couleur de fond: champ "True/False", nom "background_color"
$use_reverse = get_field('reverse_text_image'); // Option inverser l'image et le texte: champ "True/False", nom "reverse_text_image"

$background_class = $use_custom_color ? 'bg-white' : 'bg-primary';
$text_class = $use_custom_color ? 'text-primary' : 'text-white';

$display_class = $use_reverse ? 'md:flex-row-reverse' : 'md:flex-row';
?>


<section class="w-full md:pl-4">
    <div class="w-full flex flex-col-reverse <?php echo esc_attr($display_class); ?> justify-center items-center px-5 md:px-10 gap-10 md:gap-20 py-12 md:py-24 <?php echo esc_attr($background_class); ?>">
        <div class="flex flex-col md:px-6 md:w-[50%]">
            <h2 class="h2 uppercase mb-2 <?php echo esc_attr($text_class); ?>"><?php echo esc_html($title) ?></h2>
            <div class="paragraph flex flex-col gap-7 prose prose-p:m-0 prose-strong:<?php echo esc_attr($text_class); ?> <?php echo esc_attr($text_class); ?>">
                <?php echo $description; ?>
            </div>

            <?php 
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="py-4 px-28 mt-12 w-fit rounded-tl-2xl rounded-br-2xl button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>

        </div>
                
        <?php
        if ($image) :
            ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="rounded-md self-start md:self-center" />
        <?php endif; ?>
    </div>
    
</section>