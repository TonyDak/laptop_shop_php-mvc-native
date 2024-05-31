<?php
class product_all extends Controller{
    private $laptopModel;
    private $brandModel;
    public function __construct(){
        $this->laptopModel = $this->model('laptop');
        $this->brandModel = $this->model('brand');
    }
    public function index(){
        $laptop = $this->laptopModel->getLaptop();
        $brand = $this->brandModel->getBrand();
        $this->view('home/product_all', ['laptop' => $laptop, 'brand' => $brand]);
    }
    function pagination(){
        $laptop = $this->laptopModel->getLaptop();
        if(isset($_POST['sortOrder'])){
            $sortOrder = $_POST['sortOrder'];
            if($sortOrder == 'fill-price-up'){
                usort($laptop, function($a, $b) {
                    return ($a['price'] - ($a['price'] * $a['discount'] / 100)) - ($b['price'] - ($b['price'] * $b['discount'] / 100));
                });
            }
            if($sortOrder == 'fill-price-down'){
                usort($laptop, function($a, $b) {
                    return ($b['price'] - ($b['price'] * $b['discount'] / 100)) - ($a['price'] - ($a['price'] * $a['discount'] / 100));
                });
            }
            if($sortOrder == 'fill-price-discount'){
                $laptop = array_filter($laptop, function($l) {
                    return $l['discount'] != 0;
                });
            }
            
        }
        $filter = isset($_POST['filters']) ? $_POST['filters'] : '';
        if($filter != ''){
            if (is_string($filter)) {
                if (mb_detect_encoding($filter, 'UTF-8', true) === false) {
                    $filter = mb_convert_encoding($filter, 'UTF-8');
                }
                $filter = json_decode($filter, true);
            }
            

            if(isset($filter['brand'])){
                $laptop = array_filter($laptop, function($l) use ($filter) {
                    if ($filter['brand'][0] == 'Tất cả') {
                        return true;
                    } else {
                        return in_array(strtolower($l['brand_nameAscii']), array_map('strtolower', $filter['brand']));
                    }
                });
            }

            if(isset($filter['price'])){
                $laptop = array_filter($laptop, function($l) use ($filter) {
                    if ($filter['price'][0] == 'Tất cả') {
                        return true;
                    }
                    else{
                        foreach ($filter['price'] as $price) {
                            switch ($price) {
                                case 'Dưới 10 triệu':
                                    if (($l['price'] - ($l['price']*$l['discount']/100)) < 10000000) {
                                        return true;
                                    }
                                    break;
                                case 'Từ 10 - 20 triệu':
                                    if (($l['price'] - ($l['price']*$l['discount']/100)) >= 10000000 && ($l['price'] - ($l['price']*$l['discount']/100)) <= 20000000) {
                                        return true;
                                    }
                                    break;
                                case 'Từ 20 - 30 triệu':
                                    if (($l['price'] - ($l['price']*$l['discount']/100)) >= 20000000 && ($l['price'] - ($l['price']*$l['discount']/100)) <= 30000000) {
                                        return true;
                                    }
                                    break;
                                case 'Trên 30 triệu':
                                    if (($l['price'] - ($l['price']*$l['discount']/100)) > 30000000) {
                                        return true;
                                    }
                                    break;
                            }
                        }
                        return false;
                    }
                });
            }

            if(isset($filter['ram'])){
                $laptop = array_filter($laptop, function($l) use ($filter) {
                    if ($filter['ram'][0] == 'Tất cả') {
                        return true;
                    }
                    else{
                        foreach ($filter['ram'] as $ram) {
                            switch ($ram) {
                                case '8 GB':
                                    if (substr($l['ram_capacity'], 0, 4) == '8 GB') {
                                        return true;
                                    }
                                    break;
                                case '16 GB':
                                    if (substr($l['ram_capacity'], 0, 5) == '16 GB') {
                                        return true;
                                    }
                                    break;
                                case '32 GB':
                                    if (substr($l['ram_capacity'], 0, 5) == '32 GB') {
                                        return true;
                                    }
                                    break;

                            }
                        }
                        return false;
                    }
                });
            }

            if(isset($filter['cpu'])){
                $laptop = array_filter($laptop, function($l) use ($filter) {
                    if ($filter['cpu'][0] == 'Tất cả') {
                        return true;
                    } else {
                        return in_array(strtolower($l['cpu_brand']), array_map('strtolower', $filter['cpu']));
                    }
                });
            }

            if(isset($filter['person'])){
                $laptop = array_filter($laptop, function($l) use ($filter) {
                    if ($filter['person'][0] == 'Tất cả') {
                        return true;
                    } else {
                        foreach ($filter['person'] as $person) {
                            switch ($person) {
                                case 'Gaming':
                                    if (strpos($l['name'], 'Gaming') !== false) {
                                        return true;
                                    }
                                    break;
                                case 'Văn phòng':
                                    if (strpos($l['cpu_generation'], 'U') !== false) {
                                        return true;
                                    }
                                    break;
                                case 'Mỏng nhẹ':
                                    preg_match('/\d+(\.\d+)?/', $l['weight_kg'], $matches);
                                    $weight = floatval($matches[0]);
                                    if ($weight <= 1.7) {
                                        return true;
                                    }
                                    break;
                                

                            }
                        }
                        return false;
                    }
                });
            }
        }
        $total = count($laptop);
        $limit = 25;
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $start = ($page - 1) * $limit;
        $data = array_slice($laptop, $start, $limit);
        echo json_encode([
            'data' => $data,
            'total' => $total
        ]);    
    }
}
?>