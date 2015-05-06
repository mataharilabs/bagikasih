@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') 
  @include('bagikasih.theme.navbar') 
@stop
@section('sidebar')

{{ HTML::style('jasny-bootstrap/css/jasny-bootstrap.min.css') }}
{{ HTML::script('jasny-bootstrap/js/jasny-bootstrap.min.js') }}
    <div class="container">

        <div class="row">
          <div class="col-lg-12">

            <div class="page-header">
              <h2 id="navbar">EDIT MY PROFILE</h2>
              <!-- <p>Edit Profile • <a href="#">Account Settings</a> • <a href="#">Aksi Sosial</a> • <a href="#">History Donasi</a></p> -->
              <p>Pengaturan Profil 
              • <a href="{{ URL::route('edit_settings') }}">Pengaturan Akun</a> 
              • <a href="{{ URL::route('lihat-profil', Auth::user()->slug) }}#aksi-sosial">Riwayat Aksi Sosial</a> 
              • <a href="{{ URL::route('riwayat-donasi') }}">Riwayat Donasi</a></p>

              <p>Profil BagiKasih Anda menunjukkan informasi yang lebih detail tentang profil Anda. Profil anda dapat menunjukkan kredibilitas Anda, sehingga orang lain ingin membantu aksi sosial yang anda buat. Jadi, pastikan untuk menggunakan foto profil yang baik, tuliskan cerita memukau tentang Anda</p>
            </div>
          </div>
        </div>

        @if(Session::has('success'))
        <div class="bs-example">
            <div class="alert alert-success alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success !</strong> {{ Session::get('success') }}
            </div>
        </div>
        @endif

        @if(Session::has('failed'))
        <div class="bs-example">
            <div class="alert alert-danger alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success !</strong> {{ Session::get('failed') }}
            </div>
        </div>
        @endif

        @if(Session::has('validation'))
        <div class="bs-example">
            <div class="alert alert-danger alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                @foreach($fail as $data)
                  <strong> {{ $data }} </strong> 
                @endforeach
            </div>
        </div>
        @endif

        {{ Form::open(array('route' => 'update_profile','method'=>'POST', 'files'=>true,'class'=>"form-horizontal")) }}
        <div class="row">
        <?php
          $birthday = date('d m Y', Auth::user()->birthday); 
          $birthday = explode(' ', $birthday);
        ?>
        
          <div class="panel-body col-lg-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="max-width:100%;height:auto;">
                      <img data-src="" src="{{ $photo == false ? '/assets/assets/img/ava.png' : '/photos/'.$photo[0]->id.'.jpg' }}">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="file" ></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
          </div>  
          
          <div class="panel-body col-lg-9">
              <div class="panel panel-default">
                <div class="panel-body">


                    <div class="col-lg-9">
                    <h2 id="navbar">Hey, {{ Auth::user()->firstname }}</h2><hr>

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
                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                        <!-- <input class="form-control" type="text" placeholder="" name="city"> -->
                        <select class="form-control" name="city_id">
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
                      <select name="month" class="form-control" id="select">
                                              <option value="1" {{ $birthday[1] == 1 ? 'selected="selected"' : '' }}>JAN</option>
                                              <option value="2" {{ $birthday[1] == 2 ? 'selected="selected"' : '' }}>FEB</option>
                                              <option value="3" {{ $birthday[1] == 3 ? 'selected="selected"' : '' }}>MAR</option>
                                              <option value="4" {{ $birthday[1] == 4 ? 'selected="selected"' : '' }}>APR</option>
                                              <option value="5" {{ $birthday[1] == 5 ? 'selected="selected"' : '' }}>MAY</option>
                                              <option value="6" {{ $birthday[1] == 6 ? 'selected="selected"' : '' }}>JUN</option>
                                              <option value="7" {{ $birthday[1] == 7 ? 'selected="selected"' : '' }}>JUL</option>
                                              <option value="8" {{ $birthday[1] == 8 ? 'selected="selected"' : '' }}>AUG</option>
                                              <option value="9" {{ $birthday[1] == 9 ? 'selected="selected"' : '' }}>SEP</option>
                                              <option value="10" {{ $birthday[1] == 10 ? 'selected="selected"' : '' }}>OCT</option>
                                              <option value="11" {{ $birthday[1] == 11 ? 'selected="selected"' : '' }}>NOV</option>
                                              <option value="12" {{ $birthday[1] == 12 ? 'selected="selected"' : '' }}>DEC</option>
                      </select>
                    </div>               
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="date" class="form-control" id="select">
                                    @for($i=1;$i<=31;$i++)
                                      <option value="{{ $i }}" {{ $birthday[0] == $i ? 'selected="selected"' : '' }}> {{ $i }}</option>
                                    @endfor
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="year" class="form-control" id="select">
                                    @for($i=2001;$i>=1900;$i--)
                                      <option value="{{ $i }}" {{ $birthday[2] == $i ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                      </select>
                    </div>
                  </div>

                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">About Me</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="description" id="textArea">{{ Auth::user()->description }}</textarea>
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

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop