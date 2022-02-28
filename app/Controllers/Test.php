<?php

namespace App\Controllers;
use App\Models\TestModel;
use App\Models\ParticipantModel;
use CodeIgniter\API\ResponseTrait;


class Test extends BaseController
{
    use ResponseTrait;
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();

    }
    public function index($id = null)
    {
        if($this->session->has('user_id') && ($this->session->get('test_id') == $id) ){
            $model = new TestModel();
            $data['data'] = $model->where('test_id', $id)->first();
            $data['data']['result_test_id'] = $this->session->get('id');
            return view("test/index", $data);
        }else{
            return redirect()->to("test/login");
        }
    }

    public function submit_result(){
        if ($this->request->getMethod() != "post"){
            $error = [
                'message' => 'method not allowed'
            ];
            return $this->fail($errors, 405);
        }

        $model = new ParticipantModel();
        $id = $this->request->getVar('result_test_id');

        $data = [
            'result' =>$this->request->getVar('result'),
            'is_start' => true,
            'is_finish' => true,
        ];
        $update = $model->update($id, $data);
        if($update){
            return $this->respond(["message" => "berhasil di update"], 200);
        }else{
            return $this->fail(["message"=> "error"], 400);
        }

    }

    public function login()
    {   
        if ($this->request->getMethod() == "get"){
            return view("test/login");
        }
        $user_id = $this->request->getVar('user_id');
		$token = $this->request->getVar('token');
        $model = new ParticipantModel();
        $user_data = [
            'test_id' => $token,
            'user_id'=> $user_id    
        ];
        $data = $model->where($user_data)->first();
        
        if(!empty($data)){
            if(!$data['is_finish']){
                $this->session->set($data);
                return redirect()->to(site_url("test/index/{$data['test_id']}"));
            }
            return view("test/login");
        }else{
            return view("test/login");
        }
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url("test/login"));
    }
    
}
