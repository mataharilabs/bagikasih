@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<!-- Container  - mulai-->
    <div class="container">

<!-- Headline  - mulai-->
        <div class="row">
          <div class="col-lg-12"  align="center">

            <div class="page-header">
              <h2 id="navbar">Daftar Target Sosial</h2>
              <p>BagiKasih.com telah mengumpulkan dan menverifikasi target sosial mulai dari yayasan sosial, panti asuhan hingga panti jompo untuk memudahkan aksi sosial Anda.</p>
            </div>
            
          </div>
        </div>
<!-- Headline - selesai-->

        <!-- search bar - mulai  -->
        <div class="row">
          <div class="col-lg-12">       

              <div class="navbar navbar-default">

              	{{ Form::open(array('route' => 'temukan-target-sosial', 'method' => 'get')) }}

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="navbar-collapse collapse navbar-responsive-collapse" style="margin-top:5px;">   
                <label for="select" class="col-lg-1 col-md-1 col-sm-1 control-label" style="color:#fff; margin-top:8px;">Kategori: </label>                 
                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                      <select class="form-control" id="select" name="category">
                        <option value="all">Semua</option>
                        
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (isset($input['category']) and $category->id == $input['category']) selected @endif>{{ $category->name }}</option>
                        @endforeach

                      </select>
                    </div>

                <label for="select" class="col-lg-1 col-md-1 col-sm-1 control-label" style="color:#fff; margin-top:8px;">Kota: </label>                 
                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                      <select class="form-control" id="select" name="city">
                        <option value="all">Semua</option>
                        
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @if (isset($input['city']) and $city->id == $input['city']) selected @endif>{{ $city->name }}</option>
                        @endforeach

                      </select>
                    </div>

                <label for="select" class="col-lg-1 col-md-1 col-sm-1  control-label" style="color:#fff; margin-top:8px;">Kata Kunci:</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                      <input type="text" class="form-control" id="inputEmail" placeholder="Kata Kunci" name="q" value="{{ isset($input['q']) ? $input['q'] : '' }}">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 ">
                      <input type="submit" class="btn btn-primary" value="Cari" >
                    </div>
                </div>

                {{ Form::close() }}

              </div>              
              <!-- Search Bar - Selesai -->

          </div>
        </div>
        <!-- Search Bar - Selesai -->

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
                  <a href="{{ URL::route('lihat-target-sosial', $social_target->slug) }}">
                  <img src="photos/{{ $social_target->default_photo_id ? $social_target->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a>
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

          <div class="col-lg-12 text-center">
              <ul class="pagination">
                  <?php echo $social_targets->appends($input)->links(); ?>
              </ul>
          </div>
		    
        @else
			  <div class="alert alert-info" role="alert">Data tidak ditemukan</div>
		    
        @endif

    </div>
<!-- Container - selesai-->

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop