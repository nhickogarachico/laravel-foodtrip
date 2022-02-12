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
            <contact-number-input v-model="mobileNumberInput"/>
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
      <div class="text-center mobile-numbers-div">
        <div
          v-for="mobileNumber in mobileNumbers"
          :key="mobileNumbers.indexOf(mobileNumber)"
        ></div>
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
            <contact-number-input v-model="telephoneNumberInput"/>
            <label for="floatingTelephone1">Telephone Number</label>
          </div>
        </div>
        <button
          id="addTelephoneBtn"
          type="button"
          class="btn btn-main-red ms-2 add-contact-btn"
          v-on:click="addTelephoneNumber('test')"
        >
          Add Telephone Number +
        </button>
      </div>
      <div class="text-center telephone-numbers-div"></div>
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
    <button type="submit" v-on:click.prevent="proceedToStepTwo" class="btn btn-main-red w-100">Next</button>

  </form>
  
</template>

<script>
export default {
  props: {
    restaurantCategoryTags: Array,
  },
  data() {
    return {
      restaurantNameInput: "",
      mobileNumberInput: "",
      mobileNumbers: [],
      telephoneNumberInput: "",
      currentTelephoneNumberInput: "",
      telephoneNumbers: [],
      websiteInput: "",
      restaurantCategories: [],
      test: "test"
    };
  },
  methods: {
    
    addTelephoneNumber: function (test) {
      console.log(test);
    },

    proceedToStepTwo: function(){
      console.log(this.mobileNumberInput)
      console.log(this.telephoneNumberInput)
    },
  },
};
</script>