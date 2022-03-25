-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Fri Mar 25 16:04:44 2022 
-- * LUN file: C:\Users\pp50oip\Desktop\P_Web_2\01-Documents\SQL\00-Schémas\db_web_2.lun 
-- * Schema: mld/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database mld;
use mld;


-- Tables Section
-- _____________ 

create table t_book (
     idBook bigint not null auto_increment,
     booTitle char(100) not null,
     booPageNumber bigint not null,
     booSummary char(5000) not null,
     booAuthorName char(100) not null,
     booEditorName char(100) not null,
     booEditionYear int not null,
     idUser bigint not null,
     constraint ID_t_book_ID primary key (idBook));

create table t_session (
     idSession bigint not null auto_increment,
     idUser bigint not null,
     constraint ID_t_session_ID primary key (idSession),
     constraint SID_t_ses_t_use_ID unique (idUser));

create table t_category (
     idCategory bigint not null auto_increment,
     catName char(50) not null,
     constraint ID_t_category_ID primary key (idCategory));

create table t_appreciation (
     idAppreciation bigint not null auto_increment,
     idStar bigint not null,
     idBook bigint not null,
     idUser bigint not null,
     constraint ID_t_appreciation_ID primary key (idAppreciation));

create table t_categorize (
     idBook bigint not null,
     idCategory bigint not null,
     constraint ID_t_categorize_ID primary key (idCategory, idBook));

create table t_star (
     idStar bigint not null auto_increment,
     staNumber decimal(1,1) not null,
     constraint ID_t_star_ID primary key (idStar));

create table t_user (
     idUser bigint not null auto_increment,
     useNickname char(50) not null,
     useEntryDate date not null,
     usePermLevel int not null,
     usePasswordHash char(100) not null,
     constraint ID_t_user_ID primary key (idUser));


-- Constraints Section
-- ___________________ 

alter table t_book add constraint REF_t_boo_t_use_FK
     foreign key (idUser)
     references t_user (idUser);

alter table t_session add constraint SID_t_ses_t_use_FK
     foreign key (idUser)
     references t_user (idUser);

alter table t_appreciation add constraint REF_t_app_t_sta_FK
     foreign key (idStar)
     references t_star (idStar);

alter table t_appreciation add constraint REF_t_app_t_boo_FK
     foreign key (idBook)
     references t_book (idBook);

alter table t_appreciation add constraint REF_t_app_t_use_FK
     foreign key (idUser)
     references t_user (idUser);

alter table t_categorize add constraint REF_t_cat_t_cat
     foreign key (idCategory)
     references t_category (idCategory);

alter table t_categorize add constraint REF_t_cat_t_boo_FK
     foreign key (idBook)
     references t_book (idBook);


-- Index Section
-- _____________ 

create unique index ID_t_book_IND
     on t_book (idBook);

create index REF_t_boo_t_use_IND
     on t_book (idUser);

create unique index ID_t_session_IND
     on t_session (idSession);

create unique index SID_t_ses_t_use_IND
     on t_session (idUser);

create unique index ID_t_category_IND
     on t_category (idCategory);

create unique index ID_t_appreciation_IND
     on t_appreciation (idAppreciation);

create index REF_t_app_t_sta_IND
     on t_appreciation (idStar);

create index REF_t_app_t_boo_IND
     on t_appreciation (idBook);

create index REF_t_app_t_use_IND
     on t_appreciation (idUser);

create unique index ID_t_categorize_IND
     on t_categorize (idCategory, idBook);

create index REF_t_cat_t_boo_IND
     on t_categorize (idBook);

create unique index ID_t_star_IND
     on t_star (idStar);

create unique index ID_t_user_IND
     on t_user (idUser);

