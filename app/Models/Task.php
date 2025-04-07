<?php
//php artisan make:model Task -m
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    function toggleComplete() {
        $this->completed = !$this->completed;
        $this->save();
    }


    /**
     * The guarded property is the opposite of the fillable property. 
     * When a field is in the guarded array, it means that the
     * field cannot be mass-assigned. 
     * This means that the field cannot be set using the fill() method. 
     */
    
    // protected $guarded = [
    //     'email',
    //     'password'
    // ];
}
