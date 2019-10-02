@extends('template.frontend')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<form method="POST" action="{{url('Cariberkas/store')}}">
				{{csrf_field()}}
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" name="namaberkas">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-info "><span class="fa fa-search"></span> Cari</button>
						</span>
					</div>						
				</div>					
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">		
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ucwords($conf->subheadline)}}</h3>
					<small class="pull-right">Total berkas tersimpan : {{count($data)}}</small>
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
											@includeIf('frontend.aksi')
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