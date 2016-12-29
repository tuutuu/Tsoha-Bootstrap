-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Movie(
  id SERIAL PRIMARY KEY,
  nimi varchar(50) NOT NULL
);

CREATE TABLE Reviewer(
  nimi varchar(20) PRIMARY KEY,
  salasana varchar(50)
);

CREATE TABLE Liitostaulu(
  elokuva INTEGER REFERENCES Movie(id),
  arvostelija varchar(20) REFERENCES Reviewer(nimi)
);

CREATE TABLE Review(
  arvostelija varchar(20) REFERENCES Reviewer(nimi),
  elokuva INTEGER REFERENCES Movie(id),
  teksti varchar(2000),
  arvosana FLOAT(2),
  updownvotes INTEGER
);
