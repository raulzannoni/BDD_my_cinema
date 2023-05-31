/*-- A. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur --*/
SELECT f.title_film AS "Movie title", 
	YEAR(f.year_film) AS "Release date",
	CEIL(TIME_TO_SEC(f.duration_film)/60)  AS "Movie duration", 
	p.first_name_person AS "Director", 
	p.name_person AS ""
FROM film f, person p, director d
WHERE f.id_director = (SELECT d.id_director WHERE d.id_person = p.id_person) AND	f.id_film = 1

/*-- B. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court) --*/
SELECT f.title_film AS "Movies longer than 2h15", 
	CEIL(TIME_TO_SEC(f.duration_film)/60) AS "Duration (min)"
FROM film f
WHERE CEIL(TIME_TO_SEC(f.duration_film)/60) > 135
ORDER BY CEIL(TIME_TO_SEC(f.duration_film)/60) DESC


/*-- C. Liste des films d’un réalisateur (en précisant l’année de sortie)  --*/
SELECT f.title_film AS "Movies longer than 2h15", 
	CEIL(TIME_TO_SEC(f.duration_film)/60) AS "Duration (min)"
FROM film f
WHERE "Duration (min)" > 135
ORDER BY "Duration (min)" DESC

/*-- D. Nombre de films par genre (classés dans l’ordre décroissant)  --*/
SELECT tf.name_type_film AS "Movie Genre", 
	COUNT(t.id_type_film) "Number of films in DB"
FROM type_film tf, talk t
WHERE tf.id_type_film = t.id_type_film
GROUP BY tf.name_type_film
ORDER BY COUNT(t.id_type_film) DESC, tf.name_type_film