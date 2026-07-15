<script lang="ts">
    import { cn } from '@/lib/utils';
    import { CloseButton } from '@/components/LFS/ui/close-button';

    let {
        class: className = '',
        src = '',
        alt = '',
        onclick: closeFunction,
        ...rest
    }: {
        class?: string;
        src?: string;
        alt?: string;
        onclick?;
    } = $props();
</script>

<div
    id="image-display"
    class={cn(
        'fixed h-full w-full top-0 left-0 z-1 overflow-hidden bg-black/75 items-center-safe justify-center overscroll-contain',
        className,
    )}
    {...rest}
>
    <div
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
            <img {src} {alt} class="flex shrink w-auto h-auto rounded-md object-contain" /> <!-- still too wide for portrait images - rounded corners not visible-->
        </div>
    </div>
</div>
