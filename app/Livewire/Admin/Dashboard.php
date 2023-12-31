<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\Document;

class Dashboard extends Component
{
    public $totalCategory, $totalUser, $totalDocument, $approveUser, $pendingUser;
    public function render()
    {
        $this->totalCategory = Category::count();
        $this->totalUser = User::count();
        $this->totalDocument = Document::count();
        $this->approveUser = User::where('remember_token', 1)->count();
        $this->pendingUser = User::where('remember_token', 0)->count();
        return view('livewire.admin.dashboard')->layout('layouts.admin-app');
    }
}
