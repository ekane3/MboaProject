SELECT r.login,s.nom_salle as ns,c.heure_debut as hd,c.heure_fin,r.jour_reservation FROM reserver as r
INNER JOIN creneau AS c ON c.id = r.id_creneau
INNER JOIN salle AS s ON s.id = r.id_salle
INNER JOIN utilisateur AS u ON u.login = r.login
WHERE r.login = 'ekane@gmail.com'