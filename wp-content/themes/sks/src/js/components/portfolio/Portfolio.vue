<template>
    <div class="col-sm-10 col-md-6 col-xl-4 px-1">
        <a :href="post.permalink" class="project-card">
            <div class="decor-hover"></div>
            <div class="count">
                {{counter}}
            </div>
            <figure class="image" :style="{ backgroundImage: `url('${image}')` }"></figure>
            <div class="content">
                <div class="hover-title">
                    {{ post.title }}
                </div>
                <div class="description">
                    <h4 class="title">
                        {{ post.title }}
                    </h4>
                    <p v-if="post.excerpt !== ''">{{ post.excerpt }}</p>
                    <div class="link-more">
                        Узнать больше
                    </div>
                </div>
            </div>
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
            },
            counter() {
                return this.count < 10 ? `0${this.count}` : this.count;
            }
        }
    }
</script>