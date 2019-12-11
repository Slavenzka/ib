export default {
  data() {
    return {
      loading: false,
      fields: {
        name: '',
        email: '',
        phone: '',
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
