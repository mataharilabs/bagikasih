<div class="col-lg-4 col-md-4 col-sm-6 hidden-xs">
	<div class="panel panel-default">
		<div class="panel-body">

			@if (count($photos) > 0)
				<a class="arrow-left" href="#"></a> 
				<a class="arrow-right" href="#"></a>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						
						<?php
						// get default photo
						if (isset($social_target->default_photo_id))
						{
							$default_photo_id = $social_target->default_photo_id;
						}
						else if (isset($social_action->default_photo_id))
						{
							$default_photo_id = $social_action->default_photo_id;
						}
						else if (isset($event->default_photo_id))
						{
							$default_photo_id = $event->default_photo_id;
						}

						// get cover photo
						if (isset($social_target->cover_photo_id))
						{
							$cover_photo_id = $social_target->cover_photo_id;
						}
						else if (isset($social_action->cover_photo_id))
						{
							$cover_photo_id = $social_action->cover_photo_id;
						}
						else if (isset($event->cover_photo_id))
						{
							$cover_photo_id = $event->cover_photo_id;
						}
						?>

						@if (isset($default_photo_id))
						{{-- prioritize the default photo --}}
						<div class="swiper-slide">
							<img style="width:100%; height:100%;" class="img-polaroid img-rounded" src="{{ url('photos') }}/{{ $default_photo_id }}.jpg">
						</div>
						@endif
					
						@foreach ($photos as $photo)
							@if ($photo->id != $default_photo_id and $photo->id != $cover_photo_id)
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