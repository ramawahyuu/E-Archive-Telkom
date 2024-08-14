@extends('index')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
           
              
          <div class="card" style="margin-top: 130px;">
                        <div class="card-body">
                            <h1 style="font-weight:600; font-size:30px;">Pengumpulan Proposal</h1>
 @if(Auth::user()->role == 'mahasiswa')
                            <div class="text-end">
     <a href="{{ route('upload_proposal.create') }}" class="btn btn-primary">Upload Proposal</a>
                                </button>
                            </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tim </th>
                                        <th>Bidang Pkm </th>
                                        <th>Judul Proposal </th>
                                        <th>Status</th>
                                        <th>Link Revisi</th>
                                        <th>Aksi </th>
                                    </tr>
                                </thead>
                                @foreach($proposals as $proposal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $proposal->nama_tim }}</td>
                                        <td>{{ $proposal->bidang_pkm }}</td>
                                        <td>{{ $proposal->judul_proposal }}</td>
                                        <td>{{ $proposal->status }}</td>
                                        <td><a class="nav-link" target="_blank" href="{{ str_replace(url('/'), '', $proposal->link_revisi) }}">
                                                        <i class="mdi mdi-book menu-icon" style="color: #5E5E5E"></i>
                                                        <span class="menu-title">Link Revisi</span>
                                                    </a></td>
                                        <td>
                                            <a href="{{ route('upload_proposal.show', $proposal->id) }}" class="btn btn-primary" style="border: none;">Download</a>
                                           @if(Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'admin')
                                            <button type="button" class="btn btn-edit" style="border: none;" data-bs-toggle="modal" data-bs-target="#editProposalModal{{ $proposal->id }}">
                                                    <i class="mdi mdi-pencil"></i> Edit
                                                </button>   
                                           <form action="{{ route('upload_proposal.destroy', $proposal->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus SOP ini?')">Hapus</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($proposals as $proposal)
                                        
                               
                                  <div class="modal fade" id="editProposalModal{{ $proposal->id }}" tabindex="-1" aria-labelledby="editProposalModalLabel{{ $proposal->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Proposal</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
                                        </div>

                                            <form action="{{ route('upload_proposal.update', $proposal->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                               <div class="modal-body">
                                                 @if(Auth::user()->role == 'mahasiswa')
                                                <div class="form-group mb-3">
                                                    <label for="nama_tim">Nama Tim:</label>
                                                    <input type="text" class="form-control" id="nama_tim" value="{{ $proposal->nama_tim }}" name="nama_tim" required>
                                                </div>
                                                 <div class="form-group mb-3">
                                                    <label for="bidang_pkm">Bidang Pkm:</label>
                                                    <input type="text" class="form-control" id="bidang_pkm" value="{{ $proposal->bidang_pkm }}" name="bidang_pkm" required>
                                                </div>
                                                 <div class="form-group mb-3">
                                                    <label for="judul_proposal">Judul Proposal:</label>
                                                    <input type="text" class="form-control" id="judul_proposal" value="{{ $proposal->judul_proposal }}" name="judul_proposal" required>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="file">Dokumen PDF:</label><br><br>
                                                    <input type="file" name="file" accept=".pdf" required>
                                                </div>
                                                 
                                                    <div class="form-group mb-3">
                                                        <label for="status">Status:</label>
                                                        <select class="form-control" id="status" name="status" required>
                                                        <option value="revisi 1" {{ $proposal->status == 'revisi 1' ? 'selected' : '' }}>revisi 1</option>
                                                        <option value="revisi 2" {{ $proposal->status == 'revisi 2' ? 'selected' : '' }}>revisi 2</option>
                                                    <option value="revisi 3" {{ $proposal->status == 'revisi 3' ? 'selected' : '' }}>revisi 3</option>
                                                </select>
                                            </div>
                                            @endif
                                                 @if(Auth::user()->role == 'admin')
                                                    <div class="form-group mb-3">
                                                        <label for="status">Status:</label>
                                                        <select class="form-control" id="status" name="status" required>
                                                        <option value="pending" {{ $proposal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="disetujui" {{ $proposal->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                    <option value="ditolak" {{ $proposal->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                     <option value="revisi1" {{ $proposal->status == 'revisi1' ? 'selected' : '' }}>revisi1</option>
                                                      <option value="revisi2" {{ $proposal->status == 'revisi2' ? 'selected' : '' }}>revisi2</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="link_revisi">Link Revisi:</label>
                                                <input type="text" class="form-control" id="link_revisi" value="{{ $proposal->link_revisi }}" name="link_revisi">
                                            </div>
                                            @endif
                                            
                                                 
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                   
    </table>
     @endforeach

                              
                               
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                @endsection


