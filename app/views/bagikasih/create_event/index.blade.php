@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar')
@include('bagikasih.theme.navbar')
@stop
@section('sidebar')
{{ HTML::style('jasny-bootstrap/css/jasny-bootstrap.min.css') }}
{{ HTML::script('jasny-bootstrap/js/jasny-bootstrap.min.js') }}
<div class="container">
  <!-- Headline  - mulai-->
  <div class="row">
    <div class="col-lg-12"  align="center">
      <div class="page-header">
      </div>
    </div>
  </div>
  <!-- Headline - selesai-->
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      @include('bagikasih.event.menu')
      <div class="col-lg-9">
        <div class="panel panel-default">
          <div class="panel-body">
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
            <h2 id="navbar">Daftarkan Event</h2>
            {{ Form::open(array('route' => 'update_profile','method'=>'POST', 'files'=>true,'class'=>"form-horizontal")) }}
            <div class="panel-body">
              <div class="col-lg-9">
                <fieldset>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                      <input class="form-control" type="text" placeholder="firstname" name="firstname" value="">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                      <input class="form-control" type="text" placeholder="lastname" name="lastname" value="">
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Email</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Email Address" name="email" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Phone Number</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="Phone number" name="phone" value="">
                      </div>
                    </div>
                  </div>
                  <hr>Additional info<p>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">BagiKasih URL</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i>{{ url() }}</span>
                        <input class="form-control" type="text" placeholder="URL" name="url" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Kota</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <!-- <input class="form-control" type="text" placeholder="" name="city"> -->
                        <select class="form-control" name="city_id">
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Birthday</label>
                    <div class="col-lg-3 col-md-3col-sm-3 col-xs-3">
                      <select name="month" class="form-control" id="select">
                        
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="date" class="form-control" id="select">
                        
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="year" class="form-control" id="select">
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">About Me</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="description" id="textArea"></textarea>
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
</div>
@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop