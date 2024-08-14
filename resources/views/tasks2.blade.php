@extends('index')

@section('content')
<style>
  .gantt-container {
    overflow-x: auto;
    /* Enables horizontal scrolling */
  }

  .gantt-chart {
    border-collapse: collapse;
    width: 100%;
    min-width: 600px;
    /* Minimum width of the chart */
  }

  .gantt-chart th,
  .gantt-chart td {
    border: 1px solid #000000;
    text-align: center;
    color: #000000;
    padding: 8px;
  }

  .gantt-chart th {
    background-color: #f4f4f4;
    color: #000000;
    /* Light grey background for headers */
  }

  .gantt-chart .planning {
    background-color: #0EE009;
    /* Green for planning */
  }

  .gantt-chart .execution {
    background-color: #EDFFED;
    /* Blue for execution */
  }

  /* Specific day columns */
  .gantt-chart th:nth-child(n+3),
  .gantt-chart td:nth-child(n+3) {
    width: 20px;
    /* Width of day columns */
    min-width: 20px;
  }

  .text-left {
    text-align: left;
  }
</style>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card" style="margin-top: 130px;">
            <div class="card-body">
              <h1 style="font-weight:600; font-size:30px;">Regenerasi Kepemimpinan Himpunan</h1>
              @if(Auth::user()->role == 'himpunan'||Auth::user()->role == 'admin')
              <div class="text-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal" style="margin-bottom: 10px; border-radius: 15px; background-color: #4E73DF; height: 45px;">
                  <i class="mdi mdi-plus"></i> Tambah Task
                </button>
              </div>
@endif
              <!-- Dropdown for month filter -->
              <!-- Dropdown for month filter -->
              <div class="form-group d-flex align-items-end">
                <div>
                  <label for="monthFilter">Pilih Bulan:</label>
                  <select id="monthFilter" class="form-control">
                    <option value="">Semua Bulan</option>
                    @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}" {{ $i == date('n') ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                      @endfor
                  </select>
                </div>
                <button type="button" class="btn btn-primary ml-2" id="filterButton">Filter</button>
              </div>

              <div class="gantt-container">
                <table class="gantt-chart">
                  <thead>
                    <tr>
                      <th rowspan="2">Agenda</th>
                      <th rowspan="2">Durasi (Hari)</th>
                      <th rowspan="2"></th>
                      <th colspan="31">Tanggal</th>
                      <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                      @for ($i = 1; $i <= 31; $i++) <th>{{ $i }}</th>
                        @endfor
                    </tr>
                  </thead>
                  <tbody id="ganttBody">
                    <!-- Section for Kemahasiswaan -->
                    <tr>
                      <th colspan="35" style="text-align: left;">Himpunan</th>
                    </tr>
                    @foreach($tasks as $task)
                    @if($task->jenis_agenda == 'kemahasiswaan')
                    <tr>
                      <td rowspan="2">{{ $task->agenda }}</td>
                      <td>{{ $task->duration_plan }}</td>
                      <td>R</td>
                      @php
                      $startDayPlanning = date('j', strtotime($task->tgl_mulai_r));
                      $endDayPlanning = date('j', strtotime($task->tgl_selesai_r));
                      $colspanPlanning = $endDayPlanning - $startDayPlanning + 1;
                      $emptyCellsBeforePlanning = $startDayPlanning - 1;
                      $emptyCellsAfterPlanning = 31 - $endDayPlanning;
                      @endphp
                      <td colspan="{{ $emptyCellsBeforePlanning }}"></td>
                      <td colspan="{{ $colspanPlanning }}" class="planning"></td>
                      <td colspan="{{ $emptyCellsAfterPlanning }}"></td>
                      <td rowspan="2">
                        @if(Auth::user()->role == 'admin'|| Auth::user()->role == 'himpunan')
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $task->id }}">
                          <i class="mdi mdi-pencil"></i> Edit
                        </button>
                        <form action="{{ route('tasks2.destroy', $task->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete(event)">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0; padding: 10px 20px;">Delete</button>
                        </form>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>{{ $task->duration_execute }}</td>
                      <td>P</td>
                      @php
                      $startDayExecution = date('j', strtotime($task->tgl_mulai_p));
                      $endDayExecution = date('j', strtotime($task->tgl_selesai_p));
                      $colspanExecution = $endDayExecution - $startDayExecution + 1;
                      $emptyCellsBeforeExecution = $startDayExecution - 1;
                      $emptyCellsAfterExecution = 31 - $endDayExecution;
                      @endphp
                      <td colspan="{{ $emptyCellsBeforeExecution }}"></td>
                      <td colspan="{{ $colspanExecution }}" class="execution"></td>
                      <td colspan="{{ $emptyCellsAfterExecution }}"></td>
                    </tr>
                    @endif
                    @endforeach

                    <!-- Section for Mahasiswa -->
                    <tr>
                      <th colspan="35" style="text-align: left;">Kemahasiswaan FRI</th>
                    </tr>
                    @foreach($tasks as $task)
                    @if($task->jenis_agenda == 'mahasiswa')
                    <tr>
                      <td rowspan="2">{{ $task->agenda }}</td>
                      <td>{{ $task->duration_plan }}</td>
                      <td>R</td>
                      @php
                      $startDayPlanning = date('j', strtotime($task->tgl_mulai_r));
                      $endDayPlanning = date('j', strtotime($task->tgl_selesai_r));
                      $colspanPlanning = $endDayPlanning - $startDayPlanning + 1;
                      $emptyCellsBeforePlanning = $startDayPlanning - 1;
                      $emptyCellsAfterPlanning = 31 - $endDayPlanning;
                      @endphp
                      <td colspan="{{ $emptyCellsBeforePlanning }}"></td>
                      <td colspan="{{ $colspanPlanning }}" class="planning"></td>
                      <td colspan="{{ $emptyCellsAfterPlanning }}"></td>
                      <td rowspan="2">
                        @if(Auth::user()->role == 'admin'|| Auth::user()->role == 'himpunan')
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $task->id }}">
                          <i class="mdi mdi-pencil"></i> Edit
                        </button>
                        <form action="{{ route('tasks2.destroy', $task->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete(event)">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0; padding: 10px 20px;">Delete</button>
                        </form>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>{{ $task->duration_execute }}</td>
                      <td>P</td>
                      @php
                      $startDayExecution = date('j', strtotime($task->tgl_mulai_p));
                      $endDayExecution = date('j', strtotime($task->tgl_selesai_p));
                      $colspanExecution = $endDayExecution - $startDayExecution + 1;
                      $emptyCellsBeforeExecution = $startDayExecution - 1;
                      $emptyCellsAfterExecution = 31 - $endDayExecution;
                      @endphp
                      <td colspan="{{ $emptyCellsBeforeExecution }}"></td>
                      <td colspan="{{ $colspanExecution }}" class="execution"></td>
                      <td colspan="{{ $emptyCellsAfterExecution }}"></td>
                    </tr>
                    @endif
                    @endforeach

              </div>


              @foreach($tasks as $task)
              <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel{{ $task->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Task</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
                    </div>
                    <form action="{{ route('tasks2.update', $task->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group mb-3">
                          <label for="agenda">Agenda:</label>
                          <input type="text" class="form-control" id="agenda" value="{{ $task->agenda }}" name="agenda" required>
                        </div>
                        <div class="form-group mb-3">
                          <label for="jenis_agenda">Jenis Agenda:</label>
                          <select class="form-control" id="jenis_agenda" name="jenis_agenda" required>
                            <option value="kemahasiswaan">Himpunan</option>
                            <option value="mahasiswa">Kemahasiswaan FRI</option>
                          </select>
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
                  </div>

                  <!-- Modal Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            </tbody>
            </table>
          </div>


          <!-- Modal for adding a new task -->
          <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Task</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('tasks2.store') }}" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group mb-3">
                      <label for="agenda">Agenda:</label>
                      <input type="text" class="form-control" id="agenda" name="agenda" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="jenis_agenda">Jenis Agenda:</label>
                      <select class="form-control" id="jenis_agenda" name="jenis_agenda" required>
                        <option value="kemahasiswaan">Himpunan</option>
                        <option value="mahasiswa">Kemahasiswaan</option>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label for="duration_plan">Durasi Rencana (Hari):</label>
                      <input type="number" class="form-control" id="duration_plan" name="duration_plan" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="duration_execute">Durasi Eksekusi (Hari):</label>
                      <input type="number" class="form-control" id="duration_execute" name="duration_execute" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tgl_mulai_p">Tanggal Mulai Rencana:</label>
                      <input type="date" class="form-control" id="tgl_mulai_r" name="tgl_mulai_p" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tgl_selesai_p">Tanggal Selesai Rencana:</label>
                      <input type="date" class="form-control" id="tgl_selesai_r" name="tgl_selesai_p" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tgl_mulai_r">Tanggal Mulai Pelaksanaan:</label>
                      <input type="date" class="form-control" id="tgl_mulai_p" name="tgl_mulai_r" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="tgl_selesai_r">Tanggal Selesai Pelaksanaan:</label>
                      <input type="date" class="form-control" id="tgl_selesai_p" name="tgl_selesai_r" required>
                    </div>
                    <div class="form-group mb-3">
                      <label for="pengubah">Pengubah:</label>
                      <input type="text" class="form-control" value="{{ Auth::user()->id }}" id="pengubah" name="pengubah" required readonly>
                    </div>
                    <div class="form-group mb-3">
                      <label for="alasan">Alasan:</label>
                      <input type="text" class="form-control" id="alasan" name="alasan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>

              <!-- Modal Footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Log History Section -->
        <h1 style="margin-top:20px; font-weight:800; font-size:30px;">Log History</h1>
        <div class="table-responsive mb-4">
          <table class="table table-bordered">
            <tbody>
              @foreach($tasks as $task)
              <tr>
                <td style="width: 10%; text-align: center;">
                  <div style="width: 50px; height: 50px; background-color: #f0f0f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="mdi mdi-account" style="font-size: 24px;"></i>
                  </div>
                </td>
                <td style="width: 90%;">
                  <div>
                    <strong>{{ $task->agenda }}</strong>

                    <p>{{ $task->description }} Selesai pada tanggal {{ $task->tgl_selesai_p }} </p>

                    <p><strong>Note:</strong>

                      {{ $task->pengubah }}</b> {{ $task->alasan }}
                    </p>
                  </div>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>

        <h1>Timeline</h1>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Rencana</th>
              <th>Tanggal Pelaksanaan</th>
              <th>Kegiatan</th>
            </tr>
          </thead>
          @foreach($tasks as $task)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $task->tgl_mulai_r }} - {{ $task->tgl_selesai_r }}</td>
            <td>{{ $task->tgl_mulai_p }} - {{ $task->tgl_selesai_p }}</td>
            <td>{{ $task->agenda }}</td>
          </tr>
          @endforeach
          <script>
            document.getElementById('filterButton').addEventListener('click', function() {
              var month = document.getElementById('monthFilter').value;
              console.log("Selected month:", month); // Debugging line
              window.location.href = "{{ url('/tasks/tasks') }}?month=" + month;
            });
          </script>
          <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

          @endsection