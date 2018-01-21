<!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Auth::User()->picture }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->email}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <h5> Jumlah Kelas <a class="pull-right bold">0</a></h5>
                </li>
              </ul>
              <a href="" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default"><b><i class="fa fa-plus"></i> Gabung Kelas</b></a>
            </div>
            <!-- /.box-body -->
          </div>
<!-- /.box -->