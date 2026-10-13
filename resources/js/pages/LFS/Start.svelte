<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';
    import { Carousel } from '@/components/LFS/ui/carousel';

    let carouselImages = [
        {src: 'storage' + StorageController.index('1.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('2.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('3.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('4.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('5.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('Nature/IMG_6139.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('Nature/IMG_1695.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('Nature/IMG_0062.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('Nature/IMG_1698.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('Nature/IMG_1592.png').url, alt: 'alttext'},
    ];
</script>

<AppHead title="Home" />

<div class="flex overflow-y-hidden">
    <div class="flex w-full vh-header">
        <Carousel images={carouselImages} />
    </div>
</div>
