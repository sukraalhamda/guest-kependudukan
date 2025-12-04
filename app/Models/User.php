<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function scopeFilter(Builder $query, $request, array $columns)
    {
        foreach ($columns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->$column);
            }
        }

        return $query;
    }

    /**
     * Scope Search
     */
    public function scopeSearch(Builder $query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'LIKE', '%' . $request->search . '%');
                }
            });
        }

        return $query;
    }

    public function getMediaPhotoAttribute()
    {
        return DB::table('media')
            ->where('ref_table', 'users')
            ->where('ref_id', $this->id)
            ->value('file_name');
    }

}
