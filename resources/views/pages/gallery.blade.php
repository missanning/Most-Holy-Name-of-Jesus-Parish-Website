@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Gallery</h2>
    <p>A glimpse of our parish life, events, and celebrations.</p>
</div>
<section>
    <h3>Parish Life</h3>
    @if($photos->count())
    <div class="gallery-grid">
        @foreach($photos as $g)
        <div class="gallery-item" title="{{ $g->caption }}">
            <img src="{{ asset('images/' . $g->filename) }}" alt="{{ $g->caption }}" style="width:100%;height:100%;object-fit:cover;">
        </div>
        @endforeach
    </div>
    @else
    <p style="color:var(--text2);text-align:center;font-style:italic;">No photos yet. Upload images from the Admin panel.</p>
    @endif
</section>
@endsection
