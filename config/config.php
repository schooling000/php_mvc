<?php 
// CREATE SESSION FORM FOR APP
$_SESSION['user']       = null;
$_SESSION['message']    = null;


// DEFINE INFO MYSQL DATABASE
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'khoa_ngoai';


// DEFINE INFO APP
const DEFAULT_WEB_NAME = 'My Web';
const DEFAULT_CONTROLLER = 'dang_nhap';
const DEFAULT_METHOD = 'dang_nhap';

const DEFAULT_LAYOUT = 'layout';


// DEFINE ERROR CODE TYPE
const ERRNO_NOT_FOUND = 500; // NOT FOUND FILE OR CLASS, METHOD, DIRECTORY
const ERRNO_DATA_INPUT = 501; // DATA ĐƯA VÀO KHÔNG ĐÚNG ĐỊNH DẠNH




