<?php

namespace App\Events;

use App\Models\Wishlist;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CourseAddedToWishlist
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Wishlist
     */
    public Wishlist $wishlist;

    /**
     * Create a new event instance.
     *
     * @param Wishlist $wishlist
     */
    public function __construct(Wishlist $wishlist)
    {
        $this->wishlist = $wishlist;
    }
}
