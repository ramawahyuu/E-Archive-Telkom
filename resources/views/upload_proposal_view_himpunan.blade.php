// resources/views/upload_proposal.blade.php


<h1>{{ $proposal->nama_tim }}</h1>


    <embed src="{{ asset('storage/uploads/' . $proposal->file) }}" type="application/pdf" width="100%" height="100%">

