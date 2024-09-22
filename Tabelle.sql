create table ADMIN(
  ID_Admin integer AUTO_INCREMENT NOT NULL,
  Password varchar (15) NOT NULL,
  primary key(ID_Admin)
);

create table CARTE(
  Numero varchar (16) NOT NULL,
  Nominativo varchar (20) NOT NULL,
  CVC varchar (3) NOT NULL,
  Scadenza varchar (5) NOT NULL,
  primary key (Numero)
);

create table SOCIETA(
  ID_Societa integer AUTO_INCREMENT NOT NULL,
  Nominativo varchar (20) NOT NULL,
  Patrimonio decimal (15,2) NOT NULL,
  primary key (ID_Societa)
);

create table CLIENTI(
  ID_Cliente integer AUTO_INCREMENT NOT NULL,
  Patrimonio decimal (15,2) NOT NULL,
  Nominativo varchar (20) NOT NULL,
  Cod_Fiscale varchar (16) NOT NULL,
  P_Iva varchar (11) NOT NULL,
  Password varchar (15) NOT NULL,
  E-mail varchar (30) NOT NULL,
  Tipo set ('Azienda','Privato') NOT NULL,
  primary key (ID_Cliente)
);

create table TITOLI(
  ID_Titolo integer AUTO_INCREMENT NOT NULL,
  Tipo set('Casa','Garage','Appartamento','Ufficio','Locale','Capannone','Terreno','Edificio') NOT NULL,
  Provincia varchar(2) NOT NULL,
  Svincolo decimal (15,2),
  ID_Societa integer,
  ID_Cliente integer,
  primary key(ID_Titolo),
  foreign key (ID_Societa) references SOCIETA (ID_Societa) on update cascade on delete cascade,
  foreign key (ID_Cliente) references CLIENTI (ID_Cliente) on update cascade on delete cascade
);

create table RICHIESTE(
  ID_Richiesta integer AUTO_INCREMENT NOT NULL,
  Percentuale integer,
  Provvigione decimal(15,2),
  Prezzo decimal (15,2),
  Budget decimal (15,2),
  Fido tinyint,
  Data date NOT NULL,
  Scadenza date,
  Tipo set ('Acquisto','Vendita') NOT NULL,
  ID_Societa integer,
  ID_Cliente integer NOT NULL,
  ID_Titolo integer,
  primary key (ID_Richiesta),
  foreign key (ID_Societa) references SOCIETA (ID_Societa) on update cascade on delete cascade,
  foreign key (ID_Cliente) references CLIENTI (ID_Cliente) on update cascade on delete cascade,
  foreign key (ID_Titolo) references TITOLI (ID_Titolo) on update cascade on delete cascade
);

create table TRANSAZIONI(
  ID_Transazione integer AUTO_INCREMENT NOT NULL,
  Data date NOT NULL,
  Ammontare decimal (15,2) NOT NULL,
  Tipo set ('Acquisto','Vendita') NOT NULL,
  Fido tinyint;
  ID_Cliente integer NOT NULL,
  ID_Societa integer,
  ID_Titolo integer,
  primary key (ID_Transazione),
  foreign key (ID_Cliente) references CLIENTI (ID_Cliente) on update cascade on delete cascade,
  foreign key (ID_Societa) references SOCIETA (ID_Societa) on update cascade on delete cascade,
  foreign key (ID_Titolo) references TITOLI (ID_Titolo) on update cascade on delete cascade
);