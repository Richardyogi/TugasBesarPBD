alter procedure singleInsertRoundRobin
	@parUser int,
	@parKomputer int,
	@parAplikasi int,
	@parStatus int
as

declare @curIndex int
select @curIndex = no_index from INDEX_ROUND_ROBIN

update RoundRobin
	set 
		FK_User = @parUser,
		FK_Komputer = @parKomputer,
		FK_Aplikasi = @parAplikasi,
		tanggal = convert(date, current_timestamp),
		jam =convert(time, current_timestamp),
		status = @parStatus
	where
		id_penggunaan = @curIndex

set @curIndex=@curIndex+1

delete INDEX_ROUND_ROBIN
insert into INDEX_ROUND_ROBIN
select @curIndex

