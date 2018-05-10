alter procedure agr_aktivitas_userSP
as
declare @date date
set @date= convert(date, CURRENT_TIMESTAMP)
insert into agr_aktivitas_user
select
	*
from
	dbo.rekapRoundRobin(@date)

	