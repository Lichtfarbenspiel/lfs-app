<script lang="ts">
    import { onMount } from 'svelte';
    import AppHead from '@/components/AppHead.svelte';
    import StorageController from '@/actions/App/Http/Controllers/StorageController';
    import {
        NavigationMenu,
        NavigationMenuItem,
        NavigationMenuList,
        navigationMenuTriggerStyle,
    } from '@/components/LFS/ui/navigation-menu';
    import { Link, page } from '@inertiajs/svelte';

    import { useHttp } from '@inertiajs/svelte';
    import Button from '@/components/ui/button/Button.svelte';

    const galleryKeyList = ['Equine', 'Wedding'];

    const http = useHttp({
        folder: galleryKeyList,
    });
    const route = StorageController.GetGallery().url;

    let galleryKey = 'Equine';
    let galleryData;
    let imageGalleryElement;

    onMount(async () => {
        imageGalleryElement = document.getElementById('image-gallery');

        http.get(route, {
            onSuccess: (response) => {
                galleryData = response;
                assembleGallery(galleryKey); //ToDo: error handling
                console.log('http response', response);
                finaliseGalleryMenu();
            },
            onError: (errors) => {
                console.log('http errors', errors);
            },
        });
    });



    function assembleGallery(key: string) {
        try {
            const gallery = galleryData[key]; // check for error
            let result = '';
            gallery.forEach((image) => {
                result += `<div><img class="h-auto max-w-full rounded-lg" src=${image} /></div>`;
            });

            imageGalleryElement.innerHTML = result;
        } catch (e) {
            console.error('Could not assemble gallery: ' + e);
        }
    }

    function finaliseGalleryMenu() {
        const galleryMenu = document.getElementById('gallery-menu');
        const menuItems = galleryMenu?.getElementsByTagName('button');
        console.log(galleryMenu, menuItems);

        if (!menuItems) return;

        for (const item of menuItems) {
            item.addEventListener("click", () => {assembleGallery(item.id);});
        }
    }    
    
   
</script>


<AppHead title="Home" />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl mx-auto p-5"
>
    <div
        class="grid grid-rows-2 gap-2 h-12 md:h-28 py-2 md:py-4 items-center justify-center"
    >
        <div class="flex justify-center-safe">
            <h1 class="text-xl font-serif">Portfolio</h1>
        </div>
        <div id="gallery-menu" class="flex justify-center-safe">
            <NavigationMenu class="flex h-full items-stretch">
                <NavigationMenuList class="flex h-full items-stretch space-x-2">
                    {#each galleryKeyList as item}
                        <NavigationMenuItem
                            class="relative flex h-full items-center"
                        >
                            <Button
                                id={item}
                                variant="link"
                                class="{navigationMenuTriggerStyle()} h-9 cursor-pointer px-4"
                            >
                                {item}
                            </Button>
                            <!-- {#if url.isCurrentUrl(item.href, url.currentUrl)}
                            <div
                                class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-(--color-dark-green) dark:bg-(--color-light-mint)"
                            ></div>
                        {/if} -->
                        </NavigationMenuItem>
                    {/each}
                </NavigationMenuList>
            </NavigationMenu>
        </div>
    </div>
    <div>
        <section
            id="image-gallery"
            class="grid grid-cols-2 md:grid-cols-4 gap-2 px-5"
        >
            <!-- {#each gallery as image}
                <div>
                    <img class="h-auto max-w-full rounded-lg" src={image} />
                </div>
                {#if i == index}
                    <div class="grid gap-4">
                {/if}
                    

                {#if i == index + 4}
                    </div>
                {/if} 
            {/each} -->

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
