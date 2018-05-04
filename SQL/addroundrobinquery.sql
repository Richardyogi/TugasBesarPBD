alter procedure RoundRobinSP
	@n int,
	@time time
as

declare @currentTime time
if(@time=null)
begin
	set @currentTime = '08:00:00.000'
end
else
begin
	set @currentTime = convert(time,CURRENT_TIMESTAMP)
end

declare @curIDUser int
declare @curIDKomputer int
declare @curIDApp int
declare @curDate date
set @curDate = convert(date, CURRENT_TIMESTAMP)

declare @curTime time
declare @curStatus int
declare @curIndex int
select @curIndex = no_index from INDEX_ROUND_ROBIN
declare @tempIndex int
select @tempIndex = no_index from INDEX_ROUND_ROBIN

declare @tempRoundRobin table
(
	pengguna1 int,
	komputer1 int,
	aplikasi1 int,
	tanggal1 date,
	jam1 time,
	status1 int
)

while(@n>0)
begin
	select top 1 @curIDUser = id_user from pengguna order by NEWID()
	select top 1 @curIDApp =  id_aplikasi from aplikasi order by NEWID()
	select top 1 @curIDKomputer =  id_komputer from komputer order by NEWID()
	set @n=@n-1

	declare @startTime time
	set @startTime = dateadd(second, rand()*(1800-1)+0, @currentTime)

	if(@startTime>'17:30:00')
	set @startTime = dateadd(second, rand()*(1800-1)+0, '08:00:00')

	insert into @tempRoundRobin
	select 
		@curIDUser,
		@curIDKomputer,
		@curIDApp,
		@curDate,
		@startTime, 
		1

	declare @endTime time
	set @endTime = dateadd(second, rand()*(10000-1)+0, @startTime)

	if(@endTime>'18:00:00')
		set @endTime = '18:00:00'
	
	insert into @tempRoundRobin
	select 
		@curIDUser,
		@curIDKomputer,
		@curIDApp,
		@curDate,
		@endTime, 
		0

	set @currentTime = @startTime
end

declare myCursor cursor
for 
	select 
		*
	from
		@tempRoundRobin
	order by
		jam1 asc

open myCursor
	
fetch next from
	myCursor
into
	@curIDUser,
	@curIDKomputer,
	@curIDApp,
	@curDate,
	@curTime,
	@curStatus


while(@@FETCH_STATUS=0)
begin
	if(@curIndex>50000)
		set @curIndex =1
	update RoundRobin
	set 
		FK_User = @curIDUser,
		FK_Komputer = @curIDKomputer,
		FK_Aplikasi = @curIDApp,
		tanggal = @curDate,
		jam = @curTime,
		status = @curStatus
	where
		id_penggunaan = @curIndex

	set @curIndex = @curIndex+1

	fetch next from
		myCursor
	into
		@curIDUser,
		@curIDKomputer,
		@curIDApp,
		@curDate,
		@curTime,
		@curStatus
end
	
close myCursor
deallocate myCursor

update INDEX_ROUND_ROBIN
set no_index = @curIndex
where no_index = @tempIndex

DECLARE @N TIME
SET @N =CONVERT(TIME, CURRENT_TIMESTAMP)
EXEC RoundRobinSP 500 , @N

select * from RoundRobin
select * from INDEX_ROUND_ROBIN