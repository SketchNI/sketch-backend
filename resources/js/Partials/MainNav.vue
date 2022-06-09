<template>
    <div class="hidden md:block">
        <div class="flex items-center space-x-4">
            <x-link :href="route('index')" dusk="home-link"
                    :class="route().current('index') ? 'active' : 'inactive'"
                    :aria-current="route().current('index') ? 'page' : undefined">Home
            </x-link>
            <a href="https://blog.sketchni.uk" dusk="blog-link"
               class="inactive" aria-current="false">Blog
            </a>
            <x-link :href="route('projects')" dusk="projects-link"
                    :class="route().current('projects') ? 'active' : 'inactive'"
                    :aria-current="route().current('projects') ? 'page' : undefined">Projects
            </x-link>
            <x-link :href="route('tools')" dusk="tools-link" v-if="$page.props.tools_count > 0"
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
        <div class="ml-4 flex items-center md:ml-6" v-if="$page.props.user !== null">
            <a href="/horizon" class="inactive m-link`">Horizon</a>
            <a :href="route('profile.show')"
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
            this.$inertia.post(route('logout'));
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
