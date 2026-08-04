<script lang="ts">
    import { Link, page } from '@inertiajs/svelte';
    import Folder from 'lucide-svelte/icons/folder';
    import LayoutGrid from 'lucide-svelte/icons/layout-grid';
    import Menu from 'lucide-svelte/icons/menu';
    import Search from 'lucide-svelte/icons/search';
    import AppLogo from '@/components/LFS/AppLogo.svelte';
    import AppLogoIcon from '@/components/LFS/AppLogoIcon.svelte';
    import Breadcrumbs from '@/components/Breadcrumbs.svelte';
    import { Button } from '@/components/ui/button';
    import {
        NavigationMenu,
        NavigationMenuItem,
        NavigationMenuList,
        navigationMenuTriggerStyle,
    } from '@/components/LFS/ui/navigation-menu';
    import {
        Sheet,
        SheetContent,
        SheetHeader,
        SheetTitle,
        SheetTrigger,
    } from '@/components/ui/sheet';
    import {
        Tooltip,
        TooltipContent,
        TooltipProvider,
        TooltipTrigger,
    } from '@/components/ui/tooltip';
    import { currentUrlState } from '@/lib/currentUrl.svelte';
    import { toUrl } from '@/lib/utils';
    import type { BreadcrumbItem, NavItem } from '@/types';
    import ToggleTheme from './ui/toggle-theme/ToggleTheme.svelte';
    import { LL } from '../../../../src/i18n/i18n-svelte';
    import { ToggleLanguage } from '@/components/LFS/ui/toggle-language';


    let {
        breadcrumbs = [],
    }: {
        breadcrumbs?: BreadcrumbItem[];
    } = $props();

    const url = currentUrlState();

    const activeItemStyles =
        'text-(--color-dark-green) dark:text-(--color-mint)';

    const mainNavItems: NavItem[] = [
        {
            title: 'Home',
            href: '/',
        },
        {
            title: 'Portfolio',
            href: '/portfolio',
        },
        {
            title: 'Blog',
            href: 'https://blog.lichtfarbenspiel.de',
            rel: "external",
        },
        {
            title: 'About',
            href: '/about',
        },
    ];
</script>

<div class="sticky top-0 bg-background z-999">
    <div class="border-b border-sidebar-border/80">
        <div
            class="mx-auto flex h-(--header-height) items-between justify-between px-4 md:max-w-7xl"
        >
            <Link href='/' class="flex items-center gap-x-2">
                <AppLogo />
            </Link>

            <!-- Mobile Menu -->
            <div class="lg:hidden place-content-center">
                <Sheet>
                    <SheetTrigger asChild>
                        {#snippet children(props)}
                            <Button
                                variant="ghost"
                                size="icon"
                                class="mr-2 h-9 w-9 self-center"
                                onclick={props.onclick}
                                aria-expanded={props['aria-expanded']}
                            >
                                <Menu class="h-5 w-5" />
                            </Button>
                        {/snippet}
                    </SheetTrigger>
                    <SheetContent side="right" class="w-75 p-6 right-0">
                        <SheetTitle class="sr-only">Navigation menu</SheetTitle>
                        <SheetHeader class="flex justify-start text-left">
                            <AppLogoIcon
                                class="size-6 text-(--color-dark-green) dark:text-white"
                            />
                        </SheetHeader>
                        <div
                            class="flex h-full flex-1 flex-col justify-between space-y-4 pt-6 pb-10"
                        >
                            <nav class="-mx-3 space-y-1">
                                {#each mainNavItems as item (toUrl(item.href))}
                                    <!-- {@const menu: keyof Translation['menu'] = item.title.toLocaleLowerCase()} -->
                                    {@const key =
                                        item.title.toLocaleLowerCase()}

                                    <Link
                                        href={toUrl(item.href)}
                                        class="flex items-center gap-x-3 rounded-lg px-3 py-2 text-sm font-medium font-serif hover:text-accent-foreground {url.whenCurrentUrl(
                                            item.href,
                                            url.currentUrl,
                                            activeItemStyles +
                                                ' underline underline-offset-4',
                                            '',
                                        ) ?? ''}"
                                        item.rel ?? rel={item.rel}
                                    >
                                        {#if item.icon}
                                            <item.icon class="h-5 w-5" />
                                        {/if}
                                        {$LL.menu[key].title()}
                                    </Link>
                                {/each}
                                <ToggleLanguage />
                                <ToggleTheme />
                            </nav>
                        </div>
                    </SheetContent>
                </Sheet>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden h-full lg:flex lg:flex-1 justify-end-safe">
                <NavigationMenu class="ml-10 flex h-full items-stretch">
                    <NavigationMenuList
                        class="flex h-full items-stretch space-x-2"
                    >
                        {#each mainNavItems as item (toUrl(item.href))}
                            {@const key = item.title.toLocaleLowerCase()}
                            <!-- {@const menu: keyof Translation['menu'] = key} -->
                            <NavigationMenuItem
                                class="relative flex h-full items-center"
                            >
                                <Link
                                    class="{navigationMenuTriggerStyle()} {url.whenCurrentUrl(
                                        item.href,
                                        url.currentUrl,
                                        activeItemStyles,
                                        '',
                                    ) ?? ''} h-9 cursor-pointer px-4"
                                    href={toUrl(item.href)}
                                >
                                    {#if item.icon}
                                        <item.icon class="mr-2 h-4 w-4" />
                                    {/if}
                                    {$LL.menu[key].title()}
                                </Link>
                                {#if url.isCurrentUrl(item.href, url.currentUrl)}
                                    <div
                                        class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-(--color-dark-green) dark:bg-(--color-mint)"
                                    ></div>
                                {/if}
                            </NavigationMenuItem>
                        {/each}
                        <ToggleLanguage />
                        <ToggleTheme />
                    </NavigationMenuList>
                </NavigationMenu>
            </div>

            <!--   -->

            <!-- <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        {#snippet children(props)}
                            <Button
                                variant="ghost"
                                size="icon"
                                class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                                onclick={props.onclick}
                                aria-expanded={props['aria-expanded']}
                                data-state={props['data-state']}
                            >
                                <Avatar
                                    class="size-8 overflow-hidden rounded-full"
                                >
                                    {#if auth.user?.avatar}
                                        <AvatarImage
                                            src={auth.user.avatar}
                                            alt={auth.user?.name}
                                        />
                                    {/if}
                                    <AvatarFallback
                                        class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {getInitials(auth.user?.name ?? '')}
                                    </AvatarFallback>
                                </Avatar>
                            </Button>
                        {/snippet}
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" class="w-56">
                        {#if auth.user}
                            <UserMenuContent user={auth.user} />
                        {/if}
                    </DropdownMenuContent>
                </DropdownMenu> -->
            <!-- </div> -->
        </div>
    </div>

    {#if breadcrumbs.length > 1}
        <div class="flex w-full border-b border-sidebar-border/70">
            <div
                class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl"
            >
                <Breadcrumbs {breadcrumbs} />
            </div>
        </div>
    {/if}
</div>
