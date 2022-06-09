<template>
    <DisclosurePanel class="md:hidden">
        <div class="px-2 py-3 space-y-1 sm:px-3">
            <DisclosureButton as="a" :href="route('index')"
                              :class="`${route().current('index') ? 'm-active' : 'm-inactive'} m-link`"
                              :aria-current="route().current('index') ? 'page' : undefined">Home
            </DisclosureButton>
            <a href="https://blog.sketchni.uk" class="m-link m-inactive">Blog</a>
            <DisclosureButton as="a" :href="route('projects')"
                              :class="`${route().current('projects') ? 'm-active' : 'm-inactive'} m-link`"
                              :aria-current="route().current('projects') ? 'page' : undefined">Projects
            </DisclosureButton>
            <DisclosureButton as="a" :href="route('tools')" v-if="$page.props.tools_count > 0"
                              :class="`${route().current('tools') ? 'm-active' : 'm-inactive'} m-link`"
                              :aria-current="route().current('tools') ? 'page' : undefined">Tools
            </DisclosureButton>
            <DisclosureButton as="a" :href="route('contact')"
                              :class="`${route().current('contact') ? 'm-active' : 'm-inactive'} m-link`"
                              :aria-current="route().current('contact') ? 'page' : undefined">Contact
            </DisclosureButton>
        </div>
        <div class="pt-4 border-t border-ukbb-700">
            <div class="px-2 py-3 space-y-1 sm:px-3" v-if="$page.props.user !== null">
                <a :href="route('canvas')" class="m-inactive m-link" dusk="canvas-link">Canvas</a>
                <a href="/horizon" class="m-inactive m-link">
                    Horizon
                </a>
                <x-link :href="`/canvas/users/${$page.props.user.id}/edit`"
                        :class="`${route().current('profile.show') ? 'm-active' : 'm-inactive'} m-link`">
                    Settings
                </x-link>
                <x-link :href="route('api-tokens.index')"
                        :class="`${route().current('api-tokens.index') ? 'm-active' : 'm-inactive'} m-link`">
                    API Keys
                </x-link>
                <button type="button" @click="logout"
                        :class="`m-inactive block w-full hover:underline text-left m-link`">
                    Sign Out
                </button>
            </div>
        </div>
    </DisclosurePanel>
</template>

<script>
import { defineComponent } from "vue";
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { SearchIcon } from "@heroicons/vue/solid";

export default defineComponent({
    name: "MobileNav",

    prop: ['open'],

    components: {
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        BellIcon,
        MenuIcon,
        SearchIcon,
        XIcon,
    },

    created() {

    }
})
</script>

<style scoped>
.active, .m-active {
    @apply bg-ukbb-700 text-white;
}

.inactive, .m-inactive {
    @apply hover:bg-ukbb-600 text-white;
}

a:not(.m-link) {
    @apply px-3 py-2 rounded-md text-sm font-medium;
}

.m-link {
    @apply block px-3 py-2 rounded-md text-sm font-medium;
}
</style>
