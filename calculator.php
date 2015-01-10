<?php

require_once "database.php";
require_once "greatcircle.php";

class Calculator
{
    // Return the distance (in kilometers) between two postcodes.
    public function distance($postcode1, $postcode2)
    {
        global $latlon;
        if (!array_key_exists($postcode1, $latlon)) return NULL;
        $fr = $latlon[$postcode1];
        if (!array_key_exists($postcode2, $latlon)) return NULL;
        $to = $latlon[$postcode2];
        list($frlat, $frlon) = $fr;
        list($tolat, $tolon) = $to;
        return GreatCircle::distance($frlat, $frlon, $tolat, $tolon);
    }
}

/*  TODO: Port from python

    def postcodesaround(self, postcode, radius):
        """ Determine which postcodes are in geographical distance of the given postcode.
        Radius is specified in kilometers.
        The list consists of tuples (postcode, distance to the postcode). """
        if not postcode in database.latlon:
            return []
        within = []
        for topostcode in database.latlon:
            d = self.distance(postcode, topostcode)
            if d <= radius:
                within.append((topostcode, d))
        return sorted(within)
*/
?>
