<script lang="ts">
    import {
        NavigationMenu,
        NavigationMenuItem,
        NavigationMenuList,
        navigationMenuTriggerStyle,
    } from '@/components/LFS/ui/navigation-menu';
    import Button from '@/components/ui/button/Button.svelte';
    import { LL } from '../../../../../../src/i18n/i18n-svelte';
    import type { Translation } from '../../../../../../src/i18n/i18n-types';

    let { menuList, titleKey } = $props();
</script>

<div
    class="grid grid-rows-2 gap-2 py-4 md:py-6 items-center justify-center w-full"
>
    <div
        class="relative flex w-full justify-center-safe border-b border-sidebar-border/80 px-10"
    >
        <h1 class="text-2xl font-serif">{$LL.pageTitle[titleKey].title()}</h1>
    </div>

    {#if menuList != null}
        <div id="title-sub-menu" class="flex justify-center-safe">
            <NavigationMenu class="flex h-full items-stretch max-w-full">
                <NavigationMenuList
                    class="flex h-full items-stretch space-x-2 flex-wrap"
                >
                    {#each menuList as item}
                       
                        {@const portfolio_menu: keyof Translation['portfolio_menu'] = item.toLocaleLowerCase()}                    
                        <NavigationMenuItem
                            class="relative flex h-full items-center"
                        >
                            <Button
                                id={item}
                                variant="link"
                                class="{navigationMenuTriggerStyle()} h-9 cursor-pointer px-4"
                            >
                                {$LL.portfolio_menu[portfolio_menu].name()}
                            </Button>
                        </NavigationMenuItem>
                    {/each}
                </NavigationMenuList>
            </NavigationMenu>
        </div>
    {/if}
</div>
