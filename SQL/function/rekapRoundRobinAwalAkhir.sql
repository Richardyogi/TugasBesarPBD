alter function rekapRoundRobin
(
	@date date
)
returns @result table
(
	idUser int,
	idKomputer int, 
	idAplikasi int,
	tanggal date,
	waktuMulai time,
	waktuAkhir time
)
begin
	declare myCursor cursor 
	for 
		select
			FK_User,
			FK_Komputer,
			FK_Aplikasi,
			tanggal,
			jam
		from
			RoundRobin
		where
			tanggal = @date
		order by
			FK_User,
			FK_Komputer,
			FK_Aplikasi,
			jam

	open myCursor

	declare @userTemp int
	declare @komputerTemp int
	declare @aplikasiTemp int
	declare @dateTemp date
	declare @awalTemp time
	declare @akhirTemp time

	fetch next from
		myCursor
	into
		@userTemp,
		@komputerTemp,
		@aplikasiTemp,
		@dateTemp,
		@awalTemp

	fetch next from
		myCursor
	into
		@userTemp,
		@komputerTemp,
		@aplikasiTemp,
		@dateTemp,
		@akhirTemp

	while(@@FETCH_STATUS=0)
	begin
		insert into @result
		select
			@userTemp,
			@komputerTemp,
			@aplikasiTemp,
			@dateTemp,
			@awalTemp,
			@akhirTemp

		fetch next from
			myCursor
		into
			@userTemp,
			@komputerTemp,
			@aplikasiTemp,
			@dateTemp,
			@awalTemp

		fetch next from
			myCursor
		into
			@userTemp,
			@komputerTemp,
			@aplikasiTemp,
			@dateTemp,
			@akhirTemp
	end
	return
end

--select * from dbo.rekapRoundRobin('2018-05-06')

--select * from roundrobin where fk_user is not null