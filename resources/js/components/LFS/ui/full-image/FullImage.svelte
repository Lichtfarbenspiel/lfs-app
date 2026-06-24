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
        'modal fade fixed flex top-0 left-0 grid-rows-2 h-dvh w-full overflow-hidden bg-black/50 items-center-safe justify-center',
        className,
    )}
    {...rest}
>
    <CloseButton onclick={closeFunction} class="text-white"/>
    <!-- <div class="w-full h-full bg-black/50"></div> -->
    <div class="w-3/4 h-fit md:w-fit md:h-3/4 relative bg-background rounded-lg mt-(--header-height)">
        <!-- adjust for screens - no distorttion-->
        <img {src} {alt} class="h-full w-auto rounded-lg p-3" />
    </div>
</div>
