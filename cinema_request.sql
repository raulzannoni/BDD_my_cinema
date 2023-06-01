/*-- A. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur --*/
SELECT f.title_film AS "Movie title", 
	YEAR(f.year_film) AS "Release date",
	TIME_FORMAT(f.duration_film, '%H:%i')  AS "Movie duration (h:m)",
    CEIL(TIME_TO_SEC(f.duration_film)/60)  AS "Movie duration (m)", 
	p.first_name_person AS "Director First Name", 
	p.name_person AS "Director Name"
FROM film f, person p, director d
WHERE f.id_director = (SELECT d.id_director WHERE d.id_person = p.id_person) 
	AND f.id_film = (SELECT f.id_film WHERE f.title_film = "Alien")

/*-- B. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court) --*/
SELECT f.title_film AS "Movies longer than 2h15", 
	CEIL(TIME_TO_SEC(f.duration_film)/60) AS "Duration (min)"
FROM film f
WHERE CEIL(TIME_TO_SEC(f.duration_film)/60) > 135
ORDER BY CEIL(TIME_TO_SEC(f.duration_film)/60) DESC


/*-- C. Liste des films d’un réalisateur (en précisant l’année de sortie) --*/
SELECT p.first_name_person AS "Director First Name",
	p.name_person AS "Director Name",
	f.title_film AS "Movie",
	YEAR(f.year_film) AS "Year of Release"
FROM person p, film f
WHERE f.id_director = 
	(SELECT d.id_director FROM director d WHERE d.id_person =
		(SELECT p.id_person WHERE p.first_name_person = "Quentin" AND p.name_person = "Tarantino"))
ORDER BY YEAR(f.year_film) DESC

/*-- D. Nombre de films par genre (classés dans l’ordre décroissant) --*/
SELECT tf.name_type_film AS "Movie Genre", 
	COUNT(t.id_type_film) "Number of films in DB"
FROM type_film tf, talk t
WHERE tf.id_type_film = t.id_type_film
GROUP BY tf.name_type_film
ORDER BY COUNT(t.id_type_film) DESC, tf.name_type_film

/*-- E. Nombre de films par réalisateur (classés dans l’ordre décroissant) --*/
SELECT p.first_name_person AS "Director First Name",
	p.name_person AS "Director Name",
	COUNT(f.title_film) AS "Number of Movies in DB"
FROM person p, film f, director d
WHERE f.id_director = d.id_director AND d.id_person = p.id_person
GROUP BY f.id_director
ORDER BY COUNT(f.title_film) DESC, p.name_person

/*-- F. (Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe --*/
SELECT f.title_film AS "Movie Title", 
		p.name_person AS "Actor Name", 
		p.first_name_person AS "Actor First Name", 
		p.sex_person AS "Sex", 
		r.name_role AS "Role"
FROM film f, casting c, actor a, person p, role r
WHERE f.id_film = (SELECT f.id_film WHERE f.title_film = "Blade Runner")
	AND f.id_film = c.id_film
	AND p.id_person = (SELECT a.id_person WHERE a.id_actor = c.id_actor)
	AND r.id_role = c.id_role
ORDER BY p.name_person

/*-- G. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de
sortie (du film le plus récent au plus ancien) --*/
SELECT  p.first_name_person AS "Actor First Name", 
		p.name_person AS "Actor Name",
		f.title_film AS "Movie Title",  
		YEAR(f.year_film) AS "Year of Release",
		r.name_role AS "Role"
FROM film f, casting c, actor a, person p, role r
WHERE p.id_person = (SELECT p.id_person WHERE p.first_name_person = "Tom" AND p.name_person = "Hanks")
	AND a.id_actor = (SELECT a.id_actor WHERE a.id_person = p.id_person)
	AND f.id_film = (SELECT c.id_film WHERE a.id_actor = c.id_actor)
	AND r.id_role = c.id_role
ORDER BY YEAR(f.year_film) DESC

/*-- H. Liste des personnes qui sont à la fois acteurs et réalisateurs --*/
SELECT p.first_name_person AS "First Name", 
		p.name_person AS "Name"		
FROM actor a, person p, director d
WHERE p.id_person = a.id_person
	AND p.id_person = d.id_person

/*-- I. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien) --*/
SELECT f.title_film AS "Title Movie from the past 5 Years", 
		YEAR(f.year_film) AS "Year of Release"		
FROM film f
WHERE f.year_film >= NOW() - INTERVAL 5 year
ORDER BY YEAR(f.year_film) DESC

/*-- J. Nombre d’hommes et de femmes parmi les acteurs --*/
SELECT p.sex_person AS "Sex Actor",
 		COUNT(p.id_person) AS "Number of Actors"
FROM person p
GROUP BY p.sex_person

/*-- K. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu) --*/
SELECT p.first_name_person AS "First Name", 
		p.name_person AS "Name"
FROM actor a, person p
WHERE p.id_person = a.id_person
	AND p.birth_person >= NOW() - INTERVAL 50 year
ORDER BY YEAR(p.birth_person) DESC 

SELECT p.first_name_person AS "First Name", 
		p.name_person AS "Name",
		DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), p.birth_person)), '%Y') + 0 AS  "Age"
FROM actor a, person p
WHERE p.id_person = a.id_person
	AND p.birth_person >= NOW() - INTERVAL 50 year
ORDER BY YEAR(p.birth_person) DESC 

/*-- K. Acteurs ayant joué dans 3 films ou plus --*/
SELECT p.first_name_person AS "First Name Actor",
		p.name_person AS "Name Actor",
        COUNT(c.id_film) AS "Number of movies played"
FROM person p, actor a, casting c
WHERE p.id_person = a.id_person AND a.id_actor = c.id_actor
GROUP BY p.id_person
HAVING COUNT(c.id_film) >= 3
ORDER BY COUNT(c.id_film) DESC, p.name_person