alter procedure jumlahPenggunaanKomputer
as

 declare @idKomputer int
 declare @jumlahKomputer int
 declare @waktuAwal time
 declare @date date
 set @date= convert(date, CURRENT_TIMESTAMP)
 declare @waktuAkhir time
 declare @tabelKomputer table(
  idKomputer int,
  jumlahKomputer int
 )

 declare @tabelWaktu table(
  idKomputer1 int,
  waktu int 
 )
 
 insert into @tabelKomputer
 select 
  idKomputer,
  COUNT(idKomputer)
 from
  rekapRoundRobin(@date) 
 group by
  idKomputer

declare myCursor cursor
for
select
	idKomputer,
	jumlahKomputer
from
	@tabelKomputer

open myCursor

fetch next from myCursor
into
	@idKomputer,
	@jumlahKomputer

while(@@FETCH_STATUS=0)
begin
	update agr_penggunaan_komputer
  set
   jumlah_penggunaan = jumlah_penggunaan+@jumlahKomputer
   where
	FK_Komputer = @idKomputer

	fetch next from myCursor
	into
		@idKomputer,
		@jumlahKomputer
end

close myCursor
deallocate myCursor

 declare cariKomputer cursor
 for
  select
   idKomputer,
   waktuMulai,
   waktuAkhir
  from
   rekapRoundRobin(@date) 
 
 open cariKomputer

 fetch next from
  cariKomputer
 into
  @idKomputer,
  @waktuAwal,
  @waktuAkhir

 while(@@FETCH_STATUS=0 )
 begin
  
  update agr_penggunaan_komputer
  set
		durasi = durasi+ DATEDIFF(second, @waktuAwal,@waktuAkhir)
   where
		FK_Komputer= @idKomputer

  fetch next from
   cariKomputer
  into
   @idKomputer,
   @waktuAwal,
   @waktuAkhir
 end
 close cariKomputer
 deallocate cariKomputer

 select * from @tabelKomputer
 select * from @tabelWaktu

 --declare @d date
 --set @d = convert(date, CURRENT_TIMESTAMP)
 --exec jumlahPenggunaanKomputer @d
 --select * from agr_penggunaan_komputer



--exec jumlahPenggunaanKomputer
--select * from agr_penggunaan_komputer
 
 --exec RoundRobinSP 10,@d
--select * from agr_penggunaan_aplikasi
--select *
--from
--  RoundRobin where fk_user is not null

--exec jumlahPenggunaAplikasi

 --update agr_penggunaan_komputer
 --set jumlah_penggunaan=0, durasi=0
 
 --select 
 -- idKomputer,
 -- COUNT(idKomputer),
 -- waktuMulai,
 -- waktuAkhir
 --from
 -- rekapRoundRobin(@d) 
 --group by
 -- idKomputer