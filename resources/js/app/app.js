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

        require('./modules/slideshow');
        require('./modules/parallax');
        require('./modules/forms');
        require('./modules/nav');

        document.body.classList.remove('loading');
    }
});
