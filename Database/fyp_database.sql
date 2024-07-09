-- Table structure for table `journal_list`

CREATE TABLE `journal_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1, 
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_list`
--

INSERT INTO `journal_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_create`, `date_update`) VALUES
(1, 'Cash', 'Cash', 1, 0, '2024-6-23 20:48:00', NULL),
(2, 'Cash Equivalent', 'Cash Equivalent', 1, 0, '2024-6-23 20:48:00', NULL),
(3, 'Account Receivable', 'Money owned to the company by customer for goods or service delivered', 1, 0, '2024-6-23 20:48:00', NULL),
(4, 'Allowance for Doubtful Accounts', 'Estimated uncollectible receivables', 1, 0, '2024-6-23 20:48:00', NULL),
(5, 'Inventory', 'Good available for sale or raw materials', 1, 0, '2024-6-23 20:48:00', NULL),
(6, 'Prepaid Expenses', 'Payment made for good or service to be received in the future', 1, 0, '2024-6-23 20:48:00', NULL),
(7, 'Short-term Investment','Investment expected to be converted to cash within a year', 1, 0, '2024-6-23 20:48:00', NULL),
(8, 'Others Current Asset','Miscellaneous short-term assets not classified elsewhere', 1, 0, '2024-6-23 20:48:00', NULL),
(9, 'Property, Plant and Equipment (PP&E)','Long-term physical asset  such as building, machinery and land', 1, 0, '2024-6-23 20:48:00', NULL),
(10, 'Accumated Deprecaition','Total depreciation of PP&E asset to date', 1, 0, '2024-6-23 20:48:00', NULL),
(11, 'Intangible Asset','Non-Physical asset like intellectual property', 1, 0, '2024-6-23 20:48:00', NULL),
(12, 'Goodwill','Value arising from the acquisition of another business', 1, 0, '2024-6-23 20:48:00', NULL),
(13, 'Patent','Exclusive rights granted for inventory', 1, 0, '2024-6-23 20:48:00', NULL),
(14, 'Trademarks','Distinctive symbols or logos associated with the company', 1, 0, '2024-6-23 20:48:00', NULL),
(15, 'Copyrights','Rights to artistic and literary works', 1, 0, '2024-6-23 20:48:00', NULL),
(16, 'Accumated Amortization','Total amortization of intangible assets to date', 1, 0, '2024-6-23 20:48:00', NULL),
(17, 'Long term Investment','Investment in securities or other asset expected to be held for more then a year', 1, 0, '2024-6-23 20:48:00', NULL),
(18, 'Others Non-Current Asset','Long-term asset not classified elsewhere', 1, 0, '2024-6-23 20:48:00', NULL),
(19, 'Accounts Payable','Total amortization of intangible assets to date', 1, 0, '2024-6-23 20:48:00', NULL),
(20, 'Short-term Debt','Borrowing that need to be repaid within a year', 1, 0, '2024-6-23 20:48:00', NULL),
(21, 'Accrued Liability','Expenses that have been incurred but not yet paid', 1, 0, '2024-6-23 20:48:00', NULL),
(22, 'Unearned Revenue','Money recieved for goods or services not yeat delivered', 1, 0, '2024-6-23 20:48:00', NULL),
(23, 'Current Portion of Long term Debt','Part of long-term debt due within the next year', 1, 0, '2024-6-23 20:48:00', NULL),
(24, 'Long-term Debt','Borrowing that are due after more than 1 year', 1, 0, '2024-6-23 20:48:00', NULL),
(25, 'Deferred Tax Liabilities','Taxes owned but not yeat payable, often due to timing differences in recognizing income', 1, 0, '2024-6-23 20:48:00', NULL),
(26, 'Pension Liabilities','Obligations to pay future employee pension', 1, 0, '2024-6-23 20:48:00', NULL),
(27, 'Lease Obligations','Long-term lease commitments', 1, 0, '2024-6-23 20:48:00', NULL),
(28, 'Others Non-Current Liabilities','Long-term obligation not classified elsewhere', 1, 0, '2024-6-23 20:48:00', NULL),
(29, 'Common stock','Equity ownership in the company, representing claims on part of the company assets and earnings', 1, 0, '2024-6-23 20:48:00', NULL),
(30, 'Preferred stock','A class of ownership with preferential right over common stock, usually regarding dividends and assets', 1, 0, '2024-6-23 20:48:00', NULL),
(31, 'Addictional Paid-in capital','Capital received from investor in excess of the par value of the stock', 1, 0, '2024-6-23 20:48:00', NULL),
(32, 'Retained Earning','Accumated net income retained in the company rather than paid out as dividends', 1, 0, '2024-6-23 20:48:00', NULL),
(33, 'Trasury Stock','Long-term lease commitments', 1, 0, '2024-6-23 20:48:00', NULL),
(34, 'Accumulated others comprehensive income','Aggregated other comprehensive income items, like foreign currency translation adjustments or unrealized gains/losses on investments.', 1, 0, '2024-6-23 20:48:00', NULL);

--
-- Table structure for table `chart_account_list`
--

CREATE TABLE `chart_account_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Debit, 2= Credit',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes ',
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_account_list`
--

INSERT INTO `chart_account_list` (`id`, `name`, `description`, `type`, `status`, `delete_flag`, `date_create`, `date_update`) VALUES
(1, 'Assets', 'The cash, inventory, and other resources you owned.', 1, 1, 0, '2024-6-23 20:48:00', NULL),
(2, 'Revenue', 'Cash coming into your business through sales and other types of payments', 2, 1, 0,'2024-6-23 20:48:00', NULL),
(3, 'Expenses', 'The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.', 1, 1, 0, '2024-6-23 20:48:00', NULL),
(4, 'Liabilities', 'The money you still owe on loans, debts, and other obligations.', 2, 1, 0, '2024-6-23 20:48:00', NULL),
(5, 'Equity', 'How much is remaining after you subtract liabilities from assets.', 2, 1, 0, '2024-6-23 20:48:00', NULL),
(6, 'Dividend', 'Form of income that shareholders of corporations receive for each share of stock that they hold.', 1, 1, 0, '2024-6-23 20:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `journal_date` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_entries`
--

INSERT INTO `journal_entries` (`id`, `code`, `journal_date`, `description`, `user_id`, `date_create`, `date_update`) VALUES


-- ----------------------------------------------------------------------------
-- Table structure for table `journal_items`
--

CREATE TABLE `journal_items` (
  `journal_id` int(30) NOT NULL,
  `account_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_items`
--

INSERT INTO `journal_items` (`journal_id`, `account_id`, `group_id`, `amount`, `date_create`) VALUES
(3, 1, 1, 15000, '2024-6-23 20:48:00');


--
-- Table structure for table `setting_info`
--

CREATE TABLE `setting_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_info`
--

INSERT INTO `setting_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Fly Fly Fly Money Bookkeeping'),
(6, 'short_name', 'Fly Fly Money Bookkeeping'),
(13, 'user_avatar', 'uploads/avatar-1.png'),
(15, 'content', 'Array'),
(16, 'email', 'yearf9730@gmail.com'),
(17, 'contact', '011-111-1111');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_add`, `date_update`) VALUES
(1, 'Admin', NULL, 'Admin', 'fypadmin', '0192023a7bbd73250516f069df18b500', NULL, NULL, 1, 1,'2024-6-23 20:48:00', '2024-6-23 20:48:00');

--
-- Indexes for table `journal_list`
--
ALTER TABLE `journal_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_account_list`
--
ALTER TABLE `chart_account_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `journal_items`
--
ALTER TABLE `journal_items`
  ADD KEY `journal_id` (`journal_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `setting_info`
--
ALTER TABLE `setting_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal_list`
--
ALTER TABLE `journal_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `chart_account_list`
--
ALTER TABLE `chart_account_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting_info`
--
ALTER TABLE `setting_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD CONSTRAINT `journal_entries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_admin` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `journal_items`
--
ALTER TABLE `journal_items`
  ADD CONSTRAINT `journal_items_ibfk_1` FOREIGN KEY (`journal_id`) REFERENCES `journal_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `journal_items_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `journal_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `journal_items_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `chart_account_list` (`id`) ON DELETE CASCADE;
COMMIT;
