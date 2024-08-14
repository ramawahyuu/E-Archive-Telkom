@extends('index')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">                
            <div class="card" style="margin-top: 130px;">
                
                {{-- Display validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form for creating a new Mahasiswa --}}
                <form method="POST" action="{{ route('mahasiswa.store') }}">
                    @csrf
                     <h1 class="text-center mb-4">Tambah Data Mahasiswa</h1>
                    
                        
                        <div class="row mb-3" style="margin:10px">
                            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim" placeholder="NIM" style="border: 1px solid #7A7878;" name="nim" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3" style="margin:10px">
                            <label for="nama_mahasiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_mahasiswa" placeholder="Nama Mahasiswa" style="border: 1px solid #7A7878;" name="nama_mahasiswa" required>
                            </div>
                        </div>
                         <div class="row mb-3" style="margin:10px">
                            <label for="program_studi" class="col-sm-3 col-form-label">Program Studi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="program_studi" placeholder="Program Studi" style="border: 1px solid #7A7878;" name="program_studi" required>
                            </div>
                        </div>
                    
                        <div class="row mb-3" style="margin:10px">
                            <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_hp" placeholder="No. HP" style="border: 1px solid #7A7878;" name="no_hp" required>
                            </div>
                        </div>

                        <div class="row mb-3" style="margin:10px">
                            <label for="nama_tim" class="col-sm-3 col-form-label">Nama Tim</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_tim" placeholder="Nama Tim" style="border: 1px solid #7A7878;" name="nama_tim" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
