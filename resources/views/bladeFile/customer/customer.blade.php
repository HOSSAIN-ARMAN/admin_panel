@extends('layouts.app')

@section('title')
    add customer
@endsection

@section('content')



{{--<h2>customer details</h2>--}}
{{--<ul>--}}
{{--    <li><a href="/">home</a></li>--}}
{{--    <li><a href="contact">Contact</a></li>--}}
{{--    <li><a href="customer">customer</a></li>--}}
{{--</ul>--}}

{{--way one to show list--}}
{{--<ul>--}}
{{--    <?php--}}
{{--      foreach ($customers as $customer){--}}
{{--          echo "<li>".$customer."</li>";--}}
{{--      }--}}
{{--    ?>--}}
{{--</ul>--}}

<div class="row">
    <div class="col-12">
        <h4>Customer List</h4>
    </div>
</div>

@can('create', \App\Customer::class)
    <div class="row">
        <div class="col-12">
            {{--        <a href="/customers/create">Create new Customer</a>--}}
            <a href="{{ route('customers.create') }}">Create new Customer</a>
        </div>
    </div>
@endcan

@foreach($customers as $customer)
<div class="row">
    <div class="col-2">{{ $customer->id }}</div>
    <div class="col-4">
        @can('view', $customer)
{{--            <a href="/customers/{{$customer->id}}">{{ $customer->name }}</a>--}}
            <a href="{{ route('customers.show', ['customer' => $customer]) }}">{{ $customer->name }}</a>
        @endcan
        @cannot('view', $customer)
                {{ $customer->name }}
        @endcannot
    </div>
    <div class="col-4">{{ $customer->company->name }}</div>
    <div class="col-2">{{ $customer->active }}</div>
</div>
@endforeach

<div class="row">
 <div class="col-12 d-flex justify-content-end pt-5">
     {{  $customers->links() }}
 </div>
</div>

















{{--way two to show list--}}


{{--<div class="row">--}}
{{--    <div class="col-6">--}}
{{--        <h4>Active Customer</h4>--}}
{{--        <ul>--}}
{{--            @foreach($activeCustomers as $activeCustomer)--}}
{{--                <li>{{ $activeCustomer->name }} <span class="text-muted">{{ $activeCustomer->company->name }}</span></li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="col-6">--}}
{{--        <h4>In-Active Customer</h4>--}}
{{--        <ul>--}}
{{--            @foreach($inActiveCustomers as $inActiveCustomer)--}}
{{--                <li>{{ $inActiveCustomer->name }} <span class="text-muted">{{ $inActiveCustomer->company->name }}</span></li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--    <div class="col-12">--}}

{{--        @foreach($companies as $company)--}}
{{--            <h2>Company name : {{ $company->name }}</h2>--}}
{{--            <ul>--}}
{{--                @foreach($company->customers as $customer)--}}
{{--                    <li>{{ $customer->name }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}

{{--<h4>New Customer Entry</h4>--}}
{{--<ul>--}}
{{--    <li><a href="/">Home</a></li>--}}
{{--    <li><a href="about-us">About</a></li>--}}
{{--    <li><a href="Contact-us">Contact</a></li>--}}
{{--    <li><a href="Customer">Customer</a></li>--}}
{{--</ul>--}}


@endsection

