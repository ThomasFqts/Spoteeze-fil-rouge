-- Utilisation de la base de données
USE spoteezer;
/*
-- Insertion des données dans la table "music_genre"
INSERT INTO music_genre (id_genre, name_genre)
VALUES
    (1, 'Pop'),
    (2, 'Rock'),
    (3, 'Electronic'),
    (4, 'Hip-Hop'),
    (5, 'Funk'),
    (6, 'Workout'),
    (7, 'Rap'),
    (8, 'Dance'),
    (9, 'Rap US'),
    (10, 'Lofi');

-- Insertion des données dans la table "type_artist"
INSERT INTO type_artist (id_type_artist, libelle_type_artist)
VALUES
    (1, 'Chanteur Solo'),
    (2, 'Groupe'),
    (3, 'DJ'),
    (4, 'Compositeur');

INSERT INTO user_type (id_type_user, name_type_user)
VALUES
	(1, 'Admin'),
    (2,'Free'),
    (3,'Premium'),
    (4,'Student');

    
-- Insertion des données dans la table "users"
INSERT INTO users (id_user, username, password, firstname_user, lastname_user, id_type_user)
VALUES
    (1, 'thomas', 'password123', 'Thomas', 'Fouquet', 1),
    (2, 'adelefan', 'password456', 'Adele', 'Fan', 2),
    (3, 'rocklover', 'password789', 'David', 'Rocker', 2),
    (4, 'queenbey', 'password000', 'Beyoncé', 'Knowles', 3);
    
    -- Insertion des données dans la table "artist"
INSERT INTO artist (id_artist, firstname_artist, lastname_artist, alias_artist, description_artist, id_type_artist)
VALUES
    (1, 'Thomas', 'Bangalter', 'Thomas', 'Membre du groupe Daft Punk', 3),
    (2, 'Guy-Manuel', 'de Homem-Christo', 'Guy-Manuel', 'Autre membre de Daft Punk', 3),
    (3, 'Adele', NULL, NULL, 'Chanteuse britannique célèbre', 1),
    (4, 'David', 'Bowie', NULL, 'Icône du rock', 1),
    (5, 'Beyoncé', 'Knowles', NULL, 'Chanteuse pop américaine', 1);
    
    -- Insertion des données dans la table "title"
INSERT INTO title (id_title, name_title, time_title, publication_date_title, id_genre)
VALUES
    (1, 'Get Lucky', '06:09', '2013-04-19', 3),
    (2, 'Rolling in the Deep', '03:48', '2010-11-29', 1),
    (3, 'Space Oddity', '05:15', '1969-07-11', 2),
    (4, 'Crazy in Love', '03:56', '2003-05-18', 1),
    (5, 'Harder Better Faster Stronger', '03:44', '2001-10-13', 3);

-- Insertion des données dans la table "album"
INSERT INTO album (id_album, name_album, publication_date_album)
VALUES
    (1, 'Random Access Memories', '2013-05-17'),
    (2, '21', '2011-01-24'),
    (3, 'The Rise and Fall of Ziggy Stardust', '1972-06-16'),
    (4, 'Dangerously in Love', '2003-06-24'),
    (5, 'Discovery', '2001-03-12');

-- Insertion des données dans la table "playlist"
INSERT INTO playlist (id_playlist, name_playlist)
VALUES
    (1, 'Workout Jams'),
    (2, 'Relaxing Vibes'),
    (3, 'Party Hits');

-- Insertion des données dans la table "title_playlist"
INSERT INTO title_playlist (id_title, id_playlist)
VALUES
    (1, 1),
    (2, 2),
    (3, 2),
    (4, 3),
    (5, 3);

-- Insertion des données dans la table "production"
INSERT INTO production (id_title, id_album, id_artist)
VALUES
    (1, 1, 1),
    (2, 2, 3),
    (3, 3, 4),
    (4, 4, 5),
    (5, 5, 1);
*/