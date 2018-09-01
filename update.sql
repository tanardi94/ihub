ALTER TABLE `ihub_absence`
	CHANGE COLUMN `waktumasuk` `waktumasuk` TIMESTAMP NULL DEFAULT NULL AFTER `IdGroup`,
	CHANGE COLUMN `waktukeluar` `waktukeluar` TIMESTAMP NULL DEFAULT NULL AFTER `waktumasuk`,
	ADD COLUMN `status_ontime` VARCHAR(50) NULL DEFAULT NULL AFTER `waktukeluar`;