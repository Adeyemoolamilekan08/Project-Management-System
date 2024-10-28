<?php

namespace App\Policies;

use App\Models\Admin;  // Change this from User to Admin
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin): bool
    {
        return true;
    }

    public function view(Admin $admin, Project $project): bool
    {
        return $project->admin_id === $admin->id;
    }

    public function create(Admin $admin): bool
    {
        // Make sure admin is authenticated
        return auth('admin')->check();
    }

    // Add a specific method for creating tasks
    public function createTask(Admin $admin, Project $project): bool
    {
        return $project->admin_id === $admin->id;
    }

    public function update(Admin $admin, Project $project): bool  // Changed from User to Admin
    {
        return $project->admin_id === $admin->id;
    }

    public function delete(Admin $admin, Project $project): bool  // Changed from User to Admin
    {
        return $project->admin_id === $admin->id;
    }

    public function restore(Admin $admin, Project $project): bool  // Changed from User to Admin
    {
        return $project->admin_id === $admin->id;
    }

    public function forceDelete(Admin $admin, Project $project): bool  // Changed from User to Admin
    {
        return $project->admin_id === $admin->id;
    }
    
}
