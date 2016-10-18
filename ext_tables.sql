#
# Table structure for table 'tx_bzgaberatungsstellensuche_domain_model_entry'
#
CREATE TABLE tx_bzgaberatungsstellensuche_domain_model_entry (
    religious_denomination int(11) unsigned DEFAULT '0',
    mother_and_child tinyint(4) unsigned DEFAULT '0' NOT NULL,
    consulting_agreement tinyint(4) unsigned DEFAULT '0' NOT NULL,

    pnd_consultings int(11) unsigned DEFAULT '0',
    pnd_languages int(11) unsigned DEFAULT '0',
    pnd_other_language varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_bzgaberatungsstellensuche_domain_model_religion'
#
CREATE TABLE tx_bzgaberatungsstellensuche_domain_model_religion (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

  title varchar(255) DEFAULT '' NOT NULL,
  external_id int(11) DEFAULT '0' NOT NULL,
	hash varchar(32) DEFAULT '' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

  is_dummy_record tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_bzgaberatungsstellensuche_entry_pnd_language_mm'
#
#
CREATE TABLE tx_bzgaberatungsstellensuche_entry_pnd_language_mm (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(255) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  sorting_foreign int(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);


#
# Table structure for table 'tx_bzgaberatungsstellensuche_domain_model_pndconsulting'
#
#
CREATE TABLE tx_bzgaberatungsstellensuche_domain_model_pndconsulting (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	external_id int(11) DEFAULT '0' NOT NULL,
	hash varchar(32) DEFAULT '' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	is_dummy_record tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_bzgaberatungsstellensuche_entry_pndconsulting_mm'
#
#
CREATE TABLE tx_bzgaberatungsstellensuche_entry_pndconsulting_mm (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(255) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  sorting_foreign int(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

CREATE TABLE static_languages (
	  pnd_external_id int(11) default NULL
);


