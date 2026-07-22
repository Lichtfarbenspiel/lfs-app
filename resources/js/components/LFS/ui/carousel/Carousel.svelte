<script lang="ts">
    import { Button } from '@/components/ui/button';
    import { ChevronLeft, ChevronRight } from 'lucide-svelte';
    
    let { images } = $props();

    let content = document.querySelector('#carousel-content') ?? null;

    const moveLeft = () => {
        if (!content)
            content = document.querySelector('#carousel-content') ?? null;
        if (content) {
            content.scrollLeft -= 400;
            console.log('Left scroll', content);
        }
        console.log('Left scroll clicked');
    };

    const moveRight = () => {
        if (!content)
            content = document.querySelector('#carousel-content') ?? null;

        if (content) {
            content.scrollLeft += 400;
            console.log('Right scroll', content.scrollLeft);
        }
        console.log('Right scroll clicked');
    };

</script>

<div
    id="carousel-container"
    class="flex h-full w-full justify-center items-center"
>
    <div
        id="carousel-content"
        class="relative flex h-full w-fit snap-x overflow-x-auto scroll-smooth snap-mandatory no-scrollbar" // snap didnt work
    >
        {#each images as image, index}
            <div class="w-auto h-full shrink-0 snap-center">
                <img
                    id="image-{index}"
                    src={image.src}
                    alt={image.alt}
                    class="h-full w-auto shrink-0 aspect-auto"
                />
            </div>
        {/each}
    </div>
    <div class="absolute top-1/2 left-0">
        <Button
            variant="simple"
            size="icon"
            class="ml-5 md:ml-8 h-12 w-12 self-center"
            onclick={moveLeft}
        >
            <ChevronLeft />
        </Button>
    </div>
    <div class="absolute top-1/2 right-0">
        <Button
            variant="simple"
            size="icon"
            class="mr-5 md:mr-8 h-12 w-12 self-center"
            onclick={moveRight}
        >
            <ChevronRight />
        </Button>
    </div>
</div>
