<?php
return [
 'slider_path'=>'public/pink/images/slider',
  'galary_path'=>'public/pink/images/galary',
    'home_port_count'=>5,
    'home_articles_count'=>3,
    'paginate'=>18,
    'resent_comments'=>3,
    'resent_portfolios'=>3,
    'product_img'=>[
                    'max'=>['width'=>null, 'height'=>300],
                    'mini'=>['width'=>null, 'height'=>50]
                   ],
    'image'=>[
                'width'=>null,
                'height'=>450

             ],
    'perforator'=>[
        'power','maxHole','voltage','capacity','impact','qntImpact',
        'idle','rotationSpeed','speedIdle','cartridge'
    ],
    'grinders'=>[
        'power','rotationSpeed','diametrDisk','spindle','performance'
    ],
    'jackhammers'=>[
        'power','maxCapacity','airFlow'
    ],
    'saws' =>[
        'power','metalCuttingDepth','pipeCuttingDepth','woodCuttingDepth','diametrDisk',
        'vibrationLevel','cuttingDepth','angleCuttingDepth','frequency','workingWidth',
        'cuttingEdgeWidth','rotationSpeed','strokeLength','grindingPlate'
    ]
];