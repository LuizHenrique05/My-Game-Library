@extends('layouts.main')

@section('title', 'Dashboard')
    
    @section('content')
    <div id="account-preview-container" class="col-md-6 offset-md-3">
        <div class="col-md-12">
            <p>Your Name: {{ $user->name }}</p>
        </div>
        <div class="col-md-12">
            <p>Your Email: {{ $user->email }}</p>
        </div>
        <button id="open-edit-account" class="btn btn-primary col-md-3">Open Edit Account</button>
    </div>
    
    <div id="edit-account-container" class="col-md-6 offset-md-3" style="display:none;">
        <form action="/dashboard/editAccount/" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Change Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <input type="submit" class="btn btn-primary" value="Update Account">
        </form>
    </div>
    

@endsection