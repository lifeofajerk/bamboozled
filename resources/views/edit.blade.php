
@extends('layouts.app')

@section('content')

<script type="text/javascript">

	function Edit()
	{
		document.getElementById("editForm").action="{{ route('edit', $employee[0]['id']) }}";
		document.getElementById("editForm").submit();
	}

	function Delete()
	{
		var result = confirm("Are you sure you would like to delete this employee?");

		if (result)
		{
			document.getElementById("editForm").action="{{ route('delete', $employee[0]['id']) }}";
			document.getElementById("editForm").submit();
		}
	}

</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Employee</div>      		
 				<div class="panel-body">
					<form id="editForm" method="POST" class="form-horizontal">
						
						{{ csrf_field() }}

						<input id="id" type="hidden" name="id" value="{{ $employee[0]['id'] }}" />

						<div class="form-group">
							<label for="first_name" class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input id="first_name" type="text" name="first_name" required="required" autofocus="autofocus" value="{{ $employee[0]['first_name'] }}" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="last_name" class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input id="last_name" type="text" name="last_name" value="{{ $employee[0]['last_name'] }}" required="required" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="birthday" class="col-md-4 control-label">Birthday</label>
							<div class="col-md-6">
								<input id="birthday" type="date" name="birthday" value="{{ $employee[0]['birthday'] }}" required="required" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="hire_date" class="col-md-4 control-label">Hire Date</label>
							<div class="col-md-6">
								<input id="hire_date" type="date" name="hire_date" value="{{ $employee[0]['hire_date'] }}" required="required" class="form-control">
							</div>
						</div> 

						<div class="form-group">
							<label for="salary" class="col-md-4 control-label">Salary</label>
							<div class="col-md-6">
								<input id="salary" type="number" name="salary" value="{{ $employee[0]['salary'] }}" required="required" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="social_security" class="col-md-4 control-label">Social Security Number</label>
							<div class="col-md-6">
								<input id="social_security" type="text" name="social_security" value="{{ $employee[0]['social_security'] }}" required="required" pattern="\d{3}-?\d{2}-?\d{4}" class="form-control" placeholder="xxx-xx-xxxx">
							</div>
						</div>

						<div class="form-group">
							<span>
								<div class="col-md-8 col-md-offset-4" style="display: inline-block">
									<button type="button" class="btn btn-primary" id="editButton" onclick="Edit()">Update</button>
									<button type="button" class="btn btn-primary" id="deleteButton" onclick="Delete()">Delete</button>
									</form>
								</div>
							</span>
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
