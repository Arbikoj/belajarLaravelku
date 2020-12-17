require('./bootstrap');

require('alpinejs');

// resources/assets/js/components/CardModal.vue
<template>
  <div>
        The modal will go here.
  </div>
</template>

<script>
        export default {
  //
}
</script>
// resources/js/app.js
Vue.component('card-modal', require('./components/CardModal.vue').default);

const app = new Vue({
    el: '#app',
});
