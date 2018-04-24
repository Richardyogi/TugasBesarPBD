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
		FK_USER, id_penggunaan  asc
	RETURN
END

--select * from testTBLRoundRobin(convert(date,CURRENT_TIMESTAMP)) order by idUser, idPengguna

--delete RoundRobin where tanggal= CONVERT(date, CURRENT_TIMESTAMP)

--exec RoundRobinSP 10

select * from RoundRobin