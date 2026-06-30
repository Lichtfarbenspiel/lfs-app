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
    import { show } from '@/routes/gallery';

    import { FullImage } from '@/components/LFS/ui/full-image';
    import PageTitle from '@/components/LFS/ui/page-title/PageTitle.svelte';

    const url = currentUrlState();
    const curUrl = new URL(window.location.href);
    const activeItemStyles =
        'text-(--color-dark-green) dark:text-(--color-light-mint)';

    const galleryKeyList = ['Equine', 'Wedding', 'Nature', 'People', 'Animals'];

    const http = useHttp({
        folder: galleryKeyList,
    });

    const route = StorageController.GetGallery().url;
    let galleryMenu;
    let menuItems;

    let galleryKey = 'Equine';
    const fallbackGallery = galleryKey;
    let galleryData;
    let imageGalleryElement, fullImageElement;
    let curImgSrc = '',
        curImgAlt = '',
        displayImage = 'hidden';

    onMount(async () => {

        imageGalleryElement = document.getElementById('image-gallery');
        fullImageElement = document.getElementById('image-display');

        galleryMenu = document.getElementById('title-sub-menu');
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
            const gallery = galleryData[key]; // ToDo: check for error use fallback
            let result = '';
            imageGalleryElement.innerHTML = '';
            const activeBP = getActiveBreakpoint();
            console.log("activeBP", activeBP);
            const cols = (activeBP == 'xs')? 2 : 4; // ToDo: get current col amount maybe?
            let division =
                gallery.length <= cols
                    ? 0
                    : Math.round(gallery.length / cols) - 1;
            let startpoint = 0;
            let breakpoint = division;

            // console.log('start breakpoint', breakpoint);

            // console.log('start breakpoint', breakpoint);

            for (let i = 0; i < gallery.length; i++) {
                let image = `<button id=${i} class="transparent"><img class="max-w-full rounded-lg img-hover" src=${gallery[i]} /></button>`;
                console.log(`${i} startpoint`, startpoint);
                console.log(`${i} breakpoint`, breakpoint);
                console.log(`${i} division`, division);

                if (i == startpoint && i == breakpoint) {
                    result += `<div class="grid gap-4 flex">${image}</div>`;
                    startpoint = i + 1;
                    breakpoint = startpoint + division;
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

            const imageBtns =
                imageGalleryElement?.getElementsByTagName('button');
            for (const btn of imageBtns) {
                btn.addEventListener('click', () => {
                    showImage(gallery[btn.id], 'altText');
                });
            }

            fullImageElement.addEventListener('click', (event) => {
                hideImage();
            });

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

    function showImage(src: string, alt: string) {
        console.log('supposed to show the enlarged image');

        // open popupcontainer with image

        curImgSrc = src;
        curImgAlt = alt;
        displayImage = '';
    }

    function hideImage() {
        curImgSrc = '';
        curImgAlt = '';
        displayImage = 'hidden';
    }

    function getActiveBreakpoint() {
        let style = getComputedStyle(document.documentElement);

        const breakpoints = {
            sm: convertRemToPixels(style.getPropertyValue('--breakpoint-sm')),
            md: convertRemToPixels(style.getPropertyValue('--breakpoint-md')),
            lg: convertRemToPixels(style.getPropertyValue('--breakpoint-lg')),
        };

        console.log('breakpoints', breakpoints);
        const width = window.screen.availWidth;
        console.log("width", width);
        if (width < breakpoints.sm) 
            return 'xs';
        else if (width == breakpoints.sm)
            return 'sm';
        else if (width == breakpoints.md)
            return 'md';
        else if (width == breakpoints.lg)
            return 'lg';


        // switch (window.screen.availWidth) {
        //     case breakpoints.sm:
        //         return 'sm';
        //     case breakpoints.md:
        //         return 'md';
        //     case breakpoints.lg:
        //         return 'lg';
        // }
    }

    function convertRemToPixels(rem) {
        const regex = /rem/i;
        rem = rem.replace(regex, '');
        console.log('rem', rem);
        return (
            rem *
            parseFloat(getComputedStyle(document.documentElement).fontSize)
        );
    }
</script>

<AppHead title="Portfolio" />

<div
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto max-w-7xl mx-auto p-5"
>
    <PageTitle menuList={galleryKeyList} title="Portfolio" />
    <!-- <div
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
    </div> -->
    <div id="gallery-conatiner">
        <section
            id="image-gallery"
            class="grid grid-cols-2 md:grid-cols-4 gap-4 px-5 items-start"
        ></section>
        <FullImage
            src={curImgSrc}
            alt={curImgAlt}
            class={displayImage}
            onclick={hideImage}
        />
    </div>
</div>
