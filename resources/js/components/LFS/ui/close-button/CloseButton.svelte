<script lang="ts">
    import { cn } from '@/lib/utils';
    import  X  from 'lucide-svelte/icons/x';

    let {
        class: className = '',
        onclick: close,
        command: command, 
        commandfor: commandfor
    }: { class?: string; onclick?; command?; commandfor } = $props();
</script>

<button
    type="button"
    class={cn("ring-offset-background focus-visible:ring-ring absolute top-20 right-5 rounded-xs opacity-70 transition-opacity hover:opacity-100 hover:cursor-pointer focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-hidden disabled:pointer-events-none", className)}
    aria-label="Close"
    onclick={close}
    command={command}
    commandfor={commandfor}
>
    <X class="w-full h-full" />
    <span class="sr-only">Close</span>
</button>
