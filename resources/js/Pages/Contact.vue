<template>
    <app-layout title="Contact Me">
        <template #header>
            Contact Me
        </template>

        <div class="flex items-start space-x-8">
            <div class="form w-1/2">
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

                    <div class="flex items-center justify-end mt-4">
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Your message has been sent.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <MailIcon class="w-5 h-5 mr-2"/>
                            Send Message
                        </jet-button>
                    </div>
                </form>
            </div>

            <div class="socials w-1/2">
                <div class="flex items-center">
                    <a href="https://twitter.com/SketchNI" target="_blank" rel="noopener,nofollow"
                       class="flex w-1/2 items-center space-x-2 hover:no-underline py-4 px-6 hover:bg-zinc-900 rounded-md">
                        <img src="/images/twitter.png" class="w-16 rounded-full" alt="Twitter Logo">
                        <div>
                            <p class="text-xl font-bold text-white">Sketch</p>
                            <p class="text-base text-zinc-300">@SketchNI</p>
                        </div>
                    </a>

                    <a href="https://instagram.com/SketchNIUK" target="_blank" rel="noopener,nofollow"
                       class="flex w-1/2 items-center space-x-2 hover:no-underline py-4 px-6 hover:bg-zinc-900 rounded-md">
                        <img src="/images/instagram.png" class="w-16" alt="Instagram Logo">
                        <div>
                            <p class="text-xl font-bold text-white">Denver Freeburn</p>
                            <p class="text-base text-zinc-300">sketchniuk</p>
                        </div>
                    </a>
                </div>

                <div class="flex items-center space-x-2 hover:no-underline py-4 px-6 rounded-md">
                    <img src="/images/discord.png" class="w-16" alt="Discord Logo">
                    <div>
                        <p class="text-xl font-bold text-white">Sketch</p>
                        <p class="text-base text-zinc-300">Sketch#1991</p>
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
            form: this.$inertia.form({
                _method: 'POST',
                name: '',
                email: '',
                message: '',
            }),
        }
    },

    methods: {
        sendMailForm() {
            this.form.post(route('contact'), {
                onsuccess: () => {
                    this.form.reset();
                }
            });
        }
    },
})
</script>

<style scoped>
article > p {
    @apply mb-4 leading-7 text-lg;
}

.input {
    @apply block w-full border-0 p-0 text-zinc-300 bg-zinc-900 placeholder-zinc-500 focus:ring-0;
    @apply transition duration-150 ease-in;
}

.textarea {
    @apply block mt-2 w-full bg-zinc-900 border-0 p-0 text-zinc-300 placeholder-zinc-500 focus:ring-0;
    @apply transition duration-150 ease-in;
    @apply shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-zinc-300 rounded-md;
}

.label {
    @apply block text-xs font-medium text-zinc-400;
}

.input-group {
    @apply border border-zinc-700 bg-zinc-900 rounded-md px-3 py-2 shadow-sm;
    @apply focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600;
    @apply transition duration-150 ease-in;
}
</style>
