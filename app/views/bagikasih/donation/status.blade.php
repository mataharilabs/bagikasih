@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<?php
// Includes Veritrans
include app_path().'/packages/veritrans/Veritrans.php';
// Veritans configuration
Veritrans_Config::$serverKey = 'VT-server-YN3xDgcjXol4o0mgbOs-A72D';
?>

<!-- Container  - mulai-->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
			
			</div>
		</div>
	</div>
	<div class="row">
		<?php
		switch($status_code){
			case"201":
				// Donasi UNPAID
				echo'
				<div class="panel-body col-lg-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-center">
								<h2 id="navbar">STATUS: UNPAID</h2>
								<i class="fa fa-money fa-5x"></i>
								<h3>Donasi ini belum lunas</h3>
								<p>Kami akan sangat senang bila anda berbesar hati untuk melunasi donasi ini</p>
								<h1>Rp ',number_format($donation->total,0,',','.'),'</h1>
								<a href="{{ $vtweb_url }}" class="btn btn-primary btn-lg btn-success">BAYAR DONASI</a><br/><br/>
							</div>
						</div>
					</div>
				</div>
				<div class="side-bar col-lg-3">
					
				</div>';
			break;
			case"200":
				// Donasi PAID
				echo'
				<div class="panel-body col-lg-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-center">
								<h2 id="navbar">STATUS: PAID</h2>
								<i class="fa fa-money fa-5x"></i>
								<h3>Donasi telah lunas<br/></h3>
								<p>Terima kasih atas partisipasi anda</p>
							</div>
						</div>
					</div>
				</div>';
			break;
			default:
				if(substr($status_code,0,1)==5){
					echo '<h3>ERROR WHEN CHECKING</h3>';
				} else {
					echo '<h3>STATUS: NOT FOUND or REMOVED</h3>';
				}
			break;
		}
		?>	
	</div>

<!-- Container  - selesai-->
</div>

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop