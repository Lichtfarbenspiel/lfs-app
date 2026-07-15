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

    const fallbackGallery = 'Equine';
    let galleryData;
    let imageGalleryElement, fullImageElement;
    let curImgSrc = '',
        curImgAlt = '',
        displayImage = 'hidden';
    var activeBP;

    onMount(async () => {
        imageGalleryElement = document.getElementById('image-gallery'); // lazy load and caching
        fullImageElement = document.getElementById('image-display');

        galleryMenu = document.getElementById('title-sub-menu');
        menuItems = galleryMenu?.getElementsByTagName('button');
        console.log(galleryMenu, menuItems);

        http.get(route, {
            onSuccess: (response) => {
                galleryData = response;
                assembleGallery(getStoredGalleryKey()); //ToDo: error handling
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
            activeBP = getActiveBreakpoint();
            console.log('activeBP', activeBP);
            const cols = activeBP == 'xs' ? 1 : activeBP == 'sm' ? 2 : 4;
            let division =
                gallery.length <= cols
                    ? 0
                    : Math.round(gallery.length / cols) - 1;
            let startpoint = 0;
            let breakpoint = division;

            for (let i = 0; i < gallery.length; i++) {
                let image = `<button id=${i} class="transparent" command="show-modal" commandfor="image-display"><img class="max-w-full rounded-lg img-hover" src=${gallery[i]} /></button>`;
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
                // fullImageElement.close();
            });

            window.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    hideImage();
                    // fullImageElement.close();
                }
            });

            window.addEventListener('resize', (event) => {
                if (activeBP != getActiveBreakpoint())
                    assembleGallery(getStoredGalleryKey());
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
    }

    function convertRemToPixels(rem) {
        const regex = /rem/i;
        rem = rem.replace(regex, '');
        console.log('rem', rem);
        retu
        const galleryStored = localStorage.getItem('gallery') ?? null;
        if (keyToCheck == galleryStored) return ifTrue;
        return ifFalse;
    }

    function UpdateMenuItemActive() {
        const galleryStored =
            localStorage.getItem('gallery') ?? fallbackGallery;
        const activeStyles = [
            'text-(--color-dark-green)',
            'dark:text-(--color-mint)',
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
        curImgSrc = src;
        curImgAlt = alt;
        displayImage = '';
    }

    function hideImage() {
        curImgSrc = '';
        curImgAlt = '';
        displayImage = 'hidden';
    }

    function getStoredGalleryKey(): string {
        // let params = new URLSearchParams(document.location.search);
        let galleryStored = localStorage.getItem('gallery') ?? null; //params? params.get("gallery") : null;
        return galleryStored ?? fallbackGallery;
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
        console.log('width', width);
        if (width < breakpoints.sm) return 'xs';
        else if (width >= breakpoints.sm && width <= breakpoints.md)
            return 'sm';
        else if (width >= breakpoints.md && width <= breakpoints.lg)
            return 'md';
        else if (width >= breakpoints.lg) return 'lg';
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
    class="flex h-full flex-1 flex-col gap-4 overflow-y-auto w-fullmax-w-7xl mx-auto p-5"
>
    <PageTitle menuList={galleryKeyList} title="Portfolio" />
    <div id="gallery-conatiner" class="flex w-full">
        <section
            id="image-gallery"
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 px-5 items-start auto-rows-[minmax(100px,auto)]"
        ></section>
        <FullImage
            src={curImgSrc}
            alt={curImgAlt}
            class={displayImage}
            onclick={hideImage}
        />
    </div>
</div>
