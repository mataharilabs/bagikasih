@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar')
@include('bagikasih.theme.navbar')
@stop
@section('sidebar')
{{ HTML::style('jasny-bootstrap/css/jasny-bootstrap.min.css') }}
{{ HTML::script('jasny-bootstrap/js/jasny-bootstrap.min.js') }}
<script type="text/javascript">
var user_id = "{{ !empty(Auth::user()->id) ? Auth::user()->id : 'update-event' }}";
</script>
<div class="container">
  <br />
  <br />
  <br />
  <br />
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        Menu<p>
        </p><ul>
          <li><b>Buat Aksi Sosial</b></li>
        </ul></div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="panel panel-default">
        <div class="panel-body">
          @if(Session::has('validasi'))
          <div class="alert alert-danger">
            @foreach(Session::get('validasi') as $err)
            <p>{{ $err }}</p>
            @endforeach
          </div>
          @endif

          
          @if(Session::has('sukses'))
          <div class="alert alert-success" id="sukses" role="alert" >
              {{ Session::get('sukses') }}
          </div>
          @endif


          {{ Form::open(['route'=> $action,'files' => true,'class' => 'form-horizontal']) }}
          <fieldset>
            <h3 class="box-title">Tambah Aksi Sosial Baru</h3>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Aksi sosial untuk:</label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                <select class="form-control" name="social_target_id">
                  @foreach($social_target as $social_targets):
                  <option value="{{ $social_targets->id }}"
                    {{ Session::has('type_name') && Session::get('type_id') == $social_targets->id ? 'selected' : '' }}>
                    {{ $social_targets->name }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <select class="form-control" name="social_action_category_id">
                  @foreach($social_action_category as $social_action_categorys):
                  <option value="{{ $social_action_categorys->id }}"
                    {{ count($social_action) > 0 && $social_action->social_action_category_id == $social_action_categorys->id ? 'selected' : '' }}>
                    {{ $social_action_categorys->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <hr>Detail tentang aksi sosial <p>
            </p>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama aksi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				{{ Form::text('name',null,array(
						"class" => "form-control",
						"id" => "name",
						"placeholder" => "Misal: Perbaikan meja belajar untuk Panti..."
					))
				}}
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Kota</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="city_id">
                  @foreach($city as $citys):
                  <option value="{{ $citys->id }}"
                    {{ count($social_action) > 0 && $social_action->city_id == $citys->id ? 'selected' : '' }}>
                    {{ $citys->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Deskripsi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				{{ Form::textarea('description',null,array(
						"class" => "form-control",
						"id" => "description",
						"rows" => 3,
					))
				}}
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Kepengurusan</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				{{ Form::textarea('stewardship',null,array(
						"class" => "form-control",
						"id" => "stewardship",
						"rows" => 3,
					))
				}}
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Deskripsi Bank Akun Donasi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				{{ Form::textarea('bank_account_description',null,array(
						"class" => "form-control",
						"id" => "bank_account_description",
						"rows" => 3,
					))
				}}
              </div>
            </div>
			@if(!Auth::check())
			<div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Email</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
          {{ Form::email('email',null,array(
            'placeholder' => 'Email',
            'class' => 'form-control',
            'id' => 'email'
          )); }}
                </div>
              </div>
            </div>
			@else
				<input type="hidden" name="email" value="{{ Auth::user()->email }}"/>
			@endif
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Butuh dana</label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                {{ Form::select('currency', array('IDR' => 'Rupiah (IDR)','USD' => 'Dollar (USD)'),null,array(
                  'id'=>'currency',
                  'class'=>'form-control'
                )); }}
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                  {{ Form::number('total_donation_target',null,array(
                    'class' => 'form-control',
                    'id' => 'total_donation_target'
                  )); }}
                </div>
              </div>
            </div>
            
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Foto Aksi social</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="input-group">
                  <input type="file" name="default_photo_id[]" id="default_photo_id" multiple>
                </div>
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Cover Aksi Sosial</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="input-group">
                  <input type="file" name="cover_photo_id" id="cover_photo_id">
                </div>
              </div>
            </div>

            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Aksi Sosial Berakhir Pada</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="input-group date" id="start_date">
				{{Form::text('expired_at',null,array(
                    'placeholder' => 'Berakhir pada',
                    'class' => 'form-control'
                  )); }}
                  <span class="input-group-addon">
                  <span class="fa fa-calendar fa-fw"></span>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12">
                <div class="checkbox text-left">
                  <label>
                    <input type="checkbox" disabled="" checked=""> Saya/kami akan melaksanakan aksi sosial ini setelah dana terkumpul dan bersedia
                    membuat dokumentasi dan lembar pertanggung jawab dari kegiatan sosial ini
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-group"></i>  Buat Aksi Sosial</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    </div>
    
  </div>
  <script type="text/javascript">
  $(function () {
    $('#start_date').datetimepicker();
  });
  </script>
  
  @stop
  @section('footer')
  @include('bagikasih.theme.footer')
  @stop