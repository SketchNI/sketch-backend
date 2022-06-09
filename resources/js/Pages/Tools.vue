<template>
    <app-layout>
        <x-head>
            <title>Tools</title>
        </x-head>

        <template #header>
            Tools
        </template>

        <div v-if="errors === null">
            <div class="grid grid-cols-3 gap-4">
                There are no tools defined.
            </div>
        </div>

        <div class="bg-red-200 overflow-hidden shadow-xl sm:rounded-lg" v-if="errors !== null">
            <code v-html="errors" class="mx-4 my-2"></code>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },

    data() {
        return {
            data: null,
            errors: null,
        }
    },
})
</script>
