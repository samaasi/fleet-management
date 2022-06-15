@component('mail::message')
    {{-- Header --}}
    @component('mail::table')
        <table with="100%">
            @foreach($licenses as $license)
                {{-- Content --}}
            @endforeach
        </table>
    @endcomponent
@endcomponent
