<?php
## Background
require_once 'vendor/autoload.php';


class WebDriverSignIn extends Sauce\Sausage\WebDriverTestCase
{
    
    public static $browsers = array(
        // run FF15 on Windows 8 on Sauce
        array(
        	'name' => 'Google - Search Henry Chan',
        	'build' => 'R2D2',
        	'browserName' => 'firefox',
        	'desiredCapabilities' => array(
                'version' => '15',
                'platform' => 'Windows 2012',
            )
        )//,
        // run Chrome on Linux on Sauce
        //array(
            //'browserName' => 'chrome',
            //'desiredCapabilities' => array(
                //'platform' => 'Linux'
          //)
        //),
        // run Chrome locally
        //array(
            //'browserName' => 'chrome',
            //'local' => true,
            //'sessionStrategy' => 'shared'
        //)
    );

    public function setUp()
    {
        parent::setUp();
        $this->setBrowserUrl('http://stage.pendodev.com/');
        
        
    }


public function spinAssertContains($contained, $container, $timeout = 1000)
{
    $test = function($contained, $container) use ($self) {
        try {
            $this->assertContains($contained, $container);
            return true;
        } catch (Exception $e) {
            return false;
        }
    };

    $msg = "'$container' did not contain '$contained'";

    $this->spinAssert($msg, $test, array($contained, $container), $timeout);
}
    public function testSignIn()
    {      
        $test_email = "henry.chan+pendo3@invokelabs.com";
        $test_password = "123123";
             
    	$this->url('http://stage.pendodev.com/');
        $SignInBtn = $this->byCss(".util-nav .btn[data-nav-item=sign-in]");
        $SignInBtn->click();
//        $this->assertContains("Pendo Rent | Sign in to your account", $this->title());
  
        $this->byId('sign-in-email')->value($test_email);
        $this->byId('sign-in-password')->value($test_password);
//        $password= $this->byId('sign-in-password');
//        $password->keys($test_password);    
        $SignInFromBtn = $this->byCss("#frm-sign-in .submit-button[type=Submit]"); 
        $SignInFromBtn->submit();
       //    $SignInBtn2 = "xpath=.//*[@id="frm-sign-in']/div[2]/input";
//      $this->click($SignInBtn2)    
//        $this->assertContains("Pendo Rent | Dashboard", $this->title());

     //   $this->assertTextPresent("Add property);

        $driver = $this;
        $search = 'My Properties';
        $spin_test = function() use ($search, $driver) {
            $text = $driver->getBodyText();
            return (strpos($text, $search) !== FALSE);
        };
        $this->spinAssert($search, $spin_test);
        
    $AddPropertyBtn = $this->byId("link-property-list-add");
 $AddPropertyBtn->click();     
//        
//          //      $driver = $this;
//        $search2 = 'Step 1 - New Property';
//        $spin_test2 = function() use ($search2, $driver) {
//            $text = $driver->getBodyText();
//            return (strpos($text, $search2) !== FALSE);
//        };
//        $this->spinAssert($search2, $spin_test2);
        
        
        
    }

  

}
