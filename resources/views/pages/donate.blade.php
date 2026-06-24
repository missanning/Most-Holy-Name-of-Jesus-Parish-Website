@extends('layouts.app')
@section('content')
<div class="page-header">
    <h2>Donate</h2>
    <p>Your generosity helps sustain our parish ministries and outreach programs.</p>
</div>
<div class="donate-box">
    <h3>Support Our Parish</h3>
    <p>Every gift, no matter the size, makes a difference in the lives of our community members and those we serve.</p>
    <form action="#" method="post">
        @csrf
        <label style="text-align:left; font-weight:bold; color:#1a3a5c;">Select Amount</label>
        <div class="amount-btns">
            <button type="button" class="amount-btn" onclick="setAmount(200)">₱200</button>
            <button type="button" class="amount-btn" onclick="setAmount(500)">₱500</button>
            <button type="button" class="amount-btn" onclick="setAmount(1000)">₱1,000</button>
            <button type="button" class="amount-btn" onclick="setAmount(2000)">₱2,000</button>
        </div>
        <input type="number" name="amount" id="amount" placeholder="Or enter custom amount (₱)" min="1" required>
        <select name="purpose">
            <option value="">-- Donation Purpose --</option>
            <option>General Parish Fund</option>
            <option>Church Maintenance</option>
            <option>Outreach & Charity</option>
            <option>Youth Ministry</option>
            <option>Music Ministry</option>
            <option>Religious Education</option>
        </select>
        <input type="text" name="name" placeholder="Your Full Name" required>
        <input type="email" name="email" placeholder="Your Email Address" required>
        <button type="submit">Donate Now &#10084;</button>
    </form>
</div>
<section style="text-align:center; margin-top:40px;">
    <h3>Other Ways to Give</h3>
    <p>Bank Transfer: <strong>Holy Family Parish Account</strong><br>Bank: BPI | Account No.: <strong>1234-5678-90</strong></p>
    <p style="margin-top:10px;">You may also drop your offering in the collection basket during Mass or at the parish office.</p>
</section>
@push('scripts')
<script>
function setAmount(val) {
    document.getElementById('amount').value = val;
    document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('selected'));
    event.target.classList.add('selected');
}
</script>
@endpush
@endsection
