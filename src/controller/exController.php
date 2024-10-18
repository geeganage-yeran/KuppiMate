<?PHP
include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = '6LeNWmUqAAAAALQK0QPgqYBt5jFR4dsLbwe2vXi3';
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($verifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
    $responseData = json_decode($response);
    if ($responseData->success) {
        if (isset($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['contact'], $_POST['password'])) {

            $firstName = trim($_POST['fName']);
            $lastName = trim($_POST['lName']);
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $contact = trim($_POST['contact']);
            $password = trim($_POST['password']);

            $ugUser = new User();

            if (($ugUser->verifyUser(Dbconnector::getConnection(), $email))) {
                $ugUser->setfirstName($firstName);
                $ugUser->setLastname($lastName);
                $ugUser->setEmail($email);
                $ugUser->setPassword($password);
                $ugUser->setContact($contact);

                if ($ugUser->registerUser(Dbconnector::getConnection())) {
                    header("Location: /KuppiMate/src/view/login.php?s=1");
                    exit();
                } else {
                    header("Location: /KuppiMate/src/view/index.php?s=0");
                    exit();
                }
            } else {
                header("Location: /KuppiMate/src/view/index.php?s=2");
                exit();
            }
        }
    } else {
        header("Location: /KuppiMate/src/view/index.php?s=5");
        exit();
    }
}
