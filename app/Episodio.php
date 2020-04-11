<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false; //atributos created_at e update_at
    protected $fillable = ['temporada', 'numero', 'assistido','serie_id'];
    protected $appends = ['links'];
    public function serie()
    {
        $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodios/' . $this->id,
            'serie' => '/api/series/' . $this->serie_id
        ];
    }
}

