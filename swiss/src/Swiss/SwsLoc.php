<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class SwsLoc - Read a description entry into Local Memory (210-297)
 *     CALL      SWSLOC,(BA,CL,RO=SW,RO=TX)
 *
 * Probably not needed.
 *
 * @package App\Swiss
 ************************************************************************
 *                                                                      *
 *  Name     - SWSLOC                                                   *
 *                                                                      *
 *  Input    - SW@ base offset, words                                   *
 *             Entry ordinal (1-relative)                               *
 *                                                                      *
 *  Output   - Local Memory pointer to SW@ entry                        *
 *             Local Memory pointer to text                             *
 *                                                                      *
 *  Function - Read a description entry into Local Memory               *
 *                                                                      *
 *  Method   - 1.  ERRIF SW@LE,NE,8                                     *
 *             2.  Allocate SW@LE parcels Local Memory                  *
 *             3.  Determine SWSDAT overlay address in Buffer Memory    *
 *             4.  Read 8 parcels/2 words to Local Memory buffer.       *
 *                 MOS address = (ordinal-1)*2 + SW@ base offset +      *
 *                                               SWSDAT address.        *
 *             5.  Determine text offset and length                     *
 *             6.  Allocate [text length*4]-parcel Local Memory buffer  *
 *             7.  Read in text                                         *
 *             8.  Return:  Pointers to both buffers                    *
 *                                                                      *
 ************************************************************************
 */
class SwsLoc {

}
