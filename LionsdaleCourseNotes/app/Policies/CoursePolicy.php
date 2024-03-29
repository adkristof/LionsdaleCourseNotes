<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        switch (auth()->user()->role->slug) {

            case 'admin':
                return true;
            case 'creator':
                return true;
            case 'customer':
                return false;
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        switch (auth()->user()->role->slug) {

            case 'admin':
                return true;
            case 'creator':
                return true;
            case 'customer':
                return true;
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        switch (auth()->user()->role->slug) {
            case 'admin':
                return true;
            case 'creator':
                return false;
            case 'customer':
                return false;
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        switch (auth()->user()->role->slug) {

            case 'admin':
                return true;
            case 'creator':
                return true;
            case 'customer':
                return false;
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        switch (auth()->user()->role->slug) {
            case 'admin':
                return true;
            case 'creator':
                return false;
            case 'customer':
                return false;
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        switch (auth()->user()->role->slug) {
            case 'admin':
                return true;
            case 'creator':
                return false;
            case 'customer':
                return false;
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        switch (auth()->user()->role->slug) {
            case 'admin':
                return false;
            case 'creator':
                return false;
            case 'customer':
                return false;
            default:
                return false;
        }
    }
    public function before()
    {
        if (auth()->user()->role->slug === 'dev') {
            return true;
        }
    }
}
