<template>
  <div class="modal" tabindex="-1" id="addRestaurantOutletModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Restaurant Outlet</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-floating mb-1">
              <input
                class="form-control"
                id="floatingRestaurantOutletName1"
                type="text"
                placeholder="restaurant outlet name"
                autofocus
                v-model="restaurantOutletName"
                v-on:input="checkIfSameWithRestaurantName"
                ref="restaurantOutletNameInput"
              />
              <label for="floatingName">Restaurant Outlet Name</label>
            </div>
            <div class="form-check mb-3">
              <input
                class="form-check-input"
                type="checkbox"
                v-model="sameRestaurantOutletName"
                :checked="sameRestaurantOutletName"
                v-on:change="changeOutletNameToRestaurantName"
              />
              <label class="form-check-label" for="flexCheckDefault">
                Same as Restaurant Name
              </label>
            </div>
            <div class="mb-3">
              <p class="fw-600 mb-1">Address</p>
              <div class="d-flex justify-content-between">
                <div class="flex-fill">
                  <label for="" class="fw-600">Area</label>
                  <select
                    class="form-select"
                    v-model="areaInput"
                    v-on:change="onChangeAreaInput"
                  >
                    <option value="0" disabled>--SELECT AREA--</option>
                    <option
                      v-for="area in areas.sort()"
                      :key="area.id"
                      :value="area.id"
                    >
                      {{ area.area }}
                    </option>
                  </select>
                </div>
                <div class="mx-2 flex-fill">
                  <label for="" class="fw-600">Locality</label>
                  <select
                    class="form-select"
                    v-model="localityInput"
                    v-on:change="onChangeLocalityInput"
                  >
                    <option value="0" disabled>--SELECT LOCALITY--</option>
                    <option
                      v-for="locality in localities.filter(filterLocalities)"
                      :key="locality.id"
                      :value="locality.id"
                    >
                      {{ locality.locality }}
                    </option>
                  </select>
                </div>
                <div class="flex-fill">
                  <label for="" class="fw-600">Location</label>
                  <select
                    class="form-select"
                    aria-label="Default select example"
                    v-model="locationInput"
                  >
                    <option value="0" disabled>--SELECT LOCATION--</option>
                    <option
                      v-for="location in locations.filter(filterLocations)"
                      :key="location.id"
                      :value="location.id"
                    >
                      {{ location.location }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-floating mb-1">
                <input
                  class="form-control"
                  id="floatingFullAddress1"
                  type="text"
                  placeholder="full address"
                  autofocus
                />
                <label for="floatingFullAddress">Full Address</label>
              </div>
            </div>
            <div>
              <p class="fw-600">Map Location</p>
              <map-box-map :mapbox-api-key="mapBoxAPIKey"></map-box-map>
            </div>
            <div>
              <p class="fw-600">Contact Information</p>
              <div>
                <div
                  class="
                    contact-container
                    d-flex
                    justify-content-between
                    align-items-center
                    mb-3
                  "
                >
                  <div class="d-flex align-items-center flex-fill">
                    <div class="contact-icon">
                      <i class="fas fa-mobile-alt me-3"></i>
                    </div>
                    <p class="mb-0 fw-600 me-2">+63</p>
                    <div class="form-floating w-100">
                      <input
                        class="form-control"
                        id="floatingMobile1"
                        type="text"
                        placeholder="mobile number 1"
                        maxlength="10"
                      />
                      <label for="floatingMobile1">Mobile Number</label>
                    </div>
                  </div>
                  <button
                    id="addMobileBtn"
                    type="button"
                    class="btn btn-main-red ms-2 add-contact-btn"
                  >
                    Add Mobile Number +
                  </button>
                </div>
                <div class="text-center mobile-numbers-div"></div>
              </div>
            </div>
            <div>
              <div
                class="
                  contact-container
                  d-flex
                  justify-content-between
                  align-items-center
                  mb-3
                "
              >
                <div class="d-flex align-items-center flex-fill">
                  <div class="contact-icon">
                    <i class="fas fa-phone me-3"></i>
                  </div>
                  <p class="mb-0 fw-600 me-2">+63</p>
                  <div class="form-floating w-100">
                    <input
                      class="form-control"
                      id="floatingTelephone1"
                      type="text"
                      placeholder="telephone number 1"
                      maxlength="9"
                    />
                    <label for="floatingTelephone1">Telephone Number</label>
                  </div>
                </div>
                <button
                  id="addTelephoneBtn"
                  type="button"
                  class="btn btn-main-red ms-2 add-contact-btn"
                >
                  Add Telephone Number +
                </button>
              </div>
              <div class="text-center telephone-numbers-div"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MapBoxMap from "./MapBoxMap.vue";
import mapBoxAPIKey from "./config/keys";

export default {
  components: { MapBoxMap },
  props: {
    areas: Array,
    localities: Array,
    locations: Array,
    stepOneData: Object,
  },
  data() {
    return {
      mapBoxAPIKey: mapBoxAPIKey,
      restaurantOutletName: this.stepOneData.restaurantName,
      areaInput: 0,
      localityInput: 0,
      locationInput: 0,
      sameRestaurantOutletName: true,
    };
  },
  methods: {
    checkIfSameWithRestaurantName: function () {
      if (this.restaurantOutletName !== this.stepOneData.restaurantName) {
        this.sameRestaurantOutletName = false;
      } else {
        this.sameRestaurantOutletName = true;
      }
    },
    changeOutletNameToRestaurantName: function () {
      if (this.sameRestaurantOutletName) {
        this.restaurantOutletName = this.stepOneData.restaurantName;
        this.$refs["restaurantOutletNameInput"].focus();
      }
    },
    onChangeAreaInput: function () {
      this.localityInput = 0;
      this.locationInput = 0;
    },
    onChangeLocalityInput: function () {
      this.locationInput = 0;
    },
    filterLocalities: function (locality) {
      return locality.area_id === this.areaInput;
    },
    filterLocations: function (location) {
      return location.locality_id === this.localityInput;
    },
  },
  mounted() {},
};
</script>