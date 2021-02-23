<?php


//checkboxes
define(
    "PARFUMS",
    [
        'Fraise' => 5,
        'Chocolat' => 6,
        'Citron' => 4,
        'Vanille' => 3
    ]
);
//radios
define(
    "CORNETS",
    [
        'Pot' => 2,
        'Cornet' => 3
    ]
);
//checkboxes
define(
    "SUPPLEMENTS",
    [
        'Pépites de chocolat' => 1,
        'Chantilly' => 0.5
    ]
);


function is_checked(string $type, string $parfum)
{
    return in_array($parfum, $_GET[$type]);
}

function form_parfum()
{
    return create_form(('parfums'));
}

function form_cornets()
{
    return create_form('cornets');
}

function form_supplements()
{
    return create_form('supplements');
}

function create_form(string $type): string
{
    $rows = '';
    $iter = constant(strtoupper($type));
    $formType = $iter === CORNETS ? 'radio' : 'checkbox';

    foreach ($iter as $parfum => $prix) {
        $checked = is_checked($type, $parfum) ? ' checked' : '';
        $rows .= '<div class="checkbox">
        <label>
        <input type="' . $formType . '" name="' . $type . '[]" value="' . $parfum . '" ' . $checked . '>
        ' . $parfum . ' - ' . $prix . '€
        </label><div>';
    }


    //var_dump($rows);
    return $rows;
}

function form_glace(string $step)
{
    return call_user_func('form_' . $step);
}

function calculate_total(array $data): int
{
    $total = 0;
    foreach ($data as $e) {
        if (array_key_exists($e[0], PARFUMS)) {
            $const = PARFUMS;
        } elseif (array_key_exists($e[0], CORNETS)) {
            $const = CORNETS;
        } else {
            $const = SUPPLEMENTS;
        }
        foreach ($e as $parfum) {
            $total += $const[$parfum];
        }
    }
    return $total;
}

function commande(array $data): array
{
    $parfumArr = [];
    $supplementsArr = [];
    foreach ($data['parfums'] as $parfum) {
        if (array_key_exists($parfum, PARFUMS)) {
            $parfumArr[] = $parfum;            
        }
        $parfums = implode(',', $parfumArr);
    } 
    foreach ($data['supplements'] as $suppl) {
        if (array_key_exists($suppl, SUPPLEMENTS)) {
            $supplementsArr[] = $suppl;            
        }
        $supplements = implode(',', $supplementsArr);
    }       
    return [
        'total' => calculate_total($data),
        'parfums' => $parfums,
        'cornet' => $data['cornets'][0],
        'supplements' => $supplements
    ];
}
