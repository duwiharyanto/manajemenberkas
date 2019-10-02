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
				<form role="form" action="{{route($conf->url.'.update',encrypt($data->id))}}" method="POST">
					<div class="box-body">
						<!-- @includeIf('pendaftaran.extend',['headline'=>'silahkan mengisi form dibawah dengan data yang sebenar-benarnya']) -->
						{{ method_field('PUT') }}			
						{{csrf_field()}}
						<div class="form-group {{($errors->has('name')) ? 'has-error':''}}">
							<label>Nama</label>
							<input type="text" name="name" class="form-control" placeholder="Nama" value="{{$data->name}}">	
							<p class="text-red">{{($errors->has('name')) ? ucwords($errors->first('name')):''}}</p>						
						</div>
						<div class="form-group {{($errors->has('email')) ? 'has-error':''}}">
							<label >Email</label>
							<input  type="text" name="email" class="form-control" placeholder="Email" value="{{$data->email}}">	
							<p class="text-red">{{($errors->has('email')) ? ucwords($errors->first('email')):''}}</p>						
						</div>
						<div class="form-group {{($errors->has('password')) ? 'has-error':''}}">
							<label >Password</label>
							<input type="password" name="password" class="form-control"  placeholder="Password" value="{{$data->password}}">	
							<p class="text-red">{{($errors->has('password')) ? ucwords($errors->first('password')):''}}</p>						
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