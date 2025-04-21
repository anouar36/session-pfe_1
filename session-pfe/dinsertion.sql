-- 1     

SELECT utilisateurs.nom FROM utilisateurs
INNER join profil_langue on profil_langue.profil_id = utilisateurs.id
INNER JOIN langues on langues.id = profil_langue.langue_id
where langues.nom = 'Anglais'


-- Lister les freelances ayant plus de 3 compétences.--


SELECT utilisateurs.nom, count(profil_competence.competence_id) as numCompetence FROM utilisateurs

INNER join profil_competence on profil_competence.profil_id = utilisateurs.id
INNER JOIN competences on competences.id = profil_competence.competence_id
GROUP BY utilisateurs.nom
HAVING numCompetence = 3

LIMIT 0, 25

-- Afficher les freelances disponibles, leur tarif horaire et leur ville.

SELECT utilisateurs.nom , profils.disponible ,profils.tarif_horaire ,profils.bio FROM utilisateurs 
INNER JOIN profils on utilisateurs.id = profils.utilisateur_id

--Afficher les freelances disponibles, leur tarif horaire et leur ville.

SELECT utilisateurs.nom , profils.disponible ,profils.tarif_horaire,adresses.ville FROM utilisateurs 
INNER JOIN profils on utilisateurs.id = profils.utilisateur_id
INNER JOIN adresses on adresses.utilisateur_id = utilisateurs.id

-- Lister tous les utilisateurs qui ne possèdent pas encore de profil.
SELECT utilisateurs.nom   , profils.utilisateur_id FROM utilisateurs 
LEFT JOIN profils on utilisateurs.id = profils.utilisateur_id
HAVING profils.utilisateur_id is null

-- Afficher les clients qui n'ont jamais publié de projet.
SELECT * FROM  utilisateurs 
LEFT JOIN projets ON projets.client_id = utilisateurs.id
WHERE projets.id IS NULL


-- Afficher les projets ouverts avec leur budget et leur nombre total d’offres reçues
SELECT projets.titre,projets.budget, COUNT( offres.id) as offres FROM projets 
INNER JOIN projet_categorie on projet_categorie.projet_id = projets.id
INNER JOIN categories ON categories.id = projet_categorie.categorie_id
INNER JOIN offres on offres.projet_id = projets.id
WHERE  categories.nom = 'ouverts'
GROUP BY projets.titre, projets.budget

-- Lister les offres envoyées par des freelances dont le tarif horaire est inférieur à 100 MAD.
SELECT * FROM `offres` 
INNER JOIN utilisateurs on offres.freelance_id = utilisateurs.id
INNER JOIN profils on profils.utilisateur_id = utilisateurs.id
WHERE profils.tarif_horaire >100

-- Afficher les projets qui ont reçu au moins 3 offres.
SELECT projets.titre,projets.budget, COUNT( offres.id) as offres FROM projets 
INNER JOIN projet_categorie on projet_categorie.projet_id = projets.id
INNER JOIN offres on offres.projet_id = projets.id
GROUP BY projets.titre, projets.budget
HAVING offres >=3

-- Afficher les freelances qui ont postulé sur plus de 5 projets différents.

SELECT utilisateurs.nom , COUNT(offres.id) AS offre FROM utilisateurs 
INNER JOIN offres ON offres.freelance_id = utilisateurs.id
GROUP BY utilisateurs.nom
HAVING offre >= 5

-- Afficher les projets terminés avec les dates de début et de fin des missions associées.
SELECT projets.titre, projets.date_publication , missions.date_debut AS datedebut ,missions.date_fin AS dateFin FROM projets 
INNER JOIN offres on offres.projet_id = projets.id
INNER JOIN missions on missions.offre_id =offres.id 

WHERE projets.date_publication <   now()













