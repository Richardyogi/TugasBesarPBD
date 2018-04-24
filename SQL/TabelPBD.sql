CREATE TABLE Komputer (
    id_komputer int IDENTITY(1,1) PRIMARY KEY,
    ruangan int NOT NULL
);


CREATE TABLE Aplikasi (
	id_aplikasi int IDENTITY(1,1) PRIMARY KEY,
	NamaAplikasi varchar(100) NOT NULL
);

CREATE TABLE Pengguna (
	id_user int IDENTITY(1,1) PRIMARY KEY,
	NamaUser varchar(100)
)

CREATE TABLE RoundRobin(
	id_penggunaan int IDENTITY(1,1) PRIMARY KEY,
	FK_User int FOREIGN KEY REFERENCES Pengguna(id_user),
	FK_Komputer int FOREIGN KEY REFERENCES Komputer(id_komputer),
	FK_Aplikasi int FOREIGN KEY REFERENCES Aplikasi (id_aplikasi),
	tanggal date,
	jam time,
	status int
)

Create TABLE INDEX_ROUND_ROBIN(
	no_index int
)

Create TABLE agr_penggunaan_komputer(
	FK_Komputer int FOREIGN KEY REFERENCES Komputer(id_komputer),
	jumlah_penggunaan int,
	durasi int
)

Create Table agr_penggunaan_aplikasi(
	FK_Aplikasi int FOREIGN KEY REFERENCES Aplikasi (id_aplikasi),
	jumlah_pengguna int
)

Create Table agr_jumlah_pengguna_per_jam(
	tanggal date,
	start_time time,
	end_time time,
	jumlah_pengguna int
)

Create Table agr_aktivitas_user(
	FK_User int FOREIGN KEY REFERENCES Pengguna(id_user),
	FK_Komputer int FOREIGN KEY REFERENCES Komputer(id_komputer),
	FK_Aplikasi int FOREIGN KEY REFERENCES Aplikasi (id_aplikasi),
	tanggal date,
	waktu_mulai time,
	waktu_akhir time
)