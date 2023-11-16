<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW owners_and_tenants_view AS
            SELECT
                people.id as person_id,
                people.email,
                people.firstname,
                people.lastname,
                owners.id as owner_id,
                owners.account_number,
                owners.pays_tva,
                NULL as tenant_id,
                NULL as apartment_id,
                NULL as principal_tenant
            FROM
                owners
            LEFT OUTER JOIN people ON owners.person_id = people.id

            UNION

            SELECT
                people.id as person_id,
                people.email,
                people.firstname,
                people.lastname,
                NULL as owner_id,
                NULL as account_number,
                NULL as pays_tva,
                tenants.id as tenant_id,
                tenants.apartment_id,
                tenants.principal_tenant
            FROM
                tenants
            LEFT OUTER JOIN people ON tenants.person_id = people.id;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS owners_and_tenants_view;');
    }
};
