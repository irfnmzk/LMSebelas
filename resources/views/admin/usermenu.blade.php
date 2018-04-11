    <style>
        .form-in-edit {
            display: block;
            margin: -15px auto 5px auto;
            width: 50%;
        }
        .form-in-edit form {
            display: inline-block;
            vertical-align: top;
            margin: 0 20px;
        }
        .form-in-edit form input,.form-in-edit form select {
            background: #fff;
            padding: 5px 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin: 0;
        }
        .form-in-edit form input[type=submit]{
            padding: 7px 15px;
            border-radius: 3px;
            margin-top: -2px;
        }
    </style>
    <div class="form-in-edit">
                <form method="POST" action="{{route('admin.user.pass', $id)}}" onSubmit="return confirm('Anda yakin dengan operasi ini?')" class="form-in">
                <div class="form-group">
                {{csrf_field()}}
                <label>Ubah Password</label><br/>
                <input type="text" name="password"/>
                <input type="submit" value="Save" class="btn btn-info" />
                </div>
                </form>

                <form method="POST" action="{{route('admin.user.role', $id)}}" onSubmit="return confirm('Anda yakin dengan operasi ini?')" class="form-in">
                {{csrf_field()}}
                <div class="form-group">
                <label>Ubah Role</label><br/>
                <select name="role">
                    <option value="1">Guru</option>
                    <option value="2">Siswa</option>
                    <option value="3">Admin</option>
                </select>
                <input class="btn btn-info" type="submit" value="Save" />
                </div>
                </form>
    </div>