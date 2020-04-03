<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreatAccount extends Command {
    /**php artisan create:admin --email=admin2@admin.com --password=123456
     * 
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature='create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description='Create An Admin Account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        //
        $details=$this->getInfo();
        $validDetails=$this->validator($details);

        if( !$validDetails) {
            $this->create($details);
            $this->showInfo($details);
        }
    }

    protected function validator(array $data) {
        $validator=Validator::make($data, [ 'name'=> ['required', 'string', 'max:255'],
                'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'=> ['required', 'string', 'min:8'],
                ]);

        if ($validator->fails()) {
            $this->info('User not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return 1;
        }
    }

    protected function create(array $data) {
        return User::create([ 'name'=> $data['name'],
                'email'=> $data['email'],
                'is_admin'=> 1,
                'password'=> Hash::make($data['password']),
                ]);
    }

    private function getInfo() : array {
        $details['name']=$this->ask('Name');
        $details['email']=$this->ask('Email');
        $details['password']=$this->secret('Password');
        // $details['confirm_password'] = $this->secret('Confirm password');
        return $details;

    }


    private function showInfo(array $data) : void {
        $this->info('admin created --email='.$data['email'].' --password='.$data['password'].'');
    }

}
