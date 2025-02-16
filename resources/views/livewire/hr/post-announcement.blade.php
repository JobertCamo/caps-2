<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
    public $description;

    public function submit()
    {
        $data = $this->validate([
            'title' => ['required','min:3'],
            'description' => ['required','max:255'],
        ]);
        Auth::user()->announcements()->create($data);

        $this->reset();
        $this->redirect('/hr-task');
    }
    
}; ?>

<form wire:submit='submit'>
    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
        <legend class="font-bold text-2xl text-amber-600">Create Announcement</legend>
        <div class=" flex items-center justify-center">
            <div class=" rounded-lg shadow-lg w-full">
                    {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <div class="">
                                <label for="department" class="block text-sm font-medium text-gray-700">Select Department</label>
                                <select id="department" name="department" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                    <option value="">Choose a department</option>
                                    <option value="sales">Sales</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="inventory">Inventory</option>
                                    <option value="vendor">Vendor Relations</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="space-y-5">
                        <x-input wire:model='title' errorless label="Tite" />
                        <x-textarea wire:model='description' errorless label="Announcement Details" placeholder="announcements............."/>
                    </div>
                    {{-- <div>
                        <label class="block text-white text-sm font-medium mb-1">Resignation letter</label>
                        <x-input type="file" class="" />
                    </div> --}}
            </div>
        </div>
    </fieldset>
    <div class="flex justify-end items-center m-2">
        <x-button type="submit" emerald label="Submit" />
    </div>
</form>
