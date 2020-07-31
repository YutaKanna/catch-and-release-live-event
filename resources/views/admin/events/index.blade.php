@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <div class="card-deck">
                @foreach($events as $event)
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $event->file_name) }}" class="card-img-top"  alt="100%x160"  style="height: 160px; width: 100%; display: block;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('admin.events.show', $event) }}">{{ $event->name }}</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
