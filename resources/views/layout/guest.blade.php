<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.head')
<body>
    @include('includes.header')
    <div class="min-h-screen bg-gray-100">
        <main>
            {{ $slot }}
        </main>
    </div>
    @include('includes.footer')

</body>

</html>
