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
                    <form method="POST" action="{{ route('prestasi.update', $prestasi->id) }}"> <!-- Ensure action points to 'mahasiswa.update' -->
                        @csrf
                        @method('PUT') <!-- Correctly specify the method as PUT for updates -->
                        
                       
     <div class="form-group">
                            <label for="nama_mahasiswa">Nama Mahasiswa:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $prestasi->nama}}" required>
                        </div>
                         <div class="form-group">
                            <label for="program_studi">Program Studi:</label>
                            <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ $prestasi->program_studi }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP:</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $prestasi->nomor }}" required>
                        </div>

    <div class="form-group">
        <label for="prestasi">Prestasi:</label>
        <input type="text" class="form-control" id="prestasi" name="prestasi" value="{{ $prestasi->prestasi }}" required>
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
