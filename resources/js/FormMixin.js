export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
      action: '',
    }
  },

  methods: {

    submit() {
      if (this.loaded) {
        this.loading = true;
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post(this.action, this.fields).then(response => {
          this.loading = false;
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
        }).catch(error => {
          this.loaded = true;
          this.loading = false;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },

  },
}