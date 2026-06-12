<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';

    // import FullImage from '@/components/LFS/ui/full-image';

    let image = "storage" + StorageController.index('IMG_9986.png').url;
    console.log(image);
</script>

<AppHead title="Home" />

<div class="flex h-full flex-1 flex-col gap-4 overflow-y-auto">
    <div class="w-full vh-header">
        <img src="{image}" alt="some alt text" class="h-full w-full object-cover"/>
    </div>
    <div class="flex h-full w-full max-w-7xl mx-auto bg-amber-600">
        <div class="row h-52 bg-blue-600"></div>
    </div>
</div>
