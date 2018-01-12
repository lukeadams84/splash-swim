# Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
#
# Licensed under The MIT License
# For full copyright and license information, please see the LICENSE.txt
# Redistributions of files must retain the above copyright notice.
# MIT License (http://www.opensource.org/licenses/mit-license.php)

CREATE TABLE sessions (
  id char(40) NOT NULL,
  data text,
  expires INT(11) NOT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE notes (
	id INTEGER NOT NULL DEFAULT unique_rowid(),
  student_id integer NOT NULL,
	body STRING NOT NULL,
	created TIMESTAMP WITH TIME ZONE NOT NULL,
	modified TIMESTAMP WITH TIME ZONE NOT NULL,
	CONSTRAINT "primary" PRIMARY KEY (id ASC),
	FAMILY "primary" (id, student_id, body, created, modified)
);
