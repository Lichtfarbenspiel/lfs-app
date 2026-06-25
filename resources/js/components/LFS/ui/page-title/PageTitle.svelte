<script lang="ts">
    import {
        NavigationMenu,
        NavigationMenuItem,
        NavigationMenuList,
        navigationMenuTriggerStyle,
    } from '@/components/LFS/ui/navigation-menu';
    import Button from '@/components/ui/button/Button.svelte';

    let { menuList, title } = $props();
</script>

<div class="grid grid-rows-2 gap-2 py-4 md:py-6 items-center justify-center">
    <div class="relative flex w-full justify-center-safe border-b border-sidebar-border/80 px-10">
        <h1 class="text-2xl font-serif">{title}</h1>
    </div>

    {#if menuList != null}
        <div id="title-sub-menu" class="flex justify-center-safe">
            <NavigationMenu class="flex h-full items-stretch">
                <NavigationMenuList class="flex h-full items-stretch space-x-2">
                    {#each menuList as item}
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
    {/if}
</div>
