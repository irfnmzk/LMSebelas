@extends('layouts.app')

@section('content')
  <div class="content">
                <div class="container-fluid">

                            <div class="card profile">
                <!--div class="profpic profpic-data col-lg-12 col-md-12 col-sm-12">
                  
                  <img src="../assets/img/catfall.jpeg" class="avatar"/>
                </div-->
              <form method="POST" class="profile-photo-cover">
                            <div class="col-lg-12 col-md-12 col-sm-12 profile-cover">
                <img src="../assets/img/photocovercat.jpg" class="bgavatar"/>
                
              <div class="fileinput fileinput-new text-center profile-photo" data-provides="fileinput">
                <div class="fileinput-new thumbnail before-input">
                                    <img src="../assets/img/image_placeholder.jpg" alt="...">
                                </div>
                <div class="fileinput-preview fileinput-exists thumbnail after-input"></div>
                <span class="btn btn-file">
                  <span class="fileinput-new"><i class="zmdi zmdi-plus"></i></span>
                  <span class="fileinput-exists photo-edit"><i class="zmdi zmdi-settings"></i></span>
                  <input type="file" name="photoProfile"/>
                </span>
                <a href="#pablo" class="btn fileinput-exists cancel-upload" data-dismiss="fileinput">&times;</a>
                            </div>
              </form>
              </div>
              <div class="row">
                            <div class="col-lg-2 col-md-2">
              </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="">
                                <div class="card-content">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Full Name</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Nickname</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="nickname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Birthday</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control datepicker" name="birthday">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Email</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Status</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="status" class="form-control" name="status">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Address</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <textarea type="text" class="form-control" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class=" col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-info">SAVE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2"></div>
            </div>
                        </div>
              
                    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card groups">
                                <div class="card-header">
                                    <i class="zmdi zmdi-accounts-alt" style="font-size:50px;color:#4b4;margin-right:20px;"></i><h4 class="card-title">Joined Groups</h4>
                                </div>
                                <div class="card-content">
                  <div class="row">

                  <!-- Here are some group list -->
                  
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="card group-list">
                  <a href="#">
                  <div class="group-img">
                    <img src="../assets/img/catfall.jpeg" style="height:100%"/>
                  </div>
                  <div class="group-abt">
                    <div id="group-name"><strong>12 RPL 1</strong></div>
                    <div id="group-stat"><span><b>29</b> Members</span></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="card group-list">
                  <a href="#">
                  <div class="group-img">
                    <img src="../assets/img/catfall.jpeg" style="height:100%"/>
                  </div>
                  <div class="group-abt">
                    <div id="group-name"><strong>BASIS DATA</strong></div>
                    <div id="group-stat"><span><b>128</b> Members</span></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="card group-list">
                  <a href="#">
                  <div class="group-img">
                    <img src="../assets/img/catfall.jpeg" style="height:100%"/>
                  </div>
                  <div class="group-abt">
                    <div id="group-name"><strong>WEBDIN 11</strong></div>
                    <div id="group-stat"><span><b>198</b> Members</span></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="card group-list">
                  <a href="#">
                  <div class="group-img">
                    <img src="../assets/img/catfall.jpeg" style="height:100%"/>
                  </div>
                  <div class="group-abt">
                    <div id="group-name"><strong>IT Indonesia</strong></div>
                    <div id="group-stat"><span><b>178k</b> Members</span></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="card group-list">
                  <a href="#">
                  <div class="group-img">
                    <img src="../assets/img/catfall.jpeg" style="height:100%"/>
                  </div>
                  <div class="group-abt">
                    <div id="group-name"><strong>Google Indonesia</strong></div>
                    <div id="group-stat"><span><b>1.2M</b> Members</span></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="card group-list">
                  <a href="#">
                  <div class="group-img">
                    <img src="../assets/img/catfall.jpeg" style="height:100%"/>
                  </div>
                  <div class="group-abt">
                    <div id="group-name"><strong>Google Developers</strong></div>
                    <div id="group-stat"><span><b>67M</b> Members</span></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  
                  </div>
                                </div>
                            </div>
            </div>
                    </div>
                    </div>
                </div>
            </div>
@endsection