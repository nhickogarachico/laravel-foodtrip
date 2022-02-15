<template>
<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col" class="fw-600">Day</th>
        <th scope="col" class="fw-600">Closed?</th>
        <th scope="col" class="fw-600">Opening</th>
        <th scope="col" class="fw-600">Closing</th>
        <th scope="col" class="fw-600">Valid From</th>
        <th scope="col" class="fw-600">Valid Through</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="day in daysOfTheWeek" :key="day.value">
        <th scope="row" class="fw-600">{{ day.day }}</th>
        <td>
          <div
            class="form-check d-flex justify-content-center align-items-center"
          >
            <input class="form-check-input" type="checkbox" v-on:change="changeToClosed(day)"/>
          </div>
        </td>
        <td>
          <tr v-for="(openingHour, i) in openingHours[day.value]" :key="i">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <select class="form-select w-50" aria-label="Opening Hours" :disabled="day.disabled">
                <option v-for="time in 25" :value="time" :key="time">
                  {{
                    (time - 1).toLocaleString("en-US", {
                      minimumIntegerDigits: 2,
                      useGrouping: false,
                    })
                  }}
                </option>
              </select>
              <p class="mx-2 mb-0">:</p>
              <select class="form-select w-50" aria-label="Opening Minutes" :disabled="day.disabled">
                <option v-for="time in 60" :value="time" :key="time">
                  {{
                    (time - 1).toLocaleString("en-US", {
                      minimumIntegerDigits: 2,
                      useGrouping: false,
                    })
                  }}
                </option>
              </select>
            </div>
          </tr>
        </td>
        <td>
          <tr v-for="(openingHour, i) in openingHours[day.value]" :key="i">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <select class="form-select w-50" aria-label="Closing Hours" :disabled="day.disabled">
                <option v-for="time in 25" :value="time" :key="time">
                  {{
                    (time - 1).toLocaleString("en-US", {
                      minimumIntegerDigits: 2,
                      useGrouping: false,
                    })
                  }}
                </option>
              </select>
              <p class="mx-2 mb-0">:</p>
              <select class="form-select w-50" aria-label="Closing Minutes" :disabled="day.disabled">
                <option v-for="time in 60" :value="time" :key="time">
                  {{
                    (time - 1).toLocaleString("en-US", {
                      minimumIntegerDigits: 2,
                      useGrouping: false,
                    })
                  }}
                </option>
              </select>
            </div>
          </tr>
        </td>
        <td>
          <tr v-for="(openingHour, i) in openingHours[day.value]" :key="i">
            <input type="date" class="form-control mb-2" :disabled="day.disabled"/>
          </tr>
        </td>
        <td>
          <tr v-for="(openingHour, i) in openingHours[day.value]" :key="i">
            <input type="date" class="form-control mb-2" :disabled="day.disabled" />
          </tr>
        </td>

        <td>
          <div v-for="(openingHour, i) in openingHours[day.value]" :key="i" class="btn-margin">
            <button
              class="btn btn-main-red py-0 px-1"
              type="button"
              v-on:click="i === 0 ? addOpeningHours(day.value) : removeOpeningHours(day.value, i)"
            :disabled="day.disabled"
            >
              <i :class="i === 0 ? 'fas fa-plus' : 'fas fa-trash'"></i>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      daysOfTheWeek: [
        {
          day: "Monday",
          value: 1,
          disabled: false,
        },
        {
          day: "Tuesday",
          value: 2,
          disabled: false,
        },
        {
          day: "Wednesday",
          value: 3,
          disabled: false,
        },
        {
          day: "Thursday",
          value: 4,
          disabled: false,
        },
        {
          day: "Friday",
          value: 5,
          disabled: false,
        },
        {
          day: "Saturday",
          value: 6,
          disabled: false,
        },
        {
          day: "Sunday",
          value: 7,
          disabled: false,
        },
      ],
      openingHours: {
        1: [{}],
        2: [{}],
        3: [{}],
        4: [{}],
        5: [{}],
        6: [{}],
        7: [{}],
      },
    };
  },
  methods: {
    addOpeningHours: function (day) {
      this.openingHours[day].push({});
    },
    removeOpeningHours: function(day, i) {
      this.openingHours[day].splice(i, 1)
    },
    changeToClosed: function(day) {
      !day.disabled ? day.disabled = true : day.disabled = false;
    }
  },
  mounted() {},
};
</script>

<style >
  .btn-margin {
    margin-bottom: 20px;
  }
</style>