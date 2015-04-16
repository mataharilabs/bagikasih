  <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 id="navbar">Daftar Donatur</h2>
        </div>
      </div>
  </div>
  @foreach($donations as $value)
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <p><img src="{{ $value['as_noname'] == 1 ? '/photos/default.jpg' : ($value['user']['default_photo_id'] === NULL ? '/photos/default.jpg' : '/photos/'.$value['user']['default_photo_id'].'.jpg')  }}" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
        <h2>{{ $value['as_noname'] == 1 ? 'Anonymous' : $value['user']['firstname'] }}</h2></a>
        mendonasikan
        <h4><b>{{ $value['currency'] == 'IDR' ? 'Rp.' : $value['currency'] }} {{ number_format($value['total'], 2, ',', '.') }}</h4></b>
        <p><i class="fa fa-clock-o"></i>17 Agustus 2014</p>
      </div>
    </div>
  </div>
  @endforeach
