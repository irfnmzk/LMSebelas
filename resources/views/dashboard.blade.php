@extends('layouts.app')
@section('content')
<div class="container-fluid">

                    <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-12">
              <div class="card timeline-card timeline-write">
                <div class="col-lg-2 col-md-2 col-sm-2">
                  <div class="profpic-user-timeline"><img src="{{ Auth::user()->picture }}"/></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="content-timeline">
                  <form method="POST">
                    <textarea placeholder="How's it going ?" name="timeline-status"></textarea>
                    <div class="attach-something-else pull-left">
                    <div class="to-attach">
                    <a href="#"><i class="zmdi zmdi-collection-image"></i>Images</a>
                    <a href="#"><i class="zmdi zmdi-videocam"></i>Video</a>
                    </div>
                    </div>
                    <button type="submit" class="post-status btn btn-info pull-right">Post</button>
                  </form>
                </div>
                </div>
              </div>
              
              <div class="card timeline-card timeline-others" id="comment-1">
                <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="profpic-user-timeline"><img src="../assets/img/catfall.jpeg"/></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="content-timeline">
                <div class="username-timeline">Someone AutDer</div>
                <div class="date-timeline">Thu, Jan 25th 2018</div>
                <div class="text-content-timeline">
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                </div>
                <div class="responds-timeline">
                  <a href="#"><div class="like-timeline"><span class="icon-timeline"><i class="zmdi zmdi-thumb-up"></i></span><span class="like-count-timeline">0</span> likes</div></a>
                  <a href="#"><div class="comment-timeline" id="comment-1"><span class="icon-timeline"><i class="zmdi zmdi-comments"></i></span><span class="comment-count-timeline">48</span> comments</div></a>
                </div>
                
                <div class="all-comments" id="add-responses-1">
                <hr></hr>
                <div class="add-comment">
                <h3 class="add-my">Add Comment: </h3>
                <form method="POST">
                    <textarea placeholder="Write Your Comment" name="timeline-status"></textarea>
                    <div class="attach-something-else pull-left">
                    <div class="to-attach">
                    <a href="#"><i class="zmdi zmdi-collection-image"></i>Images</a>
                    <a href="#"><i class="zmdi zmdi-videocam"></i>Video</a>
                    </div>
                    </div>
                    <button type="submit" class="post-status btn btn-info pull-right">Post</button>
                </form>
                </div>
                <h3 class="other">Comments: </h3>
                <div class="comments-content">
                
                <!-- Comment -->
                <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="profpic-user-comment"><img src="../assets/img/catfall.jpeg"/></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="content-comment">
                <div class="username-timeline">Someone AutDer</div>
                <div class="date-timeline">Thu, Jan 25th 2018</div>
                <div class="text-content-timeline">
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                </div>
                <div class="responds-timeline">
                  <a href="#"><div class="like-comment"><span class="icon-timeline"><i class="zmdi zmdi-thumb-up"></i></span><span class="like-count-timeline">0</span> likes</div></a>
                  <a href="#"><div class="comment-comment"><span class="icon-timeline"><i class="zmdi zmdi-comments"></i></span><span class="comment-count-timeline">48</span> comments</div></a>
                </div>
                </div>
                </div>
                <!-- /Comment -->
                <!-- Comment -->
                <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="profpic-user-comment"><img src="../assets/img/catfall.jpeg"/></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="content-comment">
                <div class="username-timeline">Someone AutDer</div>
                <div class="date-timeline">Thu, Jan 25th 2018</div>
                <div class="text-content-timeline">
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                </div>
                <div class="responds-timeline">
                  <a href="#"><div class="like-comment"><span class="icon-timeline"><i class="zmdi zmdi-thumb-up"></i></span><span class="like-count-timeline">0</span> likes</div></a>
                  <a href="#"><div class="comment-comment"><span class="icon-timeline"><i class="zmdi zmdi-comments"></i></span><span class="comment-count-timeline">48</span> comments</div></a>
                </div>
                </div>
                </div>
                <!-- /Comment -->
                
                <!-- More-Comments -->
                <div id="responses-1">
                <div class="showed-more-comments">
                <div class="comments-content">
                
                <!-- Comment -->
                <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="profpic-user-comment"><img src="../assets/img/catfall.jpeg"/></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="content-comment">
                <div class="username-timeline">Someone AutDer</div>
                <div class="date-timeline">Thu, Jan 25th 2018</div>
                <div class="text-content-timeline">
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                </div>
                <div class="responds-timeline">
                  <a href="#"><div class="like-comment"><span class="icon-timeline"><i class="zmdi zmdi-thumb-up"></i></span><span class="like-count-timeline">0</span> likes</div></a>
                  <a href="#"><div class="comment-comment"><span class="icon-timeline"><i class="zmdi zmdi-comments"></i></span><span class="comment-count-timeline">48</span> comments</div></a>
                </div>
                </div>
                </div>
                <!-- /Comment -->
                <!-- Comment -->
                <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="profpic-user-comment"><img src="../assets/img/catfall.jpeg"/></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="content-comment">
                <div class="username-timeline">Someone AutDer</div>
                <div class="date-timeline">Thu, Jan 25th 2018</div>
                <div class="text-content-timeline">
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                Lorem Ipsum Dolor is simply a dummy text.
                </div>
                <div class="responds-timeline">
                  <a href="#"><div class="like-comment"><span class="icon-timeline"><i class="zmdi zmdi-thumb-up"></i></span><span class="like-count-timeline">0</span> likes</div></a>
                  <a href="#"><div class="comment-comment"><span class="icon-timeline"><i class="zmdi zmdi-comments"></i></span><span class="comment-count-timeline">48</span> comments</div></a>
                </div>
                </div>
                </div>
                <!-- /Comment -->
                
                </div>
                </div>
                </div>
                
                <!-- More-Comment -->
                
                <!-- trigger-more-comments -->
                <button class="show-more-comments">Show More</button>
                <!-- /trigger-more-comments -->
                
                </div>
                </div>
                </div>
                </div>
              </div>
              
            </div>
            <!--div class="col-lg-9 col-md-6 col-sm-12">
                            <div class="card profiles">
                <div class="profpics">
                  <img src="../assets/img/catfall.jpeg" class="avatar"/>
                </div>
                <div class="me-name">His Nameis Really Dude</div>
                                <div class="card-content">
                <table class="table table-hover">
                  <tbody>
                    <tr><td><i style="color:#2678cc;font-size:20px;margin:0 2px;" class="zmdi zmdi-account"></i> Full Name</td><td>He Is Dude</td></tr>
                    <tr><td><i style="color:#ff0;font-size:20px;margin:0 2px;" class="zmdi zmdi-star"></i> Current Level</td><td>5</td></tr>
                    <tr><td><i style="color:#f44;font-size:20px;margin:0 2px;" class="zmdi zmdi-email"></i> Email</td><td>dudemail@.com</td></tr>
                    <tr><td><i style="color:#ff6022;font-size:20px;margin:0 2px;" class="zmdi zmdi-cake"></i> Birthday</td><td>May 20th 1996</td></tr>
                    <tr><td><i style="color:#09bb90;font-size:20px;margin:0 2px;" class="zmdi zmdi-graduation-cap"></i> Status</td><td>Student</td></tr>
                    <tr><td><i style="color:#0b0;font-size:20px;margin:0 2px;" class="zmdi zmdi-map"></i> Address</td><td>Strettm, st 219, California, Uganda</td></tr>
                    <tr><td><i style="color:#33f;font-size:20px;margin:0 2px;" class="zmdi zmdi-facebook-box"></i> Facebook</td><td>Dude7teen</td></tr>
                    <tr><td><i style="color:#f22;font-size:20px;margin:0 2px;" class="zmdi zmdi-google-plus-box"></i> Google +</td><td>DudeMedude</td></tr>
                    <tr><td><i style="color:#a2a;font-size:20px;margin:0 2px;" class="zmdi zmdi-instagram"></i> Instagram</td><td>@dudesit</td></tr>
                  </tbody>
                </table>
                <a href="profile-data.html"><button class="btn btn-info" style="padding:5px 10px;"><i style="font-size:17px;margin:0 3px 0 0;" class="zmdi zmdi-edit"></i> Edit Your Profile</button></a>
                                </div>
                            </div>
                        </div-->
            
            
            <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card portofolio-card">
                <div class="index-avatar">
                  <img src="{{ asset('assets/img/study-book.jpeg')}}" class="back"/>
                  <img src="{{ Auth::user()->picture }}" class="front"/>
                </div>
                <div class="index-nickname">{{ Auth::user()->name }}</div>
                <div class="index-portofolio">
                  <a href="#"><i class="zmdi zmdi-facebook-box"></i></a>
                  <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                  <a href="#"><i class="zmdi zmdi-google-plus-box"></i></a>
                  <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                </div>
              </div>
                        </div>
          
          </div>
          </div>
@endsection