<template>
    <x-head title="Blog" />
    <div v-for="(post, i) in posts">
        <Entry :post="post" />
        <section-border v-if="i < Object.keys(posts).length - 1" />
    </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Entry from "@/Components/Blog/Entry";
import SectionBorder from "@/Jetstream/SectionBorder";

export default {
    name: "Index",
    components: { SectionBorder, Entry },
    layout: AppLayout,

    data() {
        return {
            posts: {},
        }
    },

    mounted() {
        window.axios.get(route('api.blog.index')).then(res => {
            this.posts = res.data.posts;
        });
    }
}
</script>

<style scoped>

</style>
