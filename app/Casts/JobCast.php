<?php

namespace App\Casts;

use App\Enums\Job;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class JobCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        switch ($value) {
            case Job::MERCENARY:
                $icon_name = 'Mercenary';
                break;
            case Job::ACROBAT:
                $icon_name = 'Acrobat';
                break;
            case Job::ASSIST:
                $icon_name = 'Assist';
                break;
            case Job::MAGICIAN:
                $icon_name = 'Magician';
                break;
            case Job::KNIGHT:
            case Job::KNIGHT_MASTER:
            case Job::KNIGHT_HERO:
                $icon_name = 'Knight';
                break;
            case Job::BLADE:
            case Job::BLADE_MASTER:
            case Job::BLADE_HERO:
                $icon_name = 'Blade';
                break;
            case Job::JESTER:
            case Job::JESTER_MASTER:
            case Job::JESTER_HERO:
                $icon_name = 'Jester';
                break;
            case Job::RANGER:
            case Job::RANGER_MASTER:
            case Job::RANGER_HERO:
                $icon_name = 'Ranger';
                break;
            case Job::RINGMASTER:
            case Job::RINGMASTER_MASTER:
            case Job::RINGMASTER_HERO:
                $icon_name = 'Ringmaster';
                break;
            case Job::BILLPOSTER:
            case Job::BILLPOSTER_MASTER:
            case Job::BILLPOSTER_HERO:
                $icon_name = 'Billposter';
                break;
            case Job::PSYKEEPER:
            case Job::PSYKEEPER_MASTER:
            case Job::PSYKEEPER_HERO:
                $icon_name = 'Psychikeeper';
                break;
            case Job::ELEMENTOR:
            case Job::ELEMENTOR_MASTER:
            case Job::ELEMENTOR_HERO:
                $icon_name = 'Elementor';
                break;
            case Job::TEMPLAR:
                $icon_name = 'Lordtempler';
                break;
            case Job::SLAYER:
                $icon_name = 'Stormblade';
                break;
            case Job::HARLEQUIN:
                $icon_name = 'Windlurker';
                break;
            case Job::CRACKSHOOTER:
                $icon_name = 'Crackshooter';
                break;
            case Job::SERAPH:
                $icon_name = 'Florist';
                break;
            case Job::FORCEMASTER:
                $icon_name = 'Forcemaster';
                break;
            case Job::MENTALIST:
                $icon_name = 'Mentalist';
                break;
            case Job::ARCANIST:
                $icon_name = 'Elementorlord';
                break;
            case Job::VAGRANT:
            default:
                $icon_name = 'Vagrant';
                break;
        }

        if ($value >= Job::KNIGHT_MASTER && $value <= Job::ELEMENTOR_MASTER) {
            $icon_name .= ' (Master)';
        }

        if ($value >= Job::KNIGHT_HERO && $value <= Job::ARCANIST) {
            $icon_name .= ' (Hero)';
        }

        return $icon_name;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
