<template>
	<div>
		<div class="card m-4" v-for="(post,index) in items" :key="post.id">
			<Post @post-updated="updatedPost" @post-deleted="remove(index)" :post="post"/>
		</div>
		<add-post @post-added="add"></add-post>
	</div>
</template>
<script>
	import Post from "./post.vue";
	import AddPost from "./Create.vue";
	import Collection from "../mixins/collections.js";
	export default {
		data(){
			return {
				posts:[]
			}
		},
		mixins:[Collection],
		components:{
			Post, AddPost
		},
		created(){
			this.fetch();
		},
		methods:{
			fetchPost(post){
				this.posts.push(post);
			},
			updatedPost(){
				this.fetch();
			},
			fetch(){
				this.$http.get('/posts')
					.then(this.refresh)
					.catch(error => console.log(error))
			},
			refresh({data}){
				this.items = data
			}
		}
	}
</script>
