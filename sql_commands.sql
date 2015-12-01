
insert into bids(BidderID,ProductID,CurrentPrice) values(2,3,4);


#for putting products up for auction till next day

delimiter //
create trigger producttoauction before insert on products										//trigger producttoauction
for each row
begin
set a=sysdate()+1;
if (new.StartingPrice>0) then
insert into auction(ProductID,EndTime,CurrentPrice) values(new.ProductID,a,new.StartingPrice);
end;


#for increasing bid amount by user





create trigger bidcheck before update on auction 											// trigger bidcheck
for each row
begin
declare b int;
declare s int;
select sum(CurrentPrice) into s from auction where BuyerID=new.BuyerID and status='NOT OVER' and ProductID<>new.ProductID;
select Balance into b from account where UserID=new.BuyerID ;
if (b<=new.CurrentPrice+s)	then
CALL raise_application_error(1234, 'Balance Too Low');
end;

create trigger checkuser(dat date,dno int) before update on users										//trigger checkuser
for each row
begin
set c=0;
select EmailAddress into c from users where EmailAddress=new.EmailAddress;
if c==0 then
CALL raise_application_error(1234, 'That EmailID Already Exists');
end;
/



																						// procedure Register
create procedure register(name varchar2 , email varchar2 , password varchar2 , address varchar2 ,  accountno int)
	begin
	insert into users values(name, email,address, password);
	insert into account values(accountno,100000);
end//

																						// procedure login
create procedure login(email varchar2 )
	begin
	declare c int;
	set c=0;
	select UserID into c from users where EmailAdress=email;
	if c==0 then
	CALL raise_application_error(1234, 'No such User Exists');
end//


//																							// procedure bidnow
create procedure bidnow(id int , price int,userd int )
	begin
	declare c int;
	declare fp int;
	declare inc decimal;
	set inc=0;
		select categoryID into c from products where ProductID=id;
		if c==1 then
		inc=0.01;
		else if c==2 then
		inc=0.02;
		else if c==3 then 
		inc=0.01;
		else if c==4 then
		inc =0.01;
		cp=inc*price+price;
	update auction set CurrentPrice=cp,BuyerID=userd where ProductID=id;
	end//
