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
              <h2 id="navbar">Daftar Aksi Sosial</h2>
              <p>Aksi-aksi sosial yang membutuhkan bantuan Anda untuk mewujudkannya, atau Anda juga bisa membuat aksi serupa untuk berbagai target sosial yang sudah ada.</p>
            </div>
            
          </div>
        </div>
<!-- Headline - selesai-->

        <!-- search bar - mulai  -->
        <div class="row">
          <div class="col-lg-12">       

              <div class="navbar navbar-default">

              	{{ Form::open(array('route' => 'temukan-aksi-sosial', 'method' => 'get')) }}

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
                      <input type="text" class="form-control" id="inputEmail" placeholder="Kata Kunci" name="q" value="@if (isset($input['q'])) {{ $input['q'] }} @endif">
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
                    <img src="photos/{{ $social_action->default_photo_id ? $social_action->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;">
                    </a>
                  </p>
                  <a href="aksi-sosial">
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
                  <h4><b>{{ $social_action->currency }} {{ number_format($social_action->   total_donation,0,',','.') }}</h4></b>
                  <p>Terkumpul dari kebutuhan dana
                  <br>{{ $social_action->currency }} {{ number_format($social_action->   total_donation_target,0,',','.') }}</p>
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
		    
        @else
			  <div class="alert alert-info" role="alert">Data tidak ditemukan</div>
		    
        @endif

    </div>
<!-- Container - selesai-->

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop