-- =========================================
-- DATABASE: csjournal
-- =========================================
CREATE DATABASE IF NOT EXISTS csjournal;
USE csjournal;

-- =========================================
-- ADMIN TABLE
-- =========================================
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admin (username, password)
SELECT 'admin', '21232f297a57a5a743894a0e4a801fc3'
WHERE NOT EXISTS (SELECT 1 FROM admin WHERE username='admin');

/* ---- contat---- */
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================================
-- Users TABLE
-- =========================================

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================================
-- ANNOUNCEMENTS TABLE
-- =========================================
CREATE TABLE IF NOT EXISTS announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================
-- ABOUT PAGE SECTIONS
-- =========================================
CREATE TABLE IF NOT EXISTS about_sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO about_sections (title, content)
SELECT 'About Computer Science Department',
       'The Computer Science Department focuses on academic excellence, research, and innovation.'
WHERE NOT EXISTS (SELECT 1 FROM about_sections);

-- =========================================
-- CURRENT UPDATES
-- =========================================
CREATE TABLE IF NOT EXISTS current_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO current_updates (title, description)
SELECT 'Admissions Open',
       'Admissions open for the academic year 2025–2026.'
WHERE NOT EXISTS (SELECT 1 FROM current_updates);

-- =========================================
-- ORGANIZATIONAL STRUCTURE MEMBERS
-- =========================================
CREATE TABLE IF NOT EXISTS organizational_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(100) NOT NULL,
    role VARCHAR(100),
    name VARCHAR(255) NOT NULL,
    category VARCHAR(50) DEFAULT 'Internal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================
-- TEAM MEMBERS
-- =========================================
CREATE TABLE IF NOT EXISTS team_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    designation VARCHAR(100) NOT NULL,
    image VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================
-- ARTICLES (PDF UPLOAD READY)
-- =========================================
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_type VARCHAR(50) NOT NULL,
    access_type VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    authors VARCHAR(255) NOT NULL,
    journal_info VARCHAR(255) NOT NULL,
    published_date DATE NOT NULL,
    pdf_file VARCHAR(255) NOT NULL,
    pdf_original_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================
-- ORGANIZATIONAL STRUCTURE INSERTS
-- =========================================

-- 1. Chief Editor
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Chief Editor', 'Editor-in-Chief', 'Dr. J.G.R. Sathiaseelan', 'Internal'),
('Chief Editor', 'Associate Chief-Editor', 'Dr. K. Rajkumar', 'Internal');

-- 2. Associate Editors
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Associate Editors', '', 'Dr. John Raybin Jose', 'Internal'),
('Associate Editors', '', 'Dr. R. Jemima Priyadarshini', 'Internal'),
('Associate Editors', '', 'Dr. J. James Manoharan', 'Internal'),
('Associate Editors', '', 'Dr. Isac Gnanaraj', 'Internal');

-- 3. Managerial Editorial Team
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Managerial Editorial Team', '', 'Dr. G. Sobers Smiles David', 'Internal'),
('Managerial Editorial Team', '', 'Dr. R. Thamarai Selvi', 'Internal'),
('Managerial Editorial Team', '', 'Dr. D. Kirubai', 'Internal'),
('Managerial Editorial Team', '', 'Dr. S. Sophia', 'Internal');

-- 4. Patrons

INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Patrons', 'Chief Patron', 'Revered Bishop Ayya', 'Internal'),
('Patrons', 'Patron', 'Dr. Princy Merlin, Principal, BHC', 'Internal'),
('Patrons', 'Advisory Patron', 'Dr. Violet Dhayabaran, Dean, Academics-Sciences', 'Internal'),
('Patrons', 'Advisory Patron', 'Dr. Vijayalakshmi, Dean, Research and Development', 'Internal'),
('Patrons', 'Advisory Patron', 'Dr. Angeline Vedha, Dean, IQAC', 'Internal');

-- 5. Editorial Board Members
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Editorial Board Members', '', 'Dr. P. Thangaraju', 'Internal'),
('Editorial Board Members', '', 'Dr. P.S. Eliahim Jeevaraj', 'Internal'),
('Editorial Board Members', '', 'Dr. M. Kasthuri', 'Internal'),
('Editorial Board Members', '', 'Dr. L. Jeyasimman', 'Internal'),
('Editorial Board Members', '', 'Dr. M.S. Mythili', 'Internal'),
('Editorial Board Members', '', 'Dr. M.P. Anuradha', 'Internal'),
('Editorial Board Members', '', 'Dr. M. Subalakshmi', 'Internal'),
('Editorial Board Members', '', 'Dr. Ramah Sivakumar', 'Internal'),
('Editorial Board Members', '', 'Dr. B. Karthikeyan', 'Internal');

-- 6. Panel of Reviewers (Internal)
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Panel of Reviewers', '', 'Dr. B. Sathees Kumar', 'Internal'),
('Panel of Reviewers', '', 'Dr. M. Jayakkumar', 'Internal'),
('Panel of Reviewers', '', 'Dr. K. Mohd. Amanullah', 'Internal'),
('Panel of Reviewers', '', 'Dr. H.B. Vincent Raj', 'Internal'),
('Panel of Reviewers', '', 'Dr. M. Lovelin Pon Felciah', 'Internal'),
('Panel of Reviewers', '', 'Dr. S. Annal Ezhil Selvi', 'Internal'),
('Panel of Reviewers', '', 'Dr. B. Arputhamary', 'Internal'),
('Panel of Reviewers', '', 'Dr. J. Sai Geetha', 'Internal'),
('Panel of Reviewers', '', 'Dr. B. Gayathri', 'Internal'),
('Panel of Reviewers', '', 'Prof. S. Thiyables Stephen Smith', 'Internal'),
('Panel of Reviewers', '', 'Prof. A. Rizwana', 'Internal'),
('Panel of Reviewers', '', 'Prof. G. Vanitha', 'Internal'),
('Panel of Reviewers', '', 'Dr. S. Maheswari', 'Internal'),
('Panel of Reviewers', '', 'Dr. V. Geetha Dhanalakshmi', 'Internal'),
('Panel of Reviewers', '', 'Dr. R. Rajkumar', 'Internal'),
('Panel of Reviewers', '', 'Dr. K. Mahesh Babu', 'Internal'),
('Panel of Reviewers', '', 'Dr. A.K. Shafreen Banu', 'Internal'),
('Panel of Reviewers', '', 'Dr. R. Cynthia Monica Priya', 'Internal'),
('Panel of Reviewers', '', 'Dr. S. Subha', 'Internal'),
('Panel of Reviewers', '', 'Dr. Lino Fathima Chinna Rani', 'Internal'),
('Panel of Reviewers', '', 'Dr. T. Arulmozhi Devan', 'Internal'),
('Panel of Reviewers', '', 'Dr. T. Muralidharan', 'Internal'),
('Panel of Reviewers', '', 'Dr. N. Vijayaraj', 'Internal');

-- 7. Panel of Reviewers (External)
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Panel of Reviewers', '', 'To Be Added', 'External');

-- 8. International Advisory Board
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('International Advisory Board', '', 'To Be Added', 'External');

-- 9. Technical Team
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Technical Team', '', 'Dr. Pearly Charles', 'Internal'),
('Technical Team', '', 'Dr. A. Florence Deepa', 'Internal'),
('Technical Team', '', 'Prof. R. Vadivel', 'Internal'),
('Technical Team', '', 'Dr. S. Regha', 'Internal'),
('Technical Team', '', 'Dr. P. Anitha Vairamani', 'Internal'),
('Technical Team', '', 'Prof. Rachel Betty Sugumari', 'Internal'),
('Technical Team', '', 'Dr. G. Paul Davidson', 'Internal'),
('Technical Team', '', 'Prof. Sharon Dominic', 'Internal'),
('Technical Team', '', 'Dr. P. Iris Punitha', 'Internal'),
('Technical Team', '', 'Dr. Adlin Suji', 'Internal'),
('Technical Team', '', 'Dr. R. Preethi', 'Internal'),
('Technical Team', '', 'Dr. M. Kavitha', 'Internal'),
('Technical Team', '', 'Dr. S. Chitra', 'Internal');

-- 10. Publication & Ethics Committee
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Publication & Ethics Committee', '', 'Dr. J. Gnana Prasad, Librarian, BHC', 'Internal'),
('Publication & Ethics Committee', '', 'Dr. Josephine Prabha, Asso. Dean, Academics-Sciences', 'Internal');

-- 11. Communication & Promotion Team
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Communication & Promotion Team', '', 'Dr. L. Leelavathy', 'Internal'),
('Communication & Promotion Team', '', 'Dr. B. Ramesh', 'Internal');

-- 12. Publication Schedule
INSERT IGNORE INTO organizational_members (section, role, name, category) VALUES
('Publication Schedule', '', 'IJACSI is a quarterly journal, publishing four issues each year to ensure timely dissemination of high-quality research in advanced computing.', 'Internal'),
('Publication Schedule', '', 'Issues are released in March, June, September, and December.', 'Internal'),
('Publication Schedule', '', 'The quarterly publishing model enables rigorous peer review while ensuring steady research flow.', 'Internal'),
('Publication Schedule', '', 'Quarterly publication supports regular academic engagement and timely visibility for authors.', 'Internal'),
('Publication Schedule', '', 'This schedule upholds strong editorial standards and emerging relevance.', 'Internal');

ALTER TABLE organizational_members
ADD UNIQUE unique_member (section, role, name, category);


COMMIT;
