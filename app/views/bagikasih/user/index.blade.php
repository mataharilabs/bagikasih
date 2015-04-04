@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<!-- Container  - mulai-->
<div class="container">

	<div class="row">
		<div class="col-lg-12"  align="center">
			<div class="page-header">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="panel-body col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<p><img style="max-width:100%;height:auto;" class="img-polaroid img-rounded" src="photos/{{ $user->default_photo_id ? $user->default_photo_id : 'default' }}.jpg"></p>
				</div>
			</div>
		</div>

		<div class="panel-body col-lg-9">
			<div class="panel panel-default">
				<div class="panel-body">

					<!-- general information col -mulai -->
					<div class="col-lg-9">
						<h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
						<p><i class="fa fa-map-marker"></i> {{ $user->city->name }}</p>
						<hr>
						<h4>Tentang saya</h4>
						<p>
							@if ($user->description)
								{{ $user->description }}
							@else
								<em>Belum dideskripsikan</em>
							@endif
						</p>

						<hr>
						<h4>Aktivitas Sosial</h4>
						<div style="width:100%; height: 300px; overflow-y: scroll;">
						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>Aktivitas</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($activities as $date => $activity)
								<tr>
									<td>
										<b>{{ $user->firstname }} {{ $user->lastname }}</b> 
										<?php
										if ($activity['type'] == 'social_target')
										{
											echo 'menambah Target Sosial <a href="'.URL::route('lihat-target-sosial', $activity['object_slug']).'">'.$activity['object_name'].'</a>';
										}
										else if ($activity['type'] == 'social_action')
										{
											echo 'membuat Aksi Sosial <a href="'.URL::route('lihat-aksi-sosial', $activity['object_slug']).'">'.$activity['object_name'].'</a>';
										}
										else if ($activity['type'] == 'event')
										{
											echo 'membuat Event <a href="'.URL::route('lihat-event', $activity['object_slug']).'">'.$activity['object_name'].'</a>';
										}
										else if ($activity['type'] == 'donation')
										{
											if ($activity['object_type'] == 'social_targets')
											{
												echo 'donasi untuk <a href="'.URL::route('lihat-target-sosial', $activity['object_slug']).'">'.$activity['object_name'].'</a>';
											}
											else if ($activity['object_type'] == 'social_actions')
											{
												echo 'donasi untuk aksi sosial <a href="'.URL::route('lihat-aksi-sosial', $activity['object_slug']).'">'.$activity['object_name'].'</a>';
											}
										}
										?>
									</td>
									<td>{{ date('d/M/Y', $date) }}</td>
								</tr>
								@endforeach
								<tr class="success">
									<td><b>{{ $user->firstname }} {{ $user->lastname }}</b> bergabung dengan BagiKasih.com</td>
									<td>{{ date('d/M/Y', $user->created_at->timestamp) }}</td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

<!-- Container  - selesai-->
</div>

{{ HTML::script('js/credential.js'); }}
@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop