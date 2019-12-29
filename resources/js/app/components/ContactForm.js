export default {
  data() {
    return {
      loading: false,
      fields: {
        name: null,
        email: null,
        phone: null,
        full_name: null
      },
      errors: []
    }
  },

  methods: {
    async onSubmit({target}) {
      this.loading = true;
      await axios.post(target.action, this.fields)
        .then(({data}) => location.replace(data))
        .catch(errors => this.errors = errors.response.data.errors)
        .finally(() => this.loading = false);
    }
  }
}
