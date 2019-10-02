@extends('template.template')
@section('content')
	<div class="row">
		<div class="col-sm-12">
<!-- 			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			             @foreach ($errors->all() as $error)
			              <li>{{ $error }}</li>
			             @endforeach

			        </ul>
			    </div>
			@endif	 -->		
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Quick Example</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="{{url('pendaftaran/simpan')}}" method="POST">
					<div class="box-body">
							
						@includeIf('pendaftaran.extend',['headline'=>'silahkan mengisi form dibawah dengan data yang sebenar-benarnya'])				
						{{csrf_field()}}
						<div class="form-group {{($errors->has('nama')) ? 'has-error':''}}">
							<label for="exampleInputEmail1">Nama</label>
							<input id="nama" type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" value="{{old('nama')}}">	
							<p class="text-red">{{($errors->has('nama')) ? ucwords($errors->first('nama')):''}}</p>						
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Email</label>
							<input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{old('email')}}">
							<p class="text-red">{{($errors->has('email')) ? ucwords($errors->first('email')):''}}</p>
						</div>
		                <div class="form-group">
		                	<label>Jenis Kelamin</label>
		                	<div class="radio">
		                		<label>
		                			<input type="radio" name="jeniskelamin" id="optionsRadios1" value="1" >
		                			Laki - Laki
		                		</label>
		                		<label>
		                			<input type="radio" name="jeniskelamin" id="optionsRadios1" value="0" >
		                			Perempuan
		                		</label>		                    
		                	</div>
		                	<p class="text-red">{{($errors->has('jeniskelamin')) ? ucwords($errors->first('jeniskelamin')):''}}</p>
		                </div>
		                <div class="form-group">
		                	<label>Tempat Lahir</label>
		                	<input type="text" name="tempatlahir" class="form-control" value="{{old('tempatlahir')}}" placeholder="Tempat lahir">
		                	<p class="text-red">{{($errors->has('tempatlahir')) ? ucwords($errors->first('tempatlahir')):''}}</p>
		                </div>
		                <div class="form-group">
		                	<label>Tanggal Lahir</label>
		                	<input type="text" name="tanggallahir" class="form-control datepicker" value="{{old('tanggallahir')}}" placeholder="Tanggal lahir" value="{{old('tanggallahir')}}">
		                	<p class="text-red">{{($errors->has('tanggallahir')) ? ucwords($errors->first('tanggallahir')):''}}</p>
		                </div>						
						<div class="form-group">
							<label>Alamat</label>
							<textarea type="text" name="alamat" class="form-control" rows="5" placeholder="Alamat">{{old('alamat')}}</textarea>
							<p class="text-red">{{($errors->has('alamat')) ? ucwords($errors->first('alamat')):''}}</p>
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