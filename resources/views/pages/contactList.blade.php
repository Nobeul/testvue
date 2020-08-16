@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <router-view name="companiesIndex"></router-view>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(contact, index) in contacts">
                <th scope="row">@{{ ++index }}</th>
                <td>@{{ contact.name }}</td>
                <td>@{{ contact.email }}</td>
                <td>@{{ contact.phone }}</td>
                <td>
                    <router-link :to="/d">Edit</router-link>
                </td>
            </tr>
    </table>
</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>

<script>
    new Vue({
        el: '#app',
        data() {
            return {
                contacts: null
            }
        },
        mounted() {
            console.log('res')
            axios.get('/getContacts')
                .then(response => (this.contacts = response.data))
        }
    })
</script>
@endsection
