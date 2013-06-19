<?php

 class ValuesWrapClass {

     private $homepage;
     private $protocol;
     private $servername;
     private $homeTitle;
     private $subject;
     private $signupConfirmed;
     private $createURL;
     
     private $PT_CreateAcnt_Email;
     private $PT_CreateAcnt_First_name;
     private $PT_CreateAcnt_Last_name;
     private $PT_CreateAcnt_Password;
     private $PT_CreateAcnt_Repeat;


     public function __construct($fileName) {
	 $properties = parse_ini_file($fileName);

	 $this->homepage = $properties["Homepage"];
	 $this->protocol = $properties["Protocol"];
	 $this->servername = $properties["ServerName"];
	 $this->homeTitle = $properties["HomePageTitle"];
	 $this->subject = $properties["Subject"];
	 $this->signupConfirmed = $properties["signupConfirmed"];
	 $this->createURL = $properties["CreateURL"];
         
         $this->PT_CreateAcnt_Email = $properties["CreateAcnt_Email"];
	 $this->PT_CreateAcnt_First_name = $properties["CreateAcnt_First_name"];
         $this->PT_CreateAcnt_Last_name = $properties["CreateAcnt_Last_name"];
	 $this->PT_CreateAcnt_Password = $properties["CreateAcnt_Password"];
         $this->PT_CreateAcnt_Repeat = $properties["CreateAcnt_Repeat"];
          
     }

     public function getHomepage() {
	 return $this->homepage;
     }

     public function getProtocol() {
	 return $this->protocol;
     }

     public function getServername() {
	 return $this->servername;
     }

     public function getHomePageTitle() {
	 return $this->homeTitle;
     }

     public function getSubject() {
	 return $this->subject;
     }

     public function getSignupConfirmed() {
	 return $this->signupConfirmed;
     }
     public function getCreateURL() {
	 return $this->createURL;
     }

     public function getCreateAcnt_Email() {
	 return $this->PT_CreateAcnt_Email;
     }
     
     public function getCreateAcnt_First_name() {
	 return $this->PT_CreateAcnt_First_name;
     }
     
     public function getCreateAcnt_Last_name() {
	 return $this->PT_CreateAcnt_Last_name;
     }
     
     public function getCreateAcnt_Password() {
	 return $this->PT_CreateAcnt_Password;
     }
     
     public function getCreateAcnt_Repeat() {
	 return $this->PT_CreateAcnt_Repeat;
     }   


     
  }
