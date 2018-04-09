            
                <form method="POST" action="{{route('admin.user.pass', $id)}}" onSubmit="return confirm('Anda yakin dengan operasi ini?')">
                {{csrf_field()}}
                <td>Ubah Password</td>
                <td><input type="text" name="password"/></td>
                <td><input type="submit" value="Submit" /></td>
                </form>

                <form method="POST" action="{{route('admin.user.role', $id)}}" onSubmit="return confirm('Anda yakin dengan operasi ini?')">
                {{csrf_field()}}
                <td>Ubah Role</td>
                <td><select name="role">
                    <option value="1">Guru</option>
                    <option value="2">Siswa</option>
                    <option value="3">Admin</option>
                </select></td>
                <td><input type="submit" value="Submit" /></td>
                </form>
