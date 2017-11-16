-- Creation de la table Representation de la tâche 6

CREATE TABLE Representation
(
    id INT NOT NULl,
    daterepr DATE,
    id_lieu INT NOT NULL,
    lieu VARCHAR(255),   
    id_groupe INT NOT NULL,
    groupe VARCHAR(255),
    heure_debut VARCHAR(255),
    heure_fin VARCHAR(255),
    PRIMARY KEY (id),
    
);

/*
ALTER TABLE Representation ADD CONSTRAINT fk_id_lieu FOREIGN KEY (id_lieu) REFERENCES Lieu(id);
ALTER TABLE Representation ADD CONSTRAINT fk_id_groupe FOREIGN KEY (id_groupe) REFERENCES Groupe(id);
*/

