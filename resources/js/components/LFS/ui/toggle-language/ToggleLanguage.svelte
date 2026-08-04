<script lang="ts">
    import Button from '@/components/ui/button/Button.svelte';
    import LL, {
        setLocale,
        locale,
    } from '../../../../../../src/i18n/i18n-svelte';
    import type { Locales } from '../../../../../../src/i18n/i18n-types';
    import { loadLocaleAsync } from '../../../../../../src/i18n/i18n-util.async';
    import {
        detectLocale,
    } from '../../../../../../src/i18n/i18n-util';
    import { onMount } from 'svelte';
    import { localStorageDetector } from 'typesafe-i18n/detectors';

    onMount(async () => {
        const detectedLocale = detectLocale(localStorageDetector);
        await chooseLocale(detectedLocale);
    });

    const chooseLocale = async (locale: Locales) => {
        await loadLocaleAsync(locale);
        setLocale(locale);
    };

    const toggleLocale = async () => {
        const nextLocale: Locales = $locale === 'de' ? 'en' : 'de';
        await chooseLocale(nextLocale);
    };

    $: $locale && localStorage.setItem('lang', $locale);
</script>


<Button
    variant="ghost"
    size="icon"
    class="mr-2 h-9 w-9 self-center cursor-pointer text-sm font-sans font-medium text-neutral-500 dark:text-neutral-400 hover:text-accent-foreground dark:hover:text-accent-foreground"
    onclick={() => toggleLocale()}
    aria-label="switch language"
>
    {#if $locale === 'de'}
        EN
    {:else}
        DE
    {/if}
</Button>
