<?php

// $Id: config.inc.php 2211 2011-12-24 09:27:00Z cimorrison $

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file
 *   (except for the lang.* files, eg lang.en for English, if
 *   you want to change text strings such as "Meeting Room
 *   Booking System", "room" and "area").
 **************************************************************************/

/**********
 * Timezone
 **********/
 
// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Europe/London";

// Whether or not to display the timezone
$display_timezone = TRUE;



/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL,
// "mysqli"=MySQL via the mysqli PHP extension
$dbsys = "mysqli";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP.

// briccsdb
//$db_host = "10.156.254.206"; 

// briccsdb02
$db_host = "10.156.254.205";

// Database name:
$db_database = "mrbs";
// Database login user name:
$db_login = "brumrbs";
// Database login password:
$db_password = "bru4mrbs8";
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Uncomment this to NOT use PHP persistent (pooled) database connections:
//$db_nopersist = 1;


/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */

$mrbs_admin = "Your Administrator";
$mrbs_admin_email = "rab63@leicester.ac.uk";  // NOTE:  there are more email addresses in $mail_settings below

// The company name is mandatory.   It is used in the header and also for email notifications.
// The company logo, additional information and URL are all optional.

$mrbs_company = "Leicester Cardiovascular Biomedical Research Unit";   // This line must always be uncommented ($mrbs_company is used in various places)

// Uncomment this next line to use a logo instead of text for your organisation in the header

$mrbs_company_logo = "brulogo.jpg";    // name of your logo file.   This example assumes it is in the MRBS directory

// Uncomment this next line for supplementary information after your company name or logo
$mrbs_company_more_info = "LCBRU: At the heart of research";  // e.g. "XYZ Department"

// Uncomment this next line to have a link to your organisation in the header
$mrbs_company_url = "http://www.le.ac.uk/projects/bru/";

// This is to fix URL problems when using a proxy in the environment.
// If links inside MRBS appear broken, then specify here the URL of
// your MRBS root directory, as seen by the users. For example:
// $url_base =  "http://webtools.uab.ericsson.se/oam";
// It is also recommended that you set this if you intend to use email
// notifications, to ensure that the correct URL is displayed in the
// notification.
$url_base = "http://10.156.254.207/appointments";


/*******************
 * Calendar settings
 *******************/

// Note: Be careful to avoid specify options that displays blocks overlaping
// the next day, since it is not properly handled.

// Overwriting defaults from areadefaults.inc.php

// The beginning of the first slot of the day (DEFAULT VALUES FOR NEW AREAS)
$morningstarts         = 7;   // must be integer in range 0-23
$morningstarts_minutes = 0;   // must be integer in range 0-59

// The beginning of the last slot of the day (DEFAULT VALUES FOR NEW AREAS)
$eveningends           = 20;  // must be integer in range 0-23
$eveningends_minutes   = 30;   // must be integer in range 0-59


/******************
 * Display settings
 ******************/

// [These are all variables that control the appearance of pages and could in time
//  become per-user settings]

// Start of week: 0 for Sunday, 1 for Monday, etc.
$weekstarts = 1;


/***********************************************
 * Authentication settings - read AUTHENTICATION
 ***********************************************/

$auth["session"] = "php"; // How to get and keep the user ID. One of
           // "http" "php" "cookie" "ip" "host" "nt" "omni"
           // "remote_user"

$auth["type"] = "ldap"; // How to validate the user/password. One of "none"
                          // "config" "db" "db_ext" "pop3" "imap" "ldap" "nis"
                          // "nw" "ext".

// The list of administrators (can modify other peoples settings).
//
unset($auth["admin"]);              // Include this when copying to config.inc.php
//$auth["admin"][] = "administrator"; // A user name from the user list.
$auth["admin"][] = "vasil.stezhka"; // A user name from the user list.
$auth["admin"][] = "elogtens"; // A user name from the user list.
$auth["admin"][] = "claire.pearson"; // A user name from the user list.
$auth["admin"][] = "kathryn.hartopp"; // A user name from the user list.
$auth["admin"][] = "helen.a.green"; // A user name from the user list.
$auth["admin"][] = "joy.uzoma"; // A user name from the user list.
$auth["admin"][] = "kajal.solanki"; // A user name from the user list.
$auth["admin"][] = "anna-marie.marsh"; // A user name from the user list.
$auth["admin"][] = "mary.harrison"; // A user name from the user list.
$auth["admin"][] = "kris.kenmuir-hogg"; // A user name from the user list.
$auth["admin"][] = "susan.mackness"; // A user name from the user list.
$auth["admin"][] = "daisy.a.grace"; // A user name from the user list.
$auth["admin"][] = "ssterland"; // A user name from the user list.
$auth["admin"][] = "sumaiyyah.hadadi"; // A user name from the user list.
$auth["admin"][] = "janine.sanders"; // A user name from the user list.
$auth["admin"][] = "sarah.worthy"; // A user name from the user list.
$auth["admin"][] = "kelly.cooper"; // A user name from the user list.
$auth["admin"][] = "shirley.hennessy"; // A user name from the user list.
$auth["admin"][] = "dawn.woods"; // A user name from the user list.
$auth["admin"][] = "richard.a.bramley"; // A user name from the user list.
$auth["admin"][] = "becki.a.wrack"; // A user name from the user list.
$auth["admin"][] = "sharanjit.budwal"; // A user name from the user list.
$auth["admin"][] = "jay.gracey"; // A user name from the user list.
$auth["admin"][] = "mamta.srikandhan"; // A user name from the user list.
$auth["admin"][] = "kelley.green"; // A user name from the user list.
$auth["admin"][] = "anna-marie.marsh"; // A user name from the user list.
$auth["admin"][] = "dianne.dennis"; // A user name from the user list.
$auth["admin"][] = "jenny.middleton"; // A user name from the user list.
$auth["admin"][] = "dhruvesh.ranpura"

// 'auth_ldap' configuration settings
// Where is the LDAP server
$ldap_host = "ldaplookups.xuhl-tr.nhs.uk";
// If you have a non-standard LDAP port, you can define it here
$ldap_port = 389;
// If you do not want to use LDAP v3, change the following to false
$ldap_v3 = true;
// If you want to use TLS, change the following to true
$ldap_tls = false;
// LDAP base distinguish name
// See AUTHENTICATION for details of how check against multiple base dn's
$ldap_base_dn = "dc=xuhl-tr,dc=nhs,dc=uk";
// Attribute within the base dn that contains the username
// $ldap_user_attrib = "uid";
$ldap_user_attrib = "sAMAccountName";
// If you need to search the directory to find the user's DN to bind
// with, set the following to the attribute that holds the user's
// "username". In Microsoft AD directories this is "sAMAccountName"
$ldap_dn_search_attrib = "sAMAccountName";
// If you need to bind as a particular user to do the search described
// above, specify the DN and password in the variables below
$ldap_dn_search_dn = "cn=Briccs.LDAP,ou=Service Accounts,ou=Technical Operations,dc=xuhl-tr,dc=nhs,dc=uk";
$ldap_dn_search_password = "Br1cc5Uk";

// 'auth_ldap' extra configuration for ldap configuration of who can use
// the system
// If it's set, the $ldap_filter will be combined with the value of
// $ldap_user_attrib like this:
//   (&($ldap_user_attrib=username)($ldap_filter))
// After binding to check the password, this check is used to see that
// they are a valid user of mrbs.
$ldap_filter = "memberOf=CN=BRICCS MRBS,OU=MRBS,OU=Apps,DC=xuhl-tr,DC=nhs,DC=uk";

// If you need to disable client referrals, this should be set to TRUE.
// Note: Active Directory for Windows 2003 forward requires this.
$ldap_disable_referrals = TRUE;



/**********************************************
 * Email settings
 **********************************************/

// Set the name of the Backend used to transport your mails. Either 'mail',
// 'smtp' or 'sendmail'. Default is 'mail'. See INSTALL for more details.
$mail_settings['admin_backend'] = 'smtp';

// Set the language used for emails (choose an available lang.* file).
// Default is 'en'.
$mail_settings['admin_lang'] = 'en';

// Set the email address of the From field. Default is 'admin_email@your.org'
$mail_settings['from'] = 'richard.bramley@uhl-tr.nhs.uk';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
$mail_settings['recipients'] = 'richard.bramley@uhl-tr.nhs.uk';

// Set email address of the Carbon Copy field. Default is ''. You can define
// more than one recipient (see 'recipients')
$mail_settings['cc'] = '';


/**********************************
 * SMTP settings
 **********************************/

// Set smtp server to connect. Default is 'localhost' (only used with "smtp"
// backend).
$smtp_settings['host'] = 'smtp.xuhl-tr.nhs.uk';

// Set smtp port to connect. Default is '25' (only used with "smtp" backend).
$smtp_settings['port'] = 25;

// Set whether or not to use SMTP authentication. Default is 'FALSE'
$smtp_settings['auth'] = FALSE;

// Set the username to use for SMTP authentication. Default is ''
$smtp_settings['username'] = '';

// Set the password to use for SMTP authentication. Default is ''
$smtp_settings['password'] = '';


/*************
 * Entry Types
 *************/

// This array maps entry type codes (letters A through J) into descriptions.
//
// Each type has a color which is defined in the array $color_types in the Themes
// directory - just edit whichever include file corresponds to the theme you
// have chosen in the config settings. (The default is default.inc, unsurprisingly!)
//
// The value for each type is a short (one word is best) description of the
// type. The values must be escaped for HTML output ("R&amp;D").
// Please leave I and E alone for compatibility.
// If a type's entry is unset or empty, that type is not defined; it will not
// be shown in the day view color-key, and not offered in the type selector
// for new or edited entries.

$booking_types[] = "A";
$booking_types[] = "B";
$booking_types[] = "C";
$booking_types[] = "D";
$booking_types[] = "T";
$booking_types[] = "F";
$booking_types[] = "G";
$booking_types[] = "H";
$booking_types[] = "N";

// Default type for new bookings
$default_type = "A";


// Customisations for LCBRU 10.07.2012
$select_options['entry.study_name'] = array(
'0001 - HOPE 3',
'0002 - Echo CRT',
'0003 - Cerebral Emboli',
'0004 - Uroguanylin in Heart Failure',
'0006 - TRIVENT',
'0007 - Cardiofax M',
'0008 - SERVIER',
'0009 - Ageing effect of Chemo on Cardiac Function',
'0013 - Expedition',
'0014 - Monotherapy v Dual',
'0015 - Drug resistant hypertension',
'0016 - Diuretics in low-renin hypertension',
'0017 - CASP',
'0018 - ICDIRS 1',
'0019 - Surgical effect on Central Aortic BP',
'0022 - CAVALIER',
'0023 - BRICCS',
'0024 - DESMOND',
'0025 - ATMOSPHERE',
'0026 - SIGNIFY',
'0027 - Forecasting Brain Injury',
'0028 - Sweet-heart',
'0029 - Hypertension after Carotid Endarterectomy',
'0031 - Ablation Catheters in Paroxysmal AF',
'0032 - STAND',
'0033 - CVLPRIT',
'0034 - MVO',
'0035 - Novel Vicorder Apparatus',
'0036 - PROTECT',
'0037 - M & M Study',
'0038 - GRAPHIC, complement system in CAD',
'0039 - Cerebral Emboli during RF ablation',
'0040 - Renal Perfusion in Heart Failure',
'0041 - OMRON BP monitor validation',
'0042 - FABRY',
'0043 - Safety and tolerability in AAA',
'0044 - COREVALVE',
'0045 - Late Sodium Current Inhibition',
'0046 - Paradigm Study',
'0047 - Pilot CMR Study',
'0048 - REMINDER',
'0049 - Darbepoetin Alfa',
'0050 - Coronary Optical Coherence Tomography',
'0051 - SJM Portico TAVI and Portico 23TF EU',
'0052 - PRESTIGE',
'0053 - ABSORB II',
'0054 - Thrombotic Risk in APS patients',
'0055 - PRIMID AS',
'0057 - INOVATE-HF',
'0056 - REM - HF',
'0058 - Diastolic Heart Failure',
'0059 - Smart Touch Registry',
'0061 - BNP Measurement',
'0062 - CANTOS',
'0063 - CACHE',
'0065 - HOT',
'0066 - CoreValve ADVANCE II',
'0067 - EXCEL',
'0068 - SWAO II',
'0070 - Bayer X_Vert',
'0072 - EAST',
'0075 - ROX',
'0076 - PASPORT',
'0077 - ESCALATION',
'0078 - Exoansion',
'0079 - SURTAVI',
'0080 - USURP-AF',
'0081 - Lipoprotein in CAD',
'0082 - MR-Inform',
'0083 - IVABRODINE',
'0084 - GADACAD I',
'0085 - GRAPHIC 2',
'0086 - CATCH AMI',
'0087 - RELAX 2',
'0088 - CE-MARC 2',
'0089 - ULTIMATE',
'0090 - REVIVED',
'0091 - UK TAVI',
'0092 - FOURIER AMG',
'0093 - HESTER',
'0094 - Cardiac Low Frequency Sound Study',
'0095 - RESPOND',
'0096 - ENSURE-AF',
'0097 - RELAX CAD',
'0098 - Aneurysm CaRe',
'0099 - Euro CTO',
'0100 - HCMR',
'0101 - Assess Study',
'0102 - OCD Schizophrenia',
'0103 - SCAD',
'0104 - PARAGON-HF',
'0105 - Cardiac Rehab and Stroke',
'0106 - Heart Sound CRT Optimisation',
'0107 - ReMARQable',
'0108 - AEGIS',
'0109 - CYCLE HD',
'0110 - TMAO',
'0111 - PARADIGM Extend',
'0112 - Global Leaders',
'0113 - BRAVE',
'0114 - DIASTOLIC',
'0115 - STRIVE',
'0116 - Re-Dual PCI',
'0117 - TICONC',
'0118 - Strength',
'0119 - Dalcor 301',
'0120 - PD-HF',
'0121 - T-Time',
'0122 - Linear',
'0123 - Transition',
'0124 - RiPAIR',
'0125 - Ironman',
'0126 - Galileo',
'0127 - SCAD CAE',
'0128 - Pre-eclampsia',
'0129 - Lenten',
'0130 - Iddea-HF',
'0131 - Victoria',
'0132 - Paradise MI',
'0133 – MICRA',
'0134 – UNCOVER AF',
'0135 – HES',
'0136 – INDAPAMIDE',
'0137 – CMR GUIDE',
'0138 – FOAMI',
'0139 – EMPEROR HFpEF',
'0140 – EMPEROR HFrEF',
'OTHER'
);

$select_options['entry.study_pi'] = array(
'Professor Nilesh Samani',
'Professor Bryan Williams',
'Professor Paul Burton',
'Professor Tony Gershlick',
'Professor Kamlesh Khunti',
'Professor Alison Goodall',
'Dr W Toff',
'Dr G A Ng',
'Professor Leong Ng',
'Dr Nick Brindle',
'Dr Matt Bown',
'Dr Derek Chin',
'Dr Joan Davies',
'Dr Gerry McCann',
'Prof D H Evans',
'Dr Sadat Edroos',
'Mr Vimal J Gokani',
'Professor T J Spyt',
'Professor Melanie Davies',
'Professor Iain Squire',
'Dr Tomaszewski',
'Dr Emma Chung',
'Professor Ross Naylor',
'Dr Alistair Sandilands',
'Professor S Biddle',
'Dr Amit Mistry',
'Dr Ian Hudson',
'Dr Edward Choke',
'Dr Jan Kovac',
'Dr Dave Adlam'
);




// This next section must come at the end of the config file - ie after any
// language and mail settings, as the definitions are used in the included file
require_once "language.inc";   // DO NOT DELETE THIS LINE

?>
