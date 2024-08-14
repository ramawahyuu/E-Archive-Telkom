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
              @if(Auth::user()->role == 'himpunan')
              <div class="text-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProposalModal" style="margin-bottom: 10px; border-radius: 15px; background-color: #4E73DF; height: 45px;">
                  <i class="mdi mdi-plus"></i> Upload Proposal
                </button>
              </div>
              @endif
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Program Kerja </th>
                    <th>Status </th>
                    <th>Aksi </th>
                  </tr>
                </thead>
                @foreach($proposals as $proposal)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $proposal->program_kerja }}</td>
                  <td>{{ $proposal->status }}</td>
                  <td>
                    <a href="{{ route('upload_proposal_himpunan.show', $proposal->id) }}" class="btn btn-primary btn-sm">Download</a>
                    @if(Auth::user()->role == 'himpunan')
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editProposalModal{{ $proposal->id }}">
                      <i class="mdi mdi-pencil"></i> Edit
                    </button>
                    <form action="{{ route('upload_proposal_himpunan.destroy', $proposal->id) }}" method="post" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus SOP ini?')">Hapus</button>
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              </table>
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
                    <form action="{{ route('upload_proposal_himpunan.update', $proposal->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group mb-3">
                          <label for="program_kerja">Program Kerja:</label>
                          <input type="text" class="form-control" id="program_kerja" value="{{ $proposal->program_kerja }}" name="program_kerja" required>
                        </div>
                        <div class="form-group mb-3">
                          <label for="status">Status:</label>
                          <input type="text" class="form-control" id="status" value="{{ $proposal->status }}" name="status" required>
                        </div>
                        <div class="form-group">
                          <label for="file">Dokumen PDF:</label><br><br>
                          <input type="file" name="file" accept=".pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- The Modal -->
              <div class="modal fade" id="addProposalModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Upload Proposal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                      <form action="{{ route('upload_proposal_himpunan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="program_kerja">Program Kerja</label>
                          <input type="text" class="form-control" id="program_kerja" name="program_kerja" required>
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="form-group">
                          <label for="file">Dokumen PDF:</label><br><br>
                          <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

<script>
  // Simpan token CSRF di local storage saat pengguna login
  localStorage.setItem('csrfToken', '{{ csrf_token() }}');
</script>
