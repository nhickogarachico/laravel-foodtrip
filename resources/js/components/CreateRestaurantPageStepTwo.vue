<template>
  <div class="card">
    <div class="card-header d-flex bg-white">
      <button class="btn py-0 px-1 btn-main-red-hover" data-bs-toggle="modal" data-bs-target="#addRestaurantOutletModal">
        <i class="fas fa-plus"></i>
      </button>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-center align-items-center flex-column text-center p-3">
        <p>No restaurant outlets</p>
        <button class="btn btn-main-red w-50" data-bs-toggle="modal" data-bs-target="#addRestaurantOutletModal">Add Outlet</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    stepOneData: Object,
  },
  mounted() {
    console.log(this.stepOneData)
  }
};
</script>

<style>
  .btn-main-red-hover:hover {
    background-color: var(--main-red);
    color: white;
  }
</style>