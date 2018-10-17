<template>
    <span class="inline-flex" v-block-reveal="options">
        <slot></slot>
    </span>
</template>

<script>
    export default {
        props: {
            params: Object
        },
        data() {
            return {
                options: {
                    bgcolor: '#fff',
                }
            }
        },
        created() {
            if (this.params) {
                this.options = {...this.options, ...this.params};
            }
        }
    }
</script>
