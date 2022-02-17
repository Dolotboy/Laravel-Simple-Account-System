<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('message.appTitle') }}</title>
    </head>
    <body>

        <h1>{{__('message.appTitle')}}</h1>
        <h2>{{__('message.welcome')}} {{ $user['username'] }}</h2>

    </body>
</html>