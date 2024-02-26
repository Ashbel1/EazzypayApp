<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $table="merchants";
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'account',
        'deposit',
        'commission',
        'registration_date',
        'last_use',
        'first_use',
        'landline',
        'cellphone',
        'email',
        'street',
        'account_manager_id',
        'agent_class_of_service_id',
        'short_code',
        'bank_name',
        'bank_account',
        'suburb',
        'city',
        'type',
        'company_name',
        'director_full_name_1',
        'director_full_name_2',
        'director_full_name_3',
        'director_full_name_4',
        'director_id_number_1',
        'director_id_number_2',
        'director_id_number_3',
        'director_id_number_4',
        'category_code',
        'tax_clearance',
        'bank_branch_code',
        'bank_account_name',
        'supervisor_id',
        'logo',
        'mdr',
    ];
}
