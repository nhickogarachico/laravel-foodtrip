<template>
  <form>
    <button
      v-on:click="isLiked ? unlikePost(postId) : likePost(postId)"
      type="button"
      class="react-btn link-red-hover"
    >
      <i :class="`bi ${isLiked ? 'bi-hand-thumbs-up-fill text-main-red' : 'bi-hand-thumbs-up'}`"></i>
      <span class="fw-600">{{ likeCount }}</span>
    </button>
  </form>
</template>

<script>
export default {
  props: {
    postId: Number,
  },
  data: () => {
    return {
      likeCount: 0,
      isLiked: false
    };
  },
  methods: {
    async getPostLikeCount() {
      const response = await axios.get(`/posts/${this.postId}/like`)
      const { likeCount, isLiked } = response.data
      this.likeCount = likeCount
      this.isLiked = isLiked
    },

    likePost(postId) {
      axios.post(`/posts/${postId}/like`);
      this.getPostLikeCount()
    },

    unlikePost(postId) {
      axios.delete(`/posts/${postId}/unlike`);
      this.getPostLikeCount()
    },
  },
  mounted() {
    this.getPostLikeCount();
  },
};
</script>