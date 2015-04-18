@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar')
@include('bagikasih.theme.navbar')
@stop
@section('sidebar')

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
		@include('bagikasih.theme.left-sidebar', array('menu' => 'daftarkan-target-sosial'))
		<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-body">

			<div class="alert alert-danger" id="loginfailure" role="alert" style="display:none;"></div>

			<div class="alert alert-success" id="success" role="alert" style="display:none;"></div>

			<div class="panel-body" id="create-target-sosial">
				<h2 id="navbar">Daftarkan Target Sosial</h2>
				<div class="col-lg-9">
					
					<form class="form-horizontal" onsubmit="return create_social_target(this);">
					<fieldset>
						
						<input class="form-control" style="display:none;" type="text" name="user_id" id="user_id" value="{{ !empty(Auth::user()->id) ? Auth::user()->id : '' }}">
						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Kategori</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<select class="form-control" name="social_target_category_id" id="social_target_category_id">
										@foreach($categories as $category):
										<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
									<input class="form-control" type="text" placeholder="Nama Target Sosial, contoh: Panti Asuhan X, Panti Jompo Y, dsb." name="name" id="name" value="">
								</div>
							</div>
						</div>

						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Tentang Target Sosial</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<textarea class="form-control" rows="3" name="description" id="description"></textarea>
							</div>
						</div>
						
						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Kepengurusan</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<textarea class="form-control" rows="3" name="stewardship" id="stewardship"></textarea>
							</div>
						</div>

						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Kota</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<select class="form-control" name="city_id" id="city_id">
										@foreach($cities as $city):
										<option value="{{ $city->id }}" {{ Auth::user()->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
		
						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Alamat</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-location-arrow fa-fw"></i></span>
								<input class="form-control" type="text" placeholder="Alamat" name="address" id="address" value="">
								</div>
							</div>
						</div>

						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">No.Telp</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-location-arrow fa-fw"></i></span>
								<input class="form-control" type="text" placeholder="No.Telp" name="phone_number" id="phone_number" value="">
								</div>
							</div>
						</div>
						
						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Email</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
									<input class="form-control" type="text" placeholder="Email" name="email" id="email" value="">
								</div>
							</div>
						</div>
					
						<div class="form-group text-left">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Social Media</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></span>
									<input class="form-control" type="text" placeholder="Pisahkan dengan tanda koma, seperti Facebook, Twitter, dsb. " name="social_media_urls" value="">
								</div>
							</div>
						</div>
		
						<div class="form-group">
							<div class="col-lg-12">
								<button type="submit" class="btn btn-success" style="width:100%;"><i class="fa fa-calendar"></i> Daftarkan Target Sosial</button>
							</div>
						</div>

					</fieldset>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

{{ HTML::script('js/create-social-target.js') }}

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop