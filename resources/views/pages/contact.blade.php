@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Contact Us</h2>
    <p>We'd love to hear from you. Reach out for any parish inquiries.</p>
</div>
@if(session('success'))
<div style="background:#fdf5e8; border:1px solid #c8903a; padding:16px; border-radius:3px; margin-bottom:20px; color:#5a3010;">
    &#10003; {{ session('success') }}
</div>
@endif
<div class="contact-grid">
    <div class="contact-info">
        <h3>Parish Information</h3>
        <p><strong>&#128205; Address:</strong><br>Resettlement Area, Brgy. Narra,<br>Upper Village, San Pedro City, Laguna 4023</p>
        <p><strong>&#128222; Telephone:</strong><br>(02) 8868-2255</p>
        <p><strong>&#128336; Office Hours:</strong><br>Tuesday – Sunday: 9:00 AM – 12:00 NN, 2:00 PM – 5:00 PM<br>Monday &amp; Holidays: <em>Closed</em></p>
        <h3 style="margin-top:28px;">Appointments &amp; Confession</h3>
        <p>Sacramental appointments including <strong>Confession</strong>, <strong>Baptism</strong>, and <strong>Matrimony</strong> are scheduled by contacting the parish office directly during office hours.</p>
        <p><strong>&#128222; (02) 8868-2255</strong></p>
        <h3 style="margin-top:28px;">Mass Schedule Reminder</h3>
        <p>Tue – Fri: <strong>5:30 PM</strong><br>Saturday: <strong>6:30 AM</strong><br>Sunday: <strong>7:00 AM</strong> &amp; <strong>6:30 PM</strong><br>Monday: <em>No Mass</em></p>
    </div>
    <div>
        <h3 style="font-family:'Playfair Display',serif; color:#6b1010; margin-bottom:20px;">Send Us a Message</h3>
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf
            <input type="text" name="name" placeholder="Your Full Name" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Your Email Address" value="{{ old('email') }}" required>
            <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
            <textarea name="message" placeholder="Your message...">{{ old('message') }}</textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>
<section style="margin-top:50px;">
    <h3>Find Us</h3>
    <div style="border-radius:3px; overflow:hidden; border:1px solid #e8d8c0;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.6686952643695!2d121.02285337580992!3d14.330666986124363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d70006ff62e5%3A0x1301dd2b25900124!2sMost%20Holy%20Name%20of%20Jesus%20Parish%20Church%20-%20(Diocese%20of%20San%20Pablo)%20San%20Pedro%2C%20Laguna!5e0!3m2!1sen!2sph!4v1782112514782!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
    </div>
    <p style="margin-top:10px; font-size:.85rem; color:#9a7a58; font-style:italic;">&#128205; Resettlement Area, Brgy. Narra, Upper Village, San Pedro City, Laguna 4023</p>
</section>
@endsection
