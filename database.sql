-- EventMate Database Schema
CREATE DATABASE IF NOT EXISTS eventmate_db;
USE eventmate_db;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Events Table
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    category VARCHAR(50) NOT NULL,
    location VARCHAR(200) NOT NULL,
    event_date VARCHAR(100) NOT NULL,
    image VARCHAR(500) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Event Registrations Table
CREATE TABLE IF NOT EXISTS event_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    event_id INT NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

-- Messages Table (Contact Form)
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Event Data
INSERT INTO events (title, category, location, event_date, image) VALUES
('Career Guidence Seminar', 'Academic', 'CG Unit, Ananda College, Colombo 07', '20 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/lecture.jpeg?w=4480&h=2016'),
('Career Fair CODE GEN', 'Academic', 'University of Kalaniya', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/career%20fair%20code%20gen.jpg?w=4593&h=2844'),
('Coding Hackathon', 'Academic', 'IIT, Colombo', '25 March 2026', 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=800'),
('JOB Fair', 'Academic', 'Colombo', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/job%20fair.jpg?w=810&h=523'),
('International Conference on Assessment and Evaluation in Curriculum Design', 'Academic', 'Colombo', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/meetings.jpg?w=1200&h=800'),
('International Conference on Work-Based Learning & Vocational Practices', 'Academic', 'Colombo', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/career%20fair.jpg?w=5330&h=3553'),
('22nd International Conference on Business Management', 'Academic', 'Nugegoda', '2026 (annual conference)', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/conference.jpg?w=2048&h=1365'),
('International Research Conference on Management & Finance', 'Academic', 'Colombo', '27 November 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/confarance1.jpg?w=960&h=539&ar=960%3A539'),
('Professional Event Management Training Program', 'Academic', 'Colombo', '31 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/1719716139702.jpg?w=800&h=600'),
('SLASSCOME Profectional Skills Workshop', 'Academic', 'Kandy – Earl’s Regency Hotel', '11–12 December 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/SLASSCOM-Workshop.jpeg?w=782&h=784'),
('Play Expo & Colombo Comic Expo', 'Cultural', 'Colombo – SECC', '10–11 January 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/comic.jpg?w=600&h=338'),
('Kandy Esala Perahera', 'Cultural', 'Kandy', 'July–August annually', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/esala%20perahera.jpg?w=1024&h=1024'),
('Galle Literary Festival', 'Cultural', 'Galle Fort', '15-05-2026', 'https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?auto=format&fit=crop&q=80&w=800'),
('Colombo International Book Fair', 'Cultural', 'BMICH, Colombo', 'September annually', 'https://69b5b39dd7351016cf21d281.imgix.net/639031a313ba6-Delhi%20Book%20Fair%20Tours.jpg?w=1920&h=1080'),
('Kala Pola Art Festival', 'Cultural', 'Colombo', '30-03-2026', 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800'),
('Music Festival', 'Cultural', 'Kelaniya', 'January', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/music%20concert.jpg?w=600&h=400'),
('Hikkaduwa Beach Fest', 'Cultural', 'Hikkaduwa', 'April', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=800'),
('Inter-University Cricket Tournament', 'Sports', 'Rajarata University Of Sri Lanka', '12-05-2026 ', 'https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&q=80&w=800'),
('Champion Track & Field Meet', 'Sports', 'Colombo', '28–29 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/image_c5f92b4ee1.jpg?w=800&h=600'),
('Sri Lanka Open Chess Championship', 'Sports', 'Colombo', 'September 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/WhatsApp%20Image%202026-03-15%20at%2001.30.02.jpeg?w=736&h=1308&ar=736%3A1308'),
('Legends Tour Golf Tournament', 'Sports', 'Royal Colombo Golf Club', '25–31 January 2026', 'https://images.unsplash.com/photo-1535131749006-b7f58c99034b?auto=format&fit=crop&q=80&w=800'),
('ICC Men''s T20 World Cup 2026', 'Sports', 'Colombo & Kandy', 'Feb–Mar 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/cricket.avif?w=480&h=360'),
('Inter-University Games', 'Sports', 'Various universities', 'September', 'https://69b5b39dd7351016cf21d281.imgix.net/Inter-University-Championship-20-1024x683.jpg?w=1024&h=683'),
('National School Games', 'Sports', 'Sugathadasa Stadium', 'October', 'https://69b5b39dd7351016cf21d281.imgix.net/NATIONAL%20SCHOOL%20GAMES%202025%20-%20Square%20(1).webp?w=1080&h=1080'),
('Colombo Marathon', 'Sports', 'Colombo', 'October', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/marathon.jpg?w=1440&h=958'),
('SLT Esport King', 'Sports', 'Islandwide Online', 'June–August', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/gaming.jpg?w=1000&h=764'),
('National Netball Championship', 'Sports', 'Colombo', 'July', 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&q=80&w=800'),
('World Blood Donor Day Campaign', 'Social', 'National Blood Service', '14 June annually', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/blood%20donation.jpg?w=700&h=441'),
('Earth Day Environmental Campaign', 'Social', 'Nationwide', '22 April annually', 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&q=80&w=800'),
('Cleaning up around coral reefs', 'Social', 'Hikkaduwa', 'September', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/beach%20cleanup.jpg?w=1024&h=683'),
('Beach Cleaning Program', 'Social', 'Mt. Lavinia Beach', 'Monthly volunteer events', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/beach%20clean.jpg?w=500&h=333'),
('Tree Planting Program', 'Social', 'Various districts', 'June–July', 'https://69b5b39dd7351016cf21d281.imgix.net/banner-tp_0.jpg?w=1143&h=925'),
('Cascale Sustainable Apparel Forum', 'Business', 'Colombo', '30 May – 1 June 2026', 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&q=80&w=800'),
('Digital Marketing Summit Sri Lanka', 'Business', 'Colombo', 'June', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800'),
('Sri Lanka Economic Summit', 'Business', 'Shangri-La, Colombo', 'July', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=800'),
('Startup Weekend Colombo', 'Business', 'Colombo', 'August', 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&q=80&w=800'),
('Enterprise Risk Management Seminar', 'Business', 'Colombo', '12 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/1725423594814.jpg?w=800&h=450');
