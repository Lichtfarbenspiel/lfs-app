<script lang="ts">
    import { Link } from '@inertiajs/svelte';
    import { navigationMenuTriggerStyle } from './ui/navigation-menu';
</script>

<div class="relative bottom-0 bg-background h-(--footer-height)">
    <div
        class="border-t border-sidebar-border/80 py-3 justify-center content-center grid gap-2"
    >
        <div
            class="group flex-1 list-none justify-center gap-1 flex h-full items-stretch space-x-2 font-serif"
        >
            <div class="relative flex h-full items-center">
                <Link class={navigationMenuTriggerStyle()} href="/about"
                    >contact</Link
                >
            </div>
            <div class="relative flex h-full items-center">
                <Link class={navigationMenuTriggerStyle()} href="/imprint"
                    >imprint</Link
                >
            </div>
        </div>
        <div
            class="group flex-1 list-none justify-center gap-1 flex h-full items-stretch space-x-2"
        >
            <div class="relative flex h-full items-center text-[0.625rem] text-foreground/80">
                <p>© 2026 Lichtfarbenspiel</p>
            </div>
        </div>
    </div>
</div>
