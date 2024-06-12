<?php

function testHelper()
{
    return 'test';
}

function getStatusComp()
{
    $data = null;
    $model = new \App\Models\AssetLookupModel();
    $model->where(['category' => 'complaint_status']);
    $status = $model->findAll();

    if ($status ?? '') {
        foreach ($status as $s) {
            $data[$s['code']] = $s['name'];
        }
    }

    return $data;
}

function encode_custom($id)
{
   $ecy = \Config\Services::encrypter();

   $eid = $ecy->encrypt($id);
   $eid = bin2hex($eid);

   return $eid;
}

function countFrom($pager)
{

    $totalAll = $pager->getTotal('pgs');

    $getperPage = $pager->getperPage('pgs');
    $currentPage = $pager->getcurrentPage('pgs');
    $pageCount = $pager->getpageCount('pgs');

    // if($currentPage > 1 && $currentPage !=$pageCount ){
    if ($currentPage > 1) {
        $currentPagenow = $currentPage - 1;
        $total = $getperPage * $currentPagenow;

        // }elseif($currentPage ==$pageCount){

        //     $total=$totalAll-1;

    } else {
        $total = 0;
    }



    $showStart = $total;
    $end = $getperPage;

    if ($currentPage != $pageCount) {

        $end = $total + $getperPage;
    } else {
        $end = $totalAll;
    }


    if ($totalAll == 0) {
        $showStart = 0;
        $end = 0;
        $show = "Showing " . $showStart . " to $end of $totalAll results";
    } else {
        $show = "Showing " . ++$showStart . " to $end of $totalAll results";
    }



    $d['show'] = $show;
    $d['count'] = $total;

    return $d;
}
