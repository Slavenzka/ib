require('./bootstrap');

import Wysiwyg from "./components/Editor/Wysiwyg";
import ImageUploader from "./components/Editor/SingleImageUploader";
import BlockEditor from "./components/Editor/BlockEditor";

new Vue({
  el: '#app',
  components: {
    Wysiwyg,
    ImageUploader,
    BlockEditor
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

