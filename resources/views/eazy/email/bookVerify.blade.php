<!DOCTYPE html>
<html>
	<head>
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<link href="http://new.entongproject.com/theme/assets/global/plugins/jcrop/demos/demo_files/main.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title></title>
		<style type="text/css">
			.button {
			    background-color: #26C281;
			    border: none;
			    color: white;
			    padding: 15px 32px;
			    text-align: center;
			    text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
			<div class="no-print"></div>
			<div id="receipt-data"><div>
			<div style="text-align:center;">
				<strong>Eazy Apps</strong><br><br></p><p></p> </div>
				<p>
				Booking Number :  {{$book['bookingNumber']}}<br>
				Renter Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$book['renterName'] }} <br>
				Renter Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  {{$book['renterMail']}}<br>
				</p>
				<div style="clear:both;"></div>

				<img src="{{$book['carUrl']}}" alt="car" style=" width: 100%; height: auto; display: block; margin-left: auto;margin-right: auto; min-height: 400px;   max-height: 600px;">

					<table class="table table-striped table-condensed">
						<tbody>
							<tr>
								<th style="text-align: left;">Car Name </th>
								<td style="text-align: left;">{{$book['carName']}}</td>
							</tr>
							<tr>
								<th style="text-align: left;">Duration </th>
								<td style="text-align: left;">{{$book['duration']}}</td>
							</tr>
							<tr>
								<th style="text-align: left;">Price Type </th>
								<td style="text-align: left;">{{$book['priceType']}}</td>
							</tr>
							<tr>
								<th style="text-align: left;">Date </th>
								<td style="text-align: left;">{{date('d M Y H:i', strtotime($book['dateStart']))}} - {{date('d M Y H:i', strtotime($book['dateEnd']))}}</td>
							</tr>
							<tr>
								<th style="text-align: left;">Payment </th>
								<td style="text-align: left;">{{$book['paymentType']}}</td>
							</tr>
							<tr>
								<th style="text-align: left;">Total Price </th>
								<td style="text-align: left;">RM {{number_format($book['totalPrice'])}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="clear:both;"></div>
			</div>

			<div id="buttons" style="text-transform:uppercase;" class="no-print">
				<hr>
				<span class="pull-right col-xs-12">
				<span class="pull-left col-xs-12"><a class="button" style="background-color:#26C281" href="http://new.entongproject.com/mail/validation/{{$book['bookingId']}}/approve/{{$book['bookingNumber']}}" id="">Accept</a></span>
				<span class="col-xs-12">
				<span class="pull-left col-xs-12"><a class="button" style="background-color:#e43a45" href="http://new.entongproject.com/mail/validation/{{$book['bookingId']}}/reject/{{$book['bookingNumber']}}" id="">Reject</a></span>
				</span>
				<div style="clear:both;"></div>
			</div>
		</div>
	</body>
</html>