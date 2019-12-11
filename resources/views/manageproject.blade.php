@extends('template.layout')


@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h1>Kelola Project</h1>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#manageproject">
              Tambah
            </button>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nama Project</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Tanggal Awal</th>
              <th scope="col">Tanggal Akhir</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $item)
            <tr>
              <td>{{ $item->nama_project }}</td>
              <td>{{ $item->deskripsi }}</td>
              <td>{{ $item->tanggal_awal }}</td>
              <td>{{ $item->tanggal_akhir }}</td>
              <td> <form method="POST" action="/manage_project/{{$item->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <div class="form-group">
                            <a href="/import_excel/{{ $item->id }}" class="btn btn-info btn-sm">Upload</a>
                            <a href="/manage_project/{{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" class="btn btn-danger btn-sm delete" value="Delete">
                        </div>
                    </form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-12">
          {{ $data->links() }}
        </div>
        <!-- Modal -->
        <div class="modal fade" id="manageproject" tabindex="-1" role="dialog" aria-labelledby="ModalKelolaProject" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalKelolaProject">Form Kelola Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/manage_project" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="InputNamaProject">Nama Project</label>
                        <input type="text" class="form-control" name="nama_project" id="nama_project" placeholder="Nama Project" required>
                      </div>
                      <div class="form-group">
                        <label for="InputDeskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"required ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="InputTanggalAwal">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="Tanggal Awal" required>
                      </div>
                      <div class="form-group">
                        <label for="InputTanggal Akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="Tanggal Akhir" required>
                      </div>
                      
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection