@extends('layouts.auth')
@section('title', 'Email Verification')
@section('contents')
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <x-logo />
                        <!-- /Logo -->
                        <h4 class="mb-2">Verify Your Email</h4>
                        {{-- <p class="mb-4">Make your app management easy and fun!</p> --}}
                        @if (session('resent'))
                            <x-alert :res="'success'" :title="'Email sent successfully'" :message="'A fresh verification link has been sent to your email address!'" />
                        @endif

                        <p>Before proceeding, please check your email for a verification link and follow the instructions.</p>
                        <p>did'nt receive an email ?</p>

                        <center>
                            <form class="" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-primary">{{ __('Request Another') }}</button>.
                            </form>
                        </center>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
