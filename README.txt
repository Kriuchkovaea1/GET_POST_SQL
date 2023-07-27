Перед работой создать базу данных:

CREATE TABLE ice_cream(
    ice_cream_id INT PRIMARY KEY AUTO_INCREMENT,
    name_ice_cream VARCHAR(50)
);

CREATE TABLE person(
    person_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    age INT,
    car VARCHAR(50),
    ice_cream_id INT NULL,
    FOREIGN KEY(ice_cream_id) REFERENCES ice_cream(ice_cream_id) ON DELETE SET NULL
);

CREATE TABLE animal_person(
    animal_id INT NOT NULL,
    person_id INT NOT NULL,
    PRIMARY KEY(animal_id, person_id),
    FOREIGN KEY(animal_id) REFERENCES animal(animal_id),
    FOREIGN KEY(person_id) REFERENCES person(person_id)
);

INSERT INTO ice_cream (name_ice_cream) VALUES ('Банановое'), ('Шоколадное'), ('Клубничное'), ('Сливочное');
INSERT INTO ice_cream (ice_cream_id, name_ice_cream`) VALUES ('0','не люблю мороженое')
