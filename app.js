(function() {
	var hasStarted = false;
	var userNum = 0;
	var gameId = 0;

	function newGame() {
		document.getElementById("joinIntro").play();
		$.ajax({
			url: "https://joinup.tv/api/newgame"
		})
		.done(function( result ) {
			$( "#room-code" ).empty();
			$( "#room-code" ).append( result.gameCode );
			gameId = result.gameId;
			joinLong();
		});
	}

	function joinLong() {
		$.ajax({
			url: "https://joinup.tv/api/game2/" + gameId
		})
		.done(function( result ) {
			if ( result !== 'timeout' ) {
				var gameObj = JSON.parse( result );
				$( ".row-player" ).remove();
				gameObj.game.users.forEach(function( user ) {
					if ( user.team == 1 ) {
						$( "#red-team" ).find( ".row" ).append( '<div class="col-12 row-player"><h5 class="player-name-red-team" id="' + user.name + '">' + user.name + '</h5></div>' );
					} else {
						$( "#blue-team" ).find( ".row" ).append( '<div class="col-12 row-player"><h5 class="player-name-blue-team" id="' + user.name + '">' + user.name + '</h5></div>' );
					}
				});

				if ( gameObj.game.isstarted ) {
					hasStarted = true;
					userNum = gameObj.game.users.length;
				}
			}

			if ( hasStarted ) {
				joinShortInit();
			} else {
				joinLong();
			}
		})
	}

	function joinShortInit() {
		getTemplate( "waitplayers" );
		document.getElementById("joinIntro").pause();
		document.getElementById("waitingIntro").play();
		$.ajax({
			url: "https://joinup.tv/api/game/" + gameId
		})
		.done(function( result ) {
			result.game.users.forEach(function( user ) {
				if ( user.team == 1) {
					$( "#waiting-red-team" ).append( '<div class="col-12 row-player"><h5 class="player-name-red-team" id="' + user.name + '">' + user.name + '</h5></div>' );
				} else {
					$( "#waiting-blue-team" ).append( '<div class="col-12 row-player"><h5 class="player-name-blue-team" id="' + user.name + '">' + user.name + '</h5></div>' );
				}
			});

			var maxNamesNum = userNum * 5;
			var currentNamesNum = result.game.names.length;
			var progress = ( currentNamesNum / maxNamesNum ) * 100;

			$( "#progress" ).text( Math.round(progress) );

			if ( maxNamesNum <= currentNamesNum ) {
				playerInstruction();
			} else {
				joinShort();
			}
		})
	}

	function joinShort() {
		$.ajax({
			url: "https://joinup.tv/api/game/" + gameId
		})
		.done(function( result ) {
			var maxNamesNum = userNum * 5;
			var currentNamesNum = result.game.names.length;
			var progress = ( currentNamesNum / maxNamesNum ) * 100;

			$( "#progress" ).text( Math.round(progress) );

			if ( maxNamesNum <= currentNamesNum ) {
				playerInstruction();
			} else {
				joinShort();
			}
		})
	}

	function playerInstruction() {
		getTemplate( "playerinstruction" );
		document.getElementById("waitingIntro").pause();
		document.getElementById("round1Rules").play();
		setTimeout(playerSelect, 27000);
	}

	function playerSelect() {
		getTemplate( "playerselect" );

		$.ajax({
			url: "https://joinup.tv/api/currentuser/" + gameId
		})
		.done(function( result ) {
			document.getElementById("nextPlayer").play();
			$( "#current-team" ).empty();
			$( ".current-player" ).removeClass( "player-name-red-team" );
			$( ".current-player" ).removeClass( "player-name-blue-team" );
			$( ".current-player" ).text( '' );

			if ( result.team == 1) {
				$( "#current-team" ).append( '<img class="img-text-teams mb-3" src="img/join_screen/red-team.png" alt="red team">' );
				setTimeout(function() {
					$( ".current-player" ).addClass( "player-name-red-team" );
					$( ".current-player" ).text( result.name );
				}, 6000);
			} else {
				$( "#current-team" ).append( '<img class="img-text-teams mb-3" src="img/join_screen/blue-team.png" alt="blue team">' );
				setTimeout(function() {
					$( ".current-player" ).addClass( "player-name-blue-team" );
					$( ".current-player" ).text( result.name );
				}, 6000);
			}

			setTimeout(function() {
				clockReady( result.userid );
			}, 12000);
		})
	}

	/*function nextPlayer() {
		getTemplate( "playerselect" );

		$.ajax({
			url: "https://joinup.tv/api/currentuser/" + gameId
		})
		.done(function( result ) {
			$( "#currentPlayerName" ).text( result.name );
			setTimeout(function() {
				clockReady( result.userid );
			}, 12000);
		})
	}*/

	function clockReady( userId ) {
		$.ajax({
			url: "https://joinup.tv/api/clockready/" + gameId + "/" + userId
		})
		.done(function( result ) {
			playerStart( userId );
		})
	}

	function playerStart( userId ) {
		$( '#playerProgress' ).text( 30 );
		getTemplate( "playerstart" );

		$.ajax({
			url: "https://joinup.tv/api/clock/" + gameId
		})
		.done(function( result ) {
			if ( result !== 'timeout' ) {
				var clockObj = JSON.parse( result );
				
				if ( clockObj.start ) {
					startTimer( userId );
				}
			} else {
				playerStart( userId );
			}
		})
	}

	function startTimer( userId, max = 30 ) {
		setTimeout(function() {
	        $( '#playerProgress' ).text( max );

	        if ( max == 0 ) {
	        	stopTimer( userId );
	        } else {
	        	startTimer( userId, --max );
	        }
	    }, 1000);
	}

	function stopTimer( userId ) {
		$.ajax({
			url: "https://joinup.tv/api/timeout/" + gameId + "/" + userId
		})
		.done(function( result ) {
			tally( userId );
		})
	}

	function tally( userId ) {
		getTemplate( "tally" );

		$.ajax({
			url: "https://joinup.tv/api/lastturn/" + gameId + "/" + userId
		})
		.done(function( result ) {
			var score = 0;
			
			$( ".score-player" ).empty();
			$( ".score-names" ).empty();

			result.lastTurn.names.forEach(function( name ) {
				if ( name.status == "correct" ) {
					$( ".score-names" ).append( "<h5>" + name.name + "</h5>" );
					score++;
				}
			});

			$( ".score-player" ).append( "<h3>" + result.lastTurn.name + "</h3>" );
			$( ".score-player" ).append( "<h4>" + score + "</h4>" );

			setTimeout(playerSelect, 5000);
		})
	}






	function getTemplate( $name ) {
		$( ".block" ).hide();
		$( "." + $name ).show();
	}

	newGame();
})()

/*
check if start game
each player enter 5 names
check if all players enter names
play instructions
host will choose a player
timer starts if player start

*/