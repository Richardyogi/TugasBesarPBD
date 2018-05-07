create procedure agr_aktivitas_userSP
	@date date
as
insert into agr_aktivitas_user
select
	*
from
	dbo.rekapRoundRobin(@date)