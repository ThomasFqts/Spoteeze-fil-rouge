logo = getElementById('logo');               /* header */
butConnection = getElementById('seCo');       
butPlaylist = getElementById('taPlaylist');
butPop = getElementById('boutonMusiquePop'); /* playlists prédéfinies */
butRock = getElementById('boutonMusiqueRock');
butRap = getElementById('boutonMusiqueRap');
butWorkout = getElementById('boutonMusiqueWorkout');
butRapUs = getElementById('boutonMusiqueRapUs');
butDance = getElementById('boutonMusiqueDance');
butFunk = getElementById('boutonMusiqueFunk');
butLofi = getElementById('boutonMusiqueLofi');
butElectro = getElementById('boutonMusiqueElectro');

addEventListener (click, logo,  /* revenir à l'accueil */);
addEventListener (click, butConnection,  /* page connection */);
addEventListener (click, butPlaylist,  /* ? */);

addEventListener (click, butPop, [sortirPlaylistPop]);
addEventListener (click, butRock, [sortirPlaylistPop]);
addEventListener (click, butRap, [sortirPlaylistPop]);
addEventListener (click, butWorkout, [sortirPlaylistPop]);
addEventListener (click, butRapUs, [sortirPlaylistPop]);
addEventListener (click, butDance, [sortirPlaylistPop]);
addEventListener (click, butFunk, [sortirPlaylistPop]);
addEventListener (click, butLofi, [sortirPlaylistPop]);
addEventListener (click, butElectro, [sortirPlaylistPop]);


/* Playlists par défauts */

function sortirPlaylistPop (nom) {
    let nom = "pop";
    sortirLaPlaylist (nom);
};

function sortirLaPlaylist (nom_) {
    fetch

    innerhtml
};