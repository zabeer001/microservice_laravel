<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log; // For debugging

class ProductUpdated implements ShouldQueue
{
    use Queueable;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

   public function handle()
    {
        Log::info('ProductUpdated job received data:', ['data' => $this->data]);

        if (!is_array($this->data) || !isset($this->data['id'])) {
            Log::warning('ProductUpdated job received invalid data.', ['data' => $this->data]);
            return;
        }

        $product = Product::find($this->data['id']);
        if (!$product) {
            Log::warning('Product not found for update.', ['id' => $this->data['id']]);
            return;
        }

        $product->title = $this->data['title'] ?? $product->title;
        $product->image = $this->data['image'] ?? $product->image;
        $product->created_at = $this->data['created_at'] ?? $product->created_at;

        $product->save();

        Log::info('Product updated successfully:', ['id' => $product->id]);
    }
}