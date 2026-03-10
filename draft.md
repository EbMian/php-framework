#  Problèmes :

- Parfois affiche une erreur lorsque l'un des champs est nul pour les films. Ex : avec le film : Wild at Heart

- N'affiche pas tous les films d'un distributeur donnée
Ex : avec le film : Film Once>metrodome films : rien ne s'affiche


# Idées :

- Si l'utilisateur tente d'accéder à une page qui nécessite d'être connecté : 
stocker l'url de la page voulue
le rediriger vers la page de connexion
une fois connecté le redirigé sur la page à laquelle il voulait accéder

- Faire un delete dans le modèle
- Connexion
- Programmation de scéance de film (heure date)
- Ajouter un bouton pour supprimer tous les films d'un genre donné, dans la page du genre en question (template genre)
 

Recherche

Cas 1 - Pas de résultat : affiche tout plus message "Pas trouvé"
Cas 2 - Chaine vide : affiche tout
Cas 3 - Résultat : affiche les résultat
