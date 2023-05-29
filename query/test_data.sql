/* author: ijpark */

insert into p_notice
values (1, '공지사항1', '자리이동 및 소란스런 행위를 하시면 퇴실조치합니다.');
insert into p_room
values (‘1’, ‘1 room’, 50, 50);

insert into p_room
values ('2', '2 room', 50, 50);

insert into p_seat
values (1, 1, 20, 10, 20, 5);

insert into p_seat
values (2, 1, 20, 10, 20, 15);

insert into p_seat
values (3, 1, 20, 10, 20, 25);

insert into p_seat
values (4, 1, 20, 10, 20, 35);

insert into p_seat
values (5, 1, 20, 10, 20, 45);

insert into p_seat
values (6, 1, 20, 10, 40, 5);

insert into p_seat
values (7, 1, 20, 10, 40, 15);

insert into p_seat
values (8, 1, 20, 10, 40, 25);

insert into p_seat
values (9, 1, 20, 10, 40, 35);

insert into p_seat
values (10, 1, 20, 10, 40, 45);

insert into p_seat
values (11, 2, 20, 10, 20, 5);

insert into p_seat
values (12, 2, 20, 10, 20, 15);

insert into p_seat
values (13, 2, 20, 10, 20, 25);

insert into p_seat
values (14, 2, 20, 10, 20, 35);

insert into p_seat
values (15, 2, 20, 10, 20, 45);

insert into p_seat
values (16, 2, 20, 10, 40, 5);

insert into p_seat
values (17, 2, 20, 10, 40, 15);

insert into p_seat
values (18, 2, 20, 10, 40, 25);

insert into p_seat
values (19, 2, 20, 10, 40, 35);

insert into p_seat
values (20, 2, 20, 10, 40, 45);

insert into p_ticket
values (1, '시간권', 2000, 120);

insert into p_ticket
values (2, '시간권', 4000, 240);

insert into p_ticket
values (3, '시간권', 6000, 360);

insert into p_ticket
values (4, '시간권', 8000, 480);

insert into p_ticket
values (5, '고정석', 50000, 10080);

insert into p_ticket
values (6, '고정석', 100000, 20160);

insert into p_ticket
values (7, '고정석', 150000, 30240);

insert into p_ticket
values (8, '고정석', 210000, 43200);

insert into p_user
values (1, '01012345678', '1234', 'Carmen', null);

insert into p_user
values (2, '01022345678', '5678', 'Drew', null);

insert into p_user
values (3, '01032345678', '9101', 'Gordon', null);

insert into p_user
values (4, '01042345678', '1112', 'Aiden', null);

insert into p_user
values (5, '01052345678', '1314', 'Robin', null);

insert into p_reserve
values (1, 1, 1, 1, 1, ‘2023-05-28 19:31:17’
, ‘2023-05-28 21:31:17);

insert into p_reserve
values (2, 2, 1, 2, 3, ‘2023-05-28 19:32:03’
, ‘2023-05-29 01:32:03’);

insert into p_reserve
values (3, 3, 2, 6, 5, ‘2023-05-28 19:33:46’
, ‘2023-06-04 19:33:46’);

insert into p_reserve
values (4, 4, 1, 4, 8, ‘2023-05-28 19:34:06’, 
‘2023-06-27 19:34:06’);

insert into p_reserve
values (5, 5, 2, 7, 2, ‘2023-05-28 19:34:26’
, ‘2023-05-28 23:34:26’);

insert into p_user_reserve
values (1, 1);

insert into p_user_reserve
values (2, 2);

insert into p_user_reserve
values (3, 3);

insert into p_user_reserve
values (4, 4);

insert into p_user_reserve
values (5, 5);

insert into p_payment
values (1, 1, 1, 2000, '2023-05-28 19:31:17', 'card');

insert into p_payment
values (2, 2, 3, 6000, '2023-05-28 19:32:03', 'cash');

insert into p_payment
values (3, 3, 6, 100000, '2023-05-28 19:33:46', 'card');

insert into p_payment
values (4, 4, 8, 210000, '2023-05-28 19:34:06', 'cash');
