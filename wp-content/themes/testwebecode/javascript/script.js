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