
                <td>Kode Kelas</td>
                <td> : </td>
                <td>{{$kelas->code}}</td>

                <td>Buat kode baru</td>
                <td> </td>
                <td><a href="{{route('kelas.code', $id)}}" onClick="return confirm('Apakah kamu yakin akan melakukan operasi tersebut?')")><button>Generate</button></a></td>
                </form>
