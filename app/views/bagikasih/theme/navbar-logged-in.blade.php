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
              <a href="buat-aksi-sosial">Buat Aksi Sosial</a>
            </li>        

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Temukan<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="temukan-target-sosial">Target Sosial</a></li>
                <li><a href="temukan-aksi-sosial">Aksi Sosial</a></li>
                <li><a href="temukan-event">Event</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Bagikasih.com<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="tentang-kami">Tentang Kami</a></li>
                <li><a href="bantuan">Bantuan</a></li>
                <li><a href="daftarkan-target-sosial">Daftarkan Target Sosial</a></li>
                <li><a href="daftarkan-event">Daftarkan Event</a></li>
                <li><a href="kontak-kami">Kontak Kami</a></li>
              </ul>
            </li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px; padding-bottom: 10px;">{{ Auth::user()->firstname }} 
                      <img class="img-rounded img-polaroid" src="/assets/assets/img/ava.png" width="30" height="30"></a>
                        <ul class="dropdown-menu">
                        <li><a href="rotary-club"><i class="fa fa-user fa-fw"></i> Profil Saya</a></li>
                        <li><a href="setting/edit-profile"><i class="fa fa-pencil fa-fw"></i> Pengaturan Profil</a></li>
                        <li><a href="edit-settings"><i class="fa fa-gear fa-fw"></i> Pengaturan Akun</a></li>
                        <li><a href="event-history"><i class="fa fa-group fa-fw"></i> Riwayat Aksi Sosial</a></li>
                        <li><a href="donation-history"><i class="fa fa-gift fa-fw"></i> Riwayat Donasi</a></li>
                        <li class="divider"></li>
                        <li><a href="setting/logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
                        </ul>
                    </li>
          </ul>

        </div>
      </div>
    </div>