<template>
  <input
    class="form-control"
    name="mobileNumber"
    id="floatingMobile1"
    type="text"
    placeholder="mobile number 1"
    maxlength="10"
    :value="value"
    v-on:input="$emit('input', onlyDigits($event))"
    ref="contactNumberInput"
  />
</template>

<script>
export default {
  props: {
    value: String
  },
  data() {
    return{
      currentContactNumberInput: ""
    }
  },
  methods: {
    onlyDigits: function (event) {
      const digitsRegex = /^[0-9]*$/;
      if (event.target.value.match(digitsRegex)) {
        this.currentContactNumberInput = event.target.value;
      } else {
        event.target.value = this.currentContactNumberInput;
      }

      return event.target.value
    },
    focus: function() {
      this.currentContactNumberInput = ""
      this.$refs.contactNumberInput.focus()
    }
  },
};
</script>