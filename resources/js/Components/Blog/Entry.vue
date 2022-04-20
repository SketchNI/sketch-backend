<template>
    <div class="post">
        <div class="header-image" :style="`background-image: url(${post.featured_image})`"></div>
        <p class="header-image-caption" v-html="post.featured_image_caption"/>

        <h1>
            <x-link v-if="!fullArticle" :href="route('blog.view', { topic: post.topic[0].slug, slug: post.slug })">{{ post.title }}</x-link>
            <span v-else>{{ post.title }}</span>
        </h1>

        <div class="meta mb-1">
            <p class="author">By <span class="text-white">{{ post.user.username }}</span></p>
            <p class="topic" v-if="post.topic.length === 1">Topic: <span class="chip">{{ post.topic[0].name }}</span></p>
            <p class="tags" v-if="post.tags.length > 0">
                Tags:
                <span v-for="(tag, i) in post.tags">
                    <span class="chip">{{ tag.name }}</span><span
                    v-if="i !== Object.keys(post.tags).length - 1">,&nbsp;</span>
                </span>
            </p>
            <p class="read-time">Read time: <span class="text-white">{{ post.read_time }}</span></p>
        </div>
        <div class="meta mb-6">
            <p class="published">
                Posted <span>{{ new Date(post.published_at).toLocaleString() }}</span>
                <span class="last-updated" v-if="post.created_at !== post.updated_at">
                    (updated <span>{{ new Date(post.updated_at).toLocaleString() }}</span>)
                </span>
            </p>
        </div>

        <article v-if="!fullArticle" class="summary prose dark:prose-invert lg:prose-xl prose-zinc" v-html="post.summary"></article>
        <article v-else class="summary prose dark:prose-invert lg:prose-xl prose-zinc" v-html="post.body"></article>
    </div>
</template>

<script>
import hljs from 'highlight.js/lib/core';
import "highlight.js/styles/a11y-dark.css"

export default {
    name: "Entry",

    props: {
        fullArticle: false,
        post: {
            id: String,
            slug: String,
            title: String,
            summary: String,
            body: String,
            published_at: Date,
            featured_image: String,
            featured_image_caption: String,
            user_id: String,
            meta: {
                description: String,
                title: String,
                canonical_link: String,
            },
            created_at: Date,
            updated_at: Date,
            deleted_at: Date,
            read_time: String,
            tags: [{
                id: String,
                slug: String,
                name: String,
                user_id: String,
                created_at: Date,
                updated_at: Date,
                deleted_at: Date,
                pivot: {
                    post_id: String,
                    tag_id: String
                }
            }],
            user: {
                id: String,
                name: String,
                email: String,
                username: String,
                summary: String,
                avatar: String,
                dark_mode: Boolean,
                digest: String,
                locale: String,
                role: Number,
                created_at: Date,
                updated_at: Date,
                deleted_at: Date,
                default_avatar: String,
                default_locale: String
            },
            topic: [{
                id: String,
                slug: String,
                name: String,
                user_id: String,
                created_at: Date,
                updated_at: Date,
                deleted_at: Date,
                pivot: {
                    post_id: String,
                    tag_id: String
                }
            }],

        }
    },

    data() {
        return {
            content: String,
        }
    },

    mounted() {
        hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
        hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
        hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
        hljs.registerLanguage('xml', require('highlight.js/lib/languages/xml'));
        hljs.registerLanguage('typescript', require('highlight.js/lib/languages/typescript'));
        hljs.registerLanguage('http', require('highlight.js/lib/languages/http'));
        hljs.registerLanguage('csharp', require('highlight.js/lib/languages/csharp'));
        hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
        document.querySelectorAll('code').forEach(el => {
            hljs.highlightElement(el);
        })
    }
}
</script>

<style scoped>
.header-image {
    @apply h-72 bg-cover bg-no-repeat bg-center shadow shadow-ukbb-500;
}

.header-image-caption {
    @apply text-zinc-400 text-sm px-3 py-2 bg-zinc-700 shadow shadow-ukbb-500;
}

h1 {
    @apply text-5xl my-4;
}

.meta {
    @apply text-zinc-400 flex items-center space-x-4;
}

.chip {
    @apply text-ukbb-500;
}
</style>
