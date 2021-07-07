<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class GetProducts extends Command{
    
    private $totalPages = 0;

    protected $signature = 'get:products';
    protected $description = 'Command description';

    public function __construct(){
        parent::__construct();
    }

    public function handle(){
        
        // preuzimam prvu stranicu zasebno kako bih pokupio ukupan broj stranica.
        $this->get(1);

        if($this->totalPages <= 0){
            
            $this->error('Download error!');

            return;
        }

        // prolazim kroz ostale stranice i preuzimam listu.
        for($i = 2; $i <= $this->totalPages; $i++) $this->get($i);

        $this->info('Products have been downloaded.');
    }

    public function get($index){

        $products = json_decode(
            file_get_contents(
                "https://search.gigatron.rs/v1/catalog/get/prenosni-racunari/laptop-racunari?strana={$index}"
            )
        , true);

        if(!$products) return;

        // da definise broj stranica ukoliko nije do sada.
        if($this->totalPages == 0){
            $this->totalPages = $products['totalPages'];
        }

        // prolazim kroz listu proizvoda/laptopova
        foreach($products['hits']['hits'] as $product){

            // ubacuje ili menja podatke proizvoda ukoliko postoji
            Product::updateOrCreate([
                'product_id' => $product['_id']
            ], [
                'title' => $product['_source']['search_result_data']['title'],
                'image' => $product['_source']['search_result_data']['image'],
                'price' => $product['_source']['search_result_data']['price'],
                'price_retail' => $product['_source']['search_result_data']['price_retail'],
                'price_history' => $product['_source']['search_result_data']['price_history'],
                'category' => $product['_source']['search_result_data']['category'],
                'subcategory' => $product['_source']['search_result_data']['subcategory']
            ]);
        }

        $this->line("Page {$index} was successfully downloaded.");
    }
}
