CREATE TABLE `ft_table` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `login` varchar(50) NOT NULL DEFAULT 'toto',
  `groupe` ENUM ('staff', 'student', 'other') NOT NULL,
  `date_de_creation` DATE NOT NULL,
  PRIMARY KEY (`id`)
);
