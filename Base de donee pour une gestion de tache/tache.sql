/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 11                        */
/* Date de création :  27/09/2023 13:50:51                      */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_AFFECTER_AFFECTER_EQUIPE') then
    alter table AFFECTER
       delete foreign key FK_AFFECTER_AFFECTER_EQUIPE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_AFFECTER_AFFECTER2_USERS') then
    alter table AFFECTER
       delete foreign key FK_AFFECTER_AFFECTER2_USERS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_COMMENTA_AUTEUR_CO_USERS') then
    alter table COMMENTAIRE
       delete foreign key FK_COMMENTA_AUTEUR_CO_USERS
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_TACHE_EST_ASSIG_EQUIPE') then
    alter table TACHE
       delete foreign key FK_TACHE_EST_ASSIG_EQUIPE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_USERS_APPARTIEN_PROFIL') then
    alter table USERS
       delete foreign key FK_USERS_APPARTIEN_PROFIL
end if;

if exists(
   select 1 from sys.systable 
   where table_name='AFFECTER'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table AFFECTER
end if;

if exists(
   select 1 from sys.systable 
   where table_name='COMMENTAIRE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table COMMENTAIRE
end if;

if exists(
   select 1 from sys.systable 
   where table_name='EQUIPE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table EQUIPE
end if;

if exists(
   select 1 from sys.systable 
   where table_name='PROFIL'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table PROFIL
end if;

if exists(
   select 1 from sys.systable 
   where table_name='TACHE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table TACHE
end if;

if exists(
   select 1 from sys.systable 
   where table_name='USERS'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table USERS
end if;

/*==============================================================*/
/* Table : AFFECTER                                             */
/*==============================================================*/
create table AFFECTER 
(
   ID_USER              integer                        not null,
   ID_EQUIPE            integer                        not null,
   constraint PK_AFFECTER primary key (ID_USER, ID_EQUIPE)
);

/*==============================================================*/
/* Table : COMMENTAIRE                                          */
/*==============================================================*/
create table COMMENTAIRE 
(
   ID_COMMENTAIRE       integer                        not null,
   ID_USER              integer                        not null,
   IDENTIFIANT_UNIQUE   char(100)                      null,
   CONTENU              long varchar                   null,
   DATE_ET_HEURE        timestamp                      null,
   REPONSE              long varchar                   null,
   STATUT_COMMENTAIRE   long varchar                   null,
   constraint PK_COMMENTAIRE primary key (ID_COMMENTAIRE)
);

/*==============================================================*/
/* Table : EQUIPE                                               */
/*==============================================================*/
create table EQUIPE 
(
   ID_EQUIPE            integer                        not null,
   NOM_EQUIPE           long varchar                   null,
   OBJECTIF_EQUIPE      long varchar                   null,
   NOMBRE_EQUIPE        integer                        null,
   constraint PK_EQUIPE primary key (ID_EQUIPE)
);

/*==============================================================*/
/* Table : PROFIL                                               */
/*==============================================================*/
create table PROFIL 
(
   ID_PROFIL            integer                        not null,
   LIBELLE              long varchar                   null,
   constraint PK_PROFIL primary key (ID_PROFIL)
);

/*==============================================================*/
/* Table : TACHE                                                */
/*==============================================================*/
create table TACHE 
(
   ID_TACHE             integer                        not null,
   ID_EQUIPE            integer                        not null,
   DESCRIPTION          long varchar                   null,
   TITRE                char(50)                       null,
   DATE_DE_CREATION     timestamp                      null,
   DATE_D_ECHANCE       date                           null,
   STATUT               long varchar                   null,
   PRIORITE             long varchar                   null,
   constraint PK_TACHE primary key (ID_TACHE)
);

/*==============================================================*/
/* Table : USERS                                                */
/*==============================================================*/
create table USERS 
(
   ID_USER              integer                        not null,
   ID_PROFIL            integer                        not null,
   NOM                  char(50)                       null,
   PRENOM               char(50)                       null,
   EMAIL                char(50)                       null,
   constraint PK_USERS primary key (ID_USER)
);

alter table AFFECTER
   add constraint FK_AFFECTER_AFFECTER_EQUIPE foreign key (ID_EQUIPE)
      references EQUIPE (ID_EQUIPE)
      on update restrict
      on delete restrict;

alter table AFFECTER
   add constraint FK_AFFECTER_AFFECTER2_USERS foreign key (ID_USER)
      references USERS (ID_USER)
      on update restrict
      on delete restrict;

alter table COMMENTAIRE
   add constraint FK_COMMENTA_AUTEUR_CO_USERS foreign key (ID_USER)
      references USERS (ID_USER)
      on update restrict
      on delete restrict;

alter table TACHE
   add constraint FK_TACHE_EST_ASSIG_EQUIPE foreign key (ID_EQUIPE)
      references EQUIPE (ID_EQUIPE)
      on update restrict
      on delete restrict;

alter table USERS
   add constraint FK_USERS_APPARTIEN_PROFIL foreign key (ID_PROFIL)
      references PROFIL (ID_PROFIL)
      on update restrict
      on delete restrict;

