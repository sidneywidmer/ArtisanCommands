<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SetPasswordCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'auth:setpassword';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Set the password hash to a given user';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$id = $this->argument('id');
		$password = $this->argument('password');

		if($user = User::find($id))
		{
			$user->password = Hash::make($password);
			if ($user->save())
			{
				$this->info('User '.$user->id.' updated');
			}
			else
			{
				$this->error('User '.$user->id.' NOT updated');
			}
		}
		else
		{
			$this->error('User does not exist');
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('id', InputArgument::REQUIRED, 'Id of the user'),
			array('password', InputArgument::REQUIRED, 'New password'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}