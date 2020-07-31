@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ asset('storage/images/' . $event->file_name) }}" class="card-img-top"  alt="100%x160"  style="height: 160px; width: 100%; display: block;">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12"><h3>{{ $event->name ?? '' }}</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">■イベントの説明</div>
                    <div class="col-sm-12">{{ $event->description ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr /></div>
                </div>
            </div>
        </div>
    </div>
@endsection
