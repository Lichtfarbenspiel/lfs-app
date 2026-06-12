<script lang="ts">
    import { onMount } from 'svelte';
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';

    import { useHttp } from '@inertiajs/svelte';

    const http = useHttp({
        folder: 'Equine',
    });
    const route = StorageController.GetGallery().url;

    let gallery: string[] = [];

   

    onMount(async () => {
         http.get(route, {
        onSuccess: (response) => {
            gallery = response; //ToDo: fix this
            console.log('http response', response);
        },
        onError: (errors) => {
            console.log('http errors', errors);
        },
    });

        console.log('onmount gallery', gallery);
    });

    let index = 0;
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
            {#each gallery as image}
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                <!-- {#if i == index}
                    <div class="grid gap-4">
                {/if}
                    

                {#if i == index + 4}
                    </div>
                {/if} -->
            {/each}

            <!-- <div class="grid gap-4">
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
            </div> -->
        </section>
    </div>
</div>
