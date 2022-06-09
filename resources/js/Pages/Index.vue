<template>
    <app-layout>
        <x-head title="About Me">
            <title>About Me</title>
        </x-head>

        <template #header>
            About Me
        </template>

        <article class="prose lg:prose-2xl prose-blue mb-6">
            <p>Hi, I'm Denver. I'm a programmer, gamer and musician from Northern Ireland.</p>

            <p>
                I first got interested in computers when I was around 10 or 11. By the time I was 15 I was
                experimenting with C# and had even built a very basic web browser.
            </p>

            <p>
                At that time I had no interest in building desktop applications and started to focus on making
                websites using Microsoft Frontpage 2003. After a while, I decided that I didn't want to drag and
                drop, I wanted to write the fancy symbols that Frontpage generated.
            </p>

            <p>
                I sort of got decent at this and decided to try adding CSS to the mix. That's still a beast I'm
                not comfortable with. It would be a couple of years before I got interested in learning PHP. When I
                was 17, that time arrived! I started to work with PHP and built several working websites using all 3
                technologies I had learned. They were awful. The PHP I had written was the kind that got PHP its
                bad reputation. The HTML and CSS was horrid but I was proud at the time to have created something.
            </p>
        </article>

        <div class="text-zinc-400">
            <pre>&lt;!-- Recent Blog Post --&gt;</pre>
        </div>

    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },

    methods: {
        copyEmail() {
            navigator.clipboard.writeText('sketch@sketchni.uk');
            alert('Email address copied to clipboard');
        }
    }
})
</script>

<style scoped>
article > p {
    @apply mb-4 leading-9 text-xl;
}

.pagelet {
    @apply mb-6 text-sm;
}

.list {
    @apply leading-normal tracking-wider text-base;
}

.ltr:before {
    content: attr(data-site) "\0040" attr(data-user);
    unicode-bidi: bidi-override;
    direction: rtl;
    @apply select-none font-semibold inline-block bg-blue-400 bg-opacity-20 px-0.5;
}
</style>
