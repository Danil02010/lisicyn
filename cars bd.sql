
CREATE TABLE `auto_models` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `mark_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `auto_marks` (
  `mark_id` int(11) NOT NULL,
  `mark_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;