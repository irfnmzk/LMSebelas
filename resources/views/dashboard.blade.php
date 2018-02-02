@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-9 col-md-6 col-sm-12">
      <div class="card profile">
        <div class="profpic">
          <img src="{{ asset('assets/img/catfall.jpeg') }}" class="avatar"/>
        </div>
        <div class="me-name">His Nameis Really Dude</div>
        <div class="card-content">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>
                  <i style="color:#2678cc;font-size:20px;margin:0 2px;" class="zmdi zmdi-account"></i> Full Name
                                
                </td>
                <td>He Is Dude</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#ff0;font-size:20px;margin:0 2px;" class="zmdi zmdi-star"></i> Current Level
                                
                </td>
                <td>5</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#f44;font-size:20px;margin:0 2px;" class="zmdi zmdi-email"></i> Email
                                
                </td>
                <td>dudemail@.com</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#ff6022;font-size:20px;margin:0 2px;" class="zmdi zmdi-cake"></i> Birthday
                                
                </td>
                <td>May 20th 1996</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#09bb90;font-size:20px;margin:0 2px;" class="zmdi zmdi-graduation-cap"></i> Status
                                
                </td>
                <td>Student</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#0b0;font-size:20px;margin:0 2px;" class="zmdi zmdi-map"></i> Address
                                
                </td>
                <td>Strettm, st 219, California, Uganda</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#33f;font-size:20px;margin:0 2px;" class="zmdi zmdi-facebook-box"></i> Facebook
                                
                </td>
                <td>Dude7teen</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#f22;font-size:20px;margin:0 2px;" class="zmdi zmdi-google-plus-box"></i> Google +
                                
                </td>
                <td>DudeMedude</td>
              </tr>
              <tr>
                <td>
                  <i style="color:#a2a;font-size:20px;margin:0 2px;" class="zmdi zmdi-instagram"></i> Instagram
                                
                </td>
                <td>@dudesit</td>
              </tr>
            </tbody>
          </table>
          <a href="profile-data.html">
            <button class="btn btn-info" style="padding:5px 10px;">
              <i style="font-size:17px;margin:0 3px 0 0;" class="zmdi zmdi-edit"></i> Edit Your Profile
                            
            </button>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats clocks">
        <div class="card-header card-header-icon">
          <i class="icon icon-warning zmdi zmdi-alarm" style="font-size:50px;margin:15px 0;"></i>
        </div>
        <div class="card-content">
          <h4 class="card-title">Current time</h4>
          <div class="clock" style="font-size:30px;">
            <strong>07:05:12</strong>
          </div>
        </div>
      </div>
    </div>
    <div class="notif">
      <div class="notifs col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats card-notif">
          <div class="card-header card-header-icon">
            <i class="icon icon-info zmdi zmdi-timer" style="font-size:50px;margin:3px 0;"></i>
          </div>
          <div class="card-content">
            <div class="todocount" style="position:relative;width:100%;text-align:right;">
              <strong>
                    1 hours left until "Ulangan WebDin"
                  </strong>
            </div>
          </div>
        </div>
        <div class="card card-stats card-notif">
          <div class="card-header card-header-icon">
            <i class="icon icon-info zmdi zmdi-info" style="font-size:50px;"></i>
          </div>
          <div class="card-content">
            <div class="todocount" style="position:relative;width:100%;text-align:right;">
              <strong>
                    Get Signature after dzuhur
                  </strong>
            </div>
          </div>
        </div>
        <div class="card card-stats card-notif">
          <div class="card-header card-header-icon">
            <i class="icon icon-warning zmdi zmdi-alert-triangle" style="font-size:50px;margin:3px 0;"></i>
          </div>
          <div class="card-content">
            <div class="todocount" style="position:relative;width:100%;text-align:right;">
              <strong>
                    Project OOP must be done today at 4 p.m
                  </strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-5 col-md-6 col-sm-6">
      <div class="card todolist">
        <div class="card-content">
          <h3>Your Tasks Today: </h3>
          <i style="position:absolute;right:0;top:0;padding:10px 20px;background:#2678dd;font-size:40px;color:#fff;border-radius:0 0 0 4px;" class="zmdi zmdi-assignment"></i>
          <ul class="todos" style="list-style:;">
            <li>Ulangan Webdin at 8 a.m
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Do the OOP Project
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Attend meeting at 2 p.m
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Collect books from library
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Get Principle Signature
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>English Test at 1 p.m
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Ulangan Webdin at 8 a.m
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Do the OOP Project
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Attend meeting at 2 p.m
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Collect books from library
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>Get Principle Signature
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
            <li>English Test at 1 p.m
                              
              <span class="todo-stat">
                <i class="icon icon-success zmdi zmdi-check"></i>
                <i class="icon icon-danger zmdi zmdi-close"></i>
              </span>
            </li>
          </ul>
        </div>
        <div class="card-footer">
          <a href="#">
            <button class="btn btn-info">
              <i style="font-size:17px;margin:0 3px 0 0;" class="zmdi zmdi-edit"></i> Write Something Else
                            
            </button>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-12">
      <div class="card activities" style="min-height:200px;max-height: 500px">
        <div class="card-header">
          <h4 class="card-title">Activities</h4>
        </div>
        <div class="card-content">
          <div class="streamline">
            <div class="sl-item sl-primary">
              <div class="sl-content">
                <small class="text-muted">5 mins ago</small>
                <p>Williams has just joined Project X</p>
              </div>
            </div>
            <div class="sl-item sl-danger">
              <div class="sl-content">
                <small class="text-muted">25 mins ago</small>
                <p>Jane has sent a request for access to the project folder</p>
              </div>
            </div>
            <div class="sl-item sl-success">
              <div class="sl-content">
                <small class="text-muted">40 mins ago</small>
                <p>Kate added you to her team</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <small class="text-muted">45 minutes ago</small>
                <p>John has finished his task</p>
              </div>
            </div>
            <div class="sl-item sl-warning">
              <div class="sl-content">
                <small class="text-muted">55 mins ago</small>
                <p>Jim shared a folder with you</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <small class="text-muted">60 minutes ago</small>
                <p>John has finished his task</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card groups" style="min-height:200px;max-height: 500px">
        <div class="card-header">
          <h4 class="card-title">Joined Groups</h4>
        </div>
        <div class="card-content">
          <!-- To Add Group, Add it inside div.group-data -->
          <div class="group-data">
            <div class="group-img">
              <img src="{{ asset('assets/img/catfall.jpeg') }}" style="height:100%"/>
            </div>
            <div class="group-abt">
              <div id="group-name">
                <strong>12 RPL 1</strong>
              </div>
              <div id="group-stat">
                <span>29 Members</span>
              </div>
            </div>
          </div>
          <div class="group-data">
            <div class="group-img">
              <img src="{{ asset('assets/img/catfall.jpeg') }}" style="height:100%"/>
            </div>
            <div class="group-abt">
              <div id="group-name">
                <strong>BASIS DATA</strong>
              </div>
              <div id="group-stat">
                <span>157 Members</span>
              </div>
            </div>
          </div>
          <div class="group-data">
            <div class="group-img">
              <img src="{{ asset('assets/img/catfall.jpeg') }}" style="height:100%"/>
            </div>
            <div class="group-abt">
              <div id="group-name">
                <strong>Webdin</strong>
              </div>
              <div id="group-stat">
                <span>112 Members</span>
              </div>
            </div>
          </div>
          <div class="group-data">
            <div class="group-img">
              <img src="{{ asset('assets/img/catfall.jpeg') }}" style="height:100%"/>
            </div>
            <div class="group-abt">
              <div id="group-name">
                <strong>Jalisum</strong>
              </div>
              <div id="group-stat">
                <span>1,8k Members</span>
              </div>
            </div>
          </div>
          <div class="group-data">
            <div class="group-img">
              <img src="{{ asset('assets/img/catfall.jpeg') }}" style="height:100%"/>
            </div>
            <div class="group-abt">
              <div id="group-name">
                <strong>Googles</strong>
              </div>
              <div id="group-stat">
                <span>290k Members</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection