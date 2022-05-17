<template>
	
	<div class="card">
		<div class="card-header">
			<router-link to="/create" class="btn btn-info float-right">Tambah</router-link>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Title</th>
			        <th>Description</th>
			        <th>Alamat</th>
			        <th width="100"></th>
			        <th width="100"></th>
			        <th width="100"></th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr v-for="post, index of posts">
			        <td>{{ post.title }}</td>
			        <td>{{ post.description }}</td>
			        <td>{{ post.alamat }}</td>
			        <td>
			        	<router-link :to="{name: 'readPost', params:{id:post.id}}" class="btn btn-info">view</router-link>
			        </td>
			        <td>
			        	<router-link :to="{name: 'editPost', params:{id:post.id}}" class="btn btn-success">Edit</router-link>
			        </td>
			        <td><button class="btn btn-danger" v-on:click="submitPostHapus(post.id, index)">delete</button></td>
			      </tr>
			    </tbody>
			  </table>
			</div>
		</div>
	</div>

</template>

<script>

export default {
  data() {
    return {
      posts: [],
      errors: []
    }
  },

  // Fetches posts when the component is created.
  created() {
    axios.get('/posts')
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

  methods:{
	  submitPostHapus(id, index) {
	  	if (confirm("click 'OK' Untuk Hapus.")) {
	      axios.delete('/posts/'+ id)
	      .then(response => {

	        alert('Data Telah Diubah')
	        console.log(response)
	       
	        this.posts.splice(index, 1)

	      })
	        .catch(e => {
	        this.errors.push(e)
	        })
	      }
	  }
	}
}
</script>