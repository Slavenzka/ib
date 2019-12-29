<script>
  export default {
    data() {
      return {
        expanded: false
      }
    },

    methods: {
      toggle() {
        this.expanded = !this.expanded;
      }
    }
  }
</script>

<style>
  .dropdown-menu {
    display: block;
  }
</style>
