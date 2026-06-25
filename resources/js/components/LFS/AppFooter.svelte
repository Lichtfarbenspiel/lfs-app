<script lang="ts">
    import { Link } from '@inertiajs/svelte';
    import { navigationMenuTriggerStyle } from './ui/navigation-menu';
</script>

<div class="relative bottom-0 bg-background">
    <div class="border-t border-sidebar-border/80 py-3 justify-center content-center">
        <div class="relative grid columns-2 max-w-7xl px-4 mx-auto">
            <div>
                <Link
                    class={navigationMenuTriggerStyle()}
                    href="https://www.instagram.com/lichtfarbenspiel/"
                    >instagram</Link
                >
            </div>
        </div>
    </div>
</div>
