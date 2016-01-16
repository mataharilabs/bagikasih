@if (count($social_targets))
  @foreach ($social_targets as $i => $social_target)
  
  @if ($i % 4 == 0)
  <div class="row">
  @endif
	
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  <div class="panel panel-default">
	    <div class="panel-body">
        <a href="{{ URL::route('lihat-target-sosial', $social_target->slug) }}">
	      <h2>{{ $social_target->name }}</h2></a>
	      <p>
          <a class="subtitle" href="{{ URL::route('temukan-target-sosial') . '?category=' . $social_target->category->id }}">{{ $social_target->category->name }}</a> 
          @if ($social_target->total_running_social_actions > 0)<span class="label label-success">{{ $social_target->total_running_social_actions }} Aksi sosial yang berjalan</span> @endif
        </p>
	      <p>
          <div style="height: 210px; width: 100%; overflow: hidden;">
          <a href="{{ URL::route('lihat-target-sosial', $social_target->slug) }}">
          <img src="{{ url('photos') }}/{{ $social_target->default_photo_id ? 'thumb_'.$social_target->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a>
          </div>
        </p>
	      <p>
          <i class="fa fa-map-marker"></i> <a class="subtitle" href="{{ URL::route('temukan-target-sosial') . '?city=' . $social_target->city->id }}">{{ $social_target->city->name }}</a>
        </p>
	    </div>
	  </div>
	</div>
  
  @if (($i+1) % 4 == 0)
  </div>
  @endif

  @endforeach

  @if (count($social_targets) % 4 != 0)
  </div>
  @endif

  @if (isset($input))
  <div class="col-lg-12 text-center">
      <ul class="pagination">
          <?php echo $social_targets->appends($input)->links(); ?>
      </ul>
  </div>
  @endif

@else
<div class="alert alert-info" role="alert">Data tidak ditemukan</div>

@endif