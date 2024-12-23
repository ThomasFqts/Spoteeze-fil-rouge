-- create database spoteezer;
use spoteezer;

-- Création des tables

/*CREATE TABLE User_type(
   id_type_user INT AUTO_INCREMENT,
   name_type_user VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_type_user)
);*/

CREATE TABLE Groupe(
   id_group INT AUTO_INCREMENT,
   name_group VARCHAR(500)  NOT NULL,
   PRIMARY KEY(id_group)
);

/*CREATE TABLE Title(
   id_title INT AUTO_INCREMENT,
   name_title VARCHAR(50)  NOT NULL,
   time_title VARCHAR(50)  NOT NULL,
   publication_date_title DATE NOT NULL,
   PRIMARY KEY(id_title)
);

CREATE TABLE Album(
   id_album INT AUTO_INCREMENT,
   name_album VARCHAR(50) ,
   publication_date_album DATE NOT NULL,
   PRIMARY KEY(id_album)
);

CREATE TABLE Artist(
   id_artist INT AUTO_INCREMENT,
   firstname_artist VARCHAR(50) ,
   lastname_artist VARCHAR(50) ,
   alias_artist VARCHAR(50) ,
   description_artist VARCHAR(500) ,
   PRIMARY KEY(id_artist)
);

CREATE TABLE Music_Genre(
   id_genre INT AUTO_INCREMENT,
   name_genre VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_genre)
);

CREATE TABLE Users(
   id_user INT AUTO_INCREMENT,
   Username VARCHAR(50)  NOT NULL,
   password VARCHAR(50)  NOT NULL,
   firstname_user VARCHAR(50)  NOT NULL,
   lastname_user VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_user)
);

CREATE TABLE Playlist(
   id_playlist INT AUTO_INCREMENT,
   name_playlist VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_playlist)
);*/

-- ALTER TABLE pour ajouter les foreign key

/*ALTER TABLE title
ADD COLUMN id_artist INT,
ADD COLUMN id_genre INT,
ADD COLUMN id_album INT,
ADD COLUMN id_playlist INT,
ADD FOREIGN KEY (id_artist) REFERENCES artist(id_artist),
ADD FOREIGN KEY (id_genre) REFERENCES music_genre(id_genre),
ADD FOREIGN KEY (id_playlist) REFERENCES Playlist(id_playlist),
ADD FOREIGN KEY (id_album) REFERENCES album(id_album);

ALTER TABLE album
ADD COLUMN id_artist INT,
ADD COLUMN id_title INT,
ADD COLUMN id_group INT,
ADD COLUMN id_genre INT,
ADD FOREIGN KEY (id_artist) REFERENCES artist(id_artist),
ADD FOREIGN KEY (id_title) REFERENCES title(id_title),
ADD FOREIGN KEY (id_group) REFERENCES groupe(id_group),
ADD FOREIGN KEY (id_genre) REFERENCES music_genre(id_genre);

ALTER TABLE artist
ADD COLUMN id_album INT,
ADD COLUMN id_title INT,
ADD COLUMN id_group INT,
ADD FOREIGN KEY (id_album) REFERENCES album(id_album),
ADD FOREIGN KEY (id_title) REFERENCES title(id_title),
ADD FOREIGN KEY (id_group) REFERENCES groupe(id_group);

ALTER TABLE music_genre
ADD COLUMN id_title INT,
ADD COLUMN id_album INT,
ADD FOREIGN KEY (id_title) REFERENCES title(id_title)
ADD FOREIGN KEY (id_album) REFERENCES album(id_album);

ALTER TABLE users
ADD COLUMN id_playlist INT,
ADD COLUMN id_type_user INT,
ADD FOREIGN KEY (id_playlist) REFERENCES playlist(id_playlist),
ADD FOREIGN KEY (id_type_user) REFERENCES user_type(id_type_user);

ALTER TABLE playlist
ADD COLUMN id_user INT,
ADD COLUMN id_title INT,
ADD FOREIGN KEY (id_title) REFERENCES Title(id_title),
ADD FOREIGN KEY (id_user) REFERENCES users(id_user);*/

ALTER TABLE groupe
ADD COLUMN id_artist INT,
ADD FOREIGN KEY (id_artist) REFERENCES artist(id_artist);