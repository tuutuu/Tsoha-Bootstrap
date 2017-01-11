-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Movie(
  id SERIAL PRIMARY KEY,
  nimi varchar(50) NOT NULL
);

CREATE TABLE Reviewer(
  id SERIAL PRIMARY KEY,
  nimi varchar(20) NOT NULL,
  salasana varchar(50)
);

CREATE TABLE Liitostaulu(
  elokuva INTEGER REFERENCES Movie(id),
  arvostelija INTEGER REFERENCES Reviewer(id)
);

CREATE TABLE Review(
  arvostelija INTEGER REFERENCES Reviewer(id),
  elokuva INTEGER REFERENCES Movie(id),
  teksti varchar(2000),
  arvosana FLOAT(2),
  updownvotes INTEGER
);
