-- MySQL dump 10.13  Distrib 5.7.36, for osx10.16 (x86_64)
--
-- Host: localhost    Database: oct0_local
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(10) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `object` int(10) unsigned DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'jpg',
  `caption` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(10) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `name1` tinytext,
  `name2` tinytext,
  `address1` text,
  `address2` text,
  `city` tinytext,
  `state` tinytext,
  `zip` tinytext,
  `country` tinytext,
  `phone` tinytext,
  `fax` tinytext,
  `url` tinytext,
  `email` tinytext,
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `head` tinytext,
  `deck` mediumblob,
  `body` mediumblob,
  `notes` mediumblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,1,'2021-12-17 15:51:08','2022-01-04 18:05:13',NULL,'?',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n												\r\n												\r\n												\r\n												\r\n												\r\n												\r\n																								<br>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n												\r\n												<div>OCT0 is founded by Stefan Kalmar and Raoul Klooker in 2022.</div>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n												\r\n												\r\n												\r\n												\r\n												\r\n												\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								'),(2,1,'2021-12-17 15:51:15','2022-01-04 18:02:17',1,'Producing',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'producing',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n																								<br>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								<div>We produce new ideas and new works, together with artists, writers, film-makers and everybody else we might find interesting: in, beyond and in-between the often rigid economies and formats of exhibitions, buildings, institutions, plays, performance, film, music or publishing.&nbsp;</div>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								You might find us here or elsewhere: inside a cave or at sea, in a city or a tree.\r\n																								\r\n																								\r\n																								\r\n												\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								'),(3,1,'2021-12-17 15:51:41','2022-01-04 18:02:10',2,'Operating',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'operating',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n																								\r\n												\r\n																								\r\n																								<div><br></div>\r\n																								',_binary '\r\n																								\r\n																								\r\n																								\r\n												\r\n																								\r\n																								<div><div>Operating beyond and in-between the often rigid economies and formats of exhibitions, buildings, institutions, plays, performance, film, music and publishing, OCT0 changes as it needs to.<br></div></div>\r\n																								',_binary '\r\n																								<div>We produce new ideas and new works together with artists, writers, filmmakers and whoever else we might find interesting.</div>\r\n																								\r\n																								\r\n												\r\n																								\r\n																								\r\n																								'),(4,1,'2021-12-17 15:51:55','2022-01-04 18:07:19',3,'Looking',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'looking',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n																								\r\n																								<div><br></div>\r\n																								',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												<div>We look from a distance towards the centre, observing the awkward attempts to return to a status quo that has failed most and in the process alienates all those who are not prepared to play along. OCT0 is as critical as it is poetic.&nbsp;</div><div><br></div><div>We work carefully, sometimes on 8 things at the same time, sometimes on one idea for months, for years, and sometimes not at all. You might find us here or elsewhere: inside a cave or at sea, in a city or a tree.&nbsp;<br></div>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n																								\r\n																								\r\n																								'),(5,1,'2021-12-17 15:52:01','2022-01-04 18:11:57',4,'So...',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'so',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n												\r\n																								<br>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												<div>So here we are, not giving up, we know we are not alone in our search for and work to recover urgency, integrity and meaning. Resistance isn’t something you join, it’s who you are.</div>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n												\r\n												\r\n												\r\n																								\r\n																								\r\n																								'),(6,1,'2021-12-17 15:52:05','2022-01-04 17:59:23',5,'Shop',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'shop',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n												\r\n												\r\n																								<br>',_binary '\r\n																								\r\n																								',_binary '\r\n																								\r\n																								<div><br></div>'),(7,1,'2021-12-17 15:52:10','2022-01-04 18:02:02',6,'Sign up',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sign-up',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n												\r\n												\r\n												\r\n												\r\n												\r\n																								\r\n																								<div><br></div>\r\n																								',_binary '\r\n																								\r\n																								<style>\r\n      @font-face {\r\n        font-display: block;\r\n        font-family: Roboto;\r\n        src: url(https://assets.sendinblue.com/font/Roboto/Latin/normal/normal/7529907e9eaf8ebb5220c5f9850e3811.woff2) format(\"woff2\"), url(https://assets.sendinblue.com/font/Roboto/Latin/normal/normal/25c678feafdc175a70922a116c9be3e7.woff) format(\"woff\")\r\n      }\r\n\r\n      @font-face {\r\n        font-display: fallback;\r\n        font-family: Roboto;\r\n        font-weight: 600;\r\n        src: url(https://assets.sendinblue.com/font/Roboto/Latin/medium/normal/6e9caeeafb1f3491be3e32744bc30440.woff2) format(\"woff2\"), url(https://assets.sendinblue.com/font/Roboto/Latin/medium/normal/71501f0d8d5aa95960f6475d5487d4c2.woff) format(\"woff\")\r\n      }\r\n\r\n      @font-face {\r\n        font-display: fallback;\r\n        font-family: Roboto;\r\n        font-weight: 700;\r\n        src: url(https://assets.sendinblue.com/font/Roboto/Latin/bold/normal/3ef7cf158f310cf752d5ad08cd0e7e60.woff2) format(\"woff2\"), url(https://assets.sendinblue.com/font/Roboto/Latin/bold/normal/ece3a1d82f18b60bcce0211725c476aa.woff) format(\"woff\")\r\n      }\r\n#sib-container{\r\npadding:0;\r\n}\r\n\r\n      #sib-container input:-ms-input-placeholder {\r\n        text-align: left;\r\n        font-family: \"Helvetica\", sans-serif;\r\n        color: #c0ccda;\r\n      }\r\n\r\n      #sib-container input::placeholder {\r\n        text-align: left;\r\n        font-family: \"Helvetica\", sans-serif;\r\n        color: #c0ccda;\r\n      }\r\n\r\n      #sib-container textarea::placeholder {\r\n        text-align: left;\r\n        font-family: \"Helvetica\", sans-serif;\r\n        color: #c0ccda;\r\n      }\r\n\r\n      .newsletter-container {\r\n        display: flex;\r\n        width : 95vw;\r\n      }\r\n\r\n      #sib-container {\r\n        margin : 0!important;\r\n        width : initial!important;\r\n      }\r\n\r\n      #sib-form {\r\n        display: flex;\r\n      }\r\n\r\n      .sib-form {\r\n        font-family : \"helvetica\", sans-serif!important;\r\n      }\r\n    </style>\r\n<div class=\"newsletter break\">\r\n    <!-- Begin Sendinblue Form -->\r\n\r\n<!-- START - We recommend to place the below code where you want the form in your website html  -->\r\n<div class=\"sib-form\" style=\"text-align: left;                      \">\r\n  <div id=\"sib-form-container\" class=\"sib-form-container\">\r\n    <div id=\"error-message\" class=\"sib-form-message-panel\" style=\"font-size:16px; text-align:left; font-family:&quot;Helvetica&quot;, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:540px;\">\r\n      <div class=\"sib-form-message-panel__text sib-form-message-panel__text--center\">\r\n        <!-- <svg viewBox=\"0 0 512 512\" class=\"sib-icon sib-notification__icon\">\r\n          <path d=\"M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z\" />\r\n        </svg> -->\r\n        <span class=\"sib-form-message-panel__inner-text\">\r\n                          We could not confirm your subscription.\r\n                      </span>\r\n      </div>\r\n    </div>\r\n    <div></div>\r\n    <div id=\"success-message\" class=\"sib-form-message-panel\" style=\"font-size:16px; text-align:left; font-family:&quot;Helvetica&quot;, sans-serif; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:540px;\">\r\n      <div class=\"sib-form-message-panel__text sib-form-message-panel__text--center\">\r\n        <svg viewBox=\"0 0 512 512\" class=\"sib-icon sib-notification__icon\">\r\n          <path d=\"M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z\"></path>\r\n        </svg>\r\n        <span class=\"sib-form-message-panel__inner-text\">\r\n                          Subscription confirmed !\r\n                      </span>\r\n      </div>\r\n    </div>\r\n    <div></div>\r\n      <div class=\"newsletter-container\">\r\n        <div class=\"stayin\">Stay in</div>\r\n\r\n        <div id=\"sib-container\" class=\"sib-container--large sib-container--horizontal\" style=\"text-align:left; background-color:transparent; max-width:540px; border-width:0px; border-color:#ffffff; border-style:solid;\">\r\n        <form id=\"sib-form\" method=\"POST\" action=\"https://495e63c0.sibforms.com/serve/MUIEAIvujuho9qdSwFgl5vlKCZEV4NfHnLNGIbYnztiO-uMQ5qKoLnDFdMhIEgcRwna7FauS_rkTB13vGIbIu0fZQqfCYxr2tHXuo3kBBJmxMh2hHJ7q5IziEBpsQgfZjnShytC74YIAgVNj2BjG5VIlxI3t-PWDjW_ylXYokAZEQGskc4g2XEUe70ZzSrrTLO3SiRO_oH1vf-vB\" data-type=\"subscription\" novalidate=\"true\">\r\n          <div class=\"line-email\">\r\n            <div class=\"sib-input sib-form-block\">\r\n              <div class=\"form__entry entry_block\">\r\n                <div class=\"form__label-row form__label-row--horizontal\">\r\n\r\n                  <div class=\"entry__field\">\r\n                    <input class=\"input\" type=\"text\" id=\"EMAIL\" name=\"EMAIL\" autocomplete=\"off\" data-required=\"true\" required=\"\" style=\"outline:none;\">\r\n                  </div>\r\n                </div>\r\n\r\n                <label class=\"entry__error entry__error--primary\" style=\"font-size:16px; text-align:left; font-family:&quot;Helvetica&quot;, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;\">\r\n                </label>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          <div>\r\n            <div class=\"sib-form-block\" style=\"text-align: left\">\r\n              <button class=\"sib-form-block__button sib-form-block__button-with-loader\" style=\"font-size:16px; text-align:left; font-weight:700; font-family:&quot;Helvetica&quot;, sans-serif; background-color:#ffffff; border-radius:3px; border-width:0px;\" form=\"sib-form\" type=\"submit\">\r\n                <svg class=\"icon clickable__icon progress-indicator__icon sib-hide-loader-icon\" viewBox=\"0 0 512 512\">\r\n                  <path d=\"M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z\"></path>\r\n                </svg>\r\n                  touch!\r\n              </button>\r\n            </div>\r\n          </div>\r\n\r\n          <input type=\"text\" name=\"email_address_check\" value=\"\" class=\"input--hidden\">\r\n          <input type=\"hidden\" name=\"locale\" value=\"fr\">\r\n        </form>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<!-- END - We recommend to place the below code where you want the form in your website html  -->\r\n\r\n  </div>\r\n<script>\r\n  window.REQUIRED_CODE_ERROR_MESSAGE = \'Veuillez choisir un code pays\';\r\n  window.LOCALE = \'fr\';\r\n  window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = \"The set informations are not valid. Please try again.\";\r\n\r\n  window.REQUIRED_ERROR_MESSAGE = \"You must fill this form. \";\r\n\r\n  window.GENERIC_INVALID_MESSAGE = \"The set informations are not valid. Please try again.\";\r\n\r\n\r\n\r\n\r\n  window.translation = {\r\n    common: {\r\n      selectedList: \'{quantity} liste sélectionnée\',\r\n      selectedLists: \'{quantity} listes sélectionnées\'\r\n    }\r\n  };\r\n\r\n  var AUTOHIDE = Boolean(0);\r\n</script>\r\n<script src=\"https://sibforms.com/forms/end-form/build/main.js\"></script>',_binary '\r\n																								\r\n																								\r\n												\r\n												\r\n												<div><div>So here we are, not giving up and knowing we are not alone in our work to recover urgency, integrity and meaning: true art engages with society, as critical as it is poetic.</div></div>\r\n																								'),(8,1,'2021-12-17 15:52:14','2022-01-04 18:03:36',7,'Address',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'address',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								\r\n												\r\n												\r\n																								<br>',_binary '\r\n																								\r\n																								<div><a href=\"https://maps.apple.com/?address=26%20Rue%20Mazagran,%2013001%20Marseille,%20France&amp;ll=43.297339,5.383376&amp;q=26%20Rue%20Mazagran&amp;_ext=EiYpvP+PBHylRUAxecPJ10GCFUA5OtW1YKKmRUBBo+Kib+WOFUBQBA%3D%3D\">OCT0<br>26 Rue Mazagran<br>13001 Marseille</a></div>',_binary '<br>'),(9,1,'2022-01-04 02:46:52','2022-01-04 03:05:52',NULL,'product 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'product-1',NULL,NULL,NULL,NULL,NULL,_binary '\r\n												\r\n												\r\n												',_binary '\r\n												description',_binary '<div id=\"smart-button-container\">\r\n      <div style=\"text-align: center;\">\r\n        <div id=\"paypal-button-container\"></div>\r\n      </div>\r\n    </div>\r\n  <script src=\"https://www.paypal.com/sdk/js?client-id=sb&amp;enable-funding=venmo&amp;currency=USD\" data-sdk-integration-source=\"button-factory\"></script>\r\n  <script>\r\n    function initPayPalButton() {\r\n      paypal.Buttons({\r\n        style: {\r\n          shape: \'rect\',\r\n          color: \'gold\',\r\n          layout: \'vertical\',\r\n          label: \'paypal\',\r\n          \r\n        },\r\n\r\n        createOrder: function(data, actions) {\r\n          return actions.order.create({\r\n            purchase_units: [{\"description\":\"oct0 product 1\",\"amount\":{\"currency_code\":\"USD\",\"value\":5}}]\r\n          });\r\n        },\r\n\r\n        onApprove: function(data, actions) {\r\n          return actions.order.capture().then(function(orderData) {\r\n            \r\n            // Full available details\r\n            console.log(\'Capture result\', orderData, JSON.stringify(orderData, null, 2));\r\n\r\n            // Show a success message within this page, e.g.\r\n            const element = document.getElementById(\'paypal-button-container\');\r\n            element.innerHTML = \'\';\r\n            element.innerHTML = \'<h3>Thank you for your payment!</h3>\';\r\n\r\n            // Or go to another URL:  actions.redirect(\'thank_you.html\');\r\n            \r\n          });\r\n        },\r\n\r\n        onError: function(err) {\r\n          console.log(err);\r\n        }\r\n      }).render(\'#paypal-button-container\');\r\n    }\r\n    initPayPalButton();\r\n  </script>');
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wires`
--

DROP TABLE IF EXISTS `wires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(10) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `fromid` int(10) unsigned DEFAULT NULL,
  `toid` int(10) unsigned DEFAULT NULL,
  `weight` float NOT NULL DEFAULT '1',
  `notes` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wires`
--

LOCK TABLES `wires` WRITE;
/*!40000 ALTER TABLE `wires` DISABLE KEYS */;
INSERT INTO `wires` VALUES (1,1,'2021-12-17 15:51:08','2021-12-17 15:51:08',0,1,1,NULL),(2,1,'2021-12-17 15:51:15','2021-12-17 15:51:15',0,2,1,NULL),(3,1,'2021-12-17 15:51:41','2021-12-17 15:51:41',0,3,1,NULL),(4,1,'2021-12-17 15:51:55','2021-12-17 15:51:55',0,4,1,NULL),(5,1,'2021-12-17 15:52:01','2021-12-17 15:52:01',0,5,1,NULL),(6,1,'2021-12-17 15:52:05','2021-12-17 15:52:05',0,6,1,NULL),(7,1,'2021-12-17 15:52:10','2021-12-17 15:52:10',0,7,1,NULL),(8,1,'2021-12-17 15:52:14','2021-12-17 15:52:14',0,8,1,NULL),(9,1,'2022-01-04 02:46:52','2022-01-04 02:46:52',6,9,1,NULL);
/*!40000 ALTER TABLE `wires` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-04 18:23:23
