@if (count($social_actions))
  @foreach ($social_actions as $i => $social_action)
  
  @if ($i % 4 == 0)
  <div class="row">
  @endif
	
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            <a href="{{ URL::route('lihat-aksi-sosial', $social_action->slug) }}">
            <img src="{{ url('photos') }}/{{ $social_action->default_photo_id ? $social_action->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;">
            </a>
          </p>
          <a href="{{ URL::route('lihat-aksi-sosial', $social_action->slug) }}">
          <h3>{{ $social_action->name }}</h3></a>
      <div class="progress progress-striped @if ($social_action->expired_at > time()) active @endif">
        <?php
        $percentage = ($social_action->total_donation / $social_action->total_donation_target) * 100;
        ?>

        @if ($percentage < 100)
        <div class="progress-bar progress-bar-success" style="width: {{$percentage}}%"></div>
        @else
        <div class="progress-bar" style="width: 100%"></div>
        @endif
      </div>
          <h4><b>{{ $social_action->currency }} {{ number_format($social_action->total_donation,0,',','.') }}</b></h4>
          <p>Terkumpul dari kebutuhan dana
          <br>{{ $social_action->currency }} {{ number_format($social_action->total_donation_target,0,',','.') }}</p>
          <p>
            @if ($social_action->expired_at > time())
            <span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Masih berjalan</span>
            @else
            <span class="label label-primary"><i class="fa fa-check-square"></i> Selesai</span>
            @endif
          </p>
        </div>
      </div>
  </div>
  
  @if (($i+1) % 4 == 0)
  </div>
  @endif

  @endforeach

  @if (count($social_actions) % 4 != 0)
  </div>
  @endif

  @if (isset($input))
  <div class="col-lg-12 text-center">
      <ul class="pagination">
          <?php echo $social_actions->appends($input)->links(); ?>
      </ul>
  </div>
  @endif

@else
<div class="alert alert-info" role="alert">Data tidak ditemukan</div>

@endif