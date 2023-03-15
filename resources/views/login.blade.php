@extends('layouts.log')

@section('title', 'Login')

@section('content')

    @livewire('auth.login')

    @push('script')
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    @endpush
@endsection
