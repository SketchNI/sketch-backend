<template>
    <x-head title="About Me">
        <title>About Me</title>
    </x-head>

    <div class="grid grid-cols-5 space-x-4">
        <div class="col-span-3">
            <article class="prose lg:prose-xl prose-blue">
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
                    I sort of got decent at this and decided to try adding CSS to the mix. That's still a beast I'm not
                    comfortable with. It would be a couple of years before I got interested in learning PHP. When I was
                    17, that time arrived! I started to work with PHP and built several working websites using all 3
                    technologies I had learned. They were awful. The PHP I had written was the kind that got PHP its bad
                    reputation. The HTML and CSS was horrid but I was proud at the time to have created something.
                </p>

                <p>
                    My main goal is to create applications that people find useful and I try to work on every idea I
                    have to try and achieve that goal.
                </p>

                <div class="h-px bg-blue-500 rounded-md"></div>

                <p>
                    I am also a freelance Laravel developer. If you are in need of some work done, you can use the
                    <x-link :href="route('contact')" class="text-blue-300 font-semibold">Contact Form</x-link>
                    or
                    email me at <span @click="copyEmail" data-user="hcteks" data-site="ku.inhcteks" class="ltr"></span> for more
                    information.
                </p>
            </article>
        </div>
        <div class="col-span-2">
            <div class="text-zinc-400">
<pre>&lt;!--
    Recent Blog Post
--&gt;</pre>
            </div>

            <div class="h-px my-6 bg-zinc-600"/>

            <div class="pagelet">
                <h2 class="text-lg font-semibold">Programming Info:</h2>
                <div class="list">
                    <p><span class="font-bold">LANGUAGES</span>: PHP, Javascript, TypeScript</p>
                    <p><span class="font-bold">IDE/EDITORS</span>: PhpStorm, Webstorm</p>
                    <p><span class="font-bold">OPERATING SYSTEMS</span>:</p>
                    <p class="ml-6">
                        Windows 11 Pro<br/>
                        Mac OSX<br/>
                    </p>
                    <p></p>
                    <p><span class="font-bold">BROWSERS</span>: Firefox, Chrome, Safari</p>
                    <p><span class="font-bold">OTHER</span>: Docker, Windows Terminal</p>

                </div>
            </div>

            <div class="pagelet">
                <h2 class="text-lg font-extrabold">PC Specs:</h2>
                <h3 class="text-base font-semibold">Windows 11 Pro</h3>
                <div class="list">
                    <p><span class="font-bold">CPU</span>: AMD Ryzen 5 3600 3.6GHz</p>
                    <p><span class="font-bold">CPU COOLER</span>: Cooler Master MasterLiquid Lite 240</p>
                    <p><span class="font-bold">RAM</span>: Corsair Vengeance DDR4-3200 RGB - 32GB (4x8GB)</p>
                    <p><span class="font-bold">GPU</span>: MSI GTX 1660Ti</p>
                    <p><span class="font-bold">MOTHERBOARD</span>: MSI B450 Tomahawk MAX</p>
                    <p><span class="font-bold">STORAGE</span>:</p>
                    <p class="ml-6">
                        <span class="font-bold">M.2</span>: 1TB NVMe<br/>
                        <span class="font-bold">SSD</span>: 1TB SSD + 2TB
                    </p>
                    <p></p>
                    <p><span class="font-bold">KEYBOARD</span>: SteelSeries Apex 7 (Brown switches)</p>
                    <p><span class="font-bold">MOUSE</span>: SteelSeries Rival 650</p>
                    <p><span class="font-bold">HEADSET</span>: Sennheiser EPOS GSP600</p>
                    <p><span class="font-bold">MONITOR 1</span>: MSI G421</p>
                    <p><span class="font-bold">MONITOR 2</span>: MSI G421V</p>
                    <p><span class="font-bold">MONITOR 3</span>: MSI G421V</p>
                </div>
                <div class="my-2"></div>

                <h3 class="text-base font-semibold">MacOS</h3>
                <div class="list">
                    <p><span class="font-bold">MODEL</span>: MacBook Pro 2021</p>
                    <p><span class="font-bold">SSD</span>: 1TB</p>
                    <p><span class="font-bold">RAM</span>: 16GB</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    layout: AppLayout,

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
    @apply mb-4 leading-7 text-lg;
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
