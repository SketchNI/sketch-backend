<template>
    <div class="hidden md:block">
        <div class="flex items-baseline space-x-4">
            <x-link :href="route('index')" dusk="home-link"
                    :class="route().current('index') ? 'active' : 'inactive'"
                    :aria-current="route().current('index') ? 'page' : undefined">Home
            </x-link>
            <x-link :href="route('blog')" dusk="blog-link"
                    :class="route().current('blog') ? 'active' : 'inactive'"
                    :aria-current="route().current('blog') ? 'page' : undefined">Blog
            </x-link>
            <x-link :href="route('projects')" dusk="projects-link"
                    :class="route().current('projects') ? 'active' : 'inactive'"
                    :aria-current="route().current('projects') ? 'page' : undefined">Projects
            </x-link>
            <x-link :href="route('tools')" dusk="tools-link"
                    :class="route().current('tools') ? 'active' : 'inactive'"
                    :aria-current="route().current('tools') ? 'page' : undefined">Tools
            </x-link>
            <x-link :href="route('contact')" dusk="contact-link"
                    :class="route().current('contact') ? 'active' : 'inactive'"
                    :aria-current="route().current('contact') ? 'page' : undefined">Contact
            </x-link>
        </div>
    </div>
    <div class="hidden md:block">
        <div class="absolute inset-x-auto top-3 h-32 w-32 border-4 rounded-lg border-ukbb-700">
            <img :src="$page.props.global.assets.favicon['chrome-192']"
                 alt="SketchNI Chibi-style Avatar by Pandreem."
                 class="rounded-md bg-white p-[4px] bg-opacity-60"/>
        </div>
    </div>
    <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6" v-if="$page.props.user !== null">
            <a :href="route('canvas')" class="inactive m-link" dusk="canvas-link">Canvas</a>
            <a href="/horizon" class="inactive m-link`">Horizon</a>
            <a :href="`/canvas/users/${$page.props.user.id}/edit`"
               class="inactive m-link`">Settings</a>
            <x-link :href="route('api-tokens.index')"
                    class="inactive m-link">
                API Keys
            </x-link>
            <div class="bg-ukbb-700 mx-4 h-8 w-px"></div>
            <button type="button" @click="logout"
                    class="inactive m-link">
                Sign Out
            </button>
        </div>
        <div class="ml-4 flex items-center md:ml-6" v-else>
            <a :href="route('canvas.login')" dusk="login-link"
                    class="inactive px-3 py-2 rounded-md text-sm font-medium">
                Sign In
            </a>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { MenuIcon, XIcon } from '@heroicons/vue/outline'

export default defineComponent({
    name: "MainNav",

    data() {
        return {
            Menu,
            XIcon,
            MenuIcon,
            MenuItem,
            MenuItems,
            MenuButton,
            Disclosure,
            DisclosurePanel,
            DisclosureButton
        }
    },

    methods: {
        logout() {
            this.$inertia.get(route('canvas.logout'));
        },
    }
})
</script>

<style scoped>
.active, .m-active {
    @apply bg-ukbb-600 text-white;
}

.inactive, .m-inactive {
    @apply hover:bg-ukbb-600 text-white;
}

a:not(.m-link) {
    @apply px-3 py-2 rounded-md font-medium;
}

.m-link {
    @apply block px-3 py-2 rounded-md font-medium;
}
</style>
