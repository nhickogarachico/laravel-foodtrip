<template>
  <div class="card">
    <div class="card-header d-flex bg-white">
      <span class="fw-600 me-2">Menu Items</span>
      <button
        class="btn py-0 px-1 btn-main-red-hover"
        v-on:click="openAddMenuItemModal"
      >
        <i class="fas fa-plus"></i>
      </button>
    </div>
    <div class="card-body">
      <!-- Display if no menu items added yet in session -->
      <div
        v-if="stepThreeData.menuItems.length === 0"
        class="
          d-flex
          justify-content-center
          align-items-center
          flex-column
          text-center
          p-3
        "
      >
        <p>No menu items yet</p>
        <button
          type="button"
          class="btn btn-main-red w-50"
          v-on:click="openAddMenuItemModal"
        >
          Add Menu Item
        </button>
      </div>
    </div>
    <!-- Add Menu Item Modal -->
    <add-menu-item-modal
      v-if="isAddMenuItemModalOpen"
      v-on:close-modal="closeAddMenuItemModal"
    ></add-menu-item-modal>
  </div>
</template>
<script>
import { createRestaurantPageStorage } from "./sessionStorage";
export default {
  props: {
    stepThreeData: Object,
  },
  data() {
    return {
      isAddMenuItemModalOpen: false,
    };
  },
  methods: {
    openAddMenuItemModal: function () {
      this.isAddMenuItemModalOpen = true;
      document.body.style.overflow = "hidden";
    },
    closeAddMenuItemModal: function () {
      this.isAddMenuItemModalOpen = false;
      document.body.style.overflow = "auto";
      document.body.removeAttribute("style");
    },
  },
  mounted() {
    createRestaurantPageStorage.setItem(
      "stepThreeData",
      JSON.stringify(this.stepThreeData)
    );
  },
};
</script>