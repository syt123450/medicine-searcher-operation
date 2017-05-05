USE finalProj;
CREATE TABLE factory(
    factoryId   INT             NOT NULL,
    factoryName VARCHAR(200)    NOT NULL,
    country     VARCHAR(20)     NOT NULL,
    state       VARCHAR(20)     NOT NULL,
    city        VARCHAR(20)     NOT NULL,
    street      VARCHAR(50)     NOT NULL,
    PRIMARY KEY (factoryId)
); 
 
insert into factory (factoryId, factoryName, country, state, city, street) values (1, 'Aptalis Pharma US, Inc.', 'United States', 'California', 'Pasadena', '22493 Golf Course Center');
insert into factory (factoryId, factoryName, country, state, city, street) values (2, 'Physicians Total Care, Inc.', 'United States', 'Minnesota', 'Saint Paul', '69 Clemons Pass');
insert into factory (factoryId, factoryName, country, state, city, street) values (3, 'NCS HealthCare of KY, Inc dba Vangard Labs', 'United States', 'California', 'Los Angeles', '26904 Portage Avenue');
insert into factory (factoryId, factoryName, country, state, city, street) values (4, 'Physicians Total Care, Inc.', 'United States', 'Arizona', 'Phoenix', '1747 Memorial Way');
insert into factory (factoryId, factoryName, country, state, city, street) values (5, 'Bryant Ranch Prepack', 'United States', 'Florida', 'Naples', '3 Straubel Plaza');
