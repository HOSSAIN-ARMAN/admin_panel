@extends('layouts.app')

@section('title')
    Edit customer
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h4>Edit Customer {{$customer->name}}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
{{--            <form action="/customers/{{$customer->id}}" method="post"  class="pb-5">--}}
            <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="post"  class="pb-5" enctype="multipart/form-data">
                @method('PATCH')
                @include('bladeFile.customer.form')
                <button type="submit" class="btn-primary">Edit customer</button>
            </form>
        </div>
    </div>

@endsection


