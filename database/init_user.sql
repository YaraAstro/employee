CREATE DATABASE esmdb;

CREATE USER 'emsadmin'@'localhost' IDENTIFIED BY 'ems2024';

GRANT ALL PRIVILEGES ON emsdb.* TO 'emsadmin'@'localhost';

FLUSH PRIVILEGES;