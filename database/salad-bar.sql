CREATE DATABASE  IF NOT EXISTS `salad_bar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `salad_bar`;
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
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `orderID` (`orderID`),
  KEY `productID` (`productID`),
  CONSTRAINT `contain_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`),
  CONSTRAINT `contain_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1320 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contain`
--

LOCK TABLES `contain` WRITE;
/*!40000 ALTER TABLE `contain` DISABLE KEYS */;
INSERT INTO `contain` VALUES (1300,1,679,1),(1301,13,679,2),(1302,12,680,4),(1303,14,680,2),(1304,18,680,1),(1305,15,681,1),(1306,18,681,1),(1307,16,681,1),(1308,19,681,2),(1309,15,682,1),(1310,18,682,1),(1311,16,682,3),(1312,17,682,1),(1313,12,683,1),(1314,10,684,2),(1315,15,685,1),(1316,9,685,4),(1317,1,686,1),(1318,3,687,1),(1319,8,687,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=688 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (679,'delivered',14,2),(680,'delivered',33.83,2),(681,'cancelled',24.34,2),(682,'delivered',30.24,3),(683,'delivered',4.85,3),(684,'cancelled',10.2,3),(685,'delivered',23.41,3),(686,'delivered',4.8,3),(687,'pending',9.4,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Jason','Kim','6ffb25382149f71573600ede70cbf39a6665199c','jason.kim@yahoo.com','567 Pine Street, Anotherplace, USA'),(3,'Amy','Nguyen','7f171e9a0df6050ab6fc9201165905bf58a4d81c','amy.nguyen@gmail.com','321 Maple Road, Anyplace, USA'),(4,'Mike','Johnson','3b4dc015c94903b34a5a43051b24d07c718723fd','mike.johnson@hotmail.com','789 Elm Avenue, Anywhere, USA');
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
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `introduction` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,'John','Doe','john.jpg','Founder','As the founder of a salad bar, I am passionate about promoting healthy eating and providing people with delicious and nutritious meal options. My vision was to create a space where people could come and create their own custom salads using only the freshest and highest quality ingredients. I believe that everyone deserves access to healthy food, and my salad bar is my way of contributing to that mission. I am constantly innovating and exploring new flavor combinations to keep our customers excited and engaged with our offerings.'),(2,'David','Johnson','david.jpg','Head Salad Maker','As the head salad maker, it\'s my responsibility to oversee the entire salad-making process, from selecting the freshest ingredients to creating new recipes that keep our customers coming back. I take pride in ensuring that every salad we serve is made to the highest standard of quality and flavor. I work closely with my team to train them in the art of salad-making and to maintain a clean and efficient kitchen.'),(3,'Jane','Smith','jane.jpg','Salad Maker','As a salad maker, making salads is not just a job for me, it\'s a hobby that I enjoy every day. I love to experiment with different types of greens, fruits, nuts, and dressings to create unique and tasty salads that I\'m proud of. When I\'m not making salads at work, I\'m often in my home kitchen, trying out new recipes and combinations of ingredients to see what works best together. I also enjoy reading about the latest health trends and incorporating them into my salads, using ingredients like quinoa, chia seeds, and kale. For me, making salads is a fun and creative outlet that allows me to express myself through food and share my passion with others. Whether it\'s a simple side salad or a hearty main course, I love the challenge of making salads that are not only healthy but also delicious and satisfying.'),(4,'Emily','Brown','emily.jpg','Salad Maker','As a salad maker, I am passionate about creating delicious and nutritious meals that are good for the body and soul. I love experimenting with different combinations of fresh vegetables, fruits, and herbs to create unique flavor profiles and textures in my salads. My goal is to make healthy eating enjoyable and accessible to everyone, whether they are looking to lose weight, improve their health, or simply enjoy a tasty meal. With each salad I create, I hope to inspire others to embrace a healthy lifestyle and discover the joy of eating well.'),(5,'Michael','Davis','michael.jpg','Salad Maker','As a salad maker, I\'m always on the hunt for fresh, vibrant ingredients that make my salads pop with color and flavor. Crafting salads is my passion. There\'s something about combining different textures and tastes that just feels so satisfying. I believe that salads can be so much more than just a side dish. When done right, they can be a main course that\'s both healthy and delicious. Whether it\'s a classic Caesar salad or a creative blend of exotic ingredients, I love the challenge of coming up with new salad ideas and experimenting with different combinations. For me, there\'s nothing more rewarding than seeing the smile on someone\'s face when they take a bite of one of my salads and realize just how delicious and nutritious it can be.');
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

-- Dump completed on 2023-03-20 21:54:44
