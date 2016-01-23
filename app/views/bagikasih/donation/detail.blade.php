@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<?php
// about donation object
if (isset($donation->type->social_action_category_id))
{
	$type_name = 'Aksi Sosial';
	$type_url = URL::route('temukan-aksi-sosial');
}
else
{
	$type_name = 'Target Sosial';
	$type_url = URL::route('temukan-target-sosial');
}

// about donation status
if ($donation->status == 0 and $donation->payment_id == null)
{
	$status = '<a href="'.URL::route('riwayat-donasi').'">Menunggu konfirmasi dari Anda</a>';
}
else if ($donation->status == 0)
{
	$status = 'Menunggu pemeriksaan dari admin';
}
else if ($donation->status == 1)
{
	$status = 'Donasi berhasil';
}
?>

<!-- Container  - mulai-->
<div class="container">

	<!-- Headline  - mulai-->
	<div class="row">
		<div class="col-lg-12"  align="center">
			<div class="page-header">
			</div>

		</div>
	</div>
	<!-- Headline - selesai-->

	<div class="row">

		<div class="panel-body col-lg-9 col-centered">
			<div class="panel panel-default">
				<div class="panel-body">

					<!-- general information col -mulai -->
					<div class="col-lg-12  col-md-6 col-sm-6 col-xs-12 text-center">

						<h2 id="navbar">Terima kasih!</h2>
						<i class="fa fa-thumbs-o-up fa-5x"></i>
						<h3>1 Langkah Lagi Untuk Proses Donasi </h3>
					</div>

					<div class="col-lg-12">
						<p>Kami telah mengirimkan e-mail mengenai detail donasi aksi sosial Anda ke <b>{{ $donation->user->email }}</b>. Silahkan melakukan pengiriman dana donasi ke rekening yang tercantum pada email yang telah kami kirim.</p>

						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>#</th>
									<th>Donatur</th>
									<th>Penerima</th>
									<th>Jumlah Donasi</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<?php
									if(Auth::check()){
										echo'<td>',$donation->user->firstname,' ',$donation->user->lastname,'</td>';
									} else {
										$donatur = User::where('id',$donation->user_id);
										if($donatur->count() > 0){
											$donatur = $donatur->first();
											echo'<td>',$donatur['email'],'</td>';
										}
									}
									?>
									
									<td>{{ $donation->type->name }}</td>
									<td>{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}</td>
									<td>{{ $status }}</td>
								</tr>
							</tbody>
						</table> 

						<p>Histori donasi akan tampil pada halaman {{ $type_name }} setelah Anda melakukan konfirmasi pengiriman dana donasi melalui halaman <a href="{{ URL::route('riwayat-donasi') }}">Riwayat Donasi</a> atau melalui SMS langsung ke +62 8170 393 0034</p>

						<p>Jika target proyek ini tercapai, dana dukungan Anda akan disalurkan kepada pihak yang bersangkutan. Salam hangat, Care, Love and Share.</p>

						<p>Tim Bagikasih</p>

						<center><a href="{{ $type_url }}" class="btn btn-primary">{{ $type_name }} Lainnya</a>  atau <a href="{{ URL::route('riwayat-donasi') }}" class="btn btn-primary">Lihat Riwayat Donasi</a>
					</div>

				</div>
			</div>
		</div>  

	</div>

<!-- Container  - selesai-->
</div>

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop