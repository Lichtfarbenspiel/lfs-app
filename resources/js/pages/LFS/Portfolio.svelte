<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';

    // import FullImage from '@/components/LFS/ui/full-image';

    let image = StorageController.index('IMG_9986.png').url;
    console.log(image);
</script>

<AppHead title="Home" />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl justify-center mx-auto p-5"
>
    <div class="flex h-12 md:h-28 py-2 md:py-4 items-center justify-center">
        <h1 class="text-xl font-serif">Portfolio</h1>
    </div>
    <div>
        <section class="grid grid-cols-2 md:grid-cols-4 gap-2 px-5">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
            </div>

            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
            </div>
        </section>
    </div>
</div>
