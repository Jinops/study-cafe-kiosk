/* author: sbbae, yhpark */

create table P_NOTICE(
Notice_id int auto_increment primary key,
Title varchar(20) null,
Content text null
);

create table P_USER(
User_id int auto_increment primary key,
Phone char(11) not null,
`Password` varchar(4) not null,
`Name` varchar(10) not null,
Total_payment int null default 0,
);

create table P_TICKET(
Ticket_id int auto_increment primary key,
`Type` varchar(20) not null,
Price int not null,
Duration_min int not null,
constraint type_check check(Type in('basic', 'fixed'))
);

create table P_ROOM(
Room_id int auto_increment primary key,
`Name` varchar(20) not null,
Width int not null,
Height int not null,
constraint Width_ck check(Width>0 and Width<=100),
constraint Height_ck check(Height>0 and Height<=100)
);

create table P_SEAT( 
Seat_id int auto_increment primary key,
Room_id int not null,
Width int not null,
Height int not null,
X int not null,
Y int not null,
constraint seat_FK foreign key(Room_id)
references P_ROOM(Room_Id),
constraint X_ck check(X>=0 and X<=100),
constraint Y_ck check(Y>=0 and Y<=100)
);

create table P_RESERVE(
Reserve_Id int auto_increment primary key,
User_id int not null,
Room_id int not null,
Seat_id int not null,
Ticket_id int not null,
Start_time datetime not null,
End_time datetime null,
constraint res_userFK foreign key(User_id)
   references P_USER(User_id),
constraint res_seatFK foreign key(Room_id)
   references P_ROOM(Room_id),
constraint res_ticketFK foreign key(Ticket_id)
   references P_TICKET(Ticket_id)
);

create table P_USER_RESERVE(
User_id int auto_increment not null,
Reserve_id int not null,
constraint u_r_userFK foreign key(User_id)
   references P_USER(User_id),
constraint u_r_resFK foreign key(Reserve_id)
   references P_RESERVE(Reserve_id)
);

create table P_PAYMENT(
Payment_id int auto_increment primary key,
User_id int not null,
Ticket_id int not null,
Price int not null,
Time timestamp not null,
Type varchar(10) not null,
constraint p_userFK foreign key(User_id)
   references P_USER(User_id),
constraint p_ticketFK foreign key(Ticket_id)
   references P_TICKET(Ticket_id),
constraint payment_type_check check(Type in('card', 'cash'))
);

