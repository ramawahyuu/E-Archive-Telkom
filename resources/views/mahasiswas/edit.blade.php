@extends('index')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card-body">
<div class="card" style="margin-top: 130px;">
    <div class="card-body" style="border: none;">                   
         <h1 class="text-center mb-4">Edit Mahasiswa</h1>
                    
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

                    {{-- Form for editing an existing Mahasiswa --}}
                    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id_mahasiswa) }}"> <!-- Ensure action points to 'mahasiswa.update' -->
                        @csrf
                        @method('PUT') <!-- Correctly specify the method as PUT for updates -->
                        
                        <div class="form-group">
                            <label for="nim">NIM:</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_mahasiswa">Nama Mahasiswa:</label>
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}" required>
                        </div>
                         <div class="form-group">
                            <label for="program_studi">Program Studi:</label>
                            <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ $mahasiswa->program_studi }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP:</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $mahasiswa->no_hp }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_tim">Nama Tim:</label>
                            <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="{{ $mahasiswa->nama_tim }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
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
