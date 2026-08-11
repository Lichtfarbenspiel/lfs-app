<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';
    import { Carousel } from '@/components/LFS/ui/carousel';
    import { onDestroy, onMount } from 'svelte';

    let image = 'storage' + StorageController.index('IMG_9986.png').url;

    let carouselImages = [
        {src: 'storage' + StorageController.index('1.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('2.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('3.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('4.png').url, alt: 'alttext'},
        {src: 'storage' + StorageController.index('5.png').url, alt: 'alttext'},

    ];

    // onMount(() => {
    //     document.body.classList.add('overflow-y-hidden');
    // });

    // onDestroy(() => {
    //     document.body.classList.remove('overflow-y-hidden');
    // });

</script>

<AppHead title="Home" />

<div class="flex overflow-y-hidden">
    <div class="flex w-full vh-header">
        <Carousel images={carouselImages} />
        <!-- <img src="{image}" alt="some alt text" class="h-full w-full object-cover"/> -->
    </div>
</div>
