@foreach($timeline as $item)
<div class="card timeline-card timeline-others" id="comment-1">
    <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="profpic-user-timeline"><img src="{{$item->creator->picture}}" /></div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="content-timeline">
            <div class="username-timeline">{{$item->creator->name}}</div>
            <div class="date-timeline">{{$item->created_at}}</div>
            <div class="text-content-timeline">
                {{$item->text}}
            </div>
        </div>
    </div>
</div>
@endforeach
