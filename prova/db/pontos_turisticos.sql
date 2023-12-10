CREATE TABLE pais (
  idpais INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(80) NULL,
  PRIMARY KEY(idpais)
);

CREATE TABLE pontos_turisticos (
  idpontos_turisticos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  idpais INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(100) NULL,
  PRIMARY KEY(idpontos_turisticos),
  INDEX pontos_turisticos_FKIndex1(idpais),
  FOREIGN KEY(idpais)
    REFERENCES pais(idpais)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE avaliacao (
  idavaliacao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  idpontos_turisticos INTEGER UNSIGNED NOT NULL,
  estrelas INTEGER UNSIGNED NULL,
  PRIMARY KEY(idavaliacao),
  INDEX avaliacao_FKIndex1(idpontos_turisticos),
  FOREIGN KEY(idpontos_turisticos)
    REFERENCES pontos_turisticos(idpontos_turisticos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


