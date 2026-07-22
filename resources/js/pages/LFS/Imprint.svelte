<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import { PageTitle } from '@/components/LFS/ui/page-title';
    import LL from '../../../../src/i18n/i18n-svelte';

    const title = 'imprint';
</script>

<AppHead {title} />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl mx-auto p-5"
>
    <PageTitle menuList={null} titleKey={title} />

    <div id="page-content">
        <div class="flex h-auto w-full flex-col text-foreground text-md max-w-4xl px-5 gap-3">
            {@html $LL.imprint_description()}
        </div>
    </div>
</div>
