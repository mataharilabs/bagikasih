@if (count($events))
  @foreach ($events as $i => $event)
  
  @if ($i % 4 == 0)
  <div class="row">
  @endif
	
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            <div style="height: 210px; width: 100%; overflow: hidden;">
            <a href="{{ URL::route('lihat-event', $event->slug) }}">
            <img src="{{ url('photos') }}/thumb_{{ $event->default_photo_id ? $event->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a>
            </div>
          </p>
          <a href="{{ URL::route('lihat-event', $event->slug) }}">
          <h3>{{ $event->name }}</h3></a>
          <h4><b>{{ date('d M Y', $event->started_at) }}</h4></b>
          <p>
            @if ($event->started_at > time())
            <span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Akan datang</span>
            @elseif ($event->started_at < time() and $event->ended_at > time())
            <span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Sedang berjalan</span>
            @else
            <span class="label label-primary"><i class="fa fa-check-square"></i> Selesai</span>
            @endif
          </p>
          <p>
            <i class="fa fa-map-marker"></i> <a class="subtitle" href="{{ URL::route('temukan-event') . '?city=' . $event->city->id }}">{{ $event->city->name }}</a>
          </p>
        </div>
      </div>
  </div>
  
  @if (($i+1) % 4 == 0)
  </div>
  @endif

  @endforeach

  @if (count($events) % 4 != 0)
  </div>
  @endif

  @if (isset($input))
  <div class="col-lg-12 text-center">
      <ul class="pagination">
          <?php echo $events->appends($input)->links(); ?>
      </ul>
  </div>
  @endif

@else
<div class="alert alert-info" role="alert">Data tidak ditemukan</div>

@endif