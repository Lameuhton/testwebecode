<?php if (have_rows('content_blocks')): ?>
    <section class="sides-page-margin flex flex-col md:grid md:grid-cols-12 gap-y-5 md:gap-y-0 md:gap-x-8 md:relative">

        <?php while (have_rows('content_blocks')): the_row(); ?>

            <?php
            // Récupération des variables pour chaque champ
            $layout = get_row_layout();
            $style = get_sub_field('block_style');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image');
            $button = get_sub_field('button');
            ?>

            <!-- Block 1: Text with Image -->
            <?php if ($layout == 'text_with_image'): ?>
                      
                <?php if ($style == 'style_1'): ?>
                    <div class="col-start-1 md:col-end-6 lg:col-end-5 px-10 md:pb-12 md:pt-16 py-10 bg-white shadow-xl rounded-3xl relative z-10 md:left-[10px] md:top-[70px] <?php echo ($style == 'style_2') ? 'text-center' : 'text-left'; ?>">
                        <!-- Style 1: Title aligned left, image top-right -->
                        <div class="flex md:justify-between mb-3 md:mb-0 items-end md:items-start md:max-w-[75%] lg:max-w-full">
                            <?php if( $image ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="max-w-[20%] md:max-w-auto md:absolute md:top-[10px] md:right-10 mr-3 md:mr-0">
                            <?php endif; ?>
                            <p class="font-text text-xl font-bold text-secondary"><?php echo $title; ?></p>
                        </div>
                        <div class="font-text mt-2 md:max-w-[50%] lg:max-w-[75%] prose">
                            <?php echo $text; ?>
                        </div>
                    </div>

                <?php elseif ($style == 'style_2'): ?>
                    <div class="col-start-1 md:col-end-6 lg:col-end-5 px-10 md:pb-12 md:pt-16 py-10 bg-white shadow-xl rounded-3xl relative z-10 md:left-[10px] md:top-[70px] <?php echo ($style == 'style_2') ? 'text-center' : 'text-left'; ?>">
                        <!-- Style 2: Title centered, image below, description hidden -->
                        <p class="font-text text-2xl font-bold mb-4"><?php echo $title; ?></p>
                        <?php if( $image ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="object-cover mx-auto">
                        <?php endif; ?>
                        <!-- Hide description for style 2 -->
                    </div>

                <?php elseif ($style == 'style_3'): ?>
                    <div class="col-start-1 md:col-end-6 lg:col-end-5 px-10 md:pb-12 md:pt-16 py-10 bg-white shadow-xl rounded-3xl relative z-10 md:left-[10px] md:top-[40px] <?php echo ($style == 'style_2') ? 'text-center' : 'text-left'; ?>">
                        <!-- Style 3: Only the image -->
                        <?php if( $image ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="object-cover mx-auto">
                        <?php endif; ?>
                        <!-- Hide title and description for style 3 -->
                    </div>

                <?php endif; ?>

            <!-- Block: Main Title -->
            <?php elseif ($layout == 'main_title'): ?>
                <div class="md:col-start-6 lg:col-start-5 col-end-12 row-start-1 lg:pl-2 text-left md:relative z-10 <?php echo ($style == 'style_3') ? 'md:pt-14' : 'md:pt-20'; ?>">
                    <h2 class="h2 font-bold text-primary"><?php echo $title; ?></h2>
                </div>
                
            <!-- Block 2: Centered or Left-aligned Text with Title -->
            <?php elseif ($layout == 'centered_text'): ?>
                <div class="col-start-4 col-end-13 flex flex-col px-10 py-20 rounded-3xl shadow-xl md:relative z-20 md:top-[-80px] text-white bg-primary <?php echo ($style == 'style_1') ? 'text-center items-center' : 'text-left items-start'; ?>">
                    <p class="font-text text-3xl font-semibold mb-8"><?php echo $title; ?></p>
                    <div class="font-text text-lg w-[75%] text-white prose">
                        <?php echo $text; ?>
                    </div>
                </div>

            <!-- Block 3: Text Block (always left-aligned) -->
            <?php elseif ($layout == 'text_block'): ?>
                <div class="font-text text-xl col-start-1 col-end-7 px-6 pb-10 pt-14 bg-gradient-to-r from-[#058D8F] to-[#036855] text-white rounded-3xl md:relative md:top-[-98px] prose prose-strong:text-white">
                    <?php echo $text; ?>
                </div>

            <!-- Block 4: Centered Text with Button -->
            <?php elseif ($layout == 'centered_text_with_button'): ?>
                <div class="col-start-8 col-end-12 px-6 pb-6 pt-8 text-center rounded-3xl bg-white border border-gray-200 md:relative z-10 md:bottom-[65px] md:h-[70%] flex flex-col justify-center items-center">
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
