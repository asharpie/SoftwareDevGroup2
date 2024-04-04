-- tables
-- Table: UserAccount
DROP TABLE IF EXISTS UserAccount;
CREATE TABLE UserAccount (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    um_email VARCHAR(50) NOT NULL,
    user_type VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

-- Table: Classes
DROP TABLE IF EXISTS Classes;
CREATE TABLE Classes (
    class_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50) NOT NULL,
    class_term VARCHAR(50) NOT NULL,
    class_professor VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

-- Table: MyClasses
DROP TABLE IF EXISTS MyClasses;
CREATE TABLE MyClasses (
    myClasses_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    class_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES UserAccount(user_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id),
    UNIQUE (user_id, class_id)
) ENGINE = InnoDB;

-- Table: Notes
DROP TABLE IF EXISTS Notes;
CREATE TABLE Notes (
    note_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_created TIMESTAMP NOT NULL,
    note_title VARCHAR(100) NOT NULL,
    note_content VARCHAR(10000) NOT NULL,
    verification BOOLEAN NOT NULL,
    user_id INT NOT NULL,
    class_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES UserAccount(user_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id),
    UNIQUE (user_id, class_id)
) ENGINE = InnoDB;

-- Table: Request_Reports
DROP TABLE IF EXISTS Request_Reports;
CREATE TABLE Request_Reports (
    request_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    request_content VARCHAR(10000) NOT NULL,
    status VARCHAR(50) NOT NULL,
    note_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (note_id) REFERENCES Notes(note_id),
    FOREIGN KEY (user_id) REFERENCES UserAccount(user_id),
    UNIQUE (note_id, user_id)
) ENGINE = InnoDB;
