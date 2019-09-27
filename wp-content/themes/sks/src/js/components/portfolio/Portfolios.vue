<template>
    <div class="container-fluid">
        <div class="row">
            <portfolio v-if="posts.length" v-for="(post, index) in posts" :post="post" :count="index + 1"
                       :buttonMoreInfo="buttonMoreInfo"
                       :key="post.id"/>
            <div class="col-12 text-center mt-5" v-if="paged">
                <a href="#" class="btn btn-outline-primary" @click.prevent="getPosts">
                    {{buttonText}}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Portfolio from './Portfolio';

    export default {
        props: {
            category: String,
            filters: String,
            buttonText: String,
            buttonMoreInfo: String,
        },
        components: {
            Portfolio
        },
        data() {
            return {
                paged: 1,
                posts: [],
            }
        },
        methods: {
            async getPosts() {
                const data = new FormData();
                data.set('post_type', this.category);
                data.set('action', 'get_ajax_posts');
                data.set('paged', this.paged);
                if (this.filters) data.set('filters', this.filters);
                await axios.post('/wp-admin/admin-ajax.php', data)
                    .then(({data}) => {
                        this.posts.push(...data.posts);
                        this.paged = this.paged < data.last_page ? this.paged += 1 : null;
                    })
            },
        },
        mounted() {
            this.getPosts();
        }
    }
</script>