<?php

namespace App\Controllers;
use App\Models\TestModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\ParticipantModel;

class Operator extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return view("operator/home");
    }

    public function login(){
        if ($this->request->getMethod() == "get"){
            return view("operator/login");
        }

        $username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
        $model = new ParticipantModel();
        
        $data = $model->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'isLoggedIn' => true
                ];
                $this->session->set($ses_data);
                return redirect()->to('/operator/home');
            
            }else{
                $this->session->setFlashdata('msg', 'username atau password salah');
                return redirect()->to('/operator/login');
            }
        }else{
            $this->session->setFlashdata('msg', 'username atau password salah');
            return redirect()->to('/operator/login');
        }

    }
    public function users(){
        return view('operator/users');
    }




    
    public function test(){
        $model = new TestModel();
        $data['data'] = $model->orderBy('id', 'DESC')->findAll();
        return view("operator/test", $data);
    }

    public function test_table_list(){
        $model = new TestModel();
        $data['data'] = $model->orderBy('id', 'DESC')->findAll();
        return view("widgets/test_list", $data);
    }

    public function add_test()
    {

        if ($this->request->getMethod() != "post"){
            $error = [
                'message' => 'method not allowed'
            ];
            return $this->fail($errors, 405);
        }

        $model = new TestModel();
        $data = [
            'test_id' =>$this->request->getVar('test_id'),
            'question_total' => $this->request->getVar('question_total'),
            'number_digits' => $this->request->getVar('digit'),
            'duration' => $this->request->getVar('duration'),
            'test_start_at' =>$this->request->getVar('test_start_at'),
            'test_end_at' => $this->request->getVar('test_end_at')
        ];
        
        $model->insert($data);

        $table['data'] = $model->orderBy('id', 'DESC')->findAll();

        $response = [
            'status'   => 201,
            'error'    => null,
            'data' => $data,
            'html' => view("widgets/test_list", $table),
            'messages' => [
                'success' => 'Employee created successfully'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function delete_test($id = null){
        if ($this->request->getMethod() != "delete"){
            $error = [
                'message' => 'method not allowed'
            ];
            return $this->fail($errors, 405);
        }

        $model = new TestModel();
        $data = $model->where('id', $id)->delete($id);
        $table['data'] = $model->orderBy('id', 'DESC')->findAll();
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'html' => view("widgets/test_list", $table),
                'messages' => [
                    'success' => 'row successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No row found');
        }
    }

    public function add_participant(){
        if ($this->request->getMethod() != "post"){
            return $this->fail('method not allowed', 405);
        }

        $model = new ParticipantModel();
        $data = json_decode($this->request->getVar('data'));
        
        try {
            if($model->insertBatch($data)){
                return $this->respond($data,200);
            }
            return $this->fail('failed', 400);
        }catch(Exception $e){
            return $this->fail($e, 400);
        }
    }
    
}
