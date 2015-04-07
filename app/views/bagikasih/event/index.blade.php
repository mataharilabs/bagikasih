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
              <h2 id="navbar">Daftar Event</h2>
              <p>Anda dapat mengadakan aksi sosial anda pada event-event menarik di bawah ini. <br>Mengadakan aksi sosial pada sebuah event tentu sangat efektif dan membantu aksi sosial kamu segera terwujud.</p>
            </div>
            
          </div>
        </div>
<!-- Headline - selesai-->

        <!-- search bar - mulai  -->
        <div class="row">
          <div class="col-lg-12">       

              <div class="navbar navbar-default">

              	{{ Form::open(array('route' => 'temukan-event', 'method' => 'get')) }}

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

        <!-- Event List -->
        @include('bagikasih.event.list')
        <!-- Event List - Selesai -->

    </div>
<!-- Container - selesai-->

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop