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
								<h2 class="text-white pb-2 fw-bold">Add encyclopedia</h2>
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
									<form action="{{route('encyclopedia.store')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group col-md-4">
										  <label for="title">Title</label>
										  <input type="text" class="form-control" id="title" name="title" aria-describedby="Title" value="{{ old('title') }}">
										  @error('title') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-group  col-md-4">
											<label for="category">Category</label>
											<select class="form-control form-control" id="category" name="category">
												<option value="">- Select Category -</option>
												@foreach ($categories as $data)
												<option value="{{ $data->id }}">{{ $data->name }}</option>
												@endforeach
											</select>
											@error('category') <span class="text-danger">{{ $message }}</span> @enderror
										</div>
                                        <div class="form-group  col-md-4">
											<p style="font-weight: 600">Thumbnail</p>
											<img class="img-preview img-fluid mb-3">
											<p id="file-name"></p>
                                            <label class="image-label" for="image"><i class="fas fa-file-upload"></i><span>Pilih File</span></label>
                                            <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()">
                                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="text">Text</label>
                                            <textarea class="form-control" id="text" name="text">{{old('text')}}</textarea>
                                            @error('text') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
										<button type="submit" class="btn btn-primary btn-rounded ml-2 mt-3">Submit</button>
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
				let filename = document.getElementById('file-name');
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
	