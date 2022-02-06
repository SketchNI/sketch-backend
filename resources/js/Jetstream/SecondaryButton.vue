<template>
    <button :type="type" class="">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    })
</script>

<style scoped>
button {
    @apply inline-flex items-center px-4 py-2 shadow-sm uppercase tracking-wider text-sm font-medium rounded-md;
    @apply text-white bg-gray-500 hover:bg-gray-600 hover:border-gray-600;
    @apply focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500;
    @apply transition duration-150 ease-in;
}
</style>
