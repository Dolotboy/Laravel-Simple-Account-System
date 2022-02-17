<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('message.registerTitle') }}</title>
    </head>
    <body>

        <h1>{{__('message.registerTitle')}}</h1>
        <form action="{{route('register')}}" method='POST'>
            @csrf
            @method('POST')

            <h2 class="textBox"><input type="email" name='email' placeholder="{{__('message.emailPlaceholder')}}" required></h2>
            <h2 class="textBox"><input type="text" name='username' placeholder="{{__('message.usernamePlaceholder')}}" required></h2>
            <h2 class="textBox"><input type="password" name='password' placeholder="{{__('message.passwordPlaceholder')}}" required></h2>

            <input type="submit" name="submit" value="{{__('message.registerTitle')}}">

        </form>

    </body>
</html>