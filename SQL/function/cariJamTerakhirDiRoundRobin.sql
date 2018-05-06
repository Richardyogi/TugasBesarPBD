create function cariJamTerakhirDiRoundRobin
()
returns time
begin
	declare @index int
	select @index = no_index from INDEX_ROUND_ROBIN
	declare @waktu time
	
	select
		@waktu=jam
	from
		RoundRobin
	where
		id_penggunaan = @index -1

	return @waktu
end

