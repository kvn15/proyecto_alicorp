<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Card extends Component
{
    public $id;
    public $image1;
    public $image2;
    public $image3;
    public $image4;
    public $image5;
    public $image6;
    public $title;
    public $modalImage;
    public $eventDate;
    public $eventLocation;
    public $modalTitle;
    public $modalDescription;

    public function __construct($id,
        $image1, $image2, $image3, $image4, $image5, $image6,
        $title, $modalImage, $eventDate, $eventLocation, $modalTitle, $modalDescription
    ) {
        $this->id = $id;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->image4 = $image4;
        $this->image5 = $image5;
        $this->image6 = $image6;
        $this->title = $title;
        $this->modalImage = $modalImage;
        $this->eventDate = $eventDate;
        $this->eventLocation = $eventLocation;
        $this->modalTitle = $modalTitle;
        $this->modalDescription = $modalDescription;
    }

    public function render()
    {
        return view('components.card');
    }
}
