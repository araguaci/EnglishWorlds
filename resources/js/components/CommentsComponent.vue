<template>
	<div
		v-infinite-scroll="loadMore"
		infinite-scroll-disabled="busy"
		infinite-scroll-distance="15">
	<div v-for="comment in comments" :key="comment.id" class="comment">
	<div class="content">
		<a class="author" href="#">
			{{ comment.ownerName }}
		</a>
		<div class="metadata">
			<span class="date">
				{{ comment.longAgo }}
			</span>
		</div>
		<div class="text">
			{{ comment.body }}
		</div>
	</div>
</div>
</div>
</template>

<script>
import infiniteScroll from 'vue-infinite-scroll'
export default {
	directives: {
		infiniteScroll
	},
	props: {
		statusId: {
			type: Number,
			default: null,
		}
	},
	data() {
		return {
			comments: [],
			busy: false,
		}
	},
	beforeMount() {
		this.getInitialComments()
	},
	methods: {
		loadMore: function() {
			this.busy = true;
			this.fetchMoreComments();
			// this.comments.push();
			this.busy = false;
		},
		getInitialComments() { // Get initial comments (just 5 on page load)
			axios.post('/api/getPostComments', { status_id: this.statusId, starting_from: 0})
				.then(response =>
					response.data.forEach(comment => {
						this.comments.push(comment)
					})
				)
		},
		fetchMoreComments() {
			setTimeout(() => {
				axios.post('/api/getPostComments', { status_id: this.statusId, starting_from: this.comments.length})
					.then(response =>
						response.data.forEach(comment => {
							this.comments.push(comment)
						})
					)
				this.busy = false;
			}, 1000);
		}
	},
}
</script>
