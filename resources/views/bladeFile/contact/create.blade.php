@extends('layouts.app')
@section('content')
    <h4>this is contact page</h4>
    <br>
    <form action="/contact" method="POST">
        @csrf
        <div class="form-group pb-4">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            <div>{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group pb-4">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            <div>{{ $errors->first('email') }}</div>
        </div>
        <div class="form-group pb-4">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>

    </form>
@endsection
