@extends('layouts.app')

@section('content')
    <div>
        @livewire('student')
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#exampleModal').modal('hide');
        })
    </script>
@endsection
