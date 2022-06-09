<template>
    <app-layout>
        <x-head>
            <title>Projects</title>
        </x-head>
        <template #header>
            Projects
        </template>

        <div>
            <div v-if="errors === null">
                <div class="grid grid-cols-2 gap-4" v-if="!loading">
                    <Project v-for="project in projects" :project="project.node"/>
                </div>
                <div v-else>
                    <div class="text-5xl text-zinc-400 animate-pulse flex justify-center items-center space-x-2 my-14">
                        <RefreshIcon class="animate-spin w-12 h-12" />
                        <span>Loading projects</span>
                    </div>
                </div>
            </div>

            <div class="bg-red-200 overflow-hidden shadow-xl sm:rounded-lg" v-else>
                <code v-html="errors" class="mx-4 my-2"></code>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import Project from "@/Components/Project";
import AppLayout from "@/Layouts/AppLayout";
import { RefreshIcon } from '@heroicons/vue/solid'

export default defineComponent({
    components: {
        AppLayout,
        Project,
        RefreshIcon,
    },

    data() {
        return {
            data: null,
            errors: null,
            projects: {},
            loading: true,
        }
    },

    created() {
        window.axios.get(route('api.projects')).then(res => {
            this.projects = res.data.data.repositoryOwner.repositories.edges;
            this.loading = false;
        }).catch(e => {
            if (e.hasOwnProperty('response')) {
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
