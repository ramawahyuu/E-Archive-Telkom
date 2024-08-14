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
                                    <h1 style="font-size: 30px; margin-bottom: 0;">Dosens List</h1>
                                    @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('dosen.create') }}" style="font-size:14px;" class="btn btn-primary mb-3"><i class="mdi mdi-plus"></i> Add New Dosen</a>
                                @endif
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Field of PKM</th>
                                            <th>Study Program</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            @if(Auth::user()->role == 'admin')
                                            <th>Actions</th>
                                            
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosens as $dosen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dosen->id_dosen }}</td>
                                                <td>{{ $dosen->nama_dosen }}</td>
                                                <td>{{ $dosen->bidang_pkm }}</td>
                                                <td>{{ $dosen->program_studi }}</td>
                                                <td>{{ $dosen->no_tlp }}</td>
                                                <td>{{ $dosen->email }}</td>
                                                <td>
                                                    @if(Auth::user()->role == 'admin')
                                                    <a href="{{ route('dosens.edit', $dosen->id_dosen) }}" class="btn btn-edit" style="border: none;">Edit</a>
                                                                                                        <button class="btn btn-danger" style="border: none;" onclick="confirmDelete('{{ route('dosens.destroy', $dosen->id_dosen) }}')">Delete</button>
                                               @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Check for success session message and display SweetAlert -->
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
                                    // SweetAlert for delete confirmation
                                    function confirmDelete(url) {
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
                                                // Create a form dynamically to submit the deletion
                                                var form = document.createElement('form');
                                                form.method = 'POST';
                                                form.action = url;

                                                var csrfField = document.createElement('input');
                                                csrfField.type = 'hidden';
                                                csrfField.name = '_token';
                                                csrfField.value = '{{ csrf_token() }}'; // Add CSRF token

                                                var methodField = document.createElement('input');
                                                methodField.type = 'hidden';
                                                methodField.name = '_method';
                                                methodField.value = 'DELETE'; // Method spoofing

                                                form.appendChild(csrfField);
                                                form.appendChild(methodField);

                                                document.body.appendChild(form);
                                                form.submit();
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
