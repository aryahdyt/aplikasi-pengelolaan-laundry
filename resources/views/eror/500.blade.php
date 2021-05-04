<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    {{-- @stack('style') --}}
</head>

<body class="hold-transition sidebar-mini">
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-danger">{{ __('500') }}</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> {{ __('Oops! Something went wrong.') }}</h3>

                <p>
                    {{ __('We will work on fixing that right away.
                    Meanwhile, you may') }}
                    <a href="{{ route('dashboard') }}">return to dashboard</a>
                </p>
            </div>
        </div>
        <!-- /.error-page -->

    </section>
    <!-- /.content -->
</body>

</html>