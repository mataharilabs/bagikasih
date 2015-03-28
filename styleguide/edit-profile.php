<?php include "temp/header.tpl"; ?> 


  </head>
  <body id="home">

<!-- ini nav bar - mulai-->
<?php include "temp/navbar-logged-in.tpl"; ?> 
<!-- ini nav bar - selesai-->


    <div class="container">




     <!-- Navbar  -->
        <div class="row">
          <div class="col-lg-12">

            <div class="page-header">
              <h2 id="navbar">EDIT MY PROFILE</h2>
              <p>Edit Profile • <a href="#">Account Settings</a> • <a href="#">Aksi Sosial</a> • <a href="#">History Donasi</a></p>
              <p>Profil BagiKasih Anda menunjukkan informasi yang lebih detail tentang profil Anda. Profil anda dapat menunjukkan kredibilitas Anda, sehingga orang lain ingin membantu aksi sosial yang anda buat. Jadi, pastikan untuk menggunakan foto profil yang baik, tuliskan cerita memukau tentang Anda</p>
            </div>

            
          </div>
        </div>



        <div class="row">

          <div class="panel-body col-lg-3">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/ava.png" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <p><a href="#">Change Profile Photo</a></p>
                </div>
              </div>
          </div>  

          <div class="panel-body col-lg-9">
              <div class="panel panel-default">
                <div class="panel-body">


<!-- general information col -mulai -->

                    <div class="col-lg-9">
                    <h2 id="navbar">Hey, Deny Setiawan</h2><hr>

              <form class="form-horizontal">
                <fieldset>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama</label>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                       <input class="form-control" type="text" placeholder="Deny" name="firstname">
                    </div>               
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                       <input class="form-control" type="text" placeholder="Setiawan" name="lastname">
                    </div>
                  </div>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Email</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="deny.setiawan@live.com" name="email">
                      </div>
                    </div>
                  </div>

                  <div class="form-group text-left">                    
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Phone Number</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="085732649156" name="phone">
                      </div>
                    </div>
                  </div>


                  <hr>Additional info<p>

                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">BagiKasih URL</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="www.bagikasih.com/denysetiawan" name="whitelabel" disabled>
                      </div>
                    </div>

                  </div>

                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Kota</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="" name="city">
                      </div>
                    </div>

                  </div>


                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Birthday</label>
                     <div class="col-lg-3 col-md-3col-sm-3 col-xs-3">
                      <select name="birthdate_month" class="form-control" id="select">
                                              <option value="1" selected="selected">JAN</option>
                                              <option value="2">FEB</option>
                                              <option value="3">MAR</option>
                                              <option value="4">APR</option>
                                              <option value="5">MAY</option>
                                              <option value="6">JUN</option>
                                              <option value="7">JUL</option>
                                              <option value="8">AUG</option>
                                              <option value="9">SEP</option>
                                              <option value="10">OCT</option>
                                              <option value="11">NOV</option>
                                              <option value="12">DEC</option>
                      </select>
                    </div>               
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="birthdate_date" class="form-control" id="select">
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3" selected="selected">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <select name="birthdate_year" class="form-control" id="select">
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990" selected="selected">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group text-left">
                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">About Me</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" id="textArea">The person who created this page is probably preparing something cool to post about everything they're doing to give back. You should also scroll down and see if they have a social movement going so you can support 'em.</textarea>
                    </div>
                  </div>


                  <!--<div class="form-group">
                    <div class="col-lg-12">
                      <div class="checkbox text-left">
                        <label>
                          <input type="checkbox" checked> Saya ingin mendapatkan update dari aksi sosial ini
                        </label>
                      </div>
                    </div>
                  </div>-->

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

    <div class="container">
    <?php include "temp/footer.tpl"; ?> 
    </div>


    <script src="./components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootswatch.js"></script>
  </body>
</html>
