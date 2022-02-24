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
								<h2 class="text-white pb-2 fw-bold">Encyclopedia category</h2>
								{{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a> --}}
								<a href="{{route('encyclopedia.category.add')}}" class="btn btn-secondary btn-round">Add</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
                    <div class="row mt--2">
						{{-- <div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">New Users</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Sales</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Subscribers</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Total income & spend statistics</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
												<h3 class="fw-bold">$9.782</h3>
											</div>
											<div>
												<h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
												<h3 class="fw-bold">$1,248</h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
                        <div class="card full-height col-lg-12 pt-3">
                            <table class="table table-striped" id="encyclopedia-category-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
			var table;
			$(document).ready( function () {
				var _token = "{{ csrf_token() }}";
				table =  $('#encyclopedia-category-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url : '{!! route('encyclopedia.category.data') !!}',
						type : 'POST',
						data: {_token:_token},
					},
					columns: [
						{ data: 'id',
							render: function (data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
		  				},
						{ data: 'name' },
						{
							data: 'id',
							render: function(data, type, row){
								var url_edit = "{{url('/encyclopedia/category/edit')}}"+"/"+data;
								return '\
								<a href="'+url_edit+'" class="btn btn-xs btn-warning my-1">Edit</a>\
								<button class="btn btn-xs btn-danger my-1" onclick="deleteCategory('+data+')">Delete</button>';
							}
						},
					]
				});
			} );

			function deleteCategory(id) {
				var _token = "{{ csrf_token() }}";
				var url = "{{url('/encyclopedia/category/')}}";
				console.log(id);
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					if (result.isConfirmed) {
						console.log(url+"/"+id);
						$.ajax({
							url: url+"/"+id,
							type:'DELETE',
							data: {_token:_token},
							success: function(data) {
								// printMsg(data);
								console.log(data);
								Swal.fire(
									'Deleted!',
									'Your file has been deleted.',
									'success'
								)
								location.reload();
							}
						});
					}
				})
			}
		</script>
	@endpush
	