@extends('layouts.app')

@section('title')
    {{ $customer->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <hr>
            <h4>Details of Customer</h4>
            <p><a href="/customers/{{$customer->id}}/edit">Edit</a></p>
            <hr>
            <form action="/customers/{{$customer->id}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
           <p><strong>Name</strong>{{ $customer->name }}</p>
           <p><strong>Email</strong>{{$customer->email}}</p>
           <p><strong>Company</strong>{{ $customer->company->name }}</p>
        </div>
    </div>
    @if($customer->image)
        <img src="{{ asset('storage/'.$customer->image) }}" alt="" class="img-thumbnail">
    @endif

@endsection


