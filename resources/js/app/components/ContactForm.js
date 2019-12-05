export default {
  data() {
    return {
      fields: {
        name: '',
        email: '',
        phone: '',
      },
      errors: []
    }
  },

  methods: {
    async onSubmit() {
      await axios.post('/contacts/send', this.fields)
        .then((response) => window.location.replace(response))
        .catch(errors => this.errors = errors.response.data.errors);
    }
  }
}
