@extends('template.logintemplate');
@section('content')
<div class="login-box">
    @if(Session::has('alertdanger'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i> Error !</h4>
           <div>{{Session::get('alertdanger')}}</div>
        </div>            
    @endif
    @if(Session::get('alertsuccess'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i> Perhatian !</h4>
           <div>{{Session::get('alertsuccess')}}</div>
        </div>            
    @endif 	
	<div class="login-logo">
		<a href="{{url('/')}}">{{ucwords($conf->headline)}}</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<form action="{{route('Login.auth')}}" method="post">
			{{csrf_field()}}
			<div class="form-group has-feedback">
				<input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<p class="text-red">{{($errors->has('email')) ? ucwords($errors->first('email')):''}}</p>	
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<p class="text-red">{{($errors->has('password')) ? ucwords($errors->first('password')):''}}</p>	
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
	</div>
</div>
<!-- /.login-box -->
@endsection