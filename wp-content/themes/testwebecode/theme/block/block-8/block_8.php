<!--
Bloc flexible avec plusieurs cards qui comparent site web normal et site web éco-responsable

CHAMPS ACF:
- Champ type "Contenu flexible", libellé "Blocs de contenu", nom "content_blocks"
    - Disposition "Bloc comparaison site", nom "block_comparison_site"
        - Champ type "Texte", libellé "Option 1", nom "option_1"
        - Champ type "Texte", libellé "Option 2", nom "option_2"
        - Champ type "Image", libellé "Image", nom "image"
        - Champ type "Zone de texte", libellé "Description", nom "description"
    - Disposition "Texte avec bouton", nom "block_text_with_button"
        - Champ type "Editeur WYSIWYG", libellé "Description", nom "description"
        - Champ type "lien", libellé "Bouton", nom "button"
    - Disposition "Bloc comparaison chargement page", nom "page_loading_comparison_block"
        - Champ type "Texte", libellé "Titre", nom "title"
        - Champ type "Texte", libellé "Sous-titre 1", nom "subtitle_1"
        - Champ type "Texte", libellé "Sous-titre 2", nom "subtitle_2"
        - Champ type "Texte", libellé "Info 1", nom "info_1"
        - Champ type "Texte", libellé "Info 2", nom "info_2"
-->
<?php if (have_rows('content_blocks')): ?>
    <section class="sides-page-margin flex flex-col md:grid md:grid-cols-12 gap-y-5 md:gap-y-0 md:gap-x-4 md:relative font-text">

        <?php while (have_rows('content_blocks')): the_row(); ?>

            <?php
            // Récupération des variables pour chaque champ
            $layout = get_row_layout();
            $option_1 = get_sub_field('option_1');
            $option_2 = get_sub_field('option_2');
            $image = get_sub_field('image');
            $description = get_sub_field('description');
            $title = get_sub_field('title');
            $subtitle_1 = get_sub_field('subtitle_1');
            $subtitle_2 = get_sub_field('subtitle_2');
            $info_1 = get_sub_field('info_1');
            $info_2 = get_sub_field('info_2');
            $button = get_sub_field('button');
            ?>

            <!-- Block: Comparison site -->
            <?php if ($layout == 'block_comparison_site'): ?>
                <div class="md:col-span-12 row-start-1 flex justify-between rounded-3xl text-white bg-primary">
                    <div class="flex flex-col gap-6">
                       <div class="bg-white flex p-2 rounded-full font-semibold">
                            <p class="bg-gradient-to-r from-[#058D8F] to-[#036855] text-white rounded-3xl p-2 "><?php echo $option_1; ?></p>
                            <p class="p2 text-primary"><?php echo $option_2; ?></p>
                        </div>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="rounded-3xl" />
                    </div>
                    
                    <p class="text-white px-5 py-8 border border-white rounded-3xl w-[20%]"><?php echo $description; ?></p>
                </div>

            <!-- Block: text with button -->
            <?php elseif ($layout == 'block_text_with_button'): ?>
                <div class="md:col-span-6 self-center rounded-3xl border border-primary px-7 md:px-10 pb-8 pt-11">
                    <div class="font-text text-[20px] mb-6 prose leading-6">
                        <?php echo $description; ?>
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
                
            <!-- Block: page loading comparison -->
            <?php elseif ($layout == 'page_loading_comparison_block'): ?>
                <div class="md:col-span-5 bg-white rounded-3xl shadow-xl md:pt-20 md:pb-9 pl-10 text-primary">
                    <p class="text-[24px] font-bold mb-8 "><?php echo $title; ?></p>
                    <div class="text-[18px]">
                        <p class="mb-1"><?php echo $subtitle_1; ?></p>
                        <div class="w-[50%] h-6 bg-white border-2 border-[#036855] rounded-full overflow-hidden relative">
                            <div class="h-full bg-primary w-[30%] rounded-full"></div>
                        </div>
                        <p class="mb-8"><?php echo $info_1; ?></p>
                    </div>
                    <div class="text-[18px]">
                        <p class="mb-1"><?php echo $subtitle_2; ?></p>
                        <div class="w-[50%] h-6 bg-white border-2 border-[#036855] rounded-full overflow-hidden relative">
                            <div class="h-full bg-primary w-[75%] rounded-full"></div>
                        </div>
                        <p class="mb-8"><?php echo $info_2; ?></p>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>
    </section>
<?php endif; ?>
