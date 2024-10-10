<?php 
// Bloc avec formulaire de contact

$main_title = get_field('main_title'); // Image: champ "texte", nom "main_title"
$description_main_title = get_field('description_main_title'); // Description titre principal: champ "zone de texte", nom "description_main_title"
$secondary_title = get_field('secondary_title'); // Titre secondaire: champ "texte", nom "secondary_title"
$description_secondary_title = get_field('description_secondary_title'); // Description sous-titre: champ "zone de texte", nom "description_secondary_title"
$tertiary_title_1 = get_field('tertiary_title_1'); // Titre tertiaire 1: champ "texte", nom "tertiary_title_1"
$description_tertiary_1 = get_field('description_tertiary_1'); // Description tertiaire 1: champ "zone de texte", nom "description_tertiary_1"
$tertiary_title_2 = get_field('tertiary_title_2'); // Titre tertiaire 2: champ "texte", nom "tertiary_title_2"
$description_tertiary_2 = get_field('description_tertiary_2'); // Description tertiaire 2: champ "zone de texte", nom "description_tertiary_2"
$tertiary_title_3 = get_field('tertiary_title_3'); // Titre tertiaire 3: champ "texte", nom "tertiary_title_3"
$description_tertiary_3 = get_field('description_tertiary_3'); // Description tertiaire 3: champ "zone de texte", nom "description_tertiary_3"
$form_description = get_field('form_description'); // Description formulaire: champ "zone de texte", nom "form_description"
?>
<section class="w-full mb-44">
    
    <div class="relative flex flex-col gap-5 md:gap-0 md:grid md:grid-cols-12 items-center z-10">
        <!-- Primary Title and Description -->
        <div class="sides-page-margin col-span-12 bg-primary pb-28 text-white">
            <h1 class="h1 mb-3"><?php echo esc_html($main_title) ?></h1>
            <p class="font-text text-[20px] leading-[24px] flex flex-col gap-7 w-[40%]"><?php echo $description_main_title; ?></p>
        </div>

        <div class="realtive pl-5 lg:pl-36 flex flex-col col-start-1 col-end-5 order-2 md:order-none">
            <h2 class="h2 mt-8 mb-5"><?php echo esc_html($secondary_title) ?></h2>
            <p class="font-text text-[20px] leading-[24px] flex flex-col gap-7 mb-16"><?php echo $description_secondary_title; ?></p>
            
            <div class="flex flex-row items-start gap-4 pb-5 relative left-[-10px]">
                <!-- Cercle gauche -->
                <div class="w-16 h-6 bg-primary rounded-full mt-1 relative z-10"></div>
                <!-- Ligne verticale -->
                <div class="absolute top-2 left-[11px] h-full border border-primary "></div>

                <!-- Contenu -->
                <div class="flex flex-col gap-1">
                    <h3 class="font-text font-bold text-[24px]"><?php echo esc_html($tertiary_title_1) ?></h3>
                    <p class="paragraph ml-6"><?php echo $description_tertiary_1; ?></p>
                </div>
            </div>

            <div class="flex flex-row items-start gap-4 pb-5 relative left-[-10px]">
                <!-- Cercle gauche -->
                <div class="w-16 h-6 bg-primary rounded-full mt-1 relative z-10"></div>
                <!-- Ligne verticale -->
                <div class="absolute top-2 left-[11px] h-full border border-primary "></div>

                <!-- Contenu -->
                <div class="flex flex-col gap-1">
                    <h3 class="font-text font-bold text-[24px]"><?php echo esc_html($tertiary_title_2) ?></h3>
                    <p class="paragraph ml-6"><?php echo $description_tertiary_2; ?></p>
                </div>
            </div>

            <div class="flex flex-row items-start gap-4 pb-5 relative left-[-10px]">
                <!-- Cercle gauche -->
                <div class="w-16 h-6 bg-primary rounded-full mt-1 relative z-10"></div>

                <!-- Contenu -->
                <div class="flex flex-col gap-1">
                    <h3 class="font-text font-bold text-[24px]"><?php echo esc_html($tertiary_title_3) ?></h3>
                    <p class="paragraph ml-6"><?php echo $description_tertiary_3; ?></p>
                </div>
            </div>
        </div>

        <div class="absolute pr-5 lg:pr-36 order-1 md:order-none col-start-6 col-end-13 z-10 bottom-[-20px]">
            <div class="bg-white gap-7 md:gap-10 px-10 sm:px-24 py-28">
                <div class="flex flex-col gap-1">
                    <p class="font-text text-[24px] mb-10"><?php echo $form_description; ?></p>
                    <?php echo do_shortcode('[contact-form-7 id="60c8eb0" title="Contact form"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>