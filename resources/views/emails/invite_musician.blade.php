@component('mail::message')
  {{ $message }}

  @component('mail::button', ['url' => $url])
    確認する
  @endcomponent
@endcomponent
