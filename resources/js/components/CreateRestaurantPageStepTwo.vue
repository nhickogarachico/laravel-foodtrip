<template>
  <div>
    <div class="card mb-4">
      <div class="card-header d-flex bg-white">
        <button
          class="btn py-0 px-1 btn-main-red-hover"
          data-bs-toggle="modal"
          data-bs-target="#addRestaurantOutletModal"
        >
          <i class="fas fa-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <div
          v-if="$root.addingRestaurantOutletData"
          class="d-flex justify-content-center align-items-center flex-column"
        >
          <div class="spinner-grow text-danger mt-2" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <span class="fst-italic">Adding restaurant outlet ...</span>
        </div>
        <div
          v-else-if="$root.loadingRestaurantOutletData"
          class="d-flex justify-content-center align-items-center flex-column"
        >
          <div class="spinner-grow text-danger mt-2" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <span class="fst-italic">Loading restaurant outlets ...</span>
        </div>

        <div
          class="
            d-flex
            justify-content-center
            align-items-center
            flex-column
            text-center
            p-3
          "
          v-else-if="$root.restaurantOutlets.length === 0"
        >
          <p>No restaurant outlets yet</p>
          <button
            class="btn btn-main-red w-50"
            data-bs-toggle="modal"
            data-bs-target="#addRestaurantOutletModal"
          >
            Add Outlet
          </button>
        </div>
        <div
          class="
            d-flex
            justify-content-center
            align-items-center
            flex-column
            text-center
            p-3
          "
          v-else
          v-for="restaurantOutlet in $root.restaurantOutlets"
          :key="$root.restaurantOutlets.indexOf(restaurantOutlet)"
        >
          <p>{{ restaurantOutlet.restaurantOutletName }}</p>
        </div>
      </div>
    </div>
    <div class="d-flex">
      <a
        href="/register/restaurant/step/1"
        class="btn btn-main-red-outline w-100 me-3"
        >Back</a
      >
      <a
        href="./create-restaurant-page-step-3.html"
        class="btn btn-main-red w-100"
        >Next</a
      >
    </div>
  </div>
</template>

<script>
import { createRestaurantPageStorage } from "./sessionStorage";
export default {
  props: {
    stepOneData: Object,
    stepTwoData: Object,
  },
  data() {
    return {};
  },
  mounted() {
    createRestaurantPageStorage.setItem(
      "stepOneData",
      JSON.stringify(this.stepOneData)
    );
  },
  beforeMount() {
    createRestaurantPageStorage.setItem(
      "stepTwoData",
      JSON.stringify(this.stepTwoData)
    );
  },
};
</script>

<style>
.btn-main-red-hover:hover {
  background-color: var(--main-red);
  color: white;
}
</style>