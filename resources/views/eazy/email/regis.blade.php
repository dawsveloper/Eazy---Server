<!DOCTYPE html>
<html>
<head>
	<link href="{{ asset('/theme/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
	<div style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
		<div class="no-print"></div>
		<div style="text-align:center;">
			<strong>Eazy Application</strong>
			<div class="well well-sm" style="margin-top:10px;">
				<div style="text-align: center;">
					<strong>Dear {{$user['name']}}, please verify your account by clicking this <a href="http://new.entongproject.com/account/verify/{{$user['id']}}">link</a></strong>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
