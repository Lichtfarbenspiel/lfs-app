<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import { PageTitle } from '@/components/LFS/ui/page-title';

    const title = 'About';
</script>

<AppHead {title} />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl mx-auto p-5"
>
    <PageTitle menuList={null} {title} />

    <div id="page-content" class="grid gap-4 grid-cols-1">
        <div
            class="flex h-auto w-full flex-col text-foreground text-md max-w-4xl px-5 gap-2"
        >
            <p>
                Ich bin Salome. Ich bin Medieninformatikerin, Hobbyfotografin
                und Pferdemädchen - immer irgendwo zwischen Natur und Monitor
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
        <div
            class="flex h-auto w-full flex-col text-foreground text-md max-w-4xl px-5 mt-6"
        >
            <h2 class="text-md font-serif">Contact</h2>
            <p>lichtfarbenspiel[at]gmail.com</p>
        </div>
    </div>
</div>
