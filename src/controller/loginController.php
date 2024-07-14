<?PHP
include_once __DIR__ . '/../model/User.php';
include_once __DIR__ . '/../model/Dbconnector.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = trim($_POST['password']);
        
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        if ($user->login(Dbconnector::getConnection())) {
            if ($_SESSION['role'] == "administrator") {
                header("Location: /KuppiMate/src/view/admin-dashboard.php");
                exit();
            } elseif ($_SESSION['role'] == "undergraduate") {
                header("Location: /KuppiMate/src/view/ug-dashboard.php");
                exit();
            } elseif ($_SESSION['role'] == "external_learner") {
                header("Location: /KuppiMate/src/view/ex-dashboard.php");
                exit();
            }
        } else {
            header("Location: /KuppiMate/src/view/login.php?s=3");
            exit();
        }
    }
}
