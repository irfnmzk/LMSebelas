@foreach($timeline as $item)
<div class="card timeline-card timeline-others" id="comment-1">
   <div class="col-lg-2 col-md-2 col-sm-2">
      <div class="profpic-user-timeline"><img src="{{$item->creator->picture}}"></div>
   </div>
   <div class="col-lg-10 col-md-10 col-sm-10">
      <div class="content-timeline">
         <div class="username-timeline">{{$item->creator->name}}</div>
         <div class="date-timeline">Thu, Jan 25th 2018</div>
         <div class="text-content-timeline">
         {{$item->text}}
         </div>
         <div class="responds-timeline">
            <a href="#">
               <div class="like-timeline"><span class="icon-timeline"><i class="zmdi zmdi-thumb-up"></i></span><span class="like-count-timeline">0</span> likes</div>
            </a>
            <a href="#">
               <div class="comment-timeline" id="comment-1"><span class="icon-timeline"><i class="zmdi zmdi-comments"></i></span><span class="comment-count-timeline">48</span> comments</div>
            </a>
         </div>
      </div>
   </div>
</div>
@endforeach
