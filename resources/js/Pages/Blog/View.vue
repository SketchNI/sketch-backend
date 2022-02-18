<template>
    <div v-if="!loading">
        <x-head>
            <title>{{ post.title }}</title>
            <meta property="og:image" :content="post.featured_image"/>
            <meta property="og:author" :content="post.user.username"/>
            <meta property="og:url" :content="route('blog.view', { topic: post.topic[0].slug, slug: post.slug })"/>
            <meta property="og:type" content="article"/>
            <meta property="og:description" :content="post.summary"/>
            <meta property="og:locale" content="en_GB"/>
            <meta property="og:published_time" :content="post.published_at"/>
            <meta property="og:title" :content="post.title"/>
            <meta property="twitter:card" content="summary"/>
            <meta property="twitter:title" :content="post.title"/>
            <meta property="twitter:description" :content="post.summary"/>
            <meta property="twitter:image" :content="post.featured_image"/>
            <meta property="twitter:author" :content="post.user.username"/>
            <meta property="twitter:url" :content="route('blog.view', { topic: post.topic[0].slug, slug: post.slug })"/>
        </x-head>
        <Entry :full-article="true" :post="post"/>
    </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Entry from "@/Components/Blog/Entry";

export default {
    name: "View",
    components: { Entry },
    layout: AppLayout,

    props: {
        topic: String,
        slug: String,
    },

    data() {
        return {
            loading: true,
            post: {},
        }
    },

    mounted() {
        window.axios.get(route('api.blog.show', { topic: this.topic, slug: this.slug })).then(res => {
            this.post = res.data.post;
            this.loading = false;
        })
    }
}
</script>

<style scoped>

</style>
