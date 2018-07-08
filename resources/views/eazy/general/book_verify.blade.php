<!DOCTYPE html>
<html>
<head>
		<link href="http://new.entongproject.com/theme/assets/global/plugins/jcrop/demos/demo_files/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
		<div class="no-print"></div>
		<div style="text-align:center;">
			<strong>Eazy Application</strong><br>Booking Validation<br>-</p><p></p> </div>
			<div class="well well-sm" style="margin-top:10px;">
				<div style="text-align: center;">
					@if($status == 'voted')
						<strong>Validation for {{$bookNumber}} is 
							<span style="color:#f3c200; text-transform:uppercase;font-weight: bold;">Unvalid</span><br> 
							This booking number is voted already
						</strong>

					@elseif($status == 'approve')
						<strong>Validation for {{$bookNumber}} is 
							<span style="color:#4B77BE; text-transform:uppercase; font-weight: bold;">Success</span><br> 
							This booking is <span style="color:#1BA39C; text-transform:uppercase; font-weight: bold;">approved</span><br> 
						</strong>

					@elseif($status == 'reject')
						<strong>Validation for {{$bookNumber}} is 
							<span style="color:#4B77BE; text-transform:uppercase; font-weight: bold;">Success</span><br> 
							This booking is <span style="color:#D91E18; text-transform:uppercase; font-weight: bold;">rejected</span><br>
						</strong>
					@endif
				</div>
			</div>
		</div>
	</div>
</body>
</html>
