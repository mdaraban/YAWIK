<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */

namespace Yawik\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\MinkContext;
use Doctrine\Common\Inflector\Inflector;

/**
 * Class OrganizationContext
 *
 * @author  Anthonius Munthi <me@itstoni.com>
 * @since   0.29
 * @package Yawik\Behat
 */
class OrganizationContext implements Context
{
	use CommonContextTrait;
	
	/**
	 * @Given I go to my organization page
	 */
	public function iGoToMyOrganizationPage()
	{
		$url = $this->coreContext->generateUrl('/en/my/organization');
		$this->coreContext->iVisit($url);
	}
	
	/**
	 * @When I hover over name form
	 */
	public function iMouseOverOrganizationNameForm()
	{
		$locator = '#sf-nameForm .sf-summary';
		$this->coreContext->iHoverOverTheElement($locator);
	}
	
	/**
	 * @Given I go to create new organization page
	 */
	public function iGoToCreateNewOrganizationPage()
	{
		$this->visit('/en/organizations/edit');
	}
	
	/**
	 * @Given I go to organization overview page
	 */
	public function iGoToOrganizationOverviewPage()
	{
		$this->visit('/en/organizations');
	}
}