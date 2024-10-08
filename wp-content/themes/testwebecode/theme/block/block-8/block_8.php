<!--
Bloc flexible avec plusieurs cards qui comparent site web normal et site web éco-responsable
- Pour l'animation des boutons, j'ai utilisé du JS pour déplacer le slider et changer la couleur des boutons (script.js)
- Pour les cercles, j'ai utilisé du CSS et du JS (components.css)

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
    <section class="sides-page-margin flex flex-col md:grid md:grid-cols-12 gap-y-5 md:gap-y-0 md:gap-x-4 md:relative font-text mb-16game">

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
                <div class="md:col-span-12 row-start-1 flex flex-col md:flex-row justify-between rounded-3xl text-white bg-primary px-7 md:pl-8 md:pr-8 medium:pr-16 pt-11 pb-10 md:pb-24 md:relative top-[35px] z-10">
                    <div class="flex flex-col justify-center medium:justify-between items-start gap-12 medium:gap-6">
                        <!-- Toggle buttons -->
                        <div id="toggle" class="relative w-full text-[14px] sm:text-[16px] sm:w-[80%] medium:w-[425px] bg-white rounded-full flex items-center justify-between self-center py-2">
                            <div id="slider" class="absolute h-full w-[50%] bg-gradient-to-r from-[#058D8F] to-[#036855] rounded-full transition-all duration-300 "></div>
                            <button id="btn1" class="relative z-10 w-1/2 text-center text-white font-bold active"><?php echo $option_1; ?></button>
                            <button id="btn2" class="relative z-10 w-1/2 text-center text-primary font-bold"><?php echo $option_2; ?></button>
                        </div>

                        <div class="comparison-grid medium:grid medium:grid-cols-3 flex flex-wrap-reverse self-center justify-center gap-5 medium:gap-8 mb-10 md:mb-0">
                            <!-- Comparaison 1: Consommation d'énergie -->
                            <div class="comparison-item flex flex-col items-center">
                                <div class="circular-progress">
                                    <svg>
                                        <circle cx="50" cy="50" r="45"></circle>
                                        <circle cx="50" cy="50" r="45" id="energy-circle"></circle>
                                    </svg>
                                    <div class="number">
                                        <h2 id="energy-value">2.5 kWh</h2>
                                    </div>
                                </div>
                                <p class="mt-4 font-semibold">Énergie consommée</p>
                            </div>

                            <!-- Comparaison 2: Émissions de CO₂ -->
                            <div class="comparison-item flex flex-col items-center">
                                <div class="circular-progress">
                                    <svg>
                                        <circle cx="50" cy="50" r="45"></circle>
                                        <circle cx="50" cy="50" r="45" id="co2-circle"></circle>
                                    </svg>
                                    <div class="number">
                                        <h2 id="co2-value">1.76 g CO₂</h2>
                                    </div>
                                </div>
                                <p class="mt-4 font-semibold">Émissions de CO₂</p>
                            </div>

                            <!-- Comparaison 3: Poids de la page -->
                            <div class="comparison-item  flex flex-col items-center">
                                <div class="circular-progress">
                                    <svg>
                                        <circle cx="50" cy="50" r="45"></circle>
                                        <circle cx="50" cy="50" r="45" id="weight-circle"></circle>
                                    </svg>
                                    <div class="number">
                                        <h2 id="weight-value">3 Mo</h2>
                                    </div>
                                </div>
                                <p class="mt-4 font-semibold">Poids de la page</p>
                            </div>
                        </div>

                    </div>

                    <!-- Description block on the right -->
                    <p class="text-white px-7 md:px-10 py-9 md:py-12 border border-white rounded-3xl md:w-[40%] text-[18px] md:text-[20px]"><?php echo $description; ?></p>
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
                <div class="md:col-span-5 bg-white rounded-3xl shadow-xl pt-10 md:pt-20 md:pb-7 md:pl-9 md:pr-3 px-7 text-primary z-20">
                    <p class="text-[20px] sm:text-[24px] font-bold mb-4"><?php echo $title; ?></p>
                    <div class="">
                        <p class="mb-1 text-[18px]"><?php echo $subtitle_1; ?></p>
                        <div class="w-[50%] h-6 mb-1 bg-white border border-[#036855] rounded-full overflow-hidden relative">
                            <div class="h-full bg-primary w-[30%] rounded-full"></div>
                        </div>
                        <p class="text-[16px] mb-8"><?php echo $info_1; ?></p>
                    </div>
                    <div class="">
                        <p class="mb-1 text-[18px]"><?php echo $subtitle_2; ?></p>
                        <div class="w-[50%] h-6 mb-1 bg-white border border-[#036855] rounded-full overflow-hidden relative">
                            <div class="h-full bg-primary w-[75%] rounded-full"></div>
                        </div>
                        <p class="mb-8 text-[16px]"><?php echo $info_2; ?></p>
                    </div>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>
    </section>
<?php endif; ?>
