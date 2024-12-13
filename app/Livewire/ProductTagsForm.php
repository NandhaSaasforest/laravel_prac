<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\todoList;


class ProductTagsForm extends Component
{

    public $tags = [];

    public $tasks = [];

    public $flag = 0;

    public $status = 1;

    public function mount()
    {
        $this->list();
    }

    public function removeTag($id)
    {
        todoList::findOrFail($id)->delete();
        $this->flag = 0;
        $this->list();
    }

    public function save()
    {
        // Validation logic
        $this->validate([
            'tags' => 'required|string|max:255',
        ]);

        todoList::create(['tasks' => $this->tags]);

        session()->flash('message', 'Tags saved successfully!');
        $this->flag = 0;
        $this->tags = [];
        $this->list();
    }

    public function update($id)
    {

        $task = todoList::findOrFail($id);
        $task->update(['status' => $this->status]);
        $this->list();
    }

    public function list()
    {
        $task_list = todoList::all();
        $this->tasks = $task_list;
    }

    public function render()
    {
        return view('livewire.product-tags-form');
    }
}
