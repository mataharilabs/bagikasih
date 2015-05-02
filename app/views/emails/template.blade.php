<!DOCTYPE html>
<html>
<head>
	<title>Basic</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- offline placeholder. just for styleguide only. please don't integrating this to the programming. thx -->
	<script type="text/javascript" src="holder.min.js"></script>
	<!-- end of offline placeholder -->
	<style type="text/css">
		body {
			max-width: 800px;
			margin: 0 auto;
			background: #f9f9f9 url('{{ asset('assets/assets/img/header-bg.png') }}') top left repeat-x;}
		a:focus{inherit}
		.responsive-show {
			display: none;
		}

		@media only screen and (max-width: 480px){
			.responsive-hide{
				display: none;
			}
			.responsive-show {
				display: inherit;
			}
			.responsive-table{
				width: 100% !important;
			}
			.responsive-table.header {
				text-align: center;
				padding: 2px !important;
			}
			.responsive-table.header  td {
				float: none !important;
			}

		}
	</style>
</head>
<body>
<table align="center" width="90%" cellspacing="0" cellpadding="0" >
	<thead>
		<tr>
			<td style="padding: 28px 0 14px;">
				<table align="center" cellpadding="0" cellspacing="0" class="responsive-table header" style="width: 40%; float: left;">
					<tr>
						<td>
							<img src="{{ asset('assets/assets/img/bagikasih-logo-186x40.jpg') }}">
						</td>
					</tr>
				</table>
				<table align="center" cellpadding="0" cellspacing="0" class="responsive-table header" style="width: 60%; float: left; padding: 14px 8px;">
					<tr>
						<td style="color: #8999a8; font-family: sans-serif; font-size: 12px; float: right;">
							@if (isset($nid))
							You can't see this email? <a href="{{ route('lihat-newsletter', $nid) }}" style="color:#ed1847; text-decoration: none;">View it in your browser</a>
							@endif
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<table align="center" width="100%" cellpadding="0" cellspacing="0" style="background: #ffffff url('{{ asset('assets/assets/img/envelope-pattern.png') }}') repeat-x top; border: 1px solid #e0e5ea; padding: 30px 22px 20px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; color: #2c3e50; font-family: sans-serif; margin-bottom: 20px; font-size: 14px;">
					
					@section('message')
					@show

				</table>
			</td>
		</tr>
	</tbody>
	<tbody style="font-family: sans-serif; font-size: 12px; color: #999999; text-align: center;">
		<tr>
			<td style="padding: 0 12px; line-height: 18px;">
				You are receiving email from BagiKasih.com To unsubscribe <a href="#" style="text-decoration: none; color: #ed1848;">click here</a>. <span style="display: inline-block;">@2015 BagiKasih.com</span>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>