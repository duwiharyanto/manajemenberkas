@extends('template.template')
@section('content')
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<a href="{{route('Berkas.create')}}" class="btn btn-primary btn-block">Tambah</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">		
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ucwords($conf->subheadline)}}</h3>
				</div>
				<div class="box-body">
					<div class="table-responisve">
						<table class="table table-bordered datatabel" width="100%">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th>Judul</th>
									<th width="30%">Keterangan</th>
									<th>Nama File</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data AS $row)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$row->namaberkas}}</td>
										<td>{{$row->keterangan}}</td>
										<td>{{$row->namafile}}</td>
										<td class="text-center">
											@includeIf('berkas.aksi')
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
@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		// $('.datepicker').datepicker({
		// 	    format: "dd-mm-yyyy",
		// 	    autoclose: true,
		// 	    todayHighlight: true,
		// 	    toggleActive: true
		// 	}
		// );
	})
</script>
@endsection