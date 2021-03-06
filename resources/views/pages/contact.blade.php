@extends('layouts.app')

@section('content')
    <div id="app"> <!-- ID: 'app' -->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Contact me</h2>
                        <router-link to="/contactlist">contact list</router-link>
                    </div>
                    <div class="card-body">
                        <contact-form></contact-form>
                        <d></d>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection