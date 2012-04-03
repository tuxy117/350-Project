CUB SCOUT POPCORN SALES

Instructions:

Open Git Bash
cd to c:/xampp/htdocs
git clone git://github.com/tuxy117/350-Project.git

Open command line window
Go to mysql
source c:/xampp/htdocs/350-Project/cubscout.sql
SHOW tables;

Open web browser
Go to localhost/350-Project/scout/html/index.html
Play around and order some popcorn!

Go back to command line window to mysql prompt
Select * from buyer; (to see who ordered)
Select * from scout; (to see scouts supported)
Select * from customerorder (to see orders)
Select * from itemordered (to see items ordered)
Select * from product (to see products available - notice it's pre-populated!)

Thanks for using our Cub Scout Popcorn Sales website and database!