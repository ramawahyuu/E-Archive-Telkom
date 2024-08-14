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
                    

                    {{-- Form for creating a new Dosen --}}
                    
                    <form method="POST" action="{{ route('dosen.store') }}">
                        @csrf
                        <div class="card-header">
                            Tambah Data Dosen
                        </div>
                        <div class="form-group" style="border: 1px solid #7A7878; padding-bottom: 64px;">
                            <div class="row mb-3" style="margin:10px">
                                <label for="namaLengkap" class="col-sm-3 col-form-label">ID Dosen</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="dosen_id" placeholder="Dosen ID" style="border: 1px solid #7A7878;" name="id_dosen">
                                </div>
                            </div>

                            <div class="row mb-3" style="margin:10px">
                                <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" style="border: 1px solid #7A7878;" name="nama_dosen">
                                </div>
                            </div>
                        
                            <div class="row mb-3" style="margin:10px">
                                <label for="bidangPKM" class="col-sm-3 col-form-label">Bidang PKM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bidangPKM" placeholder="Bidang PKM" style="border: 1px solid #7A7878;" name="bidang_pkm">
                                </div>
                            </div>
                            <div class="row mb-3" style="margin:10px">
                                <label for="programStudi" class="col-sm-3 col-form-label">Program Studi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="programStudi" placeholder="Program Studi" style="border: 1px solid #7A7878;" name="program_studi">
                                </div>
                            </div>
                            <div class="row mb-3" style="margin:10px">
                                <label for="noHandphone" class="col-sm-3 col-form-label">No. Handphone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noHandphone" placeholder="No. Handphone" style="border: 1px solid #7A7878;" name="no_tlp">
                                </div>
                            </div>
                            <div class="row mb-3" style="margin:10px">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" placeholder="Email" style="border: 1px solid #7A7878;" name="email">
                                </div>
                            </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
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