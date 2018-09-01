ALTER TABLE `ihub_ibadah` ADD PRIMARY KEY(`ibadah`);

update ihub_absence set ibadah=1 where ibadah not in (select ihub_ibadah.ibadah from ihub_ibadah);

ALTER TABLE ihub_absence
ADD FOREIGN KEY (ibadah) REFERENCES ihub_ibadah(ibadah);

insert into ihub_opr (idOpr, idGroup)
SELECT DISTINCT IdOpr, 1 FROM ihub_absence WHERE IdOpr not in (select ihub_opr.IdOpr from ihub_opr);

ALTER TABLE ihub_absence
ADD FOREIGN KEY (IdOpr) REFERENCES ihub_opr(IdOpr);

update ihub_opr set idGroup = 1 where idGroup not in (select tbl_Group.idGroup from tbl_Group);

ALTER TABLE ihub_opr
ADD FOREIGN KEY (IdGroup) REFERENCES tbl_group(IdGroup);

ALTER TABLE tbl_division
ADD FOREIGN KEY (IdMinistry) REFERENCES tbl_ministry(IdMinistry);

ALTER TABLE tbl_ministry
ADD FOREIGN KEY (IdDept) REFERENCES tbl_department(IdDept);

update tbl_department set IdGereja=1 where IdGereja is null;

ALTER TABLE tbl_department
ADD FOREIGN KEY (IdGereja) REFERENCES tbl_church(IdGeraja);

alter table ihub_ibadah add creation_date datetime default now();
alter table ihub_ibadah add created_by int(11) default -1;
alter table ihub_ibadah add last_update_date datetime default now();
alter table ihub_ibadah add last_updated_by int(11) default -1;
alter table ihub_ibadah add status tinyint(4) default 1;

alter table ihub_absence add creation_date datetime default now();
alter table ihub_absence add created_by int(11) default -1;
alter table ihub_absence add last_update_date datetime default now();
alter table ihub_absence add last_updated_by int(11) default -1;
alter table ihub_absence add status tinyint(4) default 1;

alter table ihub_opr add creation_date datetime default now();
alter table ihub_opr add created_by int(11) default -1;
alter table ihub_opr add last_update_date datetime default now();
alter table ihub_opr add last_updated_by int(11) default -1;
alter table ihub_opr add status tinyint(4) default 1;

alter table dcanggotadcontact add creation_date datetime default now();
alter table dcanggotadcontact add created_by int(11) default -1;
alter table dcanggotadcontact add last_update_date datetime default now();
alter table dcanggotadcontact add last_updated_by int(11) default -1;
alter table dcanggotadcontact add status tinyint(4) default 1;

alter table tbl_menulevel add creation_date datetime default now();
alter table tbl_menulevel add created_by int(11) default -1;
alter table tbl_menulevel add last_update_date datetime default now();
alter table tbl_menulevel add last_updated_by int(11) default -1;
alter table tbl_menulevel add status tinyint(4) default 1;

alter table tbl_menu add creation_date datetime default now();
alter table tbl_menu add created_by int(11) default -1;
alter table tbl_menu add last_update_date datetime default now();
alter table tbl_menu add last_updated_by int(11) default -1;
alter table tbl_menu add status tinyint(4) default 1;

alter table tbl_group add creation_date datetime default now();
alter table tbl_group add created_by int(11) default -1;
alter table tbl_group add last_update_date datetime default now();
alter table tbl_group add last_updated_by int(11) default -1;
alter table tbl_group add status tinyint(4) default 1;

alter table tbl_division add creation_date datetime default now();
alter table tbl_division add created_by int(11) default -1;
alter table tbl_division add last_update_date datetime default now();
alter table tbl_division add last_updated_by int(11) default -1;
alter table tbl_division add status tinyint(4) default 1;

alter table tbl_ministry add creation_date datetime default now();
alter table tbl_ministry add created_by int(11) default -1;
alter table tbl_ministry add last_update_date datetime default now();
alter table tbl_ministry add last_updated_by int(11) default -1;
alter table tbl_ministry add status tinyint(4) default 1;

alter table tbl_department add creation_date datetime default now();
alter table tbl_department add created_by int(11) default -1;
alter table tbl_department add last_update_date datetime default now();
alter table tbl_department add last_updated_by int(11) default -1;
alter table tbl_department add status tinyint(4) default 1;

alter table tbl_church add creation_date datetime default now();
alter table tbl_church add created_by int(11) default -1;
alter table tbl_church add last_update_date datetime default now();
alter table tbl_church add last_updated_by int(11) default -1;
alter table tbl_church add status tinyint(4) default 1;

CREATE TABLE IF NOT EXISTS `tbl_regional` (
  `IdRegional` int(11) NOT NULL,
  `KodeRegional` varchar(100) DEFAULT NULL,
  `NamaRegional` varchar(200) DEFAULT NULL,
  `creation_date` datetime default now(),
  `created_by` int(11) default -1,
  `last_update_date` datetime default now(),
  `last_updated_by` int(11) default -1,
  `status` tinyint(4) default 1,
  PRIMARY KEY (`IdRegional`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_kota` (
  `IdKota` int(11) NOT NULL,
  `KodeKota` varchar(100) DEFAULT NULL,
  `NamaKota` varchar(200) DEFAULT NULL,
  `creation_date` datetime default now(),
  `created_by` int(11) default -1,
  `last_update_date` datetime default now(),
  `last_updated_by` int(11) default -1,
  `status` tinyint(4) default 1,
  PRIMARY KEY (`IdKota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_regional` (`IdRegional`, `KodeRegional`, `NamaRegional`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status`) VALUES ('1', 'SBY', 'Surabaya', CURRENT_TIMESTAMP, '-1', CURRENT_TIMESTAMP, '-1', '1');

INSERT INTO `tbl_kota` (`IdKota`, `KodeKota`, `NamaKota`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status`) VALUES ('1', 'SBY', 'Surabaya', CURRENT_TIMESTAMP, '-1', CURRENT_TIMESTAMP, '-1', '1');

alter table tbl_church add lat float(10,6);
alter table tbl_church add lng float(10,6);
alter table tbl_church add IdKota int(11) default 1;
alter table tbl_church add IdRegional int(11) default 1;
ALTER TABLE tbl_church
ADD FOREIGN KEY (IdKota) REFERENCES tbl_kota(IdKota);
ALTER TABLE tbl_church
ADD FOREIGN KEY (IdRegional) REFERENCES tbl_regional(IdRegional);

alter table ihub_absence add IdGroup int(11) default 1;

ALTER TABLE ihub_absence
ADD FOREIGN KEY (IdGroup) REFERENCES tbl_group(IdGroup);

alter table ihub_absence add waktumasuk timestamp default now();
alter table ihub_absence add waktukeluar timestamp default now();

alter table ihub_ibadah add IdGereja int(11) default 1;
ALTER TABLE ihub_ibadah
ADD FOREIGN KEY (IdGereja) REFERENCES tbl_church(IdGeraja);

CREATE TABLE IF NOT EXISTS `tbl_penjadwalan` (
  `IdPenjadwalan` int(11) NOT NULL,
  `ibadah` int(11) NOT NULL,
  `tanggal` datetime,
  `IdGroup` int(11) NOT NULL,
  `creation_date` datetime default now(),
  `created_by` int(11) default -1,
  `last_update_date` datetime default now(),
  `last_updated_by` int(11) default -1,
  `status` tinyint(4) default 1,
  PRIMARY KEY (`IdPenjadwalan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE tbl_penjadwalan
ADD FOREIGN KEY (ibadah) REFERENCES ihub_ibadah(ibadah);

ALTER TABLE tbl_penjadwalan
ADD FOREIGN KEY (IdGroup) REFERENCES tbl_group(IdGroup);


DELETE FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=3;
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`) VALUES ('SOUND');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=0;
UPDATE `ihub`.`tbl_division` SET `IdDivisi`='3' WHERE  `IdDivisi`=0;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=3;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
UPDATE `ihub`.`tbl_division` SET `NamaDivisi`='SOUND', `IdMinistry`='2' WHERE  `IdDivisi`=3;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=3;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
ALTER TABLE `tbl_division`
  CHANGE COLUMN `IdDivisi` `IdDivisi` INT(11) NOT NULL AUTO_INCREMENT FIRST;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='ihub';
/* Entering session "my_dbs" */
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`) VALUES ('LIGHTING');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=4;
UPDATE `ihub`.`tbl_division` SET `NamaDivisi`='LIGHTING' WHERE  `IdDivisi`=4;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=4;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
UPDATE `ihub`.`tbl_division` SET `IdMinistry`='2' WHERE  `IdDivisi`=4;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=4;
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`) VALUES ('SM');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=5;
UPDATE `ihub`.`tbl_division` SET `NamaDivisi`='SERVICE MANAGER' WHERE  `IdDivisi`=5;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=5;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
UPDATE `ihub`.`tbl_division` SET `IdMinistry`='2' WHERE  `IdDivisi`=5;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=5;
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`) VALUES ('WEEKLY-SERVICE');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=6;
UPDATE `ihub`.`tbl_division` SET `NamaDivisi`='WEEKLY SERVICE' WHERE  `IdDivisi`=6;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=6;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
UPDATE `ihub`.`tbl_division` SET `IdMinistry`='2' WHERE  `IdDivisi`=6;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=6;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
UPDATE `ihub`.`tbl_division` SET `IdMinistry`='3' WHERE  `IdDivisi`=6;
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=6;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`) VALUES ('CHOIR', 'CHOIR', '3', '2018-01-22 20:49:35');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=7;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`, `NamaDivisi`, `IdMinistry`) VALUES ('TRAFFIC', 'TRAFFIC MINISTRY', '2');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=8;
SELECT `IdMinistry`, LEFT(`KodeMinistry`, 256) FROM `tbl_ministry` GROUP BY `IdMinistry` ORDER BY `KodeMinistry` LIMIT 1000;
INSERT INTO `ihub`.`tbl_division` (`KodeDivisi`, `NamaDivisi`, `IdMinistry`) VALUES ('ICOUNT', 'ICOUNT', '1');
SELECT `IdDivisi`, `KodeDivisi`, `NamaDivisi`, `IdMinistry`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_division` WHERE  `IdDivisi`=9;
SELECT 1 FROM `tbl_division` LIMIT 1;
ALTER TABLE `tbl_group`
  ALTER `IdDivisi` DROP DEFAULT;
ALTER TABLE `tbl_group`
  CHANGE COLUMN `IdDivisi` `IdDivisi` INT(11) NOT NULL AFTER `NamaGroup`,
  ADD CONSTRAINT `FK_tbl_group_tbl_division` FOREIGN KEY (`IdDivisi`) REFERENCES `tbl_division` (`IdDivisi`);
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='ihub';
ALTER TABLE `erform`
  ALTER `IHub` DROP DEFAULT,
  ALTER `IReg_prayer` DROP DEFAULT,
  ALTER `IReg_General` DROP DEFAULT,
  ALTER `IConnect` DROP DEFAULT;
ALTER TABLE `erform`
  CHANGE COLUMN `IHub` `IHUB` TINYINT(4) NOT NULL AFTER `service_req`,
  CHANGE COLUMN `IReg_prayer` `IREG_PRAYER` TINYINT(4) NOT NULL AFTER `IHUB`,
  CHANGE COLUMN `IReg_General` `IREG_GENERAL` TINYINT(4) NOT NULL AFTER `IREG_PRAYER`,
  CHANGE COLUMN `IConnect` `ICOUNT` TINYINT(4) NOT NULL AFTER `IREG_GENERAL`;

DROP TABLE `tbl_schedule`;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
RENAME TABLE `tbl_penjadwalan` TO `tbl_schedule`;
INSERT INTO `ihub`.`tbl_schedule` (`ibadah`) VALUES ('1');
SELECT `IdPenjadwalan`, `ibadah`, `tanggal`, `IdGroup`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_schedule` WHERE  `IdPenjadwalan`=1;
UPDATE `ihub`.`tbl_schedule` SET `tanggal`='2017-10-25 21:26:07' WHERE  `IdPenjadwalan`=1;
SELECT `IdPenjadwalan`, `ibadah`, `tanggal`, `IdGroup`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_schedule` WHERE  `IdPenjadwalan`=1;
SELECT `IdGroup`, LEFT(`KodeGroup`, 256) FROM `tbl_group` GROUP BY `IdGroup` ORDER BY `KodeGroup` LIMIT 1000;
UPDATE `ihub`.`tbl_schedule` SET `IdGroup`='13' WHERE  `IdPenjadwalan`=1;
SELECT `IdPenjadwalan`, `ibadah`, `tanggal`, `IdGroup`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_schedule` WHERE  `IdPenjadwalan`=1;
SELECT `ibadah`, LEFT(`namaibadah`, 256) FROM `ihub_ibadah` GROUP BY `ibadah` ORDER BY `namaibadah` LIMIT 1000;
INSERT INTO `ihub`.`tbl_schedule` (`ibadah`, `tanggal`) VALUES ('1', '2017-10-25 21:26:46');
SELECT `IdPenjadwalan`, `ibadah`, `tanggal`, `IdGroup`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_schedule` WHERE  `IdPenjadwalan`=2;
SELECT `IdGroup`, LEFT(`KodeGroup`, 256) FROM `tbl_group` GROUP BY `IdGroup` ORDER BY `KodeGroup` LIMIT 1000;
UPDATE `ihub`.`tbl_schedule` SET `IdGroup`='13' WHERE  `IdPenjadwalan`=2;
SELECT `IdPenjadwalan`, `ibadah`, `tanggal`, `IdGroup`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`, `status` FROM `ihub`.`tbl_schedule` WHERE  `IdPenjadwalan`=2;