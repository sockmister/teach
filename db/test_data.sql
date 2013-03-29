INSERT INTO users VALUES("john@gmail.com", "password", "John", "1980-12-12", "Female", "9999 1234", "/assets/photos/person.jpg");
INSERT INTO users VALUES("jane@gmail.com", "password", "Jane", "1981-12-12", "Male", "9999 6456", "/assets/photos/person.jpg");
INSERT INTO users VALUES("may@gmail.com", "password", "May", "1982-12-12", "Male", "9999 1256", "/assets/photos/person.jpg");
INSERT INTO users VALUES("peter@gmail.com", "password", "Peter", "1983-12-12", "Female", "9999 6546", "/assets/photos/person.jpg");
INSERT INTO users VALUES("rachel@gmail.com", "password", "Rachel", "1984-12-12", "Female", "9999 3466", "/assets/photos/person.jpg");
INSERT INTO users VALUES("joshua@gmail.com", "password", "Joshua", "1985-12-12", "Female", "9999 4564", "/assets/photos/person.jpg");
INSERT INTO users VALUES("david@gmail.com", "password", "David", "1986-12-12", "Male", "9999 2346", "/assets/photos/person.jpg");

INSERT INTO skill VALUES("Blast Fishing", "Strictly blast fishing. No rods allowed.", "2012-05-12");
INSERT INTO skill VALUES("SC2 GrandMaster", "How to get Grandmaster in HotS", "2011-05-12");
INSERT INTO skill VALUES("Burping", "How to burp anytime anywhere.", "2010-05-12");

INSERT INTO belong_to VALUES("john@gmail.com", "Blast Fishing");
INSERT INTO belong_to VALUES("jane@gmail.com", "Blast Fishing");
INSERT INTO belong_to VALUES("peter@gmail.com", "Blast Fishing");
INSERT INTO belong_to VALUES("rachel@gmail.com", "SC2 GrandMaster");
INSERT INTO belong_to VALUES("john@gmail.com", "SC2 GrandMaster");
INSERT INTO belong_to VALUES("david@gmail.com", "SC2 GrandMaster");
INSERT INTO belong_to VALUES("may@gmail.com", "SC2 GrandMaster");
INSERT INTO belong_to VALUES("peter@gmail.com", "SC2 GrandMaster");
INSERT INTO belong_to VALUES("john@gmail.com", "Burping");
INSERT INTO belong_to VALUES("david@gmail.com", "Burping");
INSERT INTO belong_to VALUES("may@gmail.com", "Burping");

INSERT INTO friend VALUES("jane@gmail.com", "john@gmail.com");
INSERT INTO friend VALUES("may@gmail.com", "rachel@gmail.com");
INSERT INTO friend VALUES("john@gmail.com", "joshua@gmail.com");
INSERT INTO friend VALUES("peter@gmail.com", "rachel@gmail.com");
INSERT INTO friend VALUES("david@gmail.com", "may@gmail.com");
INSERT INTO friend VALUES("joshua@gmail.com", "peter@gmail.com");
INSERT INTO friend VALUES("joshua@gmail.com", "rachel@gmail.com");
INSERT INTO friend VALUES("jane@gmail.com", "rachel@gmail.com");
INSERT INTO friend VALUES("david@gmail.com", "john@gmail.com");
INSERT INTO friend VALUES("david@gmail.com", "peter@gmail.com");

INSERT INTO comment VALUES("john@gmail.com", "jane@gmail.com", "nice hair", "2005-05-12");
INSERT INTO comment VALUES("john@gmail.com", "peter@gmail.com", "wanna hang out?", "2006-05-12");
INSERT INTO comment VALUES("jane@gmail.com", "may@gmail.com", "great teacher", "2003-04-12");
INSERT INTO comment VALUES("may@gmail.com", "rachel@gmail.com", "don't be a bitch", "2007-05-12");
INSERT INTO comment VALUES("peter@gmail.com", "joshua@gmail.com", "see you again", "2005-05-13");
INSERT INTO comment VALUES("peter@gmail.com", "joshua@gmail.com", "i saw you again", "2005-05-16");
INSERT INTO comment VALUES("rachel@gmail.com", "david@gmail.com", "see you tmr!", "2005-01-11");
INSERT INTO comment VALUES("joshua@gmail.com", "rachel@gmail.com", "you are really good at blast fishing", "2005-05-12");
INSERT INTO comment VALUES("david@gmail.com", "peter@gmail.com", "ten", "2008-09-12");
INSERT INTO comment VALUES("david@gmail.com", "john@gmail.com", "i'm king david", "2001-05-11");

INSERT INTO skill_comment VALUES("Blast Fishing", "jane@gmail.com", "I brought a rod that day and was forced to eat all the fishes.", "2011-12-22");
INSERT INTO skill_comment VALUES("Blast Fishing", "john@gmail.com", "We have more dynamite than fishes", "2012-12-22");
INSERT INTO skill_comment VALUES("Blast Fishing", "peter@gmail.com", "I'm reporting you guys.", "2012-12-22");
INSERT INTO skill_comment VALUES("SC2 GrandMaster", "may@gmail.com", "I'm only bronze. Help?", "2012-12-22");
INSERT INTO skill_comment VALUES("SC2 GrandMaster", "peter@gmail.com", "@may: try joining SC2 Silver first.", "2012-12-22");
INSERT INTO skill_comment VALUES("Burping", "john@gmail.com", "First.", "2012-12-22");
INSERT INTO skill_comment VALUES("Burping", "may@gmail.com", "Shutup loser.", "2012-12-22");