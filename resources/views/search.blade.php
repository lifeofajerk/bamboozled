
@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Find Employee</div>      		
 					<div class="panel-body">
						<form method="POST" action="{{ route('search') }}" class="form-horizontal">
							
							{{ csrf_field() }}
							<div class="form-group">
								<label for="first_name" class="col-md-4 control-label">First Name</label>
								<div class="col-md-6">
									<input id="first_name" type="text" name="first_name" value="" required="required" autofocus="autofocus" class="form-control">
								</div>
							</div> 

							<div class="form-group">
								<label for="last_name" class="col-md-4 control-label">Last Name</label>
								<div class="col-md-6">
									<input id="last_name" type="text" name="last_name" value="" required="required" autofocus="autofocus" class="form-control">
								</div>
							</div> 

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">Find</button> 
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
           
			@if (isset($employee) && count($employee) > 0)
				<div class="alert alert-success">
					{{ $employee[0]['first_name'] }}
				</div>
			@endif

			@if (isset($search_error))
				<div class="alert alert-danger">
					{{ $search_error }}					
				</div>
			@endif
			
			@if (Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif
		</div>
	</div>
</div>

@endsection
