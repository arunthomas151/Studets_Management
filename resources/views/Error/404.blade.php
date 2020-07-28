<!doctype html>
<html lang="en">
	<head>
	</head>

	<body>

		<div >
			<div >
				<div>
					<h1>{{ $msg}}</h1>
					<a class="btn btn-outline-primary" href="{{ url()->previous() }}">
						Back
					</a>
				</div>
			</div>
		</div>

		<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

	</body>
</html>