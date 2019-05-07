<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwCheck - Display checkpoint sign (451-539)
 *     CALL      SWCHECK,(CL)
 *
 * @package App\Swiss
 ************************************************************************
 *                                                                      *
 *  Name     - SWCHECK                                                  *
 *                                                                      *
 *  Input    - Current location ordinal                                 *
 *                                                                      *
 *  Output   - Updated score                                            *
 *                                                                      *
 *  Function - If we are at a checkpoint, display signpost and          *
 *             update score.                                            *
 *                                                                      *
 *  Method   - For each possible checkpoint (there are D'16 of them),   *
 *               Call SWSLOC to get checkpoint descriptor (SW@CHECK)    *
 *               Compare SW@ND to current location for a match (we      *
 *                 have set up the checkpoint descriptor so that the    *
 *                 travel-North-destination (SW@ND) points to this      *
 *                 checkpoint's location)                               *
 *               If we match,                                           *
 *                 Display checkpoint text (the signpost)               *
 *                 Form a 1-bit mask corresponding to the checkpoint    *
 *                 Merge the mask into SCORE (accomplish this by        *
 *                   clearing the target bit in SCORE and adding the    *
 *                   mask to SCORE).  With this method, we do not care  *
 *                   how many times the checkpoint is seen.             *
 *                 Return                                               *
 *               Endif                                                  *
 *             Endloop                                                  *
 *             Return                                                   *
 *                                                                      *
 *  Registers- SCORE - A bit mask, with bit 2**(n-1) corresponding to   *
 *                     checkpoint n.  There are 16 checkpoints,         *
 *                     numbered 1 - 16. (Input and output)              *
 *                                                                      *
 *             CL    - Current location (input)                         *
 *                                                                      *
 *             BA    - Base address (offset) of the checkpoint table    *
 *             SW    - L.M. address of checkpoint descriptor (SW@)      *
 *             TX    - L.M. address of description text                 *
 *             SC    - Copy of SCORE at exit for display purposes       *
 *             C2    - Copy of CL at exit for display purposes          *
 *             CK    - Checkpoint number                                *
 *             ND    - SW@ND for this checkpoint (i.e. this             *
 *                     checkpoint's location)                           *
 *             MK    - Bit mask for this checkpoint (single bit)        *
 *                                                                      *
 ************************************************************************
 */
class SwCheck {
    public static function run(string $location): void {
        $checkpoints = array_combine(SwissCom::CKMIC, SwissCom::SW__ARAB);
        if (!array_key_exists($location, $checkpoints)) {
            return;
        }

        Score::markLocationReached($location);
        $message = 'The following sign stands before you: Checkpoint '.$checkpoints[$location];
        Kernel::MSG($message);
    }
}
