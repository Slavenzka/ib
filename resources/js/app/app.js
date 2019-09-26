import './bootstrap';
import Vue from 'vue';
import VueBlockReveal from 'vue-block-reveal';
import Revealer from './components/Revealer';

Vue.use(VueBlockReveal);

new Vue({
    el: '#app',
    data: {
        navVisible: false
    },
    components: {
        Revealer,
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
