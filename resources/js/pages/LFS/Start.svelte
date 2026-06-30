<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';

    let image = "storage" + StorageController.index('IMG_9986.png').url;
</script>

<AppHead title="Home" />

<div class="flex flex-1 flex-col overflow-y-hidden">
    <div class="w-full vh-header -pb-(--footer-height)">
        <img src="{image}" alt="some alt text" class="h-full w-full object-cover"/>
    </div>
</div>
