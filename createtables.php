<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
function clearTable($dbo,$tabName){
    $c="delete from :tabname";
    $s=$dbo->conn->prepare($c);
    try{
        $s->execute([":tabname"=>$tabName]);
    }
    catch(PDOException $oo){
        
        }
}
$dbo=new Database();

#student_details

$c="create table student_details
(
id int auto_increment primary key,
Roll_No varchar(20) unique,
Name varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>student details created");
}
catch(PDOException $o){
echo("<br>student details not created");
}

#course_details

$c="create table course_details
(
id int auto_increment primary key,
code varchar(20) unique,
title varchar(50),
credit int
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>course details created");
}
catch(PDOException $o){
echo("<br>course details not created");
}

#faculty_details

$c="create table faculty_details
(
id int auto_increment primary key,
user_name varchar(20) unique,
name varchar(100),
password varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>faculty details created");
}
catch(PDOException $o){
echo("<br>faculty details not created");
}

#session_details

$c="create table session_details
(
id int auto_increment primary key,
year int,
term varchar(50),
unique(year,term)
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>session details created");
}
catch(PDOException $o){
echo("<br>session details not created");
}

#course_registration

$c="create table course_registration
(
student_id int,
course_id int,
session_id int,
primary key(student_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>course registration created");
}
catch(PDOException $o){
echo("<br>course registration not created");
}

#course_allotment

$c="create table course_allotment
(
faculty_id int,
course_id int,
session_id int,
primary key(faculty_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>course allotment created");
}
catch(PDOException $o){
echo("<br>course allotment not created");
}

#attendance_details

$c="create table attendance_details
(
faculty_id int,
course_id int,
session_id int,
student_id int,
on_date date,
status varchar(10),
primary key(faculty_id,course_id,session_id,student_id,on_date)
)";
$s=$dbo->conn->prepare($c);
try{
    $s->execute();
    echo("<br>attendance details created");
}
catch(PDOException $o){
echo("<br>attendance details not created");
}

#insert student_details

$c="insert into student_details
(id,Roll_No,Name)
values
(1,'23BCS001','N01'),
(2,'23BCS002','N02'),
(3,'23BCS003','N03'),
(4,'23BCS004','N04'),
(5,'23BCS005','N05'),
(6,'23BCS006','N06'),
(7,'23BCS007','N07'),
(8,'23BCS008','N08'),
(9,'23BCS009','N09'),
(10,'23BCS010','N10'),
(11,'23BCS011','N11'),
(12,'23BCS012','N12'),
(13,'23BCS013','N13'),
(14,'23BCS014','N14'),
(15,'23BCS015','N15')";
$s=$dbo->conn->prepare($c);
try{
  $s->execute();
}
catch(PDOException $o){
 echo("<br>duplicate entry");
}

#insert  faculty_details

$c="insert into faculty_details
(id,user_name,name,password)
values
(1,'F01','FACULTY1','P01'),
(2,'F02','FACULTY2','P02'),
(3,'F03','FACULTY3','P03'),
(4,'F04','FACULTY4','P04'),
(5,'F05','FACULTY5','P05'),
(6,'F06','FACULTY6','P06')";
$s=$dbo->conn->prepare($c);
try{
  $s->execute();
}
catch(PDOException $o){
 echo("<br>duplicate entry");
}

#insert session_details

$c="insert into session_details
(id,year,term)
values
(1,2025,'odd'),
(2,2025,'even')";
$s=$dbo->conn->prepare($c);
try{
  $s->execute();
}
catch(PDOException $o){
 echo("<br>duplicate entry");
}

#insert course_details

$c="insert into course_details
(id,code,title,credit)
values
(1,'CS01','COMP1',3),
(2,'CS02','COMP2',3),
(3,'CS03','COMP3',3),
(4,'CS04','COMP4',3),
(5,'CS05','COMP5',2),
(6,'CS06','COMP6',4)";
$s=$dbo->conn->prepare($c);
try{
 $s->execute();
}
catch(PDOException $o){
 echo("<br>error");
}


#insert course_registration

#iterate over all 15 studens
#for each of them choose 3 courses

clearTable($dbo,"course_registration");
$c="insert into course_registration
(student_id,course_id,session_id)
values
(:sid,:cid,:sessid)";
$s=$dbo->conn->prepare($c);
for($i=1;$i<=15;$i++){
    for($j=1;$j<=3;$j++){

        $cid=rand(1,6);
  # insert selected course into course_registration
  #session 1 and student_id $i
        try{
            $s->execute([":sid"=>$i,":cid"=>$cid,"sessid"=>1]);
        }
        catch(PDOException $pe){
             
           }
        #repeate for session 2
        $cid=rand(1,6);
  # insert selected course into course_registration
  #session 2 and student_id $i
        try{
            $s->execute([":sid"=>$i,":cid"=>$cid,"sessid"=>2]);
        }
        catch(PDOException $pe){
             
           }
    }
}

#insert course_allotment

#iterate over all 6 teachers
#for each choose 2

clearTable($dbo,"course_allotment");
$c="insert into course_allotment
(faculty_id,course_id,session_id)
values
(:fid,:cid,:sessid)";
$s=$dbo->conn->prepare($c);
for($i=1;$i<=6;$i++){
    for($j=1;$j<=2;$j++){
        $cid=rand(1,6);
  # insert selected course into course_allotment
  #session 1 and student_id $i
        try{
            $s->execute([":fid"=>$i,":cid"=>$cid,"sessid"=>1]);
        }
        catch(PDOException $pe){
             
           }
        #repeate for session 2
        $cid=rand(1,6);
  # insert selected course into course_registration
  #session 2 and student_id $i
        try{
            $s->execute([":fid"=>$i,":cid"=>$cid,"sessid"=>2]);
        }
        catch(PDOException $pe){
             
           }
    }
}
?>