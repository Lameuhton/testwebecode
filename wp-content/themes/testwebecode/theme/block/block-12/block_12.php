<?php 
// Bloc pour le nouveau site, 2 cards blanche et une primary en dessous avec du texte

$title = get_field('title'); // Titre: champ "texte", nom "title"
$description_card_1 = get_field('description_card_1'); // Description: champ "Editeur WYSIWYG", nom "description_card_1"
$description_card_2 = get_field('description_card_2'); // Description: champ "Editeur WYSIWYG", nom "description_card_2"
$description_card_3 = get_field('description_card_3'); // Description: champ "Editeur WYSIWYG", nom "description_card_3"
?>
<section class="sides-page-margin flex flex-col base:grid base:grid-cols-12 gap-y-5 base:gap-y-0 base:gap-x-4 font-text mb-16 base:relative">
        <h2 class="base:col-span-12 h2 base:mb-20 text-center"><?php echo esc_html($title) ?></h2>

        <div class="base:col-start-1 base:col-end-6 bg-white text-primary pb-14 pt-10 base:pl-7 base:pr-10 px-7 shadow-xl rounded-3xl base:absolute top-[95px]">
            <div class="font-text text-[20px] leading-[24px] flex flex-col gap-7 prose prose-p:m-0 prose-strong:font-bold">
                <?php echo $description_card_1; ?>
            </div>
        </div>

        <div class="base:col-start-5 base:col-end-13 border border-primary rounded-3xl py-10 base:pl-32 base:pr-16 px-7">
            <div class="font-text text-[20px] leading-[24px] flex flex-col gap-7 prose prose-p:m-0 prose-strong:font-bold">
                <?php echo $description_card_2; ?>
            </div>
        </div>
        
        <div class="base:col-start-2 base:col-end-12 bg-primary rounded-3xl py-14 base:px-24 base:mt-10 px-7">
            <div class="font-text text-[24px] text-white text-center leading-[32px] flex flex-col gap-7 prose prose-p:m-0 prose-strong:text-white prose-strong:font-bold">
                <?php echo $description_card_3; ?>
            </div>
        </div>
    </div>
</section>