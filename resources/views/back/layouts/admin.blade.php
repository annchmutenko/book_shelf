<x-app-layout>
    <x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @yield('header-title')
            </h2>
            @yield('utils')
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session()->has('has-child-records'))
        <div class="alert alert-danger">
            {{ session('has-child-records') }}
            @yield('child-records-form')
        </div>
    @endif

    <div id="app">
        @yield('content')
    </div>

    @section('js')
        <script src="{{ asset('js/admin/requests.js') }}"></script>
    @endsection
</x-app-layout>
