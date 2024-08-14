@extends('index')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card-body">
                        <div class="card" style="margin-top: 130px;">
                            <div class="card-body" style="border: none;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h1 style="font-size: 30px; margin-bottom: 0;">Data Mahasiswa</h1>
                                    @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('mahasiswa.create') }}" style="font-size:14px;" class="btn btn-primary mb-3"><i class="mdi mdi-plus"></i> Add New Mahasiswa</a>
                                    @endif
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Program Studi</th>
                                            <th>No. HP</th>
                                            <th>Nama Tim</th>
                                            @if(Auth::user()->role == 'admin')
                                            <th>Actions</th>
                                            
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                
                                                <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                                <td>{{ $mahasiswa->program_studi }}</td>
                                                <td>{{ $mahasiswa->no_hp }}</td>
                                                <td>{{ $mahasiswa->nama_tim }}</td>
                                                <td>
                                                    @if(Auth::user()->role == 'admin')
                                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id_mahasiswa) }}" class="btn btn-edit">Edit</a>
                                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id_mahasiswa) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @if(session('success'))
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success!',
                                                text: '{{ session('success') }}',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: true
                                            });
                                        });
                                    </script>
                                @endif

                                <script>
                                    function confirmDelete(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Yes, delete it!',
                                            cancelButtonText: 'No, cancel!',
                                            reverseButtons: true
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                event.target.submit();
                                            }
                                        });
                                    }
                                </script>
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
