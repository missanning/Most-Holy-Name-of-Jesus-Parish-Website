@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Coffee Table Book</h2>
    <p>Browse through our parish's commemorative coffee table book.</p>
</div>
<section style="text-align:center;">
    @php $pages = collect(range(1, 91))->filter(fn($n) => file_exists(public_path("images/flipbook/{$n}.png")))->values(); @endphp
    @if($pages->count())
    <div style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center;">
        @foreach($pages as $p)
        <img src="{{ asset("images/flipbook/{$p}.png") }}" alt="Page {{ $p }}" style="height:200px; border:1px solid #e8d8c0; border-radius:4px;">
        @endforeach
    </div>
    @else
    <p style="color:var(--text2); font-style:italic;">No flipbook pages available.</p>
    @endif
</section>
@endsection
