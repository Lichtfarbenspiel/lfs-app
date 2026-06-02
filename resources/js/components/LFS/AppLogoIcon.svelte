<script lang="ts">
    let {
        class: className = '',
        ...rest
    }: {
        class?: string;
        [key: string]: unknown;
    } = $props();
</script>

<span class="mb-0.5 truncate leading-tight font-old-standard {className}"
    >L</span
>
