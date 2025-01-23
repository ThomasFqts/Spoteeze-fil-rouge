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
addEventListener (click, butRock, [sortirPlaylistRock]);
addEventListener (click, butRap, [sortirPlaylistRap]);
addEventListener (click, butWorkout, [sortirPlaylistWorkout]);
addEventListener (click, butRapUs, [sortirPlaylistRapUs]);
addEventListener (click, butDance, [sortirPlaylistDance]);
addEventListener (click, butFunk, [sortirPlaylistFunk]);
addEventListener (click, butLofi, [sortirPlaylistLofi]);

/* Playlists par défauts */

function sortirPlaylistPop (nom) {
    let nom = "pop";
    sortirLaPlaylist (nom);
};

function sortirPlaylistRock (nom) {
    let nom = "rock";
    sortirLaPlaylist (nom);
};

function sortirPlaylistRap (nom) {
    let nom = "rap";
    sortirLaPlaylist (nom);
};

function sortirPlaylistWorkout (nom) {
    let nom = "workout";
    sortirLaPlaylist (nom);
};

function sortirPlaylistRapUs (nom) {
    let nom = "rapus";
    sortirLaPlaylist (nom);
};

function sortirPlaylistDance (nom) {
    let nom = "dance";
    sortirLaPlaylist (nom);
};

function sortirPlaylistFunk (nom) {
    let nom = "funk";
    sortirLaPlaylist (nom);
};

function sortirPlaylistLofi (nom) {
    let nom = "lofi";
    sortirLaPlaylist (nom);
};

function sortirLaPlaylist (nom_) {
    fetch
/* php */
    innerhtml
};