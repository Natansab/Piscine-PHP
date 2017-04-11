SELECT COUNT(*) AS 'films'
FROM historique_membre
WHERE ((historique_membre.date BETWEEN '2006-10-30' AND '2007-07-27')
OR (EXTRACT(MONTH FROM historique_membre.date) = '12'
AND EXTRACT(DAY FROM historique_membre.date) = '24'));
