CREATE USER 'ultimate'@'localhost' IDENTIFIED BY 'sesame';
GRANT ALL ON 226operation.* TO 'ultimate'@'localhost';

CREATE DATABASE 226operation;

CREATE USER 'ultimate'@'localhost' IDENTIFIED BY 'sesame';
GRANT ALL ON 226analysis.* TO 'ultimate'@'localhost';

CREATE DATABASE 226analysis;

