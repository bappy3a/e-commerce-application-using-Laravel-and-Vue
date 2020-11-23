@extends('backend.layouts.blank')

@section('content')
  <div class="container w-xxl w-auto-xs">
    <a href class="navbar-brand block m-t">{{ config('app.name') }}</a>
    <div class="m-b-lg">
      <div class="wrapper text-center">
        <strong>Sign in to get in touch</strong>
      </div>
      <form method="POST" action="{{ route('login') }}" class="form-validation">
          @csrf
        <div class="list-group list-group-sm">
          <div class="list-group-item">
              <input type="email" placeholder="Email" class="form-control no-border" name="email">
              @error('email')
                  <span style="color: red">
                      {{ $message }}
                  </span>
              @enderror
          </div>
          <div class="list-group-item">
              <input type="password" placeholder="Password" class="form-control no-border" name="password">
              @error('password')
                  <span style="color: red">
                      {{ $message }}
                  </span>
              @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button>
      </form>
    </div>
  </div>
@endsection
