<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwissCom - Common deck - Definitions for Swiss Adventure overlays (651-774)
 *
 * @package App\Swiss
 */
class SwissCom {

    // 665 Travel modes (SW$xxxx)

    public const SW_UNDEF = 0;                  // Unknown mode of travel
    public const SW_PASS = self::SW_UNDEF + 1;  // Needs to have passed final exam
    public const SW_SCORE = self::SW_PASS + 1;  // Needs good score to proceed
    public const SW_QUIT = self::SW_SCORE + 1;  // Adventurer wants to quit
    public const SW_WALK = self::SW_QUIT + 1;   // Travel on foot
    public const SW_TRAIN = self::SW_WALK + 1;  // By train
    public const SW_ASIDE = self::SW_TRAIN + 1; // Travel to different IOP
    public const SW_BACK = self::SW_ASIDE + 1;  // Return to original IOP
    public const SW_MAX = self::SW_BACK;        // Number of codes

    // 677 Micros for echo parameter lists (SW%xxxx)

    public const SW__DIREC = ['N', 'E', 'S', 'WEST', 'U', 'D'];
    public const SW__DIR2 = ['N', 'E', 'S', 'W', 'U', 'D'];
    public const SW__MODE = ['NM', 'EM', 'SM', 'WM', 'UM', 'DM'];
    public const SW__DIR0 = ['N' => 'X', 'E' => 'X', 'S' => 'X', 'WEST' => 'X', 'U' => 'X', 'D' => 'X'];
    public const SW__MODEW = [
        'NM' => self::SW_WALK,
        'EM' => self::SW_WALK,
        'SM' => self::SW_WALK,
        'WM' => self::SW_WALK,
        'UM' => self::SW_WALK,
        'DM' => self::SW_WALK,
    ];

    // 687 Location descriptor table entry (SW@)
    // 706 SWISSTXS macro
    // 742 SWISSETX macro
    // 754 SWISSTXT macro

    // 760 Checkpoint micros (SW$ENGL, SW$ARAB, CKMIC)

    public const SW__ENGL = [
        '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16',
    ];
}
