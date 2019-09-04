<template>
    <div class="col-sm-10 col-md-6 col-xxl-4 px-1">
        <a :href="post.permalink">
            <article class="article-card">
                <figure class="image"
                        :style="{ backgroundImage: `url('${image}')` }">
                    <div class="date">
                        {{post.posted_at}}
                    </div>
                </figure>
                <div class="content">
                    <h4 class="title">
                        {{ post.title }}
                    </h4>
                    <div class="description">
                        <p v-if="post.description !== ''">{{ post.description }}</p>
                    </div>
                </div>
            </article>
        </a>
    </div>
</template>

<script>
    export default {
        props: {
            post: Object,
            count: Number
        },
        computed: {
            image() {
                return this.post.image;
            }
        }
    }
</script>