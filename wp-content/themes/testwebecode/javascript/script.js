/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

// Block 2 hover animation
document.addEventListener('DOMContentLoaded', function () {
	const cards = document.querySelectorAll('.card');

	cards.forEach((card) => {
		card.addEventListener('mousemove', function (e) {
			const rect = card.getBoundingClientRect();
			const x = e.clientX - rect.left;
			const y = e.clientY - rect.top;

			card.style.setProperty('--x', `${x}px`);
			card.style.setProperty('--y', `${y}px`);
		});
	});
});

//block 4 accordion animation
document.addEventListener('DOMContentLoaded', function() {
    function toggleAccordion(element) {
        const content = element.nextElementSibling;
        const icon = element.querySelector('.icon');
        
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.textContent = "+";
        } else {
            // Fermer tous les autres éléments ouverts
            const allAccordions = document.querySelectorAll('.accordion-content');
            allAccordions.forEach(function(acc) {
                acc.style.maxHeight = null;
                acc.previousElementSibling.querySelector('.icon').textContent = "+";
            });

            // Ouvrir l'élément sélectionné
            content.style.maxHeight = content.scrollHeight + "px";
            icon.textContent = "-";
        }
    }

    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(function(header) {
        header.addEventListener('click', function() {
            toggleAccordion(this);
        });
    });
});

//block 5 parallax animation

//Définir la variable --index pour chaque Card
document.addEventListener("DOMContentLoaded", function() {
    const root = document.documentElement; // Sélectionner l'élément :root
    const cards = document.querySelectorAll('#cards > div[id^="card-"]'); // Sélectionner toutes les divs avec ID commençant par 'card-'
    
    // Définir la variable globale --numcards égale au nombre de cartes
    const numCards = cards.length;
    root.style.setProperty('--numcards', numCards);

    // Boucle sur toutes les cartes qui ont un ID comme 'card-1', 'card-2', etc.
    document.querySelectorAll('#cards > div[id^="card-"]').forEach((card) => {
        // Extraire le numéro de l'ID (par exemple, '1' de 'card-1')
        const cardId = card.id.split('-')[1];
        // Définir la variable CSS --index avec cette valeur
        card.style.setProperty('--index', cardId);
    });


});

