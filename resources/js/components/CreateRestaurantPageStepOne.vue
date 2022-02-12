<template>
  <form>
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
          <p class="mb-0 fw-600">(+63) {{ mobileNumber }}</p>
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
          <p class="mb-0 fw-600">(+63) {{ telephoneNumber }}</p>
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
      <p class="mb-0 fw-600 me-1 fs-9">www.</p>
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
      v-bind:restaurant-category-tags="restaurantCategoryTags"
      v-bind:restaurant-categories="restaurantCategories"
    ></tag-search-input>
    <button
      type="button"
      class="btn btn-main-save w-100 mb-2"
      v-on:click="saveInfo"
    >
      Save
    </button>
    <button type="submit" class="btn btn-main-red w-100">Next</button>
  </form>
</template>

<script>
let createRestaurantPageStorage = window.sessionStorage;
export default {
  props: {
    restaurantCategoryTags: Array,
  },
  data() {
    return {
      restaurantNameInput: createRestaurantPageStorage.restaurantName,
      mobileNumberInput: "",
      mobileNumbers: JSON.parse(createRestaurantPageStorage.mobileNumbers),
      telephoneNumberInput: "",
      telephoneNumbers: JSON.parse(
        createRestaurantPageStorage.telephoneNumbers
      ),
      websiteInput: createRestaurantPageStorage.websiteName,
      restaurantCategories: JSON.parse(
        createRestaurantPageStorage.restaurantCategories
      ),
      validationErrors: { mobileNumberInput: "", telephoneNumberInput: "" },
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
       this.validationErrors[contactInputName] = "You already added that contact number";
      } else {
        contactNumbers.push(contactNumberInput);
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
    saveInfo: function () {
      createRestaurantPageStorage.setItem(
        "restaurantName",
        this.restaurantNameInput
      );
      createRestaurantPageStorage.setItem(
        "mobileNumbers",
        JSON.stringify(this.mobileNumbers)
      );
      createRestaurantPageStorage.setItem(
        "telephoneNumbers",
        JSON.stringify(this.telephoneNumbers)
      );
      createRestaurantPageStorage.setItem("websiteName", this.websiteInput);
      createRestaurantPageStorage.setItem(
        "restaurantCategories",
        JSON.stringify(this.restaurantCategories)
      );
      alert("Info saved");
    },
  },
  mounted() {
    let test = {};
    if (test["test"]) {
      console.log("true");
    } else {
      console.log("false");
    }
  },
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
</style>
