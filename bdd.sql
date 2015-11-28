CREATE TABLE module
(
	id SERIAL PRIMARY KEY,
	titre VARCHAR (50),
	description VARCHAR (255),
	lien VARCHAR (255)
);

CREATE TABLE utilisateur
(
	login VARCHAR (255) PRIMARY KEY
);

CREATE TABLE menu_utilisateur
(
	priorite INTEGER,
	utilisateur VARCHAR (255),
	module INTEGER,
	PRIMARY KEY (utilisateur, module),
	FOREIGN KEY (utilisateur) REFERENCES utilisateur(login),
	FOREIGN KEY (module) REFERENCES module(id)
)

