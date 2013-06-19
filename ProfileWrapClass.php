<?php

 class ProfileWrapClass{
     private $email;
     private $imap;
     private $password;
     private $SLUserName;
     private $SLAuthentication;
     private $QALogin;
     private $FirstName;
     private $LastName;
     private $Browsers;

     public function __construct($fileName) {
	 $properties = parse_ini_file($fileName);

	 $this->email = $properties["email"];
	 $this->imap = $properties["imap"];
	 $this->password = $properties["password"];
	 $this->SLUserName = $properties["SLUserName"];
	 $this->SLAuthentication = $properties["SLAuthentication"];
	 $this->QALogin = $properties["QALogin"];
	 $this->QAPassword = $properties["QAPassword"];
	 $this->FirstName = $properties["FirstName"];
	 $this->LastName = $properties["LastName"];
	 $this->Browsers = $properties["Broswer"];
     }

     public function getBrowser() {
	 return $this->Browsers;
     }

     public function getEmail() {
	 return $this->email;
     }

     public function getImap() {
	 return $this->imap;
     }

     public function getPassword() {
	 return $this->password;
     }

     public function getSLUserName() {
	 return $this->SLUserName;
     }

     public function getSLAuthentication() {
	 return $this->SLAuthentication;
     }

     public function getQALogin() {
	 return $this->QALogin;
     }

     public function getFirstName() {
	 return $this->FirstName;
     }

     public function getLastName() {
	 return $this->LastName;
     }

 }