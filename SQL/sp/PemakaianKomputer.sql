create procedure jumlahPenggunaanKomputer
 @date date
as

 declare @idKomputer int
 declare @jumlahKomputer int
 declare @waktuAwal time
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
  
  insert into @tabelWaktu
  select 
   @idKomputer,
   DATEDIFF(second, @waktuAwal,@waktuAkhir)

  fetch next from
   cariKomputer
  into
   @idKomputer,
   @waktuAwal,
   @waktuAkhir
 end
 close cariKomputer
 deallocate cariKomputer

 insert into agr_penggunaan_komputer
 select
  idKomputer,
  jumlahKomputer,
  waktu
 from
  @tabelKomputer join @tabelWaktu on idKomputer=idKomputer1

 select * from @tabelKomputer
 select * from @tabelWaktu

 --declare @d date
 --set @d = convert(date, CURRENT_TIMESTAMP)
 --exec jumlahPenggunaanKomputer @d

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