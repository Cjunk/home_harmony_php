DROP TABLE IF EXISTS testimonials;

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_url` varchar(255) NOT NULL,
  `testimonial_text` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `source` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image1.jpg","Thank you Nez for making these amazing balloons for my sons 2nd birthday party at Daycare. They kids loved them and played with them for the next few weeks. So clever and such good quality!","Leah Hopkins");
INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image2.jpg","She’s very creative person","Charito Del Rosario");
INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image3.jpg","So friendly and a great talent for balloon making!","Arlene Makayan");
INSERT INTO testimonials (photo_url,testimonial_text,author_name) VALUES ("./gallery/image4.jpg","Great service and balloons! The kids loved them! Highly recommended!","Jane Doe");