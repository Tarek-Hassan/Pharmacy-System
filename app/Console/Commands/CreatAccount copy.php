<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class CreatAccount extends Command
{
    /**php artisan create:admin --email=admin2@admin.com --password=123456
     * 
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create An Admin Account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $user;
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $details = $this->getDetails();
        $admin = $this->user->createAdmin($details);
        $this->display($admin);
    }
    //  /**
    //  * Ask for admin details.
    //  *
    //  * @return array
    //  */
    private function getDetails() : array
    {
        $details['name'] = $this->ask('Name');
        $details['email'] = $this->ask('Email');
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');

        while (! $this->isValidPassword($details['password'], $details['confirm_password'])) {
            if (! $this->isRequiredLength($details['password'])) {
                $this->error('Password must be more that six characters');
            }

            if (! $this->isMatch($details['password'], $details['confirm_password'])) {
                $this->error('Password and Confirm password do not match');
            }
            // Hash::make($data['password'])
            $details['password'] =  Hash::make($this->secret('Password'));
            $details['confirm_password'] =  Hash::make($this->secret('Confirm password'));
        }

        return $details;
    }

    /**
     * Display created admin.
     *
     * @param array $admin
     * @return void
     */
    private function display(User $admin) : void
    {
        $headers = ['Name', 'Email', 'admin'];

        $fields = [
            'Name' => $admin->name,
            'email' => $admin->email,
            'admin' => $admin->isAdmin()
        ];

        $this->info('Super admin created');
        $this->table($headers, [$fields]);
    }

    /**
     * Check if password is vailid
     *
     * @param string $password
     * @param string $confirmPassword
     * @return boolean
     */
    private function isValidPassword(string $password, string $confirmPassword) : bool
    {
        return $this->isRequiredLength($password) &&
        $this->isMatch($password, $confirmPassword);
    }
/**
     * Check if password and confirm password matches.
     *
     * @param string $password
     * @param string $confirmPassword
     * @return bool
     */
    private function isMatch(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }
     /**
     * Checks if password is longer than six characters.
     *
     * @param string $password
     * @return bool
     */
    private function isRequiredLength(string $password) : bool
    {
        return strlen($password) > 6;
    }



}
