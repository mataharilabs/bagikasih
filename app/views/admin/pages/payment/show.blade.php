@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12">

		@if (Session::has('success') and Session::get('success'))
		<div class="alert alert-success alert-dismissable">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<h4>	<i class="icon fa fa-check"></i> {{ Session::get('message') }}</h4>
		</div>
		@elseif (Session::has('success') and Session::get('success') == false)
		<div class="alert alert-info alert-dismissable">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<h4><i class="icon fa fa-info"></i> {{ Session::get('message') }}</h4>
		</div>
		@endif

		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <b>{{ $title }}</b></h3>
				</div><!-- /.box-header -->
			<div class="box-body">
				<?php
				if ($payment->status == 1)
				{
					$status = 'Pembayaran berhasil';
				}
				else if ($payment->status == 0)
				{
					$status = 'Menunggu pemeriksaan admin';
				}
				else if ($payment->status == 2)
				{
					$status = 'Pembayaran dibatalkan';
				}
				?>
				<table id="datatable" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $payment->id }}</td>
						</tr>
						<tr>
							<th>Nama Pembayar</th>
							<td>
								<a href="{{ route('admin.user.show', $payment->user->id) }}">
								{{ $payment->user->firstname }} {{ $payment->user->lastname }}
								</a>
							</td>
						</tr>
						<tr>
							<th>Donasi Pada</th>
							<td>
								@foreach ($payment->donations as $i => $donation)
									{{ ($i+1) }}. 
									<a href="{{ route('admin.donation.show', $donation->id) }}">
									@if (isset($donation->type->social_target_category_id))
										Target Sosial : {{ $donation->type->name }}
									@else
										Aksi Sosial : {{ $donation->type->name }}
									@endif
									, sebesar {{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}
									</a><br />
								@endforeach
							</td>
						</tr>
						<tr>
							<th>Total Pembayaran</th>
							<td>
								{{ $payment->currency }} {{ number_format($payment->total,0,',','.') }}
							</td>
						</tr>
						<tr>
							<th>Ke No Rekening</th>
							<td>
								{{ $payment->to_bank }}
							</td>
						</tr>
						<tr>
							<th>Melalui No Rekening</th>
							<td>
								<div>{{ $payment->bank_name }} {{ $payment->bank_account }}</div>
								<div>a/n {{ $payment->bank_account_name }}</div>
							</td>
						</tr>
						<tr>
							<th>Dibayar Pada</th>
							<td>{{ date('d M Y H:i:s', $payment->transferred_at) }}</td>
						</tr>
						<tr>
							<th>Pesan</th>
							<td>
								{{ nl2br($payment->message) }}
							</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								{{ $status }}
							</td>
						</tr>
						<tr>
							<th>Dibuat Pada</th>
							<td>{{ date('d M Y H:i:s', $payment->created_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Diubah Pada</th>
							<td>{{ date('d M Y H:i:s', $payment->updated_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Aksi</th>
							<td>
								@if ($payment->status == 0)
								<a href="#" data-toggle="modal" data-target="#approve-modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Setuju</a>
								<a href="#" data-toggle="modal" data-target="#reject-modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Batal</a>
								@endif
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</div>
</div>

<! -- include modal of payment -->
@include('admin.pages.payment.modal', array('payment_id'=>$payment->id))

@stop