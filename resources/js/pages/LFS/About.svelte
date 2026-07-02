<script lang="ts">
    import StorageController from '@/actions/App/Http/Controllers/StorageController';
    import AppHead from '@/components/AppHead.svelte';
    import InstagramLogo from '@/components/LFS/InstagramLogo.svelte';
    import MonnettLogo from '@/components/LFS/MonnettLogo.svelte';
    import { PageTitle } from '@/components/LFS/ui/page-title';
    import { navigationMenuTriggerStyle } from '@/components/ui/navigation-menu';
    import { Link } from '@inertiajs/svelte';
    import MailIcon from 'lucide-svelte/icons/mail';

    const title = 'About';

    let src = 'storage' + StorageController.index('POR2.png').url;
</script>

<AppHead {title} />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl mx-auto p-5"
>
    <PageTitle menuList={null} {title} />

    <div
        id="page-content"
        class="grid gap-5 grid-cols-1 md:grid-cols-2 max-w-4xl px-5"
    >
        <div
            class="relative flex h-auto w-auto justify-center items-center p-4"
        >
            <img
                {src}
                alt="alttext"
                class="w-3/4 h-auto aspect-square rounded-full object-cover"
            />
        </div>
        <div class="flex h-auto w-auto flex-col text-foreground text-md gap-2">
            <p>
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
            </p>
        </div>
    </div>
    <div
        class="grid gap-3 grid-cols-1 md:grid-cols-[1fr_2fr_1fr] text-sm sm:text-md max-w-4xl md:mx-auto md:px-5 justify-between content-between px-5 mt-10 md:mt-16"
    >
        <div
            class="flex h-full w-auto text-foreground max-w-4xl justify-start items-start md:items-start"
        >
            <div class="grid grid-rows-2">
                <div class="flex justify-start items-center gap-2">
                    <MailIcon class="w-5 h-5" />
                    <h2 class="font-serif">Contact</h2>
                </div>
                <p>lichtfarbenspiel[at]gmail.com</p>
            </div>
        </div>
        <div
            class="flex h-auto w-full text-foreground max-w-4xl justify-start items-start md:justify-center"
        >
            <div class="grid grid-rows-2">
                <div class="flex justify-start items-center gap-2">
                    <InstagramLogo size={20.0} />
                    <h2 class="font-serif">Instagram</h2>
                </div>
                <div class="flex justify-between items-center gap-1 sm:gap-3">
                    <div class="flex justify-start">
                        <Link
                            class="itransition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 hover:text-accent-foreground"
                            href="https://www.instagram.com/lichtfarbenfotografie/"
                            >lichtfarbenfotografie</Link
                        >
                    </div>
                    <div class="flex justify-start">
                        <Link
                            class="itransition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 hover:text-accent-foreground"
                            href="https://www.instagram.com/lichtfarbenspiel/"
                            >lichtfarbenspiel</Link
                        >
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex h-auto w-full text-foreground max-w-4xl justify-start items-start md:justify-end"
        >
            <div class="grid grid-rows-2">
                <div class="flex justify-start items-center gap-2">
                    <MonnettLogo size={20.0} />
                    <h2 class="font-serif">Monnett</h2>
                </div>
                <Link
                    class="itransition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 hover:text-accent-foreground"
                    href="https://share.monnett.social/u/lichtfarbenspiel"
                    >lichtfarbenspiel</Link
                >
            </div>
        </div>
    </div>
</div>
