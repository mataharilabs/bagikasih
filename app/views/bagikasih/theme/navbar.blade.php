<?php
    $redirecturl = Input::get('redirect') ? str_replace('_', '/', Input::get('redirect')) : '';
?>
<script type="text/javascript">
    @if(!empty($redirecturl))
        var currenturl = '{{ $redirecturl }}';
    @else
        var currenturl = document.URL;
    @endif
</script>

<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="http://www.bagikasih.com" class="navbar-brand"><img src="/assets/assets/img/logo.png"></a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ URL::route('buat-aksi-sosial') }}">Buat Aksi Sosial</a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Temukan<span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li><a href="{{ URL::route('temukan-target-sosial') }}">Target Sosial</a></li>
            <li><a href="{{ URL::route('temukan-aksi-sosial') }}">Aksi Sosial</a></li>
            <li><a href="{{ URL::route('temukan-event') }}">Event</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Bagikasih.com<span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li><a href="{{ URL::route('tentang-kami') }}">Tentang Kami</a></li>
            <li><a href="{{ URL::route('bantuan') }}">Bantuan</a></li>
            <li><a href="{{ URL::route('buat-target-sosial') }}">Daftarkan Target Sosial</a></li>
            <li><a href="{{ URL::route('buat-event') }}">Daftarkan Event</a></li>
            <li><a href="{{ URL::route('kontak-kami') }}">Kontak Kami</a></li>
          </ul>
        </li>
      </ul>
       
      @if(Auth::check() && Request::segment(1) != 'login' && Request::segment(1) != 'signup')
        <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="{{ URL::route('lihat-profil', Auth::user()->slug) }}" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px; padding-bottom: 10px;">{{ Auth::user()->firstname }} 
                      <?php
                      if (Session::has('user_connect'))
                      {
                        if (Session::get('user_connect.provider') == 'twitter')
                        {
                          $user_pic_url = Session::get('user_connect.profile_image_url');
                        }
                        else if (Session::get('user_connect.provider') == 'facebook')
                        {
                          $user_pic_url = 'http://graph.facebook.com/'.Session::get('user_connect.id').'/picture';
                        }
                      }
                      else if (Auth::user()->default_photo_id)
                      {
                        $user_pic_url = '/photos/'.Auth::user()->default_photo_id.'.jpg';
                      }
                      else
                      {
                        $user_pic_url = '/assets/assets/img/ava.png';
                      }
                      ?>
                      <img class="img-rounded img-polaroid" src="{{ $user_pic_url }}" width="30" height="30"></a>
                        <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('lihat-profil', Auth::user()->slug) }}"><i class="fa fa-user fa-fw"></i> Profil Saya</a></li>
                        <li><a href="{{ URL::route('edit_profile') }}"><i class="fa fa-pencil fa-fw"></i> Pengaturan Profil</a></li>
                        <li><a href="{{ URL::route('edit_settings') }}"><i class="fa fa-gear fa-fw"></i> Pengaturan Akun</a></li>
                        <li><a href="{{ URL::route('lihat-profil', Auth::user()->slug) }}#aksi-sosial"><i class="fa fa-group fa-fw"></i> Riwayat Aksi Sosial</a></li>
                        <li><a href="{{ URL::route('riwayat-donasi') }}"><i class="fa fa-gift fa-fw"></i> Riwayat Donasi</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
                        </ul>
                    </li>
          </ul>
      @else:
        @if(Request::segment(1) != 'login' && Request::segment(1) != 'signup')
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#modal-signin" data-toggle="modal" data-target=".bs-example-modal-sm">Log In </a></li>
          </ul>
        @endif
      @endif
    </div>
  </div>
</div>