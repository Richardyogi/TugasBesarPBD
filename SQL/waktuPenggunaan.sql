alter procedure agr_waktu_penggunaan
as

declare @currentTime time
set @currentTime = '08:00:00'
declare @n int
set @n =0

while(@n < 11)
begin
	insert into agr_jumlah_pengguna_per_jam
	select
		CONVERT (DATE, CURRENT_TIMESTAMP),
		@currentTime,
		DATEADD(hour,1,@currentTime),
		0		 

	set @currentTime= DATEADD(hour,1,@currentTime)
	set @n=@n+1
end

declare @tempTable table
(
	idPenggunaTemp int,
	idUserTemp int,
	tanggalTemp date,
	jamTemp time,
	statusTemp int
)

declare @tempTable2 table
(
	tanggalTemp2 date,
	jamTemp2 time,
	statusTemp2 int
)

insert into @tempTable
select
	idPengguna,
	idUser,
	tanggal, 
	jam, 
	status
FROM testTBLRoundRobin(convert(date, CURRENT_TIMESTAMP)) 

--insert berurutan untuk tempTable
declare myCursor1 cursor
for
	select 
		tanggalTemp,
		jamTemp,
		statusTemp
	from
		@tempTable
	order by idPenggunaTemp, idUserTemp

open myCursor1

declare @tanggal date
declare @time time
declare @status int

fetch next from
	myCursor1
into
	@tanggal,
	@time,
	@status

while(@@FETCH_STATUS=0)
begin 
	insert into @tempTable2
	select
		@tanggal,
		@time,
		@status

	fetch next from
		myCursor1
	into
		@tanggal,
		@time,
		@status
end

close myCursor1 
deallocate myCursor1

----- variable start time dan end time ----
declare @startTime time
declare @endTime time

---------time dan status end when-------
declare @time2 time
declare @status2 int

------cursor  start------------
declare cursorStart cursor
for
	select
		jamTemp2
	from 
		@tempTable2
	where
		statusTemp2=1

------cursor End------------
declare cursorEnd cursor
for
	select
		jamTemp2
	from 
		@tempTable2
	where
		statusTemp2=0

open cursorStart
open cursorEnd

fetch next from 
	cursorStart
into
	@time

fetch next from 
	cursorEnd
into
	@time2
	
while(@@FETCH_STATUS=0)
begin

	while(@time<@time2)
	begin
		update agr_jumlah_pengguna_per_jam
		set jumlah_pengguna = jumlah_pengguna+1
		where agr_jumlah_pengguna_per_jam.start_time<@time and agr_jumlah_pengguna_per_jam.end_time>=@time

		set @time = DATEADD(hour, 1, @time)
	end
	fetch next from 
		cursorStart
	into
		@time

	fetch next from 
		cursorEnd
	into
		@time2
end

close cursorStart
deallocate cursorStart

close cursorEnd
deallocate cursorStart


