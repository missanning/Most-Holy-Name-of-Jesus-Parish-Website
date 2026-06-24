@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Mass Schedule</h2>
    <p>Join us in celebrating the Eucharist. All are welcome.</p>
</div>
<section>
    <h3>Weekly Mass Schedule</h3>
    <table>
        <thead><tr><th>Day</th><th>Time</th><th>Notes</th></tr></thead>
        <tbody>
            @foreach($weekly as $r)
            <tr><td>{{ $r->col1 }}</td><td>{{ $r->col2 }}</td><td>{{ $r->col3 }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top:14px;font-size:.88rem;color:#9a7a58;font-style:italic;">* Please confirm the latest schedule with the parish office.</p>
</section>
<section>
    <h3>Holy Day Masses</h3>
    <table>
        <thead><tr><th>Holy Day</th><th>Masses</th></tr></thead>
        <tbody>
            @foreach($holyday as $r)
            <tr><td>{{ $r->col1 }}</td><td>{{ $r->col2 }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top:14px;font-size:.88rem;color:#9a7a58;font-style:italic;">Specific times are announced each year through parish bulletins and social media.</p>
</section>
<section>
    <h3>Confession Schedule</h3>
    <table>
        <thead><tr><th>Day</th><th>Time</th></tr></thead>
        <tbody><tr><td>By Appointment</td><td>Contact the Parish Office</td></tr></tbody>
    </table>
    <p style="margin-top:14px;font-size:.88rem;color:#9a7a58;font-style:italic;">Confession is currently available by appointment only.</p>
</section>
<section>
    <h3>Parish Office Hours</h3>
    <table>
        <thead><tr><th>Day</th><th>Hours</th></tr></thead>
        <tbody>
            @foreach($office as $r)
            <tr><td>{{ $r->col1 }}</td><td>{{ $r->col2 }}</td></tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
