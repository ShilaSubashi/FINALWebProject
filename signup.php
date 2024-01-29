<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? password_hash(trim($_POST['password']), PASSWORD_DEFAULT) : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $meat_preference = isset($_POST["meat_preference"]) ? trim($_POST["meat_preference"]) : '';
    $fish_preference = isset($_POST["fish_preference"]) ? trim($_POST["fish_preference"]) : '';
    $veg_preference = isset($_POST["veg_preference"]) ? trim($_POST["veg_preference"]) : '';
    $allergies = isset($_POST["allergies"]) ? trim($_POST["allergies"]) : '';
    $ability = isset($_POST["ability"]) ? trim($_POST["ability"]) : '';
    $morning = isset($_POST["morning"]) ? trim($_POST["morning"]) : '';
    $times = isset($_POST["times"]) ? trim($_POST["times"]) : '';
    $times2 = isset($_POST["times2"]) ? trim($_POST["times2"]) : '';
    $others = isset($_POST["others"]) ? trim($_POST["others"]) : '';
    $date_of_birth = isset($_POST["datemax"]) ? date("Y-m-d", strtotime($_POST["datemax"])) : "";
    $height = isset($_POST["height"]) ? (int)$_POST["height"] : 0;
    $current_weight = isset($_POST["currentWeight"]) ? (int)$_POST["currentWeight"] : 0;
    $target_weight = isset($_POST["targetWeight"]) ? (int)$_POST["targetWeight"] : 0;    
    $gain = isset($_POST["gain"]) ? 1 : 0;
    $muscle = isset($_POST["muscle"]) ? 1 : 0;
    $loss = isset($_POST["loss"]) ? 1 : 0;
    $stress = isset($_POST["stress"]) ? 1 : 0;
    $appearance = isset($_POST["appearance"]) ? 1 : 0;
    $others_goal = isset($_POST["others_goal"]) ? 1 : 0;

    $meat_preference_values = ["love_meat", "eat_occasionally_meat", "eat_rarely_meat", "never_eat_meat"];
    $fish_preference_values = ["love_fish", "eat_occasionally_fish", "eat_rarely_fish", "never_eat_fish"];
    $veg_preference_values = ["love_veg", "eat_occasionally_veg", "eat_rarely_veg", "never_eat_veg"];
    $allowed_allergies = ["none", "lactose", "gluten", "peanuts", "soy", "wheat"];
    $allowed_ability = ["up-to-30-minutes", "up-to-1-hour", "more-than-1-hour"];
    $allowed_morning = ["yes", "sometimes", "no"];
    $allowed_times = ["2-times-a-week", "3-times-a-week", "4-times-a-week"];
    $allowed_times2 = ["not-active", "rarely-active", "active"];
    $allowed_others = ["none", "eating-disorder", "pregnant", "breastfeeding", "diabetes", "heart-disease"];
    
   $meat_preference = isset($_POST["meat_preference"]) && in_array($_POST["meat_preference"], $meat_preference_values) ? $_POST["meat_preference"] : '';
   $fish_preference = isset($_POST["fish_preference"]) && in_array($_POST["fish_preference"], $fish_preference_values) ? $_POST["fish_preference"] : '';
   $veg_preference = isset($_POST["veg_preference"]) && in_array($_POST["veg_preference"], $veg_preference_values) ? $_POST["veg_preference"] : '';
   $ability = isset($_POST["ability"]) && in_array($_POST["ability"], $allowed_ability) ? $_POST["ability"] : '';
   $morning = isset($_POST["morning"]) && in_array($_POST["morning"], $allowed_morning) ? $_POST["morning"] : '';
   $times = isset($_POST["times"]) && in_array($_POST["times"], $allowed_times) ? $_POST["times"] : '';
   $times2 = isset($_POST["times2"]) && in_array($_POST["times2"], $allowed_times2) ? $_POST["times2"] : '';
   $others = isset($_POST["others"]) && in_array($_POST["others"], $allowed_others) ? $_POST["others"] : '';


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("INSERT INTO user (name, email, password, gender, meat_preference, fish_preference, veg_preference, allergies, ability, morning, times, times2, others, date_of_birth, height, current_weight, target_weight, gain, muscle, loss, stress, appearance, others_goal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssssssssssiiiiiiiii", $name, $email, $password, $gender, $meat_preference, $fish_preference, $veg_preference, $allergies, $ability, $morning, $times, $times2, $others, $date_of_birth, $height, $current_weight, $target_weight, $gain, $muscle, $loss, $stress, $appearance, $others_goal);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        // Log the error or display a user-friendly message
        echo "Error: Unable to register. Please try again later.";
        // Log the detailed error for debugging (do not display to users)
        error_log("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
