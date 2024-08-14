@extends('index')

@section('content')
<!-- Tabel dan konten lainnya -->

<!-- Modal untuk Edit -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTaskForm" method="post" action="tasks.update">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" id="taskId" name="id" value="">
                    <div class="form-group">
                        <label for="editAgenda">Agenda:</label>
                        <input type="text" class="form-control" id="editAgenda" name="agenda" required>
                    </div>
                    <div class="form-group">
                        <label for="editDurationPlan">Durasi Rencana (Hari):</label>
                        <input type="number" class="form-control" id="editDurationPlan" name="duration_plan" required>
                    </div>
                    <div class="form-group">
                        <label for="editDurationExecute">Durasi Eksekusi (Hari):</label>
                        <input type="number" class="form-control" id="editDurationExecute" name="duration_execute" required>
                    </div>
                    <div class="form-group">
                        <label for="editTglMulaiP">Tanggal Mulai Rencana:</label>
                        <input type="date" class="form-control" id="editTglMulaiP" name="tgl_mulai_p" required>
                    </div>
                    <div class="form-group">
                        <label for="editTglSelesaiP">Tanggal Selesai Rencana:</label>
                        <input type="date" class="form-control" id="editTglSelesaiP" name="tgl_selesai_p" required>
                    </div>
                    <div class="form-group">
                        <label for="editTglMulaiR">Tanggal Mulai Pelaksanaan:</label>
                        <input type="date" class="form-control" id="editTglMulaiR" name="tgl_mulai_r" required>
                    </div>
                    <div class="form-group">
                        <label for="editTglSelesaiR">Tanggal Selesai Pelaksanaan:</label>
                        <input type="date" class="form-control" id="editTglSelesaiR" name="tgl_selesai_r" required>
                    </div>
                    <div class="form-group">
                        <label for="editPengubah">Pengubah:</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->id }}" id="editPengubah" name="pengubah" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editAlasan">Alasan:</label>
                        <input type="text" class="form-control" id="editAlasan" name="alasan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
