<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Daftar Foto Yang Terkait</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	@if (count($photos))
	<div class="box-body row">
		@foreach ($photos as $photo)

			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="{{ url('photos') }}/{{ $photo->id }}.jpg">
                    <img class="img-responsive" src="{{ url('photos') }}/{{ $photo->id }}.jpg" alt="">
                </a>
            </div>
			
			@endforeach
	@else
	<div class="box-body">
		<div class="callout callout-info">
			<p>Belum ada satupun Foto yang dibuat.</p>
		</div>
	@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->