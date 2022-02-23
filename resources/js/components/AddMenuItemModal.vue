<template>
  <div class="modal-custom">
    <div class="modal-content step-three-modal">
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
        <div class="modal-body">
          <div class="mb-3">
            <label for="menuItemName" class="form-label fw-600"
              >Menu Item Name</label
            >
            <input type="text" class="form-control" id="menuItemName" />
          </div>
          <div class="mb-3">
            <label for="menuItemPrice" class="form-label fw-600">Price</label>
            <div class="d-flex align-items-center">
              <p class="mb-0">&#8369;</p>
              <input
                type="number"
                class="form-control ms-2"
                id="menuItemPrice"
                min="0"
                step="0.25"
              />
            </div>
          </div>
          <div class="mb-3">
            <label for="menuItemDescription" class="form-label fw-600"
              >Description</label
            >
            <textarea id="menuItemDescription" class="form-control"></textarea>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <div class="flex-fill">
              <label for="validFrom" class="form-label fw-600"
                >Valid From</label
              >
              <input type="date" class="form-control" />
            </div>
            <div class="flex-fill ms-2">
              <label for="validThrough" class="form-label fw-600"
                >Valid Through</label
              >
              <input type="date" class="form-control" />
            </div>
          </div>
          <div>
            <p class="form-label fw-600">Availability</p>
            <div class="d-flex">
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckDefault">
                  Delivery
                </label>
              </div>
              <div class="form-check mb-3 ms-3">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckDefault">
                  Takeout
                </label>
              </div>
            </div>
          </div>
          <div class="mb-2">
            <p class="form-label fw-600">Outlet Availability</p>
            <div class="form-check mb-1 ms-3">
              <input class="form-check-input" type="checkbox" />
              <label class="form-check-label" for="flexCheckDefault">
                All
              </label>
            </div>
            <div
              class="form-check ms-3"
              v-for="(restaurantOutlet, i) in $root.restaurantOutlets"
              :key="i"
            >
              <input class="form-check-input" type="checkbox" />
              <label class="form-check-label" for="flexCheckDefault">
                {{ restaurantOutlet.restaurantOutletName }}
              </label>
            </div>
          </div>
          <div>
            <p class="fw-600 mb-2">Categories</p>
            <tag-search-input :category-tags="menuItemCategoryTags" :categories="menuItemCategories"></tag-search-input>
          </div>
          <div>
            <p class="fw-600">Main Photo</p>
            <button type="button" class="btn btn-main-red fs-8">
              <i class="fas fa-camera"></i> <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TagSearchInput from './TagSearchInput.vue';
export default {
  components: { TagSearchInput },
  props: {
    menuItemCategoryTags: Array
  },
  data() {
    return {
      menuItemCategories: []
    }
  },

  mounted() {
    const customModal = document.querySelector(".modal-custom");
    window.addEventListener("click", (e) => {
      if (e.target === customModal) {
        this.$emit("close-modal");
      }
    });
  },
};
</script>

<style>
.step-three-modal {
  max-width: 500px;
}
</style>