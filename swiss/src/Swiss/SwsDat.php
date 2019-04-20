<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsDat - Swiss data (775-1494)
 *
 * @package App\Swiss
 *
 * SW@BEGIN, SW@TRAVL, SW@SNIDE are word offsets showing where the corresponding 2-word descriptors begin.
 *
 * SW@NE and SW@FINAL tell how many locations, and where the last one is.
 */
class SwsDat {
    public const SW_BEGIN = [
        'ZURICH' => [

        ],
        'PARIS' => [

        ],
        'GENEVA' => [

        ],
        'MILAN' => [

        ],
        'BASEL' => [

        ],
        'LUZERN' => [

        ],
        'NEUCHAT' => [

        ],
        'MONTREU' => [

        ],
        'JUNGFRA' => [

        ],
        'SCHWYZ' => [

        ],
        'ZUG' => [

        ],
        'LOTSCHB' => [

        ],
        'SPIEZ' => [

        ],
        'BRIG' => [

        ],
        'ZERMATT' => [

        ],
        'INTERLA' => [

        ],
        'LAUSANN' => [

        ],
        'BERN' => [

        ],
        'THUN' => [

        ],
        'ENTRANC' => [

        ],
        'COURT' => [

        ],
        'GALLERY' => [

        ],
        'PRISON' => [

        ],
        'TOYS' => [

        ],
        'ATTIC' => [

        ],
        'NVIEW' => [

        ],
        'SVIEW' => [

        ],
        'EVIEW' => [

        ],
        'WVIEW' => [

        ],
        'STAIRS' => [

        ],
        'ARTIFAC' => [

        ],
        'KITCHEN' => [

        ],
        'TRAP' => [

        ],
        'LEVEL1' => [

        ],
        'LEVEL2' => [

        ],
        'MAZE01' => [

        ],
        'MAZE02' => [

        ],
        'MAZE03' => [

        ],
        'MAZE04' => [

        ],
        'MAZE05' => [

        ],
        'MAZE06' => [

        ],
        'MAZE07' => [

        ],
        'MAZE08' => [

        ],
        'MAZE09' => [

        ],
        'MAZE10' => [

        ],
        'MAZE11' => [

        ],
        'MAZE12' => [

        ],
        'MAZE13' => [

        ],
        'MAZE14' => [

        ],
        'MAZE15' => [

        ],
        'MAZE16' => [

        ],
        'VIEW' => [

        ],
        'SIGNS' => [

        ],
        'EXITSTA' => [

        ],
        'GLOWING' => [

        ],
        'HEAP' => [

        ],
        'WARNING' => [

        ],
        'TEST_01' => [

        ],
        'TEST_02' => [

        ],
        'TEST_03' => [

        ],
        'TEST_04' => [

        ],
        'TEST_05' => [

        ],
        'TEST_06' => [

        ],
        'TEST_07' => [

        ],
        'TEST_08' => [

        ],
        'TEST_09' => [

        ],
        'TEST_10' => [

        ],
        'TEST_11' => [

        ],
        'TEST_12' => [

        ],
        'TEST_13' => [

        ],
        'TEST_14' => [

        ],
        'TEST_15' => [

        ],
        'TEST_16' => [

        ],
        'EXAM' => [

        ],
        'VICTORY' => [

        ],
        'KERNEL' => [

        ],
    ];
    public const SW_EXAM = 'EXAM'; // SW@EXAM

    public const SW_BEGIN_ROUTE = [
        'EXTRA' => [

        ],
        'ZURICH' => [

        ],
        'PARIS' => [

        ],
        'GENEVA' => [

        ],
        'MILAN' => [

        ],
        'BASEL' => [

        ],
        'LUZERN' => [

        ],
        'NEUCHAT' => [

        ],
        'MONTREU' => [

        ],
        'JUNGFRA' => [

        ],
        'SCHWYZ' => [

        ],
        'ZUG' => [

        ],
        'LOTSCHB' => [

        ],
        'SPIEZ' => [

        ],
        'BRIG' => [

        ],
        'ZERMATT' => [

        ],
        'INTERLA' => [

        ],
        'LAUSANN' => [

        ],
        'BERN' => [

        ],
        'THUN' => [

        ],
        'ENTRANC' => [

        ],
        'COURT' => [

        ],
        'GALLERY' => [

        ],
        'PRISON' => [

        ],
        'TOYS' => [

        ],
        'ATTIC' => [

        ],
        'NVIEW' => [

        ],
        'SVIEW' => [

        ],
        'EVIEW' => [

        ],
        'WVIEW' => [

        ],
        'STAIRS' => [

        ],
        'ARTIFAC' => [

        ],
        'KITCHEN' => [

        ],
        'TRAP' => [

        ],
        'LEVEL1' => [

        ],
        'LEVEL2' => [

        ],
        'MAZE01' => [

        ],
        'MAZE02' => [

        ],
        'MAZE03' => [

        ],
        'MAZE04' => [

        ],
        'MAZE05' => [

        ],
        'MAZE06' => [

        ],
        'MAZE07' => [

        ],
        'MAZE08' => [

        ],
        'MAZE09' => [

        ],
        'MAZE10' => [

        ],
        'MAZE11' => [

        ],
        'MAZE12' => [

        ],
        'MAZE13' => [

        ],
        'MAZE14' => [

        ],
        'MAZE15' => [

        ],
        'MAZE16' => [

        ],
        'VIEW' => [

        ],
        'SIGNS' => [

        ],
        'EXITSTA' => [

        ],
        'GLOWING' => [

        ],
        'HEAP' => [

        ],
        'WARNING' => [

        ],
        'TEST01' => [

        ],
        'TEST02' => [

        ],
        'TEST03' => [

        ],
        'TEST04' => [

        ],
        'TEST05' => [

        ],
        'TEST06' => [

        ],
        'TEST07' => [

        ],
        'TEST08' => [

        ],
        'TEST09' => [

        ],
        'TEST10' => [

        ],
        'TEST11' => [

        ],
        'TEST12' => [

        ],
        'TEST13' => [

        ],
        'TEST14' => [

        ],
        'TEST15' => [

        ],
        'TEST16' => [

        ],
        'EXAM' => [

        ],
        'VICTORY' => [

        ],
        'KERNEL' => [

        ],
    ];

    public const SW_TRAVL = [
        'PASS' => [

        ],
        'SCORE' => [

        ],
        'QUIT' => [

        ],
        'WALK' => [

        ],
        'TRAIN' => [

        ],
        'ASIDE' => [

        ],
        'BACK' => [

        ],
    ];

    public const SW_SNIDE = [
        'SNIDE1' => [

        ],
        'SNIDE2' => [

        ],
        'SNIDE3' => [

        ],
        'SNIDE4' => [

        ],
        'SNIDE5' => [

        ],
        'SNIDE6' => [

        ],
        'SNIDE7' => [

        ],
        'SNIDE8' => [

        ],
    ];

    public static $sw_check = [];
    public static $sw_check_route = [];

    public static function init() {
        if (count(self::$sw_check)) {
            return;
        }
        foreach (SwissCom::SW__ENGL as $key => $value) {
            $tag = 'CHECK' . $value;
            self::$sw_check[$tag] = [
                'The following sign stands before you:',
                'Checkpoint '.SwissCom::SW__ARAB[$key],
            ];
            $room = SwissCom::CKMIC[$key];
            self::$sw_check_route[$tag] = [
                'N'=>$room,
                'S'=>$room,
                'E'=>$room,
                'WEST'=>$room,
                'U'=>$room,
                'D'=>$room,
            ];
        }
    }
}
