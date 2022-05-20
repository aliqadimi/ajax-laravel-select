<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="content">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel PHP Ajax Country State City Dropdown List - Tutsmake.COM</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h2 class="text-success">Laravel Country State City Dependent Dropdown List with Ajax - Tutsmake.COM</h2>
</div>
<div class="card-body">
<form>
<div class="form-group">
<label for="country">Country</label>
<select class="form-control" id="country-dropdown">
<option value="">Select Country</option>
@foreach ($countries as $country)
<option value="{{$country->id}}">
{{$country->name}}
</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="state">State</label>
<select class="form-control" id="state-dropdown">
</select>
</div>
<div class="form-group">
<label for="city">City</label>
<select class="form-control" id="city-dropdown">
</select>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
    $('#country-dropdown').on('change', function() {
    var country_id = this.value;
    $("#state-dropdown").html('');
    $.ajax({
    url:"{{url('get-states-by-country')}}",
    type: "POST",
    data: {
    country_id: country_id,
    _token: '{{csrf_token()}}'
    },
    dataType : 'json',
    success: function(result){
    $.each(result.states,function(key,value){
    $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    $('#city-dropdown').html('<option value="">Select State First</option>');
    }
    });
    });
    $('#state-dropdown').on('change', function() {
    var state_id = this.value;
    $("#city-dropdown").html('');
    $.ajax({
    url:"{{url('get-cities-by-state')}}",
    type: "POST",
    data: {
    state_id: state_id,
    _token: '{{csrf_token()}}'
    },
    dataType : 'json',
    success: function(result){
    $.each(result.cities,function(key,value){
    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    }
    });
    });
    });
    </script>
</body>
</html>
