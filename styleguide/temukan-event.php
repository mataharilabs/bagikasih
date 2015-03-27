<?php include "temp/header.tpl"; ?> 


  </head>
  <body id="home">

<!-- ini nav bar - mulai-->
<?php include "temp/navbar-logged-in.tpl"; ?> 
<!-- ini nav bar - selesai-->

<!-- Container  - mulai-->
    <div class="container">

<!-- Headline  - mulai-->
        <div class="row">
          <div class="col-lg-12"  align="center">

            <div class="page-header">
              <h2 id="navbar">List Event</h2>
              <p>Anda dapat mengadakan aksi sosial anda pada event-event menarik di bawah ini. <br>Mengadakan aksi sosial pada sebuah event tentu sangat efektif dan membantu aksi sosial kamu segera terwujud.</p>
            </div>
            
          </div>
        </div>
<!-- Headline - selesai-->

        <!-- search bar - mulai  -->
        <div class="row">
          <div class="col-lg-12">       

              <div class="navbar navbar-default">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="navbar-collapse collapse navbar-responsive-collapse" style="margin-top:5px;">   
                <label for="select" class="col-lg-1 col-md-1 col-sm-1 control-label" style="color:#fff; margin-top:8px;">Kategori: </label>                 
                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                      <select class="form-control" id="select">                        
                        <option>Semua</option>
                        <option>Event General</option>
                        <option>Tantangan Sosial</option>
                      </select>
                    </div>

                <label for="select" class="col-lg-1 col-md-1 col-sm-1 control-label" style="color:#fff; margin-top:8px;">Kota: </label>                 
                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                      <select class="form-control" id="select">
                        <option>Semua</option>
                        <option>Bandung</option>
                        <option>Banten</option>
                        <option >Bekasi</option>
                        <option>Bogor</option>
                        <option>Cianjur</option>
                        <option>Cilacap</option>
                        <option>Depok</option>
                        <option>Jakarta</option>
                        <option>Jepara</option>
                        <option>Malang</option>
                        <option>Purbalingga</option>
                        <option>Purwokerto</option>
                        <option>Semarang</option>
                        <option>Sidoarjo</option>
                        <option>Sukabumi</option>
                        <option>Surabaya</option>
                        <option>Tangerang</option>
                        <option>Yogyakarta</option>
                      </select>
                    </div>

                <label for="select" class="col-lg-1 col-md-1 col-sm-1  control-label" style="color:#fff; margin-top:8px;">Search:</label>                 
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                      <input type="text" class="form-control" id="inputEmail" placeholder="Keyword">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 ">
                      <a href="#" class="btn btn-primary" ><i class="fa fa-search"></i> Cari</a>
                    </div>
                </div>

              </div>              
              <!-- Search Bar - Selesai -->

          </div>
        </div>
        <!-- Search Bar - Selesai -->

        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/event/event-1.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="event">
                  <h3>Charity Night Tahun Baru</h3></a>
                  <h4><b>31 Desember 2016</h4></b>
                  <p><span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Upcoming</span></p>
                  <p><i class="fa fa-map-marker"></i> Jakarta</p>
                </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/event/event-2.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="event">
                  <h3>HUT Kemerdekaan RI</h3></a>
                  <h4><b>17 Agustus 2015</h4></b>
                  <p><span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Upcoming</span></p>
                  <p><i class="fa fa-map-marker"></i> Surabaya</p>
                </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/event/event-3.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="event">
                  <h3>Pertamina Bazzar Day</h3></a>
                  <h4><b>1 Mei 2014</h4></b>
                  <p><span class="label label-primary"><i class="fa fa-check-square"></i> Selesai</span></p>
                  <p><i class="fa fa-map-marker"></i> Jakarta</p>
                </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/event/event-4.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="event">
                  <h3>Valentine Fundraising for Cancer</h3></a>
                  <h4><b>14 Februari 2013</h4></b>
                  <p><span class="label label-primary"><i class="fa fa-check-square"></i> Selesai</span></p>
                  <p><i class="fa fa-map-marker"></i> Surabaya</p>
                </div>
              </div>
          </div>

        </div>

 


    </div>
<!-- Container - selesai-->

    <div class="container">
    <?php include "temp/footer.tpl"; ?> 
    </div>


    <script src="./components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootswatch.js"></script>
  </body>
</html>
