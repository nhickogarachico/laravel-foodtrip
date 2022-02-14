<template>
  <form>
    <div
      class="alert alert-warning"
      v-if="validationErrors['restaurantNameInput']"
    >
      <i class="fas fa-exclamation-circle me-2"></i>
      {{ validationErrors["restaurantNameInput"] }}
    </div>
    <div
      class="alert alert-warning"
      v-if="validationErrors['restaurantCategories']"
    >
      <i class="fas fa-exclamation-circle me-2"></i>
      {{ validationErrors["restaurantCategories"] }}
    </div>
    
    <div class="form-floating mb-3">
      <input
        class="form-control"
        name="restaurantName"
        id="floatingRestaurantName"
        type="text"
        placeholder="restaurant name"
        autofocus
        v-model="restaurantNameInput"
      />
      <label for="floatingName">Restaurant Name</label>
    </div>
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
          class="d-flex align-items-center justify-content-center mb-2"
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
    <div class="d-flex justify-content-between align-items-center">
      <div class="contact-icon">
        <i class="fas fa-globe me-3"></i>
      </div>
      <div class="form-floating mb-3 w-100">
        <input
          class="form-control"
          name="website"
          id="floatingWebsite"
          type="text"
          placeholder="website"
          v-model="websiteInput"
        />
        <label for="floatingWebsite">Website</label>
      </div>
    </div>
    <p class="fw-600">Categories</p>
    <tag-search-input
      :restaurant-category-tags="restaurantCategoryTags"
      :restaurant-categories="restaurantCategories"
    ></tag-search-input>
    <button
      type="button"
      class="btn btn-main-red w-100"
      v-on:click="proceedToStepTwo"
    >
      Next
    </button>
  </form>
</template>

<script>
import { createRestaurantPageStorage } from "./sessionStorage";
export default {
  props: {
    restaurantCategoryTags: Array,
    stepOneData: Object
  },
  data() {
    return {
      restaurantNameInput: this.stepOneData.restaurantName,
      mobileNumberInput: "",
      mobileNumbers: this.stepOneData.mobileNumbers,
      telephoneNumberInput: "",
      telephoneNumbers: this.stepOneData.telephoneNumbers,
      websiteInput: this.stepOneData.websiteName,
      restaurantCategories: this.stepOneData.restaurantCategories,
      validationErrors: {
        restaurantNameInput: "",
        mobileNumberInput: "",
        telephoneNumberInput: "",
        restaurantCategories: "",
      },
    };
  },
  methods: {
    addContactNumber: function (
      contactNumberInput,
      contactNumbers,
      contactInputName
    ) {
      if (contactNumberInput === "" || contactNumberInput.length < 10) {
        this.validationErrors[contactInputName] = "Invalid contact number";
      } else if (contactNumbers.includes(contactNumberInput)) {
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
    storeDataInSessionStorage: function () {
      if (
        this.restaurantNameInput === "" ||
        this.restaurantCategories.length === 0
      ) {
        this.restaurantNameInput === ""
          ? (this.validationErrors.restaurantNameInput =
              "Restaurant name is required")
          : (this.validationErrors.restaurantNameInput = "");
        this.restaurantCategories.length === 0
          ? (this.validationErrors.restaurantCategories =
              "Restaurant category is required")
          : (this.validationErrors.restaurantCategories = "");
      } else {
        this.setSessionStorageItem("restaurantName", this.restaurantNameInput);
        this.setSessionStorageItem(
          "mobileNumbers",
          JSON.stringify(this.mobileNumbers)
        );
        this.setSessionStorageItem(
          "telephoneNumbers",
          JSON.stringify(this.telephoneNumbers)
        );
        this.setSessionStorageItem(
          "telephoneNumbers",
          JSON.stringify(this.telephoneNumbers)
        );
        this.setSessionStorageItem("websiteName", this.websiteInput);
        this.setSessionStorageItem(
          "restaurantCategories",
          JSON.stringify(this.restaurantCategories)
        );

        this.validationErrors.restaurantNameInput = "";
        this.validationErrors.restaurantCategories = "";
      }
    },
    proceedToStepTwo: async function () {
      try {
        await axios.post("/register/restaurant/step/1", {
          restaurantName: this.restaurantNameInput,
          mobileNumbers: this.mobileNumbers,
          telephoneNumbers: this.telephoneNumbers,
          website: this.websiteInput,
          restaurantCategories: this.restaurantCategories,
        });
        this.storeDataInSessionStorage();
        window.location.href = "/register/restaurant/step/2";
      } catch (error) {
        error.response.data.errors.restaurantName
          ? (this.validationErrors.restaurantNameInput =
              error.response.data.errors.restaurantName[0])
          : (this.validationErrors.restaurantNameInput = "");
        error.response.data.errors.restaurantCategories
          ? (this.validationErrors.restaurantCategories =
              error.response.data.errors.restaurantCategories[0])
          : (this.validationErrors.restaurantNameInput =
              error.response.data.errors.restaurantName[0] =
                "");
        this.$nextTick(() => {
          window.scrollTo(0, 0);
        });
      }
    },
    setSessionStorageItem: function (key, data) {
      let sessionData = JSON.parse(
        createRestaurantPageStorage.getItem("stepOneData")
      );
      sessionData[key] = data;
      createRestaurantPageStorage.setItem("stepOneData", JSON.stringify(sessionData));
    },
  },
  beforeMount() {
    createRestaurantPageStorage.setItem('stepOneData', JSON.stringify(this.stepOneData))
  }
};
</script>
<style>
.btn-main-save {
  background-color: #12744b;
  color: white;
}

.btn-main-save:hover {
  background-color: #0d5738;
  color: white;
}

.saveSuccessAlert {
  margin-top: 1rem;
  position: fixed;
  top: 0;
  left: 50%;
  transform: translate(-50%, 0);
  z-index: 99;
}
</style>
