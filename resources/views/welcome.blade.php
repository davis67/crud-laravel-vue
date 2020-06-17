<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script type="text/javascript" src="{{mix('js/app.js')}}" defer></script>

        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">

    </head>
    <body>
      <div class="container" id="app">
          <index-posts>

          </index-posts>
      </div>
    </body>
</html>
