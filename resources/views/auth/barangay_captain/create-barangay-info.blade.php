@extends('layouts.create-barangay')

@section('title', 'Barangay Info')

@section('content')
<form action="{{ route('barangay_captain.create_barangay_info') }}" method="POST" id="barangay-info-form">
    @csrf
    <div class="form-group">
        <label for="barangay_name">Barangay Name/Title:</label>
        <input type="text" name="barangay_name" id="barangay_name" 
               value="{{ old('barangay_name', $barangay->barangay_name ?? $geographicData['barangayDesc']) }}" required readonly>
    </div>
    <div class="form-group">
        <label for="barangay_email">Barangay Email Address:</label>
        <input type="email" name="barangay_email" id="barangay_email" 
               value="{{ old('barangay_email', $barangay->barangay_email ?? '') }}" required>
    </div>
    <div class="form-group">
        <p>Barangay Complete Address</p>
        <label for="barangay_complete_address_1">Line 1</label>
        <input type="text" name="barangay_complete_address_1" id="barangay_complete_address_1" 
               value="{{ old('barangay_complete_address_1', $barangay->barangay_complete_address_1 ?? '') }}" required>
        <label for="barangay_complete_address_2">Line 2</label>
        <input type="text" name="barangay_complete_address_2" id="barangay_complete_address_2" 
               value="{{ old('barangay_complete_address_2', $barangay->barangay_complete_address_2 ?? '') }}">
    </div>
    <div class="form-group">
        <label for="barangay_office_address">Barangay Office Address:</label>
        <input type="text" name="barangay_office_address" id="barangay_office_address" 
               value="{{ old('barangay_office_address', $barangay->barangay_office_address ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="barangay_description">Barangay Description:</label>
        <textarea name="barangay_description" id="barangay_description" required>{{ old('barangay_description', $barangay->barangay_description ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="barangay_contact_number">Barangay Contact Number:</label>
        <input type="text" name="barangay_contact_number" id="barangay_contact_number" 
               value="{{ old('barangay_contact_number', $barangay->barangay_contact_number ?? '') }}" required>
    </div>

    <button type="submit" class="btn-primary">Next</button>
</form>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const featuresNavLink = document.getElementById('features-settings-link');
        const appearanceNavLink = document.getElementById('appearance-settings-link');

        // Allow free navigation to Features and Appearance pages without form validation
        featuresNavLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = this.href;
        });

        appearanceNavLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = this.href;
        });
    });
</script>
@endsection
