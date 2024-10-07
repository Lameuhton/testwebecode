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

// block 5 parallax animation

//Définir la variable --index pour chaque Card
document.addEventListener("DOMContentLoaded", function() {
    const root = document.documentElement; // Sélectionner l'élément :root
    const cards = document.querySelectorAll('#cards > div[id^="card-"]'); // Sélectionner toutes les divs avec ID commençant par 'card-'
    
    // Définir la variable globale --numcards égale au nombre de cartes
    const numCards = cards.length;
    root.style.setProperty('--cards', numCards);

    // Boucle sur toutes les cartes qui ont un ID comme 'card-1', 'card-2', etc.
    document.querySelectorAll('#cards > div[id^="card-"]').forEach((card) => {
        // Extraire le numéro de l'ID (par exemple, '1' de 'card-1')
        const cardId = card.id.split('-')[1];
        // Définir la variable CSS --index avec cette valeur
        card.style.setProperty('--index', cardId);
    });


});



document.addEventListener('DOMContentLoaded', function () {
	const btn1 = document.getElementById('btn1');
	const btn2 = document.getElementById('btn2');
	const slider = document.getElementById('slider');

	const energyCircle = document.getElementById('energy-circle');
	const co2Circle = document.getElementById('co2-circle');
	const weightCircle = document.getElementById('weight-circle');

	const energyValue = document.getElementById('energy-value');
	const co2Value = document.getElementById('co2-value');
	const weightValue = document.getElementById('weight-value');

	function setCircle(circle, value) {
		const radius = circle.r.baseVal.value;
		const circumference = 2 * Math.PI * radius;
		const offset = circumference - (value / 100) * circumference;
		circle.style.strokeDashoffset = offset;
	}

	function updateValues(energy, co2, weight) {
		// Met à jour les valeurs et les cercles
		energyValue.textContent = energy + '%';
		co2Value.textContent = co2 + '%';
		weightValue.textContent = weight + '%';

		setCircle(energyCircle, energy);
		setCircle(co2Circle, co2);
		setCircle(weightCircle, weight);
	}

	// Site web standard (par défaut)
	updateValues(65, 85, 75);

	// Quand on clique sur le premier bouton (Site web standard)
	btn1.addEventListener('click', function () {
		slider.style.left = '0'; // Déplace le slider à gauche
		btn1.classList.add('active');
		btn2.classList.remove('active');

		// Mettre à jour les valeurs pour un site web standard
		updateValues(65, 85, 75); // Chiffres à ajuster selon ton contexte
	});

	// Quand on clique sur le deuxième bouton (Site web éco-conçu)
	btn2.addEventListener('click', function () {
		slider.style.left = '50%'; // Déplace le slider à droite
		btn2.classList.add('active');
		btn1.classList.remove('active');

		// Mettre à jour les valeurs pour un site web éco-conçu
		updateValues(30, 45, 50); // Chiffres à ajuster selon ton contexte
	});
});

