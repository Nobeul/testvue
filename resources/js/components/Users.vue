<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Users List</h3>
              <button
                class="btn btn-success"
                style="float:right"
                data-toggle="modal"
                data-target="#addUserModal"
              >
                <i class="fa fa-user-plus"></i>
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(contact, index) in contacts">
                    <td>{{ ++index }}</td>
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.email }}</td>
                    <td>{{ contact.phone }}</td>
                    <td>
                      <a href>
                        <i class="fa fa-edit text-blue"></i>
                      </a> /
                      <a href>
                        <i class="fa fa-trash text-red"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- User Modal -->
    <div
      class="modal fade"
      id="addUserModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModal">Add New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="submit">
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="fields.name" />
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
              </div>

              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" v-model="fields.email" />
                <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
              </div>

              <div class="form-group">
                <label for="message">Phone</label>
                <input type="text" class="form-control" id="phone" v-model="fields.phone" />
                <div v-if="errors && errors.email" class="text-danger">{{ errors.phone[0] }}</div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
    export default {
    data() {
        return {
        fields: {},
        errors: {},
        success: false,
        loaded: true,
        contacts: null
        };
    },
    mounted() {
                console.log('res')
                axios.get('/getContacts')
                    .then(response => (this.contacts = response.data))
            },
    methods: {
        loadUsers(){
        axios.get('/getContacts')
                    .then(response => (this.contacts = response.data))
        },
        submit() {
        if (this.loaded) {
            this.loaded = false;
            this.success = false;
            this.errors = {};
            axios
            .post("/contact", this.fields)
            .then((response) => {
                this.fields = {}; //Clear input fields.
                this.loaded = true;
                this.success = true;

                $('#addUserModal').modal('hide');
                this.loadUsers();
            })
            .then(
                Toast.fire({
                icon: 'success',
                title: 'User created successfully'
                })
            )
            .catch((error) => {
                this.loaded = true;
                if (error.response.status === 422) {
                this.errors = error.response.data.errors || {};
                }
            });
        }
        },
    },
    };
</script>