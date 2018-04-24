alter function testTBLRoundRobin(
	@tanggal date
)
RETURNS @resultRoundRobin TABLE(
	idPengguna int,
	idUser int,
	idKomputer int,
	idAplikasi int,
	tanggal date,
	jam time,
	status int
)
BEGIN 
	insert into @resultRoundRobin
	select
		*
	from 
		RoundRobin
	where
		tanggal = @tanggal
	order by
		FK_USER asc
	RETURN
END

