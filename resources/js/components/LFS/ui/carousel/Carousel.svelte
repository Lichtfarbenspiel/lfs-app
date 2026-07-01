<script lang="ts">
    import { Button } from '@/components/ui/button';
    import { ChevronLeft, ChevronRight } from 'lucide-svelte';
    import { onMount } from 'svelte';

    let { images } = $props();
    // let content;
    let content_scroll_width;
    let content_scoll_left;

    // document.addEventListener('DOMContentLoaded', () => {
    //     console.log('dom loaded');
    //     getContent();
    // });

    // function getContent() {
    //     content = document.querySelector('#carousel-content');
    //     if (content) {
    //         content_scroll_width = content.scrollWidth;
    //         content_scoll_left = content.scrollLeft;
    //         console.log('content_scroll_width', content_scroll_width);
    //     }
    // }

    // const moveLeft = () => {
    //     if (!content) getContent();

    //     if (content_scoll_left >= content_scroll_width) {
    //         content_scoll_left = content_scroll_width;
    //     }
    //     content.scrollLeft = content_scoll_left;
    //     console.log('Left scroll', content);
    // };

    // const moveRight = () => {
    //     if (!content) getContent();
    //     content_scoll_left -= 100;
    //     if (content_scoll_left <= 0) {
    //         content_scoll_left = 0;
    //     }
    //     content.scrollLeft = content_scoll_left;
    //     console.log('Right scroll', content.scrollLeft);
    // };

    let content = document.querySelector('#carousel-content') ?? null;

    const moveLeft = () => {
        if (!content)
            content = document.querySelector('#carousel-content') ?? null;
        if (content) {
            content.scrollLeft -= 200;
            console.log('Left scroll', content);
        }
        console.log('Left scroll clicked');
    };

    const moveRight = () => {
        if (!content)
            content = document.querySelector('#carousel-content') ?? null;

        if (content) {
            content.scrollLeft += 200;
            console.log('Right scroll', content.scrollLeft);
        }
        console.log('Right scroll clicked');
    };
</script>

<div id="carousel-container" class="flex h-full justify-center items-center">
    <div
        id="carousel-content"
        class="relative flex h-full w-full justify-center overflow-x-auto scroll-smooth" // snap didnt work
    >
        {#each images as image, index}
            <div class="w-auto h-full shrink-0">
                <img
                    id="image-{index}"
                    src={image.src}
                    alt={image.alt}
                    class="h-full w-auto shrink-0"
                />
            </div>
        {/each}
    </div>
    <div class="absolute top-1/2 left-0 ml-8">
        <Button
            variant="ghost"
            size="icon"
            class="mr-2 h-9 w-9 self-center text-white"
            onclick={moveLeft}
        >
            <ChevronLeft />
        </Button>
    </div>
    <div class="absolute top-1/2 right-0 ml-8">
        <Button
            variant="ghost"
            size="icon"
            class="mr-2 h-9 w-9 self-center text-white"
            onclick={moveRight}
        >
            <ChevronRight />
        </Button>
    </div>
</div>
