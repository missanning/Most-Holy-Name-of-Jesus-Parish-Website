@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>News &amp; Events</h2>
    <p>Stay updated with what's happening in our parish community.</p>
</div>
<section>
    <h3>Latest News</h3>
    <div class="news-grid">
        @foreach($news as $n)
        <div class="news-card">
            <div class="news-img">{!! $n->icon !!}</div>
            <div class="news-body">
                <div class="date">{{ $n->date_label }}</div>
                <h4>{{ $n->title }}</h4>
                <p>{{ $n->body }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section>
    <h3>Upcoming Events</h3>
    <table>
        <thead><tr><th>Date</th><th>Event</th><th>Time</th><th>Venue</th></tr></thead>
        <tbody>
            @foreach($events as $e)
            <tr>
                <td>{{ $e->event_date }}</td>
                <td>{{ $e->title }}</td>
                <td>{{ $e->time }}</td>
                <td>{{ $e->venue }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
