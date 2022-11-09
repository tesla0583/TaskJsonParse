<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auth with console, return token for 5 minutes';

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        $login = $this->ask('Set your login:');
        $password = $this->secret('Set your password:');

        $this->info('login = '. $login. ' pass = '. $password);

        $user = User::all()
            ->where('login', $login)
            ->firstOrFail();

        if (Hash::check($password, $user['password'])) {
            $user->token = bcrypt(Str::random(10));
            $user->expired_at = now();
            $user->save();

            $this->info('Your token is: '. $user->token);
        }

//        $this->table(
//            ['Name', 'Token'],
//            User::select(['name', 'token'])
//                ->where('login', $login)
//                ->get()
//        );
    }
}
