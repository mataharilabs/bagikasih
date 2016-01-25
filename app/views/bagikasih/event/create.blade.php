@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar')
@include('bagikasih.theme.navbar')
@stop
@section('sidebar')
{{ HTML::style('jasny-bootstrap/css/jasny-bootstrap.min.css') }}
{{ HTML::script('jasny-bootstrap/js/jasny-bootstrap.min.js') }}
{{ HTML::script('js/event.js') }}

<script type="text/javascript">
    var user_id = "{{ !empty(Auth::user()->id) ? Auth::user()->id : 'update-event' }}";
</script>
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
            
            <div class="alert alert-danger" id="loginfailure" role="alert" style="display:none;"></div>
            <div class="alert alert-success" id="sukses" role="alert" style="display:none;"></div>
            
            @if(Session::has('gagal'))
            <div class="alert alert-danger" id="gagal" role="alert" >
                {{ Session::get('gagal') }}
            </div>
            @endif

            @if(Session::has('sukses'))
            <div class="alert alert-success" id="sukses" role="alert" >
                {{ Session::get('sukses') }}
            </div>
            @endif
            <!-- <div class="bs-example">
              <div class="alert alert-success alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success !</strong> {{ Session::get('success') }}
              </div>
            </div> -->
           
            <div class="panel-body" id="createEvent">
            <h2 id="navbar">Daftarkan Event</h2>
              <div class="col-lg-9">
                <form class="form-horizontal" onsubmit="return create_event(this);" id="createEvent_form">
                <fieldset>
                  <input class="form-control" style="display:none;" type="text" name="user_id" id="user_id" value="{{ !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Event Category</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <select class="form-control" name="event_category_id" id="event_category_id">
                          @foreach($event_category as $db):
                          <option value="{{ $db['id'] }}">{{ $db['name'] }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">City</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <select class="form-control" name="city_id" id="city_id">
						  @foreach($city as $citys):
						  <option value="{{ $citys->id }}">
							{{ $citys->name }}
						  </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Name</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        {{ Form::text('name',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'Name',
                          'id' => 'name',
                        )) }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Description</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      {{ Form::textarea('description',null,array(
                          'class' => 'form-control',
                          'id' => 'description',
                          'rows' => 3
                      )) }}
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Stewardship</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      {{ Form::textarea('stewardship',null,array(
                          'class' => 'form-control',
                          'id' => 'stewardship',
                          'rows' => 3
                      )) }}
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Location</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow fa-fw"></i></span>
                        {{ Form::text('location',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'Location',
                          'id' => 'location',
                        )) }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Email</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                         {{ Form::text('email',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'Email',
                          'id' => 'email',
                        )) }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Website Url</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-link fa-fw"></i></span>
                        {{ Form::text('website_url',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'Website',
                          'id' => 'website_url',
                        )) }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Social Media Url</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></span>
                        {{ Form::text('social_media_urls',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'Social Media URL'
                        )) }}
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Event</label>
                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-5">
                      <div class='input-group date' id='start_date'  >
                        {{ Form::text('start_date',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'Start date'
                        )) }}
                        <span class="input-group-addon">
                        <span class="fa fa-calendar fa-fw"></span>
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-5 pull-right" >
                      <div class='input-group date' id='end_date' >
                         {{ Form::text('end_date',null,array(
                          'class' => 'form-control',
                          'placeholder' => 'End date'
                        )) }}
                        <span class="input-group-addon">
                        <span class="fa fa-calendar fa-fw"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-success" style="width:100%;"><i class="fa fa-calendar"></i> Save Event</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>

            <!-- <div class="panel-body" id="signin" style="display:none;">
              <div class="col-lg-9">
                  @include('bagikasih.event.signin')
              </div>
            </div>

            <div class="panel-body" id="signup" style="display:none;">
              <div class="col-lg-9">
                  @include('bagikasih.event.signup')
              </div>
            </div> -->
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
  $(function () {
      $('#start_date').datetimepicker();
      $('#end_date').datetimepicker();
  });
  </script>
  
  @stop
  @section('footer')
  @include('bagikasih.theme.footer')
  @stop