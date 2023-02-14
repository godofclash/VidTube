/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./resources/**/*.{svelte,js,html}'],
	theme: {
		extend: {
			borderWidth: {
				1: '1px', 
				3: '3px'
			},
			outlineWidth: {
				1: '1px', 
				3: '3px'
			}, 
			fontFamily: {
				poppins: 'Poppins, sans-serif'
			}
		},
	},
	plugins: [],
}
