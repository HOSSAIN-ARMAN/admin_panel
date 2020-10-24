@extends('layouts.app')

@section('title')
   add new customer
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h4>Create new Customer</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
{{--            <form action="/customers/store" method="post"  class="pb-5">--}}
            <form action="{{ route('customers.store') }}" method="post"  class="pb-5" enctype="multipart/form-data">
{{--                @method('PATCH')--}}
                @include('bladeFile.customer.form')
                <button type="submit" class="btn-primary">add customer</button>
            </form>
        </div>
    </div>

@endsection


