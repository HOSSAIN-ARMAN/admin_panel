
<div class="form-group pb-4">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
    <div>{{ $errors->first('name') }}</div>
</div>

<div class="form-group pb-4">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
    <div>{{ $errors->first('email') }}</div>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="active" id="active" class="form-control">

        @foreach( $customer->activeOptions() as $activeOptionKey => $activeOptionValue )
            <option value="{{ $activeOptionKey }}" {{$customer->active == $activeOptionValue ? 'selected' : ''}} class="option">{{$activeOptionValue}}</option>
        @endforeach

{{--        <option value="" disabled>select status</option>--}}
{{--        <option value="1" {{ $customer->active == 'Active' ? 'selected' : '' }}>Active</option>--}}
{{--        <option value="0" {{ $customer->active == 'In-Active' ? 'selected' : '' }}>In-Active</option>--}}
    </select>
</div>
<div class="form-group">
    <label for="status">Company</label>
    <select name="company_id" id="company" class="form-control">
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{$company->id == $customer->company_id ? 'selected' : ''}} class="option">{{ $company->name }}</option>
        @endforeach
    </select>
</div>

<div class="from-group d-flex flex-column">
    <label for="image">Profile</label>
    <input type="file" name="image" class="py-6">
    <div>{{ $errors->first('image') }}</div>
    <br>
</div>

@csrf
