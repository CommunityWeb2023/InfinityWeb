<?php

namespace App\Enums;

enum Job
{
    public const VAGRANT = 0;
    public const MAX_JOBBASE = 1;

    public const MERCENARY = 1;
    public const ACROBAT = 2;
    public const ASSIST = 3;
    public const MAGICIAN = 4;
    public const PUPPETEER = 5; // unused
    public const MAX_EXPERT = 6;

    public const KNIGHT = 6;
    public const BLADE = 7;
    public const JESTER = 8;
    public const RANGER = 9;
    public const RINGMASTER = 10;
    public const BILLPOSTER = 11;
    public const PSYKEEPER = 12;
    public const ELEMENTOR = 13;
    public const GATEKEEPER = 14;   // unused
    public const DOPPLER = 15;      // unused
    public const MAX_PROFESSIONAL = 16;

    public const KNIGHT_MASTER = 16;
    public const BLADE_MASTER = 17;
    public const JESTER_MASTER = 18;
    public const RANGER_MASTER = 19;
    public const RINGMASTER_MASTER = 20;
    public const BILLPOSTER_MASTER = 21;
    public const PSYKEEPER_MASTER = 22;
    public const ELEMENTOR_MASTER = 23;
    public const MAX_MASTER = 24;

    public const KNIGHT_HERO = 24;
    public const BLADE_HERO = 25;
    public const JESTER_HERO = 26;
    public const RANGER_HERO = 27;
    public const RINGMASTER_HERO = 28;
    public const BILLPOSTER_HERO = 29;
    public const PSYKEEPER_HERO = 30;
    public const ELEMENTOR_HERO = 31;
    public const MAX_HERO = 32;

    public const TEMPLAR = 32;
    public const SLAYER = 33;
    public const HARLEQUIN = 34;
    public const CRACKSHOOTER = 35;
    public const SERAPH = 36;
    public const FORCEMASTER = 37;
    public const MENTALIST = 38;
    public const ARCANIST = 39;
    public const MAX_LEGEND_HERO = 40;

    public const MAX_JOB_LEVEL = 15;
    public const MAX_EXP_LEVEL = 45;
    public const MAX_GENERAL_LEVEL = 120;
    public const MAX_LEGEND_LEVEL = 130;
    public const MAX_3RD_LEGEND_LEVEL = 170;

    public const MAX_BASE_LEVEL = self::MAX_JOB_LEVEL + self::MAX_EXP_LEVEL;
    public const MAX_CHARACTER_LEVEL = self::MAX_3RD_LEGEND_LEVEL;

    public const INVALID_JOBS = [
        self::PUPPETEER,
        self::GATEKEEPER,
        self::DOPPLER,
    ];
}
