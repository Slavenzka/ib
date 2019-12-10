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
    async onSubmit({target}) {
      await axios.post(target.action, this.fields)
        .then(({data}) => location.replace(data))
        .catch(errors => this.errors = errors.response.data.errors);
    }
  }
}
