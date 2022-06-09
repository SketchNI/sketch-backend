<template>
    <div class="card">
        <div class="p-4">
            <h1 class="text-xl">{{ project.nameWithOwner }}</h1>
            <div class="pb-4 overflow-y-auto" v-if="project.description">
                <p class="text-base text-zinc-200">{{ project.description }}</p>
            </div>
            <p v-else-if="!project.description" class="pb-4 no-desc">No description available.</p>

            <div class="mt-2 flex items-center space-x-4">
                <a :href="project.url" target="_blank" rel="noopener,nofollow" class="button gh"
                data-tippy-content="View on GitHub">
                    <img alt="GitHub Logo" class=" h-5 w-5" src="/images/mark-github-16.svg"/>
                </a>

                <a :href="project.homepageUrl" v-if="project.homepageUrl !== null" target="_blank"
                   rel="noopener,nofollow"
                   class="button hp" data-tippy-content="View Home Page">
                    <img alt="Link Icon" class="h-5 w-5" src="/images/link-16.svg"/>
                </a>

                <p class="flex items-center" v-if="project.forks.totalCount > 0">
                    <img alt="Fork Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/repo-forked-16.svg"/>
                    <span>{{ project.forks.totalCount }}</span>
                </p>
                <p class="flex items-center" v-if="project.stargazerCount > 0">
                    <img alt="Star Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/star-fill-24.svg"/>
                    <span>{{ project.stargazerCount }}</span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

export default {
    name: "Project",

    props: {
        project: {
            type: Object,
            default: {},
        }
    },

    components: {},

    created() {
        this.$nextTick(() => {
            tippy('[data-tippy-content]', {
                arrow: true,
                delay: [200, 300],
                inertia: true,
            });
        });
    },

    data() {
        return {
            attrs: {
                class: 'text-white'
            }
        }
    },
}
</script>

<style scoped>
.card {
    @apply border border-zinc-600 rounded-md shadow-md bg-zinc-800;
}

.no-desc {
    @apply italic text-zinc-200;
}

.button {
    @apply inline-flex items-center px-3 py-1.5 shadow-sm text-sm font-medium rounded-md;
    @apply text-white cursor-pointer hover:no-underline focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900;
}

.gh {
    @apply bg-gradient-to-b from-[#666] to-[#555] hover:from-[#777] hover:to-[#666];
    @apply focus:outline-none focus:ring-zinc-500;
}

.hp {
    @apply bg-gradient-to-b from-ukbb-500 to-ukbb-600 hover:from-ukbb-600 hover:to-ukbb-700;
    @apply focus:outline-none focus:ring-ukbb-500;
}
</style>
