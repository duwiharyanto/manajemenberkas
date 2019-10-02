@extends('template.template')
@section('content')
	<div class="row">
		<div class="col-sm-12">		
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Quick Example</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="{{route($conf->url.'.store')}}" method="POST" enctype="multipart/form-data">
					<div class="box-body">				
						{{csrf_field()}}
						<!--
						<div class="form-group">
							<label>User</label>
							<select class="form-control select2" style="width: 100%;" name="user_id">
								@foreach($data AS $row)
									<option value="{{$row->id}}">{{ucwords($row->name)}}</option>
								@endforeach
							</select>
						</div>
						-->
						<div class="form-group {{($errors->has('namaberkas')) ? 'has-error':''}}">
							<label for="exampleInputEmail1">Nama Berkas</label>
							<input id="nama" type="text" name="namaberkas" class="form-control" id="exampleInputEmail1" placeholder="Nama berkas" value="{{old('namaberkas')}}">	
							<p class="text-red">{{($errors->has('namaberkas')) ? ucwords($errors->first('namaberkas')):''}}</p>						
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Keterangan</label>
							<textarea type="text" name="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Keterangan" value="">{{old('keterangan')}}</textarea>
							<p class="text-red">{{($errors->has('keterangan')) ? ucwords($errors->first('keterangan')):''}}</p>
						</div>
		                <div class="form-group">
		                	<label>Nama File</label>
		                	<input type="text" name="namafile" class="form-control" value="{{old('namafile')}}" placeholder="Nama File">
		                	<p class="text-red">{{($errors->has('namafile')) ? ucwords($errors->first('namafile')):''}}</p>
		                </div>
		                <div class="form-group">
		                	<label>File</label>
		                	<input type="file" name="file">
		                	<p class="text-red">{{($errors->has('file')) ? ucwords($errors->first('file')):'Format PDF'}}</p>
		                </div>						


					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>		
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			    format: "dd-mm-yyyy",
			    autoclose: true,
			    todayHighlight: true,
			    toggleActive: true
			}
		);
	})
</script>
@endsection