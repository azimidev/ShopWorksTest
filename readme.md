# Installation

1. Rename .env.example file  to .`env` and set `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
2. Swicht to project directory.
3. Run in your command line:  `composer install`
4. Run: `php artisan key:generate`
5. Run: `php artisan migrate`
5. Run: `php artisan db:seed`
6. Run: `npm install`
7. Run: `npm run dev`
9. Run: `php artisan serve` and visit http://127.0.0.1:8000.

> Calculation overlapping time from array is somethign I haven't done before and it takes a lot of thinking but in Calculate Class I managed to write some methods with deep algorithm to get the minutes alone with some comments explaining.

# The Actual Task

## ShopWorks Code Test
---
We have staff rota shift data stored in the database as attached. We have included the data for one shop for one week. 
*(If staff ID is 0 or null, the shift can be ignored or If shiftype is not “shift” then it can be ignored)*

---
## You should:
> Use laravel. Use JS or PHP as much as you prefer, but use clean code and good front end presentation to show us the ability of your code.
Please ensure your code is easily readable.
Design your solution with good practices based on your experience.
Reusable code, separation of concerns, Unit tests, classes, repository, namespacing etc. wherever possible.

## Output:
> Load the data from the database
Create a view to display the output as follows....
Display the shift times per shift (start and end times) in a table, (days in columns, staff in rows)
At the bottom of each day, Show the total number of hours/minutes worked on that day.

### Important part:
> Staff get paid a bonus for working alone in the shop.
Underneath that totals row, we need to see for each day, how many minutes of the day are being worked by staff members *alone in the shop*.
For example, a value of "45" under a day would represent that there are a total of 45 minutes in that day where there is a member of staff working alone in the shop.

## Delivery:
> upload it to your github account, or zip up the application and send for for us to download and test, along with any installation instructions.


## Database:

```sql
--
-- Table structure for table `rota_slot_staff`
--

CREATE TABLE IF NOT EXISTS `rota_slot_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotaid` int(11) NOT NULL,
  `daynumber` tinyint(4) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `slottype` varchar(20) NOT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `workhours` float(4,2) NOT NULL,
  `premiumminutes` int(4) DEFAULT NULL,
  `roletypeid` int(11) DEFAULT NULL,
  `freeminutes` int(4) DEFAULT NULL,
  `seniorcashierminutes` int(4) DEFAULT NULL,
  `splitshifttimes` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rotaid` (`rotaid`,`staffid`),
  KEY `daynumber` (`daynumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=283626 ;

--
-- Dumping data for table `rota_slot_staff`
--

INSERT INTO `rota_slot_staff` (`id`, `rotaid`, `daynumber`, `staffid`, `slottype`, `starttime`, `endtime`, `workhours`, `premiumminutes`, `roletypeid`, `freeminutes`, `seniorcashierminutes`, `splitshifttimes`) VALUES
(44369, 332, 6, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44370, 332, 6, NULL, 'shift', '15:00:00', '23:00:00', 8.00, 0, 14, 0, 0, ''),
(44371, 332, 6, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44372, 332, 6, NULL, 'shift', '17:00:00', '21:00:00', 4.00, 0, 11, 0, 0, '--:--*--:--'),
(44359, 332, 5, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44360, 332, 5, NULL, 'shift', '11:00:00', '20:00:00', 9.00, 0, 11, 0, 0, ''),
(44361, 332, 5, NULL, 'shift', '11:00:00', '20:00:00', 9.00, 0, 11, 0, 0, ''),
(44358, 332, 5, NULL, 'shift', '12:00:00', '20:00:00', 8.00, 0, 14, 0, 0, ''),
(44350, 332, 4, NULL, 'shift', '11:00:00', '20:00:00', 9.00, 0, 11, 0, 0, ''),
(44318, 332, 0, NULL, 'shift', '11:00:00', '20:00:00', 9.00, 0, 11, 0, 0, ''),
(44319, 332, 0, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44325, 332, 1, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44326, 332, 1, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44327, 332, 1, NULL, 'shift', '11:00:00', '20:00:00', 9.00, 0, 11, 0, 0, ''),
(44328, 332, 1, NULL, 'shift', '19:00:00', '01:00:00', 6.00, 0, 14, 0, 0, ''),
(44333, 332, 2, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44339, 332, 3, NULL, 'shift', '17:00:00', '00:00:00', 7.00, 0, 11, 0, 0, ''),
(44340, 332, 3, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44341, 332, 3, NULL, 'shift', '19:00:00', '02:00:00', 7.00, 0, 14, 0, 0, '--:--*--:--'),
(44347, 332, 4, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44348, 332, 4, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 11, 0, 0, ''),
(44349, 332, 4, NULL, 'shift', '13:00:00', '20:00:00', 7.00, 0, 11, 0, 0, '--:--*--:--'),
(44317, 332, 0, NULL, 'shift', '19:00:00', '03:00:00', 8.00, 0, 14, 0, 0, ''),
(44373, 332, 6, 3, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44381, 332, 0, 3, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44391, 332, 1, 3, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44362, 332, 5, 3, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44351, 332, 4, 3, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44334, 332, 2, 3, 'shift', '11:00:00', '20:00:00', 9.00, 0, 2, 0, 0, '--:--*--:--'),
(44342, 332, 3, 3, 'shift', '11:00:00', '20:00:00', 9.00, 0, 2, 0, 0, '--:--*--:--'),
(44411, 332, 3, 4, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44374, 332, 6, 4, 'shift', '12:00:00', '20:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44384, 332, 0, 4, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44393, 332, 1, 4, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44402, 332, 2, 4, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44363, 332, 5, 4, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44352, 332, 4, 4, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44410, 332, 3, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44383, 332, 0, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44392, 332, 1, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44401, 332, 2, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44425, 332, 5, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44434, 332, 6, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44418, 332, 4, 20, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44419, 332, 4, 23, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44364, 332, 5, 23, 'shift', '11:00:00', '20:00:00', 9.00, 0, 2, 0, 0, '--:--*--:--'),
(44320, 332, 0, 23, 'shift', '11:05:00', '20:00:00', 8.92, 0, 2, 0, 0, '--:--*--:--'),
(44329, 332, 1, 23, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44335, 332, 2, 23, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44343, 332, 3, 23, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44435, 332, 6, 23, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44407, 332, 3, 24, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44378, 332, 0, 24, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44387, 332, 1, 24, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44397, 332, 2, 24, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44430, 332, 6, 24, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44422, 332, 5, 24, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44415, 332, 4, 24, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44412, 332, 3, 32, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44426, 332, 5, 32, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44353, 332, 4, 32, 'shift', '11:00:00', '20:00:00', 9.00, 0, 2, 0, 0, '--:--*--:--'),
(44436, 332, 6, 32, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44321, 332, 0, 32, 'shift', '11:00:00', '17:00:00', 6.00, 0, 2, 0, 0, '--:--*--:--'),
(44330, 332, 1, 32, 'shift', '11:00:00', '19:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44336, 332, 2, 32, 'shift', '11:00:00', '20:00:00', 9.00, 0, 2, 0, 0, '--:--*--:--'),
(44409, 332, 3, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44380, 332, 0, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44389, 332, 1, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44399, 332, 2, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44432, 332, 6, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44424, 332, 5, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44417, 332, 4, 52, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44375, 332, 6, 53, 'shift', '13:00:00', '21:30:00', 8.50, 0, 2, 0, 0, '--:--*--:--'),
(44390, 332, 1, 53, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44400, 332, 2, 53, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44365, 332, 5, 53, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44354, 332, 4, 53, 'shift', '20:00:00', '03:00:00', 7.00, 0, 2, 0, 0, '--:--*--:--'),
(44322, 332, 0, 53, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44344, 332, 3, 53, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44382, 332, 0, 54, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44366, 332, 5, 54, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44433, 332, 6, 54, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44355, 332, 4, 54, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44331, 332, 1, 54, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44337, 332, 2, 54, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44345, 332, 3, 54, 'shift', '13:00:00', '20:00:00', 7.00, 0, 2, 0, 0, '--:--*--:--'),
(44421, 332, 5, 55, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44377, 332, 0, 55, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44386, 332, 1, 55, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44396, 332, 2, 55, 'shift', '20:00:00', '01:00:00', 5.00, 0, 2, 0, 0, '--:--*--:--'),
(44405, 332, 3, 55, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44428, 332, 6, 55, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44414, 332, 4, 55, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44406, 332, 3, 56, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44367, 332, 5, 56, 'shift', '11:00:00', '21:00:00', 10.00, 0, 2, 0, 0, '--:--*--:--'),
(44429, 332, 6, 56, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44356, 332, 4, 56, 'shift', '12:00:00', '20:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44323, 332, 0, 56, 'shift', '13:00:00', '20:00:00', 7.00, 0, 2, 0, 0, '--:--*--:--'),
(44332, 332, 1, 56, 'shift', '13:00:00', '20:00:00', 7.00, 0, 2, 0, 0, '--:--*--:--'),
(44338, 332, 2, 56, 'shift', '13:00:00', '20:00:00', 7.00, 0, 2, 0, 0, '--:--*--:--'),
(44376, 332, 6, 59, 'shift', '19:00:00', '20:00:00', 1.00, 0, 2, 0, 0, '--:--*--:--'),
(44394, 332, 1, 59, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44403, 332, 2, 59, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44368, 332, 5, 59, 'shift', '19:00:00', '01:00:00', 6.00, 0, 2, 0, 0, '--:--*--:--'),
(44357, 332, 4, 59, 'shift', '19:00:00', '01:00:00', 6.00, 0, 2, 0, 0, '--:--*--:--'),
(44324, 332, 0, 59, 'shift', '19:00:00', '03:00:00', 8.00, 0, 2, 0, 0, '--:--*--:--'),
(44346, 332, 3, 59, 'shift', '11:00:00', '20:00:00', 9.00, 0, 2, 0, 0, '--:--*--:--'),
(44408, 332, 3, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44379, 332, 0, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44388, 332, 1, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44398, 332, 2, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44431, 332, 6, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44423, 332, 5, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44416, 332, 4, 67, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44420, 332, 4, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44413, 332, 3, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44385, 332, 0, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44395, 332, 1, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44404, 332, 2, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44427, 332, 5, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL),
(44437, 332, 6, 68, 'dayoff', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL);
```
