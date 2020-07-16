<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given que estoy en el inicio del sistema
     */
    public function queEstoyEnElInicioDelSistema()
    {
        $this->iAmOnHomepage();
    }

    /**
     * @When completo el campo :arg1 con :arg2
     */
    public function completoElCampoCon($arg1, $arg2)
    {
        $this->fillField($arg1, $arg2);
    }

    /**
     * @When presiono el botón :arg1
     */
    public function presionoElBoton($arg1)
    {
        $this->pressButton($arg1);
    }

    /**
     * @Then debería ver :arg1
     */
    public function deberiaVer($arg1)
    {
        $this->assertPageContainsText($arg1);
    }

}
