CREATE DATABASE my_cinema;

/*------------ TYPE_FILM ------------*/
CREATE TABLE TYPE_FILM(
   id_type_film INT NOT NULL AUTO_INCREMENT,
   name_type_film VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_type_film)
);

/*------------ PERSON ------------*/
CREATE TABLE PERSON(
   id_person INT NOT NULL AUTO_INCREMENT,
   first_name_person VARCHAR(50) NOT NULL,
   name_person VARCHAR(50) NOT NULL,
   sex_person LOGICAL NOT NULL,
   birth_person DATE NOT NULL,
   PRIMARY KEY(id_person)
);

/*------------ ROLE ------------*/
CREATE TABLE ROLE(
   id_role INT NOT NULL AUTO_INCREMENT,
   name_role VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_role)
);

/*------------ DIRECTOR ------------*/
CREATE TABLE DIRECTOR(
   id_director INT NOT NULL AUTO_INCREMENT,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_director),
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

INSERT INTO DIRECTOR (first_name_person, name_person, sex_person, birth_person) VALUES
    ("Quentin", "Tarantino", TRUE, '1963-03-27'),
    ("Ridley", "Scott", TRUE, '1937-11-30'),
    ("Steven", "Spielberg", TRUE, '1946-12-18'),
    ("James", "Cameron", TRUE, '1954-08-16');    

/*------------ FILM ------------*/
CREATE TABLE FILM(
   id_film INT NOT NULL AUTO_INCREMENT,
   title_film VARCHAR(50) NOT NULL,
   year_film DATE NOT NULL,
   duration_film TIME NOT NULL,
   plot_film TEXT,
   star_film SMALLINT,
   id_person INT NOT NULL,
   PRIMARY KEY(id_film),
   FOREIGN KEY(id_person) REFERENCES DIRECTOR(id_person)
);

INSERT INTO FILM (title_film, year_film, duration_film, id_director) VALUES
    ("Pulp Fiction", '1994-01-01', '2:25:00', 1),
    ("Inglourious Basterds", '2009-01-01', '2:33:00', 1),
    ("Django Unchained", '2012-01-01', '2:45:00', 1),
    ("Once Upon a Time… in Hollywood", '2019-01-01', '2:41:00', 1),
    ("Alien", '1979-01-01', '1:57:00', 2),
    ("Blade Runner", '1982-01-01', '1:51:00', 2),
    ("Gladiator", '2000-01-01', '2:35:00', 2),
    ("Robin des Bois", '2010-01-01', '2:20:00', 2),
    ("E.T., l'extra-terrestre", '1982-01-01', '1:55:00', 3),
    ("Jurassic Park", '1993-01-01', '2:08:00', 3),
    ("Il faut sauver le soldat Ryan", '1998-01-01', '2:43:00', 3),
    ("Minority Report", '2002-01-01', '2:25:00', 3),
    ("Ready Player One", '2018-01-01', '2:20:00', 3),
    ("Terminator 2 : Le Jugement dernier", '1991-01-01', '2:17:00', 4),
    ("Titanic", '1997-01-01', '3:15:00', 4),
    ("Avatar", '2009-01-01', '2:42:00', 4),
    ("Avatar : La Voie de l'eau", '2022-01-01', '3:12:00', 4);

CREATE TABLE ACTOR(
   id_actor INT NOT NULL AUTO_INCREMENT,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_actor),
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

/*------------ CASTING ------------*/
CREATE TABLE casting(
   id_film INT,
   id_actor INT,
   id_role INT,
   PRIMARY KEY(id_film, id_actor, id_role),
   FOREIGN KEY(id_film) REFERENCES FILM(id_film),
   FOREIGN KEY(id_actor) REFERENCES ACTOR(id_actor),
   FOREIGN KEY(id_role) REFERENCES ROLE(id_role)
);

/*------------ TALK ------------*/
CREATE TABLE talk(
   id_film INT,
   id_type_film INT,
   PRIMARY KEY(id_film, id_type_film),
   FOREIGN KEY(id_film) REFERENCES FILM(id_film),
   FOREIGN KEY(id_type_film) REFERENCES TYPE_FILM(id_type_film)
);

