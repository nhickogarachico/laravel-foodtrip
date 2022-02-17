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
            <div class="mb-2">
              <div class="form-floating">
                <input
                  class="form-control"
                  id="floatingFullAddress1"
                  type="text"
                  placeholder="full address"
                  v-model="fullAddressInput"
                />
                <label for="floatingFullAddress">Full Address</label>
              </div>
              <div
                class="
                  d-flex
                  justify-content-center
                  align-items-center
                  flex-column
                "
                v-if="this.reverseGeoCoding.loading"
              >
                <div class="spinner-grow text-danger mt-2" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <span class="fst-italic">Fetching address ...</span>
              </div>
            </div>
            <div class="mb-2">
              <p class="fw-600">Map Location</p>
              <map-box-map
                :mapbox-api-key="mapBoxAPIKey"
                v-on:map-click="setFullAddress"
              ></map-box-map>
            </div>
            <div>
              <p class="fw-600">Opening Hours</p>
              <opening-hours-form
                :opening-hours="openingHours"
                v-on:add-opening-hours="addOpeningHours"
                v-on:remove-opening-hours="removeOpeningHours"
                v-on:change-to-closed="changeToClosed"
                v-on:change-opening-hours="changeOpeningHours"
              ></opening-hours-form>
            </div>
            <div>
              <p class="fw-600">Contact Information</p>
              <div>
                <div
                  class="alert alert-warning"
                  v-if="validationErrors['mobileNumberInput']"
                >
                  <i class="fas fa-exclamation-circle me-2"></i>
                  {{ validationErrors["mobileNumberInput"] }}
                </div>
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
                      <contact-number-input
                        v-model="mobileNumberInput"
                        ref="mobileNumberInputRef"
                      />
                      <label for="floatingMobile1">Mobile Number</label>
                    </div>
                  </div>
                  <button
                    id="addMobileBtn"
                    type="button"
                    class="btn btn-main-red ms-2 add-contact-btn"
                    v-on:click="
                      addContactNumber(
                        mobileNumberInput,
                        mobileNumbers,
                        'mobileNumberInput'
                      )
                    "
                  >
                    Add Mobile Number +
                  </button>
                </div>
                <div class="text-center mobile-numbers-div">
                  <div
                    class="
                      d-flex
                      align-items-center
                      justify-content-center
                      mb-2
                    "
                    v-for="mobileNumber in mobileNumbers"
                    :key="mobileNumbers.indexOf(mobileNumber)"
                  >
                    <p class="mb-0 fw-600">{{ mobileNumber }}</p>
                    <button
                      type="button"
                      class="btn btn-main-red py-1 ms-2"
                      v-on:click="
                        removeContactNumber(
                          mobileNumber,
                          mobileNumbers,
                          'mobileNumberInput'
                        )
                      "
                    >
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div
                class="alert alert-warning"
                v-if="validationErrors['telephoneNumberInput']"
              >
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ validationErrors["telephoneNumberInput"] }}
              </div>
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
                    <contact-number-input
                      v-model="telephoneNumberInput"
                      ref="telephoneNumberInputRef"
                    />
                    <label for="floatingTelephone1">Telephone Number</label>
                  </div>
                </div>
                <button
                  id="addTelephoneBtn"
                  type="button"
                  class="btn btn-main-red ms-2 add-contact-btn"
                  v-on:click="
                    addContactNumber(
                      telephoneNumberInput,
                      telephoneNumbers,
                      'telephoneNumberInput'
                    )
                  "
                >
                  Add Telephone Number +
                </button>
              </div>
              <div class="text-center telephone-numbers-div">
                <div
                  class="d-flex align-items-center justify-content-center mb-2"
                  v-for="telephoneNumber in telephoneNumbers"
                  :key="telephoneNumbers.indexOf(telephoneNumber)"
                >
                  <p class="mb-0 fw-600">{{ telephoneNumber }}</p>
                  <button
                    type="button"
                    class="btn btn-main-red py-1 ms-2"
                    v-on:click="
                      removeContactNumber(
                        telephoneNumber,
                        telephoneNumbers,
                        'telephoneNumberInput'
                      )
                    "
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Cancel
          </button>
          <button
            type="button"
            class="btn btn-main-red"
            data-bs-dismiss="modal"
            v-on:click="addRestaurantOutlet"
          >
            Add
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Modal } from "bootstrap";
import MapBoxMap from "./MapBoxMap.vue";
import OpeningHoursForm from "./OpeningHoursForm.vue";
import mapBoxAPIKey from "./config/keys";
let today = new Date();

export default {
  components: { MapBoxMap, OpeningHoursForm },
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
      fullAddressInput: "",
      addressCoordinates: {},
      sameRestaurantOutletName: true,
      reverseGeoCoding: { loading: false },
      mobileNumberInput: "",
      mobileNumbers: [],
      telephoneNumberInput: "",
      telephoneNumbers: [],
      validationErrors: {
        mobileNumberInput: "",
        telephoneNumberInput: "",
      },
      openingHours: {
        1: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "",
            },
          ],
        },
        2: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "",
            },
          ],
        },
        3: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "",
            },
          ],
        },
        4: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "",
            },
          ],
        },
        5: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "",
            },
          ],
        },
        6: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "",
            },
          ],
        },
        7: {
          closed: false,
          hours: [
            {
              openingHour: "00",
              openingMinute: "00",
              closingHour: "00",
              closingMinute: "00",
              validFrom: today.toLocaleDateString("en-CA"),
              validThrough: "00",
            },
          ],
        },
      },
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
    setFullAddress: function (coordinates) {
      this.reverseGeoCoding.loading = true;
      this.addressCoordinates = [coordinates.lng, coordinates.lat];
      axios
        .get(
          `https://api.mapbox.com/geocoding/v5/mapbox.places/${coordinates.lng}, ${coordinates.lat}.json?access_token=${this.mapBoxAPIKey}`
        )
        .then((response) => {
          this.fullAddressInput = response.data.features[0].place_name;
          this.reverseGeoCoding.loading = false;
        })
        .catch((err) => console.log(err));
    },
    addContactNumber: function (
      contactNumberInput,
      contactNumbers,
      contactInputName
    ) {
      if (contactNumberInput === "" || contactNumberInput.length < 10) {
        this.validationErrors[contactInputName] = "Invalid contact number";
      } else if (contactNumbers.includes("+63" + contactNumberInput)) {
        this.validationErrors[contactInputName] =
          "You already added that contact number";
      } else {
        contactNumbers.push("+63" + contactNumberInput);
        this.validationErrors[contactInputName] = "";
      }
      this[contactInputName] = "";
      this.$refs[`${contactInputName}Ref`].focus();
    },
    removeContactNumber: function (
      contactNumber,
      contactNumbers,
      contactInputName
    ) {
      let contactNumberToRemove = contactNumbers.indexOf(contactNumber);
      contactNumbers.splice(contactNumberToRemove, 1);
      this.$refs[`${contactInputName}Ref`].focus();
    },
    addOpeningHours: function (day) {
      this.openingHours[day].hours.push({
        openingHour: "00",
        openingMinute: "00",
        closingHour: "00",
        closingMinute: "00",
        validFrom: Date.now(),
        validThrough: "",
      });
    },
    removeOpeningHours: function (data) {
      this.openingHours[data.day].hours.splice(data.i, 1);
    },
    changeToClosed: function (data) {
      if (!data.day.disabled) {
        data.day.disabled = true;
      } else {
        data.day.disabled = false;
      }
      this.openingHours[data.day.value].closed =
        !this.openingHours[data.day.value].closed;
    },
    changeOpeningHours: function (data) {
      this.openingHours[data.day].hours[data.index][data.key] = data.value;
    },
    addRestaurantOutlet: function () {
      console.log(this.restaurantOutletName);
      console.log(this.areaInput);
      console.log(this.localityInput);
      console.log(this.locationInput);
      console.log(this.fullAddressInput);
      console.log(this.addressCoordinates);
      console.log(this.openingHours);
    },
  },
  mounted() {},
};
</script>

<style>
.modal-dialog {
  max-width: 1000px;
}
</style>