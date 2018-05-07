create procedure agr_aktivitas_user
	@date date
as
insert into agr_aktivitas_user
select
	*
from
	dbo.rekapRoundRobin(@date)