
create database bookmarks;
use bookmarks;

create table user  (
  username varchar(16) primary key,
  passwd char(255) not null, --2013.11.14 Gustaf - Necesario para guardar valor con hash.
  -- passwd char(16) not null,
  email varchar(100) not null
);

create table bookmark (
  username varchar(16) not null,
  bm_URL varchar(255) not null,
  index (username),
  index (bm_URL)
);

  
