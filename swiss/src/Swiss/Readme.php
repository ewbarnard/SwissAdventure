<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class Readme
 *
 * @package App\Swiss
 *
 * Class Swiss - Swiss adventure, root overlay (13-63)
 * Class SwShow - Display location text, get new location (64-209)
 * Class SwsLoc - Read a description entry into Local Memory (210-297)
 * Class SwsMov - Display text showing travel (298-331)
 * Class SwsNex - Get new valid location (332-450)
 * Class SwCheck - Display checkpoint sign (451-539)
 * Class SwsNo - Display snide remark (540-578)
 * Class SwsWel - Print welcome message and instructions (579-650)
 * Class SwissCom - Common deck - Definitions for Swiss Adventure overlays (651-774)
 * Class SwsDat - Swiss data (775-1494)
 *
 * Development Order:
 *   Swswel  (done)
 *   Swsloc  (not needed)
 *   Swsmov  (done)
 *   Swsno   (done)
 *   Swsnex  (needs to be redone)
 *   Swcheck
 *   Swshow
 *   Swiss
 *
 * Calls
 *
 *   SWISS
 *     CALL      SWSWEL
 *     CALL      SWSHOW,(R!WHERE,RO=NEXT,RO=MODE)
 *     CALL       SWSHOW,(R!WHERE,RO=NEXT,RO=MODE)
 *
 *   SWSHOW
 *     CALL      SWSLOC,(BA,CL,RO=SW,RO=TX)
 *     CALL      SWCHECK,(CL)
 *     CALL      SWSNEX,(SW,CL,RO=NL1,RO=TV1)
 *     CALL      SWSMOV,(R!TV1)
 *
 *   SWSLOC
 *
 *   SWSMOV
 *     CALL      SWSLOC,(R!MOSOFF,TM,RO=LMDESC,RO=LMTXT)
 *
 *   SWSNEX
 *     CALL      SWSNO
 *
 *   SWCHECK
 *     CALL      SWSLOC,(BA,CK,RO=SW,RO=TX)
 *
 *   SWSNO
 *     CALL      SWSLOC,(AB,AA,RO=LMDESC,RO=LMTXT)
 *
 *   SWSWEL
 *
 * Tree
 *
 *   Swiss
 *     Swswel
 *     Swshow
 *       Swsloc
 *       Swcheck
 *         Swsloc
 *       Swsnex
 *         Swsno
 *           Swsloc
 *       Swsmov
 *         Swsloc
 *
 */
class Readme {

}
