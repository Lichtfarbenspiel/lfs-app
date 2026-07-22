<script lang="ts">
    import { onMount, type Snippet } from 'svelte';
    import AppLayout from '@/layouts/app/AppHeaderLayout.svelte';
    import type { BreadcrumbItem } from '@/types';

    import LL, { locale, setLocale } from '../../../src/i18n/i18n-svelte';
    import { loadLocaleAsync } from '../../../src/i18n/i18n-util.async';
    import type { Locales } from '../../../src/i18n/i18n-types';
    import { detectLocale, i18nObject } from '../../../src/i18n/i18n-util';
    import { localStorageDetector } from 'typesafe-i18n/detectors';

    // onMount(async () => {
    //     const detectedLocale = detectLocale(localStorageDetector);
    //     await chooseLocale(detectedLocale);
    //     console.log('locale', $LL.menu.home.title());
    // });

    // const chooseLocale = async (locale: Locales) => {
    //     await loadLocaleAsync(locale);
    //     setLocale(locale);
    //     localStorage.setItem('lang', locale);
    // };

    let {
        breadcrumbs = [],
        children,
    }: {
        breadcrumbs?: BreadcrumbItem[];
        children?: Snippet;
    } = $props();
</script>

<AppLayout {breadcrumbs}>
    {@render children?.()}
</AppLayout>
