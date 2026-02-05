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

COMMIT;
