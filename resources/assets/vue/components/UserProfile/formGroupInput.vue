<template>
  <div class="form-group">
    <label v-if="label" style="float:right;font-size:medium">
      {{label}}
    </label>
    <input  class="form-control border-input" v-bind="$props" :value="value" style="   border: 1px solid #CCC5B9;
    border-radius: 7px;
    padding: 5px"
           @input="$emit('input',$event.target.value) " dir="rtl">
  </div>
</template>
<script>
  export default {
    props: {
      type: {
        type: String,
        default: 'text'
      },
      label: String,
      name: String,
      disabled: Boolean,
      placeholder: String,
      value: [String, Number]
    }
  }

</script>
<style>


</style>
