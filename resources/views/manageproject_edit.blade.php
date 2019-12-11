@extends('template.layout')


@section('content')
<div class="container">
   <!--  @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{ session('sukses') }}
    </div>
    @endif -->
    <div class="row">        
        <div class="col-12">
          @if(count($errors) > 0)
                      <div class="alert alert-danger">
              <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
             </ul>
            </div>
           @endif
        </div>
        <div class="col-12">
            <form action="/manage_project/{{ $data->id }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
              <div class="form-group">
                <label for="InputNamaProject">Nama Project</label>
                <input type="text" class="form-control" name="nama_project" id="nama_project" placeholder="Nama Project" value="{{ $data->nama_project }}">
              </div>
              <div class="form-group">
                <label for="InputDeskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ $data->deskripsi }}</textarea>
              </div>
              <div class="form-group">
                <label for="InputTanggalAwal">Tanggal Awal</label>
                <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="Tanggal Awal" value="{{ $data->tanggal_awal }}">
              </div>
              <div class="form-group">
                <label for="InputTanggal Akhir">Tanggal Akhir</label>
                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="Tanggal Akhir" value="{{ $data->tanggal_akhir }}">
              </div>
                  
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/manage_project" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection