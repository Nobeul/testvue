<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" v-model="fields.name"/>
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" v-model="fields.email"/>
            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
        </div>

        <div class="form-group">
            <label for="message">Phone</label>
            <input type="text" class="form-control" id="phone" v-model="fields.phone"/>
            <div v-if="errors && errors.email" class="text-danger">{{ errors.phone[0] }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Send message</button>
    </form>
</template>

<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('/contact', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
}
</script>