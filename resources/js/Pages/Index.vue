<template>
    <x-head title="About Me">
        <title>About Me</title>
    </x-head>

    <div v-if="errors === null">
        <div class="grid grid-cols-5 space-x-4">
            <div class="col-span-3">
                <article v-if="pagelets.show.about" class="prose lg:prose-xl" v-html="pagelets.about"/>
                <div v-if="!pagelets.show.about" class="prose lg:prose-xl">
                    <p class="text-left font-flow leading-5 text-3xl opacity-50">
                        Ut consequat, lacus vel lacinia semper, libero sem porttitor arcu, feugiat maximus enim erat eu
                        velit. Morbi semper risus sapien, ornare rutrum libero pellentesque nec. Ut a massa non mauris
                        congue interdum. Morbi pellentesque suscipit nisl a cursus. Nulla facilisi. Pellentesque scelerisque
                        maximus turpis eget malesuada. Vestibulum posuere velit a lorem ullamcorper, quis commodo felis
                        maximus. Donec eu ultricies purus, ac auctor metus. Fusce id rhoncus nunc, a malesuada mi. Praesent
                        mattis consequat pellentesque. Maecenas congue ipsum non euismod hendrerit. Morbi sed mattis eros.
                        Mauris pretium enim sed risus vehicula tincidunt.
                    </p>
                    <p class="text-left font-flow leading-5 text-3xl opacity-50">
                        Nam aliquam vulputate sapien, vel aliquam dolor facilisis eu. Duis neque turpis, volutpat ornare
                        maximus sed, bibendum luctus massa. Sed vulputate velit turpis, scelerisque posuere nulla auctor
                        non. Fusce at urna sodales, fermentum magna ac, laoreet urna. Donec placerat sapien vel magna
                        sodales suscipit. Vivamus neque lacus, hendrerit vel cursus nec, fringilla non odio. In ac nunc in
                        massa volutpat pulvinar. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                    <p class="text-left font-flow leading-5 text-3xl opacity-50">
                        Integer porttitor velit et faucibus dignissim. Maecenas vulputate id quam at aliquet. Nullam a
                        semper felis. Suspendisse ullamcorper magna dictum elit tincidunt, sed malesuada elit pellentesque.
                        Vestibulum in gravida massa. Proin vel magna posuere, placerat ligula in, hendrerit dolor. Duis vel
                        ipsum at sapien imperdiet luctus non sed tortor.
                    </p>
                </div>
            </div>
            <div class="col-span-2">
                <div class="text-zinc-400">
                    &lt;!--<br />
                    Recent Blog Post<br />
                    --&gt;
                </div>

                <div class="h-px my-6 bg-zinc-600"/>

                <div v-if="pagelets.show.programming" class="pagelet">
                    <h2 class="text-lg font-semibold">Programming Info:</h2>
                    <p class="list" v-html="pagelets.programming"/>
                </div>

                <div v-if="pagelets.show.pc" class="pagelet">
                    <h2 class="text-lg font-semibold">PC Specs:</h2>
                    <p class="list" v-html="pagelets.pc"/>
                </div>

                <div v-if="pagelets.show.gaming" class="pagelet">
                    <h2 class="text-lg font-semibold">Gaming Info:</h2>
                    <p class="list" v-html="pagelets.gaming"/>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-red-200 overflow-hidden shadow-xl sm:rounded-lg" v-if="errors !== null">
        <code v-html="errors" class="mx-4 my-2"></code>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    layout: AppLayout,

    data() {
        return {
            data: null,
            errors: null,
            pagelets: {
                about: null,
                programming: null,
                gaming: null,
                pc: null,
                show: {
                    about: false,
                    gaming: false,
                    programming: false,
                    pc: false,
                }
            }
        }
    },

    created() {
        window.axios.get(`/api/pages/14`).then(res => {
            this.pagelets.about = res.data.content.rendered;
            this.pagelets.show.about = true;
        }).catch(e => {
            if ( e.hasOwnProperty('response') ) {
                this.errors = e.response.data.message;
            } else {
                this.errors = e;
            }
        });

        window.axios.get(`/api/pages/26`).then(res => {
            this.pagelets.pc = res.data.content.rendered;
            this.pagelets.show.pc = true;
        }).catch(e => {
            if ( e.hasOwnProperty('response') ) {
                this.errors = e.response.data.message;
            } else {
                this.errors = e;
            }
        });

        window.axios.get(`/api/pages/19`).then(res => {
            this.pagelets.programming = res.data.content.rendered;
            this.pagelets.show.programming = true;
        }).catch(e => {
            if ( e.hasOwnProperty('response') ) {
                this.errors = e.response.data.message;
            } else {
                this.errors = e;
            }
        });

        window.axios.get(`/api/pages/23`).then(res => {
            this.pagelets.gaming = res.data.content.rendered;
            this.pagelets.show.gaming = true;
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

.pagelet {
    @apply mb-6 text-sm;
}
</style>
