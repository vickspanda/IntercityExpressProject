

create database intercityexpress;


--create table Admin

create table admin (
    UID varchar(05) primary key , 
    name varchar(100),
    username text unique, 
    password text not null
);


create table passenger (
    pass_id serial primary key,
    name varchar(100) not null,
    address varchar(500) not null,
    state varchar(100) not null,
    district varchar(100) not null,
    pincode varchar(6) not null,
    date_of_birth date not null,
    mobile_no varchar(10) not null,
    email_id varchar(60) not null unique,
    gender varchar(20) not null,
    username varchar(30) not null,
    password text not null,
    sec_ques varchar(200) not null,
    sec_ans text not null
);

insert into passenger values(1,'Example','Example','Example','Example','111111','1111-11-11','1111111111','example@gmail.com','example','example',md5('example'),'example','example');

create table travel_agent (
    ta_uid serial primary key,
    ta_name varchar(100) not null,
    ta_res_address varchar(500) not null,
    ta_res_state varchar(100) not null,
    ta_res_district varchar(100) not null,
    ta_res_pincode varchar(6) not null,
    ta_date_of_birth date not null,
    ta_mobile_no varchar(10) not null,
    ta_email_id varchar(60) not null unique,
    ta_gender varchar(20) not null,
    ta_com_address varchar(500) not null,
    ta_com_state varchar(100) not null,
    ta_com_district varchar(100) not null,
    ta_com_pincode varchar(6) not null,
    ta_gov_id varchar(50) not null,
    ta_id varchar(20) not null,
    username varchar(30) not null,
    password text not null,
    status varchar(10)
);


create table emp_username_generator(
    emp_id serial primary key,
    counter int
);

insert into emp_username_generator(counter) values (1001);

create table employee (
    emp_uid serial primary key,
    emp_name varchar(100) not null,
    emp_res_address varchar(500) not null,
    emp_res_state varchar(100) not null,
    emp_res_district varchar(100) not null,
    emp_res_pincode varchar(6) not null,
    emp_date_of_birth date not null,
    emp_mobile_no varchar(10) not null,
    emp_email_id varchar(60) not null unique,
    emp_gender varchar(20) not null,
    emp_qual varchar(50) not null,
    emp_date_of_joining date not null,
    emp_gov_id varchar(50) not null,
    emp_id varchar(20) not null,
    emp_des varchar(30) not null,
    username varchar(30) not null,
    password text not null
);
