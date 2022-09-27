@extends('layouts.frontend')

@section('page')
    @livewire('tracker-container', ['identifier' => $identifier])
@endsection
