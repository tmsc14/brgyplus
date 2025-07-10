@extends('layouts.app')

@section('content')
    <div class="d-flex w-100">
        <div
            class="col-2 bg-brown-primary text-brown-secondary d-flex flex-column align-items-center p-2 full-view-height justify-content-between">
            <div class="text-center mb-2">
                <img src="{{ asset('resources/img/logo.png') }}" alt="Brgy+ Logo" class="w-50 h-auto">
            </div>
            <div class="d-flex justify-content-center mb-2">
                @if ($appearanceSettings && $appearanceSettings->logo_path)
                    <img src="{{ asset('storage/' . $appearanceSettings->logo_path) }}" class="img-fluid" alt="Barangay Logo"
                        class="w-25 h-auto">
                @else
                    <img src="{{ asset('resources/img/default-logo.png') }}" class="w-50 img-fluid"
                        alt="Default Barangay Logo" class="w-25 h-auto">
                @endif
            </div>
            @if ($_user_role == 'Captain')
                @include('layouts.partials.sidebar_barangay_captain')
            @elseif ($_user_role == 'Official')
                @include('layouts.partials.sidebar_barangay_official', ['barangay' => $barangay])
            @elseif($_user_role == 'Staff')
                @include('layouts.partials.sidebar_staff', ['barangay' => $barangay])
            @elseif($_user_role == 'Resident')
                @include('layouts.partials.sidebar_resident', ['barangay' => $barangay])
            @endif
            <form class="w-100" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="d-flex justify-content-center btn btn-secondary-brown w-100">
                    <img src="{{ asset('resources/img/sidebar-icons/logout-sblogo.png') }}" class="icon"
                        alt="Logout Icon">
                    <span>Logout</span>
                </button>
            </form>
        </div>
        <div class="bg-brown-secondary col-10">
            <div class="d-flex align-items-center text-center gap-2 p-3 border-bottom border-secondary">
                <span class="fs-1">Hello, {{ Auth::user()->staff->first_name }}!</span>
                <div class="date">
                    <img src="{{ asset('resources/img/header-date.png') }}" class="icon" alt="Date Icon">
                    {{ now()->timezone('Asia/Manila')->format('F d, Y') }}
                </div>
            </div>
            <div class="content-wrapper">
                @yield('subcontent')
            </div>
        </div>
    </div>
@endsection
