<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'created_at',
        'updated_at',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date:d-m-Y',
        'end_date' => 'date:d-m-Y',
    ];

    protected $appends = [
        'name_price',
    ];

    public function getNamePriceAttribute()
    {
        return $this->name . ' - ' . $this->price;
    }

    //Accessors and Mutators

    public function getNameAttribute()
    {
        return ucfirst($this->attributes['name']);
    }

    public function getPriceAttribute(){
        return 'R$ ' . number_format($this->attributes['price'], 0, ',', '.');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

}
