<template>
    <select class="form-control"
            :class="selected === 'declined' ? 'is-invalid' : (selected === 'finished' ? 'is-valid' : '')"
            v-model="selected"
            @change="updateStatus">
        <option v-for="(option, key) in JSON.parse(options)"
                :value="key" :key="key">
            {{ option }}
        </option>
    </select>
</template>

<script>
    export default {
        data() {
            return {
                selected: ''
            }
        },
        props: {
            order: String,
            options: String,
            current: String,
        },
        methods: {
            updateStatus() {
                axios.patch(`/admin/order/${this.order}/status`, {
                    'status': this.selected
                });
            }
        },
        mounted() {
            this.selected = this.current;
        }
    }
</script>
