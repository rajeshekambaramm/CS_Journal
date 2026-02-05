-- phpMyAdmin SQL Dump
-- Database: csjournal
-- Updated for PDF uploads in articles table

CREATE DATABASE IF NOT EXISTS csjournal;
USE csjournal;

-- ================================================
-- Table: admin
-- ================================================
CREATE TABLE IF NOT EXISTS admin (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin (username, password, updated_at) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '2025-04-22 17:00:00');

-- ================================================
-- Table: content_management
-- ================================================
CREATE TABLE IF NOT EXISTS content_management (
  id INT(11) NOT NULL AUTO_INCREMENT,
  page_name VARCHAR(100) NOT NULL,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO content_management (page_name, title, content, updated_at) VALUES
('about', 'About Computer Science Department', 'The Computer Science Department focuses on academic excellence, research, and innovation.', '2025-04-22 17:10:00'),
('current', 'Current Updates', 'Admissions open for the academic year 2025–2026.', '2025-04-22 17:12:00'),
('organization', 'Organizational Structure', 'The department is headed by the HOD and supported by senior faculty members.', '2025-04-22 17:15:00');

-- ==========================================
-- Table: team_members
-- ==========================================
CREATE TABLE IF NOT EXISTS team_members (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  designation VARCHAR(100) NOT NULL,
  image VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO team_members (name, designation, image, description, created_at) VALUES
('Dr. A. Kumar', 'Head of Department', 'hod.jpg', 'Expert in Artificial Intelligence and Machine Learning.', '2025-04-22 17:20:00'),
('Ms. R. Devi', 'Assistant Professor', 'faculty1.jpg', 'Specialist in Web Technologies and Databases.', '2025-04-22 17:22:00');

-- ================================================
-- Table: announcements
-- ================================================
CREATE TABLE IF NOT EXISTS announcements (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ================================================
-- Table: articles (updated for PDF uploads)
-- ================================================
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_type VARCHAR(50) NOT NULL,           -- Research / Review Article
    access_type VARCHAR(50) NOT NULL,            -- Open Access / Restricted
    title VARCHAR(255) NOT NULL,
    authors VARCHAR(255) NOT NULL,
    journal_info VARCHAR(255) NOT NULL,
    published_date DATE NOT NULL,
    pdf_file VARCHAR(255) NOT NULL,              -- saved file name on server
    pdf_original_name VARCHAR(255) NOT NULL,     -- original file name
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS current_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE organizational_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(100) NOT NULL,
    role VARCHAR(100),
    name VARCHAR(255) NOT NULL,
    category VARCHAR(50) DEFAULT 'Internal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

COMMIT;
