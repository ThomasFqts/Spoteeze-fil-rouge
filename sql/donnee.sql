-- Use the spoteezer database
USE spoteezer;
/*
-- Populate the Album table
INSERT INTO Album (id_album, name_album, publication_date_album)
VALUES
    (1,'Random Access Memories', '2013-05-17'),
    (2,'Abbey Road', '1969-09-26'),
    (3,'Thriller', '1982-11-30'),
    (4,'The Dark Side of the Moon', '1973-03-01'),
    (5,'25', '2015-11-20');

-- Populate the User_type table
INSERT INTO User_type (id_type_user, name_type_user)
VALUES
	(1, 'Admin'),
    (2,'Free'),
    (3,'Premium'),
    (4,'Student');

-- Populate the Music_Genre table
INSERT INTO Music_Genre (id_genre, name_genre)
VALUES
    (1, 'Pop'),
    (2,'Rock'),
    (3,'Electronic'),
    (4,'Hip-Hop'),
    (5,'Funk'),
    (6,'Workout'),
    (7,"Rap"),
    (8,"Dance"),
    (9,"Rap US"),
    (10,"Lofi"),
    (11,'Classical');

-- Populate the Type_Artist table
INSERT INTO Type_Artist (id_type_artist	, libelle_type_artist)
VALUES
    (1,'Artist Solo'),
    (2,'Group'),
    (3,'DJ'),
    (4,'Orchestre');

-- Populate the Title table
INSERT INTO Title (id_title, name_title, time_title, publication_date_title, id_genre)
VALUES
    (1, 'Get Lucky', '06:09', '2013-04-19', 3),
    (2,'Come Together', '04:20', '1969-09-26', 2),
    (3,'Billie Jean', '04:54', '1983-01-02', 1),
    (4,'Time', '07:05', '1973-03-01', 2),
    (5,'Hello', '04:55', '2015-10-23', 1);

-- Populate the Artist table
INSERT INTO Artist (id_artist, firstname_artist, lastname_artist, id_type_artist)
VALUES
    (1, 'Thomas', 'Bangalter', 3),
    (2,'Paul', 'McCartney', 1),
    (3,'Michael', 'Jackson', 1),
    (4,'David', 'Gilmour', 1),
    (5,'Adele', NULL, 1);


-- Link Titles to Albums (assuming one-to-many relationship)
INSERT INTO Title (id_title, name_title, time_title, publication_date_title, id_genre)
VALUES
    (6,'Digital Love', '05:00', '2001-03-12', 3);

INSERT INTO users (id_user, Username, firstname_user, lastname_user, password, id_playlist, id_type_user)
VALUES
    (1, 'user1', 'Ugo', 'Quemeneur', 'password123', 1, 2),
    (2,'user2', 'Thomas', 'Fouquet', 'password456', 2, 3),
    (3,'user3', 'Helene', 'Jesaispas', 'password789', 3, 4),
    (4,'user4', 'Guillaume', 'Delacroix', 'password000', 4, 4);
*/