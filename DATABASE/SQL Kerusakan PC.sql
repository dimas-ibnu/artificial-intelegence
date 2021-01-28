INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (1,'Motherbord Rusak',2,5);
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (2,'Power Supply Rusak',3,'M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (3,'Memori Kotor',4,'M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (4,'Memori Tidak Terdeteksi','M1','M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (5,'Tidak Ada Aliran Listrik',6,9);
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (6,'Tegangan Listrik Tidak Stabil',7,'M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (7,'PC Sering Mati Tiba-Tiba',8,'M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (8,'Suhu PC Panas','M2','M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (9,'Semua Perangkat Tidak Terdeteksi Oleh OS',10,'M99');
INSERT INTO `gejala`(`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES (10,'Suhu PC Panas','M3','M99');


INSERT INTO `penyakit`(`id_penyakit`, `penyakit`, `ifyes`, `ifno`) VALUES (10,'Suhu PC Panas','M3','M99');


INSERT INTO `penyakit`(`id_penyakit`, `penyakit`, `ifyes`, `ifno`) VALUES ('M1', 'PC Over Head',0,0);
INSERT INTO `penyakit`(`id_penyakit`, `penyakit`, `ifyes`, `ifno`) VALUES ('M2', 'PC Mati',0,0);
INSERT INTO `penyakit`(`id_penyakit`, `penyakit`, `ifyes`, `ifno`) VALUES ('M3', 'Motherboard Mengalami Masalah',0,0);
INSERT INTO `penyakit`(`id_penyakit`, `penyakit`, `ifyes`, `ifno`) VALUES ('M99', 'Tidak Bisa Mendeteksi Kerusakan',0,0);
