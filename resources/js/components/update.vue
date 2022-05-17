<template>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                            
                           <form v-on:submit="submitPostEdit()">
                               <div class="form-group">
                                <input type="text" v-model="posts.title" ref="posts.title" class="form-control" placeholder="title...">   
                               </div>
                               <div class="form-group">
                                <input type="text" v-model="posts.alamat" ref="posts.alamat" class="form-control" placeholder="alamat...">   
                               </div>
                               <div class="form-group">
                                   <textarea class="form-control" v-model="posts.description" ref="posts.description" rows="5" placeholder="Description"></textarea>
                               </div>
                               <div class="form-group">
                                    <router-link to="/" class="btn btn-warning float-right">Back</router-link>
                                    <button class="btn btn-success">Submit</button>
                               </div>
                           </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios';

export default {
  data:function() {
    return {
      posts: {
        title:'',
        description:'',
        alamat:'',
      },
      errors: []
    }
  },

    // Fetches posts when the component is created.
  created() {
    let id = this.$route.params.id;
    axios.get('/posts/' + id + '/edit')
    .then(response => {
      // JSON responses are automatically parsed.
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })

    // async / await version (created() becomes async created())
    //
    // try {
    //   const response = await axios.get(`http://jsonplaceholder.typicode.com/posts`)
    //   this.posts = response.data
    // } catch (e) {
    //   this.errors.push(e)
    // }
  },

  // Fetches posts when the component is created.
  methods:{
  submitPostEdit() {
      let id = this.$route.params.id;
      axios.patch('/posts/'+ id, this.posts)
      .then(response => {

        alert('Data Telah Diubah')
        console.log(response)
        this.$router.push({path:'/'})
        // JSON responses are automatically parsed.
        this.posts = response.data

      })
        .catch(e => {
        this.errors.push(e)
        })
      }
  }
}
</script>