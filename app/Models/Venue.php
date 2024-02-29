<?php

namespace App\Models;

use App\Enums\Region;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'region' => Region::class,
    ];

    public static function getForm(string $region = null): array
    {
        return [
            TextInput::make('name')
                ->required(),
            TextInput::make('city')
                ->required(),
            TextInput::make('country')
                ->required(),
            TextInput::make('postal_code')
                ->required(),
            Select::make('region')
                ->default($region)
                ->enum(Region::class)
                ->options(Region::class)
                ->required(),
        ];
    }

    public function conferences(): HasMany
    {
        return $this->hasMany(Conference::class);
    }
}
