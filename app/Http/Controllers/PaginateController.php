<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class PaginateController extends Controller
{
    public function simple()
    {
        $a = [
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            ),
            array(
               'bartaId' => 81,
                'bartaTitle' => 'Assumenda tempora eaque. Consectetur eum sit maiores accusamus aperiam. 1602569339',
                'typeId' => 2,
                'bartaType' => 'Report',
                'numbreOfSubjects' => 3,
                'hasAttachments' => '',
                'bartaCreatedTime' => '2020-10-13 12:09:01'
            )
        ];

        $collection = collect($a);

       return $data = $this->paginate($collection);
    }
    public function paginate($items, $perPage = 5, $page = null, $pageName='page')
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return $paginator =  new LengthAwarePaginator(array_values($items->forPage($page, $perPage)->toArray()), $items->count(), $perPage, $page, [
            'path'  => LengthAwarePaginator::resolveCurrentPath(),
        ]);
    }
}
