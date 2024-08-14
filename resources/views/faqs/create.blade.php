@extends('index') <!-- Replace with your base layout -->

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
             
                
            <div class="card" style="margin-top: 130px;">
    <h1 class="text-center mb-4">Tambah FAQ</h1>

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

    {{-- Form for creating a new FAQ --}}
    <form method="POST" action="{{ route('faqs.store') }}">
        @csrf

        <div class="form-group">
            <label for="question">Question:</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>

        <div class="form-group">
            <label for="answer">Answer:</label>
            <textarea class="form-control" id="answer" name="answer" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
