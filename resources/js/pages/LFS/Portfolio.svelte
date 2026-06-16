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
    import { currentUrlState } from '@/lib/currentUrl.svelte';

    const url = currentUrlState();
    const curUrl = new URL(window.location.href);
    const activeItemStyles =
        'text-(--color-dark-green) dark:text-(--color-light-mint)';

    const galleryKeyList = ['Equine', 'Wedding'];

    const http = useHttp({
        folder: galleryKeyList,
    });

    const route = StorageController.GetGallery().url;
    let galleryMenu;
    let menuItems;

    let galleryKey = 'Equine';
    const fallbackGallery = galleryKey;
    let galleryData;
    let imageGalleryElement;

    onMount(async () => {
        imageGalleryElement = document.getElementById('image-gallery');

        galleryMenu = document.getElementById('gallery-menu');
        menuItems = galleryMenu?.getElementsByTagName('button');
        console.log(galleryMenu, menuItems);

        http.get(route, {
            onSuccess: (response) => {
                galleryData = response;
                // let params = new URLSearchParams(document.location.search);
                let galleryStored = localStorage.getItem('gallery') ?? null; //params? params.get("gallery") : null;
                if (galleryStored) galleryKey = galleryStored;
                assembleGallery(galleryKey); //ToDo: error handling
                // console.log('http response', response);
                finaliseGalleryMenu();
            },
            onError: (errors) => {
                console.log('http errors', errors);
            },
        });
    });

    function assembleGallery(key: string) {
        try {
            const gallery = galleryData[key]; // check for error use fallback
            let result = '';
            imageGalleryElement.innerHTML = '';

            const cols = 4; // To do get current col amount maybe?
            let division =
                gallery.length <= cols
                    ? 0
                    : Math.round(gallery.length / cols) - 1;
            let startpoint = 0;
            let breakpoint = division;

            // console.log('start breakpoint', breakpoint);

            // console.log('start breakpoint', breakpoint);

            for (let i = 0; i < gallery.length; i++) {
                let image = `<div id=${i} class="h-fit"><img class="max-w-full rounded-lg" src=${gallery[i]} /></div>`;
                console.log(`${i} startpoint`, startpoint);
                console.log(`${i} breakpoint`, breakpoint);

                if (i == startpoint && i == breakpoint) {
                    result += `<div class="grid gap-4 flex">${image}</div>`;
                } else if (i == startpoint) {
                    result += `<div class="grid gap-4 flex">${image}`;
                } else if (i == breakpoint) {
                    result += `${image}</div>`;
                    startpoint = i + 1;
                    breakpoint = startpoint + division;

                    // console.log(`${i} new startpoint`, startpoint);

                    // console.log(`${i} new breakpoint`, breakpoint);
                } else {
                    result += image;
                }
            }

            imageGalleryElement.innerHTML = result;
            localStorage.setItem('gallery', key);
            UpdateMenuItemActive();

            // updateURLParam('gallery', key);
        } catch (e) {
            console.error('Could not assemble gallery: ' + e);
        }
    }

    function updateURLParam(key: string, value: string) {
        curUrl.searchParams.set(key, value);
        // for (const key of Object.keys(params)) {
        //     curUrl.searchParams.set(key, params[key]); // check for validity
        // }
        window.history.replaceState(null, '', curUrl);
    }

    function finaliseGalleryMenu() {
        if (!menuItems) return;

        for (const item of menuItems) {
            item.addEventListener('click', () => {
                assembleGallery(item.id);
            });
        }
    }

    function CurrentGalleryItem(
        keyToCheck: string,
        ifTrue: string,
        ifFalse: string,
    ) {
        const galleryStored = localStorage.getItem('gallery') ?? null;
        if (keyToCheck == galleryStored) return ifTrue;
        return ifFalse;
    }

    function UpdateMenuItemActive() {
        const galleryStored =
            localStorage.getItem('gallery') ?? fallbackGallery;
        const activeStyles = [
            'text-(--color-dark-green)',
            'dark:text-(--color-light-mint)',
            'underline',
            'underline-offset-4',
        ];
        console.log('activeStyles', activeStyles);
        for (const item of menuItems) {
            if (item.id == galleryStored) {
                item.classList.add(...activeStyles);
                item.classList.remove('text-primary');
            } else {
                item.classList.remove(...activeStyles);
                item.classList.add('text-primary');
            }
        }
    }
</script>

<AppHead title="Home" />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl mx-auto p-5"
>
    <div
        class="grid grid-rows-2 gap-2 py-2 md:py-4 items-center justify-center"
    >
        <div class="flex justify-center-safe">
            <h1 class="text-2xl font-serif">Portfolio</h1>
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
                        </NavigationMenuItem>
                    {/each}
                </NavigationMenuList>
            </NavigationMenu>
        </div>
    </div>
    <div>
        <section
            id="image-gallery"
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 px-5 items-start"
        ></section>
    </div>
</div>
