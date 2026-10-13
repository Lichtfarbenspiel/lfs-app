<script lang="ts">
    import { cn } from '@/lib/utils';
    import { CloseButton } from '@/components/LFS/ui/close-button';
    import { Button } from '@/components/ui/button';
    import { ChevronLeft, ChevronRight } from 'lucide-svelte';
    import { stopPropagation } from 'svelte/legacy';
    import { onDestroy, onMount } from 'svelte';

    let {
        class: className = '',
        src = '',
        alt = '',
        onclick: closeFunction,
        gallery = [],
        ...rest
    }: {
        class?: string;
        src?: string;
        alt?: string;
        onclick?;
        gallery?: Array<string>;
    } = $props();

    onMount(() => {
        window.addEventListener('keydown', (event) => {
            if (event.key === 'left' || event.key === 'ArrowLeft') {
                previousImg(event);
            }
            if (event.key === 'right'|| event.key === 'ArrowRight') {
                nextImg(event);
            }
        });
    });

    let previousImg = (event) => {
        src = gallery[gallery.indexOf(src) - 1] || gallery[gallery.length - 1];
        event.stopPropagation();
    };

    let nextImg = (event) => {
        src = gallery[gallery.indexOf(src) + 1] || gallery[0];
        event.stopPropagation();
    };
</script>

<div
    // id="image-display"
    class={cn(
        'fixed h-full w-full top-0 left-0 z-1 overflow-hidden bg-black/75 items-center-safe justify-center overscroll-contain',
        className,
    )}
    {...rest}
>
    <div
        id="image-display"
        class="absolute flex top-0 left-0 grid-rows-2 w-full h-full items-center-safe justify-center p-4"
    >
        <CloseButton
            onclick={closeFunction}
            class="text-white w-6 h-6"
            command="close"
            commandfor="image-display"
        />
        <!-- <div class="w-full h-full bg-black/50"></div> -->
        <div
            class="relative flex full-image-container mt-(--header-height) overflow-auto"
        >
            <img
                {src}
                {alt}
                class="flex shrink w-auto h-auto rounded-md object-contain"
            />
            <!-- still too wide for portrait images - rounded corners not visible-->
        </div>
    </div>
    <div class="absolute top-1/2 left-0">
        <Button
            variant="simple"
            size="icon"
            class="ml-4 md:ml-8 h-12 w-12 self-center"
            onclick={previousImg}
        >
            <ChevronLeft />
        </Button>
    </div>
    <div class="absolute top-1/2 right-0">
        <Button
            variant="simple"
            size="icon"
            class="mr-4 md:mr-8 h-12 w-12 self-center"
            onclick={nextImg}
        >
            <ChevronRight />
        </Button>
    </div>
</div>
