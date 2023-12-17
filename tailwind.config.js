/** @type {import('tailwindcss').Config} */
module.exports = {
	daisyui: {
		themes: ["light", "dark"],
	},
	darkMode: "class",
	content: ["./app/Views/**/*.php"],
	theme: {
		extend: {},
	},
	plugins: [require("daisyui")],
};
