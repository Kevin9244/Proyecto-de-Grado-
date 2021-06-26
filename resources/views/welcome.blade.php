<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IMPLEMENTOS DEPORTIVOS</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">



        <!-- Styles -->
        <style>
            html, body {
                background:#17202A ;
                color: white;
                font-family: 'Algerian';
                font-weight: 200;
                height: 100vh;
                margin: 0;

            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                position: relative;
                display: inline-block;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #tyson{
                position: right;
                border-radius: 20px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary" style="color:white">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-danger" style="color:white">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary" style="color:white">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <img src="{{ asset('img/portada.jpg')}}" width="800px" height="400px" id="tyson">
                <div class="title m-b-md">
                    <h1 class="titulo"> <span class="typed"></span></h1>
                </div>
                <div class="titulo" id="cadenas-texto">
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Box</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Judo</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Fútbol</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Karate</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Basketball</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Tennis</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Natación</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Béisbol</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Esgrima</i></p>
                    <p>Implementos Deportivos <br> <i class="deportes" style="color: #F1C40F">Hockey</i></p>
                    
                </div>
            </div>
        </div>
         <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="{{ asset('js/main.js')}}"></script>

    </body>
</html>
