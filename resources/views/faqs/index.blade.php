@extends('index') <!-- Replace with your base layout -->

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card-body">
                        <div class="card" style="margin-top: 130px;">
                            <div class="card-body" style="border: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
        <h1 style="font-weight: 800; font-size: 30px; margin-bottom: 0;">Frequently Asked Questions</h1>
        @if(Auth::user()->role == 'admin')
        <a href="{{ route('faqs.create') }}" class="btn btn-primary">+ Tambah Data</a>
        @endif
    </div>
    <div class="faq-list" style="margin-top:50px">
        @forelse($faqs as $faq)
            <div class="faq-item d-flex mb-4">
                <div class="faq-number" style="flex-shrink: 0; font-size: 36px; margin-right: 20px;">
                    {{ $loop->iteration }}.
                </div>
                <div class="faq-text">
                    <strong style="font-size: 24px;">{{ $faq->question }}</strong>
                    <p style="font-size: 20px;">{{ $faq->answer }}</p>
                </div>
            </div>
        @empty
            <div class="no-faqs">
                No FAQs available.
            </div>
        @endforelse
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
