@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $sendData['sitetitle'] }}
        @endcomponent
    @endslot

    {{-- Body --}}
    **Gönderen:** {{ $sendData['name'] }} <br>
    **E-posta Adresi:** {{ $sendData['email'] }} <br>
    **Mesaj:** {{ $sendData['message'] }}


    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            {{ $sendData['sitetitle'] }}
        @endcomponent
    @endslot
@endcomponent
