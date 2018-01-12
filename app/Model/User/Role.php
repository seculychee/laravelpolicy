<?php

namespace App\Models\User;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role
 * @property integer id
 * @property string slug
 * @property string name
 * @property string description
 * @package App\Models\User
 */
class Role extends Model
{

    protected $table = "roles";

    public $timestamps = false;

    protected $fillable = [
        "slug"
    ];

    /**
     * @return Role
     */
    public static function adminRole() : self {
        return self::query()
            ->where("slug", "admin")
            ->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function allExceptAdmin () {
        return self::query()
            ->where("slug", "<>", "admin")
            ->get();
    }

    /**
     * @return BelongsToMany
     */
    public function users () : BelongsToMany {
        return $this->belongsToMany(User::class, 'user_roles')->withTimestamps();
    }

    /**
     * @param $slug
     *
     * @return static
     */
    public static function getBySlug ($slug) {
        return self::query()
            ->where("slug", $slug)
            ->first();
    }

    /**
     * Returns with the language accessor
     * @return string
     */
    public function getNameAttribute () {
        return "roles." . $this->slug . ".name";
    }

    /**
     * Returns with the language accessor
     * @return string
     */
    public function getDescriptionAttribute () {
        return "roles." . $this->slug . ".description";
    }

    /**
     * @return mixed
     */
    public static function getGroups () {

        return self::allExceptAdmin()->groupBy(function (Role $role) {
            return explode(".", $role->slug)[0];
        });
    }

    /**
     * @param $slug
     * @param array $attributes
     *
     * @return mixed
     */
    public static function findOrCreate($slug, array $attributes = []) {
        $role = self::query()->where("slug", $slug)->first();
        if (!$role) {
            $attributes["slug"] = $slug;
            $role = self::create($attributes);
        }
        return $role;
    }

}
