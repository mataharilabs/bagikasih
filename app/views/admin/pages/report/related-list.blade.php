<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			@if (isset($new))
				Daftar Laporan Yang Baru
			@else
				Daftar Laporan Yang Terkait
			@endif
		</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if (count($reports))
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Subyek</th>
					<th>Kepada</th>
					<th>Pelapor</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th width="15%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($reports as $report)
				<?php
				if ($report->have_responded == 1)
				{
					$class = '';
					$status = 'Telah Direspon';
				}
				else
				{
					$class = ' class="info"';
					$status = 'Belum Direspon';
				}
				?>
				<tr{{ $class }}>
					<td>
						@if ($report->subject_code == 1)
							Pengajuan update data
						@elseif ($report->subject_code == 2)
							Pelaporan data palsu
						@else
							Lainnya
						@endif
					</td>
					<td>
						@if (isset($report->type->social_target_category_id))
							Target Sosial : <a href="{{ route('admin.social-target.show', $report->type_id) }}">{{ $report->type->name }}</a>
						@elseif (isset($report->type->social_action_category_id))
							Aksi Sosial : <a href="{{ route('admin.social-action.show', $report->type_id) }}">{{ $report->type->name }}</a>
						@elseif (isset($report->type->event_category_id))
							Event : <a href="{{ route('admin.event.show', $report->type_id) }}">{{ $report->type->name }}</a>
						@endif
					</td>
					<td>
						@if (isset($report->user))
						<a href="{{ route('admin.user.show', $report->user->id) }}">
							{{ $report->user->firstname }} {{ $report->user->lastname }}
						</a>
						@else
						<em>Anonim</em>
						@endif
					</td>
					<td>
						{{ $status }}
					</td>
					<td>
						{{ date('d M Y H:i', $report->created_at->timestamp) }}
					</td>
					<td>
						<a href="{{ route('admin.report.show', $report->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Subyek</th>
					<th>Kepada</th>
					<th>Pembuat</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		@else
		<div class="callout callout-info">
			<p>
				@if (isset($new))
					Belum ada satupun Laporan yang baru.
				@else
					Belum ada satupun Laporan yang dibuat.
				@endif
			</p>
		</div>
		@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->