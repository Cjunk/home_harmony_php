DROP TABLE IF EXISTS site_visits,testimonials,Events;
CREATE TABLE site_visits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  visits INT NOT NULL,
  last_visit TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  descr TEXT
);
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_url` varchar(255) NOT NULL,
  `testimonial_text` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `source` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `Events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO site_visits (visits,descr) VALUES (0,"dummy");
INSERT INTO site_visits (visits,descr) VALUES (0,"Production");
INSERT INTO site_visits (visits,descr) VALUES (0,"developer");

INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image1.jpg","Thank you Nez for making these amazing balloons for my sons 2nd birthday party at Daycare. They kids loved them and played with them for the next few weeks. So clever and such good quality!","Leah Hopkins");
INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image2.jpg","She’s very creative person","Charito Del Rosario");
INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image3.jpg","So friendly and a great talent for balloon making!","Arlene Makayan");
INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image4.jpg","Great service and balloons! The kids loved them! Highly recommended!","Jane Doe");

INSERT INTO Events (title,start_date,end_date,description) VALUES ('Kids Party','25/04/2024','25/04/2024','Description')
