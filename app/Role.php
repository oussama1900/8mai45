<?php

namespace App;
use Config;
use Illuminate\Database\Eloquent\Model;
use App\Support\Authorization\AuthorizationRoleTrait;
use Auth;

class Role extends Model
{
	 use AuthorizationRoleTrait;

      protected $table = 'roles';
      protected $primaryKey = 'name';
      protected $keyType = 'string';
      public $incrementing = false;
      public $timestamps = false;

    protected $casts = [
        'removable' => 'boolean'
    ];


    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('entrust.roles_table');
    }


    protected $fillable = ['name', 'display_name', 'description'];

    public function permissions(){
		return 	$this->hasMany(Permission::class);
	}
	public function getUnit(){
        $current_user_role = Auth::user()->captain->role;
				  $current_user_unit = Auth::user()->captain->unit;
        if($current_user_role =='ucap' || $current_user_role =='vucp' || $current_user_role =='capa' ||$current_user_role =='trne' ){
            $unit_full_name =Auth::user()->captain->unit_name->unit_name;
            if($current_user_unit =='cubs' ||$current_user_unit =='sct' || $current_user_unit =='asct' ||$current_user_unit =='tvlr' )
                return ' - '.$unit_full_name;
        }
    }

    public function getRole(){


        return $this->description;
    }
}
