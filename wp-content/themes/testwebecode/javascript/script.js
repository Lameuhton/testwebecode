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
