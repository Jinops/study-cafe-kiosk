/* author: sbbae, yhpark */

create table p_notice(
notice_id int auto_increment primary key,
title varchar(20) null,
content text null
);

create table p_room(
room_id int auto_increment primary key,
r_name varchar(20) not null,
r_width int not null,
r_hight int not null
);




create table p_seat( 
seat_id int auto_increment primary key,
room_id int not null,
s_width int not null,
s_hight int not null,
x int not null,
y int not null,
constraint seat_FK foreign key(room_id)
references p_room(room_id)
);


create table p_user(
user_id int auto_increment primary key,
phone char(11) not null,
password varchar(4) not null,
name varchar(10) not null,
total_payment varchar(30) not null
);





create table p_reserve(
res_id int auto_increment primary key,
user_id int not null,
room_id int not null,
seat_id int not null,
ticket_id int not null,
start_time datetime not null,
end_time datetime null,
constraint res_userFK foreign key(user_id)
   references p_user(user_id),
constraint res_seatFK foreign key(room_id)
   references p_room(room_id),
constraint res_ticketFK foreign key(ticket_id)
   references p_ticket(ticket_id)
);


create table p_user_reserve(
user_id int auto_increment not null,
res_id int not null,
constraint u_r_userFK foreign key(user_id)
   references p_user(user_id),
constraint u_r_resFK foreign key(res_id)
   references p_reserve(res_id)
);


create table p_payment(
payment_id int auto_increment primary key,
user_id int not null,
ticket_id int not null,
payment_price int not null,
payment_time timestamp not null,
payment_type varchar(10) not null,
constraint p_userFK foreign key(user_id)
   references p_user(user_id),
constraint p_ticketFK foreign key(ticket_id)
   references p_ticket(ticket_id),
constraint payment_type_check check(payment_type in('신용카드', '현금'))
);


create table p_ticket(
ticket_id int auto_increment primary key,
ticket_type varchar(20) not null,
ticket_price int not null,
duration_min int not null
);