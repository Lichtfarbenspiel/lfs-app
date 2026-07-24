<script lang="ts">
    import { Link } from '@inertiajs/svelte';
    import { navigationMenuTriggerStyle } from './ui/navigation-menu';
    import { LL } from '../../../../src/i18n/i18n-svelte';
</script>

<footer class="relative bottom-0 bg-background h-(--footer-height)">
    <div
        class="border-t border-sidebar-border/80 py-3 justify-center content-center grid gap-2"
    >
        <div
            class="group flex-1 list-none justify-center gap-1 flex h-full items-stretch space-x-2 font-serif"
        >
            <div class="relative flex h-full items-center">
                <Link class={navigationMenuTriggerStyle()} href="/about"
                    >{$LL.contact().toLocaleLowerCase()}</Link
                >
            </div>
            <div class="relative flex h-full items-center">
                <Link
                    class={navigationMenuTriggerStyle()}
                    href="/imprint">{$LL.imprint().toLocaleLowerCase()}</Link  
                > 
                <!-- active style?? -->
            </div>
            <div class="relative flex h-full items-center">
                <Link
                    class={navigationMenuTriggerStyle()}
                    href="/privacy">{$LL.privacy().toLocaleLowerCase()}</Link 
                > <!-- // active style?? -->
            </div>
        </div>
        <div
            class="group flex-1 list-none justify-center gap-1 flex h-full items-stretch space-x-2"
        >
            <div
                class="relative flex h-full items-center text-[0.625rem] text-foreground/80"
            >
                <p>{$LL.copyright()}</p>
            </div>
        </div>
    </div>
</footer>
