@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Welcome <b>{{ Auth::user()->name }}</b> !</div>

				<div class="panel-body">
					Thank You for Registration!
					<p>You are not Authorized by Administrator.</p>
					<p>Please contact</p>
					<p><img src="{{ asset('/images/logo.png') }}" style="height: 90px;"></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
