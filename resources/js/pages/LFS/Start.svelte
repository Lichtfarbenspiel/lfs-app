<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';
    import { Carousel } from '@/components/LFS/ui/carousel';

    let image = 'storage' + StorageController.index('IMG_9986.png').url;

    let carouselImages = [
        {src: 'storage' + StorageController.index('1.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('2.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('3.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('4.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('5.png').url, alt: 'alttext'},

    ];
</script>

<AppHead title="Home" />

<div class="flex flex-1 flex-col overflow-y-hidden">
    <div class="w-full vh-header -pb-(--footer-height)">
        <Carousel images={carouselImages} />
        <!-- <img src="{image}" alt="some alt text" class="h-full w-full object-cover"/> -->
    </div>
</div>
