<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<div>
		les messages
	</div>
	<form action="{{route('chat.store')}}" method="post">
		@csrf
		<input type="text" id="nickname">
		<input type="text" id="message">
		<button type="button" id="submitButton">envoyer</button>
	</form>

</body>
</html>
<script src="{{  asset('js/live.js') }}">
</script>
