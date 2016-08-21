<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Protocol
|--------------------------------------------------------------------------
|
| HTTP (Hyper Text Transfer Protocol)
| POP3 (Post Office Protocol 3).
| SMTP (Simple Mail Transfer Protocol).
| FTP (File Transfer Protocol).
| IP (Internet Protocol).
| DHCP (Dynamic Host Configuration Protocol).
| IMAP (Internet Message Access Protocol).
|
*/
$config['vec_protocol'] = "http://";
/*
|--------------------------------------------------------------------------
| Host (IP Address)
|--------------------------------------------------------------------------
|
| Development Server : 112.121.150.31
| locallhost Server (vec Only) : 192.168.1.223
| Production Server (zealtech Only) : vec.dealzep.com
| Production Server (vec Only) : v-cop.net
| Production Server2 (vec Only) : 192.168.10.51 
|
*/
$config['vec_host'] = "vec.dealzep.com";
/*
|--------------------------------------------------------------------------
| Post
|--------------------------------------------------------------------------
|
| Default Post : 9080
| Production zealtech : 8080
| Production Post : 8080
| Production2 Post : 8080
|
*/
$config['vec_port'] = "8080";
/*
|--------------------------------------------------------------------------
| Path and Directory
|--------------------------------------------------------------------------
|
| Default directory : vcop/api/
|
*/
$config['vec_path'] = "/vcop/api/";



