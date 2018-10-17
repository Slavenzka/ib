require('./bootstrap');

new Vue({
    el: '#app',
    components: {
        ImageUploader: require('./components/SingleImageUploader'),
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

