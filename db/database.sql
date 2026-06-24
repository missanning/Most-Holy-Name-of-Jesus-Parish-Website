CREATE DATABASE IF NOT EXISTS parish_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE parish_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Safely add is_admin if missing (compatible with MySQL 5.7+)
DROP PROCEDURE IF EXISTS add_is_admin_column;
DELIMITER //
CREATE PROCEDURE add_is_admin_column()
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = 'parish_db'
          AND TABLE_NAME   = 'users'
          AND COLUMN_NAME  = 'is_admin'
    ) THEN
        ALTER TABLE users ADD COLUMN is_admin TINYINT(1) NOT NULL DEFAULT 0;
    END IF;
END //
DELIMITER ;
CALL add_is_admin_column();
DROP PROCEDURE IF EXISTS add_is_admin_column;

INSERT IGNORE INTO users (username, email, password, is_admin)
VALUES ('admin', 'admin@parish.com', '$2y$10$45QcCw6rrXtL2UHY/5BlPOWayf32iWddEP5/B50nstCu3rZk6iq8S', 1);

CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    icon VARCHAR(20) DEFAULT '&#128591;',
    date_label VARCHAR(50) NOT NULL,
    title VARCHAR(200) NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_date VARCHAR(50) NOT NULL,
    title VARCHAR(200) NOT NULL,
    time VARCHAR(50) NOT NULL,
    venue VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS mass_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    col1 VARCHAR(100) NOT NULL,
    col2 VARCHAR(100) NOT NULL,
    col3 VARCHAR(100) DEFAULT NULL
);

INSERT IGNORE INTO events (id, event_date, title, time, venue) VALUES
(1, 'July 20, 2025', 'Youth Fellowship Night', '6:00 PM', 'Parish Hall'),
(2, 'July 25, 2025', 'Parish Family Day', '9:00 AM', 'Parish Grounds'),
(3, 'August 1, 2025', 'Rosary Procession', '5:00 PM', 'Church Grounds'),
(4, 'August 10, 2025', 'Choir Recital', '7:00 PM', 'Main Church'),
(5, 'August 15, 2025', 'Assumption of Mary — Solemnity', '7AM / 9AM / 6PM', 'Main Church');

INSERT IGNORE INTO news (id, icon, date_label, title, body) VALUES
(1, '&#127882;', 'July 5, 2025', 'Parish Fiesta Celebration', 'Join us for our annual Parish Fiesta in honor of our patron saint with Mass, procession, and community activities.'),
(2, '&#128218;', 'June 28, 2025', 'New Bible Study Group Forming', 'We are forming a new weekly Bible Study group open to all parishioners. Sign-ups available at the parish office.'),
(3, '&#127891;', 'June 20, 2025', 'Religious Education Enrollment', 'Enrollment for the 2025-2026 Religious Education program is now open for children ages 6–17.'),
(4, '&#128139;', 'June 15, 2025', 'Medical Mission', 'Our outreach team will conduct a free medical mission for underprivileged families. Volunteers are welcome.'),
(5, '&#127926;', 'June 8, 2025', 'Choir Summer Concert', 'The Parish Choir presents an evening of sacred music. Admission is free. All are welcome!'),
(6, '&#128591;', 'June 1, 2025', 'Perpetual Adoration Chapel Opens', 'Our new Perpetual Adoration Chapel is now open 24 hours. Sign up for your holy hour online or at the office.');

CREATE TABLE IF NOT EXISTS ministries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    icon VARCHAR(20) DEFAULT '&#128100;',
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    sort_order INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS sacraments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    img VARCHAR(200) NOT NULL,
    name VARCHAR(100) NOT NULL,
    label VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    sort_order INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(200) NOT NULL,
    caption VARCHAR(200) DEFAULT '',
    sort_order INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category ENUM('document','faith','devotion') NOT NULL,
    icon VARCHAR(20) DEFAULT '&#128196;',
    title VARCHAR(200) NOT NULL,
    url VARCHAR(500) DEFAULT '#',
    col2 VARCHAR(200) DEFAULT NULL,
    sort_order INT DEFAULT 0
);

INSERT IGNORE INTO ministries (id, icon, title, description, sort_order) VALUES
(1,  '&#127925;', 'Music Ministry',             'Lead the community in worship through song and music at Sunday and special Masses.', 1),
(2,  '&#128149;', 'Lectors & Lectors',           'Proclaim the Word of God at Mass. Training provided for new volunteers.', 2),
(3,  '&#128100;', 'Extraordinary Ministers',      'Assist in the distribution of Holy Communion during Mass.', 3),
(4,  '&#128101;', 'Youth Ministry',               'Programs for teens and young adults to grow in faith, fellowship, and service.', 4),
(5,  '&#128140;', 'Couples for Christ',           'A family-based movement dedicated to evangelization and building Christian communities.', 5),
(6,  '&#9749;',   'Legion of Mary',               'Apostolic organization consecrated to Mary, engaging in spiritual and charitable works.', 6),
(7,  '&#127860;', 'Parish Outreach',              'Serving the poor through feeding programs, medical missions, and livelihood projects.', 7),
(8,  '&#128247;', 'Media & Communications',       'Manage the parish website, social media, and audio-visual needs.', 8),
(9,  '&#128270;', 'Ushers & Hospitality',         'Welcome parishioners and visitors, and maintain order during liturgical celebrations.', 9),
(10, '&#128156;', 'Prayer Groups',                'Come together to pray the Rosary, Divine Mercy Chaplet, and other devotions.', 10);

INSERT IGNORE INTO sacraments (id, img, name, label, description, sort_order) VALUES
(1, 'images/baptism.jpg',       'Baptism',           'Sacraments of Initiation', 'The sacrament of initiation and entry into the Catholic Church. Baptisms are celebrated on the 2nd and 4th Sunday of each month. Please contact the parish office to register for the Baptism Preparation Program.', 1),
(2, 'images/eucharist.jpg',     'Eucharist',         'Sacraments of Initiation', 'The source and summit of Christian life. First Holy Communion preparation classes are held annually for children in Grade 2. Contact the Religious Education office to enroll.', 2),
(3, 'images/confirmation.jpg',  'Confirmation',      'Sacraments of Initiation', 'The completion of Baptism and full reception of the Holy Spirit. Confirmation is prepared over two years. Please inquire at the parish office for the current schedule.', 3),
(4, 'images/reconciliation.jpg','Reconciliation',    'Sacraments of Healing',    'God''s mercy made present. Confessions are available by appointment. Please contact the parish office to schedule a time with a priest.', 4),
(5, 'images/anointing.jpg',     'Anointing of the Sick','Sacraments of Healing', 'Available to the seriously ill, elderly, or those preparing for major surgery. Contact the parish office or call for an emergency visit at any time.', 5),
(6, 'images/matrimony.jpg',     'Matrimony',         'Sacraments of Service',    'Marriage preparation (Pre-Cana) is required. Couples must contact the parish at least 6 months before the desired wedding date to begin the preparation process.', 6),
(7, 'images/sacrament-holyorders.jpg','Holy Orders', 'Sacraments of Service',    'Men discerning a vocation to the priesthood or diaconate are encouraged to speak with our Parish Priest for guidance and direction.', 7);

INSERT IGNORE INTO resources (id, category, icon, title, url, col2, sort_order) VALUES
(1, 'document', '&#128196;', 'Parish Bulletin',                    '#', NULL, 1),
(2, 'document', '&#128196;', 'Baptism Registration Form',          '#', NULL, 2),
(3, 'document', '&#128196;', 'Marriage Application Form',          '#', NULL, 3),
(4, 'document', '&#128196;', 'Religious Education Enrollment Form','#', NULL, 4),
(5, 'faith',    '&#128214;', 'Online Bible (USCCB)',               'https://www.usccb.org/bible', NULL, 1),
(6, 'faith',    '&#128214;', 'Catechism of the Catholic Church',   'https://www.ewtn.com/catholicism/teachings/catechism-of-the-catholic-church-2442', NULL, 2),
(7, 'faith',    '&#128214;', 'Vatican News',                       'https://www.vaticannews.va', NULL, 3),
(8, 'faith',    '&#128214;', 'Daily Readings & Liturgy of the Hours','https://universalis.com', NULL, 4),
(9,  'devotion', NULL, 'Holy Rosary',          NULL, 'Daily after 7:00 AM Mass',               1),
(10, 'devotion', NULL, 'Divine Mercy Chaplet', NULL, 'Friday 3:00 PM (Chapel)',                 2),
(11, 'devotion', NULL, 'Benediction',          NULL, 'First Friday of the month, 6:00 PM',      3),
(12, 'devotion', NULL, 'Stations of the Cross',NULL, 'Every Friday during Lent, 5:30 PM',       4);

INSERT IGNORE INTO mass_schedule (id, category, col1, col2, col3) VALUES
(1,  'weekly', 'Monday',          '—',        'No Regular Mass'),
(2,  'weekly', 'Tuesday',         '6:00 PM',  'Weekday Mass'),
(3,  'weekly', 'Wednesday',       '6:00 PM',  'Weekday Mass'),
(4,  'weekly', 'Thursday',        '6:00 PM',  'Weekday Mass'),
(5,  'weekly', 'Friday',          '6:00 PM',  'Weekday Mass'),
(6,  'weekly', 'Saturday',        '6:30 AM',  'Anticipated / Saturday Mass'),
(7,  'weekly', 'Sunday',          '7:00 AM',  'Morning Mass'),
(8,  'weekly', 'Sunday',          '9:00 AM',  'Morning Mass at SM Center San Pedro'),
(9,  'weekly', 'Sunday',          '6:30 PM',  'Evening Mass'),
(10, 'holyday', 'Christmas (Dec. 25)',         'Midnight Mass (Simbang Gabi culmination) and Morning Masses', NULL),
(11, 'holyday', 'Easter Sunday',               'Easter Vigil (Saturday evening) and Easter Sunday Masses',   NULL),
(12, 'holyday', 'Ash Wednesday',               'Multiple Masses with Distribution of Ashes',                 NULL),
(13, 'holyday', 'Good Friday',                 'Liturgy of the Passion of the Lord (usually afternoon)',     NULL),
(14, 'office',  'Tuesday – Sunday',            '9:00 AM – 12:00 NN • 2:00 PM – 5:00 PM',                    NULL),
(15, 'office',  'Monday & Holidays',           'Closed',                                                     NULL);
