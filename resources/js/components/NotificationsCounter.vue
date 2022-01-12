<template>
  <span v-if="unreadNotificationsCount > 0" class="badge bg-danger">{{ unreadNotificationsCount }}</span>
</template>

<script>
export default {
  props: {
    user: Object,
  },
  data() {
    return {
      unreadNotificationsCount: 0,
    };
  },
  mounted() {
    Echo.private("App.Models.User." + this.user.id).notification(
      (notification) => {
        axios
          .get(`/${this.user.username}/notifications/unread/count`)
          .then((response) => {
            this.unreadNotificationsCount = response.data.notificationsCount;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    );
    axios
      .get(`/${this.user.username}/notifications/unread/count`)
      .then((response) => {
        this.unreadNotificationsCount = response.data.notificationsCount;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>