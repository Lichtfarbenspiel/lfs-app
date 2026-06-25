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

    <div id="page-content">
        <div class="flex h-auto w-full flex-col text-foreground text-md max-w-4xl px-5">
            <p>
                Ich fotografiere liebend gern und möchte hier meine Bilder mit
                der Welt teilen.<br>2016 lebte ich, für ein Jahr, als Au Pair in
                London. Jetzt studiere ich Medieninformatik im 5. Semester. Hier
                auf meinem Blog werde ich alles von Fotografie, über meine
                Reisen, bis hin zu den verrücktesten Gedanken festhalten und mit
                Euch teilen – Die Welt durch meine Augen!\r\nViel Spaß beim
                Stöbern :) <br> Salo ♥
            </p>
        </div>
    </div>
</div>
