<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5|max:35')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric|between:0.00,99999999')]
    public $price;
    #[Validate('required')]
    public $category_id;
    
    public $is_accepted = null;
    #[Validate(['images.*' => 'image|max:2048'])]
    public $images = [];
    #[Validate('required')]
    public $temporary_images = [];
    public $announcement = '';


    public function store()
    {

        //? Metodo Manuale Francesco
        // Announcement::create([
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'price' => $this->price,
        //     'user_id' => Auth::user()->id,
        //     'category_id' => $this->category_id
        // ]);
        //? ---------------------------------------
            
        if ($this->announcement == '') {
            $this->validate();
            $this->announcement = Category::find($this->category_id)->announcements()->create($this->validate());
            $this->announcement->user()->associate(Auth::user()->id);
            $this->announcement->save();
            $this->dispatch('announcement-create');

            if (count($this->images)) {
                foreach ($this->images as $image) {

                    // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                    $newFileName = "announcements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                    RemoveFaces::withChain([
                        (new ResizeImage($newImage->path, 300, 350)),
                        (new GoogleVisionSafeSearch($newImage->id)),
                        (new GoogleVisionLabelImage($newImage->id)),
                    ])->dispatch($newImage->id);

                }
                Storage::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
        } elseif (is_null($this->announcement) === false) {
             DB::table('images')->where('announcement_id', '=', $this->announcement->id)->delete();
             $this->validate();
            Announcement::find($this->announcement->id)->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'is_accepted' => $this->is_accepted,
                'created_at' => Carbon::now()
            ]);

            if (count($this->images)) {
                foreach ($this->images as $image) {

                    // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                    $newFileName = "announcements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                    RemoveFaces::withChain([
                        (new ResizeImage($newImage->path, 300, 350)),
                        (new GoogleVisionSafeSearch($newImage->id)),
                        (new GoogleVisionLabelImage($newImage->id)),
                    ])->dispatch($newImage->id);

                }
                Storage::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            $this->dispatch('announcement-create');
            $this->clean();
            if ((App::isLocale('en'))) {
                return session()->flash('success', 'You have successfully edited your ad and it has been submitted to our Collectorz Reviewer team!');
            }
            if ((App::isLocale('es'))) {
                return session()->flash('success', '¡Has editado correctamente tu anuncio y se ha enviado a nuestro equipo de Revisores de Collectorz!');
            }
            if ((App::isLocale('it'))) {
                return session()->flash('success', 'Hai modificato correttamente il tuo annuncio ed è stato inviato al nostro team di Collectorz Revisor!');
            }
        }




        $this->clean();

        if ((App::isLocale('en'))) {
            return session()->flash('success', 'You have successfully submitted your ad. It will be published after review!');
        }
        if ((App::isLocale('es'))) {
            return session()->flash('success', 'Has enviado correctamente tu anuncio. ¡Será publicado después de su revisión!');
        }
        if ((App::isLocale('it'))) {
            return session()->flash('success', 'Hai inserito correttamente il tuo annuncio. Sarà pubblicato dopo la revisione!');
        }
    }

    #[On('announcement-edit')]
    public function edit(Announcement $announcement)
    {
        $this->announcement = $announcement;
        $this->title = $announcement->title;
        $this->description = $announcement->description;
        $this->price = $announcement->price;
        $this->category_id = $announcement->category_id;
    }

    public function updatedTemporaryImages()
    {
        if (
            $this->validate([
                'temporary_images.*' => 'image|max:2048',
            ])
        ) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function clean()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category_id = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->announcement = '';
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}