<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsMov - Display text showing travel (298-331)
 *     CALL      SWSMOV,(R!TV1)
 *
 * @package App\Swiss
 ************************************************************************
 *                                                                      *
 *  Name     - SWSMOV                                                   *
 *                                                                      *
 *  Input    - Mode of travel                                           *
 *                                                                      *
 *  Output   - None                                                     *
 *                                                                      *
 *  Function - Display text showing travel                              *
 *                                                                      *
 *  Method   - 1.  Call SWSLOC to get travel description                *
 *             2.  Display description                                  *
 *             3.  Deallocate description buffers                       *
 *             4.  Return                                               *
 *                                                                      *
 ************************************************************************
 */
class SwsMov {
    public static function run(int $mode): void {
        if (array_key_exists($mode, SwissCom::TRAVEL_KEY)) {
            $travelKey = SwissCom::TRAVEL_KEY[$mode];
            foreach (SwsDat::SW_TRAVL[$travelKey] as $message) {
                Kernel::MSG($message);
            }
        }
    }
}
