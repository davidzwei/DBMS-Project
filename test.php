<?php

//select from OK
$sql = "SELECT * FROM doctor where sex = 'm'";


//delete OK
$sql = " DELETE FROM patient WHERE patient.`pid` = '4' ";


//insert OK
$sql = "INSERT INTO patient (pid, pname, psex)
                values ('17','Amy', 'f') ";


//update OK
$sql = "UPDATE patient SET pname = 'Ann', psex = 'f' 
                      WHERE patient.`pid` = '4' ";



//in OK
$sql = "SELECT * FROM doctor
                WHERE dnum IN (SELECT department.id
                        FROM department
                        WHERE name = '小兒科' ) ";

//Not in OK
$sql = "SELECT * FROM doctor
                WHERE dnum NOT IN (SELECT department.id
                              FROM department
                              WHERE name = '眼科' ) ";
//Exist OK
$sql = "SELECT * FROM patient
          WHERE EXISTS
          (SELECT * FROM room WHERE room.pnum = patient.pid)";


//Not Exist OK
$sql = "SELECT * FROM patient
WHERE NOT EXISTS
(SELECT * FROM room WHERE room.pnum = patient.pid)" ;


//count OK
$sql = "SELECT COUNT(*) as 'count' FROM doctor ";

//sum  OK
$sql = "SELECT Sum(age) as 'sum' from doctor";

//max OK
$sql = "SELECT Max(age) as 'max' from doctor";

//min OK
$sql = "SELECT Min(age) as 'min' from doctor";

//avg OK
$sql = "SELECT Avg(age) as 'avg' from doctor";

//having  OK
$sql =  " SELECT COUNT(d.id), dnum
                  FROM doctor d
                  GROUP BY dnum
                  HAVING COUNT(d.id) > 1";

                  
?>