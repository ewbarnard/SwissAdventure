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
            'Zurich',
            'You are in Zurich, gazing across Zurichsee to the Swiss Alps. ' .
            'Swissair flew you to Zurich a week ago. Your eyes drink their' .
            'fill, then you walk over to the Zurich Bahnhof and await your train. ' .
            'A gentle voice warns you:  Do not play SWISS on IOP-0.',
        ],
        'PARIS' => [
            'Paris',
            'You are in Paris.  Air France flew you here last Saturday. ' .
            'You have survived your week here, and purchased a ticket on ' .
            'the Orient Express as far as Bern, the Capitol of Switzerland. ' .
            'Your train awaits you.',
        ],
        'GENEVA' => [
            'Geneva',
            'You are in Geneva. Swissair brought you here a week ago, and ' .
            'you are ready to venture North to Lausanne or even beyond. ' .
            'Your train awaits you.',
        ],
        'MILAN' => [
            'Milan',
            'You are in Milano.  Alitalia brought you here a week ago. ' .
            'You are anxious to take your trip through the Alps to Switzerland ' .
            'and begin your Swiss adventure.  Your train awaits you.',
        ],
        'BASEL' => [
            'Basel',
            'You visit the Kunstmuseum to see the superb paintings of ' .
            'Holbein, Delacroix, Gauguin, Matisse, Ingres, Courbet, and ' .
            'Van Gogh.',
        ],
        'LUZERN' => [
            'Luzern',
            'You discover the Lion of Luzern is 30 feet high and 42 feet ' .
            'long. It was carved into a sandstone cliff in 1821. The Lion ' .
            'commemorates the bravery of those Swiss soldiers who defended ' .
            'Marie Antoinette during the French Revolution. The cliff is ' .
            'also the entrance to the Glacier Museum, which shows that palm ' .
            'trees once grew here. If you spend the evening here, listen ' .
            'for the beautiful alpenhorn notes rolling off the lake.',
        ],
        'NEUCHAT' => [
            'Neuchatel',
            'You have found the Suchard chocolate factory.  Tours must be ' .
            'arranged in advance, so call (038) 21-11-55 as soon as you ' .
            'arrive. While you wait, see the collection of mechanical ' .
            'dolls and music boxes at the city museum.',
        ],
        'MONTREU' => [
            'Montreux',
            'You are here to tour the Chillon castle, immortalized by ' .
            'Byron. Its dungeon was used as a model for many movies. ' .
            'You easily escape the Chillon dungeon--may you do as well in ' .
            'Schloss Thun.',
        ],
        'JUNGFRA' => [
            'Jungfraujoch',
            'You have found the highest railstation in Europe, at 11,333 ' .
            'feet. The Jungfrau, Eiger, and Monch display their deadly ' .
            'beauty. ' .
            'You must change trains here to continue the loop through ' .
            'Murren back to Interlaken.',
        ],
        'SCHWYZ' => [
            'Schwyz',
            'You have arrived in Schwyz. You travel one mile uphill from ' .
            'the railstation to visit the Staatsarkivmuseum, to see the ' .
            'thirteenth-century Oath of Eternal Alliance, the document ' .
            'which marks the founding of Switzerland. This village\'s name ' .
            'of course, became the country\'s name.',
        ],
        'ZUG' => [
            'Zug',
            'If you have friends who live here, you can get keys to the old ' .
            'city watchtowers. The watchtowers provide an interesting view ' .
            'of both history and the city. Try the rotel (a mild fish from ' .
            'Zug Lake) and kirsch made from local cherries.',
        ],
        'LOTSCHB' => [
            'Inside the Lotschberg Tunnel',
            'You are travelling through the 9-mile Lotschberg Tunnel. ' .
            'This trip includes crossing the Bietschtal Bridge, which takes ' .
            'the train 255 feet above the ravine it crosses. I hope you ' .
            'are sitting on the side of the train that faces the Brig rail-' .
            'station--you will see the beautiful mountain and farm scenery ' .
            'around Kandersteg and Frutigen.',
        ],
        'SPIEZ' => [
            'Spiez',
            'You have reached tiny Spiez on the Thunersee.  Tiny though it ' .
            'is, Spiez is a major crossroads for the Schweizer Bundesbahn ' .
            '(SBB), the world\'s best rail system.  Bern lies North beyond ' .
            'Thun; you may travel West past Zweizimmen in a series of hair-' .
            'pin bends (by train!) down to Montreux and Lausanne; Frutigen ' .
            'lies South on the way to the Lotschberg Tunnel and Brig. ' .
            'Interlaken and the Berner Oberland lie East. ' .
            'I hope you are hungry enough to walk down the hill to Hotel ' .
            'Krone and eat the Geschnetzeltes und Rosti. Be sure to walk ' .
            'another 15 minutes and visit the castle overlooking Lake Thun. ' .
            'You have but a single option surpassing this view of the lake ' .
            'and reflections of the surrounding mountains: Take the boat ' .
            'between Spiez and Thun.',
        ],
        'BRIG' => [
            'Brig',
            'You have reached Brig, in the Swiss Alps. You are along the ' .
            'Orient Express route.  The Brig-Visp-Zermatt cog railway ' .
            'begins here.',
        ],
        'ZERMATT' => [
            'Zermatt',
            'You are in Zermatt, at the base of the Matterhorn  Many ' .
            'famous mountain climbers are buried in the cemetery here.',
        ],
        'INTERLA' => [
            'Interlaken',
            'You are in Interlaken, on the Thunersee. You see many ' .
            'tourists here on their way to the Eiger, Monch, and Jungfrau.',
        ],
        'LAUSANN' => [
            'Lausanne',
            'You are in Lausanne, the first home of Cray Switzerland.',
        ],
        'BERN' => [
            'Bern',
            'You are in Bern, the capitol of Switzerland. Thun and the ' .
            'Thunersee are only twenty minutes away by train.',
        ],
        'THUN' => [
            'Thun',
            'You have reached the city of Thun.  You wander about the city. ' .
            'You find a covered stairway. Centuries of use have worn ' .
            'a groove in the stepstones. The stairway proceeds North up ' .
            'the hill.',
        ],
        'ENTRANC' => [
            'Entrance',
            'You have reached the Thun Castle entrance  Steps lead down ' .
            'to Stadt Thun.',
        ],
        'COURT' => [
            'Court yard',
            'You are in the castle courtyard. A cast iron cannon sits ' .
            'here. Wooden steps, placed along a stone wall, lead up and ' .
            'inside the castle.',
        ],
        'GALLERY' => [
            'Gallery',
            'This room is arranged like a museum gallery. Beautiful ' .
            'tapestries adorn the walls, stained glass windows cast colored ' .
            'shadows along the wood floor, and you see many medieval cos' .
            'tumes. You can tell from this room that the castle is ' .
            'arranged as a box, with a turret at each corner. A fire is ' .
            'laid in the enormous fireplace, but remains unlit.',
        ],
        'PRISON' => [
            'Prison cell',
            'The East turret, on this level, is used as a small prison ' .
            'cell  The walls and bed show the marks of various long-term ' .
            'residents. Chains attach to a large ring set in the floor.',
        ],
        'TOYS' => [
            'Toys',
            'This room is devoted to displays of medieval children\'s toys, ' .
            'along with arms and armour. You can see the thatched castle ' .
            'roof another 50 feet above you.  A wooden ladder leads to an ' .
            'attic and interior catwalk 40 feet above you.',
        ],
        'ATTIC' => [
            'Attic',
            'You are in the attic above the toy gallery. The catwalk leads ' .
            'around the whole castle wall, giving access to each ' .
            'observation turret.',
        ],
        'NVIEW' => [
            'North View',
            'This small room tops the North turret.  Arrow slits provide a ' .
            'wide view of the surrounding area.',
        ],
        'SVIEW' => [
            'South View',
            'This small room tops the South turret.  Arrow slits provide a ' .
            'wide view of the surrounding area.',
        ],
        'EVIEW' => [
            'East View',
            'This small room tops the East turret.  Arrow slits provide a ' .
            'wide view of the surrounding area.',
        ],
        'WVIEW' => [
            'West View',
            'This small room tops the West turret.  Arrow slits provide a ' .
            'wide view of the surrounding area.',
        ],
        'STAIRS' => [
            'Stairs down',
            'You are in the western turret, in a tight circular stairway.',
        ],
        'ARTIFAC' => [
            'Artifacts',
            'This room displays many items found in the surrounding area, ' .
            'including Roman coins, stone-age axes, and dog bones.',
        ],
        'KITCHEN' => [
            'Kitchen',
            'You have reached the castle kitchen. The room contains the ' .
            'usual implements. A large piling is set in the floor. It was ' .
            'once used for hauling goods up from the water gate on the ' .
            'Thunersee. The gate tunnel is caved in and bricked up. You ' .
            'see a trap door standing open in the South corner.',
        ],
        'TRAP' => [
            'Below trap door',
            'As you climb through the trap door and down the ladder, you ' .
            'note the ladder ends 9 feet above the stone floor below. Your ' .
            'weight upon the ladder releases a ratchet connected to the ' .
            'trap door above.  The door shuts and locks.',
        ],
        'LEVEL1' => [
            'Dungeon level 1',
            'You are obviously somewhere in the first dungeon level, but ' .
            'you can tell nothing else in the dark. Passages lead off in ' .
            'all directions except up.',
        ],
        'LEVEL2' => [
            'Dungeon level 2',
            'No one has ever returned from this deep in the dungeon. It ' .
            'will all be over soon.',
        ],
        'MAZE01' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisty, winding passages, nearly ' .
            'all alike.',
        ],
        'MAZE02' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisty, windy passages, nearly ' .
            'all alike.',
        ],
        'MAZE03' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisty, bendy passages, nearly ' .
            'all alike.',
        ],
        'MAZE04' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisty, bending passages, almost ' .
            'all alike.',
        ],
        'MAZE05' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisting, winding passages, almost ' .
            'all alike.',
        ],
        'MAZE06' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisting, windy passages, almost ' .
            'all alike.',
        ],
        'MAZE07' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisting, bendy passages, nearly ' .
            'all alike.',
        ],
        'MAZE08' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of twisting, bending passages, nearly ' .
            'all alike.',
        ],
        'MAZE09' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of winding, twisting passages, nearly ' .
            'all alike.',
        ],
        'MAZE10' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of winding, twisty passages, almost ' .
            'all alike.',
        ],
        'MAZE11' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of winding, bendy passages, almost ' .
            'all alike.',
        ],
        'MAZE12' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of winding, bending passages, almost ' .
            'all alike.',
        ],
        'MAZE13' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of windy, twisting passages, nearly ' .
            'all alike.',
        ],
        'MAZE14' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of windy, twisty passages, nearly ' .
            'all alike.',
        ],
        'MAZE15' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of windy, bendy passages, nearly ' .
            'all alike.',
        ],
        'MAZE16' => [
            'Glowing Cavern',
            'The cavern walls are covered with thick ' .
            'moss. The moss glows with a deep, ' .
            'purple, pulsating light. The moss provi' .
            'des enough light to see your ' .
            'surroundings. You are in a strange maze ' .
            'of windy, bending passages, nearly ' .
            'all alike.',
        ],
        'VIEW' => [
            'Viewing room',
            'You are standing on a plate glass window set in the floor. ' .
            'Through the window, you see a mound of gold, jewels, and ' .
            'system dumps. Encircling the stack (actually a heap) of ' .
            'treasure is a 10-foot wide ditch. Even though the ditch is ' .
            'extremely deep, you can see old bones and pocket protectors ' .
            'rotting at the bottom. A sign beside the encircling ditch ' .
            'reads "Winners Circle."',
        ],
        'SIGNS' => [
            'Signs of the times',
            'You see several checkpoint signs (sixteen of them) stacked in ' .
            'one corner of the room.',
        ],
        'EXITSTA' => [
            'EXIT stacks',
            'You see four stacks of EXIT signs here. Two stacks are green ' .
            'signs; the other two are red signs. The red signs are dimly ' .
            'glowing.',
        ],
        'GLOWING' => [
            'Glowing room',
            'The very air of this room is glowing with a bright red glow.',
        ],
        'HEAP' => [
            'Heap',
            'You have just been added to the scrap heap.  A sign on the ' .
            'wall reads, "ONLY LOSERS ARE ADDED TO THE HEAP." This room ' .
            'contains many pointers, all pointing to some piece of the ' .
            'heap. One pointer is now aimed at your nose. Several other ' .
            'nearby pointers point to a ladder leading up through the ' .
            'ceiling.',
        ],
        'WARNING' => [
            'Warning room',
            'This is the antechamber to the Hall of Testing.  Carved above ' .
            'the Eastern portal, you read: ' .
            'Only a Master Adventurer may traverse the Hall of Testing.',
        ],
        'EXAM' => [
            'Final examination room',
            'This is the final examination room.  A sign above the North ' .
            'portal reads, "Hall of Testing." The East portal reads ' .
            '"Scrap Heap." The West portal reads "Victory Circle." ' .
            'Your examination, naturally, will consist of 16 questions.',
        ],
        'VICTORY' => [
            'Victory circle',
            'You stand in a large room, surrounded by mounds, stacks, and ' .
            'heaps of treasure. This plethora of wealth is surrounded by a ' .
            'deep ditch. You cannot cross the ditch. Perhaps you will die ' .
            'with your wealth. ' .
            'A shimmering ladder appears from above. Though barely visible ' .
            'you might be able to climb it.',
        ],
        'KERNEL' => [
            'The Kernel',
            'You have now returned to the Kernel.  Congratulations! ' .
            '(Exit in any direction)',
        ],
    ];
    public const SW_EXAM = 'EXAM'; // SW@EXAM

    public const SW_BEGIN_ROUTE = '
EXTRA    SWISSTXS  N=LEVEL1,S=BERN,SM=SW$TRAIN,E=HEAP,WEST=LEVEL2,D=EXAM
ZURICH   SWISSTXS  S=BERN,SM=SW$TRAIN,WEST=BASEL,WM=SW$TRAIN
PARIS    SWISSTXS  E=BERN,EM=SW$TRAIN
GENEVA   SWISSTXS  N=LAUSANN,NM=SW$TRAIN
MILAN    SWISSTXS  N=BRIG,NM=SW$TRAIN
BASEL    SWISSTXS  S=BERN,SM=SW$TRAIN,WEST=NEUCHAT,WM=SW$TRAIN
LUZERN   SWISSTXS  N=ZUG,NM=SW$TRAIN,EM=SW$TRAIN,WM=SW$TRAIN,WEST=BERN,E=SCHWYZ
NEUCHAT  SWISSTXS  N=BASEL,NM=SW$TRAIN,EM=SW$TRAIN,E=BERN
MONTREU  SWISSTXS  E=SPIEZ,EM=SW$TRAIN,WM=SW$TRAIN,WEST=LAUSANN
JUNGFRA  SWISSTXS  EM=SW$BACK,WM=SW$BACK,WEST=INTERLA,E=INTERLA
SCHWYZ   SWISSTXS  N=ZUG,NM=SW$TRAIN,WM=SW$TRAIN,WEST=LUZERN
ZUG      SWISSTXS  S=SCHWYZ,SM=SW$TRAIN,WM=SW$TRAIN,WEST=LUZERN
LOTSCHB  SWISSTXS  N=SPIEZ,NM=SW$TRAIN,EM=SW$TRAIN,E=BRIG
SPIEZ    SWISSTXS  N=THUN,NM=SW$TRAIN,EM=SW$TRAIN,WM=SW$TRAIN,SM=SW$TRAIN,S=LOTSCHB,E=INTERLA,WEST=MONTREU
BRIG     SWISSTXS  S=ZERMATT,SM=SW$ASIDE,WEST=LOTSCHB,WM=SW$TRAIN
ZERMATT  SWISSTXS  N=BRIG,NM=SW$BACK
INTERLA  SWISSTXS  E=JUNGFRA,WEST=SPIEZ,EM=SW$ASIDE,WM=SW$TRAIN
LAUSANN  SWISSTXS  N=BERN,NM=SW$TRAIN,WEST=MONTREU,WM=SW$TRAIN
BERN     SWISSTXS  WEST=LAUSANN,WM=SW$TRAIN,S=THUN,SM=SW$TRAIN,E=LUZERN,EM=SW$TRAIN,N=BASEL,NM=SW$TRAIN
THUN     SWISSTXS  N=BERN,NM=SW$TRAIN,S=SPIEZ,SM=SW$TRAIN,U=ENTRANC
ENTRANC  SWISSTXS  S=THUN,D=THUN,E=COURT
COURT    SWISSTXS  WEST=ENTRANC,U=GALLERY
GALLERY  SWISSTXS  E=PRISON,N=TOYS,WEST=STAIRS,D=COURT,EM=SW$ASIDE
PRISON   SWISSTXS  WEST=GALLERY,WM=SW$BACK
TOYS     SWISSTXS  WEST=GALLERY,D=GALLERY,U=ATTIC
ATTIC    SWISSTXS  D=TOYS,N=NVIEW,S=SVIEW,E=EVIEW,NM=SW$ASIDE,SM=SW$ASIDE,EM=SW$ASIDE,WM=SW$ASIDE,WEST=WVIEW
NVIEW    SWISSTXS  S=ATTIC,SM=SW$BACK
SVIEW    SWISSTXS  N=ATTIC,NM=SW$BACK
EVIEW    SWISSTXS  WEST=ATTIC,WM=SW$BACK
WVIEW    SWISSTXS  E=ATTIC,EM=SW$BACK
STAIRS   SWISSTXS  E=GALLERY,D=ARTIFAC
ARTIFAC  SWISSTXS  U=STAIRS,D=KITCHEN
KITCHEN  SWISSTXS  U=ARTIFAC,D=TRAP,S=TRAP
TRAP     SWISSTXS  D=LEVEL1
LEVEL1   SWISSTXS  N=MAZE03,S=LEVEL1,E=LEVEL1,WEST=LEVEL1,D=LEVEL2
LEVEL2   SWISSTXS  N=LEVEL2,E=SIGNS,WEST=LEVEL2,D=LEVEL2,U=LEVEL1
MAZE01 SWISSTXS N=MAZE07,S=MAZE01,E=MAZE02,WEST=MAZE01,D=MAZE01,U=MAZE06
MAZE02 SWISSTXS N=MAZE02,S=MAZE02,E=MAZE08,WEST=MAZE07,D=MAZE02,U=MAZE01
MAZE03 SWISSTXS N=MAZE08,S=MAZE03,E=MAZE04,WEST=MAZE03,D=MAZE09,U=LEVEL1
MAZE04 SWISSTXS N=MAZE04,S=MAZE04,E=MAZE05,WEST=MAZE04,D=MAZE10,U=MAZE03
MAZE05 SWISSTXS N=MAZE10,S=MAZE05,E=MAZE10,WEST=MAZE04,D=MAZE05,U=MAZE05
MAZE06 SWISSTXS N=MAZE15,S=MAZE11,E=MAZE07,WEST=MAZE06,D=MAZE15,U=MAZE01
MAZE07 SWISSTXS N=MAZE07,S=MAZE02,E=MAZE07,WEST=MAZE06,D=MAZE07,U=MAZE01
MAZE08 SWISSTXS N=MAZE13,S=MAZE08,E=MAZE14,WEST=MAZE02,D=MAZE08,U=MAZE08
MAZE09 SWISSTXS N=MAZE14,S=MAZE09,E=MAZE10,WEST=MAZE09,D=MAZE09,U=MAZE09
MAZE10 SWISSTXS N=MAZE14,S=MAZE10,E=MAZE10,WEST=MAZE09,D=MAZE05,U=MAZE04
MAZE11 SWISSTXS N=MAZE11,S=MAZE06,E=MAZE12,WEST=MAZE11,D=MAZE11,U=MAZE11
MAZE12 SWISSTXS N=MAZE12,S=MAZE12,E=MAZE13,WEST=MAZE11,D=MAZE12,U=MAZE12
MAZE13 SWISSTXS N=MAZE13,S=MAZE08,E=MAZE13,WEST=MAZE12,D=MAZE13,U=MAZE13
MAZE14 SWISSTXS N=MAZE14,S=MAZE09,E=MAZE10,WEST=MAZE08,D=MAZE14,U=MAZE14
MAZE15 SWISSTXS N=MAZE15,S=MAZE15,E=MAZE16,WEST=MAZE15,D=MAZE15,U=MAZE06
MAZE16 SWISSTXS   N=VIEW,S=MAZE16,E=MAZE16,WEST=MAZE15,D=MAZE16,U=MAZE16
VIEW   SWISSTXS S=MAZE16
SIGNS  SWISSTXS E=EXITSTA,WEST=LEVEL2
EXITSTA  SWISSTXS  E=GLOWING,WEST=SIGNS
GLOWING  SWISSTXS  N=HEAP,E=WARNING,WEST=EXITSTA
HEAP     SWISSTXS  N=HEAP,S=HEAP,E=HEAP,WEST=HEAP,D=HEAP,U=KERNEL
WARNING  SWISSTXS  E=TEST01,WEST=GLOWING
TEST01   SWISSTXS  E=TEST02,EM=SW$SCORE,WEST=WARNING
TEST02   SWISSTXS  E=TEST03,EM=SW$SCORE,WEST=TEST01
TEST03   SWISSTXS  E=TEST04,EM=SW$SCORE,WEST=TEST02
TEST04   SWISSTXS  E=TEST05,EM=SW$SCORE,WEST=TEST03
TEST05   SWISSTXS  E=TEST06,EM=SW$SCORE,WEST=TEST04
TEST06   SWISSTXS  E=TEST07,EM=SW$SCORE,WEST=TEST05
TEST07   SWISSTXS  E=TEST08,EM=SW$SCORE,WEST=TEST06
TEST08   SWISSTXS  E=TEST09,EM=SW$SCORE,WEST=TEST07
TEST09   SWISSTXS  E=TEST10,EM=SW$SCORE,WEST=TEST08
TEST10   SWISSTXS  E=TEST11,EM=SW$SCORE,WEST=TEST09
TEST11   SWISSTXS  E=TEST12,EM=SW$SCORE,WEST=TEST10
TEST12   SWISSTXS  E=TEST13,EM=SW$SCORE,WEST=TEST11
TEST13   SWISSTXS  E=TEST14,EM=SW$SCORE,WEST=TEST12
TEST14   SWISSTXS  E=TEST15,EM=SW$SCORE,WEST=TEST13
TEST15   SWISSTXS  E=TEST16,EM=SW$SCORE,WEST=TEST14
TEST16   SWISSTXS  E=EXAM,EM=SW$SCORE,WEST=TEST15
EXAM     SWISSTXS  N=TEST16,E=HEAP,WEST=VICTORY,WM=SW$PASS
VICTORY  SWISSTXS  U=KERNEL
KERNEL   SWISSTXS  N=KERNEL,S=KERNEL,E=KERNEL,WEST=KERNEL,D=KERNEL,U=KERNEL';

    public const SW_TRAVL = [
        'PASS' => [
            'You have passed.',
        ],
        'SCORE' => [
            'Proceed, O Master Adventurer.',
        ],
        'QUIT' => [
            'Alert! Alert! ' .
            'Adventurer is trying to leave! ' .
            'You hear a loud shriek. . . ' .
            'A deep voice intones: ' .
            'Begone, adventurer. Return again when you dare. ' .
            'Your surroundings vanish.  So do you...',
        ],
        'WALK' => [
            'Proceeding . . .',
        ],
        'TRAIN' => [
            'You board the HYPERtrain and soon reach ' .
            'your destination.',
        ],
        'ASIDE' => [
            'You make a side trip . . .',
        ],
        'BACK' => [
            'You head back whence you came . . .',
        ],
    ];

    public const SW_SNIDE = [
        'SNIDE1' => [
            'You may not go that way.',
        ],
        'SNIDE2' => [
            'Your attempt to enter forbidden territory is ' .
            'quickly repulsed.',
        ],
        'SNIDE3' => [
            'No way.',
        ],
        'SNIDE4' => [
            'That is a restricted area.',
        ],
        'SNIDE5' => [
            'Go somewhere else.',
        ],
        'SNIDE6' => [
            'Such a move would put you in the TWILIGHT ZONE.',
        ],
        'SNIDE7' => [
            'Foolish move.',
        ],
        'SNIDE8' => [
            'You try and try, but cannot force your way through ' .
            'the wall.',
        ],
    ];

    public static $sw_check = [];
    public static $sw_check_route = [];
    public static $sw_begin = [];
    public static $sw_begin_route = [];

    public static function reset() {
        self::$sw_begin = [];
        self::$sw_begin_route = [];
        self::$sw_check = [];
        self::$sw_check_route = [];
    }

    public static function init() {
        if (count(self::$sw_check)) {
            return;
        }
        self::reset();

        self::init_sw_begin();
        self::init_sw_begin_route();
    }

    private static function init_sw_begin(): void {
        self::$sw_begin = self::SW_BEGIN;
        foreach (SwissCom::SW__ENGL as $key => $value) {
            $tag = 'CHECK' . $value;
            $name = SwissCom::SW__ARAB[$key];
            self::$sw_check[$tag] = [
                'The following sign stands before you:',
                'Checkpoint ' . $name,
            ];
            $room = SwissCom::CKMIC[$key];
            self::$sw_check_route[$tag] = [
                'N' => $room,
                'S' => $room,
                'E' => $room,
                'WEST' => $room,
                'U' => $room,
                'D' => $room,
            ];

            $tag = 'TEST' . $value;
            self::$sw_begin[$tag] = [
                'Testing Station No. ' . $value,
                'A pulsing curtain of light blocks your passage to the East. ' .
                'A red sign on the curtain reads: ' .
                'You must first find CHECKPOINT ' . $name,
            ];
        }
    }

    private static function init_sw_begin_route() {
        $lines = preg_split('/\n/', trim(self::SW_BEGIN_ROUTE));
        foreach ($lines as $line) {
            if (preg_match('/^(\w+)\s+SWISSTXS\s+(\S+)/', $line, $matches)) {
                $location = $matches[1];
                $routes = explode(',', $matches[2]);
                foreach ($routes as $route) {
                    list($direction, $destination) = explode('=', $route);
                    self::$sw_begin_route[$location][$direction] = $destination;
                }
            }
        }
    }
}
