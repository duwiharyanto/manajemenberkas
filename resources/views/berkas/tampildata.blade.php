@extends('template.template')
@section('content')
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<a href="{{ url('pendaftaran/add')}}" class="btn btn-primary btn-block">Add</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Tampil Data</h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%">
							<thead>
								<tr>
									<td width="5%">No</td>
									<td>Nama</td>
									<td>Email</td>
									<td>Alamat</td>
									<td class="text-center" width="10%">Aksi</td>
								</tr>
							</thead>
							<tbody>
								@foreach($data AS $row)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{ucwords($row->nama)}}</td>
										<td>{{$row->email}}</td>
										<td>{{ucwords($row->alamat)}}</td>
										<td class="text-center">
											<form action="{{ url('pendaftaran/hapus', $row->id) }}" method="post">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<a href="{{ url('pendaftaran/edit',$row->id) }}" class=" btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>
												<button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"><span class="fa fa-trash"></span></button>
											</form>
											<a href="/pendaftaran/hapus/{{ $row->id }}" class="btn btn-danger hidden"><span class="fa fa-trash"></span></a>											
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection