<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="@lang('front.tlink_title')">
    <meta name="generator" content="@lang('front.tlink_title')">
    <title>@lang('front.tlink_title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">@lang('front.tlink_title')</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold py-1 px-0 @if(request()->route()->getName() == 'tlinks.create') active @endif" aria-current="page" href="{{ route('tlinks.create') }}">@lang('front.btn_create')</a>
            </nav>
        </div>
    </header>

    <main class="px-3">
      @yield('content')
    </main>

    <footer class="mt-auto text-white-50">
        <p>@lang('front.footer_text')</p>
    </footer>
</div>
</body>
</html>
