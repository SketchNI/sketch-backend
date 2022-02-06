<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="input-checkbox rounded border-0 bg-gray-700 text-blue-600 shadow-sm focus:outline-none
           focus:ring focus:ring-offset-2 focus:ring-offset-gray-[#353535] focus:ring-blue-400 focus:ring-opacity-70">
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    emits: ['update:checked'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
})
</script>
