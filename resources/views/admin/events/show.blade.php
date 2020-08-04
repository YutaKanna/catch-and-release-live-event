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
                <div class="row">
                    <div class="col-sm-12">■イベント資料</div>
                    @if ($event->pdf)
                        <div class="col-sm-12">
                            <iframe src="{{ asset('storage/images/' . $event->pdf) }}" width="100%" height="100%">
                                <p><b>表示されない時の表示</b>: <a href="pdf.pdf">PDF をダウンロード</a>.</p>
                            </iframe>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr /></div>
                </div>
            </div>
        </div>
    </div>
@endsection
