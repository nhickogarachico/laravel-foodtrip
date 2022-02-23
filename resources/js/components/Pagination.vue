<template>
  <nav>
    <slot name="data" :paginatedItems="paginatedItems" :pageNumber="pageNumber" :perPage="perPage"/>
    <ul class="pagination d-flex justify-content-center" v-if="paginatedItems.length > 0">
      <li :class="['page-item', pageNumber <= 1 ? 'disabled' : '']"><a class="page-link" href="#" @click="pageNumber -= 1">&lt;</a></li>
      <li :class="['page-item', pageNumber === page ? 'active' : '']" v-for="page in numberOfPages" :key="page">
        <a class="page-link" href="#" @click="pageNumber = page">{{ page }}</a>
      </li>

      <li :class="['page-item', pageNumber >= numberOfPages ? 'disabled' : '']"><a class="page-link" href="#" @click="pageNumber += 1">&gt;</a></li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    totalItems: Number,
    items: Array
  },
  computed: {
      numberOfPages() {
          return Math.ceil(this.totalItems / this.perPage)
      },
      paginatedItems() {
          let end = this.perPage * this.pageNumber
          return this.items.slice(end - this.perPage,end);
      }
  },
  data() {
    return {
      pageNumber: 1,
      perPage: 5
    };
  },
};
</script>