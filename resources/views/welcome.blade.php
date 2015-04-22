<html>
	<head>
		<title>Mobhe</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Thoma';
				background-color: lightblue;
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
				color: black;
			}
			.nav {
				font-size: 20px;
				color: black;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title"><img src="{{ asset('/images/logo.png') }}" /></div>
				<div class="quote">Healthcare, wherever you are!</div> <!--{{ Inspiring::quote() }}-->
				<div class="nav"><a href="{{ url('/auth/login') }}">Login</a>/<a href="{{ url('/auth/register') }}">Registration</a></div> <!--{{ Inspiring::quote() }}-->
			</div>
		</div>
	</body>
</html>
