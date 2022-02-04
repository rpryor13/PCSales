CREATE TABLE `contacts` (
  `idcontacts` int NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(200) NOT NULL,
  `dtmDatetime` datetime NOT NULL,
  `intCPU` int NOT NULL,
  `intGPU` int NOT NULL,
  `intPSU` int NOT NULL,
  `intMOBO` int NOT NULL,
  `intRAM` int NOT NULL,
  `intSSD` int NOT NULL,
  `intNVME` int NOT NULL,
  `intMonitor` int NOT NULL,
  `intSpeaker` int NOT NULL,
  `intCooling` int NOT NULL,
  `intFurniture` int NOT NULL,
  `intMouse` int NOT NULL,
  `intKeyboard` int NOT NULL,
  `intCables` int NOT NULL,
  `intLaptop` int NOT NULL,
  `intHeadphones` int NOT NULL,
  `intNetworking` int NOT NULL,
  `intStorage` int NOT NULL,
  `intCase` int NOT NULL,
  `intBundle` int NOT NULL,
  `intWebcam` int NOT NULL,
  `intMic` int NOT NULL,
  `intConsole` int NOT NULL,
  `intChair` int NOT NULL,
  `intControllers` int NOT NULL,
  `intOther` int NOT NULL,
  `intStatus` int NOT NULL,
  PRIMARY KEY (`idcontacts`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci



CREATE TABLE `hardware` (
  `hardwareID` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  `title` varchar(512) NOT NULL,
  `redditlink` varchar(255) NOT NULL,
  `itemlink` varchar(255) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `finalprice` varchar(45) NOT NULL,
  `hardwareDTM` datetime NOT NULL,
  `camellink` varchar(300) NOT NULL,
  PRIMARY KEY (`hardwareID`)
) ENGINE=InnoDB AUTO_INCREMENT=6186 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci