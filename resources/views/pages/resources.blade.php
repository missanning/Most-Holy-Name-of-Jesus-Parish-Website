@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Resources</h2>
    <p>Faith formation materials, parish documents, and helpful links.</p>
</div>
<section>
    <h3>Parish Documents</h3>
    <ul>
        @foreach($documents as $r)
        <li>{!! $r->icon !!} {{ $r->title }} — <a href="{{ $r->url }}" target="_blank">Download</a></li>
        @endforeach
    </ul>
</section>
<section>
    <h3>Faith Formation</h3>
    <ul>
        @foreach($faith as $r)
        <li>{!! $r->icon !!} <a href="{{ $r->url }}" target="_blank">{{ $r->title }}</a></li>
        @endforeach
    </ul>
</section>
<section>
    <h3>Prayers &amp; Devotions</h3>
    <table>
        <thead><tr><th>Prayer</th><th>Schedule</th></tr></thead>
        <tbody>
            @foreach($devotions as $r)
            <tr><td>{{ $r->title }}</td><td>{{ $r->col2 }}</td></tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
