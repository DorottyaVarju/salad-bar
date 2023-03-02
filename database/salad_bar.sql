-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: salad_bar
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contain`
--

DROP TABLE IF EXISTS `contain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contain` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productID` int NOT NULL,
  `orderID` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `orderID` (`orderID`),
  KEY `productID` (`productID`),
  CONSTRAINT `contain_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`),
  CONSTRAINT `contain_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contain`
--

LOCK TABLES `contain` WRITE;
/*!40000 ALTER TABLE `contain` DISABLE KEYS */;
/*!40000 ALTER TABLE `contain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `recent_status` enum('recieved','pending','delivered','cancelled') DEFAULT NULL,
  `sum` float NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `userID` (`userID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `type` enum('salad','smoothie','soup') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `image` (`image`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,4.8,'Caesar Salad','Romaine lettuce, Croutons, Parmesan cheese, Caesar dressing (made with egg yolks, lemon juice, garlic, anchovies, Dijon mustard, olive oil, and Parmesan cheese, Grilled Chicken, Carrot, Purple cabbage)','salad','caesar.jpg'),(3,4.6,'Couscous Salad','Couscous, cucumbers, tomatoes, bell peppers, basil, lemon juice and olive oil for dressing, zucchini, feta cheese','salad','couscous.jpg'),(7,4.9,'Greek Salad','Ripe tomatoes, cucumber, red onion, feta cheese, Kalamata olives, green bell pepper, extra virgin olive oil, red wine vinegar, dried oregano, salt, black pepper','salad','greek.jpg'),(8,4.8,'Papaya Salad','green papaya, carrots, tomatoes, green beans, peanuts, garlic, thai chili peppers, fish sauce, lime juice, sugar','salad','papaya.jpg'),(9,4.7,'Tofu Salad','tofu, parsley, bell peppers, green onions, sesame seeds, soy sauce, sesame oil, rice vinegar, agave nectar, pasta','salad','tofu.jpg'),(10,5.1,'Glow Smoothie','cooked beetroot, pomegranate seeds, greek yogurt, maple syrup, almond milk, ice cubes','smoothie','glow.jpg'),(11,5.1,'Green Detox Smoothie','spinach, green apples, avocado, cucumber, lime juice, ginger, water','smoothie','greendetox.jpg'),(12,4.85,'Mango Smoothie','ripe mango, greek yogurt, coconut milk, honey, ice cubes','smoothie','mango.jpg'),(13,4.75,'Strawberry Smoothie','strawberry, greek yogurt, coconut milk, honey, ice cubes','smoothie','strawberry.jpg'),(14,4.84,'Watermelon Smoothie','watermelon, greek yogurt, lime juice, agave nectar, ice cubes','smoothie','watermelon.jpg'),(15,5.21,'Carrot Ginger Soup','carrots, onion, garlic, ginger, vegetable broth,coconut milk, olive oil, salt, pepper','soup','gingercarrot.jpg'),(16,5.12,'Goulash','beef, onions, garlic, paprika, tomato, carrot, bell pepper, potato, beef broth, bay leaves, salt, pepper, flour','soup','goulash.jpg'),(17,5.12,'Pumpkin Orange Soup','olive oil, onions, garlic, ginger, cumin, cinnamon, nutmeg, pumpkin, vegetable broth, orange juice, salt, pepper, honey, heavy cream','soup','pumpkinorange.jpg'),(18,4.55,'Spinach Soup','olive oil, onion, garlic, vegetable broth, fresh spinach leaves, salt, pepper, coconut cream','soup','spinach.jpg'),(19,4.73,'Tomato Soup','olive oil, onion, garlic, vegetable broth, tomato, sugar, salt, black pepper, thyme, coconut cream','soup','tomato.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worker` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `introduction` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `introduction` (`introduction`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,'John','Doe','As founder, I wanted to create a space where people could enjoy fresh, healthy salads made with locally-sourced ingredients. To bring my vision to life, I spoke to local farmers and suppliers to source the freshest, most flavorful produce available.','john.jpg','Founder'),(2,'David','Johnson','I\'m constantly researching the latest nutritional information to ensure that our salads are as healthy as possible. I take pride in knowing that every salad we serve is not only delicious, but also supports our customers\' goals for better health.','david.jpg','Head Salad Maker'),(3,'Jane','Smith','Working at a salad bar has helped me develop a deeper appreciation for the power of food to nourish both body and soul. It\'s amazing to see how something as simple as a well-made salad can bring so much joy and satisfaction to someone\'s day.','jane.jpg','Salad Maker'),(4,'Emily','Brown','I love working at a place where I can see the positive impact of what I do on people\'s lives - whether it\'s helping someone meet their health goals or just brightening their day with a tasty meal.','emily.jpg','Salad Maker'),(5,'Michael','Davis','Helping people eat better and feel better is what drives me to keep learning and growing as a salad-maker. There\'s always something new to discover about the world of healthy eating!','michael.jpg','Salad Maker');
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-02 23:01:55
