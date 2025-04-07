<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Task List App</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
        @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-700;
    }

    .link {
        @apply text-slate-700 underline decoration-pink-500;
    }
    .link:hover {
        @apply text-slate-900;
    }

    label {
        @apply block uppercase text-slate-700;
    }

    input, textarea {
        @apply block w-full rounded-md border-0 bg-slate-50 px-2 py-1 text-slate-700 shadow-sm ring-1 ring-slate-700/10 placeholder:text-slate-400 focus:ring-2 focus:ring-pink-500;
    }

    .error-message {
        @apply mt-1;
        @apply text-red-500 text-sm;
    }

    </style>

    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>

    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash"
                class="relative mb-10 rounded border border-green-500 bg-green-100 px-4 py-3 text-lg text-cyan-800"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <div>{{session('success')}}</div>

                <span class="absolute top-0 bottom-0 px-4 py-3 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </span>
            </div>
        @endif


        @yield('content')
    </div>

</body>

</html>