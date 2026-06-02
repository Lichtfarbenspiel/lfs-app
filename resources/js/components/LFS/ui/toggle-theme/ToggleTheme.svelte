<script lang="ts">
    import Button from '@/components/ui/button/Button.svelte';
    import SunMoon from 'lucide-svelte/icons/sun-moon';
    import { themeState } from '@/lib/theme.svelte';
    import type { Appearance } from '@/types';

    const { appearance, updateAppearance, resolvedAppearance } = themeState();

    let value;

    function ToggleTheme() {
        let val: Appearance = resolvedAppearance() == 'dark' ? 'light' : 'dark';
        value = val;
        updateAppearance(value);
    }
</script>

<Button
    variant="ghost"
    size="icon"
    class="mr-2 h-9 w-9 self-center cursor-pointer transition-colors {appearance.value === value
        ? 'bg-white shadow-xs dark:bg-neutral-700 dark:text-neutral-100'
        : 'text-neutral-500 hover:bg-neutral-200/60 hover:text-black dark:text-neutral-400 dark:hover:bg-neutral-700/60'}" // ToDo: adjust colours
    onclick={() => ToggleTheme()}
    aria-label="Toggle dark theme"
>
    <SunMoon class="size-5 opacity-80 group-hover:opacity-100" />
</Button>
