-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Fri Apr  1 13:38:42 2022 
-- * LUN file: C:\Users\pp50oip\Desktop\P_Web_2\01-Documents\SQL\00-Schémas\db_web_2.lun 
-- * Schema: mld/2 
-- ********************************************* 


-- Database Section
-- ________________ 

create database mld;
use mld;


-- Tables Section
-- _____________ 

create table t_appreciation (
     idAppreciation -- Compound attribute -- not null,
     appEvaluation int not null,
     idUser bigint not null,
     idBook bigint not null,
     constraint ID_t_appreciation_ID primary key (idAppreciation -- Compound attribute --));

create table t_book (
     idBook bigint not null auto_increment,
     booTitle char(100) not null,
     booPageNumber bigint not null,
     booSummary varchar(750) not null,
     booAuthorName char(100) not null,
     booEditorName char(100) not null,
     booEditionYear int not null,
     booExtract varchar(1000) not null,
     idUser bigint not null,
     constraint ID_t_book_ID primary key (idBook));

create table t_categorize (
     idBook bigint not null,
     idCategory bigint not null,
     constraint ID_t_categorize_ID primary key (idCategory, idBook));

create table t_category (
     idCategory bigint not null auto_increment,
     catName char(50) not null,
     constraint ID_t_category_ID primary key (idCategory));

create table t_session (
     idSession bigint not null auto_increment,
     idUser bigint not null,
     constraint ID_t_session_ID primary key (idSession),
     constraint FKt_isPartOf_ID unique (idUser));

create table t_user (
     idUser bigint not null auto_increment,
     useNickname char(50) not null,
     useEntryDate date not null,
     usePermLevel int not null,
     usePasswordHash char(100) not null,
     constraint ID_t_user_ID primary key (idUser));


-- Constraints Section
-- ___________________ 

alter table t_appreciation add constraint FKt_rate_FK
     foreign key (idUser)
     references t_user (idUser);

alter table t_appreciation add constraint FKt_isAbout_FK
     foreign key (idBook)
     references t_book (idBook);

alter table t_book add constraint FKt_add_FK
     foreign key (idUser)
     references t_user (idUser);

alter table t_categorize add constraint FKt_c_t_c
     foreign key (idCategory)
     references t_category (idCategory);

alter table t_categorize add constraint FKt_c_t_b_FK
     foreign key (idBook)
     references t_book (idBook);

alter table t_session add constraint FKt_isPartOf_FK
     foreign key (idUser)
     references t_user (idUser);


-- Index Section
-- _____________ 

create unique index ID_t_appreciation_IND
     on t_appreciation (idAppreciation -- Compound attribute --);

create index FKt_rate_IND
     on t_appreciation (idUser);

create index FKt_isAbout_IND
     on t_appreciation (idBook);

create unique index ID_t_book_IND
     on t_book (idBook);

create index FKt_add_IND
     on t_book (idUser);

create unique index ID_t_categorize_IND
     on t_categorize (idCategory, idBook);

create index FKt_c_t_b_IND
     on t_categorize (idBook);

create unique index ID_t_category_IND
     on t_category (idCategory);

create unique index ID_t_session_IND
     on t_session (idSession);

create unique index FKt_isPartOf_IND
     on t_session (idUser);

create unique index ID_t_user_IND
     on t_user (idUser);

