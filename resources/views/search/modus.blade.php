
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Hasil Pencarian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table align="center" border="1">
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    </tr>
                    @forelse ($results as $data)
                    <tr>
                        <td>{{$data->no_urut}}</td>
                        <td>{{$data->pengirim}}</td>
                        <td>{{$data->alamat_pengirim}}</td>
                        <td>{{$data->tanggal_masuk}}</td>
                    </tr>
                    @empty
                        kosong
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
