@extends('template.layout')


@section('content')
<div class="container">
   <h3 align="center">Invite Peserta</h3>
   <h4 align="center">( Project : {{ $datamg->nama_project }} )</h4>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="POST" enctype="multipart/form-data" action="/import_excel/import/{{ $datamg->id }}">
    <!-- {{ method_field('PUT') }} -->
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
         <a href="/manage_project" class="btn btn-secondary">Back</a>
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>

   <div class="row">
     <div class="col-6">
      <h2>List Peserta</h2>
     </div>
     <div class="col-6"></div>
     <div class="col-12">
     <table class="table table-hover">
         <tr>
          <th>NAMA</th>
          <th>EMAIL</th>
         </tr>
         @foreach($data as $row)
         <tr>
          <td>{{ $row->name }}</td>
          <td>{{ $row->email }}</td>
         </tr>
         @endforeach
        </table>
      </div>
      <div class="col-12">
          {{ $data->links() }}
        </div>  
  </div>
</div>
@endsection