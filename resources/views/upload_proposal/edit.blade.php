 @extends('index')

@section('content')
 <div class="modal fade" id="editProposalModal{{ $proposal->id }}" tabindex="-1" aria-labelledby="editProposalModalLabel{{ $proposal->id }}" aria-hidden="true"> <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Proposal</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                            <form action="{{ route('upload_proposal.update', $proposals->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                               <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="nama_tim">Nama Tim:</label>
                                                    <input type="text" class="form-control" id="nama_tim" value="{{ $proposals->nama_tim }}" name="nama_tim" required>
                                                </div>
                                                 <div class="form-group mb-3">
                                                    <label for="bidang_pkm">Bidang Pkm:</label>
                                                    <input type="text" class="form-control" id="bidang_pkm" value="{{ $proposals->bidang_pkm }}" name="bidang_pkm" required>
                                                </div>
                                                 <div class="form-group mb-3">
                                                    <label for="judul_proposal">Judul Proposal:</label>
                                                    <input type="text" class="form-control" id="judul_proposal" value="{{ $proposals->judul_proposal }}" name="judul_proposal" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>

                                    </div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                                    @endsection