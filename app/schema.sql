CREATE TABLE achievements (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	award STRING(100) NOT NULL,
	details STRING NULL,
	notes STRING(510) NULL DEFAULT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	awardbody_id INT NULL,
	level STRING NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, award, details, notes, created, modified, awardbody_id, level)
);

CREATE TABLE awardbody (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	"name" STRING(100) NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, "name", created, modified)
);

CREATE TABLE classevents (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	swimclass_id INTEGER NOT NULL,
	venue_id INTEGER NOT NULL,
	coursegroup_id INTEGER NOT NULL,
	spaces INTEGER NOT NULL,
	weeknum INTEGER NOT NULL,
	classdate DATE NOT NULL,
	"time" TIMESTAMP NOT NULL,
	length INTEGER NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	duration INT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, swimclass_id, venue_id, coursegroup_id, spaces, weeknum, classdate, "time", length, created, modified, duration)
);

CREATE TABLE coursegroups (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	swimclass_id INTEGER NOT NULL,
	price DECIMAL(10,2) NOT NULL,
	courselength INTEGER NULL DEFAULT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, swimclass_id, price, courselength, created, modified)
);

CREATE TABLE goals (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	goal STRING(510) NOT NULL,
	achievement_id INTEGER NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, goal, achievement_id, created, modified)
);

CREATE TABLE students (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	firstname STRING(100) NOT NULL,
	lastname STRING(100) NOT NULL,
	parent_id INTEGER NOT NULL,
	gender STRING(100) NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	level STRING NULL,
	requirements STRING NULL,
	dob TIMESTAMP NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, firstname, lastname, parent_id, gender, created, modified, level, requirements, dob)
);

CREATE TABLE students_achievements (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	student_id INTEGER NOT NULL,
	achievement_id INTEGER NOT NULL,
	created TIMESTAMP NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, student_id, achievement_id, created)
);

CREATE TABLE students_classes (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	student_id INTEGER NOT NULL,
	coursegroup_id INTEGER NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, student_id, coursegroup_id)
);

CREATE TABLE students_goals (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	student_id INTEGER NOT NULL,
	goal_id INTEGER NOT NULL,
	created TIMESTAMP NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, student_id, goal_id, created)
);

CREATE TABLE swimclass (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	"name" STRING(100) NOT NULL,
	size STRING(100) NOT NULL,
	duration INTEGER NOT NULL,
	price DECIMAL(10,2) NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, "name", size, duration, price, created, modified)
);

CREATE TABLE teachers (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	firstname STRING(100) NOT NULL,
	lastname STRING(100) NOT NULL,
	phone STRING(100) NULL DEFAULT NULL,
	email STRING(100) NULL DEFAULT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, firstname, lastname, phone, email, created, modified)
);

CREATE TABLE transactions (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	modified TIMESTAMP WITH TIME ZONE NULL DEFAULT NULL,
	student_id INTEGER NULL DEFAULT NULL,
	coursegroup_id INTEGER NULL DEFAULT NULL,
	braintreeid STRING(40) NULL DEFAULT NULL,
	amount DECIMAL(11,2) NULL DEFAULT NULL,
	processorresponse STRING(40) NULL DEFAULT NULL,
	last4 INTEGER NULL DEFAULT NULL,
	cardtype STRING(20) NULL DEFAULT NULL,
	user_id INTEGER NULL,
	created TIMESTAMP NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, modified, student_id, coursegroup_id, braintreeid, amount, processorresponse, last4, cardtype, user_id, created)
);

CREATE TABLE users (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	username STRING(100) NULL,
	password STRING(510) NOT NULL,
	email STRING(100) NOT NULL,
	firstname STRING(100) NOT NULL,
	lastname STRING(100) NOT NULL,
	phone STRING(40) NULL DEFAULT NULL,
	address1 STRING(100) NULL DEFAULT NULL,
	address2 STRING(100) NULL DEFAULT NULL,
	town STRING(100) NULL DEFAULT NULL,
	county STRING(100) NULL DEFAULT NULL,
	role STRING(40) NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	postcode STRING NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, username, password, email, firstname, lastname, phone, address1, address2, town, county, role, created, modified, postcode)
);

CREATE TABLE venues (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
	"name" STRING(100) NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, "name", created, modified)
);
