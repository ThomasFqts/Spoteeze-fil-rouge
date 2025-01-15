-- create database spoteezer;
use spoteezer;

-- Création des tables

/*
CREATE TABLE Artist(
   id_artist INT AUTO_INCREMENT,
   firstname_artist VARCHAR(50) ,
   lastname_artist VARCHAR(50) ,
   alias_artist VARCHAR(50) ,
   description_artist VARCHAR(500) ,
   PRIMARY KEY(id_artist)
);

CREATE TABLE User_type(
   id_type_user INT AUTO_INCREMENT,
   name_type_user VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_type_user)
);

CREATE TABLE Music_Genre(
   id_genre INT AUTO_INCREMENT,
   name_genre VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_genre)
);

CREATE TABLE Playlist(
   id_playlist INT AUTO_INCREMENT,
   name_playlist VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_playlist)
);

CREATE TABLE Groupe(
   id_groupe INT AUTO_INCREMENT,
   name_groupe VARCHAR(500)  NOT NULL,
   PRIMARY KEY(id_groupe)
);

CREATE TABLE Album(
   id_album INT AUTO_INCREMENT,
   name_album VARCHAR(50) ,
   publication_date_album DATE NOT NULL,
   id_groupe INT,
   id_genre INT,
   id_artist INT,
   PRIMARY KEY(id_album),
   FOREIGN KEY(id_groupe) REFERENCES Groupe(id_groupe),
   FOREIGN KEY(id_genre) REFERENCES Music_Genre(id_genre),
   FOREIGN KEY(id_artist) REFERENCES Artist(id_artist)
);

CREATE TABLE Users(
   id_user INT AUTO_INCREMENT,
   Username VARCHAR(50)  NOT NULL,
   password VARCHAR(50)  NOT NULL,
   firstname_user VARCHAR(50)  NOT NULL,
   lastname_user VARCHAR(50)  NOT NULL,
   id_playlist INT NOT NULL,
   id_type_user INT NOT NULL,
   PRIMARY KEY(id_user),
   FOREIGN KEY(id_playlist) REFERENCES Playlist(id_playlist),
   FOREIGN KEY(id_type_user) REFERENCES User_type(id_type_user)
);

CREATE TABLE Title(
   id_title INT AUTO_INCREMENT,
   name_title VARCHAR(50)  NOT NULL,
   time_title VARCHAR(50)  NOT NULL,
   publication_date_title DATE NOT NULL,
   id_playlist INT,
   id_album INT,
   id_genre INT,
   id_artist INT,
   PRIMARY KEY(id_title),
   FOREIGN KEY(id_playlist) REFERENCES Playlist(id_playlist),
   FOREIGN KEY(id_album) REFERENCES Album(id_album),
   FOREIGN KEY(id_genre) REFERENCES Music_Genre(id_genre),
   FOREIGN KEY(id_artist) REFERENCES Artist(id_artist)
);

CREATE TABLE Artist_Group(
   id_artist INT,
   id_groupe INT,
   PRIMARY KEY(id_artist, id_groupe),
   FOREIGN KEY(id_artist) REFERENCES Artist(id_artist),
   FOREIGN KEY(id_groupe) REFERENCES Groupe(id_groupe)
);
*/