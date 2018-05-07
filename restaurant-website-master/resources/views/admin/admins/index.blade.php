@extends('admin.layouts.master')

@section('css.dataTable')
<link rel="stylesheet" href="{{ asset('admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('admins/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"> --}}

@endsection

@section('cate')
Admin
@endsection

@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Table of Admins</h3>
					<a class="btn btn-primary fas fa-plus " data-toggle="modal" href='#modalAdd' style="float: right">&nbsp;<i class="fas fa-bars"></i></a>
					<div class="modal fade" id="modalAdd">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add new admin</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST" role="form" id="formAdd" name="formAdd">
										@csrf
										<div class="form-group">
											<label for="">Name</label>
											<input type="text" class="form-control" id="name" placeholder="Name" name="name">
										</div>
										<div class="form-group">
											<label for="">Password</label>
											<input type="text" class="form-control" id="password" placeholder="password" name="password">
										</div>
										<div class="form-group">
											<label for="">Email</label>
											<input type="text" class="form-control" id="email" placeholder="email" name="email">
										</div>
										<div class="form-group">
											<label for="">Birthday</label>
											<input type="text" class="form-control" id="birthday" placeholder="birthday" name="birthday">
										</div>								
										<div class="form-group">
											<label for="">Phone</label>
											<input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Create</button>
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-hover table-bordered" id="tbl-admin">
						<thead>
							<tr>
								<th width="5%" class="text-center">ID</th>
								<th>Name</th>

								<th width="15%">Email</th>
								<th>Phone</th>
								<th>Birthday</th>
								<th width="15%">Created at</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	{{-- modal Show --}}
	<div class="modal fade" id="modalShow">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tash Res: </h4>
				</div>
				<div class="modal-body">
					<h4 class="text-center">Details of Admin: <span id="show-name-title"></span></h4>
					<br>
					<table class="table table-hover">	

						<tr>
							<th>ID</th>
							<td id="show-id"></td>
						</tr>
						<tr>
							<th>Avatar</th>
							<td id="show-avt"></td>
						</tr>
						<tr>
							<th>Name</th>
							<td id="show-name"></td>
						</tr>
						<tr>
							<th>Birthday</th>
							<td id="show-birthday"></td>
						</tr>
						<tr>
							<th>Email</th>
							<td id="show-email"></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td id="show-phone"></td>
						</tr>
						<tr>
							<th>Created at</th>
							<td id="show-created-at"></td>
						</tr>
						<tr>
							<th>Lastest updated</th>
							<td id="show-updated-at"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	{{-- modal Edit --}}
	<div class="modal fade" id="modalEdit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Tah Res </h3>
				</div>
				<div class="modal-body">
					<form action=""  role="form" id="formEdit">
						@csrf
						@method('PUT')
						<legend class="text-center">Edit information admin: <span id="edit-title-name"></span></legend>
						<input type="hidden" name="id-cate" value="" id="edit-id">
						<input type="hidden" name="edit-has-sub-cate" value="" id="edit-has-sub-cate">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="edit-name" placeholder="Name" name="name">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="edit-email" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<label for="">Birthday</label>
							<input type="text" class="form-control" id="edit-birthday" placeholder="Birthday" name="birthday">
						</div>	
						<div class="form-group">
							<label for="">Phone</label>
							<input type="text" class="form-control" id="edit-phone" placeholder="Phone" name="phone">
						</div>		
						<div class="form-group">
							<label for="">Password</label>
							<input type="text" class="form-control" id="edit-password" placeholder="Password" name="password">
						</div>				

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
@endsection

@section('js.dataTable')
<script src="{{ asset('admins/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admins/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin_admins.js') }}"></script>
<script >

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
		}
	});

	$(function() {
		$('#tbl-admin').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('admin.admins.dataTable') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			
			{ data: 'email', name: 'email' },
			{ data: 'phone', name: 'phone' },
			{ data: 'birthday', name: 'birthday' },
			{ data: 'created_at', name: 'created_at' },
			{ data: 'action', name: 'action', orderable: false, searchable: false}
			]
		});
	});

	$('#formAdd').on('submit',  function(event) {
		//prevent open new window 
		event.preventDefault();

		//var level = $('#parent-id option:selected').attr('data-level');
		// alert(level);
		$.ajax({
			url: '{{ route('admin.admins.store') }}',
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {
				name: $('#name').val(),
				email: $('#email').val(),
				phone: $('#phone').val(),
				birthday: $('#birthday').val(),
				password: $('#password').val(),
			},
			success: function(response){
				// alert(response.message);
				$('#modalAdd').modal('hide');

				$('#tbl-admin').prepend('<tr id='+response.id+'><td>'+response.id+'</td><td>'+response.name+'</td><td>'+response.password+'</td><td>'+response.email+'</td><td>'+response.phone+'</td><td>'+response.birthday+'</td><td>'+response.created_at+'</td><td><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-id='+response.id+'></a>&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-id='+response.id+'></a>&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-id='+response.id+'></a></td></tr>');


				toastr["success"]("Add new Admin successfully!");
			},
			error: function(xhr, status, errorThrown){
				$errs = xhr.responseJSON.errors;
				console.log($errs);
				toastr['error'](errorThrown);
				toastr['error']($errs['name'][0]);
				toastr['error']($errs['password'][0]);
			} 
		})
	});

	//delete 
	$('#tbl-admin').on('click','.btnDelete', function(e){

		var id = $(this).data('id');
		
		//var parent = $(this).parent();

		e.preventDefault();

		swal({			
			title: "Are you sure?",
			text: "Do you want delete this admin?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {

			if (willDelete) {

				$.ajax({

					type: "delete",
					url: '{{ asset('') }}admin/admin/delete/'+id,

					success: function(res)
					{
						toastr.success('The admin has been deleted!');
						parent.slideUp(300, function () {
							parent.closest("tr").remove();
						});
					},

					error: function (xhr, ajaxOptions, thrownError) {
						console.log(xhr.responseJSON.errors);
						toastr.error(thrownError);
					}
				});				

			} else {
				swal("The admin is safety!");
			}
		});
	});

	$('#tbl-admin').on('click', '.btnShow', function(e){
		e.preventDefault();

		
		$('#modalShow').modal('show');

		//var id = $(this).data('id');
		// alert(id);

		$.ajax({
			url: '{{ asset('') }}admin/admins/'+id,
			type: 'GET',
			success: function(res)
			{				
				$('#show-id').text(res.id);
				$('#show-name').text(res.name);
				$('#show-phone').text(res.phone);
				$('#show-birthday').text(res.birthday);
				$('#show-email').text(res.email);
				$('#show-created-at').text(res.created_at);
				$('#show-updated-at').text(res.updated_at);
			},

			error: function (xhr, ajaxOptions, thrownError) {
				console.log(xhr.responseJSON.errors);
				toastr.error(thrownError);
			}
		})
	})

	$('#tbl-admin').on('click', '.btnEdit', function(e){

		e.preventDefault();

		var id = $(this).data('id');

		$('#modalEdit').modal('show');

		document.getElementById('formEdit').reset();

		$.ajax({
			url: '{{ asset('') }}admin/admins/edit/'+id,
			type: 'GET',

			success: function(res){
				// alert(res.id);
				$('#edit-id').attr('value',res.id);
				$('#edit-name').attr('value',res.name);
				$('#edit-email').attr('value',res.email);
				$('#edit-birthday').attr('value',res.birthday);
				$('#edit-password').attr('value',res.password);
				
				//$('#edit-has-sub-cate').attr('value',res.has_sub_cate);
			},

			error: function(xhr, ajaxOptions, thrownError){
				console.log(xhr.responseJSON.errors);
				toastr.error(thrownError);
			}
		})		
	})

	// $('#formEdit').on('submit',function(e){

	// 	e.preventDefault();

	// 	var id =  $('#formEdit #edit-id').attr('value');

	// 	var row = document.getElementById(id);

	// 	$.ajax({

	// 		url: '{{ asset('') }}admin/admins/update/'+id,
	// 		type: 'PUT',
	// 		data: {
	// 			name: $('#edit-name').val(),
	// 			description: $('#edit-description').val(),
	// 			parent_id: $('#formEdit #parent-id option:selected').val(),
	// 			level: $('#formEdit #parent-id option:selected').data('level'),
	// 		},
	// 		success: function(response){
	// 			$('#modalEdit').modal('hide');
	// 			row.remove();
	// 			$('#tbl-category').prepend('<tr id='+response.id+'><td>'+response.id+'</td><td>'+response.name+'</td><td>'+response.parent+'</td><td>'+response.level+'</td><td>'+response.description+'</td><td>'+response.created_at+'</td><td><a title="Detail" class="btn btn-info btn-sm glyphicon glyphicon-eye-open btnShow" data-id='+response.id+'></a>&nbsp;<a title="Update" class="btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit" data-id='+response.id+'></a>&nbsp;<a title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash btnDelete" data-id='+response.id+'></a></td>');

	// 			toastr['success']('Update successfully!');


	// 		},
	// 		error: function(xhr, ajaxOptions, thrownError){
	// 			// toastr['error'](response.error);
	// 		}
	// 	})
	//})
</script>
@endsection
