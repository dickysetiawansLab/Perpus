@extends('_layout')

@section('title', 'Sign in')

@section('konten')
    <div class="" style="width: 600px; margin-left: 250px; padding-top: 100px;">
        <h1 class="mb-4" style="color: #B62752;">Sign in</h1>
        @if(session()->has('succes'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                  <strong>{{session('succes')}}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
        
        @if(session()->has('ErorLogin'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                  <strong>{{session('ErorLogin')}}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <div class="input-group mb-4">
              <span class="input-group-text"><i class='bx bxs-user'></i></span>
              <div class="form-floating" style="width: 500px;">
                <input type="text" name="username" class="form-control" id="floatingInputGroup1" placeholder="Username">
                <label for="floatingInputGroup1">Username</label>
              </div>
            </div>
            <div class="input-group mb-4">
              <span class="input-group-text"><i class='bx bxs-lock-alt'></i></span>
              <div class="form-floating" style="width: 500px;">
                <input type="password" name="password" class="form-control" id="floatingInputGroup1" placeholder="Password">
                <label for="floatingInputGroup1">Password</label>
              </div>
            </div>
            <div class="form-floating mb-3">
                <button type="submit"class="btn" style="background-color: #B62752; color: white;">Sign in</button>
            </div>
            <p>Not have account? <a href="/signup" style="text-decoration: none;">Sign up</a></p>
        </form>
    </div>
@endsection