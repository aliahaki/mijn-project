<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Style.css">
    <title>PHP Basics</title>
</head>
<body>
     <?php
        // Hieronder staat eeen string variabele 
        $sport = "voetbal";
        echo "<p> Mijn sport is $sport</p>";
        
        $snack = "bitterbal";
        echo "<p> Mijn favoriete snack is $snack</p>";
        
        // integer variabele mag positief of negatief zijn maar wel een geheel getal
        $leeftijd = 22;
        echo "<p> Mijn leeftijd is $leeftijd </p>";

        // Float is een positief og negatief kommagetal. De komma schrijf je met een punt
        $prijs = 4.65;
        echo "Mijn heerlijke turkse pizza was &euro; $prijs";
        
        //Boolean variabele kan twee waarden aannemen true of false, 1 of 0
        $wordIkMiljonairLater = true;
        
        if($wordIkMiljonairLater) {
            echo "<p> Ik wordt miljonair later</p>";
        } else{
            echo "<p> Ik wordt gelukkig</p>";
        }


        // Een array is een variabele waarin je meerdere waarden kunt opslaan.
        $repen = [
            'mars',
            'Twix',
            'Raider',
            'KitKat',
            'Bounty',
            'Milky way',
            'Galaxy'

        ];
        // Zet op het scherm de zin Mijn favoriete reep is een Milky way
        echo "<p>Op de eerste plaats van de snoeplijst staat: $repen[5]</p>";
                


        $games = [
            "Hogwarts Legacy",
            "Assassin's Creed",
            "The Legend of Zelda",
            "Minecraft",
            "Overwatch"

        ];

        echo "<p>Mijn favoriete games</p>";
        echo "<P>==================</p>";
        echo "<ol>";
        echo "<li>$games[0]</li>";
        echo "<li>$games[1]</li>";
        echo "<li>$games[2]</li>";
        echo "<li>$games[3]</li>";
        echo "<li>$games[4]</li>";
        echo "</ol>";
        

        $persoonsgegevens = [
            'voornaam' => 'Alia',
            'achternaam' => 'Haki',
            'straatnaam' => 'Wulverhorst',
            'huisnummer' => 72,
            'postcode' => '3417TM',
            'woonplaats' => 'Montfoort',
            'leeftijd'=> 22
        ];

       echo "<p>Mijn naam is: {$persoonsgegevens['voornaam']} {$persoonsgegevens['achternaam']}</p>";
       echo "<p>Mijn adres is: {$persoonsgegevens['straatnaam']} {$persoonsgegevens['huisnummer']}</p>";
       echo "<p>Mijn postcode is: {$persoonsgegevens['postcode']}</p>";
       echo "<p>Mijn woonplaats is: {$persoonsgegevens['woonplaats']}</p>";
       echo "<p>Mijn leeftijd is: {$persoonsgegevens['leeftijd']} jaar oud </p>";


    $snelle_autos = [
     "Bugatti Chiron Super Sport" => 490,
     "Koenigsegg Agera RS" => 447,
     "Hennessey Venom GT" => 435,
     "Bugatti Veyron Super Sport" => 431,
     "SSC Tuatara" => 455
    ];
  
    echo "<p>====================================</p>";
    echo "<p>Top 5 snelste sportauto's ter wereld</p>";
    echo "<p>====================================</p>";
    echo "<ol>";
    echo "<li>Bugatti Chiron Super Sport => {$snelle_autos['Bugatti Chiron Super Sport']} km/h</li>";
    echo "<li>Koenigsegg Agera RS => {$snelle_autos['Koenigsegg Agera RS']} km/h</li>";
    echo "<li>Hennessey Venom GT => {$snelle_autos['Hennessey Venom GT']} km/h</li>";
    echo "<li>Bugatti Veyron Super Sport => {$snelle_autos['Bugatti Veyron Super Sport']} km/h</li>";
    echo "<li>SSC Tuatara => {$snelle_autos['SSC Tuatara']} km/h</li>";
    echo "</ol>";

    $sneakers = [
    "Adidas Galaxy 7" => 231.45,
    "Nike Air Max 270" => 189.99,
    "Puma RS-X" => 154.50,
    "New Balance 574" => 129.00,
    "Reebok Classic Leather" => 119.95,
    "Asics Gel-Nimbus 25" => 175.20,
    "Under Armour HOVR Sonic" => 142.30,
    "Nike Vaporfly" => 187.67
];

echo "<p>***************************</p>";
echo "<p> Mijn favoriete sneakers </p>";
echo "<p>***************************</p>";
echo "<ol>";
echo "<li>schoen 1: Adidas Galaxy 7 => {$sneakers['Adidas Galaxy 7']} €</li>";
echo "<li>schoen 2: Nike Air Max 270 => {$sneakers['Nike Air Max 270']} €</li>";
echo "<li>schoen 3: Puma RS-X => {$sneakers['Puma RS-X']} €</li>";
echo "<li>schoen 4: New Balance 574 => {$sneakers['New Balance 574']} €</li>";
echo "<li>schoen 5: Reebok Classic Leather => {$sneakers['Reebok Classic Leather']} €</li>";
echo "<li>schoen 6: Asics Gel-Nimbus 25 => {$sneakers['Asics Gel-Nimbus 25']} €</li>";
echo "<li>schoen 7: Under Armour HOVR Sonic => {$sneakers['Under Armour HOVR Sonic']} €</li>";
echo "<li>schoen 8:  Nike Vaporfly => {$sneakers['Nike Vaporfly']} €</li>";
echo "</ol>";



    


    ?> 
  </body>     
  </html>