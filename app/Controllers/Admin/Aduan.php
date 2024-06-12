<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;
use App\Models\ComplainantDetailModel;

class Aduan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        
        // $this->request->getVar();
        // $this->request->getServer();
        // $this->request->getUri();
        // $this->request->getIPAddress();
        // $this->request->getUserAgent();
        // $this->request->getRawInput();
        // $this->request->getJSON();
        // $this->request->getPost();
        // $this->request->getFiles();
        // $this->request->getPostGet();

        $dataInput = $this->request->getGet();

        $model = new ComplainantDetailModel();
        $model->select('complainant_details.*, citizenship.name as warganegara, status.name as status, s.name');
        $model->join('asset_lookup as citizenship', 'citizenship.code = complainant_details.complainant_nationality', 'left');
        $model->join('asset_lookup as status', 'status.code = complainant_details.complainant_status', 'left');
        $model->join('states s', 's.id = complainant_details.state_id', 'left');

        $model->search($dataInput);
        // if($this->request->getGet('complainant_name') ?? ''){
        //     $model->like('complainant_details.complainant_name', $this->request->getGet('complainant_name'));   
        // }

        // if($this->request->getGet('complainant_email') ?? ''){
        //     $model->like('complainant_details.complainant_email', $this->request->getGet('complainant_email'));   
        // }

        // if($this->request->getGet('complainant_phone') ?? ''){
        //     $model->like('complainant_details.complainant_phone', $this->request->getGet('complainant_phone'));   
        // }

        // if($this->request->getGet('complainant_status') ?? ''){
        //     $model->where('complainant_details.complainant_status', $this->request->getGet('complainant_status'));   
        // }

        

        // $model->where([
        //     'complainant_details.state_id' => 5,
        //     'complainant_details.town_id' => 13,
        // ]);

        // $model->whereIn('complainant_details.department_id', static function($builder){
        //     $builder->select('id')->from('department')->where('department_category', 'Administration');
        // });
        

        $data = [
            'title' => 'Pengurus Aduan',
            'lookup_status' => getStatusComp(),
            'complainant_details' => $model->asObject()->paginate(10, 'pgs'),
            'pager' => $model->pager,
            'count' => countFrom($model->pager),
        ];


        $debug = $model->builder()->db()->getLastQuery();

        d($data);
        d($debug);
        return view('admin/aduan/index', $data);
    }

    function index2()
    {
        $data['title'] = 'pengurus desa - ajax datatable';

        return view('admin/aduan/index2', $data);

    }

    function ajaxData()
    {
        $draw = $this->request->getGet('draw');
        $start = (int)$this->request->getGet('start');
        $length = (int)$this->request->getGet('length');
        $dataInput = $this->request->getGet('searchdata');

        $model = new ComplainantDetailModel();
        $model->select('complainant_details.*, citizenship.name as warganegara, status.name as status, s.name');
        $model->join('asset_lookup as citizenship', 'citizenship.code = complainant_details.complainant_nationality', 'left');
        $model->join('asset_lookup as status', 'status.code = complainant_details.complainant_status', 'left');
        $model->join('states s', 's.id = complainant_details.state_id', 'left');

        //
        $recordsTotal = $model->countAllResults(false);
        $model->search($dataInput);
        $recordsFiltered = $model->countAllResults(false);

        $model->limit($length, $start);

        $data = $model->get();
        
        if($data->getNumRows() > 0):
            $bil = 0;
            foreach($data->getResult() as $row):

                $dt['data'][$bil][] = ++$start;
                $dt['data'][$bil][] = $row->complainant_name;
                $dt['data'][$bil][] = $row->warganegara;
                $dt['data'][$bil][] = $row->complainant_email;
                $dt['data'][$bil][] = $row->complainant_phone;
                $dt['data'][$bil][] = $row->status;
                $bil++; 

            endforeach;
        endif;

        $dt['draw'] = $draw;
        $dt['recordsTotal'] = $recordsTotal;
        $dt['recordsFiltered'] = $recordsFiltered;

        
        return $this->response->setJSON($dt);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
