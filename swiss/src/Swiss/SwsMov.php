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
    public static function run(string $location): string {
        SwsDat::init();
        $title = SwsDat::$sw_begin[$location][0];
        $description = SwsDat::$sw_begin[$location][1];
        Kernel::MSG($title);
        Kernel::MSG($description);
        return $title;
    }
}
