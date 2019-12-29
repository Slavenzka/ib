require('./bootstrap');

import Vue from 'vue';

import Wysiwyg from "./components/Editor/Wysiwyg";
import ImageUploader from "./components/Editor/SingleImageUploader";
import BlockEditor from "./components/Editor/BlockEditor";
import TextCollapsed from "./components/UI/TextCollapsed";
import Dropdown from "./components/UI/Dropdown";
import Taggable from "./components/UI/Taggable";
import VueDragscroll from 'vue-dragscroll';

Vue.use(VueDragscroll);

new Vue({
  el: '#app',
  components: {
    Wysiwyg,
    ImageUploader,
    BlockEditor,
    TextCollapsed,
    Dropdown,
    Taggable
  },
  mounted() {
    const notification = document.querySelectorAll('.notification');

    if (notification.length) {
      Array.from(notification).map(item => {
        setTimeout(() => {
          item.style.display = 'none';
        }, 4000);
      })
    }
  }
});

