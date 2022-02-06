<template>
    <app-layout title="Projects">
        <template #header>
            Projects
        </template>

        <div v-if="errors === null">
            <div class="grid grid-cols-3 gap-4">
                <Project v-for="project in projects" :project="project.node" />
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
import Project from "@/Components/Project";

export default defineComponent({
    components: {
        Project,
        AppLayout,
    },

    data() {
        return {
            data: null,
            errors: null,
            projects: {},
        }
    },

    created() {
        window.axios.get(route('api.projects')).then(res => {
            this.projects = res.data.data.repositoryOwner.repositories.edges;
        }).catch(e => {
            if ( e.hasOwnProperty('response') ) {
                this.errors = e.response.data.message;
            } else {
                this.errors = e;
            }
        });
    },
})
</script>

<style scoped>
article > p {
    @apply mb-4 leading-7 text-lg;
}
</style>
