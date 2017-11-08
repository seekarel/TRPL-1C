@extends('layouts.sidebarHome')

@section('content')
<div class="banner-text agileinfo"> 
                <div class="container">
                    <div class="agile_banner_info">
                        <div class="agile_banner_info1">
                            <h6>Pegadaian KRESIDA </h6>
                            <div id="typed-strings" class="agileits_w3layouts_strings">
                                <p>Selamat Datang Di <i>Pegadaian</i></p>
                                <p><i>Mengatasi </i> Masalah</p>
                                <p>Tanpa <i>Masalah</i></p>
                                <p>Kredit <i>Kresida</i></p>
                            </div>
                            <span id="typed" style="white-space:pre;"></span>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- //banner-text -->  
        </div>  
    </div>  
    
    
    <!-- services --> 
    <div class="services jarallax">
        <div class="container">   
            <h3 class="agileits-title w3title1">Keuntungan Memakai Kresida</h3>
            <div class="services-w3ls-row">
                <div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
                    <span class="glyphicon glyphicon-home effect-1" aria-hidden="true"></span>
                    <h5>Tafsir Gratis</h5>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
                    <span class="glyphicon glyphicon-list-alt effect-1" aria-hidden="true"></span>
                    <h5>Dana Cair Cepat</h5>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
                    <span class="glyphicon glyphicon-tree-deciduous effect-1" aria-hidden="true"></span>
                    <h5>Jumlah Pinjaman Mencapai 95%</h5>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 services-grid">
                    <span class="glyphicon glyphicon-globe effect-1" aria-hidden="true"></span>
                    <h5>Survey Cepat</h5>
                </div> 
                <div class="clearfix"> </div>
            </div>  
        </div> 
    </div>
    <!-- //services -->
   
  
    
  
    <!-- modal sign in  -->
    <div class="modal bnr-modal about-modal w3-agileits fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div> 
                <div class="modal-body login-page "><!-- login-page -->      
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item" aria-controls="tab_item-0"><span>Login</span></li>
                                <li class="resp-tab-item" aria-controls="tab_item-1"><span>Register</span></li> 
                            </ul>    
                            <div class="clearfix"> </div>   
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="agileits-login">
                                        <form action="/LoginGadai" method="POST"> 
                                        <input type="text" class="email" name="username" placeholder="Username" required=""/>
                                        <input type="password" class="password" name="password" placeholder="Uassword" required=""/>
                                        <div class="wthree-text"> 
                                            <label class="anim">
                                                <input type="checkbox" class="checkbox">
                                                <span> Remember me ?</span> 
                                            </label> 
                                            <div class="clearfix"> </div>
                                        </div>  
                                        <div class="w3ls-submit"> 
                                            <input type="submit" value="LOGIN">     
                                        </div> 
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    </form>
                                    </div> 
                                </div>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="login-top sign-top">
                                        <div class="agileits-login">
                                            <form action="/register" method="post">
                                            <input type="text" name="username" placeholder="Username" required=""/>
                                            <input type="password" class="password" name="password" placeholder="Password" required=""/>
                                            <input type="text" class="password" name="nama" placeholder="Nama" required=""/> 
                                            <input type="text" class="password" name="alamat" placeholder="Alamat" required=""/>
                                            <input type="text" class="password" name="lahir" placeholder="Tempat lahir" required=""/>
                                            <input type="text" class="date" name="tanggal" placeholder="Ex : yyyy-mm-dd" required=""/>
                                            <input type="text" class="password" name="pekerjaan" placeholder="Pekerjaan" required=""/>
                                            <input type="text" class="password" name="ktp" placeholder="KTP" required=""/>
                                            <input type="text" class="password" name="hp" placeholder="No HP" required=""/>
                                            <input type="text" class="password" name="agama" placeholder="Agama" required=""/>
                                            <input type="text" class="password" name="namaIbu" placeholder="Nama Ibu" required=""/> 
                                            <div>
                                            <label class="password"></label>
                                            <div class="col-sm-3">
                                                <input type="radio" class="radio-control" name="kelamin" value="Laki-laki">Laki-Laki</br>
                                                <input type="radio" class="radio-control" name="kelamin" value="Perempuan">Perempuan
                                            </div>  
                                            <div class="w3ls-submit"> 
                                                <input class="register" type="submit" value="REGISTER">  
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        </form> 
                                        </div>  
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="clearfix"> </div>
                    </div>   
                </div> <!-- //login-page -->
            </div>
        </div>
    </div>
    <!-- //modal sign in -->  
<!-- //modal sign in -->  
@endsection