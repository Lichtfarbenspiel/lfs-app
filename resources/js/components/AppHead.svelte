<script lang="ts">
    import type { Snippet } from 'svelte';
    import LL from '../../../src/i18n/i18n-svelte';

    let {
        title = '',
        children,
    }: {
        title?: string;
        children?: Snippet;
    } = $props();

    const appName = import.meta.env.APP_NAME || 'Lichtfarbenspiel';
    const fullTitle = $derived(title ? `${$LL.menu[title.toLocaleLowerCase()].title() ?? title} - ${appName}` : appName);
</script>

<svelte:head>
    <title>{fullTitle}</title>
    {@render children?.()}
</svelte:head>
