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
                default: 'submit',
            },
        }
    })
</script>

<style scoped>
button {
    @apply inline-flex items-center px-4 py-2 uppercase tracking-wider shadow-sm text-sm font-medium rounded-md;
    @apply text-white bg-ukbb-500 hover:bg-ukbb-600 hover:border-ukbb-600;
    @apply focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ukbb-500;
    @apply transition duration-150 ease-in;
}
</style>
