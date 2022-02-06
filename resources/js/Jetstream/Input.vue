<template>
    <label :for="name" class="label">{{ label }}</label>
    <input :type="type ?? 'text'" :name="name" :id="name" class="input" :autocomplete="name"
           :autofocus="true ?? false"
           :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue', 'label', 'name', 'type', 'autofocus'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    })
</script>

<style scoped>
article > p {
    @apply mb-4 leading-7 text-lg;
}

.input {
    @apply block w-full border-0 p-0 text-zinc-300 bg-zinc-900 placeholder-zinc-500 focus:ring-0;
    @apply transition duration-150 ease-in;
}

.label {
    @apply block text-xs font-medium text-zinc-400;
}
</style>
