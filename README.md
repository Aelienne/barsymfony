Voila mon projet Symfony  
Connexion : User : bobby.bob@test.com mdp : bobby, Admin : admin@admin.com mdp : admin.  
Ce projet a été designé autour du management et du display d'informations concernant des bars et des artistes.  

Feartures :  
-"Bar management" les opérations CRUD, avec uploads d'images et display.  
-"Artist management" les opérations CRUD, avec uploads d'images et display.  
-"Login, Registration" formulaires pour s'inscrire ainsi que pour se connecter avec un hasherpassword.  
-"Roles/Contrôle d'accès" deux roles distincts ADMIN, USER qui ont chacun des accès différents. Le User peut créer un bar ou un artist et consulter tout le site sans avoir d'actions particulières, l'admin peut delete et edit (CRUD USER en plus).  
-"Vue" j'ai changé le display de certaines choses en fonction des connections User et/ou Admin pour qu'il y ai des fonctionnalités en plus.  
-"EasyAdmin" pour la gestion des CRUD j'ai utilisé EasyAdmin.  
-"Controller/Contrôle d'accès" j'ai modifié et ajouté des routes.  

-Le peut de style a été fait en SASS  

-J'ai rencontré des problèmes sur l'uploads d'image, j'ai du donc rajouter des vérifications dans BarController et ArtistController et rajouter des paramètres dans services.yaml pour le chemin des images. J'ai essayé d'ajouter un flash sur l'uploads en cas de non fichier, mais je crois que ça ne fonctionne pas.  

Le projet n'est pas fini !  
