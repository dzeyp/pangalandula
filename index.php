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
            @font-face {
                font-family: "Phagspa";
                src: url("font/phagspa-bold.ttf");
            }
            body {
                font-family: 'Phagspa', "Open Sans";
                background: #347595;
                color: #ffffff;
            }

            img {
                width: 100%;
            }

            .logo {
                max-width: 220px;
            }

            .join-screen .img-text-players,
            .join-screen .img-text-teams,
            .playerselect .img-text-teams {
                max-width: 220px;
            }

            .game-code-box {
                background-position: center;
                background-size: 130px;
                background-image: url(img/join_screen/game-code-box.png);
                background-repeat: no-repeat;
            }

            .player-name-red-team,
            .player-name-blue-team {
                width: 100%;
                display: inline-block;
                background-position: center;
                background-size: 100%;
                background-repeat: no-repeat;
                max-width: 220px;
                line-height: 40px;
            }

            .player-name-red-team {
                background-image: url(img/join_screen/red-box-3.png);
            }

            .player-name-blue-team {
                background-image: url(img/join_screen/blue-box-3.png);
            }

            .toolbar {
                height: 30px;
            }

            h1, h2, h3, h4, h5, h6, p {
                text-transform: uppercase;
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

            .bg-red {
                background: #A91B28;
            }

            .bg-blue {
                background: #347595;
            }

            .bg-blue2 {
                background: blue;
            }

            .set-middle {
                display: flex;
                flex-direction: column;
                flex: 1;
            }

            .center-middle {
                margin: auto;
            }

            #room-code {
                padding: 15px 30px;
            }

            .clearfix {
                clear: both;
            }

            .joinup-tv-intro {
                max-width: 310px;
            }
        </style>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="container-fluid block join-screen bg-red pb-3 pt-3">
            <div class="row">
                <div class="col-4 col-md-6 text-center">
                    <img class="logo" src="img/join_screen/logo-man.png" alt="Name Game logo">
                    <img class="logo" src="img/join_screen/logo-name.png" alt="Name Game text logo">
                </div>
                <div class="col-8 col-md-6 text-center set-middle">
                    <div class="set-middle">
                        <h5 class="center-middle joinup-tv-intro mb-3">GO TO JOINUP.TV AND ENTER THE ROOM CODE BELOW</h5>
                        <div class="center-middle game-code-box mt-1">
                            <h2 id="room-code" class="center-middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid block join-screen pt-3">
            <div class="row">
                <div class="col-12 text-center mb-3">
                    <img class="img-text-players" src="img/join_screen/players.png" alt="players">
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-center" id="red-team">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-text-teams mb-3" src="img/join_screen/red-team.png" alt="players">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-center" id="blue-team">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-text-teams mb-3" src="img/join_screen/blue-team.png" alt="players">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid block waitplayers pt-3 hidden">
            <div class="row">
                <div class="col-12 col-sm-4 text-center">
                    <img class="logo mb-3" src="img/waiting_screen/thinking_man.png" alt="Thinking Man">
                </div>
                <div class="col-12 col-sm-8 text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <div class="container-fluid">
                                    <div class="row" id="waiting-red-team">

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="container-fluid">
                                    <div class="row" id="waiting-blue-team">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    progress bar here
                </div>
            </div>
        </div>

        <div class="container-fluid block playerinstruction pt-3 hidden">
            <div class="row">
                <div class="col-12 text-center">
                    round one
                    ok everyone
                    now the name of the game
                    is to have your team
                    guess as many names as possible
                    in under 30 seconds
                    without saying the name!
                    in this round
                    you can say anything you like to describe the name
                    but you can't say
                    what the name rhymes with
                    make sure you don't press next
                    until you hear a member of your team
                    say the name
                    exactly as it appears on you phone
                    all clear?
                </div>
            </div>
        </div>

        <div class="container-fluid block playerselect pt-3 hidden">
            <div class="row">
                <div class="col-12 col-sm-4 text-center">
                    <img class="logo mb-3" src="img/nextup_screen/boxing-lady.png" alt="Thinking Man">
                </div>
                <div class="col-12 col-sm-8 text-center">
                    <h5>Alright then, let battle commence! next up...</h5>
                    <div id="current-team">
                        <!-- <img class="img-text-teams mb-3" src="img/join_screen/red-team.png" alt="players"> -->
                    </div>
                    <div class="clearfix"></div>
                    <h5 class="current-player"></h5>
                    <h5>Please stand up, turn around and address your team mates.</h5>
                </div>
            </div>
        </div>

        <div class="container-fluid block playerstart pt-3 hidden">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Timer: <span id="playerProgress">30</span></h5>
                </div>
            </div>
        </div>

        <div class="container-fluid block tally pt-3 hidden">
            <div class="row">
                <div class="col-6 text-center score-player"></div>
                <div class="col-6 text-center score-names"></div>
            </div>
        </div>

        <audio id="joinIntro" src="https://d3en5xriihnzfd.cloudfront.net/game_music/screens/player_join/intro.mp3" autostart="false"></audio>
        <audio id="waitingIntro" src="https://d3en5xriihnzfd.cloudfront.net/game_music/screens/waiting/intro.mp3" autostart="false"></audio>
        <audio id="round1Rules" src="https://d3en5xriihnzfd.cloudfront.net/game_music/screens/round1/rules.mp3" autostart="false"></audio>
        <audio id="nextPlayer" src="https://d3en5xriihnzfd.cloudfront.net/game_music/screens/next_up/intro/next/1_1.mp3" autostart="false"></audio>

        <script src="app.js"></script>
    </body>
</html>
