create database if not exists thebookclub;
use thebookclub;

create table if not exists users ();

create table if not exists books (
    book_id integer unsigned primary key auto_increment,
    title varchar(100) not null,
    author_id integer unsigned not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

create table if not exists author (
    author_id integer unsigned primary key auto_increment,
    name varchar(100) not null,
    nationality varchar(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;


create table if not exists clubs (
    club_id integer unsigned primary key auto_increment,
    name varchar(100) not null unique,
    description varchar(500),
    create_at timestamp not null default current_timestampt,
    modified_at timestamp not null default current_timestampt on update current_timestampt
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

create table if not exists club_members (
    club_members_id integer unsigned primary key auto_increment,
    user_id integer unsigned not null,
    club_id integer unsigned not null,
    is_admin tinyint not null default 0
    create_at timestamp not null default current_timestamp,
    modified_at timestamp not null default current_timestamp on update current_timestamp,
    unique key no_rep(user_id, club_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;