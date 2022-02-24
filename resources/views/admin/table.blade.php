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
								<h2 class="text-white pb-2 fw-bold">Admin List</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="{{route('admin.add')}}" class="btn btn-secondary btn-round">Add</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="card full-height col-lg-12 pt-3">
                            <table class="table table-striped" id="encyclopedia-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									<tbody>
										
									</tbody>
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
				table =  $('#encyclopedia-table').DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url : '{!! route('admin.data') !!}',
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
						{ data: 'email' },
						{
							data: 'id',
							render: function(data, type, row){
								var url_edit = "{{url('/admin/')}}"+"/"+data;
								if(row.level == "root"){
									return '\
									<a href="'+url_edit+'" class="btn btn-xs btn-warning my-1">Edit</a>';
								}else{
									return '\
									<a href="'+url_edit+'" class="btn btn-xs btn-warning my-1">Edit</a>\
									<button class="btn btn-xs btn-danger my-1" onclick="deleteAdmin('+data+')">Delete</button>';

								}
							}
						},
					]
				});
			} );

			function deleteAdmin(id) {
				var _token = "{{ csrf_token() }}";
				var url = "{{url('/admin/')}}";
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
						$.ajax({
							url: url+"/"+id,
							type:'DELETE',
							data: {_token:_token},
							success: function(data) {
								Swal.fire(
									'Deleted!',
									'Your data has been deleted.',
									'success'
								)
								table.ajax.reload();
							}
						});
					}
				})
			}
			

			
		</script>
	@endpush
	