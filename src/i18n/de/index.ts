import type { Translation } from '../i18n-types'

const de = {
	// this is an example Translation, just rename or delete this folder if you want
	HI: 'Hallo {name}! Bitte hinterlasse einen Stern, wenn dir das Projekt gefällt: https://github.com/ivanhofer/typesafe-i18n',
	/*
	| Menu
	*/
	menu: {
		home: { title: 'Home' },
		portfolio: { title: 'Portfolio' },
		blog: { title: 'Blog' },
		about: { title: 'Über mich'},
	},

	language: {
		de: 'DE',
		en: 'EN'
	},
	
	/*
	| Portfolio sub menu 
	*/
	portfolio_menu: {
		equine: { name: 'Pferde' },
		wedding: { name: 'Hochzeit' },
		nature: { name: 'Natur' },
		people: { name: 'Menschen' },
		animals: { name: 'Tiere' },
	},

	/*
	| General
	*/
	lichtfarbenspiel: 'Lichtfarbenspiel',
	lichtfarbenfotografie: 'Lichtfarbenfotografie',
	contact_email: 'lichtfarbenspiel[at]gmail.com',
	copyright: '© 2026 Lichtfarbenspiel',

	/*
	| About page
	*/
	about_description: '',
	instagram: 'Instagram',
	monnett: 'Monnett',
	contact: 'Kontakt',

	/*
	| Imprint page
	*/
	imprint: 'Impressum',
	imprint_description: '',
} satisfies Translation

export default de
