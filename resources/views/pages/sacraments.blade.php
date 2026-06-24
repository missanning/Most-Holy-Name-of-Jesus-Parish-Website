@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Sacraments</h2>
    <p>The seven sacraments of the Catholic Church — signs of God's grace in our lives.</p>
</div>
<div class="sacraments-grid">
    @foreach($sacraments as $s)
    <div class="sacrament-card">
        <div class="sacrament-img">
            @if(file_exists(public_path($s->img)))
                <img src="{{ asset($s->img) }}" alt="{{ $s->name }}">
            @else
                <div class="sacrament-img-placeholder">
                    <span>&#9769;</span>
                </div>
            @endif
            <div class="sacrament-label">{{ $s->label }}</div>
        </div>
        <div class="sacrament-body">
            <h3>{{ $s->name }}</h3>
            <p>{{ $s->description }}</p>
            <a href="{{ url('contact') }}" class="sacrament-link">Inquire &rarr;</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
