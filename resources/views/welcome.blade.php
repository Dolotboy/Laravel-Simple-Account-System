<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('message.appTitle') }}</title>
    </head>
    <body>

        <div class='buttonContainer'>
            <a href="{{route('loginPage', ['lang' => app()->getLocale() ])}}">
                <button class='menuBtn'>{{__('message.loginTitle')}}</button>
            </a>
            <a href="{{route('registerPage', ['lang' => app()->getLocale() ])}}">
                <button class='menuBtn'>{{__('message.registerTitle')}}</button>
            </a>
        </div>

    </body>
</html>
