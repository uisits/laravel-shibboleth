<?php
use Orchestra\Testbench\TestCase;
use StudentAffairsUwm\Shibboleth\Tests\Stubs\Setup;
use StudentAffairsUwm\Shibboleth\Entitlement;
use App\User;

class EntitlementTest extends TestCase
{
    use Setup;

    public function test_checks_for_current_entitlement()
    {
        // $_SERVER fixture set in
        // StudentAffairsUwm\Shibboleth\Tests\Stubs\Setup::setUp();

        $entitlement = 'urn:mace:uark.edu:ADGroups:Computing Services:Something:Somesuch-WCOB';

        $this->assertTrue(Entitlement::has($entitlement));
    }

    public function test_checks_for_missing_entitlement()
    {
        // $_SERVER fixture set in
        // StudentAffairsUwm\Shibboleth\Tests\Stubs\Setup::setUp();

        $entitlement = 'urn:mace:uark.edu:ADGroups:Computing Services:Nothing:Nonesuch-WCOB';

        $this->assertFalse(Entitlement::has($entitlement));
    }

    public function test_checks_for_complete_entitlement()
    {
        // sub-string is missing trailing 'B'
        $entitlement = 'urn:mace:uark.edu:ADGroups:Computing Services:Something:Somesuch-WCO';

        $this->assertFalse(Entitlement::has($entitlement));
    }
}
