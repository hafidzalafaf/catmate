@extends('layouts.main')

@section('content')

<body>
	<div class="wrapper">
		@include('layouts.header')

		@include('layouts.sidebar')

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Add encyclopedia category</h2>
								{{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-4">
							<div class="card full-height">
								<div class="card-body">
									<form action="{{route('encyclopedia.category.store')}}" method="POST">
										@csrf
										<div class="form-group">
										  <label for="name">Category Name</label>
										  <input type="text" class="form-control" id="name" name="name" aria-describedby="Project Name" value="{{ old('name') }}">
										  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
										  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>  --}}
										</div>
										<button type="submit" class="btn btn-primary btn-rounded ml-2">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						2022, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.tupaitech.net">Tupai tech</a>
					</div>				
				</div>
			</footer>
		</div>
		
	</div>

	@endsection
	