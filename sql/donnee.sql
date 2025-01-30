-- Utilisation de la base de données
USE spoteezer;

-- Insertion des données dans la table Album
INSERT INTO Album (name_album, publication_date_album) VALUES
('Thriller', '1982-11-30'),
('Back in Black', '1980-07-25'),
('The Dark Side of the Moon', '1973-03-01'),
('Abbey Road', '1969-09-26'),
('Hotel California', '1976-12-08'),
('Rumours', '1977-02-04'),
('The Wall', '1979-11-30'),
('Born in the U.S.A.', '1984-06-04'),
('Purple Rain', '1984-06-25'),
('Nevermind', '1991-09-24');

-- Insertion des données dans la table User_type
INSERT INTO User_type (name_type_user) VALUES
('Admin'),
('Invite'),
('Free'),
('Premium'),
('Student');

-- Insertion des données dans la table Music_Genre
INSERT INTO Music_Genre (name_genre) VALUES
('Pop'),
('Rock'),
('Electronic'),
('Hip-Hop'),
('Funk'),
('Workout'),
('Rap'),
('Dance'),
('Rap US'),
('Lofi');

-- Insertion des données dans la table Playlist
INSERT INTO Playlist (name_playlist) VALUES
('Top Hits 2023'),
('Classic Rock'),
('Jazz Vibes'),
('Pop Essentials'),
('Hip Hop Beats'),
('Electronic Dance'),
('Country Roads'),
('Reggae Rhythms');

-- Insertion des données dans la table Type_Artist
INSERT INTO Type_Artist (libelle_type_artist) VALUES
('Chanteur Solo'),
('Groupe'),
('DJ'),
('Compositeur');

-- Insertion des données dans la table Title
INSERT INTO Title (name_title, time_title, publication_date_title, id_genre) VALUES
('Billie Jean', '4:54', '1982-11-30', 2),
('Back in Black', '4:15', '1980-07-25', 1),
('Money', '6:22', '1973-03-01', 1),
('Come Together', '4:19', '1969-09-26', 1),
('Hotel California', '6:30', '1976-12-08', 1),
('Go Your Own Way', '3:38', '1977-02-04', 1),
('Another Brick in the Wall', '3:59', '1979-11-30', 1),
('Born in the U.S.A.', '4:39', '1984-06-04', 1),
('Purple Rain', '8:41', '1984-06-25', 2),
('Smells Like Teen Spirit', '5:01', '1991-09-24', 1);

-- Insertion des données dans la table Artist
INSERT INTO Artist (firstname_artist, lastname_artist, alias_artist, description_artist, id_type_artist) VALUES
('Michael', 'Jackson', 'MJ', 'King of Pop', 1),
('Angus', 'Young', 'AC/DC', 'Lead guitarist of AC/DC', 2),
('David', 'Gilmour', 'Pink Floyd', 'Guitarist and co-lead vocalist of Pink Floyd', 2),
('John', 'Lennon', 'The Beatles', 'Member of The Beatles', 2),
('Don', 'Henley', 'Eagles', 'Lead vocalist of Eagles', 2),
('Stevie', 'Nicks', 'Fleetwood Mac', 'Vocalist of Fleetwood Mac', 2),
('Bruce', 'Springsteen', 'The Boss', 'American rock singer-songwriter', 1),
('Prince', 'Rogers Nelson', 'Prince', 'American singer-songwriter', 1),
('Kurt', 'Cobain', 'Nirvana', 'Lead vocalist of Nirvana', 2);

-- Insertion des données dans la table Users
INSERT INTO Users (Username, email, password, firstname_user, lastname_user, id_type_user, sexe_user) VALUES
('john_doe', 'john.doe@example.com', 'password1', 'John', 'Doe', 1, 'Homme'),
('jane_smith', 'jane.smith@example.com', 'password2', 'Jane', 'Smith', 2, 'Femme'),
('bob_jazz', 'bob.jazz@example.com', 'password3', 'Bob', 'Jazz', 3, 'Homme'),
('alice_rock', 'alice.rock@example.com', 'password4', 'Alice', 'Rock', 4, 'Femme'),
('charlie_hiphop', 'charlie.hiphop@example.com', 'password5', 'Charlie', 'HipHop', 5, 'Homme'),
('dave_electro', 'dave.electro@example.com', 'password6', 'Dave', 'Electro', 3, 'Homme'),
('eve_country', 'eve.country@example.com', 'password7', 'Eve', 'Country', 3, 'Femme'),
('frank_reggae', 'frank.reggae@example.com', 'password8', 'Frank', 'Reggae', 4, 'Homme');

-- Insertion des données dans la table title_playlist
INSERT INTO playlist_title (id_title, id_playlist) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 1),
(10, 2);

-- Insertion des données dans la table playlist_users
INSERT INTO playlist_users (id_user, id_playlist) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8);

-- Insertion des données dans la table Production
INSERT INTO Production (id_title, id_album, id_artist) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 3),
(8, 8, 7),
(9, 9, 8),
(10, 10, 9);