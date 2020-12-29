<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <!-- buat button test truh sini dlu -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
               

                
<h2>Taruh sini cuma mau buat liat buttons aja. Buttonsnya depend ke custom.css dan font-awesome/4.7.0/css</h2>

<button id="savebtn" class="btn"><i class="fa fa-save"></i> Save</button>
<button id="cancelbtn" class="btn"><i class="fa fa-times"></i> Cancel</button>
<p></p>
<button id="yesbtn" class="btn"><i class="fa"></i>Yes</button>
<button id="nobtn" class="btn"><i class="fa"></i>No</button>
<p></p>
<button id="editbtn"class="btn"><i class="fa fa-pencil"></i> Edit</button>
<button id="deletebtn"class="btn"><i class="fa fa-trash"></i> Delete</button>
<button id="startbtn"class="btn"><i class="fa fa-check"></i> Start</button>
<button id="archivebtn" class="btn"><i class="fa fa-archive"></i> Archive</button>
<p></p>
<button id="finishbtn" class="btn"><i class="fa fa-check"></i>Finish</button>
<p></p>
<button class="iconbtn"><i class="fa fa-long-arrow-right"></i></button>

</div>
            </div>
        </div>
    </body>
</html>
