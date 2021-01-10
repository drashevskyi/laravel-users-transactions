@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.update', $userDetails->user_id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control" value="{{ $userDetails->first_name }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" required value="{{ $userDetails->last_name }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Phone number:</strong>
                    <input type="text" name="phone_number" class="form-control" value="{{ $userDetails->phone_number }}" id="phone_number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Citizenship:</strong>
                    <select class="form-control" id="citizenship_country_id" name="citizenship_country_id">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                    @if($country->id == $userDetails->citizenship_country_id)
                                        selected
                                    @endif
                                    >{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
<!-- validate phone number -->
<script>
    $('#phone_number').keyup(function(e){
        if (/\D/g.test(this.value))
        {
           this.value = this.value.replace(/\D/g, '');
        }
    });
</script>
@endsection