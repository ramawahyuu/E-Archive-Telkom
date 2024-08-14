@extends('index')

@section('content')

<form action="{{ route('tasks.update', $task->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="agenda">Agenda:</label>
        <input type="text" class="form-control" id="agenda" value="{{ $task->agenda }}" name="agenda" required>
    </div>
    <div class="form-group mb-3">
        <label for="jenis_agenda">Jenis Agenda:</label>
        <input type="text" class="form-control" id="jenis_agenda" value="{{ $task->jenis_agenda }}" name="jenis_agenda" required>
    </div>
    <div class="form-group mb-3">
        <label for="duration_plan">Durasi Rencana (Hari):</label>
        <input type="number" class="form-control" id="duration_plan" value="{{ $task->duration_plan }}" name="duration_plan" required>
    </div>
    <div class="form-group mb-3">
        <label for="duration_execute">Durasi Eksekusi (Hari):</label>
        <input type="number" class="form-control" id="duration_execute" value="{{ $task->duration_execute }}" name="duration_execute" required>
    </div>
    <div class="form-group mb-3">
        <label for="tgl_mulai_r">Tanggal Mulai Rencana:</label>
        <input type="date" class="form-control" id="tgl_mulai_r" value="{{ $task->tgl_mulai_r }}" name="tgl_mulai_r" required>
    </div>
    <div class="form-group mb-3">
        <label for="tgl_selesai_r">Tanggal Selesai Rencana:</label>
        <input type="date" class="form-control" id="tgl_selesai_r" value="{{ $task->tgl_selesai_r }}" name="tgl_selesai_r" required>
    </div>
    <div class="form-group mb-3">
        <label for="tgl_mulai_p">Tanggal Mulai Pelaksanaan:</label>
        <input type="date" class="form-control" id="tgl_mulai_p" value="{{ $task->tgl_mulai_p }}" name="tgl_mulai_p" required>
    </div>
    <div class="form-group mb-3">
        <label for="tgl_selesai_p">Tanggal Selesai Pelaksanaan:</label>
        <input type="date" class="form-control" id="tgl_selesai_p" value="{{ $task->tgl_selesai_p }}" name="tgl_selesai_p" required>
    </div>
    <div class="form-group mb-3">
        <label for="pengubah">Pengubah:</label>
        <input type="text" class="form-control" value="{{ Auth::user()->id }}" id="pengubah" name="pengubah" required readonly>
    </div>
    <div class="form-group mb-3">
        <label for="alasan">Alasan:</label>
        <input type="text" class="form-control" id="alasan" value="{{ $task->alasan }}" name="alasan" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection