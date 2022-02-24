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
								<h2 class="text-white pb-2 fw-bold">Edit admin</h2>
								{{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-12">
							<div class="card full-height">
								<div class="card-body">
									<form action="{{ route('admin.edit', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group col-md-4">
											<label for="name">Name</label>
											<input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ old('name', $user->name) }}" required>
										  	@error('name') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group col-md-4">
											<label for="username">Username</label>
											<input type="text" class="form-control" id="username" name="username" aria-describedby="username" value="{{ old('username', $user->username) }}" required>
										  	@error('username') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group col-md-4">
											<label for="email">Email</label>
											<input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ old('email', $user->email) }}"  required>
											@error('email') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group col-md-4">
											<label for="password">Password</label>
											<input type="password" class="form-control" id="password" name="password" aria-describedby="password" value="{{ old('password') }}">
											@error('password') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
										  
										<button type="submit" class="btn btn-primary btn-rounded ml-2 mt-3">Edit admin</button>
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

	@push('scripts')
		<script>
			
			function previewImage() {
				const image = document.querySelector('#image');
				const imagePreview = document.querySelector('.img-preview');
				let filename = document.getElementById('file-name-edit');
				imagePreview.style.display='block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);
				filename.innerHTML = image.files[0].name;

				oFReader.onload =function (oFREvent) {
					imagePreview.src = oFREvent.target.result;					
				}
				console.log(imagePreview);
			}

			$(document).ready(function(){
			// CKEDITOR
			var editor = CKEDITOR.replace('text', {
            	height: 400,
			});
			CKFinder.setupCKEditor(editor);
		})
		</script>
	@endpush
	