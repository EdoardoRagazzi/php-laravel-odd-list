<template>
    <div class="container">
      <div class="row">
        <div class="col-sm-6" v-for="post in posts" :key="key.id">
          <div class="card mt-3">
            <div class="card-body">
              <h5 class="card-title">{{post.title}}</h5>
              <p>{{formatData(post.created_at)}}</p>
              <p class="card-text">{{truncate(post.content,150)}}</p>
              <a href="#" class="btn btn-primary">Details</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
</template>
<script>
export default {
    name: 'Post',
    //   data(){
    //     return{
    //         callApi: 'http://127.0.0.1:8000/api/posts',
    //         posts: [],
    //          currentPage: 1 ,
    //         lastPage: null
    //     }
    // },
    // created(){
    //     this.getPosts(1);
    // },
    // methods:{
    //     getPosts(pagePost){
    //         axios.get(this.callApi, {
    //             params:{
    //                 page: pagePost
    //             }
    //         })
    //         .then(response => {
    //             this.posts = response.data.results.data;
    //              this.currentPage = response.data.results.current_page;
    //             this.lastPage = response.data.results.last_page;
    //         })
    //         .catch();
    //     }
    // }
}
</script>
<style lang="scss" scoped>

</style>