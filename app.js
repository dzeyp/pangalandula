(function() {
	var hasStarted = false;
	var userNum = 0;
	var gameId = 0;

	function newGame() {
		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/newgame"
		})
		.done(function( result ) {
			$( "#room-code" ).append( result.gameCode );
			gameId = result.gameId;
			joinLong();
		});
	}

	function joinLong() {
		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/game2/" + gameId
		})
		.done(function( result ) {
			console.log( result );
			if ( result !== 'timeout' ) {
				var gameObj = JSON.parse( result );
				gameObj.game.users.forEach(function( user ) {
					if ( user.team == 1 ) {
						$( "#" + user.name ).remove();
						$( "#red-team" ).append( '<h5 id="' + user.name + '">' + user.name + '</h5>' );
					} else {
						$( "#" + user.name ).remove();
						$( "#blue-team" ).append( '<h5 id="' + user.name + '">' + user.name + '</h5>' );
					}
				});

				if ( gameObj.game.isstarted ) {
					hasStarted = true;
					userNum = gameObj.game.users.length;
				}
			}

			if ( hasStarted ) {
				getTemplate( "waitplayers" );
				joinShort();
			} else {
				joinLong();
			}
		})
	}

	function joinShort() {
		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/game/" + gameId
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
		document.getElementById("waitingIntro").play();

		setTimeout(playerSelect, 40000);
	}

	function playerSelect() {
		document.getElementById("waitingIntro").pause();
		getTemplate( "playerselect" );

		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/currentuser/" + gameId
		})
		.done(function( result ) {
			$( "#currentPlayerName" ).text( result.name );
			clockReady( result.userid );
		})
	}

	function clockReady( userId ) {
		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/clockready/" + gameId + "/" + userId
		})
		.done(function( result ) {
			playerStart( userId );
		})
	}

	function playerStart( userId ) {
		getTemplate( "playerstart" );

		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/clock/" + gameId
		})
		.done(function( result ) {
			if ( result !== 'timeout' ) {
				var clockObj = JSON.parse( result );
				
				if ( clockObj.start ) {
					//start counting
					recordAnswers( userId );
					//stop after timer reaches 0 (timeout api)
					//use lastturn api to check answers
				}
			}
		})
	}

	function tally( userId ) {
		$.ajax({
			url: "aaaaaaaaaaaaaaaaaa/lastturn/" + gameId + "/" + userId
		})
		.done(function( result ) {
			result.lastTurn
		})
	}

	function currentUser() {
		
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