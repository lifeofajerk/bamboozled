
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Employee</div>      		
 				<div class="panel-body">
					<form method="POST" action="{{ route('create') }}" class="form-horizontal">
						
						{{ csrf_field() }}

						<div class="form-group">
							<label for="first_name" class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required="required" autofocus="autofocus" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="last_name" class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required="required" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="birthday" class="col-md-4 control-label">Birthday</label>
							<div class="col-md-6">
								<input id="birthday" type="date" name="birthday" value="{{ old('birthday') }}" required="required" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="hire_date" class="col-md-4 control-label">Hire Date</label>
							<div class="col-md-6">
								<input id="hire_date" type="date" name="hire_date" value="{{ old('hire_date') }}" required="required" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="salary" class="col-md-4 control-label">Salary</label>
							<div class="col-md-6">
								<input id="salary" type="number" name="salary" value="{{ old('salary') }}" required="required" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="social_security" class="col-md-4 control-label">Social Security Number</label>
							<div class="col-md-6">
								<input id="social_security" type="text" name="social_security" value="{{ old('social_security') }} " required="required" pattern="\d{3}-?\d{2}-?\d{4}" class="form-control" placeholder="xxx-xx-xxxx">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Save</button> 
							</div>
						</div>

					</form>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
           
			@if (\Session::has('success'))
				<div class="alert alert-success">
					{!! \Session::get('success') !!}
				</div>
			@endif
						
			@if($errors->any())
				<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
      					{{ $error }} <br>
  				@endforeach							
				</div>
			@endif	

		</div>
	</div>
</div>

@endsection
