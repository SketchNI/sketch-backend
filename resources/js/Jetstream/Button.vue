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
    @apply text-white bg-purple-600 hover:bg-purple-700 hover:border-purple-700;
    @apply focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-600;
    @apply transition duration-150 ease-in;
}
</style>
