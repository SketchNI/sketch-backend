<template>
    <x-head>
        <meta property="og:image" :content="post.featured_image" />
        <meta property="og:author" :content="post.user.username" />
        <meta property="og:url" :content="route('blog.view', { topic: post.topic[0].slug, slug: post.slug })" />
        <meta property="og:type" content="article" />
        <meta property="og:description" :content="post.summary" />
        <meta property="og:locale" content="en_GB" />
        <meta property="og:published_time" :content="post.published_at" />
        <meta property="twitter:card" content="summary" />
        <meta property="twitter:title" :content="post.title" />
        <meta property="twitter:description" :content="post.summary" />
        <meta property="twitter:image" :content="post.featured_image" />
        <meta property="twitter:author" :content="post.user.username" />
        <meta property="twitter:url" :content="route('blog.view', { topic: post.topic[0].slug, slug: post.slug })" />
    </x-head>
    <div class="post">
        <div class="header-image" :style="`background-image: url(${post.featured_image})`"></div>
        <p class="header-image-caption" v-html="post.featured_image_caption"/>

        <h1>{{ post.title }}</h1>

        <div class="meta mb-1">
            <p class="author">By <span class="text-white">{{ post.user.username }}</span></p>
            <p class="topic">Topic: <span class="chip">{{ post.topic[0].name }}</span></p>
            <p class="tags">
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

        <article class="summary prose dark:prose-invert lg:prose-xl prose-zinc" v-html="post.body"></article>
    </div>
</template>

<script>
export default {
    name: "Entry",

    props: {
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
