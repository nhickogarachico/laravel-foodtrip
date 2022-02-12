<template>
  <div class="tags-container mb-3">
    <div class="tag-input">
      <input
        class="form-control tag-text"
        type="text"
        placeholder="categories"
        v-model="categoryTagInput"
        v-on:input="displayTagDropdown"
        v-on:click="displayTagDropdown"
      />
    </div>
    <div class="tag-dropdown" :style="{ display: tagDisplay }">
      <div
        class="tag-dropdown-item"
        v-for="category in searchedCategoryTags"
        v-on:click="addTag(category)"
        :key="category.id"
      >
        {{ category.category }}
      </div>
    </div>
    <div class="tag-categories mt-3">
      <span
        v-for="category in selectedCategoryTags"
        v-on:click="removeTag(category)"
        :key="category.id"
        class="tag ms-1 mx-1 mb-2 d-inline-block"
        >{{ category.category }} <i class="ms-2 fas fa-times"></i
      ></span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    restaurantCategoryTags: Array,
    restaurantCategories: Array
  },
  data() {
    return {
      tagDisplay: "none",
      categoryTagInput: "",
      searchedCategoryTags: this.restaurantCategoryTags,
      selectedCategoryTags: [],
    };
  },
  methods: {
    displayTagDropdown: function () {
      this.tagDisplay = "block";
      let exp = new RegExp("^" + this.escapeRegex(this.categoryTagInput), "i");

      this.searchedCategoryTags = this.restaurantCategoryTags.filter((category) => {
        return category.category.match(exp) && !this.selectedCategoryTags.includes(category)
      });
      
    },

    escapeRegex: function (string) {
      return string.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&");
    },

    addTag: function (category) {
      this.selectedCategoryTags.push(category);
      this.restaurantCategories.push(category);
      this.categoryTagInput = "";
    },
    removeTag: function (category) {
      let categoryTagIndexToBeDeleted = this.selectedCategoryTags.indexOf(category)
      this.selectedCategoryTags.splice(categoryTagIndexToBeDeleted, 1)
      this.restaurantCategories.splice(categoryTagIndexToBeDeleted, 1)
    },
  },
  mounted() {
    const tagText = document.querySelector(".tag-text");
    document.addEventListener("click", (e) => {
      const withinBoundaries = e.composedPath().includes(tagText);
      if (!withinBoundaries) this.tagDisplay = "none";
    });
  },
};
</script>

