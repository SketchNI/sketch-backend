<template>
    <div class="card">
        <div class="p-4">
            <h1 class="text-xl">{{ project.nameWithOwner }}</h1>
            <div class="h-48 overflow-y-auto" v-if="project.description">
                <p class="text-base text-zinc-400">{{ project.description }}</p>
            </div>
            <p v-else-if="!project.description" class="h-48 no-desc">No description available.</p>

            <div class="mt-2 flex items-center space-x-4">
                <a :href="project.url" target="_blank" rel="noopener,nofollow" class="button gh">
                    <img alt="GitHub Logo" class="-ml-1 mr-3 h-5 w-5" src="/images/mark-github-16.svg"/>
                    <span>GitHub</span>
                </a>

                <a :href="project.homepageUrl" v-if="project.homepageUrl !== null" target="_blank" rel="noopener,nofollow"
                   class="button hp">
                    <img alt="Link Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/link-16.svg"/>
                    <span>Home Page</span>
                </a>
            </div>
        </div>
        <div class="border-t border-black px-4 py-2 flex items-center justify-between">
            <p class="flex items-center">
                <img alt="Fork Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/repo-forked-16.svg"/>
                <span>{{ project.forks.totalCount }}</span>
            </p>
            <p class="flex items-center">
                <img alt="Star Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/star-fill-24.svg"/>
                <span>{{ project.stargazerCount }}</span>
            </p>
            <p class="flex items-center">
                <img alt="Pull Request Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/git-pull-request-24.svg"/>
                <span>{{ project.pullRequests.totalCount }}</span>
            </p>
            <p class="flex items-center">
                <img alt="Issue Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/issue-opened-24.svg"/>
                <span>{{ project.issues.totalCount }}</span>
            </p>
            <p class="flex items-center">
                <img alt="Tag Icon" class="-ml-1 mr-3 h-5 w-5" src="/images/tag-24.svg"/>
                <span>{{ project.releases.totalCount }}</span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Project",

    props: {
        project: {
            type: Object,
            default: {},
        }
    },

    components: {},

    data() {
        return {
            attrs: {
                class: 'text-white'
            }
        }
    },

    created() {
        console.log(this.project);
    }
}
</script>

<style scoped>
.card {
    @apply border border-black rounded-md shadow-md bg-zinc-900;
}

.no-desc {
    @apply italic text-zinc-600;
}

.button {
    @apply inline-flex items-center px-3 py-1.5 shadow-sm text-sm font-medium rounded-md;
    @apply text-white cursor-pointer hover:no-underline focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900;
}

.gh {
    @apply bg-gradient-to-b from-[#444] to-[#333] hover:from-[#333] hover:to-[#222];
    @apply focus:outline-none focus:ring-zinc-500;
}

.hp {
    @apply bg-gradient-to-b from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800;
    @apply focus:outline-none focus:ring-blue-500;
}
</style>
