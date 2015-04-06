@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') 
  @include('bagikasih.theme.navbar') 
@stop
@section('sidebar')


    <div class="container">


      <!-- Navbar  -->
        <div class="row">
          <div class="col-lg-12">

            <div class="page-header">
              <h2 id="navbar">ACCOUNT SETTINGS</h2>
              <p><a href="#">Edit Profile</a> • Account Settings • <a href="#">Aksi Sosial</a> • <a href="#">History Donasi</a></p>
              <p>Gunakan Account Setting untuk merubah informasi email dan mengganti password. Untuk merubah setting notifikasi cukup merubah kotak centang kecil untuk mengontrol pengaturan notifikasi Anda.</p>
            </div>

            
          </div>
        </div>

        <div class="row">

          <div class="panel-body col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">

              <form class="form-horizontal">
                <fieldset>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label text-left">Email</label>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="email" name="email">
                      </div>
                    </div>
                  </div>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label text-left">New Password:</label>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input class="form-control" type="password" placeholder="New Password" name="newpassword">
                      </div>
                    </div>
                  </div>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 control-label text-left">Current Password:</label>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input class="form-control" type="password" placeholder="Old Password" name="userpassword">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-cog"></i>  Save Settings</button>
                    </div>
                  </div>

                </fieldset>

                </div>
              </div>
          </div>  

          <div class="panel-body col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-lg-9">
                    <h4>NOTIFICATIONS</h4><hr>

                <fieldset>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="checkbox text-left">
                        <label>
                          <input type="checkbox" {{ $user['is_my_social_target_subscriber'] == 1 ? 'checked' : '' }}>  Someone Donates to My Social Movements
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="checkbox text-left">
                        <label>
                          <input type="checkbox" {{ $user['is_my_social_action_subscriber'] == 1 ? 'checked' : '' }}> Someone Donates to My Social Institution Pages
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="checkbox text-left">
                        <label>
                          <input type="checkbox" {{ $user['is_newsletter_subscriber'] == 1 ? 'checked' : '' }}> Yes I Want to Receive BagiKasih's Newsletter
                        </label>
                      </div>
                    </div>
                  </div>

          
                </fieldset>
                    </div>

                </div>
              </div>
          </div>  


        </div>
      </form>


    </div>

{{ HTML::script('js/credential.js'); }}
@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop