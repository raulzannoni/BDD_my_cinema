/*-- A. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur --*/
SELECT f.title_film AS "Movie title", 
	YEAR(f.year_film) AS "Release date",
	CEIL(TIME_TO_SEC(f.duration_film)/60)  AS "Movie duration", 
	p.first_name_person AS "Director", 
	p.name_person AS ""
FROM film f, person p, director d
WHERE f.id_director = (SELECT d.id_director WHERE d.id_person = p.id_person) AND f.id_film = 1

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