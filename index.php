<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">

        <style>
            body {
                font-family: 'Phagspa', "Open Sans";
                background: #A91B28;
                color: #ffffff;
            }

            img {
                max-width: 100%;
            }

            .toolbar {
                height: 30px;
            }

            #room-code {
                -webkit-border-radius: 30px;
                -moz-border-radius: 30px;
                border-radius: 20px;
                border: 2px solid #000000;
                width: 150px;
                display: inline-block;
                background: green;
                padding: 10px 0;
            }

            h1, h2, h3, h4, h5, h6 {
                font-weight: 700;
            }

            .container {
                max-width: 900px;
            }

            .players {
                margin: 10px 0 0 0;
            }

            .hidden {
                display: none;
            }
        </style>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="container-fluid block newgame">
            <div class="row toolbar">
                <div class="col-12"></div>
            </div>
            <div class="row">
                <div class="col-4 text-center">
                    <img src="https://joinup.tv/img/ng-logo-man.png" alt="Name Game logo">
                    <img src="https://joinup.tv/img/ng-logo-text.png" alt="Name Game text logo">
                </div>
                <div class="col-8 text-center">
                    <h6>GO TO JOINUP.TV AND ENTER THE ROOM CODE BELOW</h6>
                    <h2 id="room-code"></h2>
                </div>
            </div>
        </div>
        <div class="container-fluid block newgame">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>PLAYERS</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-center" id="red-team">
                    <h4>RED TEAM</h4>
                </div>
                <div class="col-6 text-center" id="blue-team">
                    <h4>BLUE TEAM</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid block waitplayers hidden">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Loading: <span id="progress">0</span>%</h5>
                </div>
            </div>
        </div>

        <div class="container-fluid block playerinstruction hidden">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Instructions Text Here</h5>
                </div>
            </div>
        </div>

        <div class="container-fluid block playerselect hidden">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Next player: <span id="currentPlayerName"></span></h5>
                </div>
            </div>
        </div>

        <div class="container-fluid block playerstart hidden">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Timer: <span id="playerProgress">30</span></h5>
                </div>
            </div>
        </div>

        <script src="app.js"></script>

        <audio id="waitingIntro" src="" autostart="false" ></audio>
    </body>
</html>
