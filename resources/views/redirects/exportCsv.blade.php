@extends('layouts.app')

<!-- Simulate a redirect -->

@push('head')
    <script>
        window.location.replace("{{route('index')}}")
    </script>
@endpush