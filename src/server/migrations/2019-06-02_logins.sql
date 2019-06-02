CREATE SCHEMA IF NOT EXISTS site_users;
  CREATE TABLE IF NOT EXISTS site_users.logins(
      id        SERIAL      PRIMARY KEY,
      login     VARCHAR     NOT NULL UNIQUE,
      password  VARCHAR     NOT NULL
  );