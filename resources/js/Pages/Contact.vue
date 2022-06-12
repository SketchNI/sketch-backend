<template>
    <app-layout title="Contact Me">
        <template #header>
            Contact Me
        </template>

        <div class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row items-start space-x-8">
            <div class="form w-full px-4 lg:px-0 lg:w-1/2">
                <form @submit.prevent="sendMailForm">
                    <div class="input-group">
                        <label for="name" class="label">Name</label>
                        <input type="text" name="name" id="name" v-model="form.name" class="input" autofocus/>
                    </div>

                    <div class="input-group mt-4">
                        <label for="email" class="label">Email Address</label>
                        <input type="email" name="email" id="email" v-model="form.email" class="input"/>
                    </div>

                    <div class="input-group mt-4">
                        <label for="message" class="label">Message</label>
                        <textarea class="textarea" name="message" id="message" rows="8"
                                  v-model="form.message"></textarea>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center space-x-1.5">
                            <label for="send_to_me" class="flex-items-center space-x-1.5">
                                <input type="checkbox" name="send_to_me" id="send_to_me"
                                       class="form-checkbox"
                                       v-model="form.send_to_me"/>
                                <span class="text-xs font-medium text-zinc-400">Also send me a copy</span>
                            </label>
                        </div>
                        <div>
                            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                                Your message has been sent.
                            </jet-action-message>

                            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                <MailIcon class="w-5 h-5 mr-2"/>
                                Send Message
                            </jet-button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="socials hidden lg:block px-4 lg:px-0 lg:w-1/2">
                <div class="flex items-center">
                    <a href="https://twitter.com/SketchNI" target="_blank" rel="noopener,nofollow"
                       class="flex w-1/2 items-center lg:space-x-2 hover:no-underline py-4 px-6 hover:bg-zinc-700 rounded-md">
                        <img src="/images/twitter.png" class="w-16 rounded-full" alt="Twitter Logo">
                        <div>
                            <p class="text-lg lg:text-xl font-bold text-white">Sketch</p>
                            <p class="text-sm lg:text-base text-zinc-300">@SketchNI</p>
                        </div>
                    </a>

                    <a href="https://instagram.com/SketchNIUK" target="_blank" rel="noopener,nofollow"
                       class="flex w-1/2 items-center space-x-2 hover:no-underline py-4 px-6 hover:bg-zinc-700 rounded-md">
                        <img src="/images/instagram.png" class="w-16" alt="Instagram Logo">
                        <div>
                            <p class="text-lg lg:text-xl font-bold text-white">Denver Freeburn</p>
                            <p class="text-sm lg:text-base text-zinc-300">sketchniuk</p>
                        </div>
                    </a>
                </div>

                <div class="flex items-center">
                    <div class="flex w-1/2 items-center space-x-2 py-4 px-6">
                        <img src="/images/discord.png" class="w-16" alt="Discord Logo">
                        <div>
                            <p class="text-lg lg:text-xl font-bold text-white">Sketch</p>
                            <p class="text-sm lg:text-base text-zinc-300">Sketch#1991</p>
                        </div>
                    </div>

                    <div class="flex w-1/2 items-center space-x-2 py-4 px-6">
                        <MailIcon class="w-16 h-16 text-zinc-400"/>
                        <div>
                            <p class="text-lg lg:text-xl font-bold text-white">Email</p>
                            <p class="text-sm lg:text-base text-zinc-300 select-none" v-text="email"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button'
import JetActionMessage from '@/Jetstream/ActionMessage'
import { Tab, TabGroup, TabList, TabPanel, TabPanels } from '@headlessui/vue'
import { AtSymbolIcon, CodeIcon, LinkIcon, MailIcon } from '@heroicons/vue/solid'

export default defineComponent({
    components: {
        AppLayout,
        Tab,
        TabGroup,
        TabList,
        TabPanel,
        TabPanels,
        AtSymbolIcon,
        CodeIcon,
        LinkIcon,
        MailIcon,
        JetButton,
        JetActionMessage,
    },

    data() {
        return {
            email: 'ku.inhcteks@hcteks',
            form: this.$inertia.form({
                _method: 'POST',
                name: '',
                email: '',
                message: '',
                send_to_me: true,
            }),
        }
    },

    created() {
        this.reverseString()
    },

    methods: {
        sendMailForm() {
            this.form.post(route('contact'), {
                onsuccess: () => {
                    this.form.reset();
                }
            });
        },

        reverseString() {
            this.email = this.email.split("").reverse().join("");
        }
    },
})
</script>

<style scoped>
article > p {
    @apply mb-4 leading-7 text-lg;
}

.input {
    @apply block w-full border-0 p-0 text-zinc-300 bg-zinc-800 placeholder-zinc-500 focus:ring-0;
    @apply transition duration-150 ease-in;
}

.textarea {
    @apply block mt-2 w-full bg-zinc-800 border-0 p-0 text-zinc-300 placeholder-zinc-500 focus:ring-0;
    @apply transition duration-150 ease-in;
    @apply shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-zinc-300 rounded-md;
}

.label {
    @apply block text-xs font-medium text-zinc-400;
}

.input-group {
    @apply border border-zinc-700 bg-zinc-800 rounded-md px-3 py-2 shadow-sm;
    @apply focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600;
    @apply transition duration-150 ease-in;
}

.form-checkbox {
    @apply text-ukbb-500 focus:ring-offset-zinc-800 bg-zinc-800 checked:bg-ukbb-500 rounded-sm;
    @apply focus:ring-ukbb-500;
}
</style>
