CREATE TABLE IF NOT EXISTS contacts (
id_contact int(11) NOT NULL AUTO_INCREMENT,
email varchar(80) NOT NULL,
sujet varchar(80) NOT NULL,
message text NOT NULL,
PRIMARY KEY (id_contact)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;