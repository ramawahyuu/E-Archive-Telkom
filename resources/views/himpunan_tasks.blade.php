@extends('index')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card" style="margin-top: 130px;">
            <div class="card-body">
              <h1 style="font-weight:600; font-size:30px;">Proses Pelaksanaan Program Kerja</h1>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program Kerja </th>
                                        <th>Status </th>
                                        <th>Aksi </th>
                                    </tr>
                                </thead>
                               
                                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>{{ $proposal1->program_kerja }}</td>
                    <td>{{ $proposal1->status }}</td>
                    <td><a href="{{ route('tasks2.index') }}" class="btn btn-warning">Choose</a></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>{{ $proposal2->program_kerja }}</td>
                    <td>{{ $proposal2->status }}</td>
                    <td><a href="{{ route('tasks3.index') }}" class="btn btn-warning">Choose</a></td>
                  </tr>
                </tbody>
                </table>
                                  
                                </div>
                                </div>
                                </div>
                                </div>
                                <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection