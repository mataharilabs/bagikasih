<?php include "temp/header.tpl"; ?> 


  </head>
  <body id="home">

<!-- ini nav bar - mulai-->
<?php include "temp/navbar-logged-in.tpl"; ?> 
<!-- ini nav bar - selesai-->


    <div class="container">



      <!-- Navbar   -->
        <div class="row">
          <div class="col-lg-12">

            <div class="page-header">
              <h2 id="navbar">Riwayat Donasi</h2>
              <p><a href="#">Edit Profile</a> • <a href="#">Account Settings</a> • <a href="#">Aksi Sosial</a> • History Donasi</p>
              <p>Profil BagiKasih Anda menunjukkan informasi yang lebih detail tentang profil Anda. Profil anda dapat menunjukkan kredibilitas Anda, sehingga orang lain ingin membantu aksi sosial yang anda buat. Jadi, pastikan untuk menggunakan foto profil yang baik, tuliskan cerita memukau tentang Anda</p>
            </div>

            
          </div>
        </div>



        <div class="row">



          <div class="panel-body col-lg-9 col-centered">
              <div class="panel panel-default">
                <div class="panel-body">


<!-- general information col -mulai -->

                    <div class="col-lg-12">
<p>Kami telah mengirimkan e-mail mengenai detail donasi aksi sosial Anda ke <b>deny.setiawan@live.com</b>. Silahkan melakukan pengiriman dana donasi ke
rekening yang tercantum pada email yang telah kami kirim.</p>

              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Penerima</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Perbaikan Fasilitas Panti Vincentius</td>
                    <td>Rp. 25.000.000,-</td>
                    <td>16-09-2014</td>
                    <td>*Pending</td>
                    <td><input type="checkbox" checked></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Bagi-Bagi Sembako Ke Yayasan Tunanetra</td>
                    <td>Rp. 25.000.000,-</td>
                    <td>05-03-2014</td>
                    <td>*Pending</td>
                    <td>  <input type="checkbox" checked></td>
                  </tr>
                  <tr class="success">
                    <td>3</td>
                    <td>Donasi Langsung Panti Asmaul Husna</td>
                    <td>Rp. 5.00.000,-</td>
                    <td>01-06-2012</td>
                    <td>Completed</td>
                    <td><!--<input type="checkbox" checked>--></td>
                  </tr>

                  </tr>
                </tbody>
              </table> 
              <div class="col-lg-9">
               </div>
              <div class="col-lg-3">
                      <select name="birthdate_month" class="form-control" id="select">
                      <option value="1" selected="selected">Action</option>
                      <option value="2">Konfirmasi Transfer</option>
                      <option value="2">Batalkan Donasi</option>
                      </select>
               </div>


                    </div>

                </div>
              </div>
          </div>  


        </div>


    </div>

    <div class="container">
    <?php include "temp/footer.tpl"; ?> 
    </div>


    <script src="./components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootswatch.js"></script>
  </body>
</html>
