<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);
define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');
define('SHOW_DEBUG_BACKTRACE', TRUE);
///////////////////
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
////////////////////
define('PAGES_LIMIT', 10); // no errors
//define('CACHE_V', '1.0.1'); // no errors
define('CACHE_V', time()); // no errors
define('PREFIX_INVOICE', '12');
define('PREFIX_ACCINVOICE', '12');
/////////////////////
////// SITE CONFIG///////
/////////////////////
define('SESS_ID', 'admin_id'); 
define('SESS_LEVEL_ID', 'admin_level'); 
define('SESS_OWNER_ID', 'admin_owner'); 
define('TITLE', 'Admin Management'); 
define('TBL_PROFILE', 'tbl_admin'); 
define('TBL_PROFILE_LEVEL', 'tbl_admin_level'); 
define('TBL_PROFILE_LOGS', 'tbl_admin_logs'); 
define('TBL_PROFILE_LOGS_DETAIL', 'tbl_admin_logs_detail'); 
define('TBL_PROFILE_STATEMENTS', 'tbl_admin_statements'); 
define('TB_FIND', 'admin'); 
define('TB_CREATE', 'admin'); 
define('TB_OWNER', 'admin'); 
/////////////////////
////// TABLE DB///////
/////////////////////
//MySQL table ADMIN
define('TBL_ADMIN', 'tbl_admin');
define('TBL_ADMIN_LEVEL', 'tbl_admin_level');
define('TBL_ADMIN_LOGS', 'tbl_admin_logs');
define('TBL_ADMIN_STATEMENTS', 'tbl_admin_statements');
// ==============================================================================================
// TBL_MEMBER
define('TBL_MEMBER', 'tbl_member');
define('TBL_MEMBER_LOGS', 'tbl_member_logs');
define('TBL_MEMBER_LOGS_DETAIL', 'tbl_member_logs_detail');
//MySQL table
define('TBL_BANK', 'tbl_bank');
define('TBL_WEBCONFIG', 'tbl_webconfig');

define('TBL_TYPE', 'tbl_type');
define('TBL_TYPE_BROWSER', 'tbl_type_browser');
define('TBL_STATUS', 'tbl_status');

// ==============================================================================================
// Main
define('TBL_MAIN_BROWSER', 'tbl_main_browser');
define('TBL_MAIN_CREATE', 'tbl_main_create');
define('TBL_MAIN_GROUP', 'tbl_main_group');
define('TBL_MAIN_STATUS', 'tbl_main_status');
define('TBL_MAIN_TYPE', 'tbl_main_type');
// ==============================================================================================
// Deposit
define('TBL_DEPOSIT', 'tbl_deposit');
define('TBL_DEPOSIT_LOGS', 'tbl_deposit_logs');
define('TBL_DEPOSIT_LOGS_DETAIL', 'tbl_deposit_logs_detail');
// ==============================================================================================
// Withdraw
define('TBL_WITHDRAW', 'tbl_withdraw');
define('TBL_WITHDRAW_LOGS', 'tbl_withdraw_logs');
define('TBL_WITHDRAW_LOGS_DETAIL', 'tbl_withdraw_logs_detail');
// ==============================================================================================
// BANK
define('TBL_BANK_MEMBER', 'tbl_bank_member');
define('TBL_BANK_DEPOSIT', 'tbl_bank_deposit');
define('TBL_BANK_DEPOSIT_LOGS', 'tbl_bank_deposit_logs');
define('TBL_BANK_DEPOSIT_LOGS_DETAIL', 'tbl_bank_deposit_logs_detail');
// ==============================================================================================
// ==============================================================================================

define('TBL_PROVINCE', 'tbl_province');

// Promotion
define('TBL_PROMOTION', 'tbl_promotion');
define('TBL_PROMOTION_LOGS', 'tbl_promotion_logs');
define('TBL_PROMOTION_LOGS_DETAIL', 'tbl_promotion_logs_detail');

define('TBL_PROMOTION_TYPE', 'tbl_promotion_type');
define('TBL_PROMOTION_NAME_COL', 'tbl_promotion_name_col');
// ==============================================================================================


define('TBL_PRODUCT_TYPE', 'tbl_product_type');
define('TBL_PRODUCT', 'tbl_product');
define('TBL_PRODUCT_TRANSFER', 'tbl_product_transfer');
define('TBL_PRODUCT_DETAIL', 'tbl_product_detail');
define('TBL_PRODUCT_CODE', 'tbl_product_code');
define('TBL_PRODUCT_PRICE', 'tbl_product_price');
define('TBL_PRODUCT_GALLERY', 'tbl_product_gallery');
define('TBL_TRANSFER_PLACE', 'tbl_transfer_place');
define('TBL_CAR_TYPE', 'tbl_car_type');
define('TBL_CAR_GALLERY', 'tbl_car_gallery');
define('TBL_TRANSFER_PRICE', 'tbl_transfer_price');
define('TBL_ORDER', 'tbl_order');
define('TBL_ORDER_STATUS', 'tbl_order_status');
define('TBL_PAYMENT_TYPE', 'tbl_payment_type');
define('TBL_PAYMENT_TRANSECTION', 'tbl_payment_transection');
define('TBL_PAYMENT_REFUND', 'tbl_payment_refund');


define('OMISE_API_VERSION', '2019-05-29');
define('OMISE_PUBLIC_KEY', 'pkey_test_5muqdqlzvsr1i3of10g');
define('OMISE_SECRET_KEY', 'skey_test_5muqdqlzxigk4clrdze');