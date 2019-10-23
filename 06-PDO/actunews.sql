CREATE TABLE IF NOT EXISTS categorie (
  id_categorie int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(20) DEFAULT NULL,
  PRIMARY KEY (id_categorie)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 ;

INSERT INTO categorie (nom)
	VALUES ('Politique'), ('Economie'), ('Sport'), ('Culture');

CREATE TABLE IF NOT EXISTS auteur (
id_auteur int(11) NOT NULL AUTO_INCREMENT,
prenom varchar(80) DEFAULT NULL,
nom varchar(80) DEFAULT NULL,
email varchar(80) DEFAULT NULL,
motdepasse varchar(256) DEFAULT NULL,
PRIMARY KEY (id_auteur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

INSERT INTO auteur (prenom, nom, email, motdepasse)
	VALUES ('Léna', 'BOISSERON', 'kalaloolb@gmail.com', 'actunews971');
    
CREATE TABLE IF NOT EXISTS article (
id_article int(11) NOT NULL AUTO_INCREMENT,
titre varchar(256) DEFAULT NULL,
contenu text DEFAULT NULL,
image varchar(256) DEFAULT NULL,
date_creation timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
id_categorie int(11) NOT NULL,
id_auteur int(11) NOT NULL,
PRIMARY KEY (id_article)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

ALTER TABLE article ADD FOREIGN KEY (id_categorie)
	REFERENCES categorie (id_categorie);

ALTER TABLE article ADD FOREIGN KEY (id_auteur)
	REFERENCES auteur (id_auteur);