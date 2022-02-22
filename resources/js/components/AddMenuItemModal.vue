<template>
  <div class="modal-custom">
    <div class="modal-content">
      <div class="card">
        <div class="modal-header">
          <p class="mb-0">Add Menu Item</p>
          <button
            type="button"
            class="btn p-0"
            v-on:click="$emit('close-modal')"
          >
            <i class="fas fa-times fs-3"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    const customModal = document.querySelector(".modal-custom");
    const body = document.body;
    window.addEventListener("click", (e) => {
      if (e.target === customModal) {
        this.$emit("close-modal");
      }
    });
  },
};
</script>

<style>
.modal-custom {
  position: fixed;
  z-index: 1;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
  top: 0;
  left: 0;
}

.modal-content {
  max-width: 1000px;
  margin: 30px auto;
}

.modal-header {
  border-bottom: 1px solid #dee2e6;
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.modal-header p {
  font-size: 1.25rem;
}
</style>