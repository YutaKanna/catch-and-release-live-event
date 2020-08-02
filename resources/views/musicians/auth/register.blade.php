@extends('layouts.app')

@section('content')

    <div id="content">
        @include('layouts.flash-messages')
        <p>グループに招待されました。ユーザー情報を登録してください</p>
        <form action="{{ url()->full() }}" method="POST">
            @csrf
            <div class="form-group">
                <label>名前</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label>メールアドレス</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                       placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">登録する</button>
        </form>
    </div>

@endsection
