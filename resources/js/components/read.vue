<template>
	
	<div class="card">
		<div class="card-header">
			<router-link to="/" class="btn btn-warning float-left">Go to Home</router-link>
		</div>
		<div class="card-body">
			<h2>{{ posts.title }}</h2>
			<p>{{ posts.description }}</p>
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
  	let id = this.$route.params.id;
    axios.get('/posts/' + id)
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
  }
}
</script>