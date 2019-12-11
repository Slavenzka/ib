import './bootstrap';
import Vue from 'vue';
import VueBlockReveal from 'vue-block-reveal';
import Revealer from './components/Revealer';
import ContactForm from "./components/ContactForm";
import Preloader from "./components/Preloader";

import ScrollTo from './directives/scroll-to';

Vue.use(VueBlockReveal);

Vue.directive('scroll-to', ScrollTo);
Vue.component('revealer', Revealer);
Vue.component('preloader', Preloader);

new Vue({
  el: '#app',
  data: {
    navVisible: false
  },
  components: {
    ContactForm
  },
  mounted() {
    document.documentElement.className = "js";
    document.body.classList.remove('loading');

    require('./modules/parallax');
    require('./modules/forms');
    require('./modules/nav');
  }
});

require('./modules/slideshow');
