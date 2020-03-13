-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 09:05 AM
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
(719, 'HR', 1),
(720, 'HR', 2),
(721, 'HR', 3),
(722, 'HR', 20),
(723, 'HR', 21),
(724, 'HR', 22),
(725, 'Inventory Manager', 6),
(726, 'Inventory Manager', 7),
(727, 'Inventory Manager', 8),
(728, 'Inventory Manager', 9),
(729, 'Inventory Manager', 10),
(730, 'Inventory Manager', 11),
(731, 'Inventory Manager', 12),
(732, 'Inventory Manager', 13),
(733, 'Inventory Manager', 15),
(734, 'Inventory Manager', 22),
(758, 'Admin', 1),
(759, 'Admin', 2),
(760, 'Admin', 3),
(761, 'Admin', 4),
(762, 'Admin', 5),
(763, 'Admin', 6),
(764, 'Admin', 7),
(765, 'Admin', 8),
(766, 'Admin', 9),
(767, 'Admin', 10),
(768, 'Admin', 11),
(769, 'Admin', 12),
(770, 'Admin', 13),
(771, 'Admin', 15),
(772, 'Admin', 16),
(773, 'Admin', 17),
(774, 'Admin', 18),
(775, 'Admin', 19),
(776, 'Admin', 20),
(777, 'Admin', 25),
(778, 'Admin', 30),
(779, 'Admin', 35),
(780, 'Admin', 40),
(781, 'Admin', 48);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(30) NOT NULL,
  `contact_subject` varchar(50) NOT NULL,
  `contact_message` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`) VALUES
(9, 'Harsh Patel', 'harshp1898@gmail.com', 'Query regarding products', 'How can I inquire about the products you manufacture and sell?'),
(10, 'Harsh Patel', 'harshp1898@gmail.com', 'Query regarding products', 'How can I inquire about the products you manufacture and sell?'),
(11, 'Harsh Patel', 'harshp1898@gmail.com', 'Query regarding products', 'How can I inquire about the products you manufacture and sell?'),
(12, 'Rahul Brahmbhatt', 'rahulbrahmbhatt1811@gmail.com', 'Raw Materials', 'Hello, I have some questions about raw materials.'),
(13, 'Rahul Brahmbhatt', 'rahulbrahmbhatt1811@gmail.com', 'Raw Materials', 'Hello'),
(14, 'Harsh Patel', 'harshp1898@gmail.com', 'Hello', 'Testing'),
(15, 'Harsh Patel', 'a@a.a', 'Products', 'Hello'),
(16, 'Harsh Patel', 'harshp1898@gmail.com', 'Hello', 'products');

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
('HR', 95000),
('Inventory Manager', 70000);

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
(15, 'Products', 'products.php', 1),
(16, 'Add New Product', 'addProduct.php', 0),
(17, 'Edit Product', 'editProduct.php', 0),
(18, 'Manufactured Products', 'manufacturedProducts.php', 1),
(19, 'Add New Manufactured Product', 'addManufacturedProduct.php', 0),
(20, 'Generate Barcode', 'generateBarcode.php', 1),
(25, 'Add Applicant', 'addApplicant.php', 1),
(30, 'Show Applicants', 'availableApplicants.php', 1),
(35, 'Request Fund', 'requestFund.php', 1),
(40, 'Fund Status', 'statusFund.php', 1),
(48, 'Customer Inquiry (On-site)', 'onSiteInquiry.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `request_id` int(10) NOT NULL,
  `request_date` date NOT NULL,
  `employee_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `request_handler` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`request_id`, `request_date`, `employee_id`, `amount`, `reason`, `status`, `request_handler`) VALUES
(92, '2020-03-04', 3, 500, 'Raw materials', 1, 1),
(93, '2020-03-05', 3, 500, 'Raw materials', 2, 1),
(94, '2020-03-05', 3, 500, 'Raw Materials', 0, 0),
(95, '2020-03-07', 3, 500, 'Raw Materials', 1, 1);

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
(85, '2020-03-07 05:13:57', 3, 1, 0, 'Fund Request Accepted', 'Congratulations, Admin, Rahul Tiwari has accepted your fund request of â‚¹500.', 'green', 'requestFund.php');

-- --------------------------------------------------------

--
-- Table structure for table `onsite_inquiry`
--

CREATE TABLE `onsite_inquiry` (
  `inquiry_id` int(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `inquiry_date` date NOT NULL,
  `added_by` int(10) NOT NULL,
  `inquiry_allocate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onsite_inquiry`
--

INSERT INTO `onsite_inquiry` (`inquiry_id`, `customer_name`, `customer_email`, `customer_phone`, `product_name`, `inquiry_date`, `added_by`, `inquiry_allocate`) VALUES
(11, 'himesh', 'hims99@gmail.com', '3698521470', 'Planetary Gearbox', '2020-03-04', 2, 'Harsh Patel'),
(12, 'himesh', 'hims99@gmail.com', '3698521470', 'Planetary Gearbox', '2020-03-04', 2, 'Harsh Patel'),
(13, 'abc', 'abcd@xyz.com', '1234567890', 'Planetary Gearbox', '2020-03-05', 2, 'Rahul Tiwari'),
(14, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'Planetary Gearbox', '2020-03-07', 1, 'Harsh Patel'),
(15, 'Rahul Tiwari', 'rahulbt2016@gmail.com', '9924483264', 'AL 120 - Articulated Wheel Loader', '2020-03-07', 1, 'Harsh Patel');

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
(30, 'PRD00001', 'Extensive Gearbox', 1, '15838809131364343578.png', 'Extensive Gearbox', '1583881064748514993.pdf', 0, 60000, 1, 1),
(31, 'PRD00002', 'Bevel Gearbox', 1, '15838646851250444908.jpg', 'Bevel Gearbox', '1583864685470081395.pdf', 0, 50000, 1, 1),
(32, 'PRD00003', 'Triple Operative Gearbox', 1, '15839258941771810796.png', 'Triple Operative Gearbox', '15839258941441216227.pdf', 0, 80000, 1, 1),
(33, 'PRD00004', 'Helical (NOE Series)', 1, '15839261481769962722.png', 'Helical (NOE Series)', '1583926148481955196.pdf', 0, 90000, 1, 1),
(34, 'PRD00005', 'Bevel Helical (SOE Series)', 1, '158392624923627915.png', 'Bevel Helical (SOE Series)', '15839262492003290209.pdf', 0, 95000, 1, 1),
(35, 'PRD00006', 'Cooling Gearbox', 1, '1583926280501093731.png', 'Cooling Gearbox', '15839262802116132797.pdf', 0, 75000, 1, 1),
(36, 'PRD00007', 'Wheel driver', 1, '1583926361225338498.png', 'Wheel driver', '1583926361249908494.pdf', 0, 70000, 1, 1),
(37, 'PRD00008', 'Vernier drive', 1, '1583926398965915689.png', 'Vernier drive', '15839263981833660556.pdf', 0, 60000, 1, 1),
(38, 'PRD00009', 'Dial press drive', 1, '15839264361168094036.jpg', 'Dial press drive', '1583926436202479793.pdf', 0, 40000, 1, 1),
(39, 'PRD00010', 'V gearbox medium sizes', 1, '158392655273094524.png', 'V gearbox medium sizes', '15839265521648673764.pdf', 0, 80000, 1, 1),
(40, 'PRD00011', 'Main hoist gearbox', 1, '1583926586546635274.jpg', 'Main hoist gearbox', '15839265861439074490.pdf', 0, 40000, 1, 1),
(41, 'PRD00012', 'Seal Gear series', 1, '15839266142102454619.png', 'Seal Gear series', '1583926614802436502.pdf', 0, 60000, 1, 1),
(42, 'PRD00013', 'Shank RE series', 1, '15839266541026262389.png', 'RE series', '1583926654553825953.pdf', 0, 30000, 1, 1),
(43, 'PRD00014', 'Single deduction gear', 1, '1583926709892411782.png', 'Single deduction gear', '1583926709819135862.pdf', 0, 50000, 1, 1),
(44, 'PRD00015', 'Large duty stirrer', 1, '1583926778404847395.png', 'Large duty stirrer', '15839267781973419995.pdf', 0, 40000, 1, 1),
(45, 'PRD00016', 'Huge pair ball', 1, '1583926811886788982.png', 'Huge pair ball', '15839268111494781095.pdf', 0, 64994, 1, 1),
(46, 'PRD00017', 'Feeler Mixing', 1, '1583926859558359911.png', 'Feeler Mixing', '1583926859475524288.pdf', 0, 55000, 1, 1),
(47, 'PRD00018', 'Flex Mixing', 1, '1583926891478450515.png', 'Flex Mixing', '1583926891237761400.pdf', 0, 45000, 1, 1),
(48, 'PRD00019', 'Bridge Mixing', 1, '15839269182127103244.png', 'Bridge Mixing', '15839269181507133281.pdf', 1, 35000, 1, 1),
(49, 'PRD00020', 'Friction Mixing', 1, '15839269461181971858.jpg', 'Friction Mixing', '15839269461059571599.pdf', 0, 25000, 1, 1),
(50, 'PRD00021', 'Rusp gear wheel', 1, '15839269731797742518.jpg', 'Rusp gear wheel', '15839269731930741440.pdf', 0, 67000, 1, 1),
(51, 'PRD00022', 'Triple gear wheel', 1, '15839270162093315631.jpg', 'Triple gear wheel', '15839270161929641769.pdf', 0, 23000, 1, 1),
(52, 'PRD00023', 'Lead Crankshaft', 1, '15839270551653669367.jpg', 'Lead Crankshaft', '1583927055776363858.pdf', 0, 56000, 1, 1),
(53, 'PRD00024', 'Hydro pair', 1, '1583927115502542226.jpg', 'Hydro pair', '0', 0, 34000, 1, 1),
(54, 'PRD00025', 'External gear', 1, '1583927160727751260.jpg', 'External gear', '15839271601697840590.pdf', 0, 70000, 1, 1),
(55, 'PRD00026', 'Gocac gearbox', 1, '1583927228571127403.png', 'Gocac gearbox', '15839272281978671073.pdf', 0, 30000, 1, 1),
(56, 'PRD00027', 'Gogoc gearbox', 1, '15839272561668562583.png', 'Gogoc gearbox', '15839272561255898129.pdf', 0, 56000, 1, 1),
(57, 'PRD00028', 'Fluid reduction gearbox', 1, '1583927302639950683.png', 'Fluid reduction gearbox', '1583927302102004500.pdf', 0, 43000, 1, 1),
(58, 'PRD00029', 'Plain reduction gearbox', 1, '15839273311183616672.png', 'Plain reduction gearbox', '1583927331164034055.pdf', 0, 54000, 1, 1),
(59, 'PRD00030', 'Bolt Elevation', 1, '15839273611332707483.png', 'Bolt Elevation', '15839273611253753324.pdf', 0, 55000, 1, 1),
(60, 'PRD00031', 'Pail Operator', 1, '15839273981376323960.jpg', 'Pail Operator', '15839273981155434750.pdf', 0, 51000, 1, 1),
(61, 'PRD00032', 'Inversible stand', 1, '1583927435621254882.jpg', 'Inversible stand', '15839274351859999170.pdf', 0, 23900, 1, 1),
(62, 'PRD00033', 'Roll box', 1, '15839274661481169623.png', 'Roll box', '0', 0, 56000, 1, 1),
(63, 'PRD00034', 'Halo gearbox', 1, '1583927525534279307.png', 'Halo gearbox', '15839275251742179473.pdf', 0, 33000, 1, 1),
(64, 'PRD00035', 'Bumper gearbox', 1, '1583927600820201410.png', 'Bumper gearbox', '15839276001782567641.pdf', 0, 34000, 1, 1),
(65, 'PRD00036', 'Seeder gearbox', 1, '15839276551128132411.png', 'Seeder gearbox', '1583927655920625114.pdf', 0, 90000, 1, 1),
(66, 'PRD00037', 'Stacker Excavators', 2, '1583927695125126554.jpg', 'Stacker Excavators', '1583927695152887967.pdf', 0, 65000, 1, 1),
(67, 'PRD00038', 'Transferable Conveyors', 2, '15839277331066007302.jpg', 'Transferable Conveyors', '1583927733304341748.pdf', 0, 200000, 1, 1),
(68, 'PRD00039', 'Ronon Feeder', 2, '15839277881745365002.jpg', 'Ronon Feeder', '1583927788530928254.pdf', 0, 100000, 1, 1),
(69, 'PRD00040', 'Shift Feeder', 1, '1583927835528397525.jpg', 'Shift Feeder', '1583927835237339651.pdf', 0, 80000, 1, 1),
(70, 'PRD00041', 'Vag tripples', 2, '1583927885771272874.jpg', 'Vag tripples', '1583927885627954653.pdf', 0, 150000, 1, 1),
(71, 'PRD00042', 'Belt Weights', 2, '15839279281087396077.jpg', 'Belt Weights', '1583927928285459227.pdf', 0, 70000, 1, 1),
(72, 'PRD00043', 'Fast Conveyor', 2, '1583927965971870271.jpg', 'Fast Conveyor', '1583927965736831844.pdf', 0, 66997, 1, 1),
(73, 'PRD00044', 'Fair Conveyor', 2, '1583928009278822901.jpg', 'Fair Conveyor', '15839280091664476674.pdf', 0, 77000, 1, 1),
(74, 'PRD00045', 'Long span Conveyor', 2, '15839280491191477898.jpg', 'Long span Conveyor', '15839280491734012461.pdf', 0, 250000, 1, 1),
(75, 'PRD00046', 'Roll Crusher', 2, '15839281011430360624.jpg', 'Roll Crusher', '15839281011335992196.pdf', 1, 120000, 1, 1),
(76, 'PRD00047', 'Extractor', 2, '1583928137329456170.jpg', 'Extractor', '15839281371150967276.pdf', 0, 70000, 1, 1),
(77, 'PRD00048', 'Pulleys', 2, '15839281661738216055.jpg', 'Pulleys', '15839281662060874812.pdf', 0, 90000, 1, 1),
(78, 'PRD00049', 'Bridge type reclaimer', 2, '15839281941712969354.jpg', 'Bridge type reclaimer', '1583928194573520219.pdf', 0, 150000, 1, 1),
(79, 'PRD00050', 'Ship Loader', 2, '15839282231151177959.jpg', 'Ship Loader', '1583928223910477770.pdf', 0, 300000, 1, 1),
(80, 'PRD00051', '901 Loading Dumper', 3, '1583928263932440473.png', '901 Loading Dumper', '1583928263234447616.pdf', 0, 300000, 1, 1),
(81, 'PRD00052', '901 Loading Dumping Low Height', 3, '15839282921149884298.png', '901 Loading Dumping Low Height', '15839282922068396399.pdf', 0, 250000, 1, 1),
(82, 'PRD00053', '789Q LoadHaul Dumper', 3, '15839283172110551521.png', '789Q LoadHaul Dumper', '1583928317136951710.pdf', 0, 150000, 1, 1),
(83, 'PRD00054', '890 CoalApp Dumper', 3, '15839283451175062462.png', '890 CoalApp Dumper', '15839283451643708007.pdf', 0, 200000, 1, 1),
(84, 'PRD00055', '900 Side Dumper', 3, '15839283811217951036.png', '900 Side Dumper', '1583928381931277629.pdf', 0, 250000, 1, 1),
(85, 'PRD00056', '920 Side Dumper', 3, '1583928415549675886.png', '920 Side Dumper', '1583928415945810438.pdf', 0, 200000, 1, 1),
(86, 'PRD00057', 'Drill Machine', 3, '158392844162955514.png', 'Drill Machine', '1583928441961802862.pdf', 0, 250000, 1, 1),
(87, 'PRD00058', 'Dump Truck', 4, '1583928479708697234.png', 'Dump Truck', '15839284791851034263.pdf', 0, 80000, 1, 1),
(88, 'PRD00059', '30D Croker Loader', 4, '15839285041523298243.png', '30D Croker Loader', '1583928504233259756.pdf', 0, 350000, 1, 1),
(89, 'PRD00060', '70E Croker Loader', 4, '1583928538599211773.png', '70E Croker Loader', '15839285381635714057.pdf', 0, 140000, 1, 1),
(90, 'PRD00061', '190 Holder Loader', 4, '15839285671889928049.png', '190 Holder Loader', '15839285671984856343.pdf', 0, 300000, 1, 1),
(91, 'PRD00062', 'FP 23 Segmented Loader', 4, '1583928593999449792.png', 'FP 23 Segmented Loader', '1583928593853268737.pdf', 0, 450000, 1, 1),
(92, 'PRD00063', 'FP 90 Segmented Loader', 4, '15839286292133567916.png', 'FP 90 Segmented Loader', '15839286291118172412.pdf', 0, 350000, 1, 1);

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
(11, 48, '0000000001', '2020-03-10', 1, 0),
(12, 75, '0000000002', '2020-03-10', 1, 0);

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
(69, 12, 'Wires', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category_name`) VALUES
(1, 'Energy Transmission'),
(2, 'Machinery Operating Equipments'),
(3, 'Coal Mining Applications'),
(4, 'Metal Mining Applications');

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
(268, 30, 'Castings'),
(269, 30, 'Sectional Metal'),
(270, 30, 'Stainless Steel'),
(271, 30, 'Steel'),
(272, 32, 'Castings'),
(273, 32, 'Locks'),
(274, 32, 'Minerals'),
(275, 32, 'Welding Wires'),
(276, 32, 'Wires'),
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
(337, 46, 'Chains'),
(338, 46, 'Copper'),
(339, 46, 'Corners'),
(340, 46, 'Welding Wires'),
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
(385, 59, 'Castings'),
(386, 59, 'Copper'),
(387, 59, 'Steel'),
(388, 59, 'Welding Wires'),
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
(416, 66, 'Castings'),
(417, 66, 'Chains'),
(418, 66, 'Copper'),
(419, 66, 'Steel'),
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
(430, 69, 'Castings'),
(431, 69, 'Chains'),
(432, 69, 'Copper'),
(433, 69, 'Steel'),
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
(444, 72, 'Chains'),
(445, 72, 'Copper'),
(446, 72, 'Corners'),
(447, 72, 'Engineered Plastics'),
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
(480, 80, 'Brass'),
(481, 80, 'Castings'),
(482, 80, 'Chains'),
(483, 80, 'Corners'),
(484, 80, 'Engineered Plastics'),
(485, 81, 'Copper'),
(486, 81, 'Corners'),
(487, 81, 'Engineered Plastics'),
(488, 81, 'Fittings'),
(489, 81, 'Keys'),
(490, 82, 'Brass'),
(491, 82, 'Castings'),
(492, 82, 'Chains'),
(493, 82, 'Copper'),
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
(523, 87, 'Brass'),
(524, 87, 'Chains'),
(525, 87, 'Corners'),
(526, 87, 'Engineered Plastics'),
(527, 88, 'Castings'),
(528, 88, 'Copper'),
(529, 88, 'Corners'),
(530, 88, 'Engineered Plastics'),
(531, 88, 'Fittings'),
(532, 88, 'Keys'),
(533, 89, 'Chains'),
(534, 89, 'Copper'),
(535, 89, 'Corners'),
(536, 89, 'Engineered Plastics'),
(537, 89, 'Fittings'),
(538, 90, 'Castings'),
(539, 90, 'Chains'),
(540, 90, 'Copper'),
(541, 90, 'Corners'),
(542, 91, 'Brass'),
(543, 91, 'Castings'),
(544, 91, 'Chains'),
(545, 91, 'Copper'),
(546, 91, 'Corners'),
(547, 91, 'Engineered Plastics'),
(548, 91, 'Fittings'),
(549, 91, 'Keys'),
(550, 92, 'Castings'),
(551, 92, 'Chains'),
(552, 92, 'Corners'),
(553, 92, 'Engineered Plastics'),
(554, 92, 'Fittings');

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
(1, 'RWM00001', 'Stainless Steel', 275, 1, 1),
(2, 'RWM00002', 'Brass', 490, 1, 1),
(3, 'RWM00003', 'Steel', 315, 1, 1),
(4, 'RWM00004', 'Copper', 470, 1, 1),
(5, 'RWM00005', 'Basic Plastics', 400, 1, 1),
(6, 'RWM00006', 'Engineered Plastics', 245, 1, 1),
(7, 'RWM00007', 'Minerals', 480, 1, 1),
(8, 'RWM00008', 'Fittings', 485, 1, 1),
(9, 'RWM00009', 'Castings', 375, 1, 1),
(10, 'RWM00010', 'Sectional Metal', 250, 1, 1),
(11, 'RWM00011', 'Welding Wires', 965, 1, 1),
(12, 'RWM00012', 'Corners', 475, 1, 1),
(13, 'RWM00013', 'Locks', 495, 1, 1),
(14, 'RWM00014', 'Keys', 495, 1, 1),
(15, 'RWM00015', 'Chains', 265, 1, 1),
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
  `added_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`recruitment_id`, `name`, `email_id`, `contact_no`, `ssc_per`, `ssc_ms`, `hsc_per`, `hsc_ms`, `diploma_per`, `d2d_ms`, `highest_qualification`, `specialization_field`, `work_experience_years`, `add_doc`, `interested_field`, `person_image`, `added_by`) VALUES
(1, 'Rahul Brahmbhatt', 'rahulbrahmbhatt13@gmail.com', '9033969150', '89', 'RahulBrahmbhatt_10th_Marksheet.pdf', '75', 'RahulBrahmbhatt_12th_Marksheet.pdf', 'NA', 'Not Available', 'B.Tech', 'Information Technology', 2, 'RahulBrahmbhatt_Resume.pdf', 'Data Science', 'avatar5.png', 2),
(2, 'Rahul Brahmbhatt', 'rahulbrahmbhatt13@gmail.com', '9033969150', '85', 'Not Available', '75', 'RahulBrahmbhatt_12th_Marksheet.pdf', 'NA', 'Not Available', 'M.Tech', 'Computer Engineering', 2, 'Not Available', 'Computer Network', 'avatar5.png', 2),
(3, 'Harsh', 'harshp1898@gmail.com', '9033969150', '90', 'Not Available', '90', 'Not Available', 'NA', 'Not Available', 'M.Tech', 'Computer Engineering', 5, 'logoNewC+.pdf', 'MS', 'avatar5.png', 0);

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
(3, 'USR00003', 'Harsh Patel', 'harshp1898@gmail.com', '31c4a6b131f3e4c1e6897bb98e2a2a0ee0543ba1', 'Inventory Manager', '9624702340', 'harsh.jpeg', 75000, 1);

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
(104, 182, 'Brass'),
(105, 182, 'Castings'),
(106, 182, 'Copper'),
(107, 182, 'Corners'),
(108, 182, 'Engineered Plastics'),
(109, 182, 'Fittings'),
(110, 182, 'Keys'),
(111, 182, 'Locks'),
(112, 182, 'Minerals'),
(113, 182, 'Sectional Metal'),
(114, 182, 'Steel'),
(115, 182, 'Welding Wires'),
(168, 181, 'Basic Plastics'),
(169, 181, 'Brass'),
(170, 181, 'Chains'),
(171, 181, 'Copper'),
(172, 181, 'Corners'),
(173, 181, 'Engineered Plastics'),
(174, 181, 'Fittings'),
(175, 181, 'Keys'),
(176, 181, 'Locks'),
(177, 181, 'Minerals'),
(178, 181, 'Sectional Metal'),
(179, 181, 'Stainless Steel'),
(180, 181, 'Steel'),
(181, 181, 'Welding Wires'),
(182, 183, 'Brass'),
(183, 183, 'Copper'),
(184, 183, 'Corners'),
(185, 183, 'Engineered Plastics'),
(186, 183, 'Wires');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

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
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`request_id`);

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
-- Indexes for table `returned_raw_materials`
--
ALTER TABLE `returned_raw_materials`
  ADD PRIMARY KEY (`returned_raw_mat_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=782;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `onsite_inquiry`
--
ALTER TABLE `onsite_inquiry`
  MODIFY `inquiry_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `products_manufactured`
--
ALTER TABLE `products_manufactured`
  MODIFY `product_manufacture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_manufactured_raw_mat_quantity`
--
ALTER TABLE `products_manufactured_raw_mat_quantity`
  MODIFY `unique_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_raw_mat`
--
ALTER TABLE `product_raw_mat`
  MODIFY `product_raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `raw_material_orders`
--
ALTER TABLE `raw_material_orders`
  MODIFY `raw_mat_order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `recruitment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `returned_raw_materials`
--
ALTER TABLE `returned_raw_materials`
  MODIFY `returned_raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `vendor_raw_materials`
--
ALTER TABLE `vendor_raw_materials`
  MODIFY `vendor_raw_mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
