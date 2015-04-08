<div class="col-lg-4 col-md-4 col-sm-6 hidden-xs">
	<div class="panel panel-default">
		<div class="panel-body">

			@if (count($photos) > 0)
				<a class="arrow-left" href="#"></a> 
				<a class="arrow-right" href="#"></a>
				<div class="swiper-container">
					<div class="swiper-wrapper">

						{{-- prioritize the default photo --}}
						@if ($social_target->default_photo_id)
						<div class="swiper-slide">
							<img style="width:100%; height:100%;" class="img-polaroid img-rounded" src="{{ url('photos') }}/{{ $social_target->default_photo_id }}.jpg">
						</div>
						@endif
					
						@foreach ($photos as $photo)
							@if ($photo->id != $social_target->default_photo_id and $photo->id != $social_target->cover_photo_id)
							<div class="swiper-slide">
								<img style="width:100%; height:100%;" class="img-polaroid img-rounded" src="{{ url('photos') }}/{{ $photo->id }}.jpg">
							</div>
							@endif
						@endforeach
					
					</div>
				</div>
				<div class="pagination"></div>
			@else
				<img style="width:100%; height:100%;" class="img-polaroid img-rounded" src="{{ url('photos') }}/default.jpg">
			@endif

		</div>
	</div>
</div>