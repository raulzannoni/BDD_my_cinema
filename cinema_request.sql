/*-- Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur --*/
SELECT f.title_film AS "Movie title", YEAR(f.year_film) AS "Release date", MINUTE(f.duration_film) AS "Movie duration", p.first_name_person AS "Director", p.name_person AS ""
FROM f AS film, p AS person, d as director
WHERE f.id_director = (SELECT d.id_director WHERE d.id_person = p.id_person)
WHERE movie.id_movie = 1

-- b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court)
SELECT f.title_film AS "Movies longer than 2h15", MINUTE(f.duration_film) AS "Duration (min)"
FROM FILM as film
WHERE MINUTE(f.duration_film) > 135
ORDER BY MINUTE(f.duration_film) DESC
