CREATE TABLE IF NOT EXISTS customer_details(
  customer_details_id int(11) NOT NULL,
  customer_id int(11) NOT NULL,
  customer_name varchar(250) NOT NULL,
  customer_password BINARY(64) NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


INSERT INTO 'customer_details' ('customer_details_id', 'customer_id', 'customer_name','customer_password') VALUES(@customer_details_id,@customer_id,@customer_name,HASHBYTES('SHA2_512', @employee_password))

ALTER TABLE 'customer_details'
  ADD PRIMARY KEY ('customer_details_id');


ALTER TABLE 'customer_details'
  MODIFY 'customer_details_id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;


CSV file:

customerdetails.csv


1, 101, 'vignesh','123'
2, 102, 'Aditya','123'
3, 103, 'kumar','123'
4, 104, 'Sabari','123'
5, 105, 'Venkat','123'
6, 106, 'Sharma','123'
7, 107, 'Rohit','123'
8, 108, 'Surya','123'
9, 109, 'Vijay','123'
10, 110, 'Harish','123'
