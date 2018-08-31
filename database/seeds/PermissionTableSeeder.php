<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
        		'name' => 'add_project',
        		'display_name' => 'Add Project',
        		'description' => 'Can Add a new project'
        	],

        	[
        		'name' => 'edit_project',
        		'display_name' => 'Edit Project',
        		'description' => 'Can edit project'
        	],

        	[
        		'name' => 'view_project',
        		'display_name' => 'View Project',
        		'description' => ' Only can view project'
        	],

        	[
        		'name' => 'collect_project_requirements',
        		'display_name' => 'Collect  Project Requirements',
        		'description' => ' Can collect project requirements from the clients'
        	],

        	[
        		'name' => 'approve_project',
        		'display_name' => 'Approve  Project',
        		'description' => ' Can approve a project'
        	]

        ];

        foreach ($permissions as $key => $permission) {
        	Permission::create($permission);
        }
    }
}
