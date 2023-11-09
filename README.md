# Blog-Post

Ce projet est un blog réalisé en PHP qui permet de lister des posts, d'en créer, de les modifier et de les supprimer. Pour cela, il faut se créer un compte et s'identifier. Il est également possible de créer des commentaires sans passer par l'authentification mais il nécessaire que ces commenatires soient validés par un administrateur (dans une partie administration visible uniquement par un administrateur).


# Pour commencer

# Pré-requis


    PHP
    Base de données MySQL
    Composer
    Git


# Installation

Appuyez sur le bouton "Code" en vert, choississez entre HTTPS et SSH et copiez le nom du clone qui s'affiche.
Ouvrez une fenêtre du terminal. Placez-vous dans votre répertoire php "htdocs".
Clonez alors ce repository avec la commande git clone. Exemple en SSH : 
git clone git@github.com:Salel8/Blog-Post.git Blog_post

Vous avez maintenant tout le projet en local mais avant de pouvoir l'utiliser, il vous faut créer votre base de données. Vous pouvez utiliser PHPMyAdmin pour créer votre base de données ou bien utiliser le jeu de données fourni dans le dossier data. Pour importer le jeu de données, rendez-vous dans la section "Importer" de PHPMyAdmin, selectionnez le fichier "blog_posts.sql" et appuyer sur "Exécuter".

Une fois la base de données créée, il ne vous manque plus qu'à connecter ce projet à votre base de données. Pour cela, dans le dossier data créez un fichier db.php et insérer à l'intérieur ce qui suit :

    <?php
    class DB
    {
      public static string $host_name = 'mysql:host=nom_du_domaine;';
      public static string $db_name = 'dbname=nom_de_la_base_de_données;';
      public static string $charset = 'charset=utf8';
      public static string $identifiant = 'identifiant';
      public static string $password = 'mot_de_passe';
    }

Veillez à bien modifier les champs 'nom_du_domaine', 'nom_de_la_base_de_données', 'identifiant' et 'mot_de_passe' avec ceux correspondant à votre base de données. Si vous avez importé la base de données, son nom devrait être 'blog_posts'. En local, souvent, le nom de domaine est 'localhost' et l'identifiant et le mot de passe sont tous deux 'root'.

Cette configuration étant établie, vous pouvez dorénavant profiter pleinement de l'ensemble du projet. J'espère que celui-ci vous plaira.



# Démarrage

Pour lancer le projet, lancer le serveur PHP puis ouvrez votre navigateur web et aller sur la page http://localhost:8888/blog/index.php
Si ça ne fonctionne pas, modifiez le numéro du port par celui qui est référencé dans votre application php par défaut (ici le numéro est 8888)

# Fabriqué avec

Entrez les programmes/logiciels/ressources que vous avez utilisé pour développer votre projet
exemples :
HTML - CSS (front-end)
MAMP - PHP (back-end) - PHPMyAdmin - MySQL (base de données)
VSCode - Editeur de textes

# Versions

PHP 8.2.10
Composer version 2.6.3
Bootstrap 5.2.3

# Auteurs

Samir Mehal alias @Salel8
