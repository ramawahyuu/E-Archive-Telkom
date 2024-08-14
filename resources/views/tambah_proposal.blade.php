@extends('index')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card" style="margin-top: 130px;">
            <div class="card-body">
              <h1 style="font-weight:600; font-size:30px;">Tambah Proposal</h1>
              <form action="{{ route('upload_proposal.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                  <label for="nama_tim">Nama Tim:</label>
                  <input type="text" class="form-control" id="nama_tim" name="nama_tim" required>
                </div>
                <div class="form-group mb-3">
                  <label for="bidang_pkm">Bidang Pkm:</label>
                  <input type="text" class="form-control" id="bidang_pkm" name="bidang_pkm" required>
                </div>
                <div class="form-group mb-3">
                  <label for="judul_proposal">Judul Proposal:</label>
                  <input type="text" class="form-control" id="judul_proposal" name="judul_proposal" required>
                </div>
                <div class="form-group">
                  <label for="file">Dokumen PDF:</label><br><br>
                  <input type="file" name="file" accept=".pdf" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('upload_proposal.index') }}" class="btn btn-danger">Batal</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
