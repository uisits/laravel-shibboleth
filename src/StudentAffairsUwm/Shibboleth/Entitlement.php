<?php
namespace StudentAffairsUwm\Shibboleth;

use InvalidArgumentException;
use Request;

class Entitlement
{
    /**
     * Returns TRUE if current user has entitlement.
     * NOTE: does not work with Shibalike. Only with production Shibboleth.
     *
     * @param  string $entitlement
     * @return bool
     */
    public static function has($entitlement)
    {
        if (empty($entitlement)) {
            throw new \InvalidArgumentException('Entitlement must not be empty.');
        }

        $variable = config('shibboleth.entitlement');

        foreach (explode(';', Request::server($variable)) as $given) {
            if ($given === $entitlement) {
                return true;
            }
        }

        return false;
    }
}
