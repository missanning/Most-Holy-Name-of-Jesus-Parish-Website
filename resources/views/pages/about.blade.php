@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush
@section('content')
@php
$priests = [
    ['Rev. Fr. Rico De Vera', false],
    ['Rev. Fr. Juvenal Anthony "Juvy" S. Leonardo', false],
    ['Rev. Fr. Vito "Bobit" Realista', false],
    ['Rev. Fr. Marlu "Boyet" Marasigan', false],
    ['Rev. Fr. Danilo "Dani" Fernandez', false],
    ['Rev. Fr. Jaime "Jimmy" Niego', false],
    ['Rev. Fr. Manuel "Manny" Labing', false],
    ['Rev. Fr. Ritchie Ramos Fortus', true],
];
$milestones = [
    ['year'=>'1968','label'=>'The Beginning','title'=>'The First Shepherds Arrive','text'=>'The Military Apostolic Vicariate, led by Archbishop Gaviola of Lipa, oversaw the Resettlement Area in 1968. Religious societies — the Jesuit Fathers, S.D.B. Fathers, and C.I.M. Fathers — followed. The I.C.M. Sisters arrived and launched the <em>Kapitbahayang Pamalayan</em> program, planting the first seeds of communal faith.','img'=>'images/about-1968.png','reverse'=>false],
    ['year'=>'1974','label'=>'First Sacrament','title'=>"A Baptism Marks the Church's Birth",'text'=>'In 1974, the <strong>first sacrament</strong> was performed in the church — a baptism. The P.P.C. was formed by Gloria Gengan, Salve Veclard, and Naty Asuncion to grow communal spirituality. Rev. Fr. Joel Tabora arrived with fellow Jesuits and began construction of the church structure in Barangay Narra.','img'=>'images/about-1974.png','reverse'=>true],
    ['year'=>'1980','label'=>'Growth & Structure','title'=>'Liturgy, Leadership & a Vision for Parish','text'=>'Fr. Rene De Guzman of Don Bosco encouraged the Liturgy Ad Hoc Committee under Mateo Lee. Fr. Tito Javier arrived with a vision to transform the community into a proper parish — <em>"Kabanal-Banalang Ngalan ni Jesus"</em> — pushing through opposition with the guidance of Rev. Fr. Maximo Mañalac.','img'=>'images/about-1980.png','reverse'=>false],
    ['year'=>'1987','label'=>'Canonical Recognition','title'=>'A Parish is Born — October 10','text'=>'Most Rev. Pedro N. Bantigue D.D., Bishop of San Pablo, officially recognized the entire Resettlement Area as a parish on <strong>October 10, 1987</strong>, naming it <em>"Kabanal-Banalang Ngalan ni Jesus"</em> in canonical terms.','img'=>'images/about-1987.png','reverse'=>true],
    ['year'=>'Today','label'=>'Living Faith','title'=>'Known Across the Vicariate','text'=>'The feast day was moved to <strong>January 3</strong> under Rev. Fr. Vito Realista — a tradition honored to this day. <em>"Most Holy Name of Jesus Parish"</em> is now known not only throughout the upper villages but across the entire Vicariate of San Pedro and San Pablo Diocese.','img'=>'images/about-today.jpg','reverse'=>false],
];
@endphp
<div class="page-header">
    <h2>About Us</h2>
    <p>Know our history, our faith, and the people who built this community.</p>
</div>
<div class="meta-bar">
    <div class="meta-item"><div class="label">Established</div><div class="value">October 10, 1987</div></div>
    <div class="meta-item"><div class="label">Feast Day</div><div class="value">January 3</div></div>
    <div class="meta-item"><div class="label">Diocese</div><div class="value">San Pablo Diocese</div></div>
    <div class="meta-item"><div class="label">Anniversary</div><div class="value">October 10</div></div>
</div>
@foreach($milestones as $m)
<div class="milestone {{ $m['reverse'] ? 'reverse' : '' }}">
    <div class="img-panel">
        <img src="{{ asset($m['img']) }}" alt="{{ $m['title'] }}">
        <div class="year-overlay">{{ $m['year'] }}</div>
        <div class="year-badge">{{ $m['year'] }}</div>
    </div>
    <div class="content-panel">
        <div class="section-label">{{ $m['label'] }}</div>
        <div class="accent-rule"></div>
        <h3>{{ $m['title'] }}</h3>
        <p>{!! $m['text'] !!}</p>
    </div>
</div>
@endforeach
<div class="priests-section">
    <div class="priests-section-inner">
        <div class="section-label">Succession of Leadership</div>
        <h2>Parish Priests</h2>
        <div class="priests-grid-list">
            @foreach($priests as $i => [$name, $current])
            <div class="priest-row">
                <span class="priest-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <span class="priest-name">{{ $name }}</span>
                @if($current)<span class="priest-current">Current</span>@endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
