<?php

namespace App\Queries;

use Illuminate\Support\Facades\DB;

class TopContactsQuery
{
    /**
     * @return array
     */
    public function __invoke()
    {
        /*
         * TODO: eloquent ile çözümüne bakılacak
         */

        return DB::select(DB::raw("select
        t.information_content as location
        ,count(t.contact_id) as total
        from(
        select distinct
        c.contact_id
        ,c.information_content

        from contact_informations c
        inner join contacts c2 on c2.id = c.contact_id
        where c.information_type='LOCATION') t
        group by t.information_content
        order by total desc"));
    }
}
