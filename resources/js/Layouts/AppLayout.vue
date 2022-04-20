<template>
    <div class="h-screen flex flex-col justify-between">
        <x-head :title="title"/>
        <div class="bg-ukbb-500 pb-48">
            <Disclosure as="nav" v-slot="{ open }">
                <div class="max-w-7xl pt-8 mx-auto sm:px-6 lg:px-8">
                    <div class="border-t border-b border-ukbb-700">
                        <div class="flex py-2 items-center justify-between px-4 sm:px-0">
                            <main-nav/>
                            <div class="-mr-2 flex md:hidden">
                                <DisclosureButton class="disclosure-button">
                                    <span class="sr-only">Open main menu</span>
                                    <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true"/>
                                    <XIcon v-else class="block h-6 w-6" aria-hidden="true"/>
                                </DisclosureButton>
                            </div>
                        </div>
                    </div>
                </div>
                <mobile-nav/>
            </Disclosure>
        </div>

        <main class="-mt-24 mb-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12">
                <div class="bg-zinc-800 text-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <slot/>
                </div>
            </div>
        </main>

        <footer class="">
            <div class="bg-ukbb-600">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="flex flex-row items-center justify-between text-white">
                        <div>
                            &copy; Sketch | Denver Freeburn {{ new Date().getFullYear() }} - All Rights Reserved.
                            <div class="mt-4 flex justify-between">
                                <a href="https://discord.gg/theclaw" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="Discord">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/>
                                    </svg>
                                </a>
                                <a href="https://github.com/sketchni" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="GitHub">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                    </svg>
                                </a>
                                <a href="https://github.com/sponsors/SketchNI" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="GitHub Sponsors">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.625 1.499c-2.32 0-4.354 1.203-5.625 3.03-1.271-1.827-3.305-3.03-5.625-3.03C3.129 1.499 0 4.253 0 8.249c0 4.275 3.068 7.847 5.828 10.227a33.14 33.14 0 0 0 5.616 3.876l.028.017.008.003-.001.003c.163.085.342.126.521.125.179.001.358-.041.521-.125l-.001-.003.008-.003.028-.017a33.14 33.14 0 0 0 5.616-3.876C20.932 16.096 24 12.524 24 8.249c0-3.996-3.129-6.75-6.375-6.75zm-.919 15.275a30.766 30.766 0 0 1-4.703 3.316l-.004-.002-.004.002a30.955 30.955 0 0 1-4.703-3.316c-2.677-2.307-5.047-5.298-5.047-8.523 0-2.754 2.121-4.5 4.125-4.5 2.06 0 3.914 1.479 4.544 3.684.143.495.596.797 1.086.796.49.001.943-.302 1.085-.796.63-2.205 2.484-3.684 4.544-3.684 2.004 0 4.125 1.746 4.125 4.5 0 3.225-2.37 6.216-5.048 8.523z"/>
                                    </svg>
                                </a>
                                <a href="https://instagram.com/sketchniuk" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="Instagram">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                    </svg>
                                </a>
                                <a href="https://www.polywork.com/sketchni" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="Polywork">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.125 0H4.875A4.865 4.865 0 0 0 0 4.875v14.25C0 21.825 2.175 24 4.875 24h6.6c2.7 0 4.875-2.175 4.875-4.875V16.65h2.775c2.7 0 4.875-2.175 4.875-4.875v-6.9C24 2.175 21.825 0 19.125 0zM16.5 1.275h2.625a3.6 3.6 0 0 1 3.6 3.6v2.7H16.5v-6.3zM15.075 9v6.45H8.85V9h6.225zM8.85 1.2h6.225v6.375H8.85V1.2zM1.275 4.8a3.6 3.6 0 0 1 3.6-3.6H7.5v6.375H1.275V4.8zM7.5 9v6.45H1.2V9h6.3zm0 13.725H4.8a3.6 3.6 0 0 1-3.6-3.6V16.8h6.3v5.925zm7.575-3.525a3.6 3.6 0 0 1-3.6 3.6H8.85v-5.925h6.225V19.2zm7.65-7.35a3.6 3.6 0 0 1-3.6 3.6H16.5V9h6.225v2.85z"/>
                                    </svg>
                                </a>
                                <a href="https://twitch.tv/sketchniuk" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="Twitch">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.571 4.714h1.715v5.143H11.57zm4.715 0H18v5.143h-1.714zM6 0L1.714 4.286v15.428h5.143V24l4.286-4.286h3.428L22.286 12V0zm14.571 11.143l-3.428 3.428h-3.429l-3 3v-3H6.857V1.714h13.714Z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/sketchni" rel="nofollow,noopener,noreferrer"
                                   data-tippy-content="Twitter">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="https://www.youtube.com/channel/UCg3Puk7SbteQFrjKudyEpvg"
                                   rel="nofollow,noopener,noreferrer" data-tippy-content="Youtube">
                                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div>
                            <a href="https://www.digitalocean.com/?refcode=29b2926730a1&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge">
                                <img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%201.svg"
                                     alt="DigitalOcean Referral Badge"/>
                            </a>
                        </div>

                        <div>
                            <div class="flex text-right items-center space-x-1">
                                <span>Made with Laravel, VueJS and InertiaJS with</span>
                                <div id="heart"></div>
                                <span>by <span class="font-black">Sketch</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import MainNav from "@/Partials/MainNav";
import MobileNav from "@/Partials/MobileNav";
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { SearchIcon } from "@heroicons/vue/solid";
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

export default defineComponent({
    props: {
        title: String,
    },

    components: {
        MobileNav,
        MainNav,
        Disclosure,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        DisclosureButton,
        DisclosurePanel,
        BellIcon,
        MenuIcon,
        SearchIcon,
        XIcon,
    },

    mounted() {
        this.$nextTick(() => {
            tippy('[data-tippy-content]', {
                arrow: true,
                delay: [200, 300],
                inertia: true,
            });
        });
    },

    methods: {
        logout() {
            this.$inertia.post(route('canvas.logout'));
        },
    }

});
</script>

<style>
.disclosure-button {
    @apply bg-ukbb-700 inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-ukbb-400;
    @apply focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-ukbb-500 focus:ring-ukbb-700;
    @apply transition duration-150 ease-in;
}

#heart {
    @apply w-[30px] h-[20px] relative;
    animation: heartbeat .1s 1;
}

#heart:hover {
    animation: heartbeat 1s infinite ease-in-out;
}

#heart:before,
#heart:after {
    @apply absolute left-[15px] top-0 w-[15px] h-[24px] bg-red-400;
    content: "";
    border-radius: 50px 50px 0 0;
    transform: rotate(-45deg);
    transform-origin: 0 100%;
}

#heart:after {
    left: 0;
    transform: rotate(45deg);
    transform-origin: 100% 100%;
}


@keyframes heartbeat {
    0% {
        transform: scale(.75);
    }
    20% {
        transform: scale(1);
    }
    40% {
        transform: scale(.75);
    }
    60% {
        transform: scale(1);
    }
    80% {
        transform: scale(.75);
    }
    100% {
        transform: scale(.75);
    }
}

svg[role="img"] {
    @apply w-8 h-8 fill-white;
}
</style>
