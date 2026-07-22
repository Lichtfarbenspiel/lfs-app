import type { BaseTranslation } from '../i18n-types'

const en: BaseTranslation = {
	// TODO: your translations go here
	HI: 'Hi {name:string}! Please leave a star if you like this project: https://github.com/ivanhofer/typesafe-i18n',

	/*
	| Menu
	*/
	menu: {
		home: { title: 'Home' },
		portfolio: { title: 'Portfolio' },
		blog: { title: 'Blog' },
		about: { title: 'About' },
	},

	language: {
		de: 'DE',
		en: 'EN'
	},

	/*
	| Portfolio sub menu 
	*/
	portfolio_menu: {
		equine: { name: 'Equine' },
		wedding: { name: 'Wedding' },
		nature: { name: 'Nature' },
		people: { name: 'People' },
		animals: { name: 'Animals' },
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
	about_description: `<p>
                Ich bin Salome. Medieninformatikerin, Hobbyfotografin und
                Pferdemädchen - immer irgendwo zwischen Natur und Monitor
                unterwegs.
            </p>
            <p>
                Diese Seite entstand vor über 10 Jahren als Blog, um meine
                Fotografie zu dokumentieren. Zwischendurch habe ich in London
                gelebt, Medieniformatik studiert und bin in die Welt der
                Erwachsenen hineingestolpert. Und der Blog? Der ist irgendwo auf
                dem Weg hier her liegen geblieben. Vielleicht wird es ihn
                irgendwann mal wieder geben, vielleicht in anderer Form, denn
                ich liebe es zu schreiben.
            </p>
            <p>
                Bis dahin dient diese Seite als mein online Spielplatz. In
                meinem Portfolio sind meine liebsten Fotografien zu sehen, die
                Auswahl ist gar nicht so einfach. Der restliche Spaß findet
                dahinter statt. Ich bin Full Stack Web Entwicklerin und das hier
                ist mein kleines Projekt, um Svelte als Frontend zu testen.
            </p>`,
	instagram: 'Instagram',
	monnett: 'Monnett',
	contact: 'Contact',

	/*
	| Imprint page
	*/
	imprint: 'Imprint',
	imprint_description: '',

} satisfies BaseTranslation

export default en
