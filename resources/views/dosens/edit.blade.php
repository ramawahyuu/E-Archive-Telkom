@extends('index')  {{-- Assuming 'index' is your main layout file --}}

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card-body">
<div class="card" style="margin-top: 130px;">
    <div class="card-body" style="border: none;">
                            <h1 class="text-center mb-4">Edit Dosen Details</h1>

                    {{-- Display success messages --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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

                    {{-- Form for updating Dosen --}}
                    <form method="POST" action="{{ route('dosen.update', $dosen->id_dosen) }}"> {{-- Ensure the route and parameter name are correct --}}
                        @csrf
                        @method('PUT') {{-- PUT method for updating resources --}}

                        <div class="form-group">
                            <label for="id_dosen">ID Dosen:</label>
                            <input type="text" class="form-control" id="id_dosen" name="id_dosen" value="{{ $dosen->id_dosen }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen:</label>
                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ $dosen->nama_dosen }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bidang_pkm">Bidang PKM:</label>
                            <input type="text" class="form-control" id="bidang_pkm" name="bidang_pkm" value="{{ $dosen->bidang_pkm }}" required>
                        </div>

                        <div class="form-group">
                            <label for="program_studi">Program Studi:</label>
                            <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ $dosen->program_studi }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_tlp">No. Telepon:</label>
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ $dosen->no_tlp }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Dosen</button>
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
