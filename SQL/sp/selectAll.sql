alter procedure selectAll
	@name varchar(200)
as

DECLARE 
	@query nvarchar(400)

SET @query=CONCAT('select * from ',convert(nvarchar,@name))

EXEC sp_executesql @query

exec selectAll 'agr_penggunaan_komputer'