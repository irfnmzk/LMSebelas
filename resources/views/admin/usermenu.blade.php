<div>
    <table>
        <form method="POST" action="{{route('admin.user.pass', $id)}}">
            <tr>
                <td>Ubah Password</td>
                <td><input type="text" name="password"/></td>
                <td><input type="submit" value="Submit"/></td>
            </tr>
        </form>
        <form method="POST" action="{{route('admin.user.role', $id)}}">
            <tr>
                <td>Ubah Role</td>
                <td><select>
                    <option value="1">Guru</option>
                    <option value="2">Siswa</option>
                    <option value="3">Admin</option>
                </select></td>
                <td><input type="submit" value="Submit"/></td>
            </tr>
        </form>
    </table>
</div>