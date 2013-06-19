<?php

 /**
  * 
  */
 require_once 'vendor/autoload.php';

 include('ProfileWrapClass.php');
 include('ValuesWrapClass.php');

 class SmokeCC extends Sauce\Sausage\WebDriverTestCase {

     /**
      * Profile Properties
      * @var PropertiesWrapper
      */
     private $profile;
     private $values;

     /**
      * An inheritied field that will be used by parent class in setup.
      * 
      * @var array
      */
     public static $browsers = array(
	 // run FF15 on Windows 8 on Sauce
	 array(
                'name' => 'TheiaLive Login',
        	'build' => 'R2D2',
                'browserName' => 'firefox',
                'desiredCapabilities' => array(
		'version' => '15',
		'platform' => 'Windows 2012',
	     )
	 )//,
	     // run Chrome on Linux on Sauce
	     // array(
	     //     'browserName' => 'chrome',
	     //     'desiredCapabilities' => array(
	     //         'platform' => 'Linux'
	     //   )
	     // ),
	     // run Chrome locally
	     // array(
	     //     'browserName' => 'chrome',
	     //     'local' => true,
	     //     'sessionStrategy' => 'shared'
	     // )
     );
     

     /**
      * [__construct description]
      */
     public function __construct() {
	 $this->profile = new ProfileWrapClass("resources/profile.ini");
	 $this->values = new ValuesWrapClass('resources/values.ini');
     }

     public function setUp() {
	 parent::setUp();
	 
	 $this->setBrowserUrl($this->values->getHomepage());
	 
     }
      
     public function testLogin() {
	$this->url($this->values->getHomepage());

        $this->byCssSelector(".navblock a[href=\"\/account\/index\/login\"]")->click();
         
        $test_text = "vancouversage@gmail.com";
        $textbox_email = $this->byId('email');
        $textbox_email->click();
        $this->keys($test_text);
        $this->assertEquals($textbox_email->value(), $test_text);

        $test_text2 = "test1234";
        $textbox_password = $this->byId('password');
        $textbox_password->click();
        $this->keys($test_text2);
        $this->assertEquals($textbox_password->value(), $test_text2);
         
        $this->byId('signin')->click();
        
        $this->waitForText("Your current projects");
        
        $this->waitForText("Currently no projects assigned.");
        
        $this->waitForText("Add a project now.");
        
        $this->waitForText("projects");
        $this->waitForText("contact us");
        $this->waitForText("sign off");

     }
    
    public function testLogout() {
	$this->url($this->values->getHomepage());

        $this->byCssSelector(".navblock a[href=\"\/account\/index\/login\"]")->click();
         
        $test_text = "vancouversage@gmail.com";
        $textbox_email = $this->byId('email');
        $textbox_email->click();
        $this->keys($test_text);
        $this->assertEquals($textbox_email->value(), $test_text);

        $test_text2 = "test1234";
        $textbox_password = $this->byId('password');
        $textbox_password->click();
        $this->keys($test_text2);
        $this->assertEquals($textbox_password->value(), $test_text2);
         
        $this->byId('signin')->click();
        
        $this->waitForText("Your current projects");
        $this->byCssSelector(".navblock a[href=\"\/account\/index\/signoff\"]")->click();
             
        $this->waitForText("Signed out");
        $this->waitForText("You're successfully signed out of your TheiaLive account. If you wish to proceed, you need to sign in again.");
        $this->waitForText("The TheiaLive Team");
        
        $this->waitForText("sign up");
        $this->waitForText("login");
        $this->waitForText("contact us");
     }

     /**
      * Tests the field verification.
      */
    public function testForgotPW() {
	$this->url($this->values->getHomepage());

        $this->byCssSelector(".navblock a[href=\"\/account\/index\/login\"]")->click();
         
        $test_text = "vancouversage@gmail.com";
        $textbox_email = $this->byId('email');
        $textbox_email->click();
        $this->keys($test_text);
        $this->assertEquals($textbox_email->value(), $test_text);

        $test_text2 = "password";
        $textbox_password = $this->byId('password');
        $textbox_password->click();
        $this->keys($test_text2);
        $this->assertEquals($textbox_password->value(), $test_text2);
         
        $Forgot_text = "Forgot your password";
        $this->waitForText($Forgot_text);
        $this->byCssSelector(".content a[title=\"Forgot your password\"]")->click();
        
        $Reset_text = "Reset your password";
        $this->waitForText($Reset_text);
     }
 }

 