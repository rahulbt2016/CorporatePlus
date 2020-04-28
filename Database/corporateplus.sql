-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 06:25 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corporateplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(10) NOT NULL,
  `designation_name` varchar(50) NOT NULL,
  `form_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `designation_name`, `form_id`) VALUES
(1119, 'Sales Engineer', 23),
(1120, 'Sales Engineer', 24),
(1121, 'Sales Engineer', 25),
(1122, 'Sales Engineer', 26),
(1123, 'Sales Engineer', 27),
(1124, 'Sales Engineer', 51),
(1125, 'Sales Engineer', 52),
(1126, 'Sales Engineer', 53),
(1127, 'Sales Engineer', 54),
(1128, 'Sales Engineer', 55),
(1913, 'Admin', 1),
(1914, 'Admin', 2),
(1915, 'Admin', 3),
(1916, 'Admin', 4),
(1917, 'Admin', 5),
(1918, 'Admin', 6),
(1919, 'Admin', 7),
(1920, 'Admin', 8),
(1921, 'Admin', 9),
(1922, 'Admin', 10),
(1923, 'Admin', 11),
(1924, 'Admin', 12),
(1925, 'Admin', 13),
(1926, 'Admin', 14),
(1927, 'Admin', 15),
(1928, 'Admin', 17),
(1929, 'Admin', 18),
(1930, 'Admin', 19),
(1931, 'Admin', 20),
(1932, 'Admin', 21),
(1933, 'Admin', 22),
(1934, 'Admin', 23),
(1935, 'Admin', 24),
(1936, 'Admin', 25),
(1937, 'Admin', 26),
(1938, 'Admin', 27),
(1939, 'Admin', 28),
(1940, 'Admin', 29),
(1941, 'Admin', 30),
(1942, 'Admin', 31),
(1943, 'Admin', 32),
(1944, 'Admin', 33),
(1945, 'Admin', 34),
(1946, 'Admin', 35),
(1947, 'Admin', 36),
(1948, 'Admin', 37),
(1949, 'Admin', 38),
(1950, 'Admin', 39),
(1951, 'Finance Manager', 37),
(1952, 'Finance Manager', 38),
(1953, 'Finance Manager', 39),
(1954, 'HR', 1),
(1955, 'HR', 2),
(1956, 'HR', 3),
(1957, 'HR', 4),
(1958, 'HR', 5),
(1959, 'HR', 35),
(1960, 'HR', 36),
(1961, 'HR', 37),
(1993, 'Inventory Manager', 6),
(1994, 'Inventory Manager', 7),
(1995, 'Inventory Manager', 8),
(1996, 'Inventory Manager', 9),
(1997, 'Inventory Manager', 10),
(1998, 'Inventory Manager', 11),
(1999, 'Inventory Manager', 12),
(2000, 'Inventory Manager', 13),
(2001, 'Inventory Manager', 14),
(2002, 'Inventory Manager', 15),
(2003, 'Inventory Manager', 17),
(2004, 'Inventory Manager', 18),
(2005, 'Inventory Manager', 19),
(2006, 'Inventory Manager', 37),
(2007, 'Inventory Manager', 38),
(2008, 'Manufacturing Engineer', 23),
(2009, 'Manufacturing Engineer', 24),
(2010, 'Manufacturing Engineer', 25),
(2011, 'Manufacturing Engineer', 37),
(2012, 'Manufacturing Engineer', 38),
(2020, 'Service Engineer', 33),
(2021, 'Service Engineer', 34),
(2022, 'Service Engineer', 37),
(2023, 'Sales Manager', 26),
(2024, 'Sales Manager', 27),
(2025, 'Sales Manager', 28),
(2026, 'Sales Manager', 29),
(2027, 'Sales Manager', 30),
(2028, 'Sales Manager', 32),
(2029, 'Sales Manager', 37);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_name` varchar(50) NOT NULL,
  `approx_salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_name`, `approx_salary`) VALUES
('Admin', 100000),
('Finance Manager', 90000),
('HR', 95000),
('Inventory Manager', 70000),
('Manufacturing Engineer', 80000),
('Sales Manager', 75000),
('Service Engineer', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(10) NOT NULL,
  `form_name` varchar(50) NOT NULL,
  `form_file` varchar(50) NOT NULL,
  `show_in_nav` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `form_name`, `form_file`, `show_in_nav`) VALUES
(1, 'Designation', 'designation.php', 1),
(2, 'Edit Designation', 'editDesignation.php', 0),
(3, 'Users', 'users.php', 1),
(4, 'Add User', 'addUser.php', 0),
(5, 'Edit User', 'editUser.php', 0),
(6, 'Vendors', 'vendors.php', 1),
(7, 'Add Vendor', 'addVendor.php', 0),
(8, 'Edit Vendor', 'editVendor.php', 0),
(9, 'Raw Materials', 'rawMaterials.php', 1),
(10, 'Ordered Raw Materials', 'orderedRawMaterials.php', 1),
(11, 'Add New Raw Material Order', 'addRawMaterialOrder.php', 0),
(12, 'Add New Return Raw Material', 'addReturnRawMaterial.php', 0),
(13, 'Returned Raw Materials', 'returnedRawMaterials.php', 1),
(14, 'Product Categories', 'productCategories.php', 1),
(15, 'Edit Product Category', 'editProductCategory.php', 0),
(17, 'Products', 'products.php', 1),
(18, 'Add New Product', 'addProduct.php', 0),
(19, 'Edit Product', 'editProduct.php', 0),
(20, 'Industrial Applications', 'industrialApplications.php', 1),
(21, 'Add Industrial Application', 'addIndustrialApplication.php', 0),
(22, 'Edit Industrial Application', 'editIndustrialApplication.php', 0),
(23, 'Manufactured Products', 'manufacturedProducts.php', 1),
(24, 'Add New Manufactured Product', 'addManufacturedProduct.php', 0),
(25, 'Generate Barcode', 'generateBarcode.php', 1),
(26, 'Sales', 'sales.php', 1),
(27, 'Add New Sale', 'addSale.php', 0),
(28, 'On-Site Inquiries', 'displayInquiries.php', 1),
(29, 'Add New Inquiry', 'addInquiry.php', 0),
(30, 'Inquiry Follow-up', 'inquiryFollowUp.php', 0),
(31, 'Web Inquiries', 'webInquiries.php', 1),
(32, 'Assinged Web Inquiries', 'assignedWebInquiries.php', 1),
(33, 'Serviced Products', 'servicedProducts.php', 1),
(34, 'Add New Service', 'addService.php', 0),
(35, 'Show Applicants', 'availableApplicants.php', 1),
(36, 'Add Applicant', 'addApplicant.php', 1),
(37, 'Make Request', 'makeRequest.php', 1),
(38, 'Manage Requests', 'manageRequests.php', 1),
(39, 'Manage Fund Requests', 'fundRequestManager.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `industrial_applications`
--

CREATE TABLE `industrial_applications` (
  `industrial_application_id` int(10) NOT NULL,
  `industry_name` varchar(50) NOT NULL,
  `industry_image` varchar(50) NOT NULL,
  `industry_description` varchar(500) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrial_applications`
--

INSERT INTO `industrial_applications` (`industrial_application_id`, `industry_name`, `industry_image`, `industry_description`, `active`) VALUES
(1, 'Cement Industry', 'cement.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Cement companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Cement industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(2, 'Paper Industry', 'paper.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Paper companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Paper industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(3, 'Steel Industry', 'steel.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Steel companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Steel industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(4, 'Power Industry', 'power.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Power companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Power industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(5, 'Chemical Industry', 'chemical.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Chemical companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Chemical industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(6, 'Crane Industry', 'crane.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Crane companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Crane industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(7, 'Rubber Industry', 'rubber.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Rubber companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Rubber industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(9, 'Plastic Industry', 'plastic.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Plastic companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Plastic industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(10, 'Sugarcane Industry', 'sugarcane.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Sugarcane companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Sugarcane industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1),
(11, 'Construction Industry', 'construction.jpg', 'Our Company epitomizes cutting edges technology and path breaking innovation that have given us the chance to be the best choice for Construction companies. Backed by a proven track record and driven by unwavering excellence, Our company  is all set to meet the changing requirements of the Construction industry and churn out technologically superior product from time to time. Join hands with our company and ensure a strong future of your business.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(10) NOT NULL,
  `notification_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `notification_for` int(10) NOT NULL,
  `notification_from` int(10) NOT NULL,
  `notification_read` int(10) NOT NULL,
  `notification_message` varchar(100) NOT NULL,
  `descriptive_message` varchar(1000) NOT NULL,
  `message_color` varchar(50) NOT NULL,
  `link_page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_time`, `notification_for`, `notification_from`, `notification_read`, `notification_message`, `descriptive_message`, `message_color`, `link_page`) VALUES
(79, '2020-03-04 22:00:05', 1, 3, 1, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(80, '2020-03-04 22:01:01', 3, 1, 1, 'Fund Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your fund request of â‚¹500.', 'green', 'requestFund.php'),
(81, '2020-03-05 10:44:17', 1, 3, 1, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(82, '2020-03-05 10:44:37', 3, 1, 1, 'Fund Request Rejected', 'Unfortunately, Admin, Rahul Tiwari has rejected your fund request of â‚¹500.', 'red', 'requestFund.php'),
(83, '2020-03-05 18:30:58', 1, 3, 1, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(84, '2020-03-07 05:13:05', 1, 3, 1, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(85, '2020-03-07 05:13:57', 3, 1, 1, 'Fund Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your fund request of â‚¹500.', 'green', 'requestFund.php'),
(86, '2020-03-20 04:53:30', 3, 1, 1, 'Fund Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your fund request of â‚¹500.', 'green', 'requestFund.php'),
(87, '2020-03-20 05:02:19', 1, 3, 1, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(88, '2020-03-20 05:02:19', 2, 3, 0, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(89, '2020-03-20 05:02:20', 4, 3, 1, 'New Fund Request', 'Harsh Patel made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(90, '2020-03-20 05:02:36', 3, 4, 1, 'Fund Request Rejected', 'Unfortunately, Finance Manager, Vraj Patel has rejected your fund request of â‚¹500.', 'red', 'requestFund.php'),
(91, '2020-03-20 10:48:24', 2, 1, 0, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹50000.', 'blue', 'statusFund.php'),
(92, '2020-03-20 10:48:24', 4, 1, 1, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹50000.', 'blue', 'statusFund.php'),
(93, '2020-03-20 10:48:24', 1, 1, 1, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹50000.', 'blue', 'statusFund.php'),
(94, '2020-03-20 11:02:06', 1, 4, 1, 'Fund Request Rejected', 'Unfortunately, Finance Manager, Vraj Patel has rejected your fund request of â‚¹50000.', 'red', 'requestFund.php'),
(95, '2020-03-20 11:04:05', 2, 1, 0, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹500000.', 'blue', 'statusFund.php'),
(96, '2020-03-20 11:04:05', 4, 1, 1, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹500000.', 'blue', 'statusFund.php'),
(97, '2020-03-20 11:04:05', 1, 1, 1, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹500000.', 'blue', 'statusFund.php'),
(98, '2020-03-20 11:05:34', 1, 4, 1, 'Fund Request Accepted', 'Congratulations, Finance Manager, Vraj Patel has accepted your fund request of â‚¹500000.', 'green', 'requestFund.php'),
(99, '2020-03-20 11:06:06', 2, 1, 0, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(100, '2020-03-20 11:06:06', 4, 1, 0, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(101, '2020-03-20 11:06:06', 1, 1, 1, 'New Fund Request', 'Rahul Tiwari made a fund request of â‚¹500.', 'blue', 'statusFund.php'),
(102, '2020-03-20 13:26:46', 2, 5, 0, 'New Fund Request', 'Dhaval Vaghela made a fund request of â‚¹5000.', 'blue', 'statusFund.php'),
(103, '2020-03-20 13:26:46', 4, 5, 0, 'New Fund Request', 'Dhaval Vaghela made a fund request of â‚¹5000.', 'blue', 'statusFund.php'),
(104, '2020-03-20 13:26:46', 1, 5, 1, 'New Fund Request', 'Dhaval Vaghela made a fund request of â‚¹5000.', 'blue', 'statusFund.php'),
(105, '2020-03-20 13:27:21', 5, 1, 1, 'Fund Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your fund request of â‚¹5000.', 'green', 'requestFund.php'),
(107, '2020-04-06 16:43:22', 1, 0, 1, 'New Web Inquiry', 'Viraj Chitnis has made a web inquiry for Transferable Conveyors.', 'blue', 'webInquiries.php'),
(108, '2020-04-06 16:48:04', 1, 0, 1, 'New Web Inquiry', 'Haresh Garg has made a web inquiry for Fair Conveyor.', 'blue', 'webInquiries.php'),
(111, '2020-04-06 18:40:55', 1, 1, 1, 'Web Inquiry Allocated', 'Rahul Tiwari(Admin) has allocated you a web inquiry of Jay Panchal for Stacker Excavators(WINQ00001).', 'blue', 'assignedWebInquiries.php'),
(112, '2020-04-06 18:48:04', 1, 0, 1, 'New Web Inquiry', 'Rahim Khan has made a web inquiry for 890 CoalApp Dumper (WINQ00008).', 'blue', 'webInquiries.php'),
(126, '2020-04-09 06:49:52', 1, 0, 1, 'New Web Inquiry', 'Gautam Cara has made a web inquiry for Bevel Helical (SOE Series) (WINQ00009).', 'blue', 'webInquiries.php'),
(127, '2020-04-09 19:00:38', 1, 5, 1, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Basic Plastics.', 'blue', 'manageRequests.php'),
(128, '2020-04-09 19:00:38', 3, 5, 1, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Basic Plastics.', 'blue', 'manageRequests.php'),
(129, '2020-04-09 19:01:14', 1, 5, 1, 'New Fund Request', 'Dhaval Vaghela has made a fund request for â‚¹50000.', 'blue', 'manageRequests.php'),
(130, '2020-04-09 19:01:14', 4, 5, 0, 'New Fund Request', 'Dhaval Vaghela has made a fund request for â‚¹50000.', 'blue', 'manageRequests.php'),
(131, '2020-04-09 23:11:11', 6, 1, 1, 'Web Inquiry Allocated', 'Rahul Tiwari (Admin) has allocated you a web inquiry of Jay Panchal for Stacker Excavators (WINQ00001).', 'blue', 'assignedWebInquiries.php'),
(132, '2020-04-09 23:11:13', 6, 1, 1, 'Web Inquiry Allocated', 'Rahul Tiwari (Admin) has allocated you a web inquiry of Jay Panchal for Stacker Excavators (WINQ00001).', 'blue', 'assignedWebInquiries.php'),
(133, '2020-04-10 09:19:56', 5, 1, 1, 'Fund Request Rejected', 'Unfortunately, Admin, Rahul Tiwari has rejected your fund request of â‚¹50000.', 'red', 'makeRequest.php'),
(134, '2020-04-10 09:20:28', 5, 1, 1, 'Raw Material Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your raw material request of Basic Plastics.', 'green', 'makeRequest.php'),
(135, '2020-04-10 10:09:06', 1, 5, 1, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Chains.', 'blue', 'manageRequests.php'),
(136, '2020-04-10 10:09:06', 3, 5, 0, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Chains.', 'blue', 'manageRequests.php'),
(137, '2020-04-10 10:09:19', 1, 5, 1, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Chains.', 'blue', 'manageRequests.php'),
(138, '2020-04-10 10:09:19', 3, 5, 0, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Chains.', 'blue', 'manageRequests.php'),
(139, '2020-04-10 10:09:30', 1, 5, 1, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Locks.', 'blue', 'manageRequests.php'),
(140, '2020-04-10 10:09:30', 3, 5, 0, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Locks.', 'blue', 'manageRequests.php'),
(141, '2020-04-10 10:09:41', 1, 5, 1, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Steel.', 'blue', 'manageRequests.php'),
(142, '2020-04-10 10:09:41', 3, 5, 0, 'New Raw Material Request', 'Dhaval Vaghela has made a raw material request for Steel.', 'blue', 'manageRequests.php'),
(143, '2020-04-10 10:10:18', 1, 5, 1, 'New Fund Request', 'Dhaval Vaghela has made a fund request for â‚¹1000.', 'blue', 'manageRequests.php'),
(144, '2020-04-10 10:10:19', 4, 5, 0, 'New Fund Request', 'Dhaval Vaghela has made a fund request for â‚¹1000.', 'blue', 'manageRequests.php'),
(145, '2020-04-10 10:10:43', 1, 5, 1, 'New Fund Request', 'Dhaval Vaghela has made a fund request for â‚¹50000.', 'blue', 'manageRequests.php'),
(146, '2020-04-10 10:10:43', 4, 5, 0, 'New Fund Request', 'Dhaval Vaghela has made a fund request for â‚¹50000.', 'blue', 'manageRequests.php'),
(147, '2020-04-10 10:13:31', 1, 6, 1, 'New Product Request', 'Justin Bieber has made a product request for 70E Croker Loader.', 'blue', 'manageRequests.php'),
(148, '2020-04-10 10:13:31', 5, 6, 0, 'New Product Request', 'Justin Bieber has made a product request for 70E Croker Loader.', 'blue', 'manageRequests.php'),
(149, '2020-04-10 10:13:42', 1, 6, 1, 'New Product Request', 'Justin Bieber has made a product request for Belt Weights.', 'blue', 'manageRequests.php'),
(150, '2020-04-10 10:13:42', 5, 6, 0, 'New Product Request', 'Justin Bieber has made a product request for Belt Weights.', 'blue', 'manageRequests.php'),
(151, '2020-04-10 10:13:52', 1, 6, 1, 'New Product Request', 'Justin Bieber has made a product request for Belt Weights.', 'blue', 'manageRequests.php'),
(152, '2020-04-10 10:13:52', 5, 6, 0, 'New Product Request', 'Justin Bieber has made a product request for Belt Weights.', 'blue', 'manageRequests.php'),
(153, '2020-04-10 10:14:06', 1, 6, 1, 'New Product Request', 'Justin Bieber has made a product request for Bridge Mixing.', 'blue', 'manageRequests.php'),
(154, '2020-04-10 10:14:06', 5, 6, 0, 'New Product Request', 'Justin Bieber has made a product request for Bridge Mixing.', 'blue', 'manageRequests.php'),
(155, '2020-04-10 10:14:40', 6, 1, 0, 'Product Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your product request of Bridge Mixing.', 'green', 'makeRequest.php'),
(156, '2020-04-10 10:14:45', 6, 1, 0, 'Product Request Rejected', 'Unfortunately, Admin, Rahul Tiwari has rejected your product request of Belt Weights.', 'red', 'makeRequest.php'),
(157, '2020-04-10 10:14:53', 5, 1, 0, 'Raw Material Request Rejected', 'Unfortunately, Admin, Rahul Tiwari has rejected your raw material request of Steel.', 'red', 'makeRequest.php'),
(158, '2020-04-10 10:14:58', 5, 1, 0, 'Raw Material Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your raw material request of Chains.', 'green', 'makeRequest.php'),
(159, '2020-04-10 10:55:33', 5, 1, 0, 'Fund Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your fund request of â‚¹50000.', 'green', 'makeRequest.php'),
(160, '2020-04-10 10:56:52', 1, 1, 1, 'New Product Request', 'Rahul Tiwari has made a product request for 70E Croker Loader.', 'blue', 'manageRequests.php'),
(161, '2020-04-10 10:56:52', 5, 1, 0, 'New Product Request', 'Rahul Tiwari has made a product request for 70E Croker Loader.', 'blue', 'manageRequests.php'),
(162, '2020-04-10 10:57:02', 1, 1, 1, 'New Raw Material Request', 'Rahul Tiwari has made a raw material request for Basic Plastics.', 'blue', 'manageRequests.php'),
(163, '2020-04-10 10:57:02', 3, 1, 0, 'New Raw Material Request', 'Rahul Tiwari has made a raw material request for Basic Plastics.', 'blue', 'manageRequests.php'),
(164, '2020-04-10 10:57:47', 1, 1, 1, 'New Fund Request', 'Rahul Tiwari has made a fund request for â‚¹1000.', 'blue', 'manageRequests.php'),
(165, '2020-04-10 10:57:47', 4, 1, 0, 'New Fund Request', 'Rahul Tiwari has made a fund request for â‚¹1000.', 'blue', 'manageRequests.php');

-- --------------------------------------------------------

--
-- Table structure for table `onsite_inquiry`
--

CREATE TABLE `onsite_inquiry` (
  `inquiry_id` int(20) NOT NULL,
  `inquiry_reg_num` varchar(50) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `inquiry_date` date NOT NULL,
  `inquiry_taker` int(10) NOT NULL,
  `follow_up_needed` varchar(10) NOT NULL,
  `follow_up_reason` varchar(100) NOT NULL,
  `follow_up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onsite_inquiry`
--

INSERT INTO `onsite_inquiry` (`inquiry_id`, `inquiry_reg_num`, `customer_name`, `customer_email`, `customer_phone`, `product_name`, `comment`, `inquiry_date`, `inquiry_taker`, `follow_up_needed`, `follow_up_reason`, `follow_up_date`) VALUES
(27, 'INQ00001', 'Jay Bacchan', 'jaybacchan98@gmail.com', '9888587895', '30D Croker Loader,901 Loading Dumper', 'Products well explained with cost estimation.', '2020-04-04', 1, '1', 'Want to bring a relative for inquiry.', '2020-04-25'),
(28, 'INQ00002', 'Dhaval Aryan', 'dhavalaryan90@gmail.com', '9898985585', '30D Croker Loader,901 Loading Dumping Low Height', 'Went well', '2020-04-04', 1, '0', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `onsite_inquiry_follow_up`
--

CREATE TABLE `onsite_inquiry_follow_up` (
  `follow_up_id` int(20) NOT NULL,
  `inquiry_id` int(20) NOT NULL,
  `fup_date` date NOT NULL,
  `product` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `follow_up_needed` varchar(20) NOT NULL,
  `follow_up_reason` varchar(100) NOT NULL,
  `follow_up_date` date NOT NULL,
  `follow_up_taker` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onsite_inquiry_follow_up`
--

INSERT INTO `onsite_inquiry_follow_up` (`follow_up_id`, `inquiry_id`, `fup_date`, `product`, `comments`, `follow_up_needed`, `follow_up_reason`, `follow_up_date`, `follow_up_taker`) VALUES
(25, 28, '2020-04-04', '30D Croker Loader, 901 Loading Dumping Low Height.', 'Almost Convinced to purchase.', '0', '', '0000-00-00', 1),
(26, 28, '2020-04-15', '30D Croker Loader, 901 Loading Dumping Low Height.', 'Promised to buy next week.', '0', '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category_id` int(10) NOT NULL,
  `product_pic` varchar(50) NOT NULL,
  `mini_description` varchar(2000) NOT NULL,
  `description_pdf` varchar(50) NOT NULL,
  `available_quantity` int(10) NOT NULL,
  `unit_cost` int(10) NOT NULL,
  `added_by` int(10) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_category_id`, `product_pic`, `mini_description`, `description_pdf`, `available_quantity`, `unit_cost`, `added_by`, `active`) VALUES
(30, 'PRD00001', 'Extensive Gearbox', 1, '15838809131364343578.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Extensive Gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583881064748514993.pdf', 0, 60000, 1, 1),
(31, 'PRD00002', 'Bevel Gearbox', 1, '15838646851250444908.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Bevel Gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583864685470081395.pdf', 0, 50000, 1, 1),
(32, 'PRD00003', 'Triple Operative Gearbox', 1, '15839258941771810796.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Triple Operative Gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839258941441216227.pdf', 0, 80000, 1, 1),
(33, 'PRD00004', 'Helical (NOE Series)', 1, '15839261481769962722.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Helical (NOE Series) - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926148481955196.pdf', 0, 90000, 1, 1),
(34, 'PRD00005', 'Bevel Helical (SOE Series)', 1, '158392624923627915.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Bevel Helical (SOE Series) - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839262492003290209.pdf', 0, 95000, 1, 1),
(35, 'PRD00006', 'Cooling Gearbox', 1, '1583926280501093731.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Cooling Gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839262802116132797.pdf', 0, 75000, 1, 1),
(36, 'PRD00007', 'Wheel driver', 1, '1583926361225338498.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Wheel driver - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926361249908494.pdf', 0, 70000, 1, 1),
(37, 'PRD00008', 'Vernier drive', 1, '1583926398965915689.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Vernier drive - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839263981833660556.pdf', 0, 60000, 1, 1),
(38, 'PRD00009', 'Dial press drive', 1, '15839264361168094036.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Dial press drive - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926436202479793.pdf', 0, 40000, 1, 1),
(39, 'PRD00010', 'V gearbox medium sizes', 1, '158392655273094524.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the V gearbox medium sizes - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839265521648673764.pdf', 0, 80000, 1, 1),
(40, 'PRD00011', 'Main hoist gearbox', 1, '1583926586546635274.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Main hoist gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839265861439074490.pdf', 0, 40000, 1, 1),
(41, 'PRD00012', 'Seal Gear series', 1, '15839266142102454619.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Seal Gear series - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926614802436502.pdf', 0, 60000, 1, 1),
(42, 'PRD00013', 'Shank RE series', 1, '15839266541026262389.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Shank RE series - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926654553825953.pdf', 0, 30000, 1, 1),
(43, 'PRD00014', 'Single deduction gear', 1, '1583926709892411782.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Single deduction gear - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926709819135862.pdf', 0, 50000, 1, 1),
(44, 'PRD00015', 'Large duty stirrer', 1, '1583926778404847395.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Large duty stirrer - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839267781973419995.pdf', 0, 40000, 1, 1),
(45, 'PRD00016', 'Huge pair ball', 1, '1583926811886788982.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Huge pair ball - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839268111494781095.pdf', 0, 64994, 1, 1),
(46, 'PRD00017', 'Feeler Mixing', 1, '1583926859558359911.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Feeler Mixing - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926859475524288.pdf', 0, 55000, 1, 1),
(47, 'PRD00018', 'Flex Mixing', 1, '1583926891478450515.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Flex Mixing - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583926891237761400.pdf', 0, 45000, 1, 1),
(48, 'PRD00019', 'Bridge Mixing', 1, '15839269182127103244.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Bridge Mixing - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839269181507133281.pdf', 0, 35000, 1, 1),
(49, 'PRD00020', 'Friction Mixing', 1, '15839269461181971858.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Friction Mixing - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839269461059571599.pdf', 0, 25000, 1, 1),
(50, 'PRD00021', 'Rusp gear wheel', 1, '15839269731797742518.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Rusp gear wheel - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839269731930741440.pdf', 0, 67000, 1, 1),
(51, 'PRD00022', 'Triple gear wheel', 1, '15839270162093315631.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Triple gear wheel - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839270161929641769.pdf', 0, 23000, 1, 1),
(52, 'PRD00023', 'Lead Crankshaft', 1, '15839270551653669367.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Lead Crankshaft - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927055776363858.pdf', 0, 56000, 1, 1),
(53, 'PRD00024', 'Hydro pair', 1, '1583927115502542226.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Hydro pair - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '0', 0, 34000, 1, 1),
(54, 'PRD00025', 'External gear', 1, '1583927160727751260.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the External gear - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839271601697840590.pdf', 0, 70000, 1, 1),
(55, 'PRD00026', 'Gocac gearbox', 1, '1583927228571127403.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Gocac gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839272281978671073.pdf', 0, 30000, 1, 1),
(56, 'PRD00027', 'Gogoc gearbox', 1, '15839272561668562583.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Gogoc gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839272561255898129.pdf', 0, 56000, 1, 1),
(57, 'PRD00028', 'Fluid reduction gearbox', 1, '1583927302639950683.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Fluid reduction gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927302102004500.pdf', 0, 43000, 1, 1),
(58, 'PRD00029', 'Plain reduction gearbox', 1, '15839273311183616672.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Plain reduction gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927331164034055.pdf', 0, 54000, 1, 1),
(59, 'PRD00030', 'Bolt Elevation', 1, '15839273611332707483.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Bolt Elevation - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839273611253753324.pdf', 1, 55000, 1, 1),
(60, 'PRD00031', 'Pail Operator', 1, '15839273981376323960.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Pail Operator - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839273981155434750.pdf', 0, 51000, 1, 1),
(61, 'PRD00032', 'Inversible stand', 1, '1583927435621254882.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Inversible stand - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839274351859999170.pdf', 0, 23900, 1, 1),
(62, 'PRD00033', 'Roll box', 1, '15839274661481169623.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Roll box - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '0', 0, 56000, 1, 1),
(63, 'PRD00034', 'Halo gearbox', 1, '1583927525534279307.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Halo gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839275251742179473.pdf', 0, 33000, 1, 1),
(64, 'PRD00035', 'Bumper gearbox', 1, '1583927600820201410.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Bumper gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839276001782567641.pdf', 0, 34000, 1, 1),
(65, 'PRD00036', 'Seeder gearbox', 1, '15839276551128132411.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Seeder gearbox - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927655920625114.pdf', 0, 90000, 1, 1),
(66, 'PRD00037', 'Stacker Excavators', 2, '1583927695125126554.jpg', 'Stacker Excavators is for stacking and wheel on boom reclaimer for handling bulk.For continuous stacking an reclaiming of crushed bulk materials, economics solutions can only be achieved by the use of combined bucket wheel stacker reclaimer. Bucket wheel stacker reclaimer machine can stack the material to form the stockpile or reclaim the stockpiled material and feed onto the main line conveyor.', '1583927695152887967.pdf', 0, 65000, 1, 1),
(67, 'PRD00038', 'Transferable Conveyors', 2, '15839277331066007302.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Transferable Conveyors - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927733304341748.pdf', 0, 200000, 1, 1),
(68, 'PRD00039', 'Ronon Feeder', 2, '15839277881745365002.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Ronon Feeder - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927788530928254.pdf', 0, 100000, 1, 1),
(69, 'PRD00040', 'Shift Feeder', 1, '1586383671316413826.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Shift Feeder - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Energy Transmission product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the transmission of power. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927835237339651.pdf', 1, 80000, 1, 1),
(70, 'PRD00041', 'Vag tripples', 2, '1583927885771272874.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Vag Triples - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927885627954653.pdf', 0, 150000, 1, 1),
(71, 'PRD00042', 'Belt Weights', 2, '15839279281087396077.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Belt Weights - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583927928285459227.pdf', 0, 70000, 1, 1),
(72, 'PRD00043', 'Fast Conveyor', 2, '1583927965971870271.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Fast Conveyor - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Our company has supplied High Speed Belt Conveyors with belt speed ranging from 4 M/sec to 8.5 M/sec to various customers and Industries.', '1583927965736831844.pdf', 0, 66997, 1, 1),
(73, 'PRD00044', 'Fair Conveyor', 2, '1583928009278822901.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Fair Conveyor - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Our company has supplied Fair Belt Conveyors with belt speed ranging from 2 M/sec to 5.5 M/sec to various customers and Industries.', '15839280091664476674.pdf', 0, 77000, 1, 1),
(74, 'PRD00045', 'Long span Conveyor', 2, '15839280491191477898.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Transferable Conveyors - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Our company has supplied Long span Conveyors with belt speed ranging from 3 M/sec to 6.5 M/sec to various customers and Industries.', '15839280491734012461.pdf', 0, 250000, 1, 1),
(75, 'PRD00046', 'Roll Crusher', 2, '15839281011430360624.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Roll Crusher - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839281011335992196.pdf', 0, 120000, 1, 1),
(76, 'PRD00047', 'Extractor', 2, '1583928137329456170.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Extractor - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839281371150967276.pdf', 2, 70000, 1, 1),
(77, 'PRD00048', 'Pulleys', 2, '15839281661738216055.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Pulleys - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '15839281662060874812.pdf', 0, 90000, 1, 1),
(78, 'PRD00049', 'Bridge type reclaimer', 2, '15839281941712969354.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Bridge type reclaimer - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583928194573520219.pdf', 0, 150000, 1, 1),
(79, 'PRD00050', 'Ship Loader', 2, '15839282231151177959.jpg', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Ship Loader - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the Machinery Operating Equipments product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the operation for various equipments. Also, it provides Heavy duty power shift transmission, high strength and impact resistant structure.', '1583928223910477770.pdf', 0, 300000, 1, 1),
(80, 'PRD00051', '901 Loading Dumper', 3, '1583928263932440473.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 901 Loading Dumper - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '1583928263234447616.pdf', 0, 300000, 1, 1),
(81, 'PRD00052', '901 Loading Dumping Low Height', 3, '15839282921149884298.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 901 Loading Dumper Low Height- answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '15839282922068396399.pdf', 0, 250000, 1, 1),
(82, 'PRD00053', '789Q LoadHaul Dumper', 3, '15839283172110551521.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 789Q LoadHaul Dumper - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '1583928317136951710.pdf', 0, 150000, 1, 1),
(83, 'PRD00054', '890 CoalApp Dumper', 3, '15839283451175062462.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 890 CoalApp Dumper - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '15839283451643708007.pdf', 0, 200000, 1, 1),
(84, 'PRD00055', '900 Side Dumper', 3, '15839283811217951036.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 900 Side Dumper - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '1583928381931277629.pdf', 0, 250000, 1, 1),
(85, 'PRD00056', '920 Side Dumper', 3, '1583928415549675886.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 920 Side Dumper - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '1583928415945810438.pdf', 0, 200000, 1, 1),
(86, 'PRD00057', 'Drill Machine', 3, '158392844162955514.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the Drill Machine - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the coal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of coal mining. High tractive efforts for working in steep gradient and single pass loading. Heavy duty power shift transmission. High strength and impact resistant structure.', '1583928441961802862.pdf', 0, 250000, 1, 1),
(87, 'PRD00058', 'Dump Truck', 4, '1583928479708697234.png', 'Dump Truck are proven workhorses in the toughest underground mining applications. Featuring 4 wheel drive with articulated steering, our Trucks offer unsurpassed traction and optimum maneuverability. Maximum productivity with minimum size places each of these trucks in a class of their own.', '15839284791851034263.pdf', 0, 80000, 1, 1),
(88, 'PRD00059', '30D Croker Loader', 4, '15839285041523298243.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 30D Croker Loader - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the metal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of metal mining High tilt, combination and mechanical breakout force for efficient and single pass loading. Fingertip controls for reduced fatigue, higher productivity and safety of operator.', '1583928504233259756.pdf', 3, 350000, 1, 1),
(89, 'PRD00060', '70E Croker Loader', 4, '1583928538599211773.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 70E Croker Loader - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the metal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of metal mining High tilt, combination and mechanical breakout force for efficient and single pass loading. Fingertip controls for reduced fatigue, higher productivity and safety of operator.', '15839285381635714057.pdf', 1, 140000, 1, 1),
(90, 'PRD00061', '190 Holder Loader', 4, '15839285671889928049.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the 190 Holder Loader - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the metal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of metal mining High tilt, combination and mechanical breakout force for efficient and single pass loading. Fingertip controls for reduced fatigue, higher productivity and safety of operator.', '15839285671984856343.pdf', 10, 300000, 1, 1),
(91, 'PRD00062', 'FP 23 Segmented Loader', 4, '1583928593999449792.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the FP 23 segmented loader - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the metal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of metal mining. High tilt, combination and mechanical breakout force for efficient and single pass loading. Fingertip controls for reduced fatigue, higher productivity and safety of operator.', '1583928593853268737.pdf', 0, 450000, 1, 1),
(92, 'PRD00063', 'FP 90 Segmented Loader', 4, '15839286292133567916.png', 'Keeping in line with its strategy of â€œEnhancing the Futureâ€ Our Company presents the FP 90 segmented loader - answer to industry needs. This product has been developed keeping in mind the industry requirements. It falls under the metal mining applications product category, as the categoryâ€™s name suggest this product has itâ€™s applications in the domain of metal mining. High tilt, combination and mechanical breakout force for efficient and single pass loading. Fingertip controls for reduced fatigue, higher productivity and safety of operator.', '15839286291118172412.pdf', 0, 350000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_manufactured`
--

CREATE TABLE `products_manufactured` (
  `product_manufacture_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `batch_number` varchar(20) NOT NULL,
  `manufacture_date` date NOT NULL,
  `manufactured_by` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_manufactured`
--

INSERT INTO `products_manufactured` (`product_manufacture_id`, `product_id`, `batch_number`, `manufacture_date`, `manufactured_by`, `status`) VALUES
(11, 48, '0000000001', '2020-03-10', 1, 1),
(12, 75, '0000000002', '2020-03-10', 1, 1),
(13, 35, '0000000003', '2020-03-17', 1, 1),
(14, 90, '0000000004', '2020-03-18', 1, 1),
(15, 90, '0000000005', '2020-03-18', 1, 1),
(16, 59, '0000000006', '2020-03-18', 1, 1),
(17, 90, '0000000007', '2020-03-18', 1, 1),
(18, 89, '0000000008', '2020-03-18', 1, 1),
(19, 76, '0000000009', '2020-03-18', 1, 1),
(20, 76, '0000000010', '2020-03-18', 1, 1),
(21, 59, '0000000011', '2020-03-18', 1, 1),
(22, 63, '0000000012', '2020-04-02', 1, 1),
(23, 31, '0000000013', '2020-04-02', 1, 1),
(24, 90, '0000000014', '2019-01-01', 1, 1),
(25, 90, '0000000015', '2019-01-01', 1, 1),
(26, 90, '0000000016', '2019-01-01', 1, 1),
(27, 88, '0000000017', '2019-01-01', 1, 1),
(28, 88, '0000000018', '2019-01-01', 1, 1),
(29, 88, '0000000019', '2019-01-01', 1, 1),
(30, 89, '0000000020', '2019-01-01', 1, 1),
(31, 90, '0000000021', '2020-04-02', 1, 1),
(32, 90, '0000000022', '2020-04-02', 1, 1),
(33, 76, '0000000023', '2020-04-02', 1, 1),
(34, 52, '0000000024', '2020-04-04', 1, 1),
(35, 90, '0000000025', '2020-04-06', 1, 1),
(36, 88, '0000000026', '2020-04-06', 1, 1),
(37, 83, '0000000027', '2020-04-06', 1, 1),
(38, 59, '0000000028', '2020-04-06', 1, 1),
(39, 64, '0000000029', '2020-04-06', 1, 1),
(40, 46, '0000000030', '2020-04-06', 1, 1),
(41, 82, '0000000031', '2020-04-07', 1, 1),
(42, 90, '0000000032', '2020-04-09', 1, 0),
(43, 90, '0000000033', '2020-04-09', 1, 0),
(44, 90, '0000000034', '2020-04-09', 1, 0),
(45, 90, '0000000035', '2020-04-09', 1, 0),
(46, 90, '0000000036', '2020-04-09', 1, 0),
(47, 88, '0000000037', '2020-04-09', 1, 0),
(48, 90, '0000000038', '2020-04-09', 1, 0),
(49, 90, '0000000039', '2020-04-09', 1, 0),
(50, 90, '0000000040', '2020-04-09', 1, 0),
(51, 90, '0000000041', '2020-04-09', 1, 0),
(52, 90, '0000000042', '2020-04-09', 1, 0),
(53, 89, '0000000043', '2020-04-09', 1, 0),
(54, 88, '0000000044', '2020-04-09', 1, 0),
(55, 88, '0000000045', '2020-04-09', 1, 0),
(56, 69, '0000000046', '2020-04-09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_manufactured_raw_mat_quantity`
--

CREATE TABLE `products_manufactured_raw_mat_quantity` (
  `unique_id` int(10) NOT NULL,
  `product_manufacture_id` int(10) NOT NULL,
  `raw_mat_name` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_manufactured_raw_mat_quantity`
--

INSERT INTO `products_manufactured_raw_mat_quantity` (`unique_id`, `product_manufacture_id`, `raw_mat_name`, `quantity`) VALUES
(62, 11, 'Castings', 5),
(63, 11, 'Chains', 10),
(64, 11, 'Steel', 10),
(65, 12, 'Copper', 5),
(66, 12, 'Corners', 10),
(67, 12, 'Stainless Steel', 10),
(68, 12, 'Welding Wires', 15),
(69, 12, 'Wires', 20),
(70, 13, 'Castings', 3),
(71, 13, 'Chains', 5),
(72, 13, 'Copper', 5),
(73, 13, 'Corners', 5),
(74, 14, 'Castings', 5),
(75, 14, 'Chains', 5),
(76, 14, 'Copper', 5),
(77, 14, 'Corners', 5),
(78, 15, 'Castings', 5),
(79, 15, 'Chains', 10),
(80, 15, 'Copper', 5),
(81, 15, 'Corners', 5),
(82, 16, 'Castings', 5),
(83, 16, 'Copper', 5),
(84, 16, 'Steel', 5),
(85, 16, 'Welding Wires', 5),
(86, 17, 'Castings', 5),
(87, 17, 'Chains', 5),
(88, 17, 'Copper', 5),
(89, 17, 'Corners', 5),
(90, 18, 'Chains', 5),
(91, 18, 'Copper', 5),
(92, 18, 'Corners', 5),
(93, 18, 'Engineered Plastics', 5),
(94, 18, 'Fittings', 5),
(95, 19, 'Castings', 5),
(96, 19, 'Chains', 5),
(97, 19, 'Copper', 5),
(98, 19, 'Engineered Plastics', 5),
(99, 19, 'Steel', 5),
(100, 20, 'Castings', 5),
(101, 20, 'Chains', 5),
(102, 20, 'Copper', 5),
(103, 20, 'Engineered Plastics', 5),
(104, 20, 'Steel', 5),
(105, 21, 'Castings', 5),
(106, 21, 'Copper', 5),
(107, 21, 'Steel', 5),
(108, 21, 'Welding Wires', 5),
(109, 22, 'Brass', 3),
(110, 22, 'Castings', 7),
(111, 22, 'Engineered Plastics', 7),
(112, 22, 'Welding Wires', 3),
(113, 23, 'Brass', 1),
(114, 23, 'Castings', 1),
(115, 23, 'Chains', 1),
(116, 23, 'Sectional Metal', 1),
(117, 23, 'Stainless Steel', 1),
(118, 24, 'Castings', 1),
(119, 24, 'Chains', 1),
(120, 24, 'Copper', 1),
(121, 24, 'Corners', 1),
(122, 25, 'Castings', 1),
(123, 25, 'Chains', 1),
(124, 25, 'Copper', 1),
(125, 25, 'Corners', 1),
(126, 26, 'Castings', 1),
(127, 26, 'Chains', 1),
(128, 26, 'Copper', 1),
(129, 26, 'Corners', 1),
(130, 27, 'Castings', 1),
(131, 27, 'Copper', 1),
(132, 27, 'Corners', 1),
(133, 27, 'Engineered Plastics', 1),
(134, 27, 'Fittings', 1),
(135, 27, 'Keys', 1),
(136, 28, 'Castings', 1),
(137, 28, 'Copper', 1),
(138, 28, 'Corners', 1),
(139, 28, 'Engineered Plastics', 1),
(140, 28, 'Fittings', 1),
(141, 28, 'Keys', 1),
(142, 29, 'Castings', 1),
(143, 29, 'Copper', 1),
(144, 29, 'Corners', 1),
(145, 29, 'Engineered Plastics', 1),
(146, 29, 'Fittings', 1),
(147, 29, 'Keys', 1),
(148, 30, 'Chains', 1),
(149, 30, 'Copper', 1),
(150, 30, 'Corners', 1),
(151, 30, 'Engineered Plastics', 1),
(152, 30, 'Fittings', 1),
(153, 31, 'Castings', 1),
(154, 31, 'Chains', 1),
(155, 31, 'Copper', 1),
(156, 31, 'Corners', 1),
(157, 32, 'Castings', 1),
(158, 32, 'Chains', 1),
(159, 32, 'Copper', 1),
(160, 32, 'Corners', 1),
(161, 33, 'Castings', 1),
(162, 33, 'Chains', 1),
(163, 33, 'Copper', 1),
(164, 33, 'Engineered Plastics', 1),
(165, 33, 'Steel', 1),
(166, 34, 'Castings', 1),
(167, 34, 'Chains', 1),
(168, 34, 'Steel', 1),
(169, 35, 'Castings', 1),
(170, 35, 'Chains', 1),
(171, 35, 'Copper', 1),
(172, 35, 'Corners', 1),
(173, 36, 'Castings', 1),
(174, 36, 'Copper', 1),
(175, 36, 'Corners', 1),
(176, 36, 'Engineered Plastics', 1),
(177, 36, 'Fittings', 1),
(178, 36, 'Keys', 1),
(179, 37, 'Castings', 1),
(180, 37, 'Copper', 1),
(181, 37, 'Corners', 1),
(182, 37, 'Engineered Plastics', 1),
(183, 37, 'Fittings', 1),
(184, 38, 'Castings', 1),
(185, 38, 'Copper', 1),
(186, 38, 'Steel', 1),
(187, 38, 'Welding Wires', 1),
(188, 39, 'Castings', 1),
(189, 39, 'Chains', 1),
(190, 39, 'Stainless Steel', 1),
(191, 39, 'Steel', 1),
(192, 40, 'Chains', 1),
(193, 40, 'Copper', 1),
(194, 40, 'Corners', 1),
(195, 40, 'Welding Wires', 1),
(196, 41, 'Brass', 1),
(197, 41, 'Castings', 1),
(198, 41, 'Chains', 1),
(199, 41, 'Copper', 1),
(200, 42, 'Castings', 1),
(201, 42, 'Chains', 1),
(202, 42, 'Copper', 1),
(203, 42, 'Corners', 1),
(204, 43, 'Castings', 1),
(205, 43, 'Chains', 1),
(206, 43, 'Copper', 1),
(207, 43, 'Corners', 1),
(208, 44, 'Castings', 1),
(209, 44, 'Chains', 1),
(210, 44, 'Copper', 1),
(211, 44, 'Corners', 1),
(212, 45, 'Castings', 1),
(213, 45, 'Chains', 1),
(214, 45, 'Copper', 1),
(215, 45, 'Corners', 1),
(216, 46, 'Castings', 1),
(217, 46, 'Chains', 1),
(218, 46, 'Copper', 1),
(219, 46, 'Corners', 1),
(220, 47, 'Castings', 1),
(221, 47, 'Copper', 1),
(222, 47, 'Corners', 1),
(223, 47, 'Engineered Plastics', 1),
(224, 47, 'Fittings', 1),
(225, 47, 'Keys', 1),
(226, 48, 'Castings', 1),
(227, 48, 'Chains', 1),
(228, 48, 'Copper', 1),
(229, 48, 'Corners', 1),
(230, 49, 'Castings', 1),
(231, 49, 'Chains', 1),
(232, 49, 'Copper', 1),
(233, 49, 'Corners', 1),
(234, 50, 'Castings', 1),
(235, 50, 'Chains', 1),
(236, 50, 'Copper', 1),
(237, 50, 'Corners', 1),
(238, 51, 'Castings', 1),
(239, 51, 'Chains', 1),
(240, 51, 'Copper', 1),
(241, 51, 'Corners', 1),
(242, 52, 'Castings', 1),
(243, 52, 'Chains', 1),
(244, 52, 'Copper', 1),
(245, 52, 'Corners', 1),
(246, 53, 'Chains', 1),
(247, 53, 'Copper', 1),
(248, 53, 'Corners', 1),
(249, 53, 'Engineered Plastics', 1),
(250, 53, 'Fittings', 1),
(251, 54, 'Castings', 1),
(252, 54, 'Copper', 1),
(253, 54, 'Corners', 1),
(254, 54, 'Engineered Plastics', 1),
(255, 54, 'Fittings', 1),
(256, 54, 'Keys', 1),
(257, 55, 'Castings', 1),
(258, 55, 'Copper', 1),
(259, 55, 'Corners', 1),
(260, 55, 'Engineered Plastics', 1),
(261, 55, 'Fittings', 1),
(262, 55, 'Keys', 1),
(263, 56, 'Castings', 1),
(264, 56, 'Chains', 1),
(265, 56, 'Copper', 1),
(266, 56, 'Steel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category_name`, `description`, `image`, `active`) VALUES
(1, 'Energy Transmission', 'Our Company\'s Energy Transmission products includes Gearboxes, Wheel driver, Vernier drive, Bolt Elevation, Hydro pair, Lead Crankshaft, Mixings and many others.', '15852570481797356650.jpg', 1),
(2, 'Machinery Operating Equipments', 'Our Company\'s Machinery Operating Equipments range includes Stacker Excavators,Transferable Conveyors, Ronon Feeder, Shift Feeder, Vag tripples, Belt Weights, Fast Conveyor, Fair Conveyor, Long span Conveyor, Roll Crusher,Extractor and many others.', '15852505961361861852.jpg', 1),
(3, 'Coal Mining Applications', 'Our Company\'s Coal Mining Application products range includes 901 Loading Dumper, 901 Loading Dumping Low Height, 789Q LoadHaul Dumper, 890 CoalApp Dumper, 900 Side Dumper, 920 Side Dumper, Drill Machine and many others.', '1585250693200619187.jpg', 1),
(4, 'Metal Mining Applications', 'Our Company\'s Metal Mining Application products range includes Dump Truck, 30D Croker Loader, 70E Croker Loader, 190 Holder Loader, FP 23 Segmented Loader, FP 90 Segmented Loader and many others.', '1585250794933546071.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_industrial_application`
--

CREATE TABLE `product_industrial_application` (
  `product_industrial_application_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `industrial_application_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_industrial_application`
--

INSERT INTO `product_industrial_application` (`product_industrial_application_id`, `product_id`, `industrial_application_id`) VALUES
(144, 78, 1),
(145, 73, 1),
(146, 72, 1),
(147, 74, 1),
(148, 77, 1),
(149, 75, 1),
(150, 68, 1),
(151, 69, 1),
(152, 66, 1),
(153, 67, 1),
(154, 31, 5),
(155, 34, 5),
(156, 48, 5),
(157, 30, 5),
(158, 46, 5),
(159, 47, 5),
(160, 33, 5),
(161, 45, 5),
(162, 53, 5),
(163, 41, 5),
(164, 42, 5),
(165, 51, 5),
(166, 32, 5),
(176, 90, 11),
(177, 88, 11),
(178, 89, 11),
(179, 82, 11),
(180, 83, 11),
(181, 84, 11),
(182, 80, 11),
(183, 81, 11),
(184, 85, 11),
(185, 73, 11),
(186, 72, 11),
(187, 74, 11),
(188, 66, 11),
(189, 67, 11),
(190, 70, 11),
(191, 34, 6),
(192, 30, 6),
(193, 54, 6),
(194, 33, 6),
(195, 52, 6),
(196, 40, 6),
(197, 51, 6),
(198, 31, 2),
(199, 34, 2),
(200, 48, 2),
(201, 46, 2),
(202, 47, 2),
(203, 33, 2),
(204, 53, 2),
(205, 41, 2),
(206, 43, 2),
(207, 39, 2),
(208, 31, 9),
(209, 34, 9),
(210, 64, 9),
(211, 30, 9),
(212, 54, 9),
(213, 46, 9),
(214, 47, 9),
(215, 55, 9),
(216, 33, 9),
(217, 41, 9),
(218, 43, 9),
(219, 51, 9),
(220, 39, 9),
(221, 31, 4),
(222, 34, 4),
(223, 48, 4),
(224, 64, 4),
(225, 35, 4),
(226, 46, 4),
(227, 47, 4),
(228, 57, 4),
(229, 49, 4),
(230, 33, 4),
(231, 45, 4),
(232, 50, 4),
(233, 65, 4),
(234, 43, 4),
(235, 51, 4),
(236, 32, 4),
(237, 39, 4),
(238, 37, 4),
(239, 36, 4),
(240, 31, 7),
(241, 34, 7),
(242, 48, 7),
(243, 64, 7),
(244, 35, 7),
(245, 30, 7),
(246, 46, 7),
(247, 47, 7),
(248, 49, 7),
(249, 33, 7),
(250, 45, 7),
(251, 40, 7),
(252, 58, 7),
(253, 50, 7),
(254, 65, 7),
(255, 42, 7),
(256, 32, 7),
(257, 31, 3),
(258, 34, 3),
(259, 48, 3),
(260, 64, 3),
(261, 35, 3),
(262, 30, 3),
(263, 54, 3),
(264, 46, 3),
(265, 47, 3),
(266, 57, 3),
(267, 49, 3),
(268, 55, 3),
(269, 56, 3),
(270, 63, 3),
(271, 33, 3),
(272, 40, 3),
(273, 58, 3),
(274, 50, 3),
(275, 41, 3),
(276, 65, 3),
(277, 42, 3),
(278, 43, 3),
(279, 51, 3),
(280, 32, 3),
(281, 39, 3),
(282, 31, 10),
(283, 34, 10),
(284, 48, 10),
(285, 35, 10),
(286, 30, 10),
(287, 54, 10),
(288, 46, 10),
(289, 47, 10),
(290, 49, 10),
(291, 56, 10),
(292, 33, 10),
(293, 52, 10),
(294, 41, 10),
(295, 65, 10),
(296, 42, 10),
(297, 43, 10),
(298, 51, 10),
(299, 39, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_raw_mat`
--

CREATE TABLE `product_raw_mat` (
  `product_raw_mat_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `raw_mat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_raw_mat`
--

INSERT INTO `product_raw_mat` (`product_raw_mat_id`, `product_id`, `raw_mat`) VALUES
(193, 31, 'Brass'),
(194, 31, 'Castings'),
(195, 31, 'Chains'),
(196, 31, 'Sectional Metal'),
(197, 31, 'Stainless Steel'),
(277, 33, 'Brass'),
(278, 33, 'Castings'),
(279, 33, 'Chains'),
(280, 33, 'Copper'),
(281, 33, 'Corners'),
(282, 34, 'Brass'),
(283, 34, 'Chains'),
(284, 34, 'Copper'),
(285, 34, 'Engineered Plastics'),
(286, 35, 'Castings'),
(287, 35, 'Chains'),
(288, 35, 'Copper'),
(289, 35, 'Corners'),
(290, 36, 'Brass'),
(291, 36, 'Castings'),
(292, 36, 'Chains'),
(293, 36, 'Engineered Plastics'),
(294, 37, 'Brass'),
(295, 37, 'Castings'),
(296, 37, 'Chains'),
(297, 37, 'Copper'),
(298, 37, 'Engineered Plastics'),
(299, 37, 'Welding Wires'),
(300, 38, 'Brass'),
(301, 38, 'Castings'),
(302, 38, 'Copper'),
(303, 38, 'Engineered Plastics'),
(304, 38, 'Steel'),
(305, 39, 'Basic Plastics'),
(306, 39, 'Chains'),
(307, 39, 'Corners'),
(308, 39, 'Steel'),
(309, 40, 'Brass'),
(310, 40, 'Castings'),
(311, 40, 'Copper'),
(312, 41, 'Brass'),
(313, 41, 'Castings'),
(314, 41, 'Chains'),
(315, 41, 'Copper'),
(316, 41, 'Corners'),
(317, 42, 'Castings'),
(318, 42, 'Chains'),
(319, 42, 'Copper'),
(320, 43, 'Brass'),
(321, 43, 'Chains'),
(322, 43, 'Copper'),
(323, 43, 'Corners'),
(324, 43, 'Engineered Plastics'),
(325, 43, 'Fittings'),
(326, 43, 'Keys'),
(327, 43, 'Locks'),
(328, 43, 'Minerals'),
(329, 44, 'Brass'),
(330, 44, 'Castings'),
(331, 44, 'Copper'),
(332, 44, 'Wires'),
(333, 45, 'Chains'),
(334, 45, 'Copper'),
(335, 45, 'Corners'),
(336, 45, 'Steel'),
(341, 47, 'Brass'),
(342, 47, 'Stainless Steel'),
(343, 47, 'Wires'),
(344, 48, 'Castings'),
(345, 48, 'Chains'),
(346, 48, 'Steel'),
(347, 49, 'Brass'),
(348, 49, 'Castings'),
(349, 49, 'Chains'),
(350, 49, 'Engineered Plastics'),
(351, 50, 'Castings'),
(352, 50, 'Chains'),
(353, 50, 'Steel'),
(354, 50, 'Welding Wires'),
(355, 51, 'Castings'),
(356, 51, 'Copper'),
(357, 51, 'Wires'),
(358, 52, 'Castings'),
(359, 52, 'Chains'),
(360, 52, 'Steel'),
(361, 53, 'Brass'),
(362, 53, 'Chains'),
(363, 53, 'Sectional Metal'),
(364, 53, 'Steel'),
(365, 54, 'Brass'),
(366, 54, 'Chains'),
(367, 54, 'Welding Wires'),
(368, 54, 'Wires'),
(369, 55, 'Castings'),
(370, 55, 'Chains'),
(371, 55, 'Stainless Steel'),
(372, 55, 'Wires'),
(373, 56, 'Castings'),
(374, 56, 'Copper'),
(375, 56, 'Steel'),
(376, 56, 'Welding Wires'),
(377, 57, 'Brass'),
(378, 57, 'Copper'),
(379, 57, 'Stainless Steel'),
(380, 57, 'Steel'),
(381, 58, 'Brass'),
(382, 58, 'Chains'),
(383, 58, 'Welding Wires'),
(384, 58, 'Wires'),
(389, 60, 'Brass'),
(390, 60, 'Castings'),
(391, 60, 'Chains'),
(392, 60, 'Engineered Plastics'),
(393, 60, 'Stainless Steel'),
(394, 61, 'Castings'),
(395, 61, 'Chains'),
(396, 61, 'Copper'),
(397, 61, 'Welding Wires'),
(398, 62, 'Brass'),
(399, 62, 'Copper'),
(400, 62, 'Steel'),
(401, 62, 'Welding Wires'),
(402, 63, 'Brass'),
(403, 63, 'Castings'),
(404, 63, 'Engineered Plastics'),
(405, 63, 'Welding Wires'),
(406, 64, 'Castings'),
(407, 64, 'Chains'),
(408, 64, 'Stainless Steel'),
(409, 64, 'Steel'),
(410, 65, 'Basic Plastics'),
(411, 65, 'Brass'),
(412, 65, 'Castings'),
(413, 65, 'Chains'),
(414, 65, 'Copper'),
(415, 65, 'Keys'),
(420, 67, 'Castings'),
(421, 67, 'Chains'),
(422, 67, 'Copper'),
(423, 67, 'Stainless Steel'),
(424, 67, 'Steel'),
(425, 68, 'Brass'),
(426, 68, 'Castings'),
(427, 68, 'Chains'),
(428, 68, 'Steel'),
(429, 68, 'Welding Wires'),
(434, 70, 'Chains'),
(435, 70, 'Copper'),
(436, 70, 'Corners'),
(437, 70, 'Engineered Plastics'),
(438, 70, 'Fittings'),
(439, 70, 'Keys'),
(440, 70, 'Locks'),
(441, 71, 'Castings'),
(442, 71, 'Chains'),
(443, 71, 'Copper'),
(448, 73, 'Copper'),
(449, 73, 'Stainless Steel'),
(450, 73, 'Steel'),
(451, 73, 'Wires'),
(452, 74, 'Brass'),
(453, 74, 'Castings'),
(454, 74, 'Fittings'),
(455, 74, 'Stainless Steel'),
(456, 74, 'Welding Wires'),
(457, 75, 'Copper'),
(458, 75, 'Corners'),
(459, 75, 'Stainless Steel'),
(460, 75, 'Welding Wires'),
(461, 75, 'Wires'),
(462, 76, 'Castings'),
(463, 76, 'Chains'),
(464, 76, 'Copper'),
(465, 76, 'Engineered Plastics'),
(466, 76, 'Steel'),
(467, 77, 'Copper'),
(468, 77, 'Corners'),
(469, 77, 'Engineered Plastics'),
(470, 78, 'Chains'),
(471, 78, 'Copper'),
(472, 78, 'Corners'),
(473, 78, 'Engineered Plastics'),
(474, 78, 'Fittings'),
(475, 79, 'Chains'),
(476, 79, 'Copper'),
(477, 79, 'Corners'),
(478, 79, 'Engineered Plastics'),
(479, 79, 'Fittings'),
(485, 81, 'Copper'),
(486, 81, 'Corners'),
(487, 81, 'Engineered Plastics'),
(488, 81, 'Fittings'),
(489, 81, 'Keys'),
(494, 83, 'Castings'),
(495, 83, 'Copper'),
(496, 83, 'Corners'),
(497, 83, 'Engineered Plastics'),
(498, 83, 'Fittings'),
(499, 84, 'Castings'),
(500, 84, 'Chains'),
(501, 84, 'Copper'),
(502, 84, 'Corners'),
(503, 84, 'Engineered Plastics'),
(504, 84, 'Fittings'),
(505, 84, 'Keys'),
(506, 85, 'Chains'),
(507, 85, 'Copper'),
(508, 85, 'Corners'),
(509, 85, 'Engineered Plastics'),
(510, 85, 'Fittings'),
(511, 85, 'Keys'),
(512, 86, 'Castings'),
(513, 86, 'Copper'),
(514, 86, 'Corners'),
(515, 86, 'Engineered Plastics'),
(516, 86, 'Fittings'),
(517, 86, 'Keys'),
(518, 86, 'Minerals'),
(519, 86, 'Sectional Metal'),
(520, 86, 'Stainless Steel'),
(521, 86, 'Steel'),
(522, 86, 'Welding Wires'),
(533, 89, 'Chains'),
(534, 89, 'Copper'),
(535, 89, 'Corners'),
(536, 89, 'Engineered Plastics'),
(537, 89, 'Fittings'),
(550, 92, 'Castings'),
(551, 92, 'Chains'),
(552, 92, 'Corners'),
(553, 92, 'Engineered Plastics'),
(554, 92, 'Fittings'),
(555, 88, 'Castings'),
(556, 88, 'Copper'),
(557, 88, 'Corners'),
(558, 88, 'Engineered Plastics'),
(559, 88, 'Fittings'),
(560, 88, 'Keys'),
(561, 30, 'Castings'),
(562, 30, 'Sectional Metal'),
(563, 30, 'Stainless Steel'),
(564, 30, 'Steel'),
(565, 46, 'Chains'),
(566, 46, 'Copper'),
(567, 46, 'Corners'),
(568, 46, 'Welding Wires'),
(569, 32, 'Castings'),
(570, 32, 'Locks'),
(571, 32, 'Minerals'),
(572, 32, 'Welding Wires'),
(573, 32, 'Wires'),
(578, 66, 'Castings'),
(579, 66, 'Chains'),
(580, 66, 'Copper'),
(581, 66, 'Steel'),
(582, 72, 'Chains'),
(583, 72, 'Copper'),
(584, 72, 'Corners'),
(585, 72, 'Engineered Plastics'),
(586, 80, 'Brass'),
(587, 80, 'Castings'),
(588, 80, 'Chains'),
(589, 80, 'Corners'),
(590, 80, 'Engineered Plastics'),
(591, 82, 'Brass'),
(592, 82, 'Castings'),
(593, 82, 'Chains'),
(594, 82, 'Copper'),
(595, 87, 'Brass'),
(596, 87, 'Chains'),
(597, 87, 'Corners'),
(598, 87, 'Engineered Plastics'),
(599, 91, 'Brass'),
(600, 91, 'Castings'),
(601, 91, 'Chains'),
(602, 91, 'Copper'),
(603, 91, 'Corners'),
(604, 91, 'Engineered Plastics'),
(605, 91, 'Fittings'),
(606, 91, 'Keys'),
(607, 90, 'Castings'),
(608, 90, 'Chains'),
(609, 90, 'Copper'),
(610, 90, 'Corners'),
(615, 59, 'Castings'),
(616, 59, 'Copper'),
(617, 59, 'Steel'),
(618, 59, 'Welding Wires'),
(619, 69, 'Castings'),
(620, 69, 'Chains'),
(621, 69, 'Copper'),
(622, 69, 'Steel');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `raw_mat_id` int(10) NOT NULL,
  `raw_mat_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `available_quantity` int(10) NOT NULL,
  `added_by` int(10) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`raw_mat_id`, `raw_mat_code`, `name`, `available_quantity`, `added_by`, `active`) VALUES
(1, 'RWM00001', 'Stainless Steel', 273, 1, 1),
(2, 'RWM00002', 'Brass', 485, 1, 1),
(3, 'RWM00003', 'Steel', 290, 1, 1),
(4, 'RWM00004', 'Copper', 394, 1, 1),
(5, 'RWM00005', 'Basic Plastics', 400, 1, 1),
(6, 'RWM00006', 'Engineered Plastics', 212, 1, 1),
(7, 'RWM00007', 'Minerals', 480, 1, 1),
(8, 'RWM00008', 'Fittings', 470, 1, 1),
(9, 'RWM00009', 'Castings', 299, 1, 1),
(10, 'RWM00010', 'Sectional Metal', 249, 1, 1),
(11, 'RWM00011', 'Welding Wires', 950, 1, 1),
(12, 'RWM00012', 'Corners', 423, 1, 1),
(13, 'RWM00013', 'Locks', 495, 1, 1),
(14, 'RWM00014', 'Keys', 488, 1, 1),
(15, 'RWM00015', 'Chains', 200, 1, 1),
(16, 'RWM00016', 'Wires', 4900, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_orders`
--

CREATE TABLE `raw_material_orders` (
  `raw_mat_order_id` int(10) NOT NULL,
  `raw_mat_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `batch_number` int(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `quantity_in_stock` int(10) NOT NULL,
  `unit_cost` int(10) NOT NULL,
  `delivery_date` date NOT NULL,
  `invoice_file` varchar(50) NOT NULL,
  `ordered_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material_orders`
--

INSERT INTO `raw_material_orders` (`raw_mat_order_id`, `raw_mat_id`, `vendor_id`, `batch_number`, `quantity`, `quantity_in_stock`, `unit_cost`, `delivery_date`, `invoice_file`, `ordered_by`) VALUES
(36, 1, 181, 123571, 300, 300, 80, '2020-03-01', '0', 1),
(37, 2, 182, 884632, 500, 500, 100, '2020-03-01', '1583425090799757742.pdf', 1),
(38, 3, 182, 115684, 350, 330, 50, '2020-03-01', '15834252831842871760.pdf', 1),
(39, 4, 183, 163988, 500, 500, 120, '2020-03-01', '15834253541748289804.pdf', 1),
(40, 5, 181, 658874, 400, 400, 40, '2020-03-01', '0', 1),
(41, 6, 184, 152285, 250, 250, 150, '2020-03-01', '0', 1),
(42, 7, 181, 996685, 500, 500, 180, '2020-03-01', '1583425985171292064.pdf', 1),
(43, 8, 184, 998574, 500, 500, 50, '2020-03-01', '15834260311372424636.pdf', 1),
(44, 9, 182, 145528, 400, 400, 80, '2020-03-01', '1583426075952707105.pdf', 1),
(45, 10, 184, 185667, 250, 250, 200, '2020-03-01', '0', 1),
(46, 11, 182, 183337, 1000, 1000, 40, '2020-03-01', '1583426175432205109.pdf', 1),
(47, 12, 181, 147785, 500, 500, 40, '2020-03-01', '1583426222698675690.pdf', 1),
(48, 13, 182, 147552, 500, 500, 50, '2020-03-01', '1583426269895216325.pdf', 1),
(49, 14, 181, 985547, 500, 500, 20, '2020-03-01', '0', 1),
(50, 15, 184, 168475, 300, 0, 80, '2020-03-01', '15834263771517597109.pdf', 1),
(51, 16, 183, 198765, 5000, 4920, 20, '2020-03-01', '15834264331157399350.pdf', 1),
(52, 15, 184, 984258, 300, 300, 50, '2020-03-03', '15834266791656331802.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `recruitment_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `ssc_per` varchar(20) NOT NULL,
  `ssc_ms` varchar(100) NOT NULL,
  `hsc_per` varchar(20) NOT NULL,
  `hsc_ms` varchar(100) NOT NULL,
  `diploma_per` varchar(20) NOT NULL,
  `d2d_ms` varchar(100) NOT NULL,
  `highest_qualification` varchar(50) NOT NULL,
  `specialization_field` varchar(50) NOT NULL,
  `work_experience_years` int(20) NOT NULL,
  `add_doc` varchar(100) NOT NULL,
  `interested_field` varchar(20) NOT NULL,
  `person_image` varchar(100) NOT NULL,
  `added_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`recruitment_id`, `name`, `email_id`, `contact_no`, `ssc_per`, `ssc_ms`, `hsc_per`, `hsc_ms`, `diploma_per`, `d2d_ms`, `highest_qualification`, `specialization_field`, `work_experience_years`, `add_doc`, `interested_field`, `person_image`, `added_by`) VALUES
(1, 'Rahul Brahmbhatt', 'rahulbrahmbhatt13@gmail.com', '9033969150', '89', 'RahulBrahmbhatt_10th_Marksheet.pdf', '75', 'RahulBrahmbhatt_12th_Marksheet.pdf', 'NA', 'Not Available', 'B.Tech', 'Information Technology', 2, 'RahulBrahmbhatt_Resume.pdf', 'Data Science', 'avatar5.png', 2),
(2, 'Rahul Brahmbhatt', 'rahulbrahmbhatt13@gmail.com', '9033969150', '85', 'Not Available', '75', 'RahulBrahmbhatt_12th_Marksheet.pdf', 'NA', 'Not Available', 'M.Tech', 'Computer Engineering', 2, 'Not Available', 'Computer Network', 'avatar5.png', 2),
(3, 'Harsh', 'harshp1898@gmail.com', '9033969150', '90', 'Not Available', '90', 'Not Available', 'NA', 'Not Available', 'M.Tech', 'Computer Engineering', 5, 'logoNewC+.pdf', 'MS', 'avatar5.png', 0),
(10, 'Rahul', 'rahulbt2016@gmail.com', '9924483264', '90', 'Not Available', '90', 'Not Available', 'NA', 'Not Available', 'B.Tech', 'Information Technology', 2, 'Not Available', 'DS', 'avatar5.png', 0),
(11, 'Rahul', 'rahulbt2016@gmail.com', '9924483264', '80', 'Not Available', '90', 'Not Available', 'NA', 'Not Available', 'B.Tech', 'Information Technology', 2, 'Not Available', 'DS', 'avatar5.png', 0),
(12, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', '90', 'Not Available', '90', 'Not Available', 'NA', 'Not Available', 'B.Tech', 'Information Technology', 2, 'Not Available', 'DS', 'avatar5.png', 0),
(17, 'Dhananjay Rajpoot', 'rahulbt2016@gmail.com', '9924483264', '95', 'Not Available', '85', 'Not Available', 'NA', 'Not Available', 'B.Tech', 'Computer Engineering', 0, '15861148901688127417.pdf', 'DS', 'avatar5.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(10) NOT NULL,
  `request_date` date NOT NULL,
  `requester_id` int(10) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `request_handler` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_date`, `requester_id`, `request_type`, `amount`, `reason`, `status`, `request_handler`) VALUES
(13, '2020-04-10', 5, 'Raw Material', 50, 'Basic Plastics', 1, 1),
(14, '2020-04-10', 5, 'Fund', 50000, 'Buy machinery', 2, 1),
(15, '2020-04-10', 5, 'Raw Material', 50, 'Chains', 0, 0),
(16, '2020-04-10', 5, 'Raw Material', 20, 'Chains', 1, 1),
(17, '2020-04-10', 5, 'Raw Material', 100, 'Locks', 0, 0),
(18, '2020-04-10', 5, 'Raw Material', 100, 'Steel', 2, 1),
(19, '2020-04-10', 5, 'Fund', 1000, 'Service Machinery', 0, 0),
(20, '2020-04-10', 5, 'Fund', 50000, 'New Machine', 1, 1),
(22, '2020-04-10', 6, 'Product', 1, 'Belt Weights', 0, 0),
(23, '2020-04-10', 6, 'Product', 5, 'Belt Weights', 2, 1),
(24, '2020-04-10', 6, 'Product', 5, 'Bridge Mixing', 1, 1),
(25, '2020-04-10', 1, 'Product', 10, '70E Croker Loader', 0, 0),
(26, '2020-04-10', 1, 'Raw Material', 50, 'Basic Plastics', 0, 0),
(27, '2020-04-10', 1, 'Fund', 1000, 'Pay Vendor', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `returned_raw_materials`
--

CREATE TABLE `returned_raw_materials` (
  `returned_raw_mat_id` int(10) NOT NULL,
  `raw_mat_order_id` int(10) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `returned_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returned_raw_materials`
--

INSERT INTO `returned_raw_materials` (`returned_raw_mat_id`, `raw_mat_order_id`, `returned_quantity`, `return_date`, `reason`, `returned_by`) VALUES
(11, 51, 80, '2020-03-03', 'Damaged', 1),
(12, 38, 20, '2020-03-03', 'Rusted', 1),
(13, 50, 300, '2020-03-03', 'Corroded metal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(10) NOT NULL,
  `invoice_number` varchar(10) NOT NULL,
  `sale_date` date NOT NULL,
  `percentage_discount` int(10) NOT NULL,
  `total_cost` int(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_number` varchar(50) NOT NULL,
  `delivery_address` varchar(5000) NOT NULL,
  `delivery_city` varchar(50) NOT NULL,
  `delivery_pin_code` int(10) NOT NULL,
  `delivery_state` varchar(50) NOT NULL,
  `seller_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `invoice_number`, `sale_date`, `percentage_discount`, `total_cost`, `customer_name`, `customer_email`, `customer_number`, `delivery_address`, `delivery_city`, `delivery_pin_code`, `delivery_state`, `seller_id`) VALUES
(7, '00000001', '2020-03-16', 0, 182900, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'B/1, Santyogiraj society, Pavanchakki road', 'Nadiad', 387002, 'Gujarat', 1),
(8, '00000002', '2020-03-18', 0, 88500, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'B/1, Santyogiraj society, Pavanchakki road', 'Nadiad', 387002, 'Gujarat', 1),
(9, '00000003', '2020-03-18', 10, 377010, 'Chaggan Patel', 'c.patel@gmail.com', '8877569898', '132, Ebombe Society,Wakanda Road', 'Nadiad', 387002, 'Gujarat', 1),
(10, '00000004', '2020-03-18', 10, 785880, 'Rajat Kumar', 'rajatk99@gmail.com', '9888557854', '12, Junaid Colony, Faisal Road', 'Valsad', 365887, 'Gujarat', 1),
(11, '00000005', '2020-04-02', 0, 230100, 'Janak Kumar', 'janakkumar009@gmail.com', '7888554787', '145 Vasavata Nagar, Talap road', 'Demol', 785448, 'Gujarat', 1),
(12, '00000006', '2020-04-02', 20, 78352, 'Haresh Singh', 'singh.h@gmail.com', '7888787878', '23, Aniket Society, Kanak Road', 'Valsad', 985885, 'Gujarat', 1),
(13, '00000007', '2019-04-02', 10, 318600, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'B/1, Santyogiraj society, Pavanchakki road', 'Nadiad', 387002, 'Gujarat', 1),
(14, '00000008', '2019-03-02', 0, 826000, 'Falguni Kapoor', 'fkapoor@gmail.com', '7888787787', 'D-12, Dhwani Kunj, Dakor Road', 'Nadiad', 387002, 'Gujarat', 1),
(15, '00000009', '2019-10-02', 0, 1121000, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'B/1, Santyogiraj society, Pavanchakki road', 'Nadiad', 387002, 'Gujarat', 1),
(16, '00000010', '2020-04-02', 0, 873200, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'B/1, Santyogiraj society, Pavanchakki road', 'Nadiad', 387002, 'Gujarat', 1),
(17, '00000011', '2020-04-02', 0, 82600, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'B/1, Santyogiraj society, Pavanchakki road', 'Nadiad', 387002, 'Gujarat', 1),
(18, '00000012', '2020-04-04', 0, 66080, 'Dhaval Bist', 'dhavalb@gmail.com', '7878558547', '22 Gangadhar Society, Jamuna Road', 'Ahmedabad', 386989, 'Gujarat', 1),
(19, '00000013', '2020-04-06', 0, 64900, 'Danial Jackson', 'djackson98@gmail.com', '7888558877', '12 Vasavata society, Bastinagar road', 'Anand', 387005, 'Gujarat', 1),
(20, '00000014', '2020-04-07', 10, 466218, 'Chetan Kapoor', 'chetankapoor99@gmail.com', '9888587855', 'S-7 Faruka Flats, Nutan road', 'Ahmedabad', 875448, 'Gujarat', 1),
(21, '00000015', '2020-04-07', 0, 177000, 'Nayan Bharvad', 'nbharvad54@gmail.com', '7855662545', '78 Dalit Flats, IG road', 'Nadiad', 387002, 'Gujarat', 1),
(22, '00000016', '2020-04-08', 0, 590000, 'Sunil Kapoor', 'sunilkapoor007@gmail.com', '7788554879', 'B-1, Janak Society, Dharma Road', 'Anand', 384225, 'Gujarat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `sale_product_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`sale_product_id`, `sale_id`, `product_id`, `quantity`, `unit_cost`) VALUES
(6, 7, 48, 1, 35000),
(7, 7, 75, 1, 120000),
(8, 8, 35, 1, 75000),
(9, 9, 90, 1, 300000),
(10, 9, 59, 1, 55000),
(11, 10, 90, 2, 300000),
(12, 10, 89, 1, 140000),
(13, 11, 59, 1, 55000),
(14, 11, 76, 2, 70000),
(15, 12, 31, 1, 50000),
(16, 12, 63, 1, 33000),
(17, 13, 90, 1, 300000),
(18, 14, 88, 2, 350000),
(19, 15, 90, 2, 300000),
(20, 15, 88, 1, 350000),
(21, 16, 90, 2, 300000),
(22, 16, 89, 1, 140000),
(23, 17, 76, 1, 70000),
(24, 18, 52, 1, 56000),
(25, 19, 46, 1, 55000),
(26, 20, 88, 1, 350000),
(27, 20, 59, 1, 55000),
(28, 20, 64, 1, 34000),
(29, 21, 82, 1, 150000),
(30, 22, 90, 1, 300000),
(31, 22, 83, 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `sale_product_batch_numbers`
--

CREATE TABLE `sale_product_batch_numbers` (
  `unique_id` int(10) NOT NULL,
  `sale_product_id` int(10) NOT NULL,
  `product_manufacture_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product_batch_numbers`
--

INSERT INTO `sale_product_batch_numbers` (`unique_id`, `sale_product_id`, `product_manufacture_id`) VALUES
(1, 6, 11),
(2, 7, 12),
(3, 8, 13),
(4, 9, 14),
(5, 10, 16),
(6, 11, 15),
(7, 11, 17),
(8, 12, 18),
(9, 13, 21),
(10, 14, 19),
(11, 14, 20),
(12, 15, 23),
(13, 16, 22),
(14, 17, 24),
(15, 18, 27),
(16, 18, 28),
(17, 19, 25),
(18, 19, 26),
(19, 20, 29),
(20, 21, 31),
(21, 21, 32),
(22, 22, 30),
(23, 23, 33),
(24, 24, 34),
(25, 25, 40),
(26, 26, 36),
(27, 27, 38),
(28, 28, 39),
(29, 29, 41),
(30, 30, 35),
(31, 31, 37);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `service_reg_num` varchar(20) NOT NULL,
  `product_manufacture_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `return_date` date NOT NULL,
  `defect_description` varchar(500) NOT NULL,
  `charges` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `service_taker` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_reg_num`, `product_manufacture_id`, `date`, `return_date`, `defect_description`, `charges`, `status`, `service_taker`) VALUES
(1, 'SRV00001', 11, '2020-04-05', '2020-04-10', 'Motor failure', 0, 0, 1),
(2, 'SRV00002', 19, '2020-04-05', '2020-04-10', 'Extraction belt broken', 5000, 1, 1),
(3, 'SRV00003', 13, '2020-04-07', '2020-04-10', 'Engine Failure', 10000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `to_do`
--

CREATE TABLE `to_do` (
  `to_do_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `data` varchar(1000) NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `done` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `to_do`
--

INSERT INTO `to_do` (`to_do_id`, `user_id`, `data`, `deadline`, `done`) VALUES
(8, 1, 'Arrange Meeting', '2020-04-03 05:00:00', 1),
(10, 1, 'Order steel from a vendor', '2020-04-18 06:00:00', 0),
(13, 1, 'Complete project module', '2020-04-18 14:29:00', 0),
(14, 1, 'Upload Submission', '2020-04-17 13:30:00', 0),
(18, 1, 'Take customer follow-up of Jay Bacchan - INQ00001', '2020-04-25 11:30:00', 0),
(23, 1, 'Return product after servicing - SRV00003', '2020-04-10 11:30:00', 1),
(24, 1, 'Take product inquiry of Karan Kapoor - WINQ00003', '2020-04-15 08:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_reg_num` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `designation_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_photo` varchar(50) DEFAULT NULL,
  `user_salary` int(10) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_reg_num`, `user_name`, `email`, `password`, `designation_name`, `phone`, `user_photo`, `user_salary`, `active`) VALUES
(1, 'USR00001', 'Rahul Tiwari', 'rahulbt2016@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Admin', '9924483264', 'rt.jpg', 95000, 1),
(2, 'USR00002', 'Rahul Brahmbhatt', 'rahulbrahmbhatt1811@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'HR', '9033969150', 'rb.jpg', 95000, 1),
(3, 'USR00003', 'Harsh Patel', 'harshp1898@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Inventory Manager', '9624702340', 'harsh.jpeg', 75000, 1),
(4, 'USR00004', 'Vraj Patel', 'vrajkp99@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Finance Manager', '9966587569', 'vraj-min.jpg', 85000, 1),
(5, 'USR00005', 'Dhaval Vaghela', 'rahulbt20@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Manufacturing Engineer', '9898888577', '81595975_175905553651301_3023339835998863360_n.jpg', 75000, 1),
(6, 'USR00006', 'Justin Bieber', 'avakinbieber@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Sales Manager', '7855874588', 'jb.jpg', 80000, 1),
(7, 'USR00007', 'Vraj Solanki', 'avakinbieber98@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Service Engineer', '9988557788', 'solu.jpg', 60000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(10) NOT NULL,
  `vendor_reg_num` varchar(50) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `gst_num` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `added_by` int(10) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_reg_num`, `vendor_name`, `gst_num`, `email`, `phone`, `added_by`, `active`) VALUES
(181, 'VEN00001', 'Babloo Kapoor', '24AAAAA0000A1Z0', 'babloo.kapoor@gmail.com', '9955883322', 1, 1),
(182, 'VEN00002', 'Chandan Jaiswal', '24AAAAA0000A1Z2', 'chanduj@gmail.com', '9988771111', 1, 1),
(183, 'VEN00003', 'Rajat Khanna', '24AAAAA0000A1Z3', 'rkhanna@gmail.com', '9988888877', 1, 1),
(184, 'VEN00004', 'Tapan Patel', '24ASDAA0000A1Z9', 'patel_tapan@gmail.com', '9988112222', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_raw_materials`
--

CREATE TABLE `vendor_raw_materials` (
  `vendor_raw_mat_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `raw_mat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_raw_materials`
--

INSERT INTO `vendor_raw_materials` (`vendor_raw_mat_id`, `vendor_id`, `raw_mat`) VALUES
(83, 184, 'Basic Plastics'),
(84, 184, 'Brass'),
(85, 184, 'Castings'),
(86, 184, 'Chains'),
(87, 184, 'Copper'),
(88, 184, 'Corners'),
(89, 184, 'Engineered Plastics'),
(90, 184, 'Fittings'),
(91, 184, 'Keys'),
(92, 184, 'Locks'),
(93, 184, 'Minerals'),
(94, 184, 'Sectional Metal'),
(95, 184, 'Stainless Steel'),
(96, 184, 'Steel'),
(97, 184, 'Welding Wires'),
(98, 184, 'Wires'),
(182, 183, 'Brass'),
(183, 183, 'Copper'),
(184, 183, 'Corners'),
(185, 183, 'Engineered Plastics'),
(186, 183, 'Wires'),
(187, 182, 'Brass'),
(188, 182, 'Castings'),
(189, 182, 'Copper'),
(190, 182, 'Corners'),
(191, 182, 'Engineered Plastics'),
(192, 182, 'Fittings'),
(193, 182, 'Keys'),
(194, 182, 'Locks'),
(195, 182, 'Minerals'),
(196, 182, 'Sectional Metal'),
(197, 182, 'Steel'),
(198, 182, 'Welding Wires'),
(199, 181, 'Basic Plastics'),
(200, 181, 'Brass'),
(201, 181, 'Chains'),
(202, 181, 'Copper'),
(203, 181, 'Corners'),
(204, 181, 'Engineered Plastics'),
(205, 181, 'Fittings'),
(206, 181, 'Keys'),
(207, 181, 'Locks'),
(208, 181, 'Minerals'),
(209, 181, 'Sectional Metal'),
(210, 181, 'Stainless Steel'),
(211, 181, 'Steel'),
(212, 181, 'Welding Wires'),
(213, 181, 'Wires');

-- --------------------------------------------------------

--
-- Table structure for table `web_inquiry`
--

CREATE TABLE `web_inquiry` (
  `web_inquiry_id` int(20) NOT NULL,
  `web_inquiry_reg_num` varchar(30) NOT NULL,
  `inquirer_name` varchar(30) NOT NULL,
  `inquirer_email` varchar(50) NOT NULL,
  `inquirer_number` varchar(30) NOT NULL,
  `inquiry_date` date NOT NULL,
  `product_id` int(10) NOT NULL,
  `inquiry_allocated_to` int(10) NOT NULL,
  `inquiry_allocator` int(10) NOT NULL,
  `appointment_call` int(10) NOT NULL,
  `appointment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_inquiry`
--

INSERT INTO `web_inquiry` (`web_inquiry_id`, `web_inquiry_reg_num`, `inquirer_name`, `inquirer_email`, `inquirer_number`, `inquiry_date`, `product_id`, `inquiry_allocated_to`, `inquiry_allocator`, `appointment_call`, `appointment_timestamp`) VALUES
(37, 'WINQ00001', 'Jay Panchal', 'rahulbt2016@gmail.com', '9924483278', '2020-04-06', 66, 0, 0, 0, '0000-00-00 00:00:00'),
(38, 'WINQ00002', 'Haresh Kapoor', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 66, 1, 1, 0, '2020-04-06 17:54:16'),
(39, 'WINQ00003', 'Karan Kapoor', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 34, 1, 1, 1, '2020-04-15 08:00:00'),
(40, 'WINQ00004', 'Thakur Pratap', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 67, 1, 1, 1, '2020-04-10 05:00:00'),
(41, 'WINQ00005', 'Viraj Chitnis', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 67, 6, 1, 0, '0000-00-00 00:00:00'),
(42, 'WINQ00006', 'Haresh Garg', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 73, 6, 1, 0, '0000-00-00 00:00:00'),
(43, 'WINQ00007', 'Karan Kumar', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 68, 1, 1, 1, '2020-04-06 18:11:29'),
(44, 'WINQ00008', 'Rahim Khan', 'rahulbt2016@gmail.com', '9924483264', '2020-04-06', 83, 6, 1, 0, '0000-00-00 00:00:00'),
(45, 'WINQ00009', 'Gautam Cara', 'rahulbt2016@gmail.com', '9924483264', '2020-04-09', 34, 0, 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_name`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `industrial_applications`
--
ALTER TABLE `industrial_applications`
  ADD PRIMARY KEY (`industrial_application_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `onsite_inquiry`
--
ALTER TABLE `onsite_inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `onsite_inquiry_follow_up`
--
ALTER TABLE `onsite_inquiry_follow_up`
  ADD PRIMARY KEY (`follow_up_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_manufactured`
--
ALTER TABLE `products_manufactured`
  ADD PRIMARY KEY (`product_manufacture_id`);

--
-- Indexes for table `products_manufactured_raw_mat_quantity`
--
ALTER TABLE `products_manufactured_raw_mat_quantity`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_industrial_application`
--
ALTER TABLE `product_industrial_application`
  ADD PRIMARY KEY (`product_industrial_application_id`);

--
-- Indexes for table `product_raw_mat`
--
ALTER TABLE `product_raw_mat`
  ADD PRIMARY KEY (`product_raw_mat_id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`raw_mat_id`),
  ADD UNIQUE KEY `raw_mat_code` (`raw_mat_code`);

--
-- Indexes for table `raw_material_orders`
--
ALTER TABLE `raw_material_orders`
  ADD PRIMARY KEY (`raw_mat_order_id`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`recruitment_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `returned_raw_materials`
--
ALTER TABLE `returned_raw_materials`
  ADD PRIMARY KEY (`returned_raw_mat_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`sale_product_id`);

--
-- Indexes for table `sale_product_batch_numbers`
--
ALTER TABLE `sale_product_batch_numbers`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `to_do`
--
ALTER TABLE `to_do`
  ADD PRIMARY KEY (`to_do_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_raw_materials`
--
ALTER TABLE `vendor_raw_materials`
  ADD PRIMARY KEY (`vendor_raw_mat_id`);

--
-- Indexes for table `web_inquiry`
--
ALTER TABLE `web_inquiry`
  ADD PRIMARY KEY (`web_inquiry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2030;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `industrial_applications`
--
ALTER TABLE `industrial_applications`
  MODIFY `industrial_application_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `onsite_inquiry`
--
ALTER TABLE `onsite_inquiry`
  MODIFY `inquiry_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `onsite_inquiry_follow_up`
--
ALTER TABLE `onsite_inquiry_follow_up`
  MODIFY `follow_up_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `products_manufactured`
--
ALTER TABLE `products_manufactured`
  MODIFY `product_manufacture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products_manufactured_raw_mat_quantity`
--
ALTER TABLE `products_manufactured_raw_mat_quantity`
  MODIFY `unique_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_industrial_application`
--
ALTER TABLE `product_industrial_application`
  MODIFY `product_industrial_application_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `product_raw_mat`
--
ALTER TABLE `product_raw_mat`
  MODIFY `product_raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `raw_material_orders`
--
ALTER TABLE `raw_material_orders`
  MODIFY `raw_mat_order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `recruitment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `returned_raw_materials`
--
ALTER TABLE `returned_raw_materials`
  MODIFY `returned_raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `sale_product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sale_product_batch_numbers`
--
ALTER TABLE `sale_product_batch_numbers`
  MODIFY `unique_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `to_do`
--
ALTER TABLE `to_do`
  MODIFY `to_do_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `vendor_raw_materials`
--
ALTER TABLE `vendor_raw_materials`
  MODIFY `vendor_raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `web_inquiry`
--
ALTER TABLE `web_inquiry`
  MODIFY `web_inquiry_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
