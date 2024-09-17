<?php if (have_rows('content_blocks')): ?>
    <section class="sides-page-margin grid grid-cols-12 relative">

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

            <!-- Block: Main Title -->
            <?php if ($layout == 'main_title'): ?>
                <div class="col-start-5 col-end-12  text-center py-8 relative z-10">
                    <h2 class="text-4xl font-bold text-[#00322D]"><?php echo $title; ?></h2>
                </div>

            <!-- Block 1: Text with Image -->
            <?php elseif ($layout == 'text_with_image'): ?>
                <div class="col-start-1 col-end-5 p-6 bg-white border shadow-lg rounded-2xl relative z-10  left-[20px]<?php echo ($style == 'style_2') ? 'text-center' : 'text-left'; ?>">
                    
                    <?php if ($style == 'style_1'): ?>
                        <!-- Style 1: Title aligned left, image top-right -->
                        <div class="flex justify-between items-start">
                            <p class="text-lg font-semibold text-[#E56027]"><?php echo $title; ?></p>
                            <?php if( $image ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-8 h-8 object-cover">
                            <?php endif; ?>
                        </div>
                        <p class="text-sm text-gray-600 mt-2"><?php echo $text; ?></p>

                    <?php elseif ($style == 'style_2'): ?>
                        <!-- Style 2: Title centered, image below, description hidden -->
                        <p class="text-lg font-semibold text-[#E56027] mb-4"><?php echo $title; ?></p>
                        <img src="<?php echo $image; ?>" alt="" class="w-8 h-8 object-cover mx-auto">
                        <!-- Hide description for style 2 -->

                    <?php elseif ($style == 'style_3'): ?>
                        <!-- Style 3: Only the image -->
                        <img src="<?php echo $image; ?>" alt="" class="w-8 h-8 object-cover mx-auto">
                        <!-- Hide title and description for style 3 -->

                    <?php endif; ?>
                </div>


            <!-- Block 2: Centered or Left-aligned Text with Title -->
            <?php elseif ($layout == 'centered_text'): ?>
                <div class="col-start-4 col-end-12  p-6 rounded-2xl shadow-lg relative z-20 <?php echo ($style == 'style_1') ? 'text-center bg-[#00322D] text-white' : 'text-left bg-white text-gray-900'; ?>">
                    <p class="text-lg font-semibold mb-4"><?php echo $title; ?></p>
                    <p class="text-sm"><?php echo $text; ?></p>
                </div>

            <!-- Block 3: Text Block (always left-aligned) -->
            <?php elseif ($layout == 'text_block'): ?>
                <div class="col-start-1 col-end-6 p-6 bg-[#00796B] text-white rounded-2xl shadow-lg relative z-10 top-[-50px]">
                    <p class="text-sm"><?php echo $text; ?></p>
                </div>

            <!-- Block 4: Centered Text with Button -->
            <?php elseif ($layout == 'centered_text_with_button'): ?>
                <div class="col-start-7 col-end-11 p-6 text-center rounded-2xl shadow-lg bg-white border border-gray-200 relative z-10 top-[30px]">
                    <p class="text-lg font-bold mb-4"><?php echo $title; ?></p>
                    <p class="mb-6 text-gray-700"><?php echo $text; ?></p>
                    <?php
                    if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <a class="text-white font-text bg-gradient-to-r from-accent to-secondary rounded-xl inline-block" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        <?php endwhile; ?>
    </section>
<?php endif; ?>
