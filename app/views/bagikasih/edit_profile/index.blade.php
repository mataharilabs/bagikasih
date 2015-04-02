@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') 
  @if(Auth::check())
    @include('bagikasih.theme.navbar-logged-in') 
  @else
    @include('bagikasih.theme.navbar') 
  @endif
@stop
@section('sidebar')

    <div class="container">

        <div class="row">
          <div class="col-lg-12">

            <div class="page-header">
              <h2 id="navbar">EDIT MY PROFILE</h2>
              <p>Edit Profile • <a href="#">Account Settings</a> • <a href="#">Aksi Sosial</a> • <a href="#">History Donasi</a></p>
              <p>Profil BagiKasih Anda menunjukkan informasi yang lebih detail tentang profil Anda. Profil anda dapat menunjukkan kredibilitas Anda, sehingga orang lain ingin membantu aksi sosial yang anda buat. Jadi, pastikan untuk menggunakan foto profil yang baik, tuliskan cerita memukau tentang Anda</p>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="panel-body col-lg-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="/assets/assets/img/ava.png" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <p><a href="#">Change Profile Photo</a></p>
                </div>
              </div>
          </div>  

          <div class="panel-body col-lg-9">
              <div class="panel panel-default">
                <div class="panel-body">


                    <div class="col-lg-9">
                    <h2 id="navbar">Hey, {{ Auth::user()->firstname }}</h2><hr>

              <form class="form-horizontal">
                <fieldset>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama</label>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                       <input class="form-control" type="text" placeholder="firstname" name="firstname" value="{{ Auth::user()->firstname }}">
                    </div>               
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                       <input class="form-control" type="text" placeholder="lastname" name="lastname" value="{{ Auth::user()->lastname }}">
                    </div>
                  </div>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Email</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Email Address" name="email" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                  </div>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Phone Number</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Phone number" name="phone" value="{{ Auth::user()->phone_number }}">
                      </div>
                    </div>
                  </div>


                  <hr>Additional info<p>

                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">BagiKasih URL</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i>{{ url() }}</span>
                        <input class="form-control" type="text" placeholder="URL" name="url" value="{{ Auth::user()->slug }}">
                      </div>
                    </div>

                  </div>

                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Kota</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <!-- <input class="form-control" type="text" placeholder="" name="city"> -->
                        <select class="form-control" id="select">
                            @foreach($city as $db):
                                <option value="{{ $db['id'] }}" {{ Auth::user()->city_id == $db['id'] ? 'selected="selected"' : '' }}>{{ $db['name'] }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                  </div>


                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Birthday</label>
                     <div class="col-lg-3 col-md-3col-sm-3 col-xs-3">
                      <select name="birthdate_month" class="form-control" id="select">
                                              <option value="1">JAN</option>
                                              <option value="2">FEB</option>
                                              <option value="3">MAR</option>
                                              <option value="4">APR</option>
                                              <option value="5">MAY</option>
                                              <option value="6">JUN</option>
                                              <option value="7">JUL</option>
                                              <option value="8">AUG</option>
                                              <option value="9">SEP</option>
                                              <option value="10">OCT</option>
                                              <option value="11">NOV</option>
                                              <option value="12">DEC</option>
                      </select>
                    </div>               
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="birthdate_date" class="form-control" id="select">
                                    @for($i=1;$i<=31;$i++)
                                      <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="birthdate_year" class="form-control" id="select">
                                    @for($i=2001;$i>=1900;$i--)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                      </select>
                    </div>
                  </div>

                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">About Me</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" id="textArea">{{ Auth::user()->description }}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-cog"></i>  Save Profile</button>
                    </div>
                  </div>

                </fieldset>
              </form>

                    </div>

                </div>
              </div>
          </div>  


        </div>


    </div>

{{ HTML::script('js/credential.js'); }}
@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop