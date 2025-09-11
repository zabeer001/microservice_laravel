<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductCreated implements ShouldQueue
{
    use Queueable;

    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
     
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $product = new Product();
        
        // Assign attributes explicitly
        $product->id = $this->data['id'];
        $product->title = $this->data['title'];
        $product->image = $this->data['image'];
        $product->created_at = $this->data['created_at'];

        // Save the new model to the database
        $product->save();
    }
}
