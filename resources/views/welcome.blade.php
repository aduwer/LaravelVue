<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="url" content="{{ url('') }}">
    <title>Laravel-Vue</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    @if (Auth::check())
    @php
    $user_auth_data = [
    'isLoggedin' => true,
    'user' => Auth::user()
    ];
    @endphp
    @else
    @php
    $user_auth_data = [
    'isLoggedin' => false
    ];
    @endphp
    @endif
    <script>
        window.LaravelUser = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
    </script>


    <div id="app"></div>
    <script>
        window.Laravel = <?php echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>