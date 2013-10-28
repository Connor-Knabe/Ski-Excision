--DROP SCHEMA IF EXISTS reviews CASCADE;
CREATE SCHEMA reviews;

SET search_path = reviews;


--
--Table structure for table "comments"
--attribute - name
--attribute - com (this is for the actual comment)
--

CREATE TABLE db (
	name varchar(20) NOT NULL,
	comments varchar(500),
	log_date 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	resort_id integer DEFAULT NULL,
	PRIMARY KEY (name, log_date)
);