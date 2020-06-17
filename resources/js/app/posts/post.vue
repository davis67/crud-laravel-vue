<template>
	<div>
	<div v-if="!editing" class="card-body">
		<p>Title: {{title}}</p>
		<p>Description: {{description}}</p>
		<div>
			<button class="btn btn-primary" @click="editing = true" >Edit</button>
			<button class="btn btn-danger" @click="destroy">Delete</button>
		</div>
	</div>
	<div v-else class="card-body">
		<form ref="form" @submit.prevent="editPost">
			<div class="form-group my-4">
				<input type="text" name="title" v-model="form.title" placeholder="title" class="form-control m-2">
				<textarea name="description"
					id="description" rows="5" v-model="form.description" class="form-control"
					placeholder="Have something to say?"
				></textarea>
			</div>
		<button type="submit" class="btn btn-primary">Update</button>
		<button type="button" class="btn btn-danger" @click="editing = false">Cancel</button>
	</form>
	</div>
</div>
</template>
<script>
	export default {
		props:['post'],
		data(){
			return {
				editing:false,
				id:this.post.id,
				title:this.post.title,
				description:this.post.description,
				form:{
					title:this.post.title,
					description:this.post.description,
				}
			}
		},
		methods:{
			editPost(){
				this.$http.put(`posts/${this.id}`, {
					title:this.form.title,
					description:this.form.description
				})
				.then((response) => {
					this.editing = false
					this.title = this.form.title,
					this.description = this.form.description
				})
			},

			destroy(){
				this.$http.delete(`posts/${this.id}`)
				.then((reponse) => {
					this.$emit('post-deleted')
				})
				.catch((error) => {
					console.log(error)
				})
			}
		}
	}
</script>
