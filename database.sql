CREATE DATABASE IF NOT EXISTS eventmate_db;
USE eventmate_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id VARCHAR(50) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    location VARCHAR(255),
    event_date VARCHAR(100),
    image VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS event_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    event_id VARCHAR(50) NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Events from events-data.js
INSERT IGNORE INTO events (id, category, title, location, event_date, image) VALUES
('acad-1', 'Academic', 'Career Guidence Seminar', 'CG Unit, Ananda College, Colombo 07', '20 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/lecture.jpeg?w=4480&h=2016'),
('acad-2', 'Academic', 'Career Fair CODE GEN', 'University of Kalaniya', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/career%20fair%20code%20gen.jpg?w=4593&h=2844'),
('acad-3', 'Academic', 'Coding Hackathon', 'IIT, Colombo', '25 March 2026', 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=800'),
('acad-4', 'Academic', 'JOB Fair', 'Colombo', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/job%20fair.jpg?w=810&h=523'),
('acad-5', 'Academic', 'International Conference on Assessment and Evaluation in Curriculum Design', 'Colombo', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/meetings.jpg?w=1200&h=800'),
('acad-6', 'Academic', 'International Conference on Work-Based Learning & Vocational Practices', 'Colombo', '25 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/career%20fair.jpg?w=5330&h=3553'),
('acad-7', 'Academic', '22nd International Conference on Business Management', 'Nugegoda', '2026 (annual conference)', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/conference.jpg?w=2048&h=1365'),
('acad-8', 'Academic', 'International Research Conference on Management & Finance', 'Colombo', '27 November 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/confarance1.jpg?w=960&h=539&ar=960%3A539'),
('acad-9', 'Academic', 'Professional Event Management Training Program', 'Colombo', '31 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/1719716139702.jpg?w=800&h=600'),
('acad-10', 'Academic', 'SLASSCOME Profectional Skills Workshop', 'Kandy – Earl’s Regency Hotel', '11–12 December 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/SLASSCOM-Workshop.jpeg?w=782&h=784'),

('cult-1', 'Cultural', 'Play Expo & Colombo Comic Expo', 'Colombo – SECC', '10–11 January 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/comic.jpg?w=600&h=338'),
('cult-2', 'Cultural', 'Kandy Esala Perahera', 'Kandy', 'July–August annually', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/esala%20perahera.jpg?w=1024&h=1024'),
('cult-3', 'Cultural', 'Galle Literary Festival', 'Galle Fort', '15-05-2026', 'https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?auto=format&fit=crop&q=80&w=800'),
('cult-5', 'Cultural', 'Colombo International Book Fair', 'BMICH, Colombo', 'September annually', 'https://69b5b39dd7351016cf21d281.imgix.net/639031a313ba6-Delhi%20Book%20Fair%20Tours.jpg?w=1920&h=1080'),
('cult-6', 'Cultural', 'Kala Pola Art Festival', 'Colombo', '30-03-2026', 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800'),
('cult-7', 'Cultural', 'Music Festival', 'Kelaniya', 'January', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/music%20concert.jpg?w=600&h=400'),
('cult-8', 'Cultural', 'Hikkaduwa Beach Fest', 'Hikkaduwa', 'April', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&q=80&w=800'),

('spor-1', 'Sports', 'Inter-University Cricket Tournament', 'Rajarata University Of Sri Lanka', '12-05-2026 ', 'https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&q=80&w=800'),
('spor-2', 'Sports', 'Champion Track & Field Meet', 'Colombo', '28–29 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/image_c5f92b4ee1.jpg?w=800&h=600'),
('spor-3', 'Sports', 'Sri Lanka Open Chess Championship', 'Colombo', 'September 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/WhatsApp%20Image%202026-03-15%20at%2001.30.02.jpeg?w=736&h=1308&ar=736%3A1308'),
('spor-4', 'Sports', 'Legends Tour Golf Tournament', 'Royal Colombo Golf Club', '25–31 January 2026', 'https://images.unsplash.com/photo-1535131749006-b7f58c99034b?auto=format&fit=crop&q=80&w=800'),
('spor-5', 'Sports', 'ICC Men''s T20 World Cup 2026', 'Colombo & Kandy', 'Feb–Mar 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/cricket.avif?w=480&h=360'),
('spor-6', 'Sports', 'Inter-University Games', 'Various universities', 'September', 'https://69b5b39dd7351016cf21d281.imgix.net/Inter-University-Championship-20-1024x683.jpg?w=1024&h=683'),
('spor-7', 'Sports', 'National School Games', 'Sugathadasa Stadium', 'October', 'https://69b5b39dd7351016cf21d281.imgix.net/NATIONAL%20SCHOOL%20GAMES%202025%20-%20Square%20(1).webp?w=1080&h=1080'),
('spor-8', 'Sports', 'Colombo Marathon', 'Colombo', 'October', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/marathon.jpg?w=1440&h=958'),
('spor-9', 'Sports', 'SLT Esport King', 'Islandwide Online', 'June–August', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/gaming.jpg?w=1000&h=764'),
('spor-10', 'Sports', 'National Netball Championship', 'Colombo', 'July', 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&q=80&w=800'),

('soci-1', 'Social', 'World Blood Donor Day Campaign', 'National Blood Service', '14 June annually', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/blood%20donation.jpg?w=700&h=441'),
('soci-2', 'Social', 'Earth Day Environmental Campaign', 'Nationwide', '22 April annually', 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&q=80&w=800'),
('soci-3', 'Social', 'Cleaning up around coral reefs', 'Hikkaduwa', 'September', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/beach%20cleanup.jpg?w=1024&h=683'),
('soci-4', 'Social', 'Beach Cleaning Program', 'Mt. Lavinia Beach', 'Monthly volunteer events', 'https://69b5b39dd7351016cf21d281.imgix.net/eventmate/beach%20clean.jpg?w=500&h=333'),
('soci-5', 'Social', 'Tree Planting Program', 'Various districts', 'June–July', 'https://69b5b39dd7351016cf21d281.imgix.net/banner-tp_0.jpg?w=1143&h=925'),

('bus-1', 'Business', 'Cascale Sustainable Apparel Forum', 'Colombo', '30 May – 1 June 2026', 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&q=80&w=800'),
('bus-2', 'Business', 'Digital Marketing Summit Sri Lanka', 'Colombo', 'June', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800'),
('bus-3', 'Business', 'Sri Lanka Economic Summit', 'Shangri-La, Colombo', 'July', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=800'),
('bus-4', 'Business', 'Startup Weekend Colombo', 'Colombo', 'August', 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&q=80&w=800'),
('bus-5', 'Business', 'Enterprise Risk Management Seminar', 'Colombo', '12 March 2026', 'https://69b5b39dd7351016cf21d281.imgix.net/1725423594814.jpg?w=800&h=450');
