<template>
    <div class="container">
        <div class="card text-center">
                    <div class="card-header">
                        {{post.title}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" v-if='post.category'>{{post.category.name}}</h5>
                        <p class="card-text">{{post.content}}</p>
                        <div v-if="post.tags">
                            <span class="badge badge-success"
                            v-for="tag in post.tags" :key="tag.id">
                            {{tag.name}}</span>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                          2 days ago
        </div>
    </div>
    </div>
</template>
<script>
export default {
    name:'SinglePost',
    data(){
        return{
            post:[]
        }
    },
    mounted(){
        axios.get('/api/post/'+ this.$route.params.slug)
        .then(response => {
            this.post = response.data.results;
        })
        .catch();

    }
}
</script>
<style lang="sass">

</style>