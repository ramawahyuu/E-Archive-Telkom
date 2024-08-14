@extends('index')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card bg-white text-white mb-4" style="border-radius: 25px;">
            <div class="card-body">
@foreach ($informasi as $info)
<h1>{{ $info->judul }}</h1>
@if(Auth::user()->role == 'admin')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
    Edit Informasi
  </button>
  @endif
<div class="d-flex mb-3 justify-content-between">
</div>
<!-- Begin Responsive Table Container -->
<h4 class="card-description" style="margin-bottom: 50px;">{{ $info->deskripsi1 }}</h4>     
<img src="{{ asset('storage/images/' . $info->gambar1) }}" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 50px;">  
<h4 class="card-description" style="margin-bottom: 50px;">{{ $info->deskripsi2 }}</h4>      
<img src="{{ asset('storage/images/' . $info->gambar2) }}" style="display: block; margin-left: auto; margin-right: auto;">  

<!-- Include Bootstrap -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Informasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form action="{{ route('informasi.update', $info->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul: </label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $info->judul }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi1">Deskripsi 1:</label>
                <textarea class="form-control" id="deskripsi1" name="deskripsi1">{{ $info->deskripsi1 }} </textarea>
            </div>
            <div class="form-group">
                <label for="gambar1">Gambar 1:</label>
                <input type="text" class="form-control" id="gambar1" name="gambar1" value="{{ $info->gambar1 }}">
            </div>
            <div class="form-group">
                <label for="deskripsi2">Deskripsi 2:</label>
                <textarea class="form-control" id="deskripsi2" name="deskripsi2">{{ $info->deskripsi2 }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar2">Gambar 2:</label>
                <input type="text" class="form-control" id="gambar2" name="gambar2" value="{{ $info->gambar2 }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endforeach 
<!-- Include jQuery and Bootstrap JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
