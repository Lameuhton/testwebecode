<!--
Bloc flexible qui ressemble au block 6 avec 3 cards

CHAMPS ACF:
- Champ type "Contenu flexible", libellé "Blocs de contenu", nom "content_blocks"
    - Disposition "Titre règles", nom "rules_title"
        - Champ type "Texte", libellé "Titre", nom "rules"
    - Disposition "Titre principal", nom "main_title"
        - Champ type "Texte", libellé "Titre", nom "title"
    - Disposition "Texte avec image", nom "text_with_image"
        - Champ type "Texte", libellé "Titre", nom "title"
        - Champ type "Image", libellé "Image", nom "image"
        - Champ type "Editeur WYSIWYG", libellé "Texte", nom "text"
        - Champ type "Liste déroulante", libellé "Variation du bloc", nom "block_style_1"
            Choix:
            style_1 : Titre + texte + image
            style_2 : Titre
    - Disposition "Bloc foncé avec chiffres", nom "dark_block_with_numbers"
        - Champ type "Editeur WYSIWYG", libellé "Titre", nom "title"
        - Champ type "Editeur WYSIWYG", libellé "Chiffre 1", nom "number_1"
        - Champ type "Editeur WYSIWYG", libellé "Chiffre 2", nom "number_2"
        - Champ type "Editeur WYSIWYG", libellé "Chiffre 3", nom "number_3"
    - Disposition "Bloc foncé sans chiffres", nom "dark_block_without_numbers"
        - Champ type "Editeur WYSIWYG", libellé "Titre", nom "title" 
    - Disposition "Texte centré avec bouton", nom "centered_text_with_button"
        - Champ type "Editeur WYSIWYG", libellé "Titre", nom "title"
        - Champ type "Lien", libellé "Bouton", nom "button"

-->
<?php if (have_rows('content_blocks')): ?>
    <section class="sides-page-margin flex flex-col md:grid md:grid-cols-12 gap-y-5 md:gap-y-0 md:gap-x-8 md:relative">

        <?php while (have_rows('content_blocks')): the_row(); ?>

            <?php
            // Récupération des variables pour chaque champ
            $layout = get_row_layout();
            $rules = get_sub_field('rules');
            $style_1 = get_sub_field('block_style_1');
            $style_2 = get_sub_field('block_style_2');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $number_1 = get_sub_field('number_1');
            $number_2 = get_sub_field('number_2');
            $number_3 = get_sub_field('number_3');
            $image = get_sub_field('image');
            $button = get_sub_field('button');
            ?>

            <!-- Block: Rules Title -->
            <?php if ($layout == 'rules_title'): ?>
                <div class="md:col-start-1 col-end-8 justify-end row-start-1 lg:pl-2 text-left relative md:top-[25px]">
                    <h2 class="font-text text-[20px] md:text-[40px] text-primary"><?php echo $rules; ?></h2>
                </div>

            <!-- Block 1: Text with Image -->
            <?php elseif ($layout == 'text_with_image'): ?>
                      
                <?php if ($style_1 == 'style_1'): ?>
                    <div class="col-start-8 col-end-13 px-8 pb-10 pt-8 md:pb-12 md:pt-16 py-10 border border-primary rounded-3xl relative z-10 md:left-[10px] md:bottom-[-90px] <?php echo ($style_1 == 'style_2') ? 'text-center' : 'text-left'; ?>">
                        <!-- Style 1: Title aligned left, image top-right -->
                        <div class="flex md:justify-between mb-6 pl-3 md:pl-0 md:mb-0 items-end md:items-start md:max-w-[75%] lg:max-w-full">
                            <?php if( $image ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="max-w-[15%] md:max-w-[20%] md:max-w-auto md:absolute md:top-[20px] medium:left-[30px] left-[20px] mr-6 md:mr-0">
                            <?php endif; ?>
                            <p class="font-text text-xl font-bold md:pl-16 medium:pl-24 text-secondary"><?php echo $title; ?></p>
                        </div>
                        <div class="font-text mt-2 pl-6 md:pl-16 medium:pl-24 leading-5 prose">               
                            <?php echo $text; ?>
                        </div>
                    </div>

                <?php elseif ($style_1 == 'style_2'): ?>
                    <div class="col-start-9 col-end-13 px-10 md:pb-16 md:pt-16 py-10 border border-primary rounded-3xl relative z-10 md:left-[10px] md:top-[20px] text-center">
                        <!-- Style 2: Title centered, image below, description hidden -->
                        <p class="font-text text-xl font-bold text-primary"><?php echo $title; ?></p>
                        <!-- Hide description for style 2 -->
                    </div>

                <?php endif; ?>

            <!-- Block: Main Title -->
            <?php elseif ($layout == 'main_title'): ?>
                <div class="md:col-start-1 col-end-8 row-start-1 lg:pl-2 text-left md:relative z-10 md:top-[75px] mb-5 md:mb-0">
                    <h2 class="h2 font-bold text-primary"><?php echo $title; ?></h2>
                </div>
                
            <!-- Block 2: Dark block with numbers  -->
            <?php elseif ($layout == 'dark_block_with_numbers'): ?>
                <div class="col-start-1 col-end-9 flex flex-col gap-2 px-8 py-10 rounded-3xl shadow-xl md:relative z-20 md:top-[-50px] text-white bg-primary text-center items-center">
                    <div class="font-text text-3xl mb-8 prose text-white text-center">
                        <?php echo $title; ?>
                    </div>
                    <div class="font-text medium:grid medium:grid-cols-3 flex flex-col md:flex-row flex-nowrap md:justify-center md:flex-wrap gap-7 w-full text-center">
                        <div class="font-text text-[52px] text-white prose leading-8 prose-strong:text-white">
                            <?php echo $number_1; ?>
                        </div>
                        <div class="font-text text-[52px] text-white prose leading-8 prose-strong:text-white">
                            <?php echo $number_2; ?>
                        </div>
                        <div class="font-text text-[52px] text-white prose leading-8 prose-strong:text-white">
                            <?php echo $number_3; ?>
                        </div>
                    </div>
                </div>

            <!-- Block 2: Dark block without numbers -->
            <?php elseif ($layout == 'dark_block_without_numbers'): ?>
                 <div class="font-text text-[18px] text-content col-start-1 col-end-10 flex flex-col gap-4 px-7 md:py-16 py-10 rounded-3xl shadow-xl md:relative z-20 md:bottom-[40px] text-white bg-primary prose prose-p:m-0 leading-6 prose-">
                    <?php echo $text; ?>
                </div>

            <!-- Block 4: Centered Text with Button -->
            <?php elseif ($layout == 'centered_text_with_button'): ?>
                <div class="col-start-6 col-end-11 px-6 pb-6 md:pb-10 pt-10 md:pt-20 text-center rounded-3xl bg-white shadow-xl md:relative z-10 md:bottom-[80px] flex flex-col justify-center items-center">
                    <div class="font-text text-2xl mb-4 prose w-[90%]">
                        <?php echo $title; ?>
                    </div>
                    <?php
                    if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <a class="text-white font-text bg-gradient-to-r from-accent to-secondary rounded-xl inline-block px-12 py-3 " href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>
    </section>
<?php endif; ?>
