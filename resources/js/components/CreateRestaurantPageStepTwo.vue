<template>
  <div>
    <div class="card mb-4">
      <div class="card-header d-flex bg-white">
        <span class="fw-600 me-2">Outlets</span>
        <button
          class="btn py-0 px-1 btn-main-red-hover"
          data-bs-toggle="modal"
          data-bs-target="#addRestaurantOutletModal"
        >
          <i class="fas fa-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <pagination
          :totalItems="$root.restaurantOutlets.length"
          :items="$root.restaurantOutlets"
        >
          <template #data="{ paginatedItems, pageNumber, perPage }">
            <div
              class="alert alert-danger d-flex justify-content-between"
              v-if="stepTwoError"
            >
              {{ errors.stepTwoError[0] }}
              <button class="btn p-0" v-on:click="closeStepTwoError">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div
              class="alert alert-success d-flex justify-content-between"
              v-if="updateSuccess"
            >
              Updated successfully.
              <button class="btn p-0" v-on:click="updateSuccess = false">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div
              class="alert alert-success d-flex justify-content-between"
              v-if="deleteSuccess"
            >
              Deleted successfully.
              <button class="btn p-0" v-on:click="deleteSuccess = false">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div
              v-if="$root.addingRestaurantOutletData"
              class="
                d-flex
                justify-content-center
                align-items-center
                flex-column
              "
            >
              <div class="spinner-grow text-danger mt-2" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <span class="fst-italic">Adding restaurant outlet ...</span>
            </div>
            <div
              v-else-if="$root.loadingRestaurantOutletData"
              class="
                d-flex
                justify-content-center
                align-items-center
                flex-column
              "
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
              class="d-flex justify-content-center flex-column p-3"
              v-else
              v-for="(restaurantOutlet, i) in paginatedItems"
              :key="i"
            >
              <div class="d-flex justify-content-between">
                <p class="fw-600 mb-1">
                  {{ restaurantOutlet.restaurantOutletName }}
                </p>
                <div>
                  <button
                    type="button"
                    class="btn py-0 px-1 btn-main-red-hover"
                    data-bs-toggle="collapse"
                    :data-bs-target="`#restaurantOutletData${i}`"
                  >
                    <i class="fas fa-chevron-down"></i>
                  </button>
                  <button
                    type="button"
                    class="btn py-0 px-1 btn-main-red-hover ms-1"
                    :ref="`openModalButton${i}`"
                    v-on:click="changeCurrentRestaurantOutlet(i)"
                  >
                    <i class="fas fa-pencil"></i>
                  </button>
                  <button
                    type="button"
                    class="btn py-0 px-1 btn-main-red-hover ms-1"
                    v-on:click="deleteRestaurantOutlet(i, pageNumber, perPage)"
                  >
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </div>

              <p class="mb-1">
                {{ restaurantOutlet.location.location }},
                {{ restaurantOutlet.locality.locality }},
                {{ restaurantOutlet.area.area }}
              </p>
              <p>{{ restaurantOutlet.fullAddress }}</p>
              <div class="collapse" :id="`restaurantOutletData${i}`">
                <div>
                  <p class="fw-600">Opening Hours</p>
                  <div v-for="i in 7" :key="i" class="mb-2">
                    <p class="mb-0">{{ daysOfTheWeek[i] }} :</p>
                    <div v-if="restaurantOutlet.openingHours[i].closed">
                      CLOSED
                    </div>
                    <div
                      v-else
                      v-for="(openingHour, i) in restaurantOutlet.openingHours[
                        i
                      ].hours"
                      :key="i"
                    >
                      <span
                        >{{
                          convertDateStringToNumber(openingHour.openingHour)
                        }}:{{ openingHour.openingMinute
                        }}{{ openingHour.openingHour > 12 ? "PM" : "AM" }} -
                        {{
                          convertDateStringToNumber(openingHour.closingHour)
                        }}:{{ openingHour.closingMinute
                        }}{{ openingHour.closingHour > 12 ? "PM" : "AM" }}</span
                      >
                    </div>
                  </div>
                </div>
                <div>
                  <p class="fw-600 mb-2">Contact Numbers</p>
                  <div
                    v-if="
                      restaurantOutlet.mobileNumbers.length === 0 &&
                      restaurantOutlet.telephoneNumbers.length === 0
                    "
                  >
                    No contact numbers
                  </div>
                  <div v-if="restaurantOutlet.mobileNumbers.length > 0">
                    <p class="fw-600 mb-2">Mobile Numbers</p>
                    <p
                      v-for="(
                        mobileNumber, i
                      ) in restaurantOutlet.mobileNumbers"
                      :key="i"
                    >
                      {{ mobileNumber }}
                    </p>
                  </div>
                  <div v-if="restaurantOutlet.telephoneNumbers.length > 0">
                    <p class="fw-600 mb-2">Telephone Numbers</p>
                    <p
                      v-for="telephoneNumber in restaurantOutlet.telephoneNumbers"
                      :key="telephoneNumber"
                    >
                      {{ telephoneNumber }}
                    </p>
                  </div>
                </div>
              </div>
              <hr />
            </div>
          </template>
        </pagination>
      </div>
    </div>
    <div class="d-flex">
      <a
        href="/register/restaurant/step/1"
        class="btn btn-main-red-outline w-100 me-3"
        >Back</a
      >
      <button
        type="button"
        class="btn btn-main-red w-100"
        v-on:click="proceedToStepThree"
      >
        Next
      </button>
    </div>

    <!-- Edit Restaurant Outlet Modal -->
    <edit-restaurant-outlet-modal
      v-if="isModalOpen"
      v-on:close-modal="closeModal"
      :step-one-data="stepOneData"
      :is-modal-open="isModalOpen"
      :open-modal-button="openModalButton"
      :restaurantOutletIndex="currentRestaurantOutletIndex"
      :areas="areas"
      :localities="localities"
      :locations="locations"
      v-on:display-update-success-message="displayUpdateSuccessMessage"
    ></edit-restaurant-outlet-modal>
  </div>
</template>

<script>
import { createRestaurantPageStorage } from "./sessionStorage";
export default {
  props: {
    stepOneData: Object,
    stepTwoData: Object,
    errors: [Array, Object],
    areas: Array,
    localities: Array,
    locations: Array,
  },
  data() {
    return {
      isModalOpen: false,
      updateSuccess: false,
      deleteSuccess: false,
      stepTwoError: false,
      openModalButton: {},
      numberOfRestaurantOutletPerPage: 5,
      currentPage: 1,
      paginatedItems: [],
      daysOfTheWeek: {
        1: "Monday",
        2: "Tuesday",
        3: "Wednesday",
        4: "Thursday",
        5: "Friday",
        6: "Saturday",
        7: "Sunday",
      },
      currentRestaurantOutletIndex: 0,
    };
  },
  methods: {
    convertDateStringToNumber: function (dateString) {
      let dateInteger = parseInt(dateString);
      if (dateInteger > 12) {
        return (dateInteger - 12).toLocaleString("en-US", {
          minimumIntegerDigits: 2,
          useGrouping: false,
        });
      } else {
        return dateString;
      }
    },
    changeCurrentRestaurantOutlet: function (index) {
      this.currentRestaurantOutletIndex = index;
      this.isModalOpen = true;
      this.openModalButton = this.$refs[`openModalButton${index}`];
      document.body.style.overflow = "hidden";
    },
    closeModal: function () {
      this.isModalOpen = false;
      document.body.style.overflow = "auto";
      document.body.removeAttribute("style");
    },
    displayUpdateSuccessMessage: function () {
      this.updateSuccess = true;
    },
    deleteRestaurantOutlet: function (index , pageNumber, perPage) {
     
      axios
        .delete(`/register/restaurant/step/2/${perPage * (pageNumber - 1) + index}`)
        .then((response) => {
          this.deleteSuccess = true;
          this.$root.fetchSessionData();
        })
        .catch((error) => console.log(error.response.data));
    },
    closeStepTwoError: function () {
      this.stepTwoError = false;
    },
    proceedToStepThree: function () {
      window.location.href = "/register/restaurant/step/3";
    },
  },

  mounted() {
    createRestaurantPageStorage.setItem(
      "stepOneData",
      JSON.stringify(this.stepOneData)
    );

    if (this.errors.stepTwoError) this.stepTwoError = true;
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