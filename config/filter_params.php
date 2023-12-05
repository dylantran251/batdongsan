<?php
return [
    'price' => [
        [
            'min' => 0, 
            'max' => 0,
            'text' => 'Tất cả mức giá'
        ],
        [
            'min' => -1, 
            'max' => -1,
            'text' => 'Thỏa thuận'
        ],
        [
            'min' => 1, 
            'max' => 500000000,
            'text' => 'Dưới 500 triệu'
        ],
        [
            'min' => 500000000, 
            'max' => 800000000,
            'text' => '500 - 800 triệu'
        ],
        [
            'min' => 800000000, 
            'max' => 1000000000,
            'text' => '800 triệu - 1 tỷ'
        ],
        [
            'min' => 1000000000, 
            'max' => 2000000000,
            'text' => '1 - 2 tỷ'
        ],
        [
            'min' => 2000000000, 
            'max' => 3000000000,
            'text' => '2 - 3 tỷ'
        ],
        [
            'min' => 3000000000 ,
            'max' => 5000000000,
            'text' => '3 - 5 tỷ'
        ],
        [
            'min' => 5000000000, 
            'max' => 7000000000,
            'text' => '5 - 7 tỷ'
        ],
        [
            'min' => 7000000000, 
            'max' => 10000000000,
            'text' => '7 - 10 tỷ'
        ],
        [
            'min' => 10000000000, 
            'max' => 20000000000,
            'text' => '10 - 20 tỷ'
        ],
        [
            'min' => 20000000000, 
            'max' => 30000000000,
            'text' => '20 - 30 tỷ'
        ],
        [
            'min' => 30000000000, 
            'max' => 40000000000,
            'text' => '30 - 40 tỷ'
        ],
        [
            'min' => 40000000000, 
            'max' => 60000000000,
            'text' => '40 - 60 tỷ'
        ],
        [
            'min' => 60000000000, 
            'max' => null,
            'text' => 'Trên 60 tỷ'
        ],
    ],
    'area' => [
        [
            'min' => 0, 
            'max' => 0,
            'text' => 'Tất cả diện tích'
        ],
        [
            'min' => 1,
            'max' => 30,
            'text' => 'Dưới 30 m²'
        ],
        [
            'min' => 30,
            'max' => 50,
            'text' => '30 - 50 m²'
        ],
        [
            'min' => 50,
            'max' => 80,
            'text' => '50 - 80 m²'
        ],
        [
            'min' => 80,
            'max' => 100,
            'text' => '80 - 100 m²'
        ],
        [
            'min' => 100,
            'max' => 150,
            'text' => '100 - 150 m²'
        ],
        [
            'min' => 150,
            'max' => 200,
            'text' => '150 - 200 m²'
        ],
        [
            'min' => 200,
            'max' => 250,
            'text' => '200 - 250 m²'
        ],
        [
            'min' => 250,
            'max' => 300,
            'text' => '250 - 300 m²'
        ],
        [
            'min' => 300,
            'max' => 500,
            'text' => '300 - 500 m²'
        ],
        [
            'min' => 500,
            'max' => null,
            'text' => 'Trên 500 m²'
        ],
    ],
    'room' => [1,2,3,4,5],
    'orderBy' => [
        1 => 'Tin mới nhất', 
        2 => 'Giá thấp đến cao',
        3 => 'Giá cao đến thấp',
        4 => 'Giá trên m² thấp đến cao',
        5 => 'Giá trên m² cao đến thấp',
        6 => 'Diện tích bé đến lớn ',
        7 => 'Diện tích lớn đến bé '
    ],
    'directions' => [
        'Đông',
        'Tây',
        'Nam' ,
        'Bắc' , 
        'Đông - Bắc' ,
        'Đông - Nam' ,
        'Tây - Bắc' ,
        'Tây - Nam' ,
    ],
    'legal_documents' => [
        'Sổ đỏ/Sổ hồng',
        'Giấy tờ viết tay',
        'Đang chờ cấp'
    ],
    'interior' => [
        'Đầy đủ', 
        'Cơ bản',
        'Không nội thất'
    ]
];
