<template>
	<form ref="form" @submit.prevent="addPost">
		<div class="form-group my-4">
			<input type="text" name="title" v-model="title" placeholder="title" class="form-control m-2">
			<textarea name="description"
				id="description" rows="5" v-model="description" class="form-control"
				placeholder="Have something to say?"
			></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Post</button>
	</form>
</template>
<script>
	export default {
		data(){
			return {
				'title':"",
				"description":""
			}
		},
		methods:{
			addPost(){
				this.$http.post('/posts', {
					title:this.title,
					description:this.description
				})
				.then(({data}) => {
					this.$refs.form.reset()
					this.$emit('post-added', data)
				})
				.catch(({error}) => {
					console.log(error)
				})
			}
		}
	}
</script>
