// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files trigger a rebuild.
		'./theme/**/*.php',
		'./theme/*.php',
		'./theme/**/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
		  screens: {
			xs: "320px",
			sm: "460px",
			md: "768px",
			medium: "1125px",
			base: "1250px",
			lg: "1440px",
			xlarge: "1680px",
			xl: "1920px",
			"2xl": "2300px",
		  },
		  fontFamily: {
			title: ['Oswald', 'sans-serif'],
			text: ['Montserrat', 'sans-serif'],
			heading: ['Montserrat', 'sans-serif'],
			mono: ['Fira Code', 'monospace'],
		  },
		  fontSize: {
			secondary_title: ['48px', {
			  lineHeight: '64px',
			  fontWeight: '400',
			}],
			primary_title: ['64px', {
			  lineHeight: '85px',
			  fontWeight: '400',
			}],
			tertiary_title: ['24px', {
			  lineHeight: '42px',
			  fontWeight: '400',
			}],
			content: ['15px', {
			  lineHeight: '25px',
			  fontWeight: '300',
			}],
			buttons: ['16px', {
			  lineHeight: '16px',
			  fontWeight: '400',
			}],
			small: ['12px', {
			  lineHeight: '16px',
			  fontWeight: '300',
			}],
		  },
		  colors: { 
			primary: '#0F3030',
			secondary: '#FF6B18',
			gray: '#6F6F6F',
			accent: '#FFB700',
			background: '#F5F5F5',
			dark: '#1E1E1E',
		  },
		  margin: {
			large: '150px',
			mobile: '80px',
			small: '40px',
		  },
		  padding: {
			large: '60px',
			small: '20px',
			xsmall: '10px',
		  },
		  borderRadius: {
			small: '4px',
			medium: '8px',
			large: '16px',
			full: '9999px',
		  },
		  boxShadow: {
			subtle: '0 1px 3px rgba(0, 0, 0, 0.1)',
			medium: '0 4px 6px rgba(0, 0, 0, 0.1)',
			large: '0 10px 15px rgba(0, 0, 0, 0.15)',
		  },
		  zIndex: {
			'-1': '-1',
			'0': '0',
			'10': '10',
			'20': '20',
			'30': '30',
			'40': '40',
			'50': '50',
		  },
		  animation: {
			fade: 'fadeOut 5s ease-in-out',
			spin: 'spin 1s linear infinite',
			bounce: 'bounce 2s infinite',
		  },
		  keyframes: {
			fadeOut: {
			  '0%': { opacity: '1' },
			  '100%': { opacity: '0' },
			},
		  },
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
