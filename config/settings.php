<?php
return [
 'slider_path'=>'public/pink/images',
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


    'handbook'=>[

        '2'=>[ 'name'=>'Corp\Models\Capacity'],
        '3'=>[ 'name'=>'Corp\Models\Voltage'],
        '4'=>[ 'name'=>'Corp\Models\Power'],
        '5'=>[ 'name'=>'Corp\Models\Anglecutdepth'],
        '6'=>[ 'name'=>'Corp\Models\Cutdepth'],
        '7'=>[ 'name'=>'Corp\Models\Cutmatdepth'],
        '8'=>[ 'name'=>'Corp\Models\MaxHole'],
        '9'=>[ 'name'=>'Corp\Models\Holestand'],
        '10'=>[ 'name'=>'Corp\Models\Cutedgewidth'],
        '11'=>[ 'name'=>'Corp\Models\Diametrdsk'],
        '12'=>[ 'name'=>'Corp\Models\Grindingplate'],
        '13'=>[ 'name'=>'Corp\Models\Scaffold'],
        '14'=>[ 'name'=>'Corp\Models\Grouptool'],
        '15'=>[ 'name'=>'Corp\Models\Workingwidth'],
        '16'=>[ 'name'=>'Corp\Models\Idle'],
        '17'=>[ 'name'=>'Corp\Models\Impact'],
        '18'=>[ 'name'=>'Corp\Models\Incline'],
        '19'=>[ 'name'=>'Corp\Models\Performance'],
        '20'=>[ 'name'=>'Corp\Models\Qntimpact'],
        '21'=>[ 'name'=>'Corp\Models\Rotationspeed'],
        '22'=>[ 'name'=>'Corp\Models\Shankrange'],
        '23'=>[ 'name'=>'Corp\Models\Spindle'],
        '24'=>[ 'name'=>'Corp\Models\Steel'],
        '25'=>[ 'name'=>'Corp\Models\Strokelength'],
        '26'=>[ 'name'=>'Corp\Models\TypeTool'],
        '27'=>[ 'name'=>'Corp\Models\Vibration'],
        '28'=>[ 'name'=>'Corp\Models\Airflow'],
        '29'=>[ 'name'=>'Corp\Models\Cartridge'],
        '30'=>[ 'name'=>'Corp\Models\Defence'],
        '31'=>[ 'name'=>'Corp\Models\Detection'],
        '32'=>[ 'name'=>'Corp\Models\Frequency'],
        '33'=>[ 'name'=>'Corp\Models\Capacity'],
        '34'=>[ 'name'=>'Corp\Models\Packing'],
        '35'=>[ 'name'=>'Corp\Models\Classprofy'],
        '36'=>[ 'name'=>'Corp\Models\Company'],
        '37'=>[ 'name'=>'Corp\Models\Country'],
        '38'=>[ 'name'=>'Corp\Models\Orderoption'],

                ],
    'category' => [
    '302'=>[
        'power','maxHole','voltage','capacity','impact','qntImpact',
        'idle','rotationSpeed','speedIdle','cartridge'
    ],
    '46'=>[
        'power','rotationSpeed','diametrDisk','spindle','performance'
    ],
    '19'=>[
        'power','maxCapacity','airFlow'
    ],
    '234' =>[
        'power','metalCuttingDepth','pipeCuttingDepth','woodCuttingDepth','diametrDisk',
        'vibrationLevel','cuttingDepth','angleCuttingDepth','frequency','workingWidth',
        'cuttingEdgeWidth','rotationSpeed','strokeLength','grindingPlate'
    ],
              ]
];