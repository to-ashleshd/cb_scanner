<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	<title>
	</title>
	</head>
    <body>
			hello <?= $name;?>
			{{ URL::asset('abc') }}
			<ul>
				@foreach($arr as $key=>$value)
					<li> {{$value}}</li>
				@endforeach
			</ul>
    </body>
</html>
