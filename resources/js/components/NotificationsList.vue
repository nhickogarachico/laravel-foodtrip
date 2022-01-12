<template>
  <div>
    <h5>Notifications</h5>
    <button
      class="btn btn-danger"
      v-on:click="deleteAllNotifications(user.username)"
    >
      Delete all notifications
    </button>
    <ul>
      <li v-for="notification in notifications" :key="notification.id">
        <a
          :href="`/${notification.data.postOwner}/posts/${notification.data.postId}`"
          >{{ notification.data.message }}</a
        >
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
  },
  data() {
    return {
      notifications: []
    }
  },
  methods: {
    async deleteAllNotifications (username)  {
      await axios.delete(`/${username}/notifications`)
      this.notifications = []
 
    },
  },
  created() {
    Echo.private("App.Models.User." + this.user.id).notification(
      (notification) => {
        axios
          .get(`/${this.user.username}/notifications-json`)
          .then((response) => {
            this.notifications = response.data.notifications
          })
          .catch((error) => {
            console.log(error)
          })
      }
    );
    axios
      .get(`/${this.user.username}/notifications-json`)
      .then((response) => {
        this.notifications = response.data.notifications
      })
      .catch((error) => {
        console.log(error)
      })
  },
};
</script>