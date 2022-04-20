/*
Created: 04/04/2022
Modified: 05/04/2022
Model: novus
Database: PostgreSQL 12
*/

-- Create tables section -------------------------------------------------

-- Table user

CREATE TABLE "user"
(
  "firstname" Text NOT NULL,
  "lastname" Text NOT NULL,
  "email" Text NOT NULL,
  "password" Text NOT NULL,
  "id_user" Serial NOT NULL,
  "id_user_role" Integer
)
WITH (
  autovacuum_enabled=true)
;

CREATE INDEX "IX_to_have" ON "user" ("id_user_role")
;

ALTER TABLE "user" ADD CONSTRAINT "id_user" PRIMARY KEY ("id_user")
;

-- Table content

CREATE TABLE "content"
(
  "name" Text NOT NULL,
  "data" Text,
  "created_at" Timestamp NOT NULL,
  "updated_at" Timestamp,
  "id_user" Integer,
  "id_content" Serial NOT NULL,
  "id_content_type" Integer
)
WITH (
  autovacuum_enabled=true)
;

CREATE INDEX "IX_to_own" ON "content" ("id_user")
;

CREATE INDEX "IX_to_be_part_of" ON "content" ("id_content_type")
;

ALTER TABLE "content" ADD CONSTRAINT "id_content" PRIMARY KEY ("id_content")
;

-- Table content_type

CREATE TABLE "content_type"
(
  "name" Text NOT NULL,
  "uid_content_type" Text NOT NULL,
  "id_content_type" Serial NOT NULL
)
WITH (
  autovacuum_enabled=true)
;

ALTER TABLE "content_type" ADD CONSTRAINT "id_content_type" PRIMARY KEY ("id_content_type")
;

-- Table user_role

CREATE TABLE "user_role"
(
  "role" Text,
  "uid_user_role" Text NOT NULL,
  "id_user_role" Serial NOT NULL
)
WITH (
  autovacuum_enabled=true)
;

ALTER TABLE "user_role" ADD CONSTRAINT "id_user_role" PRIMARY KEY ("id_user_role")
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE "content"
  ADD CONSTRAINT "to own"
    FOREIGN KEY ("id_user")
    REFERENCES "user" ("id_user")
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
;

ALTER TABLE "content"
  ADD CONSTRAINT "to be part of"
    FOREIGN KEY ("id_content_type")
    REFERENCES "content_type" ("id_content_type")
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
;

ALTER TABLE "user"
  ADD CONSTRAINT "to have"
    FOREIGN KEY ("id_user_role")
    REFERENCES "user_role" ("id_user_role")
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
;

