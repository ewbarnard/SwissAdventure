<?php
declare(strict_types=1);

namespace App\Swiss;

/**
 * Class MachineState
 *
 * @package App\Swiss
 * @method static MachineState getInstance()
 */
class MachineState extends Layered {
    public const SECTION_EXAM = 'exam';
    public const SECTION_NORMAL = 'normal';
    public const SECTION_WELCOME = 'welcome';

    public const STATUS_BEGIN = 'begin';
    public const STATUS_FAIL = 'exam_failed';
    public const STATUS_NEED_INPUT = 'need_input';
    public const STATUS_PASS = 'exam_passed';
    public const STATUS_RECEIVED_INPUT = 'received_input';
    public const STATUS_TRAVEL = 'normal_travel';

    private const MACHINE_KEY_EXAM = 'exam';
    private const MACHINE_KEY_LOCATION = 'location';
    private const MACHINE_KEY_MESSAGES = 'messages';
    private const MACHINE_KEY_SECTION = 'section';
    private const MACHINE_KEY_STATUS = 'status';
    private const MACHINE_KEY_STATIONS_REACHED = 'stationsReached';
    private const MACHINE_KEY_USER_INPUT = 'userInput';

    private $exam = '';
    private $location = '';
    private $messages = [];
    private $section = '';
    private $status = '';
    private $userInput = '';

    public static function setExam(string $exam): void {
        static::getInstance()->runSetExam($exam);
    }

    private function runSetExam(string $exam): void {
        $this->exam = $exam;
    }

    public static function getExam(): string {
        return static::getInstance()->runGetExam();
    }

    private function runGetExam(): string {
        return $this->exam;
    }

    public static function setSection(string $section): void {
        static::getInstance()->runSetSection($section);
    }

    private function runSetSection(string $section): void {
        $this->section = $section;
    }

    public static function getSection(): string {
        return static::getInstance()->runGetSection();
    }

    private function runGetSection(): string {
        return $this->section;
    }

    public static function addMessage(string $message): void {
        static::getInstance()->runAddMessage($message);
    }

    private function runAddMessage(string $message): void {
        $this->messages[] = $message;
    }

    public static function getMessages(): array {
        return static::getInstance()->runGetMessages();
    }

    private function runGetMessages(): array {
        return $this->messages;
    }

    public static function setUserInput(string $userInput): void {
        static::getInstance()->runSetUserInput($userInput);
    }

    private function runSetUserInput(string $userInput): void {
        $this->userInput = $userInput;
    }

    public static function getUserInput(): string {
        return static::getInstance()->runGetUserInput();
    }

    private function runGetUserInput(): string {
        return $this->userInput;
    }

    public static function getStatus(): string {
        return static::getInstance()->runGetStatus();
    }

    private function runGetStatus(): string {
        return $this->status;
    }

    public static function getLocation(): string {
        return static::getInstance()->runGetLocation();
    }

    private function runGetLocation(): string {
        return $this->location;
    }

    public static function setStatus(string $status): void {
        static::getInstance()->runSetStatus($status);
    }

    private function runSetStatus(string $status): void {
        $this->status = $status;
    }

    public static function setLocation(string $location): void {
        static::getInstance()->runSetLocation($location);
    }

    private function runSetLocation(string $location): void {
        $this->location = $location;
    }

    public static function pauseMachine(): string {
        return static::getInstance()->runPauseMachine();
    }

    private function runPauseMachine(): string {
        $machine = [
            self::MACHINE_KEY_EXAM => $this->runGetExam(),
            self::MACHINE_KEY_LOCATION => $this->runGetLocation(),
            self::MACHINE_KEY_MESSAGES => $this->runGetMessages(),
            self::MACHINE_KEY_SECTION => $this->runGetSection(),
            self::MACHINE_KEY_STATIONS_REACHED => Score::getStationsReached(),
            self::MACHINE_KEY_STATUS => $this->runGetStatus(),
            self::MACHINE_KEY_USER_INPUT => $this->runGetUserInput(),
        ];
        /** @noinspection PhpComposerExtensionStubsInspection */
        return json_encode($machine);
    }

    public static function resumeMachine(string $jsonMachine): void {
        static::getInstance()->runResumeMachine($jsonMachine);
    }

    private function runResumeMachine(string $jsonMachine): void {
        $this->resetState();
        /** @noinspection PhpComposerExtensionStubsInspection */
        $machine = json_decode($jsonMachine, true);
        if (is_array($machine)) {
            if (array_key_exists(self::MACHINE_KEY_EXAM, $machine)) {
                $this->runSetExam((string)$machine[self::MACHINE_KEY_EXAM]);
            }
            if (array_key_exists(self::MACHINE_KEY_LOCATION, $machine)) {
                $this->runSetLocation((string)$machine[self::MACHINE_KEY_LOCATION]);
            }
            if (array_key_exists(self::MACHINE_KEY_SECTION, $machine)) {
                $this->runSetSection((string)$machine[self::MACHINE_KEY_SECTION]);
            }
            if (array_key_exists(self::MACHINE_KEY_STATIONS_REACHED, $machine)) {
                Score::setStationsReached((array)$machine[self::MACHINE_KEY_STATIONS_REACHED]);
            }
            if (array_key_exists(self::MACHINE_KEY_STATUS, $machine)) {
                $this->runSetStatus((string)$machine[self::MACHINE_KEY_STATUS]);
            }
            if (array_key_exists(self::MACHINE_KEY_USER_INPUT, $machine)) {
                $this->runSetUserInput((string)$machine[self::MACHINE_KEY_USER_INPUT]);
            }
        }
    }

    private function resetState(): void {
        $this->exam = '';
        $this->location = '';
        $this->messages = [];
        $this->section = '';
        $this->status = '';
        $this->userInput = '';
        Score::setStationsReached([]);
    }
}
