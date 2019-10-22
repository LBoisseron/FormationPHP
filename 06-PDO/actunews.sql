CREATE TABLE IF NOT EXISTS categorie (
  id_categorie int(3) NOT NULL AUTO_INCREMENT,
  nom varchar(20) DEFAULT NULL,
  PRIMARY KEY (id_categorie)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS auteur (
id_auteur int(3) NOT NULL AUTO_INCREMENT,
prenom varchar(20) DEFAULT NULL,
nom varchar(20) DEFAULT NULL,
email varchar(20) DEFAULT NULL,
motdepasse varchar(30) DEFAULT NULL,
PRIMARY KEY (id_auteur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

CREATE TABLE IF NOT EXISTS article (
id_article int(3) NOT NULL AUTO_INCREMENT,
titre varchar(20) DEFAULT NULL,
contenu varchar(50) DEFAULT NULL,
image varchar(20) DEFAULT NULL,
date_creation varchar(30) DEFAULT NULL,
PRIMARY KEY (id_article)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;