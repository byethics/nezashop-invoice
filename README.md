# nezashop-invoice
NEZA SUPERMARKET is one of the supermarket which is located in Eastern Province, Kayonza
District, Mukarange Sector.
NEZA SUPERMARKET wants a website application to manage the invoice because they are still
using file system to record the product purchased by each customer and keep invoice; thus they have
a problem of non-efficient security and integrity of invoice’s NEZA SUPERMARKET.
They hired a database designer who designed for them the database model that can be used to get the
invoice. The designed database is shown below:
Database name: Invoice (Use PHP – MYSQL)
Tables: (Use PHP – MYSQL)
- Customers ( customerid int(11) primary key auto_increment, customername text NOT
NULL)
- Products ( id int(11) primary key auto_increment, productsoldnumber varchar(20)
NOT NULL, item text NOT NULL, quantity int(11) NOT NULL, unit int(11) NOT
NULL,total int(11) NOT NULL, date date NOT NULL, customerid int(11) )
- Users(userId int primary key auto_increment, Username varchar(30),password
varchar(30))
Here, the trainees are requested to create an administrator account (Login and logout) that must
perform the following tasks:
- Inserting into your database the products purchased by each client/customer
- Generating an invoice for the products purchased by each customer.
- Printing an invoice for the products purchased by each customer.
